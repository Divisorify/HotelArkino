<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// php artisan resdb - cofa migracje, wykonuje migracje, wywołuje seedery
Artisan::command('resdb', function () {
    // Utworzenie bufora
    $output = new BufferedOutput;
    // Wywołanie komendy migrate:refresh i zapis wyjścia komendy do bufora
    Artisan::call('migrate:refresh',outputBuffer:$output);
    // Wypisanie wyjścia w konsoli
    $this->comment($output->fetch());


    Artisan::call('db:seed',outputBuffer:$output);
    $this->comment($output->fetch());
})->purpose('Reverse and do migrations then populate db with seeders');
