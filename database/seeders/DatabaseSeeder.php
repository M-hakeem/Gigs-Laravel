<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\listing::factory(4)->create();

        $user = User::factory()->create([
            'name' => 'Mohammed Hakeem',
            'email' => 'hakeem@yahoo.com',
            'password' => '123456'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);
    }
}
