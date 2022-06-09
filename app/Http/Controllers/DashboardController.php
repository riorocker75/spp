<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\MasterClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $studentCount = Student::count();
        $masterClassCount = MasterClass::count();
        $billCount = Bill::groupBy('student_id')->count();
        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'studentCount' => $studentCount,
            'masterClassCount' => $masterClassCount,
            'billCount' => $billCount,
        ]);
    }
}
