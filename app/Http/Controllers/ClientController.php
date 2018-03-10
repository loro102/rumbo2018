<?php

namespace App\Http\Controllers;


use App\Client;
use App\Http\Requests\ClientRequest;
use App\User;
use function compact;
use DB;
use function dd;
use Illuminate\Http\Request;
use function view;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //


        $clientes= (new Client)->orderBy('apellidos','ASC')
            ->orderBy('nombre','ASC')
            ->paginate(20,['id','nombre','apellidos','nif']);
        //dd($clientes);
        return view('programa.clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        //
        //$request->merge(['user'=>auth()->id()]);
        Client::create($request->all());
        return back()->with('message',['success',__('Cliente creado correctamente')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Client $cliente)
    {
        //
        //dd($clientes);
        return view('programa.clientes.show',compact('cliente'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Client $client)
    {
        //
        return view('programa.clientes.edit',compact('client'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest  $client)
    {
        //
        //dd($client->id);
        $cliente=Client::findOrFail($client->id);
        $cliente->fill($client->input())->save();

        return back()->with('message',['success',__('Cliente editado correctamente')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
