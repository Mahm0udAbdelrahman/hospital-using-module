<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name'      => 'Superadmin',
            'email'     => 'superadmin@gmail.com',
            'password'  => bcrypt('12345678'),
            'phone' => '+201146613334'
        ]);
        $superadmin->assignRole('superadmin');

        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('12345678'),
            'phone' => '13156456456',
        ]);
        $admin->assignRole('admin');

        $operator = User::create([
            'name'      => 'Operator',
            'email'     => 'operator@gmail.com',
            'password'  => bcrypt('12345678'),
            'phone' => '56456456456',

        ]);
        $operator->assignRole('operator');
    }
}