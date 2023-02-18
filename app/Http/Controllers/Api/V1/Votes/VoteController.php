<?php

namespace App\Http\Controllers\Api\V1\Votes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * @OA\Post(
     *     path="/v1/reports/{id}/votes",
     *     tags={"Reports"},
     *     summary="Vote on a report",
     *     description="Vote on a report",
     *     operationId="vote",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of report to vote on",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="Vote object that needs to be added to the store",
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="vote", type="integer", example="1"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Vote response",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items()
     *         )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="unexpected error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="An error occurred")
     *         )
     *     )
     * )
     */
    public function store(Request $request, $id)
    {
        //
    }
}
