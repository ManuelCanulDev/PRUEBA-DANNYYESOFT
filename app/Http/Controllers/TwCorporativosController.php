<?php

namespace App\Http\Controllers;

use App\Http\Resources\TwCorporativoResource;
use App\Http\Resources\TwCorporativosCollection;
use App\tw_corporativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TwCorporativosController extends Controller
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
            'data' => new TwCorporativosCollection(tw_corporativos::paginate(5)),
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
            'S_NombreCorto' => 'required|string',
            'S_NombreCompleto' => 'required|string',
            'S_DBName' => 'required|string',
            'S_DBUsuario' => 'required|string',
            'S_DBPassword' => 'required|string',
            'S_SystemUrl' => 'required|string',
            'S_Activo' => 'required|string',
            'D_FechaIncorporacion' => 'required',
            'tw_usuarios_id' => 'required',
        ];

        $input = $request->all();

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()->all()], 422);
        } else {

            $corporativo = new tw_corporativos();
            $corporativo->S_NombreCorto = $request->S_NombreCorto;
            $corporativo->S_NombreCompleto = $request->S_NombreCompleto;
            $corporativo->S_LogoURL = $request->S_LogoURL;
            $corporativo->S_DBName = $request->S_DBName;
            $corporativo->S_DBUsuario = $request->S_DBUsuario;
            $corporativo->S_DBPassword = $request->S_DBPassword;
            $corporativo->S_SystemUrl = $request->S_SystemUrl;
            $corporativo->S_Activo = $request->S_Activo;
            $corporativo->D_FechaIncorporacion = $request->D_FechaIncorporacion;
            $corporativo->tw_usuarios_id = $request->tw_usuarios_id;
            $corporativo->FK_Asignado_id = $request->FK_Asignado_id;
            $corporativo->save();

            return response()->json(['success' => true, 'data' => $corporativo], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tw_corporativos  $tw_corporativos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (tw_corporativos::find($id)) {
            return response()->json([
                'success' => true,
                'data' => tw_corporativos::find($id),
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'data' => 'NOT FOUND'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tw_corporativos  $tw_corporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'S_NombreCorto' => 'required|string',
            'S_NombreCompleto' => 'required|string',
            'S_DBName' => 'required|string',
            'S_DBUsuario' => 'required|string',
            'S_DBPassword' => 'required|string',
            'S_SystemUrl' => 'required|string',
            'S_Activo' => 'required|string',
            'D_FechaIncorporacion' => 'required',
            'tw_usuarios_id' => 'required',
        ];

        $input = $request->all();

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()->all()], 422);
        } else {

            $corporativo = tw_corporativos::find($id);
            $corporativo->S_NombreCorto = $request->get('S_NombreCorto');
            $corporativo->S_NombreCompleto = $request->get('S_NombreCompleto');
            $corporativo->S_LogoURL = $request->get('S_LogoURL');
            $corporativo->S_DBName = $request->get('S_DBName');
            $corporativo->S_DBUsuario = $request->get('S_DBUsuario');
            $corporativo->S_DBPassword = $request->get('S_DBPassword');
            $corporativo->S_SystemUrl = $request->get('S_SystemUrl');
            $corporativo->S_Activo = $request->get('S_Activo');
            $corporativo->D_FechaIncorporacion = $request->get('D_FechaIncorporacion');
            $corporativo->tw_usuarios_id = $request->get('tw_usuarios_id');
            $corporativo->FK_Asignado_id = $request->get('FK_Asignado_id');
            $corporativo->save();

            return response()->json(['success' => true, 'data' => $corporativo], 202);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tw_corporativos  $tw_corporativos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = tw_corporativos::find($id);

        if ($doc) {
            $doc->delete();
            return response()->json(['success' => true, 'data' => 'OK'], 202);
        } else {
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }

    public function obtenerCorporativo($id)
    {
        $doc = tw_corporativos::find($id);
        if($doc){
            return response()->json(['success' => true, 'data' => new TwCorporativoResource($doc)], 200);
        }else{
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }
}
