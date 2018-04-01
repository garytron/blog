<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Message;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store'] ]);
    }

    public function index()
    {
        //Query Builder
        //$messages = DB::table('messages')->get();
        
        //Eloquent
        $messages = Message::all();
        
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //QUERY BUILDER
        /*DB::table('messages')->insert([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'mensaje' => $request->input('mensaje'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);*/

        //ELOQUENT. Form 1.

        /*$message = new Message;
        $message->nombre = $request->input('nombre');
        $message->email = $request->input('email');
        $message->mensaje = $request->input('mensaje');
        $message->save();*/

        //ELOQUENT. Form 2.
        Message::create($request->all());

        return redirect()->route('messages.create')->with('info', 'Hemos recibido tu mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Query Builder
        /*$message = DB::table('messages')->where('id',$id)->first();*/

        //Eloquent
        $message = Message::findOrFail($id);

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Query Builder.
        /*$message = DB::table('messages')->where('id',$id)->first();*/

        //Eloquent
        $message = Message::findOrFail($id);

        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Query Builder.
        /*DB::table('messages')->where('id',$id)->update([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'mensaje' => $request->input('mensaje'),
            'updated_at' => Carbon::now(),
        ]);*/

        //Eloquent
        $message = Message::findOrFail($id);

        $message->update($request->all());

        return redirect()->route('messages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Query Builder.
        //DB::table('messages')->where('id',$id)->delete();

        //Eloquent
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index');
    }
}
