<?php

namespace App\Services;

use App\Repositories\CourseRepositoryInterface;
use stdClass;

class CourseService
{

    private $repository;
    public function __construct(CourseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(string $filter = ''): array
    {
        $courses = $this->repository->getAll($filter);
        return covertItemsOfArrayToObject($courses);
    }
}
