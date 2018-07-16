<?php

use Illuminate\Database\Seeder;
//add
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //users

        $users = [
        	[
	        	'name' 			=> 'Admin',
	        	'lastname_one'	=> 'Admin',
	        	'lastname_two'	=> 'Admin',
	        	'email' 		=> 'admin@sculpdental.com',
	        	'password' 		=> bcrypt('1'),        		
        	],
			[
	        	'name' 			=> 'Estefani',
	        	'lastname_one'	=> 'Rosete',
	        	'lastname_two'	=> 'Varela',
	        	'email' 		=> 'estefani_rosete@sculpdental.com',
                'doctor_id'     => '1',
	        	'password' 		=> bcrypt('123'),        		
        	],
        	[
	        	'name' 			=> 'Ana Gabriela',
	        	'lastname_one'	=> 'Avila',
	        	'lastname_two'	=> 'Sanchez',
	        	'email' 		=> 'ana_avila@sculpdental.com',
                'doctor_id'     => '2',
	        	'password' 		=> bcrypt('123'),        		
        	],
        	[
	        	'name' 			=> 'Miguel Angel',
	        	'lastname_one'	=> 'Reyes',
	        	'lastname_two'	=> 'Vazquez',
	        	'email' 		=> 'miguel_reyes@sculpdental.com',
                'doctor_id'     => '3',
	        	'password' 		=> bcrypt('123'),        		
        	],
            [
                'name'          => 'Marisol',
                'lastname_one'  => 'Covarrubias',
                'lastname_two'  => 'Leon',
                'email'         => 'marisol_covarrubias@sculpdental.com',
                'doctor_id'     => '4',
                'password'      => bcrypt('123'),               
            ],
            [
                'name'          => 'Carolina',
                'lastname_one'  => 'Atenco',
                'lastname_two'  => 'Reyes',
                'email'         => 'carolina_atenco@sculpdental.com',
                'doctor_id'     => '5',
                'password'      => bcrypt('123'),               
            ],                                    
        	[
	        	'name' 			=> 'Recepcionista',
	        	'lastname_one'	=> '',
	        	'lastname_two'	=> '',
	        	'email' 		=> 'recepcionista@sculpdental.com',
	        	'password' 		=> bcrypt('123'),        		
        	]      	
        ];

        foreach ($users as $user) {
        	User::create( $user );
        }

        //permisos
        $permissions = [
            [
                'name' => 'Menu de Usuarios',
                'slug' => 'menu.users' 
            ],            
            //clientes
            [
                'name' => 'Menu de Clientes',
                'slug' => 'menu.clients' 
            ],              
            [
                'name' => 'Lista de clientes',
                'slug' => 'users.index' 
            ],
            [
                'name' => 'Crear cliente',
                'slug' => 'users.create' 
            ],
            [
                'name' => 'Editar cliente',
                'slug' => 'users.edit' 
            ],
            [
                'name' => 'Ver detalle de cliente',
                'slug' => 'users.show' 
            ],
            [
                'name' => 'Eliminar cliente',
                'slug' => 'users.destroy' 
            ],
            //doctores  
            [
                'name' => 'Menu de Doctores',
                'slug' => 'menu.doctors' 
            ],                   
            [
                'name' => 'Lista de doctores',
                'slug' => 'doctors.index' 
            ],
            [
                'name' => 'Crear doctor',
                'slug' => 'doctors.create' 
            ],
            [
                'name' => 'Editar doctor',
                'slug' => 'doctors.edit' 
            ],
            [
                'name' => 'Ver detalle de doctor',
                'slug' => 'doctors.show' 
            ],
            [
                'name' => 'Eliminar doctor',
                'slug' => 'doctors.destroy' 
            ],   
            [
                'name' => 'Ver calendario de citas',
                'slug' => 'doctors.calendar' 
            ],                  
            //citas
            [
                'name' => 'Menu de Citas',
                'slug' => 'menu.quotes' 
            ],                     
            [
                'name' => 'Lista de citas',
                'slug' => 'quotes.index' 
            ],
            [
                'name' => 'Crear cita',
                'slug' => 'quotes.create' 
            ],
            [
                'name' => 'Editar cita',
                'slug' => 'quotes.edit' 
            ],
            [
                'name' => 'Ver detalle de cita',
                'slug' => 'quotes.show' 
            ],
            [
                'name' => 'Eliminar cita',
                'slug' => 'quotes.destroy' 
            ],  
            //tratamientos                 
            [
                'name' => 'Lista de tratamientos',
                'slug' => 'treatments.index' 
            ],
            [
                'name' => 'Crear tratamiento',
                'slug' => 'treatments.create' 
            ],
            [
                'name' => 'Editar tratamiento',
                'slug' => 'treatments.edit' 
            ],
            [
                'name' => 'Ver detalle de tratamiento',
                'slug' => 'treatments.show' 
            ],
            [
                'name' => 'Eliminar tratamiento',
                'slug' => 'treatments.destroy' 
            ],                                
            //servicios
            [
                'name' => 'Menu de Servicios',
                'slug' => 'menu.services' 
            ],                     
            [
                'name' => 'Lista de servicios',
                'slug' => 'services.index' 
            ],
            [
                'name' => 'Crear servicio',
                'slug' => 'services.create' 
            ],
            [
                'name' => 'Editar servicio',
                'slug' => 'services.edit' 
            ],
            [
                'name' => 'Ver detalle de servicio',
                'slug' => 'services.show' 
            ],
            [
                'name' => 'Eliminar servicio',
                'slug' => 'services.destroy' 
            ],                                                            
        ];

        foreach ($permissions as $permission) {
            Permission::create( $permission );
        }

        //roles
        $roles = [
            [
                'name' => 'Administrador',
                'slug' => 'admin',
                'description' => 'Tiene acceso a todas las funcionalidades del sistema.',
                'special' => 'all-access',
            ],
            [
                'name' => 'Administrador restringido',
                'slug' => 'admin_res',
                'description' => 'Tiene acceso casi a todas las funcionalidades.',
                'special' => null,
            ],            
            [
                'name' => 'Doctor',
                'slug' => 'doctor',
                'description' => 'Tiene acceso a revisar su calendario de citas.',
            ],
            [
                'name' => 'Recepcionista',
                'slug' => 'recep',
                'description' => 'Tiene acceso a agendar citar para los doctores.',
            ]       
        ];

        foreach ($roles as $role) {
            Role::create( $role );
        }

        //asignar todos los permisos al admin
        //$user = User::find(1);
        //$user->roles()->attach(1);
        //asignar permisos al rol de recepcionista
        $role = Role::find(2);
        $role->permissions()->attach( [1,2,3,4,5,6,7,8,9,10,11,12,13,26,27,28,29,30,31] );
        $user = User::find(1);
        $user->roles()->attach(2);        
        //asignar permisos al rol de recepcionista
        $role = Role::find(4);
        $role->permissions()->attach( [1,2,3,4,5,6,15,16,17,18,19,20] );
        $user = User::find(7);
        $user->roles()->attach(4);
        //asignar permisos doctores
        $role = Role::find(3); 
        $role->permissions()->attach( [14,21,22,23,24,25] );
        $user = User::find(2); //stef
        $user->roles()->attach(3); 
        $user = User::find(3); //gab
        $user->roles()->attach(3); 
        $user = User::find(4); //mig
        $user->roles()->attach(3);   
        $user = User::find(5); //mari
        $user->roles()->attach(3);                                 
        $user = User::find(6); //caro
        $user->roles()->attach(3);        

    }
}
