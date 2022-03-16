<?php

namespace App\Http\Controllers;

use App\Http\Resources\TwContratoCorporativosCollection;
use App\Http\Resources\TwContratoCorporativosResource;
use App\tw_contratos_corporativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TwContratosCorporativosController extends Controller
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
            'data' => new TwContratoCorporativosCollection(tw_contratos_corporativos::paginate(5)),
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
            'D_FechaInicio' => 'required',
            'D_FechaFin' => 'required',
            'tw_corporativos_id' => 'required',
        ];

        $input = $request->all();

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()->all()], 422);
        } else {

            $tw_contratos_corporativos = new tw_contratos_corporativos();
            $tw_contratos_corporativos->D_FechaInicio = $request->D_FechaInicio;
            $tw_contratos_corporativos->D_FechaFin = $request->D_FechaFin;
            $tw_contratos_corporativos->S_URLContrato = $request->S_URLContrato;
            $tw_contratos_corporativos->tw_corporativos_id = $request->tw_corporativos_id;
            $tw_contratos_corporativos->save();

            return response()->json(['success' => true, 'data' => $tw_contratos_corporativos], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tw_contratos_corporativos  $tw_contratos_corporativos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (tw_contratos_corporativos::find($id)) {
            return response()->json([
                'success' => true,
                'data' => new TwContratoCorporativosResource(tw_contratos_corporativos::find($id)),
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
     * @param  \App\tw_contratos_corporativos  $tw_contratos_corporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doc = tw_contratos_corporativos::find($id);

        if ($doc) {
            $rules = [
                'D_FechaInicio' => 'required',
                'D_FechaFin' => 'required',
                'tw_corporativos_id' => 'required',
            ];

            $input = $request->all();

            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => $validator->errors()->all()], 422);
            } else {
                $tw_contratos_corporativos = tw_contratos_corporativos::find($id);
                $tw_contratos_corporativos->D_FechaInicio = $request->get('D_FechaInicio');
                $tw_contratos_corporativos->D_FechaFin = $request->get('D_FechaFin');
                $tw_contratos_corporativos->S_URLContrato = $request->get('S_URLContrato');
                $tw_contratos_corporativos->tw_corporativos_id = $request->get('tw_corporativos_id');
                $tw_contratos_corporativos->save();

                return response()->json(['success' => true, 'data' => $tw_contratos_corporativos], 202);
            }
        } else {
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tw_contratos_corporativos  $tw_contratos_corporativos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = tw_contratos_corporativos::find($id);

        if ($doc) {
            $doc->delete();
            return response()->json(['success' => true, 'data' => 'OK'], 202);
        } else {
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }
}
