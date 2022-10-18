<?php

namespace App\Services;

use App\Respositories\UserRepositoryInterface;

class UserService
{

    private $repository;
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
