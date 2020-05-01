<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Laravel 5.8',
            'slug' => str_slug('Laravel 5.8')
        ]);
        Channel::create([
            'name' => 'Vue JS',
            'slug' => str_slug('Vue JS')
        ]);
        Channel::create([
            'name' => 'Angular JS',
            'slug' => str_slug('Angular JS')
        ]);
        Channel::create([
            'name' => 'Node JS',
            'slug' => str_slug('Node JS')
        ]);
    }
}
