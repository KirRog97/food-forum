<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Picture;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(
            [
                'username'           =>  'Kir Rog',
                'email'              =>  'kirriog97@github.com',
                'password'           =>  bcrypt('123456'),
                'avatar_id'          =>  Picture::factory()->avatar()->create()->id,
                'password'           =>  bcrypt('secret'),
                'remember_token'     =>  Str::random(10),
                'email_verified_at'  =>  now(),
            ]
        );

        $user->assignRole('super-admin');
    }
}
