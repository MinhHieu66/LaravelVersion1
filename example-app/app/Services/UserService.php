<?php
namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Services\Interfaces\UserServiceInterface;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function pagination()
    {
        $users = $this->userRepository->getAllPagination();
        return $users;
    }
}