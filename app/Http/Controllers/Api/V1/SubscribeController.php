<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\EventUser;

class SubscribeController extends Controller
{
    public function subscribe($event_id)
    {
        $user_id = auth()->id();

        $subscribe = EventUser::subscribe($user_id , $event_id);

        $response = [
            'result' => $subscribe,
            "error" => null
        ];

        return response($response,201);
    }

    public function unsubscribe($event_id)
    {
        $user_id = auth()->id();

        EventUser::unsubscribe($user_id , $event_id);

        $response = [
            "result" => __("Подписка на событие удалена."),
            "error" => null
        ];

        return response($response, 201);
    }
}
