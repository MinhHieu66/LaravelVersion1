<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $config   = $this->config();
        $template = 'backend.dashboard.home.index';
        return view('backend.dashboard.layout', compact('template', 'config'));
    }

    private function config()
    {
        return [
            'js' => [
                'backend/js/plugins/flot/jquery.flot.js',
                'backend/js/plugins/flot/jquery.flot.tooltip.min.js',
                'backend/js/plugins/flot/jquery.flot.spline.js',
                'backend/js/plugins/flot/jquery.flot.resize.js',
                'backend/js/plugins/flot/jquery.flot.pie.js',
                'backend/js/plugins/flot/jquery.flot.symbol.js',
                'backend/js/plugins/flot/jquery.flot.time.js',
                'backend/js/plugins/peity/jquery.peity.min.js',
                'backend/js/demo/peity-demo.js',
                'backend/js/inspinia.js',
                'backend/js/plugins/pace/pace.min.js',
                'backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
                'backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                'backend/js/plugins/easypiechart/jquery.easypiechart.js',
                'backend/js/plugins/sparkline/jquery.sparkline.min.js',
                'backend/js/demo/sparkline-demo.js',
                'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js',
            ],
        ];
    }
}
