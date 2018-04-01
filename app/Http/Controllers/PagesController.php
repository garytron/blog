<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateMessageRequest;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function __construct()
	{
		//$this->middleware('example',['except' => ['home']]);
	}
	public function home()
	{
		return view('home');
	}
	
	public function saludo($nombre = 'Invitado')
	{
		$consolas = [
		"PS4",
		"Xbox One",
		"Wii U"
		];
		//return view('saludo', ['nombre' => $nombre]);
		//return view('saludo')->with(['nombre' => $nombre]);
		return view('saludo', compact('nombre','consolas'));
	}

	public function mensajes(CreateMessageRequest $request)
	{
		$data =  $request->all();

		return redirect()->route('contactos')->with('info','enviado');
	}
}
