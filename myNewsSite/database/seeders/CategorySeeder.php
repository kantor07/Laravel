<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    protected function getData(): array
    {
        $faker = Factory::create();
        $data = [];

        for($i=0;$i<10; $i++) {
            $data[] = [
                'title'         => $faker->jobTitle(),
                'description'   => $faker->text(100),
                'created_at'    => now('Europe/Moscow')
            ];
        }

        return $data;
    }

}
