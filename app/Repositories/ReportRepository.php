<?php

namespace App\Repositories;

use App\Models\Report;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ReportRepository implements BaseRepositoryInterface
{
    protected Report $model;

    public function __construct(Report $report)
    {
        $this->model = $report;
    }

    public function findAll($perPage = 10): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    public function findByID(int $id): ?Report
    {
        return $this->model->find($id);
    }

    public function create(array $data): Report
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): Report
    {
        $model = $this->model->findOrFail($id);
        $model->update($data);

        return $model;
    }

    public function delete(int $id): void
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
    }
}
