<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'status_code' => 'VCI',
                'status_name' => 'Vacant Clean Inspected',
            ],
            [
                'status_code' => 'VC',
                'status_name' => 'Vacant Clean',
            ],
            [
                'status_code' => 'VD',
                'status_name' => 'Vacant Dirty',
            ],
            [
                'status_code' => 'OC',
                'status_name' => 'Occupied Clean',
            ],
            [
                'status_code' => 'OD',
                'status_name' => 'Occupied Dirty',
            ],
            [
                'status_code' => 'OS',
                'status_name' => 'Out of Service',
            ],
            [
                'status_code' => 'OO',
                'status_name' => 'Out of Order',
            ],
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
