<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'actividade-list',
           'actividade-create',
           'actividade-edit',
           'actividade-delete',
           'actividade-addFuncionario',
           'actividade-iniciarActividade',
           'car-list',
           'car-create',
           'car-edit',
           'car-delete',
           'consumivel-list',
           'consumivel-create',
           'consumivel-edit',
           'consumivel-delete',
           'customer-list',
           'customer-create',
           'customer-edit',
           'customer-delete',
           'employee-list',
           'employee-create',
           'employee-edit',
           'employee-delete',
           'employee-getEmployees',
           'jobCard-list',
           'jobCard-create',
           'jobCard-edit',
           'jobCard-delete',
           'jobCard-start',
           'jobCard-close',
           'jobCard-getActivity',
           'jobCard-changeStatus'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
