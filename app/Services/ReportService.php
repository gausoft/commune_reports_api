<?php

namespace App\Services;

use App\Models\Report;
use App\Repositories\ReportRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

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
        if($medias = request()->file('medias')) {
            $data = Arr::except($data, ['medias']);
            foreach($medias as $media) {
                $path = $media->store('medias');
                $data['medias'][] = [
                    'path' => $path,
                    'mime_type' => $media->getMimeType(),
                ];
            }
        }
        
        return $this->reportRepository->create([...$data, 'user_id' => auth()->user()->id]);
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