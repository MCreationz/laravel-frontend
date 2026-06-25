<?php

namespace App\Services;

use App\Models\Notification;

class NotificationService
{
    public static function create(
        string $type,
        string $title,
        string $message,
        ?int $organizationId = null,
        ?int $reviewerId = null,
        ?int $adminId = null,
        array $data = []
    ): Notification {
        return Notification::create([
            'organization_id' => $organizationId,
            'reviewer_id' => $reviewerId,
            'admin_id' => $adminId,
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'data' => $data,
        ]);
    }

    public static function createOnce(
        string $type,
        string $title,
        string $message,
        ?int $organizationId = null,
        ?int $reviewerId = null,
        ?int $adminId = null,
        array $data = []
    ): Notification {
        return Notification::firstOrCreate(
            [
                'organization_id' => $organizationId,
                'reviewer_id' => $reviewerId,
                'admin_id' => $adminId,
                'type' => $type,
            ],
            [
                'title' => $title,
                'message' => $message,
                'data' => $data,
            ]
        );
    }
}