<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photographer;

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
    	    "profile_picture" => "img/profile.jpeg"
    	];

        \DB::table('photographers')->insert($data);
    }
}
