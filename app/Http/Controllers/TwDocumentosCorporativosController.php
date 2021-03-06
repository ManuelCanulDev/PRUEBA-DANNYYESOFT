<?php

namespace App\Http\Controllers;

use App\Http\Resources\TwDocumentosCorporativoCollection;
use App\Http\Resources\TwDocumentosCorporativoResource;
use App\Http\Resources\TwDocumentosCorporativosCustomerResource;
use App\tw_documentos;
use App\tw_documentos_corporativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TwDocumentosCorporativosController extends Controller
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
            'data' => new TwDocumentosCorporativoCollection(tw_documentos_corporativos::orderBy('id', 'asc')->simplePaginate(5)),
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
            'tw_corporativos_id' => 'required',
            'tw_documentos_id' => 'required',
        ];

        $input = $request->all();

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()->all()], 422);
        } else {

            $tw_documentos_corporativos = new tw_documentos_corporativos();
            $tw_documentos_corporativos->tw_corporativos_id = $request->tw_corporativos_id;
            $tw_documentos_corporativos->tw_documentos_id = $request->tw_documentos_id;
            $tw_documentos_corporativos->S_ArchivoUrl = $request->S_ArchivoUrl;
            $tw_documentos_corporativos->save();

            return response()->json(['success' => true, 'data' => $tw_documentos_corporativos], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tw_documentos_corporativos  $tw_documentos_corporativos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (tw_documentos_corporativos::find($id)) {
            return response()->json([
                'success' => true,
                'data' => new TwDocumentosCorporativoResource(tw_documentos_corporativos::find($id)),
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
     * @param  \App\tw_documentos_corporativos  $tw_documentos_corporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doc = tw_documentos_corporativos::find($id);

        if ($doc) {
            $rules = [
                'tw_corporativos_id' => 'required',
                'tw_documentos_id' => 'required',
            ];

            $input = $request->all();

            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => $validator->errors()->all()], 422);
            } else {
                $tw_documentos_corporativos = tw_documentos_corporativos::find($id);
                $tw_documentos_corporativos->tw_corporativos_id = $request->tw_corporativos_id;
                $tw_documentos_corporativos->tw_documentos_id = $request->tw_documentos_id;
                $tw_documentos_corporativos->S_ArchivoUrl = $request->S_ArchivoUrl;
                $tw_documentos_corporativos->save();

                return response()->json(['success' => true, 'data' => $tw_documentos_corporativos], 202);
            }
        } else {
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tw_documentos_corporativos  $tw_documentos_corporativos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = tw_documentos_corporativos::find($id);

        if ($doc) {
            $doc->delete();
            return response()->json(['success' => true, 'data' => 'OK'], 202);
        } else {
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }

    public function obtenerDocumentos($id)
    {
        return response()->json([
            'success' => false,
            'data' => new TwDocumentosCorporativoCollection(tw_documentos_corporativos::where('tw_documentos_id',$id)->get()),
        ], 200);
    }
}
