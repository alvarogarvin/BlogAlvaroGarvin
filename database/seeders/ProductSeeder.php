<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(20)->create()->each(function($u){
            $u->comments()->saveMany(Comment::factory(1)->make());
        });

        // Product::factory(20)->create();
    }
}
