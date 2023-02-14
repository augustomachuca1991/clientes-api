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
        return response()->json(['data' => $clients , 'msg' => 'ok', 'status' => 200]);
    }



    /**
     * store da de alta un nuevo cliente.
     *
     * @param  Request  $request
     * @return Client $new_client
     */
    public function store(ClientStoreRequest $request)
    {
        try {
            $validated = $request->validated();
            $new_client = Client::create($request->all());
            return response()->json(['data' => $new_client,'message' => 'client created successfully','status' => 200]);
        } catch (\Throwable $th) {
            return response()->json(['data' => [],'message' => $th->getMessage() ,'status' => 422]);
        }


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
        if (!$client) {
            return response()->json(['data' => $client,'msg' => 'client not found','status' => 404]);
        }
        return response()->json(['data' => $client,'msg' => 'ok','status' => 200]);
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
        try {
            $validated = $request->validated();
            $client = Client::find($id);
            if (!$client) {
                return response()->json(['data' => $client,'message' => 'client not found','status' => 404]);
            }
            $client->update($request->all());
            return response()->json(['data' => $client,'message' => 'client updated successfully','status' => 200]);
        } catch (\Throwable $th) {
            return response()->json(['data' => [],'message' => $th->getMessage() ,'status' => 422]);
        }


    }



    /**
     * destroy se encarga de elimiar(baja logica) un cliente.
     *
     * @param  $id
     * @return String $string
     */
    public function destroy($id)
    {
        try {
            $client = Client::find($id);
            if (!$client) {
                return response()->json(['data' => $client, 'msg' => 'client not found', 'status' => 404]);
            }
            $client->delete();
            return response()->json(['data' => $client,'msg' => 'client deleted successfully','status' => 200]);
        } catch (\Throwable $th) {
            return response()->json(['data' => [],'message' => $th->getMessage() ,'status' => 500]);
        }

    }




    /**
     * search busca coincidencias por nombres,apellidos y/o email.
     *
     * @param  $value
     * @return Array Client
     */
    public function search($value)
    {
        $clients = Client::searchClient($value)->paginate(10);
        return response()->json(['data' => $clients , 'msg' => 'ok', 'status' => 200]);
    }
}
