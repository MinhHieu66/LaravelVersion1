<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\UserServiceInterface as UserServive;

class UserController extends Controller
{
    protected $userServive;

    public function __construct(UserServive $userServive)
    {
        $this->userServive = $userServive;
    }

    public function index()
    {
        $users    = $this->userServive->pagination();
        $config   = $this->config();
        $template = 'backend.user.index';
        return view('backend.dashboard.layout', compact('template', 'config', 'users'));
    }

    public function config()
    {
        return [
            'js'  => [
                'backend/js/plugins/switchery/switchery.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
            ],
        ];
    }
}