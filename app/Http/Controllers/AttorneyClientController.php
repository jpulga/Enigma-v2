<?php

namespace App\Http\Controllers;

use App\Attorney;
use App\AttorneyClient;
use Illuminate\Http\Request;

class AttorneyClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attorneyClients = AttorneyClient::orderBy('created_at', 'desc')->paginate(20);
        return view('attorneyClients.index', compact('attorneyClients'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AttorneyClient  $attorneyClient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $attorneyClient = AttorneyClient::findOrFail($id);
        return view('attorneyClients.show', compact('attorneyClient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AttorneyClient  $attorneyClient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attorneyClient = AttorneyClient::findOrFail($id);
        return view('attorneyClients.edit', compact('attorneyClient'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AttorneyClient  $attorneyClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'attorney_number' => 'required',
            'first_name'      => 'required',
            'middle_name'     => 'required',
            'last_name'       => 'required',
            'dob'             => 'required'
        ]);

        $attorneyClient = AttorneyClient::findOrFail($id);

        $products = collect($request->products)->transform(function($product) {
            $product['first_name']; 
            $product['middle_name'];
            $product['last_name'];
            $product['dob'];

            return new AttorneyClient($product);
        });

        $data = $request->except('products');

        $attorneyClient->update($data);;

        AttorneyClient::where('attorney_id', $attorneyClient->id)->delete();

        $attorneyClient->products()->saveMany($products);

        return redirect()->route('attorneyClients.index')
            ->with('info', 'Successfully updated client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AttorneyClient  $attorneyClient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attorneyClient = AttorneyClient::findOrFail($id);

        AttorneyClient::where('attorney_id', $attorneyClient->id)
            ->delete();

        $attorneyClient->delete();

        return redirect()->route('attorneyClients.index')
            ->with('info', 'Client deleted successfully');
    }
}
