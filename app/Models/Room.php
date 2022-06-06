<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'persons', 'beds', 'area', 'price'];

    public function roomtypes()
    {
        return $this->hasMany(RoomType::class);
    }
}
