<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;
use Carbon\Carbon;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'photographer_id' => 1,
        		'title' => 'Nandhaka Pieris',
        		'description' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        		'img' => 'landscape1.jpeg',
        		'date' => "2015-05-01",
        		'featured' => true,
        		'created_at' => Carbon::now()->toDateTimeString()
        	],
        	[
        		'photographer_id' => 1,
        		'title' => 'New West Calgary',
        		'description' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        		'img' => 'landscape2.jpeg',
        		'date' => "2016-05-01",
        		'featured' => false,
        		'created_at' => Carbon::now()->toDateTimeString()
        	],
        	[
        		'photographer_id' => 1,
        		'title' => 'Australian Landscape',
        		'description' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        		'img' => 'landscape3.jpeg',
        		'date' => "2015-02-02",
        		'featured' => false,
        		'created_at' => Carbon::now()->toDateTimeString()
        	],
        	[
        		'photographer_id' => 1,
        		'title' => 'Halvergate Marsh',
        		'description' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        		'img' => 'landscape4.jpeg',
        		'date' => "2014-04-01",
        		'featured' => true,
        		'created_at' => Carbon::now()->toDateTimeString()
        	],
        	[
        		'photographer_id' => 1,
        		'title' => 'Rikkis Landscape',
        		'description' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        		'img' => 'landscape5.jpeg',
        		'date' => "2010-09-01",
        		'featured' => true,
        		'created_at' => Carbon::now()->toDateTimeString()
        	],
        	[
        		'photographer_id' => 1,
        		'title' => 'Kiddi Kristjans Iceland',
        		'description' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        		'img' => 'landscape6.jpeg',
        		'date' => "2015-07-21",
        		'featured' => false,
        		'created_at' => Carbon::now()->toDateTimeString()
        	],
        ];

        Album::insert($data);
    }
}
