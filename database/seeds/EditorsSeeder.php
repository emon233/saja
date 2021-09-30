<?php

use Illuminate\Database\Seeder;

class EditorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Editor::create([
            'user_id' => '1',
            'status' => 1
        ]);
    }
}
