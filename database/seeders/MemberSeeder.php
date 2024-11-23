<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakerID=Factory::create('id_ID');
        $fakerUS=Factory::create('us_US');

        Member::factory()->create([
            'name'=>$fakerID->name,
            'address'=>$fakerID->address,
            'email'=>$fakerID->email,
            'phone_number'=>$fakerID->phoneNumber,
        ]);

        Member::factory()->create([
            'name'=>$fakerUS->name,
            'address'=>$fakerID->address,
            'email'=>$fakerID->email,
            'phone_number'=>$fakerUS->phoneNumber,
        ]);
    }
}
