<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();
        
        $this->call(PhotographerSeeder::class);
        $this->call(AlbumSeeder::class);
        
        Model::reguard();
    }
}
