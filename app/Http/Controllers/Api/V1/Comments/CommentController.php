<?php

namespace App\Http\Controllers\Api\V1\Comments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/v1/reports/{id}/comments",
     *     tags={"Reports"},
     *     summary="Get comments for a report",
     *     description="Returns all comments from the system that the user has access to",
     *     operationId="getComments",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of report to fetch",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *          name="page",
     *          in="query",
     *          description="Page number of comments to return",
     *          required=false,
     *          @OA\Schema(
     *              type="integer",
     *              format="int32"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="How many comments to return at one time (max 20)",
     *          required=false,
     *          @OA\Schema(
     *              type="integer",
     *              format="int32"
     *          )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Comment response",
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
    public function index()
    {
        //
    }
    

    /**
     * @OA\Post(
     *     path="/v1/reports/{id}/comments",
     *     tags={"Reports"},
     *     summary="Create a comment",
     *     description="Create a comment for a report",
     *     operationId="createComment",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of report to fetch",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="Comment object that needs to be added to the report",
     *         required=true,
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Comment response",
     *         @OA\JsonContent()
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

    /**
     * @OA\Delete(
     *     path="/v1/reports/{id}/comments/{commentId}",
     *     tags={"Reports"},
     *     summary="Delete a comment",
     *     description="Delete a comment for a report",
     *     operationId="deleteComment",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of report to fetch",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="commentId",
     *         in="path",
     *         description="ID of comment to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Comment response",
     *         @OA\JsonContent()
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
    public function destroy($id, $commentId)
    {
        //
    }
}
