<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Municipalities reports API",
 *      description="API for municipalities reports",
 * )
 * 
 * @OA\PathItem(path="/api")
 * 
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server",
 * )
 */
abstract class BaseApiController extends Controller
{
}
