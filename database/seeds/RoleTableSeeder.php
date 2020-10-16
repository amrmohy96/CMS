<?php

use Illuminate\Database\Seeder;
use App\Models\{Role,User};
use Carbon\Carbon;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // admin role
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'System Administrator',
            'allowed_route' => 'admin'
        ]);
        //editor role
        $editorRole = Role::create([
            'name' => 'editor',
            'display_name' => 'Supervisor',
            'description' => 'System Supervisor',
            'allowed_route' => 'admin'
        ]);
        // user role

        $userRole = Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Normal User',
            'allowed_route' => null
        ]);
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@cms.inc',
            'mobile' => '0100',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123456'),
            'status' => 1
        ]);
        $admin->attachRole($adminRole);

        $editor = User::create([
            'name' => 'Editor',
            'username' => 'editor',
            'email' => 'editor@cms.inc',
            'mobile' => '0101',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123456'),
            'status' => 1
        ]);
        $editor->attachRole($editorRole);

        for ($i = 0; $i < 10 ; $i++){
            $user = User::create([
                'name' => $faker->name,
                'username' => $faker->userName,
                'email' => $faker->email,
                'mobile' => $faker->phoneNumber,
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('123456'),
                'status' => 1
            ]);
            $user->attachRole($userRole);
        }
    }
}
