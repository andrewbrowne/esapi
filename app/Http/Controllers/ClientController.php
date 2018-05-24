<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ClientCollection;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    /**
     * Display a list of clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        if($clients)
            return response([
                'data' => new ClientCollection($recordings)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Clients not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Create a client.
     *
     * @param  \Illuminate\Http\ClientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $client = new Recording;
        $client->client = $request->client;
        $client->save();

        return response([
            'data' => new ClientResource($client)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display a client.
     *
     * @param  int  $client_id
     * @return \Illuminate\Http\Response
     */
    public function show($client_id)
    {
        $client = Client::findOrFail($client_id);

        if($client)
            return response([
                'data' => new ClientResource($client)
            ], Response::HTTP_OK);
        else
            return response([
                'msg' => 'Client not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update a client.
     *
     * @param  \Illuminate\Http\ClientRequest $request
     * @param  int  $client_id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $client_id)
    {
        $client = Client::findOrFail($client_id);
        $data = $request->all();
        $client->fill($data)->save();

        if($client)
            return response([
                'msg' => 'Client successfully updated'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Client not found'
            ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove a client.
     *
     * @param  \int  $client_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($client_id)
    {
        $client = Client::findOrFail($client_id);
        $client->delete();

        if($client)
            return response([
                'msg' => 'Client successfully deleted'
            ], Response::HTTP_CREATED);
        else
            return response([
                'msg' => 'Client not found'
            ], Response::HTTP_NOT_FOUND);
    }
}
