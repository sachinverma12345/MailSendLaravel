<?php

namespace App\Http\Controllers;

use App\Exports\IdsExport;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class IDsController extends Controller
{
    public function exportIds()
    {
        try {
            $url = 'https://opencontext.org/query/Asia/Turkey/Kenan+Tepe.json';
            $response = Http::withOptions(['verify' => false])->get($url);

            if ($response->successful()) {
                $data = $response->json();
                $ids = collect(Arr::dot($data))
                    ->filter(function ($value, $key) {
                        return Str::endsWith($key, '.id');
                    })
                    ->values()
                    ->unique();
                return Excel::download(new IdsExport($ids), 'Kenan_Tepe_Ids.xlsx');
            } else {
                return redirect()->back()->with('error', 'Data not found');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
