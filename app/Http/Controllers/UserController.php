<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        /* $users = User::all();
        return response()->json([
            'status' => true,
            'message' => 'List of users',
            'data' => $users
        ]); */
    }

    public function store(Request $request)
    {
       /*  $user = User::create($request->all());

        return response()->json($user, 201); */
        //validando los campos del formulario
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'=> 'required',
            'mobile'=> 'numeric',
            'type'=>'string'
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->password),
            'mobile' => $request->mobile,
            'type' => $request->type,
        ]);

        if ($user->type === 'employee') {
            Employee::create([
                'user_id' => $user->id,
            ]);
        }
        if ($user->type === 'manager') {
            Manager::create([
                'user_id' => $user->id,
            ]);
        }
        return response()->json([
            'sucsess'=>true,
            $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
