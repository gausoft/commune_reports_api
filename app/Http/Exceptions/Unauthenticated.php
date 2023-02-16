<?php

namespace App\Http\Exceptions;

/**
 * @OA\Schema(description="Unauthenticated")
 */

class Unauthenticated extends \Exception
{
    /**
     * @OA\Property(property="message", type="string", example="Unauthenticated")
     */
    protected $message = 'Unauthenticated';
}