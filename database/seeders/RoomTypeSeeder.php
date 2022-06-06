<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\RoomType;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::truncate();
        RoomType::upsert(
            [
                [
                    'type' => 'Classic', 'persons' => '1-2', 'beds' => '1 double bed',
                    'description' => 'Standard room in our hotel has everything what you need to comfortable stay. This is an ideal room for short business trips. Equipment: Internet Wi-Fi, air conditioning, LED TV set telephone, safe, mini bar, coffe and tea maker. ',
                    'price' => '300', 'room_id' => '1',
                ],
                [
                    'type' => 'Studio', 'persons' => '1-2', 'beds' => '1 double bed',
                    'description' => 'A spacious room with queen bed, sofa bed, en-suite shower, ergonomic work space, internet access, broadband connection, 55 inch LCD TV, hairdryer, iron, laptop safe, mini fridge, tea and coffee making facilities. Up to 2 persons',
                    'price' => '350', 'room_id' => '2',
                ],
                [
                    'type' => 'Superior', 'persons' => '1-2', 'beds' => '1 double bed',
                    'description' => 'New generation. Design, modern and comfortable. Ideal for families with a 49" LCD TV with media hub and free WIFI to keep everyone entertained, a soothing rain shower, hairdryer, iron, safe, fridge and tea & coffee making facilities. Up to 2 persons.',
                    'price' => '400', 'room_id' => '3',
                ],
                [
                    'type' => 'Master', 'persons' => '3-4', 'beds' => '2 double bed',
                    'description' => 'All our Superior room features plus a Nespresso coffee machine, free local calls, complimentary water, bathrobe and slippers. Take time to unwind with access to Calm, the number 1 app for meditation and relaxation. Up to 4 perons',
                    'price' => '600', 'room_id' => '4',
                ],
                [
                    'type' => 'Family', 'persons' => '4-5', 'beds' => '2 double bed and 1 single bed',
                    'description' => 'All our Master room features plus a Nespresso coffee machine, free local calls, complimentary water, bathrobe and slippers. Take time to unwind with access to Calm, the number 1 app for meditation and relaxation. Up to 5 persons.',
                    'price' => '900', 'room_id' => '5',
                ],
                [
                    'type' => 'Presidental', 'persons' => '1-2', 'beds' => '1 double bed',
                    'description' => 'The most spacious (measuring 100 m2) and a comfortable apartment in our hotel. He hosted many honors from the world of politics, business and entertainment. A spacious living area with a separate mini office allows you to receive your guests in comfortable conditions. Separated sleeping area with jacuzzi right next to the bed will allow you to relax after even the hardest day. An additional advantage is the bathroom with a private sauna. Equipment: Internet Wi-Fi, air conditioning, LED TV set telephone, safe, mini bar, coffe and tea maker. ',
                    'price' => '1000', 'room_id' => '6',
                ]
            ],
            'type'
        );
    }
}
