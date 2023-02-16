<?php

namespace App\Http\Exceptions;

/**
 * @OA\Schema(description="Bad request")
 */

class BadRequest extends \Exception
{
    /**
     * @OA\Property(property="message", type="string", example="Bad request")
     */
    protected $message = 'Bad request';
}