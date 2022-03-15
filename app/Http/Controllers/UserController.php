<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'success' => false,
            'data' => User::paginate(5),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'username' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'S_Activo' => 'required',
            'verified' => 'required',
        ];

        $input = $request->all();

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()->all()], 406);
        } else {

            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->S_Nombre = $request->S_Nombre;
            $user->S_Apellidos = $request->S_Apellidos;
            $user->S_FotoPerfilUrl = $request->S_FotoPerfilUrl;
            $user->S_Activo = $request->S_Activo;
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(10);
            $user->verified = $request->verified;
            $user->save();

            return response()->json(['success' => true, 'data' => $user], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (User::find($id)) {
            return response()->json([
                'success' => true,
                'data' => User::find($id),
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'data' => [],
            ], 404);
        }

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
        $doc = user::find($id);

        if ($doc) {
            $rules = [
                'username' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string',
                'S_Activo' => 'required',
                'verified' => 'required',
            ];

            $input = $request->all();

            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => $validator->errors()->all()], 406);
            } else {
                $user = User::find($id);
                $user->username = $request->get('username');
                $user->email = $request->get('email');
                $user->S_Nombre = $request->get('S_Nombre');
                $user->S_Apellidos = $request->get('S_Apellidos');
                $user->S_FotoPerfilUrl = $request->get('S_FotoPerfilUrl');
                $user->S_Activo = $request->get('S_Activo');
                $user->password = Hash::make($request->get('password'));
                $user->remember_token = Str::random(10);
                $user->verified = $request->get('verified');
                $user->save();

                return response()->json(['success' => true, 'data' => $user], 200);
            }
        } else {
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = User::find($id);

        if ($doc) {
            $doc->delete();
            return response()->json(['success' => true, 'data' => 'OK'], 202);
        } else {
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }
}
