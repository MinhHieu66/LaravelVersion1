<?php
namespace App\Repositories;

use App\Models\Ward;
use App\Repositories\Interfaces\WardRepositoryInterface;

/**
 * Class WardService
 * @package App\Services
 */
class WardRepository extends BaseRepository implements WardRepositoryInterface
{
    protected $model;

    public function __construct(Ward $model)
    {
        $this->model = $model;
    }

    // public function findWardByDistrictId(int $district_id = 0)
    // {
    //     return $this->model->where('district_code', '=', $district_id)->get();
    // }
}
