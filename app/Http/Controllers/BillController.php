<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\MasterClass;
use App\Models\Student;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $schoolYear = $request->school_year ?? now()->format('Y');
        $masterClass = $request->master_class;
        $nis = $request->nis;
        $students = Student::with('bills')->where(function ($q) use ($schoolYear, $masterClass, $nis) {
            if (!empty($schoolYear)) $q->whereSchoolYear($schoolYear);
            if (!empty($masterClass)) $q->whereMasterClassId($masterClass);
            if (!empty($nis)) $q->searchNis($nis);
        })->with('masterClass')->paginate(request('perpage') == 'all' ? 999999999 : request('perpage'))->withQueryString();

        $students->setCollection(
            $students->getCollection()->map(function ($item) use ($schoolYear) {
                $item->bills = [
                    Bill::getBillInfo($item->bills->where('month', now()->setMonth(7)->setYear($schoolYear)->format('Y-m-d'))->first()),
                    Bill::getBillInfo($item->bills->where('month', now()->setMonth(8)->setYear($schoolYear)->format('Y-m-d'))->first()),
                    Bill::getBillInfo($item->bills->where('month', now()->setMonth(9)->setYear($schoolYear)->format('Y-m-d'))->first()),
                    Bill::getBillInfo($item->bills->where('month', now()->setMonth(10)->setYear($schoolYear)->format('Y-m-d'))->first()),
                    Bill::getBillInfo($item->bills->where('month', now()->setMonth(11)->setYear($schoolYear)->format('Y-m-d'))->first()),
                    Bill::getBillInfo($item->bills->where('month', now()->setMonth(12)->setYear($schoolYear)->format('Y-m-d'))->first()),
                    Bill::getBillInfo($item->bills->where('month', now()->setMonth(1)->setYear($schoolYear)->format('Y-m-d'))->first()),
                    Bill::getBillInfo($item->bills->where('month', now()->setMonth(2)->setYear($schoolYear)->format('Y-m-d'))->first()),
                    Bill::getBillInfo($item->bills->where('month', now()->setMonth(3)->setYear($schoolYear)->format('Y-m-d'))->first()),
                    Bill::getBillInfo($item->bills->where('month', now()->setMonth(4)->setYear($schoolYear)->format('Y-m-d'))->first()),
                    Bill::getBillInfo($item->bills->where('month', now()->setMonth(5)->setYear($schoolYear)->format('Y-m-d'))->first()),
                ];
                return $item;
            })
        );
        return view('pages.bill.index', [
            'title' => 'Tagihan SPP Siswa',
            'master_classes' => MasterClass::all(),
            'schoolYears' => Student::whereNotNull('school_year')->distinct('school_year')->get(),
            'data' => $students,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $months = ['7', '8', '9', '10', '11', '12', '1', '2', '3', '4', '5'];
        foreach ($months as $month) {
            $bukti = "bukti_" . $month;
            if ($request->hasFile($bukti)) {
                Bill::updateOrCreate(['month' => now()->setMonth($month), 'student_id' => $student->id], ['attachment' => $request->file($bukti)->storeAs('bukti_bayar', $bukti), 'paid_at' => now()]);
            }
        }
        return back()->with('success', 'SPP berhasil diperbaharui');
    }
}
