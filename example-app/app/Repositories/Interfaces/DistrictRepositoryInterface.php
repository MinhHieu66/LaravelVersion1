<?php
namespace App\Repositories\Interfaces;

/**
 * Interface DistrictServiceInterface
 * @package App\Services\Interfaces
 */
interface DistrictRepositoryInterface
{
    public function all();
    public function findById(int $id, array $column, array $relation);
    // public function findDistrictByProvinceId(int $province_id);
}
