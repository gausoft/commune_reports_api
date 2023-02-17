<?php

namespace App\Repositories;

use App\Models\Media;
use App\Models\Report;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class ReportRepository implements BaseRepositoryInterface
{
    protected Report $model;
    protected Media $media;

    public function __construct(Report $report, Media $media)
    {
        $this->model = $report;
        $this->media = $media;
    }

    public function findAll($perPage = 10): LengthAwarePaginator
    {
        return $this->model->with('medias')->paginate($perPage);
    }

    public function findByID(int $id): ?Report
    {
        return $this->model->with('medias')->find($id);
    }

    public function create(array $data): Report
    {
        $medias = $data['medias'];//meta data : path, mime_type
        $data = Arr::except($data, ['medias']);

        $report = $this->model->create($data);
        
        if(count($medias) > 0) {
            foreach($medias as $media) {
                $this->media->path = $media['path'];
                $this->media->mime_type = $media['mime_type'];

                $this->media->mediable()->associate($report);
                $this->media->save();
            }
        }

        return $report->with('medias')->find($report->id);
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
