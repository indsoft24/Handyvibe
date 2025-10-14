<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;
use App\Models\Service;
use App\Models\Product;
use App\Models\Admin;
use Carbon\Carbon;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some services and products for testing
        $services = Service::take(5)->get();
        $products = Product::take(3)->get();
        $admins = Admin::take(2)->get();

        // Create recent leads (last 24 hours) - New leads
        $recentLeads = [
            [
                'name' => 'John Smith',
                'email' => 'john.smith@email.com',
                'phone' => '+1-555-0123',
                'company' => 'Tech Solutions Inc',
                'message' => 'I need urgent help with plumbing services. My basement is flooding!',
                'source' => 'website',
                'status' => 'new',
                'priority' => 'urgent',
                'type' => 'service',
                'service_id' => $services->first()?->id,
                'service_name' => $services->first()?->name ?? 'Plumbing Service',
                'assigned_to' => $admins->first()?->id,
                'created_at' => now()->subHours(2),
                'updated_at' => now()->subHours(2),
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.j@email.com',
                'phone' => '+1-555-0124',
                'company' => 'Home Decor LLC',
                'message' => 'Interested in electrical services for my new office renovation.',
                'source' => 'phone',
                'status' => 'new',
                'priority' => 'high',
                'type' => 'service',
                'service_id' => $services->skip(1)->first()?->id,
                'service_name' => $services->skip(1)->first()?->name ?? 'Electrical Service',
                'assigned_to' => $admins->skip(1)->first()?->id,
                'created_at' => now()->subHours(4),
                'updated_at' => now()->subHours(4),
            ],
            [
                'name' => 'Mike Wilson',
                'email' => 'mike.wilson@email.com',
                'phone' => '+1-555-0125',
                'company' => null,
                'message' => 'Looking for carpenter services to build custom furniture.',
                'source' => 'website',
                'status' => 'new',
                'priority' => 'medium',
                'type' => 'service',
                'service_id' => $services->skip(2)->first()?->id,
                'service_name' => $services->skip(2)->first()?->name ?? 'Carpenter Service',
                'assigned_to' => null,
                'created_at' => now()->subHours(6),
                'updated_at' => now()->subHours(6),
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily.davis@email.com',
                'phone' => '+1-555-0126',
                'company' => 'Davis Enterprises',
                'message' => 'Need product information for home appliances. Looking for best deals.',
                'source' => 'email',
                'status' => 'new',
                'priority' => 'low',
                'type' => 'product',
                'service_id' => $products->first()?->id,
                'service_name' => $products->first()?->name ?? 'Home Appliance',
                'assigned_to' => $admins->first()?->id,
                'created_at' => now()->subHours(8),
                'updated_at' => now()->subHours(8),
            ],
            [
                'name' => 'Robert Brown',
                'email' => 'robert.brown@email.com',
                'phone' => '+1-555-0127',
                'company' => 'Brown Construction',
                'message' => 'Urgent: Need car wash service for fleet of 20 vehicles tomorrow.',
                'source' => 'phone',
                'status' => 'new',
                'priority' => 'urgent',
                'type' => 'service',
                'service_id' => $services->skip(3)->first()?->id,
                'service_name' => $services->skip(3)->first()?->name ?? 'Car Wash Service',
                'assigned_to' => $admins->skip(1)->first()?->id,
                'created_at' => now()->subHours(1),
                'updated_at' => now()->subHours(1),
            ],
        ];

        // Create leads needing follow-up (urgent)
        $urgentFollowUpLeads = [
            [
                'name' => 'Lisa Anderson',
                'email' => 'lisa.anderson@email.com',
                'phone' => '+1-555-0128',
                'company' => 'Anderson Corp',
                'message' => 'Follow up needed on electrical installation quote.',
                'source' => 'website',
                'status' => 'contacted',
                'priority' => 'urgent',
                'type' => 'service',
                'service_id' => $services->skip(1)->first()?->id,
                'service_name' => $services->skip(1)->first()?->name ?? 'Electrical Service',
                'assigned_to' => $admins->first()?->id,
                'contacted_at' => now()->subDays(2),
                'follow_up_at' => now()->subHours(2), // Overdue
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subHours(2),
            ],
            [
                'name' => 'David Miller',
                'email' => 'david.miller@email.com',
                'phone' => '+1-555-0129',
                'company' => 'Miller Industries',
                'message' => 'Urgent follow-up required for plumbing emergency service.',
                'source' => 'phone',
                'status' => 'qualified',
                'priority' => 'urgent',
                'type' => 'service',
                'service_id' => $services->first()?->id,
                'service_name' => $services->first()?->name ?? 'Plumbing Service',
                'assigned_to' => $admins->skip(1)->first()?->id,
                'contacted_at' => now()->subDays(1),
                'follow_up_at' => now()->subHours(1), // Overdue
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subHours(1),
            ],
        ];

        // Create high priority leads
        $highPriorityLeads = [
            [
                'name' => 'Jennifer Taylor',
                'email' => 'jennifer.taylor@email.com',
                'phone' => '+1-555-0130',
                'company' => 'Taylor Group',
                'message' => 'High priority: Need immediate carpenter services for office renovation.',
                'source' => 'website',
                'status' => 'new',
                'priority' => 'high',
                'type' => 'service',
                'service_id' => $services->skip(2)->first()?->id,
                'service_name' => $services->skip(2)->first()?->name ?? 'Carpenter Service',
                'assigned_to' => $admins->first()?->id,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'name' => 'Michael Garcia',
                'email' => 'michael.garcia@email.com',
                'phone' => '+1-555-0131',
                'company' => 'Garcia Enterprises',
                'message' => 'High priority product inquiry for bulk purchase.',
                'source' => 'email',
                'status' => 'contacted',
                'priority' => 'high',
                'type' => 'product',
                'service_id' => $products->skip(1)->first()?->id,
                'service_name' => $products->skip(1)->first()?->name ?? 'Product',
                'assigned_to' => $admins->skip(1)->first()?->id,
                'contacted_at' => now()->subDays(1),
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(1),
            ],
        ];

        // Create leads needing follow-up (non-urgent)
        $followUpLeads = [
            [
                'name' => 'Amanda White',
                'email' => 'amanda.white@email.com',
                'phone' => '+1-555-0132',
                'company' => 'White Solutions',
                'message' => 'Follow up needed on service quote.',
                'source' => 'website',
                'status' => 'contacted',
                'priority' => 'medium',
                'type' => 'service',
                'service_id' => $services->skip(4)->first()?->id,
                'service_name' => $services->skip(4)->first()?->name ?? 'Service',
                'assigned_to' => $admins->first()?->id,
                'contacted_at' => now()->subDays(2),
                'follow_up_at' => now()->subHours(4), // Overdue
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subHours(4),
            ],
            [
                'name' => 'Christopher Lee',
                'email' => 'chris.lee@email.com',
                'phone' => '+1-555-0133',
                'company' => 'Lee Industries',
                'message' => 'Follow up required for product inquiry.',
                'source' => 'phone',
                'status' => 'qualified',
                'priority' => 'low',
                'type' => 'product',
                'service_id' => $products->skip(2)->first()?->id,
                'service_name' => $products->skip(2)->first()?->name ?? 'Product',
                'assigned_to' => $admins->skip(1)->first()?->id,
                'contacted_at' => now()->subDays(1),
                'follow_up_at' => now()->subHours(2), // Overdue
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subHours(2),
            ],
        ];

        // Combine all leads
        $allLeads = array_merge($recentLeads, $urgentFollowUpLeads, $highPriorityLeads, $followUpLeads);

        // Insert all leads
        foreach ($allLeads as $leadData) {
            Lead::create($leadData);
        }

        $this->command->info('Created ' . count($allLeads) . ' test leads for notifications');
    }
}
