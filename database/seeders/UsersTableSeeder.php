<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
           [
                'role' => 'admin',
                'email' => 'admin@coplanner.com'
           ]
        ];

        foreach($types as $row){
            $user = new User();
            $user->name = 'Admin';
            $user->email = $row['email'];
            $user->email_verified_at = now();
            $user->password = bcrypt('123456');
            $user->save();

            //Assign Role
            $user->assignRole($row['role']);
        }
    }
}
