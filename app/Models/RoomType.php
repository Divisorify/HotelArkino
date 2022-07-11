<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    public $table = "roomtypes";

    protected $fillable = ['type', 'persons', 'beds', 'description', 'price', 'room_id'];

    // protected $attributes = [
    //     'period' => 7,
    // ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
