<?php

namespace App\Http\Controllers;

use App\Http\Requests\{ClientStoreRequest, ClientUpdateRequest};
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * index lista todos los clientes.
     *
     * @return Array Client
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return response()->json($clients);
    }

    /**
     * store da de alta un nuevo cliente.
     *
     * @param  Request  $request
     * @return Client $new_client
     */
    public function store(ClientStoreRequest $request)
    {

        $validated = $request->validated();
        $new_client = Client::create($request->all());
        $data = [
            'message' => 'client created successfully',
            'data' => $new_client
        ];
        return response()->json($data);

    }

    /**
     * show muestra un cliente especifico.
     *
     * @param  id
     * @return Client $client
     */
    public function show($client_id)
    {
        $client = Client::find($client_id);
        return response()->json($client);
    }

    /**
     * Update actualiza los datos de un cliente.
     *
     * @param  Request  $request
     * @param  $id
     * @return Client $client
     */
    public function update(ClientUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $client = Client::find($id);
        $client->update($request->all());
        $data = [
            'message' => 'client updated successfully',
            'data' => $client
        ];
        return response()->json($data);
    }



    /**
     * destroy se encarga de elimiar(baja logica) un cliente.
     *
     * @param  $id
     * @return String $string
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        $data = [
            'message' => 'client deleted successfully',
            'data' => $client
        ];
        return response()->json($data);
    }



    /**
     * search busca coincidencias por nombres,apellidos y/o email.
     *
     * @param  $value
     * @return Array Client
     */
    public function search($value)
    {
        return response()->json(Client::searchClient($value)->paginate(10));
    }
}
