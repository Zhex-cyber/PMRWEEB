<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $user = User::create([
            'name'      => 'Admin_Dika',
            'username'  => 'Dika',
            'nis'     => '222310271',
            'role'      => 'Admin',
            'status'    => 'Aktif',
            'password'  => bcrypt('Bismillah')
        ]);

        $user->assignRole('Admin');

        $this->command->info('Data User '.$user->name.' has been saved.');

    }
}
