<?php

use App\Models\Follower;
use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $followers = factory(App\Models\Follower::class)->times(200)->make();
        Follower::insert($followers->toArray());
    }
}
