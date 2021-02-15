<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photographer;
use Carbon\Carbon;

class PhotographerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
    		"name" => "Nick Reynolds",
    	    "phone" => "555-555-5555",
    	    "email" => "nick.reynolds@domain.co",
    	    "bio" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
    	    "profile_picture" => "img/profile.jpeg",
            'created_at' => Carbon::now()->toDateTimeString()
    	];

        Photographer::insert($data);
    }
}
