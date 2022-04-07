<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\Models\Permission;


class SeederTablePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // role table
            'view-role',
            'create-role',
            'edit-role',
            'delete-role',
            // token table
            'view-token',
            'create-token',
            'edit-token',
            'delete-token',
            // schools table
            /* 'view-school',
            'create-school',
            'edit-school',
            'delete-school', */
        ];
        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }

    }
}
