<?php

namespace app\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;

class DashboardController extends Controller
{
    public function home()
    {
        return view('dashboard.home');
    }

    public function profile($id)
    {
        $user = User::find($id);

        if(!$user) return response()->view('dashboard.404', [] ,404);

        return view('dashboard.profile', [
            'user' => $user
        ]);
    }

    public function event($id) {

        $event = Event::find($id);

        if(!$event) return response()->view('dashboard.404', [] ,404);

        $isSubscriber = EventUser::isSubscriber(auth()->id(), $id);

        return view('dashboard.event', [
            'event' => $event,
            'isSubscriber' => $isSubscriber,
            'eventId' => $id
        ]);
    }

    //Можно вынести в отдельный сервис
    public function subscribe($id) {

        $event = Event::find($id);

        if(!$event) return response()->view('dashboard.404', [] ,404);

        EventUser::subscribe(auth()->id(), $id);

        return redirect(route('event', $id));
    }

    //Можно вынести в отдельный сервис
    public function unsubscribe($id) {

        $event = Event::find($id);

        if(!$event) return response()->view('dashboard.404', [] ,404);

        EventUser::unsubscribe(auth()->id(), $id);

        return redirect(route('event', $id));
    }
}
