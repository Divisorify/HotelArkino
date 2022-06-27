<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'roomtype', 'residents','check_in', 'check_out', 'comment'];

    public function offer()
    {
        return $this->hasMany(Offer::class);
    }
}
