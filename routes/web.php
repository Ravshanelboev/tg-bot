<?php

use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\UserBotController;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/setwebhook', function () {
    $url = config('app.url') . '/api/telegram/webhook';
    $response = Telegram::setWebhook(['url' => $url]);
    return $response;
});


Route::post('/bot/webhook', function () {
    $update = Telegram::getWebhookUpdate();
    app(AdminMovieController::class)->handleTelegram($update);
});

Route::post('/bot', [UserBotController::class, 'handle']);
Route::post('/bot-callback', [UserBotController::class, 'callback']);
