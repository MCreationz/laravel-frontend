<?php

namespace App\Events;

use App\Models\ClientAdmin;
use App\Models\Notification;
use App\Models\Organization;
use App\Models\Reviewer;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Notification $notification)
    {
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel(
                $this->channelName() . '.' . $this->notification->notifiable_id
            ),
        ];
    }

    protected function channelName(): string
    {
        return match ($this->notification->notifiable_type) {
            Organization::class => 'organization',
            ClientAdmin::class => 'client-admin',
            Reviewer::class => 'reviewer',
            User::class => 'super-admin',
            default => throw new \RuntimeException(
                'Unsupported notification recipient: ' . $this->notification->notifiable_type
            ),
        };
    }

    public function broadcastAs(): string
    {
        return 'notification.created';
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->notification->id,
            'type' => $this->notification->type,
            'title' => $this->notification->title,
            'message' => $this->notification->message,
            'data' => $this->notification->data,
            'is_read' => $this->notification->is_read,
            'created_at' => $this->notification->created_at?->toDateTimeString(),
        ];
    }
}