<?php

use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
            'name' => 'First document'
        ]);

        DB::table('documents')->insert([
            'name' => 'Second document'
        ]);
    }
}
