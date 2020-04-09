<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public $successStatus = 200;

    function index(){
        $user = Auth::user();
        $id = $user->id;

        $perfil = Profile::join('users','users.id','profiles.user_id')->where('users.id',$id)->first();

        return response()->json(['success' => $perfil], $this-> successStatus);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $id_user = $user->id;
        
        $foto_perfil = $request->file('foto');

        $profile = new Profile;

        if($foto_perfil){
            //cambiar nombre
            $nombre_foto = time().$foto_perfil->getClientOriginalName();
            //guardarlo en el disco
            $move_image = \Storage::disk('image_profile')->put($nombre_foto,\File::get($foto_perfil));
            //guardar foto
            $profile->foto = $nombre_foto;
        }

        $profile->mobile = $request->mobile;
        $profile->estado_sentimental = $request->estado_sentimental;
        $profile->estatura = $request->estatura;
        $profile->complexion = $request->complexion;
        $profile->hijos = $request->hijos;
        $profile->idioma = $request->idioma;
        $profile->profesion = $request->profesion;
        $profile->alcohol = $request->alcohol;
        $profile->fuma = $request->fuma;
        $profile->hobbie = $request->hobbie;
        $profile->practica_deporte = $request->practica_deporte;
        $profile->deporte_favorito = $request->deporte_favorito;
        $profile->description = $request->description;
        $profile->plan = $request->plan;
        $profile->user_id = $id_user;
        $profile->save();

        return response()->json(['success' => $profile], $this-> successStatus);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        $profile_update = Profile::where('user_id',$id)->first();

        $foto_perfil = $request->file('foto');
        if($foto_perfil){
            ////cambiar nombre
            $nombre_foto = time().$foto_perfil->getClientOriginalName();
            ///mover foto al disco
            $move_image = \Storage::disk('image_profile')->put($nombre_foto,\File::get($foto_perfil));
            //guardar foto
            $profile_update->foto = $nombre_foto;
        }

        $profile_update->mobile = $request->mobile;
        $profile_update->estado_sentimental = $request->estado_sentimental;
        $profile_update->estatura = $request->estatura;
        $profile_update->complexion = $request->complexion;
        $profile_update->hijos = $request->hijos;
        $profile_update->idioma = $request->idioma;
        $profile_update->profesion = $request->profesion;
        $profile_update->alcohol = $request->alcohol;
        $profile_update->fuma = $request->fuma;
        $profile_update->hobbie = $request->hobbie;
        $profile_update->practica_deporte = $request->practica_deporte;
        $profile_update->deporte_favorito = $request->deporte_favorito;
        $profile_update->description = $request->description;
        $profile_update->plan = $request->plan;
        $profile_update->user_id = $id;
        $profile_update->update();

        return response()->json(['success' => $request], $this-> successStatus);
    }
}
