<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Facade;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'), 
            'role'=> '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
