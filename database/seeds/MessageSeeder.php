<?php

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $messages = [
            [
                'name' => "dummy",
                'email' => "dummy@example.com",
                'message' => "Test Message",
                'read_status' => 0,
                'created_at' => new DateTime,
                'updated_at' => null,
            ]
        ];

        DB::table('messages')->insert($messages);
    }
}
