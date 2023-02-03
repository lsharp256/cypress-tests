<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('products')->truncate();
        for ($i = 0; $i < 50; $i++) {
            DB::table('products')->insert([
                'name' => 'Product ' . ($i + 1),
                'description' => 'Dolorem dolorum autem cupiditate autem est eaque et mollitia aut beatae et consequatur omnis reprehenderit eos repellat in velit eos sed consequatur.',
                'price' => $faker->randomFloat(2, 50, 3000),
                'rating' => $faker->randomFloat(1, 1, 5)
            ]);
        }
    }
}
