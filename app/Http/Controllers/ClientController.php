<?php

namespace App\Http\Controllers;

use App\Http\Requests\{ClientStoreRequest, ClientUpdateRequest};
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientStoreRequest $request)
    {

        $validated = $request->validated();
        $new_client = Client::create($request->all());
        return $new_client;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($client_id)
    {
        return Client::find($client_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'required'
        ]);
        $client = Client::find($id);
        $client->update($request->all());
        return $client;
    }



    /**
     * delete the specified resource in storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return 'client delete';
    }



    /**
     * search the specified resource in storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function search($value)
    {
        return Client::searchClientkghklv  ($value)->paginate(10);
    }
}
