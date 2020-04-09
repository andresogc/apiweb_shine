<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Profile;
use App\Image;
use App\Http\Controllers\Api\ProfileController;

class ImageController extends Controller
{
    public $successStatus = 200;

    function index()
    {
        $user = Auth::user();
        $id = $user->id;

        $images = Image::all();
        foreach($images as $image){
            $consulta = DB::table('users')
                        ->join('profiles','profiles.user_id','=','users.id')
                        ->where('users.id',$id)
                        ->first();
            echo $image->profiles->foto . '<br>';
            echo $consulta->name .' | '. $consulta->email;
            dd($consulta);
        }
        return response()->json(['success'=>$image], $this-> successStatus);
    }

    public function getImage($nombreFoto){
        $imagenes = \Storage::disk('images_users')->get($nombreFoto);
        return new Response($imagenes,200);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'image_path' => 'image|required'
        ],
        [
            'image_path' => 'El tipo de imagen no corresponde'
        ]);

        $user = Auth::user();
        $id = $user->id;

        $consulta_profile = DB::table('users')
                        ->join('profiles','profiles.user_id','users.id')
                        ->where('users.id',$id)
                        ->select('profiles.id')
                        ->first();

        $profile_id = $consulta_profile->id;

        $subir_imagen = new Image;
        $imagen_perfil = $request->file('image_path');

        if($imagen_perfil){
            ////Cambiar nombre
            $nombre_imagen = time().$imagen_perfil->getClientOriginalName();
            ///Mover imagen al disco
            $mover_imagen = \Storage::disk('images_users')->put($nombre_imagen,\File::get($imagen_perfil));
            //Guardar imagen 
            $subir_imagen->image_path = $nombre_imagen;
            $subir_imagen->description = $request->description;
            $subir_imagen->profile_id = $profile_id;
            $subir_imagen->save();
            dd($subir_imagen);
            return response()->json(['success'=>$subir_imagen], $this->successStatus);
        }else{
            $respuesta = 'Error no existe la imagen';
            dd($respuesta);
            return response()->json(['success'=>$respuesta], $this->successStatus);
        }
    }

}
