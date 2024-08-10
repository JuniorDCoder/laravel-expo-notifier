<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifySendNotificationFields;
use Illuminate\Http\Request;
use ExpoSDK\Expo;
use ExpoSDK\ExpoMessage;

class SendPushNotification extends Controller
{
    /**
     * Send a push notification to the users
     */
    public function sendPushNotification(VerifySendNotificationFields $request){

        $messages = [
            new ExpoMessage([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
            ]),
        ];

        $to = $request->input('to');

        try {
            (new Expo)->send($messages)->to($to)->push();
            return response()->json(['success' => true, 'message' => 'Notification sent successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to send notification', 'error' => $e->getMessage()], 500);
        }
    }
}
