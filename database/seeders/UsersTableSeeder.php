<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('users')->delete();

        \DB::table('users')->insert(array (

                1 =>
                array (
                        'id' => 1,
                        'name' => 'Super Admin',
                        'email' => 'admin@mail.com',
                        'password' => '$2y$10$Ic/gYlWUXOxcpSjSqCBoleUW9HWvUxxLQmjjQIz1LhSwziU1OSZkO',
                        'remember_token' => NULL,
                        'created_at' => '2017-11-21 16:07:22',
                        'updated_at' => '2018-09-22 23:34:02',
                        'email_verified_at' => NULL,
                    ),

            )
        );

    }
}
