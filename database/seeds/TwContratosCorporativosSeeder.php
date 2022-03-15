<?php

use Illuminate\Database\Seeder;

class TwContratosCorporativosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(tw_corporativos::class, 10)->create();
    }
}
