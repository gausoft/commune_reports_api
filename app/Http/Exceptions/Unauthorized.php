<?php

namespace App\Http\Exceptions;

/**
 * @OA\Schema(description="Unauthorized")
 */

class Unauthorized extends \Exception
{
    /**
     * @OA\Property(property="message", type="string", example="Unauthorized")
     */
    protected $message = 'Unauthorized';
}