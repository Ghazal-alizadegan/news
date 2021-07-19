<?php

namespace Database\Seeders;

use App\Models\permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin=  Role::query()->create([
            'title'=>'admin'
        ]);
        $admin->permissions()->attach(permission::all());
        User::query()->insert([
            'role_id'=>$admin->id,
            'name'=>'qazal',
            'email'=>'qazal@az.com',
            'mobile'=>'09140000',
            'password'=>bcrypt(123)
        ]);
    }
}
