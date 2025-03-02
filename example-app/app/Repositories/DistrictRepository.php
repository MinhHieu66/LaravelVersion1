<?php
namespace App\Repositories;

use App\Models\District;
use App\Repositories\Interfaces\DistrictRepositoryInterface;

/**
 * Class DistrictService
 * @package App\Services
 */
class DistrictRepository implements DistrictRepositoryInterface
{
    public function all()
    {
        return District::all();
    }
}
