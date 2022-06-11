<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'room_id', 'check_in', 'check_out'];

    public function reservations()
    {
        return $this->hasMany(Reservations::class);
    }
}
