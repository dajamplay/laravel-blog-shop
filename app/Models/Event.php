<?php

namespace App\Models;

use App\Exceptions\GeneralJsonException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public static function store($title, $content, $user_id)
    {
        $event = self::create([
            'title' => $title,
            'content' => $content,
            'user_id' => $user_id,
        ]);

        if (!$event) {
            throw new GeneralJsonException(__("Ошибка создания события"), 501);
        }

        return $event;
    }

    public static function remove($user_id, $event_id)
    {
        $event = self::find($event_id);

        if (!$event) {
            throw new GeneralJsonException(__("Такого события не существует."), 404);
        }

        if ($event->user_id != $user_id) {
            throw new GeneralJsonException(__("Вы не можете удалить данное событие."), 403);
        }

        return $event->delete();
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
