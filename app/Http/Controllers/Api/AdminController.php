<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
    /**
 * @OA\Info(title="Admin API", version="1.0")
 */
class AdminController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/admins",
     *     summary="Listar todos os administradores",
     *     description="Retorna a lista de todos os administradores cadastrados",
     *     tags={"Admins"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de administradores retornada com sucesso",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="name", type="string", example="Admin Nome"),
     *                 @OA\Property(property="photo", type="string", example="url_da_foto.jpg"),
     *                 @OA\Property(property="status", type="integer", example=200)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Nenhum administrador encontrado",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="não foi encontrado nenhum registro"),
     *             @OA\Property(property="status", type="integer", example=204)
     *         )
     *     )
     * )
     */
    public function index(){
        $admins = Gerente::all();

        if($admins->isEmpty())

        return response()->json([
            'message' => 'não foi encontrado nenhum registro',
            'status' => 204,
        ]);

        return response()->json([
            'name' => $admins->name,
            'photo' => $admins->photo,
            'status' => 200,
        ]);
    }
}

