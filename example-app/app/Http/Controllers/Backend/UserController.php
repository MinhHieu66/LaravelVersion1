<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceServive;
use App\Services\Interfaces\UserServiceInterface as UserServive;

class UserController extends Controller
{
    protected $userServive;
    protected $provinceRepository;

    public function __construct(UserServive $userServive, ProvinceServive $provinceRepository)
    {
        $this->userServive        = $userServive;
        $this->provinceRepository = $provinceRepository;
    }

    public function index()
    {
        $users  = $this->userServive->pagination();
        $config = [
            'js'  => [
                'backend/js/plugins/switchery/switchery.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
            ],
        ];
        $config['seo'] = config('apps.user');
        $template      = 'backend.user.index';
        return view('backend.dashboard.layout', compact('template', 'config', 'users'));
    }

    public function create()
    {
        $provinces = $this->provinceRepository->all();
        $config    = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'js'  => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
            ],
        ];
        $config['seo'] = config('apps.user');
        $template      = 'backend.user.create';
        return view('backend.dashboard.layout', compact('template', 'config', 'provinces'));
    }
}
