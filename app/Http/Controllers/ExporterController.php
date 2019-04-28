<?php

namespace App\Http\Controllers;

use App\Export;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExporterController extends Controller
{
    public function __construct()
    {
        set_time_limit(0);
        ini_set('max_execution_time', 3000);
        ini_set('memory_limit', '256M');
    }

    public function index()
    {
        return view('exporter.form');
    }

    public function export () {
        $this->validate(request(),
            [
                'exportable' => 'required|in:' . implode(',', ['User', 'Product'])
            ],
            [
                'exportable.in' => 'El modelo de datos no está disponible'
            ]
        );

        $model = request('exportable');
        $exportable = "App\\Exports\\{$model}";
        Export::create([
            "model" => $exportable,
            "created_at" => Carbon::now()
        ]);
        return Excel::download(new $exportable, "{$model}.xlsx");
    }
}
