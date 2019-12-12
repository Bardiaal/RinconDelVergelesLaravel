<?php

use App\Categoria;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SeederCategoria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=0; $i<10; $i++)
        {
            Categoria::create(
                [
                    'nombre'=>$faker->word()
                ]
            );
        }
    }
}
