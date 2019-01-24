<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ExportController extends Controller
{
    //
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
