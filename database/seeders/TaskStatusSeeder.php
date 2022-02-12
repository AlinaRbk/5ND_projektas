<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_statuses')->insert([
            'title' => 'Completed',
        ]);
        DB::table('task_statuses')->insert([
            'title' => 'On Hold',
        ]);
        DB::table('task_statuses')->insert([
            'title' => 'Started',
        ]);
    }
}
