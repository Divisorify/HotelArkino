<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        RoomType::truncate();
        Room::truncate();
        Schema::enableForeignKeyConstraints();
        Room::upsert(
            [
                [
                    'type' => 'Classic', 'persons' => '1-2', 'beds' => '1 double bed',
                    'area' => '20', 'price' => '300'
                ],
                [
                    'type' => 'Studio', 'persons' => '1-2', 'beds' => '1 double bed',
                    'area' => '30', 'price' => '350'
                ],
                [
                    'type' => 'Superior', 'persons' => '1-2', 'beds' => '1 double bed',
                    'area' => '40', 'price' => '400'
                ],
                [
                    'type' => 'Master', 'persons' => '3-4', 'beds' => '2 double bed',
                    'area' => '60', 'price' => '600'
                ],
                [
                    'type' => 'Family', 'persons' => '4-5', 'beds' => '2 double bed and 1 single bed',
                    'area' => '80', 'price' => '900'
                ],
                [
                    'type' => 'Presidental', 'persons' => '1-2', 'beds' => '1 double bed',
                    'area' => '100', 'price' => '1000'
                ]
            ],
            'type'
        );

        // for ($i = 0; $i <= 3; $i++) {
        //     DB::table('countries')->insert([
        //         'name' => Str::random(15), 'code' => Str::random(3), 'currency' => Str::random(10),
        //         'area' => rand(0, 99999), 'language' => Str::random(10), 'created_at' => now(), 'updated_at' => now(),
        //     ]);
        // }
    }
}
