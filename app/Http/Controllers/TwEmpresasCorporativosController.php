<?php

namespace App\Http\Controllers;

use App\Http\Resources\TwEmpresaCorporativosCollection;
use App\Http\Resources\TwEmpresaCorporativosResource;
use App\tw_empresas_corporativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TwEmpresasCorporativosController extends Controller
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
            'data' => new TwEmpresaCorporativosCollection(tw_empresas_corporativos::paginate(5)),
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
            'S_RazonSocial' => 'required',
            'S_RFC' => 'required',
            'S_Activo' => 'required',
            'tw_corporativos_id' => 'required',
        ];

        $input = $request->all();

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()->all()], 422);
        } else {

            $tw_empresas_corporativos = new tw_empresas_corporativos();
            $tw_empresas_corporativos->S_RazonSocial = $request->S_RazonSocial;
            $tw_empresas_corporativos->S_RFC = $request->S_RFC;
            $tw_empresas_corporativos->S_Pais = $request->S_Pais;
            $tw_empresas_corporativos->S_Estado = $request->S_Estado;
            $tw_empresas_corporativos->S_Municipio = $request->S_Municipio;
            $tw_empresas_corporativos->S_ColoniaLocalidad = $request->S_ColoniaLocalidad;
            $tw_empresas_corporativos->S_Domicilio = $request->S_Domicilio;
            $tw_empresas_corporativos->S_CodigoPostal = $request->S_CodigoPostal;
            $tw_empresas_corporativos->S_UsoCFDI = $request->S_UsoCFDI;
            $tw_empresas_corporativos->S_UrlRFC = $request->S_UrlRFC;
            $tw_empresas_corporativos->S_UrlActaConstitutiva = $request->S_UrlActaConstitutiva;
            $tw_empresas_corporativos->S_Activo = $request->S_Activo;
            $tw_empresas_corporativos->S_Comentarios = $request->S_Comentarios;
            $tw_empresas_corporativos->tw_corporativos_id = $request->tw_corporativos_id;
            $tw_empresas_corporativos->save();

            return response()->json(['success' => true, 'data' => $tw_empresas_corporativos], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tw_empresas_corporativos  $tw_empresas_corporativos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (tw_empresas_corporativos::find($id)) {
            return response()->json([
                'success' => true,
                'data' => new TwEmpresaCorporativosResource(tw_empresas_corporativos::find($id)),
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
     * @param  \App\tw_empresas_corporativos  $tw_empresas_corporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doc = tw_empresas_corporativos::find($id);

        if ($doc) {
            $rules = [
                'S_RazonSocial' => 'required',
                'S_RFC' => 'required',
                'S_Activo' => 'required',
                'tw_corporativos_id' => 'required',
            ];

            $input = $request->all();

            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => $validator->errors()->all()], 422);
            } else {
                $tw_empresas_corporativos = tw_empresas_corporativos::find($id);
                $tw_empresas_corporativos->S_RazonSocial = $request->get('S_RazonSocial');
                $tw_empresas_corporativos->S_RFC = $request->get('S_RFC');
                $tw_empresas_corporativos->S_Pais = $request->get('S_Pais');
                $tw_empresas_corporativos->S_Estado = $request->get('S_Estado');
                $tw_empresas_corporativos->S_Municipio = $request->get('S_Municipio');
                $tw_empresas_corporativos->S_ColoniaLocalidad = $request->get('S_ColoniaLocalidad');
                $tw_empresas_corporativos->S_Domicilio = $request->get('S_Domicilio');
                $tw_empresas_corporativos->S_CodigoPostal = $request->get('S_CodigoPostal');
                $tw_empresas_corporativos->S_UsoCFDI = $request->get('S_UsoCFDI');
                $tw_empresas_corporativos->S_UrlRFC = $request->get('S_UrlRFC');
                $tw_empresas_corporativos->S_UrlActaConstitutiva = $request->get('S_UrlActaConstitutiva');
                $tw_empresas_corporativos->S_Activo = $request->get('S_Activo');
                $tw_empresas_corporativos->S_Comentarios = $request->get('S_Comentarios');
                $tw_empresas_corporativos->tw_corporativos_id = $request->get('tw_corporativos_id');
                $tw_empresas_corporativos->save();

                return response()->json(['success' => true, 'data' => $tw_empresas_corporativos], 202);
            }
        } else {
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tw_empresas_corporativos  $tw_empresas_corporativos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = tw_empresas_corporativos::find($id);

        if ($doc) {
            $doc->delete();
            return response()->json(['success' => true, 'data' => 'OK'], 202);
        } else {
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }
}
