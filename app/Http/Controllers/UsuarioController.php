<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class UsuarioController extends Controller
{
    public function perfil(){
        return view('perfil', [
            'usuario' => Auth::user()
        ]);
    }

    public function actualizarImagen(Request $request){
        if($request->hasFile('imagen-perfil')){
            $imagen = $request->file('imagen-perfil');
            $ext = $imagen->getClientOriginalExtension();
            $time = time();
//            $imagen_nombre = time() . '.' .$imagen->getClientOriginalExtension();
            $imagen_nombre = "{$time}.{$ext}";
            //jhjhjhjhjhjfh.jpg
            Image::make($imagen)->resize(300,300)->save(public_path('/uploads/imagenes/' . $imagen_nombre));

            //Guardar en Base datos

            $usuario = Auth::user();
            $usuario->avatar = $imagen_nombre;
            $usuario->save();
        }

        return back();
    }
}
