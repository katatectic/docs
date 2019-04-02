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

        $documents = [
            ['name' => 'Document number one'],
            ['name' => 'Document number two'],
            ['name' => 'Document number three'],
            ['name' => 'Document number four'],
            ['name' => 'Document number fife'],
            ['name' => 'Document number six'],
            ['name' => 'Document number seven'],
            ['name' => 'Document number eight'],
            ['name' => 'Document number nine'],
            ['name' => 'Document number ten']
        ];

        DB::table('documents')->insert($documents);        
    }
}
