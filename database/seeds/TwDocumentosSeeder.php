<?php

use App\tw_documentos;
use Illuminate\Database\Seeder;

class TwDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(tw_documentos::class, 10)->create();
    }
}
