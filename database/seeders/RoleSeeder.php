<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

         $role1 = Role::create(['name' => 'Superadmin']);
         $role2 = Role::create(['name' => 'Regional']);
         $role3 = Role::create(['name' => 'Provincial']);
         $role4 = Role::create(['name' => 'Local']);

        //Permission::create(['name' => 'superadmin.home'])->syncRoles([$role1]);

        Permission::create(['name' => 'perfiles.profiles.index'])->syncRoles([$role1]); //perfiles vista, profiles complemento, index función
        Permission::create(['name' => 'perfiles.profiles.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'perfiles.profiles.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'perfiles.profiles.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'escuelas.schools.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'escuelas.schools.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'escuelas.schools.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'escuelas.schools.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'promos.promos.index'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'promos.promos.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'promos.promos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'promos.promos.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'superadmin.tokens.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.tokens.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.tokens.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.tokens.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'tokens.index'])->syncRoles([$role1]);;
        Permission::create(['name' => 'tokens.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'tokens.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'tokens.destroy'])->syncRoles([$role1]);



       // $role1->permissions()->attach() ahorramos esto 
       
    }
}
