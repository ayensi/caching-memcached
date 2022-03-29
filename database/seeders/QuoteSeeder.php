<?php

namespace Database\Seeders;

use App\Models\Quote;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=0;$i<20000;$i++)
        {
            Quote::create([
                'name' => $faker->name,
                'quote' => $faker->text,
            ]);
        }
    }
}
