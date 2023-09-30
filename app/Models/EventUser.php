<?php

namespace App\Models;

use App\Exceptions\GeneralJsonException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    use HasFactory;

    protected $table = "event_user";

    protected $fillable = [
        'user_id',
        'event_id',
    ];

    public static function subscribe($user_id, $event_id)
    {
        return self::create([
            'user_id' => $user_id,
            'event_id' => $event_id
        ]);
    }

    public static function isSubscriber($user_id, $event_id)
    {
        return self::where([
            'user_id' => $user_id,
            'event_id' => $event_id
        ])->first();
    }

    public static function unsubscribe($user_id, $event_id)
    {
        $subscribe = self::where([
            'user_id' => $user_id,
            'event_id' => $event_id
        ])->first();

        if (!$subscribe) {
            throw new GeneralJsonException(__('Нет подписки на такое событие.'), 404);
        }

        $subscribe->delete();
    }
}
