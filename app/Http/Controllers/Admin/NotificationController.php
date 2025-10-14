<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Get notifications for the admin dashboard
     */
    public function getNotifications(Request $request)
    {
        try {
            $notifications = [];

            // Get new leads (last 24 hours)
            $newLeads = Lead::where('created_at', '>=', now()->subDay())
                ->where('status', 'new')
                ->with(['assignedAdmin'])
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();

            foreach ($newLeads as $lead) {
                $notifications[] = [
                    'id' => 'lead_'.$lead->id,
                    'type' => 'new_lead',
                    'title' => 'New Lead Received',
                    'message' => $lead->name.' inquired about '.($lead->service_name ?: 'a service'),
                    'time' => $lead->created_at->diffForHumans(),
                    'time_ago' => $lead->created_at->format('Y-m-d H:i:s'),
                    'priority' => $lead->priority,
                    'status' => $lead->status,
                    'icon' => $this->getLeadIcon($lead->priority),
                    'icon_color' => $this->getLeadIconColor($lead->priority),
                    'url' => route('admin.leads.show', $lead->id),
                    'data' => [
                        'lead_id' => $lead->id,
                        'service_name' => $lead->service_name,
                        'type' => $lead->type,
                        'source' => $lead->source,
                    ],
                ];
            }

            // Get urgent leads needing follow-up
            $urgentLeads = Lead::needsFollowUp()
                ->where('priority', 'urgent')
                ->with(['assignedAdmin'])
                ->orderBy('follow_up_at', 'asc')
                ->limit(3)
                ->get();

            foreach ($urgentLeads as $lead) {
                $notifications[] = [
                    'id' => 'urgent_'.$lead->id,
                    'type' => 'urgent_followup',
                    'title' => 'Urgent Follow-up Required',
                    'message' => $lead->name.' needs immediate follow-up for '.($lead->service_name ?: 'service inquiry'),
                    'time' => $lead->follow_up_at ? $lead->follow_up_at->diffForHumans() : 'Overdue',
                    'time_ago' => $lead->follow_up_at ? $lead->follow_up_at->format('Y-m-d H:i:s') : null,
                    'priority' => 'urgent',
                    'status' => $lead->status,
                    'icon' => $this->getUrgentIcon(),
                    'icon_color' => 'text-red-600 dark:text-red-400',
                    'url' => route('admin.leads.show', $lead->id),
                    'data' => [
                        'lead_id' => $lead->id,
                        'service_name' => $lead->service_name,
                        'follow_up_at' => $lead->follow_up_at,
                    ],
                ];
            }

            // Get high priority leads
            $highPriorityLeads = Lead::where('priority', 'high')
                ->where('status', '!=', 'converted')
                ->where('status', '!=', 'lost')
                ->where('created_at', '>=', now()->subWeek())
                ->with(['assignedAdmin'])
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();

            foreach ($highPriorityLeads as $lead) {
                $notifications[] = [
                    'id' => 'high_'.$lead->id,
                    'type' => 'high_priority',
                    'title' => 'High Priority Lead',
                    'message' => $lead->name.' - '.($lead->service_name ?: 'Service inquiry').' requires attention',
                    'time' => $lead->created_at->diffForHumans(),
                    'time_ago' => $lead->created_at->format('Y-m-d H:i:s'),
                    'priority' => 'high',
                    'status' => $lead->status,
                    'icon' => $this->getHighPriorityIcon(),
                    'icon_color' => 'text-orange-600 dark:text-orange-400',
                    'url' => route('admin.leads.show', $lead->id),
                    'data' => [
                        'lead_id' => $lead->id,
                        'service_name' => $lead->service_name,
                        'type' => $lead->type,
                    ],
                ];
            }

            // Get leads that need follow-up (not urgent)
            $followUpLeads = Lead::needsFollowUp()
                ->where('priority', '!=', 'urgent')
                ->with(['assignedAdmin'])
                ->orderBy('follow_up_at', 'asc')
                ->limit(2)
                ->get();

            foreach ($followUpLeads as $lead) {
                $notifications[] = [
                    'id' => 'followup_'.$lead->id,
                    'type' => 'followup_required',
                    'title' => 'Follow-up Required',
                    'message' => $lead->name.' - '.($lead->service_name ?: 'Service inquiry').' needs follow-up',
                    'time' => $lead->follow_up_at ? $lead->follow_up_at->diffForHumans() : 'Overdue',
                    'time_ago' => $lead->follow_up_at ? $lead->follow_up_at->format('Y-m-d H:i:s') : null,
                    'priority' => $lead->priority,
                    'status' => $lead->status,
                    'icon' => $this->getFollowUpIcon(),
                    'icon_color' => 'text-blue-600 dark:text-blue-400',
                    'url' => route('admin.leads.show', $lead->id),
                    'data' => [
                        'lead_id' => $lead->id,
                        'service_name' => $lead->service_name,
                        'follow_up_at' => $lead->follow_up_at,
                    ],
                ];
            }

            // Sort notifications by priority and time
            usort($notifications, function ($a, $b) {
                $priorityOrder = ['urgent' => 4, 'high' => 3, 'medium' => 2, 'low' => 1];
                $aPriority = $priorityOrder[$a['priority']] ?? 0;
                $bPriority = $priorityOrder[$b['priority']] ?? 0;

                if ($aPriority === $bPriority) {
                    return strtotime($b['time_ago']) - strtotime($a['time_ago']);
                }

                return $bPriority - $aPriority;
            });

            // Limit to 10 notifications
            $notifications = array_slice($notifications, 0, 10);

            return response()->json([
                'success' => true,
                'notifications' => $notifications,
                'count' => count($notifications),
                'unread_count' => count($notifications), // All notifications are considered unread for simplicity
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch notifications',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get notification statistics
     */
    public function getNotificationStats(Request $request)
    {
        try {
            $stats = [
                'new_leads_today' => Lead::where('created_at', '>=', now()->startOfDay())
                    ->where('status', 'new')
                    ->count(),
                'urgent_followups' => Lead::needsFollowUp()
                    ->where('priority', 'urgent')
                    ->count(),
                'high_priority_leads' => Lead::where('priority', 'high')
                    ->where('status', '!=', 'converted')
                    ->where('status', '!=', 'lost')
                    ->count(),
                'total_pending' => Lead::whereIn('status', ['new', 'contacted', 'qualified'])
                    ->count(),
            ];

            return response()->json([
                'success' => true,
                'stats' => $stats,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch notification stats',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Mark notification as read
     */
    public function markAsRead(Request $request)
    {
        $request->validate([
            'notification_id' => 'required|string',
        ]);

        $notificationId = $request->input('notification_id');

        // Extract lead ID from notification ID (format: lead_X)
        if (strpos($notificationId, 'lead_') === 0) {
            $leadId = str_replace('lead_', '', $notificationId);

            // Update lead status to 'contacted'
            $lead = Lead::find($leadId);
            if ($lead) {
                $lead->update([
                    'status' => 'contacted',
                    'updated_at' => now(),
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Notification marked as read',
                ]);
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'Notification not found',
        ], 404);
    }

    /**
     * Get lead icon based on priority
     */
    private function getLeadIcon($priority)
    {
        return match ($priority) {
            'urgent' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z',
            'high' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
            'medium' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
            'low' => 'M5 13l4 4L19 7',
            default => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z'
        };
    }

    /**
     * Get lead icon color based on priority
     */
    private function getLeadIconColor($priority)
    {
        return match ($priority) {
            'urgent' => 'text-red-600 dark:text-red-400',
            'high' => 'text-orange-600 dark:text-orange-400',
            'medium' => 'text-blue-600 dark:text-blue-400',
            'low' => 'text-green-600 dark:text-green-400',
            default => 'text-gray-600 dark:text-gray-400'
        };
    }

    /**
     * Get urgent icon
     */
    private function getUrgentIcon()
    {
        return 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z';
    }

    /**
     * Get high priority icon
     */
    private function getHighPriorityIcon()
    {
        return 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z';
    }

    /**
     * Get follow-up icon
     */
    private function getFollowUpIcon()
    {
        return 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z';
    }
}
