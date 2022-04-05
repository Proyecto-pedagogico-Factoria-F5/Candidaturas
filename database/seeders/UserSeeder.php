<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;




class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Sara Gonzalez',
            'email' => 'sara.gonzalezsa@gmail.com',
            'password' => \bcrypt('sara.gonzalezsa@gmail.com')
        ])->assignRole('Superadmin');
        User::create([
            'name' => 'Elena Garzón',
            'email' => 'local@gmail.com',
            'password' => \bcrypt('local@gmail.com')
        ])->assignRole('Local');
        User::create([
            'name' => 'Rubén Bertólez',
            'email' => 'regional@gmail.com',
            'password' => \bcrypt('regional@gmail.com')
        ])->assignRole('Regional');
        
        


       // User::factoy()->create();
    }
}
