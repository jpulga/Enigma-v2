<?php

namespace App\Http\Controllers;

use App\Attorney;
use App\AttorneyClient;
use App\Http\Requests;
use Illuminate\Http\Request;

class AttorneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $attorneys = Attorney::first_name($request->get('first_name'))->orderBy('id', 'asc')
            ->paginate(20);
        return view('attorneys.index', compact('attorneys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count = \DB::table('attorneys')->select('attorney_number')->limit(1)->orderBy('attorney_number', 'desc')->value('attorney_number');
        return view('attorneys.create', compact('count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'attorney_number' => 'required',
            'first_name'      => 'required',
            'middle_name'     => 'required',
            'last_name'       => 'required',
            'dob'             => 'required'
        ]);

        $products = collect($request->products)->transform(function($product) {
            $product['first_name']; 
            $product['middle_name'];
            $product['last_name'];
            $product['dob'];
            return new AttorneyClient($product);
        });

        $data = $request->except('products');

        $attorney = Attorney::create($data);

        $attorney->products()->saveMany($products);

        return redirect()->route('attorneys.index')
            ->with('info', 'Attorney successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attorney  $attorney
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attorney = Attorney::with('products')->findOrFail($id);
        return view('attorneys.show', compact('attorney'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attorney  $attorney
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attorney = Attorney::with('products')->findOrFail($id);
        return view('attorneys.edit', compact('attorney'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attorney  $attorney
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

        $attorney = Attorney::findOrFail($id);

        $products = collect($request->products)->transform(function($product) {
            $product['first_name']; 
            $product['middle_name'];
            $product['last_name'];
            $product['dob'];

            return new AttorneyClient($product);
        });

        $data = $request->except('products');

        $attorney->update($data);;

        AttorneyClient::where('attorney_id', $attorney->id)->delete();

        $attorney->products()->saveMany($products);

        return redirect()->route('attorneys.index')
            ->with('info', 'Successfully updated attorney');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attorney  $attorney
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attorney = Attorney::findOrFail($id);

        AttorneyClient::where('attorney_id', $attorney->id)
            ->delete();

        $attorney->delete();

        return redirect()->route('attorneys.index')
            ->with('info', 'Attorney deleted successfully');
    }
}
