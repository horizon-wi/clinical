<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\User;

class UserController extends Controller
{
    


    public function index(){

        $users = User::all()->where('is_deleted', 0);

        return Inertia::render('users/index', ['users' => $users]);

    }





    public function add(){


        return Inertia::render('users/add');

    }



    public function edit($user_id){

        $user = User::find($user_id);

        return Inertia::render('users/edit', ['user' => $user]);

    }




    public function save(Request $request, $user_id=null){

        // @RTODO - Add validation

        if(!empty($user_id)){

            $user = User::find($user_id);
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->save();

        }
        else{

            $user = User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email')
            ]);
            
        }

        return redirect()->action([UserController::class, 'view'], ['user_id' => $user->id]);



    }




    public function view($user_id){

        $user = User::find($user_id);

        return Inertia::render('users/view', ['user' => $user]);

    }



    public function delete($user_id){

        $user = User::find($user_id);
        $user->is_deleted = 1;
        $user->save();

        return redirect()->action([UserController::class, 'index']);

    }




}
