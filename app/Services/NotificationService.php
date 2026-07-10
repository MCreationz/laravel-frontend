<?php

namespace App\Services;

use App\Events\NotificationCreated;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Model;

class NotificationService
{
    /**
     * Create a notification.
     */
    public static function create(
        Model $recipient,
        string $type,
        string $title,
        string $message,
        array $data = []
    ): Notification {
        $notification = Notification::create([
            'notifiable_type' => $recipient::class,
            'notifiable_id'   => $recipient->getKey(),
            'type'            => $type,
            'title'           => $title,
            'message'         => $message,
            'data'            => $data,
        ]);

        event(new NotificationCreated($notification));

        return $notification;
    }

    /**
     * Create the notification only if one doesn't already exist.
     */
    public static function createOnce(
        Model $recipient,
        string $type,
        string $title,
        string $message,
        array $data = []
    ): Notification {
        $notification = Notification::firstOrCreate(
            [
                'notifiable_type' => $recipient::class,
                'notifiable_id'   => $recipient->getKey(),
                'type'            => $type,
            ],
            [
                'title'   => $title,
                'message' => $message,
                'data'    => $data,
            ]
        );

        if ($notification->wasRecentlyCreated) {
            event(new NotificationCreated($notification));
        }

        return $notification;
    }
}