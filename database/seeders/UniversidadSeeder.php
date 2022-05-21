<?php

namespace Database\Seeders;

use Database\Factories\UniversidadFactory;
use Illuminate\Database\Seeder;

class UniversidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UniversidadFactory::class,10);
    }
}
