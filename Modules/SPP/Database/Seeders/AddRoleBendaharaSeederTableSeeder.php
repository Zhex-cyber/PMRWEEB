<?php

namespace Modules\SPP\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class AddRoleBendaharaSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the role name and guard name
        $roleName = 'Bendahara';
        $guardName = 'web';

        // Use findOrCreate to avoid duplication
        $role = Role::findOrCreate($roleName, $guardName);

        $this->command->info('Role ' . $role->name . ' has been saved or already exists.');
    }
}
