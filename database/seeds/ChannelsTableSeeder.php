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
            'name'=>'Laravel 7.2',
            'slug'=>Str::slug('Laravel 7.2') ,

        ]);

        Channel::create([
            'name'=>'vue Js',
            'slug'=>Str::slug('vue Js')
        ]);

        Channel::create([
            'name'=>'Node js',
            'slug'=>Str::slug('Node js')
        ]);


    
    }
}
