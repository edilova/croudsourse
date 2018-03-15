<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'admin';
        $role_admin->save();

        $role_manager = new Role();
        $role_manager->name = 'manager';
        $role_manager->description = 'manager role';
        $role_manager->save();

        $role_expert = new Role();
        $role_expert->name = 'expert';
        $role_expert->description = 'expert role';
        $role_expert->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'user role';
        $role_user->save();

    }
}
