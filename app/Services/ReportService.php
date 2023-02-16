<?php

namespace App\Services;

use App\Models\Report;
use App\Repositories\ReportRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ReportService
{
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function findAll(): LengthAwarePaginator
    {
        return $this->reportRepository->findAll();
    }

    public function findByID(int $id): ?Report
    {
        return $this->reportRepository->findByID($id);
    }

    public function create(array $data): Report
    {
        return $this->reportRepository->create($data);
    }

    public function update(int $id, array $data): Report
    {
        return $this->reportRepository->update($id, $data);
    }

    public function delete(int $id): void
    {
        $this->reportRepository->delete($id);
    }
}