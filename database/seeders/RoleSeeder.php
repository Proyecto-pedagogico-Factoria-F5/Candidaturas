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

        Permission::create(['name' => 'escuelas-admin.schools.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'escuelas-admin.schools.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'escuelas-admin.schools.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'escuelas-admin.schools.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'livewire.promos.index'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'livewire.promos.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'livewire.promos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'livewire.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'register.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'register.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'register.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'register.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'tokens.tokens.index'])->syncRoles([$role1]);;
        Permission::create(['name' => 'tokens.tokens.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'tokens.tokens.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'tokens.tokens.destroy'])->syncRoles([$role1]);



       // $role1->permissions()->attach() ahorramos esto 
       
    }
}
