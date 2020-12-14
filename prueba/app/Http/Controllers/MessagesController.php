<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Message;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Events\MessageWasReceived;
use App\Repositories\cacheMessages;
use App\Repositories\Messages;
use App\Repositories\MessagesInterface;
use Illuminate\Support\Facades\Cache;

class MessagesController extends Controller
{

    protected $messages;

    function __construct(MessagesInterface $messages)
    {
        $this->messages = $messages;
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $messages = $this->messages->getPaginated();

        // $key = "messages.page." . request('page', 1);

        // // cuando se usa redis, para no tener que borrar todo con el flush
        // // $messages = Cache::tags('messages')->rememberForever($key, function () {
        // $messages = Cache::rememberForever($key, function () {
        //     return Message::with(['user', 'note', 'tags'])
        //         ->orderBy('created_at', request('sorted', 'DESC'))
        //         ->paginate(10);
        // });

        // if (Cache::has($key)) {
        //     $messages = Cache::get('messages.all');
        // } else {

        //     //$messages = DB::table('messages')->get();
        //     $messages = Message::with(['user', 'note', 'tags'])
        //         ->orderBy('created_at', request('sorted', 'DESC'))
        //         ->paginate(10);

        //     Cache::put('messages.all', $messages, 5);
        // }


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
        // guardar mensaje

        // DB::table('messages')->insert([
        //     "nombre" => $request->input('nombre'),
        //     "email" => $request->input('email'),
        //     "mensaje" => $request->input('mensaje'),
        //     "created_at" => Carbon::now(),
        //     "updated_at" => Carbon::now()
        // ]);

        // $message = new Message;
        // $message->nombre = $request->input('nombre');
        // $message->email = $request->input('email');
        // $message->mensaje = $request->input('mensaje');
        // $message->save();

        // $message = Message::create($request->all());

        // if (auth()->check()) {
        //     auth()->user()->messages()->save($message);
        // }

        //auth()->user()->messages()->create($request->all());
        // $message->user_id = auth()->id();
        // $message->save();

        //Cache::tags()->flush();
        //Cache::flush();

        $message = $this->messages->store($request);

        event(new MessageWasReceived($message));

        // Mail::send('emails.contact', ['msg' => $message], function ($m) use ($message) {
        //     $m->to($message->email, $message->nombre)->subject('Tu mensaje fue recibido');
        // });

        // redireccionar
        return redirect()->route('messages.create')->with('info', 'Hemos recibido tu mensaje.');

        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $message = Cache::rememberForever("messages.{$id}", function () use ($id) {
        //     return Message::findOrFail($id);
        // });
        //$message = DB::table('messages')->where('id', $id)->first();

        $message = $this->messages->findById($id);
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
        $message = $this->messages->findById($id);
        // $message = Cache::rememberForever("messages.{$id}", function () use ($id) {
        //     return Message::findOrFail($id);
        // });
        // $message = DB::table('messages')->where('id', $id)->first();

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
        // actualizamos
        // DB::table('messages')->where('id', $id)->update([
        //     "nombre" => $request->input('nombre'),
        //     "email" => $request->input('email'),
        //     "mensaje" => $request->input('mensaje'),
        //     "updated_at" => Carbon::now()
        // ]);

        //Message::findOrFail($id)->update($request->all());


        $message = $this->messages->update($request, $id);

        // Cache::tags('messages')->flush();
        // Cache::flush();

        // redireccionamos
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

        // eliminar mensaje
        //DB::table('messages')->where('id', $id)->delete();

        // Message::findOrFail($id)->delete();

        // // Cache::tags('messages')->flush();
        // Cache::flush();

        $this->messages->destroy($id);

        // redireccionamos
        return redirect()->route('messages.index');
    }
}
