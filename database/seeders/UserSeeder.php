<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            "name" => "Thwe Thwe",
            "phone" => "09923304045",
            "address" => "this is address and address",
            "date_of_birth" => "1/12/2000",
            "gender" => "female",
            "email" => "trz@gmail.com",
            "password" => Hash::make("11223344"),
            "role" => "admin"
        ],);
        User::factory()->create([
            "name" => "Min MIn",
            "phone" => "0992330445",
            "address" => "this is address and address",
            "date_of_birth" => "1/12/2000",
            "gender" => "male",
            "email" => "trz123@gmail.com",
            "password" => Hash::make("11223344"),
            "role" => "staff"
        ],);
        User::factory(10)->create();
    }
}
