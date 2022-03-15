<?php

namespace App\Http\Controllers;

use App\tw_contactos_corporativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TwContactosCorporativosController extends Controller
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
            'data' => tw_contactos_corporativos::paginate(5),
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
            'S_Nombre' => 'required',
            'S_Puesto' => 'required',
            'S_Email' => 'required|string|email',
        ];

        $input = $request->all();

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()->all()], 406);
        } else {

            $tw_contratos_corporativos = new tw_contactos_corporativos();
            $tw_contratos_corporativos->S_Nombre = $request->S_Nombre;
            $tw_contratos_corporativos->S_Puesto = $request->S_Puesto;
            $tw_contratos_corporativos->S_Comentarios = $request->S_Comentarios;
            $tw_contratos_corporativos->N_TelefonoFijo = $request->N_TelefonoFijo;
            $tw_contratos_corporativos->N_TelefonoMovil = $request->N_TelefonoMovil;
            $tw_contratos_corporativos->S_Email = $request->S_Email;
            $tw_contratos_corporativos->tw_corporativos_id = $request->tw_corporativos_id;
            $tw_contratos_corporativos->save();

            return response()->json(['success' => true, 'data' => $tw_contratos_corporativos], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tw_contactos_corporativos  $tw_contactos_corporativos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (tw_contactos_corporativos::find($id)) {
            return response()->json([
                'success' => true,
                'data' => tw_contactos_corporativos::find($id),
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
     * @param  \App\tw_contactos_corporativos  $tw_contactos_corporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doc = tw_contactos_corporativos::find($id);

        if ($doc) {
            $rules = [
                'S_Nombre' => 'required',
                'S_Puesto' => 'required',
                'S_Email' => 'required|string|email',
            ];

            $input = $request->all();

            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => $validator->errors()->all()], 406);
            } else {
                $tw_contactos_corporativos = tw_contactos_corporativos::find($id);
                $tw_contactos_corporativos->S_Nombre = $request->S_Nombre;
                $tw_contactos_corporativos->S_Puesto = $request->S_Puesto;
                $tw_contactos_corporativos->S_Comentarios = $request->S_Comentarios;
                $tw_contactos_corporativos->N_TelefonoFijo = $request->N_TelefonoFijo;
                $tw_contactos_corporativos->N_TelefonoMovil = $request->N_TelefonoMovil;
                $tw_contactos_corporativos->S_Email = $request->S_Email;
                $tw_contactos_corporativos->tw_corporativos_id = $request->tw_corporativos_id;
                $tw_contactos_corporativos->save();

                return response()->json(['success' => true, 'data' => $tw_contactos_corporativos], 200);
            }
        } else {
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tw_contactos_corporativos  $tw_contactos_corporativos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = tw_contactos_corporativos::find($id);

        if ($doc) {
            $doc->delete();
            return response()->json(['success' => true, 'data' => 'OK'], 202);
        } else {
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }
}
