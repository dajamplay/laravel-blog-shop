<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreEventRequest;
use App\Models\Event;
use App\Models\EventUser;

class EventController extends Controller
{
    public function store(StoreEventRequest $request)
    {
        $user_id = auth()->id();

        $event = Event::store($request['title'], $request['content'], $user_id);

        EventUser::subscribe($user_id , $event->id);

        $response = [
            "result" => $event,
            "error" => null
        ];

        return response($response, 201);
    }

    public function index()
    {
        $events = Event::all();

        $response = [
            "result" => $events,
            "error" => null
        ];

        return response($response, 200);
    }

    public function remove($event_id)
    {
        $user_id = auth()->id();

        Event::remove($user_id, $event_id);

        $response = [
            "result" => __("Событие удалено."),
            "error" => null
        ];

        return response($response, 201);
    }
}
