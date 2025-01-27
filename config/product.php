<?php
    return [
        'role' => 'user',
        'email' => env('PRODUCTS_NOTIFICATION_EMAIL', 'test@gmail.com'),
        'webhook' => env('PRODUCTS_WEBHOOK_URL', 'http://webhook.site'),
    ];
?>