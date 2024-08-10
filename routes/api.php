<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendPushNotification;

Route::post('/send-push-notification', [SendPushNotification::class, 'sendPushNotification']);
