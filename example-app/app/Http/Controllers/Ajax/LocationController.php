<?php
namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepository;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
// use App\Repositories\ProvinceRepository;
use Illuminate\Http\Request;

// use App\Http\Requests\AuthRequest;
// use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    protected $districtRepository;
    protected $provinceRepository;

    public function __construct(
        DistrictRepository $districtRepository,
        ProvinceRepository $provinceRepository
    ) {
        $this->districtRepository = $districtRepository;
        $this->provinceRepository = $provinceRepository;
    }

    public function getLocation(Request $request)
    {
        $get  = $request->input();
        $html = '';
        if ($get['target'] == 'districts') {
            $province = $this->provinceRepository->findById($get['data']['location_id'], ['code', 'name'], ['district']);
            $html     = $this->renderHtml($province->district);
        } else if ($get['target'] == 'wards') {
            $district = $this->districtRepository->findById($get['data']['location_id'], ['code', 'name'], ['ward']);

            $html = $this->renderHtml($district->ward, '[Chọn Phường/Xã]');
        }

        // $districts   = $this->districtRepository->findDistrictByProvinceId($province_id);
        $response = [
            'html' => $html,
        ];
        return response()->json($response);
    }

    public function renderHtml($districts, $root = '[Chọn Quận/Huyện]')
    {
        $html = $root;
        foreach ($districts as $district) {
            $html .= '<option value="' . $district->code . '">' . $district->name . '</option>';
        }
        return $html;
    }
}
