<?php

namespace App\Http\Controllers;

use App\Events\PasswordResetEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller {
    public function home() {
        $path = public_path('storage/img/');
        $dir = dir($path);
        $files = [];
        while($file = $dir->read())
            if(!($file == '.' || $file == '..')) $files[] = $file;
        $dir->close();
        return view('home', compact(['files']));
    }

    public function fileValidate(String $name) {
        $explode = explode('.', $name);
        return in_array('php', $explode) || in_array('js', $explode) ? false : true;
    }

    public function enviar(Request $request) {
        // caso seja uma imagem válida ele retorna true
        if($request->hasFile('image') && $request->file('image')->isValid() && $this->fileValidate($request->file('image')->getClientOriginalName())) {
            $extension = $request->image->extension(); // pega a extensão do arquivo
            $name = date('Y-m-d-His'); // gera um nome com base na data e horário
            $fileName = "{$name}.{$extension}"; // concatena nome e extensão
            // se tudo ocorrer certo em move_uploaded_file, o if dará falso e não vai ser executado
            if(!move_uploaded_file($request->image, storage_path('app/public/img/' . $fileName)))
                return redirect()->route('home')->with('message', 'Falha ao fazer upload.');
        } else return redirect()->route('home')->with('message', 'Selecione uma imagem válida.');
        return redirect()->route('home')->with('message', 'Upload realizado com sucesso!');
    }

    public function delete(String $fileName) {
        $path = public_path('storage/img/');
        unlink($path . $fileName);
        return redirect()->route('home');
    }

    public function my_profile($username) {
        return view('user.profile', compact(['username']));
    }
}