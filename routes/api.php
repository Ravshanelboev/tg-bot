<?php

use App\Http\Controllers\AdminBotController;
use App\Http\Controllers\TelegramBotController;
use App\Http\Controllers\UserBotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::post('/telegram/webhook', function () {
    $update = Telegram::getWebhookUpdate();
    $chatId = $update->getMessage()?->chat?->id;
    $adminId = env('BOT_ADMIN_ID');

    if ($chatId == $adminId) {
        app(AdminBotController::class)->handle($update);
    } else {
        app(UserBotController::class)->handle($update);
    }

    return 'ok';
});