<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Member;
use Faker\Factory;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakerID=Factory::create('id_ID');
        $fakerUS=Factory::create('us_US');

        foreach(Member::all() as $member){
            
            Book::factory()->create([
                'title' => 'art',
                'year_release' => '1900',
                'author' => $fakerID->name,
                'member_id' => $member->id
            ]);
        }
    }
}
