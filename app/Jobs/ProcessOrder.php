<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessOrder implements ShouldQueue
{
    use Queueable;

    protected $order;

    /**
     * Create a new job instance.
     */
    public function __construct(\App\Models\Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Simulate some processing (e.g., sending an email or notifying a warehouse)
        // Log the event
        \Illuminate\Support\Facades\Log::info("Processing Order #{$this->order->id}");

        // Update status for simulation
        $this->order->update(['status' => 'processing']);

        // In a real app, this might interact with external APIs
    }
}
