<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function findAll(): LengthAwarePaginator;

    public function create(array $data): Model;

    public function findByID(int $id): ?Model;

    public function update(int $id, array $data): Model;

    public function delete(int $id): void;
}
