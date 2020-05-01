<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Client;
use Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clients.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Auth::user());
        // return "yes store";

        //validation
        $this->validate($request,[
            
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:11|numeric|unique:clients',
            // Rule::unique('users')->ignore($user->id)],
            'address' => 'required'
            ]);
        //store
        // $client = new Client;
        // $client->phone = $request->phone;
        // $client->address = $request->address;
        // $client->client_id=Auth::id();
        // $client->username= Auth::user()->name;
        // $client->save();
        $r=$request->all();
        $r['client_id'] = Auth::id();
        $r['username'] = Auth::user()->name;
        // dd($request->all());
        Client::create($r);

        //redirect
        return redirect()->route('home')->with('success','Phone has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('clients.edit',['client' => Client::find($id)]);
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
        //validation

        //update
        $client= Client::find($id);
        // $client->phone = $request->phone;
        // $client->address = $request->address;
        // $client->save();
        $client->update($request->all());

        //redirect
        return redirect()->route('home'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $client = Client::find($id);
        $client->delete();

        return redirect()->route('home');
    }
}
