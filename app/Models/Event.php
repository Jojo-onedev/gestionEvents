<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model {
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'time',
        'user_id',
    ];

    // Un événement appartient à un créateur (user)
    public function creator() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function participants(){
        return $this->belongsToMany(User::class, 'event_user')->withTimestamps();
    }

}
