<?php

namespace Database\Seeders;

use App\Models\Process;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcessSeeder extends Seeder
{
    public function run(): void
    {
        $to = Carbon::parse('2024-02-01');

        for ($i = 0; $i < 10; $i++){
            $earned = random_int(2500, 3500);

            $day = [
                'date' => $to->toDateString(),
                'earned' => (string)$earned,
                'salary' => (string)($earned - 40),
                'park_commission' => '40',
//            'gasoline_from_account' => '---',
                //'gasoline_for_cash' => ''
            ];
            Process::create($day);
            $to = $to->addDay();
        }
    }
}
