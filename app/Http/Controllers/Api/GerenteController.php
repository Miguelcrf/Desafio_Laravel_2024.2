<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gerente;

/**
 * @OA\Info(title="Gerente API", version="1.0")
 */

class GerenteController extends Controller
{
     /**
     * @OA\Get(
     *     path="/api/gerentes",
     *     summary="Listar todos os gerentes",
     *     description="Retorna a lista de todos os gerentes cadastrados",
     *     tags={"Gerentes"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de gerentes retornada com sucesso",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="name", type="string", example="John Doe"),
     *                 @OA\Property(property="photo", type="string", example="url_da_foto.jpg"),
     *                 @OA\Property(property="status", type="integer", example=200)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Nenhum gerente encontrado",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="não foi encontrado nenhum registro"),
     *             @OA\Property(property="status", type="integer", example=204)
     *         )
     *     )
     * )
     */
    public function index(){
        $managers = Gerente::all();

        if($managers->isEmpty())

        return response()->json([
            'message' => 'não foi encontrado nenhum registro',
            'status' => 204,
        ]);

        return response()->json([
            'name' => $managers->name,
            'photo' => $managers->photo,
            'status' => 200,
        ]);
    }
}
