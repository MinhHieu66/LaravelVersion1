<?php
namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Services\Interfaces\UserServiceInterface;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload             = $request->except(['_token', 'send', 're_password']);
            $carbonDate          = Carbon::createFromFormat('Y-m-d', $payload['birthday']);
            $payload['birthday'] = $carbonDate->format('Y-m-d H:i:s');
            $payload['password'] = Hash::make($payload['password']);
            $user                = $this->userRepository->create($payload);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

}
