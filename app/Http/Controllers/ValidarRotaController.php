<?php

namespace App\Http\Controllers;

use App\Services\ValidarRotaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ValidarRotaController extends Controller
{
    /** 
     * Verifica se a rota é valida com base na requisição.
     * 
     * @param Request $request 
     */
    public function validarRota(Request $request): JsonResponse
    {
        $rota = $request->query('rota');

        if (empty($rota)) {
            return response()->json([
                'codigo' => 400,
                'mensagem' => 'A rota não foi definida.'
            ], 400);
        } 

        // Cria um array com a rota da requisição, separando as siglas dos estados pela vírgula.
        $rotas = explode(',', $rota);
        $rotaService = new ValidarRotaService();

        if (count($rotas) < 2) 
        {
            $erro = 'A rota não tem estados suficientes, é necessário no mínimo 2.';
        } 
        elseif ($rotaService->isSiglaInexistente($rotas)) 
        {
            $erro = 'A rota está com alguma sigla de estado inexistente.';
        }

        if (!empty($erro)) 
        {
            return response()->json([
                'codigo' => 400,
                'mensagem' => $erro
            ], 400);
        }

        $retorno = $rotaService->isValida($rotas);

        return response()->json([
            'rota' => $rota,
            'isValida' => $retorno
        ]);
    }
}