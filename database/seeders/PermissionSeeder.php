<?php

namespace Database\Seeders;

use App\Models\permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       permission::query()->insert([[
           'title'=>'create-category'
       ],
           [
               'title'=>'read-category'
           ],
           [
               'title'=>'update-category'
           ],
           [
           'title'=>'delete-category'
       ]
        ]);
       permission::query()->insert([[
           'title'=>'create-post'
       ],
           [
               'title'=>'read-post'
           ],
           [
               'title'=>'update-post'
           ],
           [
               'title'=>'delete-post'
           ]]);

        permission::query()->insert([[
            'title'=>'create-user'
        ],
            [
                'title'=>'read-user'
            ],
            [
                'title'=>'update-user'
            ],
            [
                'title'=>'delete-user'
            ]]);
        permission::query()->insert([[
            'title'=>'create-role'
        ],
            [
                'title'=>'read-role'
            ],
            [
                'title'=>'update-role'
            ],
            [
                'title'=>'delete-role'
            ]]);
    }
}
