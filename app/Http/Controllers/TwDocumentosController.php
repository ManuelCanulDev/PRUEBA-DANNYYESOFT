<?php

namespace App\Http\Controllers;

use App\tw_documentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TwDocumentosController extends Controller
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
            'data' => tw_documentos::paginate(5),
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
            'N_Obligatorio' => 'required',
            'S_Descripcion' => 'required',
        ];

        $input = $request->all();

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->errors()->all()], 422);
        } else {

            $tw_documento = new tw_documentos();
            $tw_documento->S_Nombre = $request->S_Nombre;
            $tw_documento->N_Obligatorio = $request->N_Obligatorio;
            $tw_documento->S_Descripcion = $request->S_Descripcion;
            $tw_documento->save();

            return response()->json(['success' => true, 'data' => $tw_documento], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tw_documentos  $tw_documentos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (tw_documentos::find($id)) {
            return response()->json([
                'success' => true,
                'data' => tw_documentos::find($id),
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
     * @param  \App\tw_documentos  $tw_documentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doc = tw_documentos::find($id);

        if ($doc) {
            $rules = [
                'S_Nombre' => 'required',
                'N_Obligatorio' => 'required',
                'S_Descripcion' => 'required',
            ];

            $input = $request->all();

            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => $validator->errors()->all()], 422);
            } else {
                $tw_documento = tw_documentos::find($id);
                $tw_documento->S_Nombre = $request->get('S_Nombre');
                $tw_documento->N_Obligatorio = $request->get('N_Obligatorio');
                $tw_documento->S_Descripcion = $request->get('S_Descripcion');
                $tw_documento->save();

                return response()->json(['success' => true, 'data' => $tw_documento], 202);
            }
        } else {
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tw_documentos  $tw_documentos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = tw_documentos::find($id);

        if ($doc) {
            $doc->delete();
            return response()->json(['success' => true, 'data' => 'OK'], 202);
        } else {
            return response()->json(['success' => true, 'data' => 'NOT FOUND'], 404);
        }
    }
}
