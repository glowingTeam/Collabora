<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('event')->insert([
            'name_event' => 'Gemuruh Belakang Gawang',
            'location' => 'Surabaya, Jawa Timur',
            'description_event' => 'Mendatangkan band lokal',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
