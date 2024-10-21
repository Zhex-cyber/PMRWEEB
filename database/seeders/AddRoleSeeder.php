<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AddRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'name'          => 'Perpustakaan',
                'guard_name'    => 'web'

            ],
            [
                'name'          => 'PPDB',
                'guard_name'    => 'web'
            ]
        ];

        foreach ($role as $roleData) {
            $role = Role::findOrCreate($roleData['name'], $roleData['guard_name']);
            $this->command->info('Data Role ' . $role->name . ' has been saved or already exists.');
        }
    }
}
