<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $data = new User;
        $data->name = "admin";
        $data->username = "admin";
        $data->email = "admin@kos95.id";
        $data->password = Hash::make("admin");
        $data->save();
    }
}
