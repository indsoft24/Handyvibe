<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Lead;

class NewLeadNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $lead;
    public $notification;

    /**
     * Create a new event instance.
     */
    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
        $this->notification = [
            'id' => 'lead_' . $lead->id,
            'type' => 'new_lead',
            'title' => 'New Lead Received',
            'message' => $lead->name . ' inquired about ' . ($lead->service_name ?: 'a service'),
            'time' => $lead->created_at->diffForHumans(),
            'priority' => $lead->priority,
            'status' => $lead->status,
            'url' => route('admin.leads.show', $lead->id),
            'data' => [
                'lead_id' => $lead->id,
                'service_name' => $lead->service_name,
                'type' => $lead->type,
                'source' => $lead->source,
            ]
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('notifications'),
        ];
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'new-lead';
    }
}