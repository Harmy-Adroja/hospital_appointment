<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesandPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

       $routes = [
            'doctor.create' => 'add_doctor',
            'doctor.store' => 'add_doctor',
            'doctor.show' => 'view_doctor',
            'doctor.edit' => 'edit_doctor',
            'doctor.update' => 'edit_doctor',
            'doctor.delete' => 'delete_doctor',
            'appointment.show' => 'view_appointments',
            'appointment.approve' => 'approve_appointment',
            'appointment.cancel' => 'cancel_appointment',
            'email.show' => 'view_email',
            'sendemail' => 'send_email',
            'roles.index' => 'view_roles',
            'roles.create' => 'create_role',
            'roles.store' => 'store_role',
            'roles.show' => 'show_role',
            'roles.edit' => 'edit_role',
            'roles.update' => 'update_role',
            'roles.destroy' => 'destroy_role',
        ];

        foreach ($routes as $permissionName) {
            if (!Permission::where('name', $permissionName)->exists()) {
                Permission::create(['name' => $permissionName]);
            }

        }
       
    }
}
