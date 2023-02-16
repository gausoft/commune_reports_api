<?php

namespace App\Http\Controllers\Api\V1\Reports;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Services\ReportService;
use App\Http\Requests\Reports\CreateReportRequest as Request;
use App\Http\Requests\Reports\UpdateReportRequest;

class ReportController extends Controller
{
    private ReportService $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    /**
     * @OA\Get(
     *      path="/v1/reports",
     *      operationId="getReportsList",
     *      tags={"Reports"},
     *      @OA\Parameter(
     *          name="status",
     *          in="query",
     *          description="Status values that needed to be considered for filter",
     *          required=false,
     *          explode=true,
     *          @OA\Schema(
     *              default="open",
     *              type="string",
     *              enum={"open", "in_progress", "resolved", "closed"},
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="page",
     *          in="query",
     *          description="Page number",
     *          required=false,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="Limit number of results",
     *          required=false,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      summary="Get list of reports",
     *      description="Returns list of reports",
     *
     *      @OA\Response(response=200, description="Successful operation"),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden"),
     *      @OA\Response(response=404, description="Not found", @OA\JsonContent(ref="#/components/schemas/NotFound"))
     * )
     */    
    public function index() {
        return ReportResource::collection($this->reportService->findAll());
    }

    /**
     * @OA\Post(
     *     path="/v1/reports",
     *     operationId="createReport",
     *     summary="Create a new report",
     *     tags={"Reports"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CreateReportRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Report created",
     *         @OA\JsonContent(ref="#/components/schemas/CreateReportRequest")
     *     ),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/BadRequest")),
     *     @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/Unauthenticated")),
     *     @OA\Response(response=403, description="Unauthorized", @OA\JsonContent(ref="#/components/schemas/Unauthorized")),
     * )
     */    
    public function store(Request $request) {
        $report = $this->reportService->create($request->validated());

        return new ReportResource($report);
    }

    /**
     * @OA\Get(
     *      path="/v1/reports/{id}",
     *      operationId="getReportById",
     *      tags={"Reports"},
     *      summary="Get report information",
     *      description="Returns report data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Report id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *     @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/Unauthenticated")),
     *     @OA\Response(response=403, description="Unauthorized", @OA\JsonContent(ref="#/components/schemas/Unauthorized")),
     * )
     */
    public function show(int $id) {
        if (!$report = $this->reportService->findByID($id)) {
            return response()->json(['message' => 'Report not found'], 404);
        }

        return new ReportResource($report);
    }

    /**
     * @OA\Put(
     *      path="/v1/reports/{id}",
     *      operationId="updateReport",
     *      tags={"Reports"},
     *      summary="Update existing report",
     *      description="Returns updated report data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Report id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateReportRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Report updated successfully!",
     *         @OA\JsonContent(ref="#/components/schemas/UpdateReportRequest")
     *     ),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/BadRequest")),
     *     @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/Unauthenticated")),
     *     @OA\Response(response=403, description="Unauthorized", @OA\JsonContent(ref="#/components/schemas/Unauthorized")),
     * )
     */
    public function update(UpdateReportRequest $request, int $id) {
        if (!$report = $this->reportService->findByID($id)) {
            return response()->json(['message' => 'Report not found'], 404);
        }

        $report = $this->reportService->update($id, $request->all());

        return new ReportResource($report);
    }

    /**
     * @OA\Delete(
     *      path="/v1/reports/{id}",
     *      operationId="deleteReport",
     *      tags={"Reports"},
     *      summary="Delete existing report",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Report id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *     @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/Unauthenticated")),
     *     @OA\Response(response=403, description="Unauthorized", @OA\JsonContent(ref="#/components/schemas/Unauthorized")),
     * )
     */
    public function destroy(int $id) {
        $this->reportService->delete($id);

        return response()->json(null, 204);
    }
}
