<?php

namespace Database\Seeders;

use App\Models\Reservations;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservation = Reservations::create([
            'email' => 'marta@email.com', 
            'room_id' => '1',
            'check_in' =>Carbon::parse('2022-06-17')->format('Y-m-d'),
            'check_out' =>Carbon::parse('2022-06-20')->format('Y-m-d'),
        ]);
        $reservation->save();
    }
}
