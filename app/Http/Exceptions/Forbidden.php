<?php

namespace App\Http\Exceptions;

/**
 * @OA\Schema(description="Forbidden")
 */

class Forbidden extends \Exception
{
    /**
     * @OA\Property(property="message", type="string", example="Forbidden")
     */
    protected $message = 'Forbidden';
}