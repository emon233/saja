<?php

use Illuminate\Database\Seeder;

class ReviewersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Reviewer::create([
            'user_id' => '1',
            'status' => 1
        ]);
    }
}
