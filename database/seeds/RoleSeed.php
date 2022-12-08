<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
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
        #Administrador
        $role = Role::create(['name' => 'administrador', 'guard_name' => 'web']);

        //Administrador
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => "App\User",
            'model_id' => 1
        ]);

    }
  
}
