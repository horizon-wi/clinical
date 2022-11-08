<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Models\Client;

class ClientsController extends Controller{


    public function index(){
        
        $clients = Client::all()->where('is_deleted', 0);

        return Inertia::render('clients/index',['clients' => $clients]);

    }


    public function add(){

        return Inertia::render('clients/add');

    }




    public function view($client_id){
        
        $client = Client::find($client_id);

        return Inertia::render('clients/view', ['client' => $client]);

    }




    public function edit($client_id){

        $client = Client::find($client_id);

        return Inertia::render('clients/edit', ['client' => $client]);

    }


    


    public function save(Request $request, $client_id=null){

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required|date'
        ]);

        if(!empty($client_id)){

            $client = Client::find($client_id);
            $client->first_name = $request->input('first_name');
            $client->last_name = $request->input('last_name');
            $client->dob = $request->input('dob');
            $client->save();

        }
        else{

            $client = Client::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'dob' => $request->input('dob')
            ]);

        }

        return redirect()->action([ClientsController::class, 'view'], ['client_id' => $client->client_id]);

    }



    public function delete($client_id){

        $client = Client::find($client_id);
        $client->is_deleted = 1;
        $client->save();

        return redirect()->action([ClientsController::class, 'index']);

    }




}