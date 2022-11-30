<?php

namespace App\Services;

use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportService
{

    private $repository;
    public function __construct(SupportRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getSupports(string $status = 'P')
    {
        $this->repository->getByStatus($status);
    }
}
