<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User
        Permission::create([
            'name'          => 'Browse users',
            'slug'          => 'users.index',
            'description'   => 'List and browse all system users', 
        ]);

        Permission::create([
            'name'          => 'See user details',
            'slug'          => 'users.show',
            'description'   => 'See in detail each user of the system', 
        ]);

        Permission::create([
            'name'          => 'Create user',
            'slug'          => 'users.create',
            'description'   => 'Create system users', 
        ]);

        Permission::create([
            'name'          => 'User edition',
            'slug'          => 'users.edit',
            'description'   => 'Edit any data of a user of the system', 
        ]);

        Permission::create([
            'name'          => 'Delete user',
            'slug'          => 'users.destroy',
            'description'   => 'Remove any user from the system', 
        ]);

        //Role
        Permission::create([
            'name'          => 'Browse roles',
            'slug'          => 'roles.index',
            'description'   => 'List and browse all system roles', 
        ]);

        Permission::create([
            'name'          => 'See detail of the role',
            'slug'          => 'roles.show',
            'description'   => 'See in detail each role of the system', 
        ]);

        Permission::create([
            'name'          => 'Create roles',
            'slug'          => 'roles.create',
            'description'   => 'create role of the system', 
        ]);

        Permission::create([
            'name'          => 'Edit role',
            'slug'          => 'roles.edit',
            'description'   => 'Edit any data in a system role', 
        ]);

        Permission::create([
            'name'          => 'Delete role',
            'slug'          => 'roles.destroy',
            'description'   => 'Remove any role from the system', 
        ]);

        //Attorney
        Permission::create([
            'name'          => 'Browse attorneys',
            'slug'          => 'attorneys.index',
            'description'   => 'List and browse all the attorneys in the system.', 
        ]);

        Permission::create([
            'name'          => 'See detail of the attorney',
            'slug'          => 'attorneys.show',
            'description'   => 'See in detail each system attorney', 
        ]);

        Permission::create([
            'name'          => 'Create attorney',
            'slug'          => 'attorneys.create',
            'description'   => 'Create system attorneys', 
        ]);

        Permission::create([
            'name'          => 'Edit attorney',
            'slug'          => 'attorneys.edit',
            'description'   => 'Edit any information of a attorney of the system.', 
        ]);

        Permission::create([
            'name'          => 'Delete attorney',
            'slug'          => 'attorneys.destroy',
            'description'   => 'Remove any attorney from the system.', 
        ]);

        //AttorneyClient
        Permission::create([
            'name'          => 'Browse clients',
            'slug'          => 'attorneyClients.index',
            'description'   => 'List and browse all the clients in the system.', 
        ]);

        Permission::create([
            'name'          => 'See detail of the client',
            'slug'          => 'attorneyClients.show',
            'description'   => 'See in detail each system client', 
        ]);

        Permission::create([
            'name'          => 'Create client',
            'slug'          => 'attorneyClients.create',
            'description'   => 'Create system clients', 
        ]);

        Permission::create([
            'name'          => 'Edit client',
            'slug'          => 'attorneyClients.edit',
            'description'   => 'Edit any information of a client of the system.', 
        ]);

        Permission::create([
            'name'          => 'Delete client',
            'slug'          => 'attorneyClients.destroy',
            'description'   => 'Remove any client from the system.', 
        ]);
    }
}
