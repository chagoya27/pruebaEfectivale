<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\HttpCache\Store;

use function Laravel\Prompts\alert;

class MessageController extends Controller
{

    public function index ()
    {
        //Nombre del archivo
        $fileName = 'mensajes.json';

        //Arreglo para almacenar la informacion de los mensajes
        $messages = [];

        //verificamos que el archivo exista
        if (!Storage::disk('local')->exists($fileName)){
            return redirect()->route('index');
        }

        //obtenemos los archivos del json
        $previousJson = Storage::disk('local')->get($fileName);
        $messages = json_decode($previousJson,true);
        
        return view('view-messages',compact('messages')); 
    }

    public function store(Request $request)
    {
        //Nombre del archivo
        $fileName = 'mensajes.json';

        //Arreglo para almacenar la informacion de los mensajes
        $messages = [];

        //verificamos que el archivo exista
        //si el archivo no existe lo creamos
        //si el archivo existe obtenemos la informacion que tiene
        if (Storage::disk('local')->exists($fileName)){
            $previousJson = Storage::disk('local')->get($fileName);
            $messages = json_decode($previousJson,true);
        }

        //obtenemos la infomracion del $request
        $name = $request->name;
        $email = $request->email;
        $message = $request ->message;

        //creamos el nuevo mensaje
        $newMessage = [
            'name' => $name,
            'email' => $email,
            'message' => $message
        ];

        //insertamos nuevo mensaje
        $messages[] = $newMessage;

        //convertimos a un json todos los mensajes
        $jsonFinal = json_encode($messages, JSON_PRETTY_PRINT);

        //guardamos el archivo
        Storage::disk('local')->put($fileName, $jsonFinal);

        return response()->json([
            'success' => true,
            'message' => 'Mensaje guardado en mensajes.json'
        ]);
    }
}
