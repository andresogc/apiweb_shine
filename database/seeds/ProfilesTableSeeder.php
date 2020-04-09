<?php

use Illuminate\Database\Seeder;
use App\Profile;
use Carbon\Carbon;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'mobile' => '342342342',
            'estado_sentimental' => 'Soltero',
            'estatura' => '170',
            'complexion' => 'Delgado',
            'hijos' => 'No',
            'idioma' => 'Español',
            'profesion' => 'Ing Sistemas',
            'alcohol' => 'No',
            'fuma' => 'No',
            'hobbie' => 'Desarrollar, leer, tocar guitarra',
            'practica_deporte' => 'No',
            'deporte_favorito' => 'Bolos',
            'description' => 'Soy un hombre con disposicion a buscar una relacion seria',
            'user_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}

?>