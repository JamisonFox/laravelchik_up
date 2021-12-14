<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
            ->count(50)
            ->create();


//        for ($i = 0; $i < 100; $i++) {
//        //DB::tabel('products')->select('*')->get();
//        DB::table('products')->insert([
//            'name' => 'Product name' . $i,
//            'price' => $i * 1000,
//        ]);
//        }
    }
}
