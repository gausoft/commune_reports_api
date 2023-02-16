<?php

namespace App\Http\Exceptions;

/**
 * @OA\Schema(description="La ressource n'existe pas")
 */
class NotFound extends \Exception
{
    /**
     * @OA\Property(property="message", type="string", example="La ressource demandée n'a pas pu être trouvée")
     */
    public function __construct($message = 'La ressource demandée n\'a pas pu être trouvée', $code = 404, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}