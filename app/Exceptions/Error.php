<?php
/**
 * Created by PhpStorm.
 * User: suporte
 * Date: 25/03/2018
 * Time: 02:30
 */

namespace App\Exceptions;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Validator\Exceptions\ValidatorException;

class Error
{
    /**
     * Padrão de retorno dos erros do servidor
     *
     * O paramentro deve ser um exception  ou um array com [mensagem do error, status do error]
     *
     * @param string $error
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    static function errorResponse($e)
    {
        if($e instanceof \Exception){
            switch (get_class($e))
            {
                case ValidatorException::class : return $e;
                case ModelNotFoundException::class : return response()->json(['error' => true, 'message' => 'Ocorreu um error, verifique os parâmetros']);
                default: return response()->json(['error' => true, 'message' => 'Ocorreu um error no servidor'],500);
            }
        }
        return response()->json(['error' => true, 'message' => $e[0]], $e[1]);
    }
}