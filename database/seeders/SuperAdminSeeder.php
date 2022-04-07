<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Ali',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('ali@gmail.com')
        ]);

        //Si ejecutamos este seed antes de tener ningún role en la BD, descomentar las líneas siguientes y comentar la 35

        $role = Role::create(['name' => 'SuperAdmin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        //$user->assignRole('SuperAdmin');
    }
}
