<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeedPart2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
         app()['cache']->forget('spatie.permission.cache');
        
         // Criando Papeis 
         $role = Role::create(['name' => 'cliente', 'guard_name' => 'web']);
         $role = Role::create(['name' => 'profissional', 'guard_name' => 'web']);
         $role = Role::create(['name' => 'coworking', 'guard_name' => 'web']);
    }
}
