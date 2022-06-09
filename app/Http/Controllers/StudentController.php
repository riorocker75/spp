<?php

namespace App\Http\Controllers;

use App\Models\MasterClass;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $schoolYear = $request->school_year;
        $masterClass = $request->master_class;
        return view('pages.students', [
            'title' => 'Data Siswa',
            'master_classes' => MasterClass::all(),
            'schoolYears' => Student::whereNotNull('school_year')->distinct('school_year')->get(),
            'data' => Student::where(function ($q) use ($schoolYear, $masterClass) {
                if (!empty($schoolYear)) $q->whereSchoolYear($schoolYear);
                if (!empty($masterClass)) $q->whereMasterClassId($masterClass);
            })->with('masterClass')->paginate(request('perpage'))->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.student-form', [
            'data' => new Student,
            'master_classes' => MasterClass::orderBy('name')->get(),
            'title' => 'Tambah Siswa',
            'method' => 'POST',
            'action' => route('students.store'),
            'submit' => 'Simpan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->validate([
            'nis' => 'required|unique:students,nis',
            'nisn' => 'required|unique:students,nisn',
            'name' => 'required|string',
            'gender' => 'required|string',
            'religion' => 'required|string',
            'phone' => 'required|string',
            'master_class_id' => 'required|integer',
            'school_year' => 'required|integer'
        ]);
        Student::create($form);
        User::create([
            'username' => $form['nis'],
            'password' => bcrypt('12345678'),
            'role' => 'student'
        ]);
        return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambah ke database!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('pages.student-form', [
            'data' => $student,
            'master_classes' => MasterClass::orderBy('name')->get(),
            'title' => 'Edit Siswa',
            'method' => 'PUT',
            'action' => route('students.update', $student),
            'submit' => 'Update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $form = $request->validate([
            'nis' => 'required|unique:students,nis,' . $student->id,
            'nisn' => 'required|unique:students,nisn,' . $student->id,
            'name' => 'required|string',
            'gender' => 'required|string',
            'religion' => 'required|string',
            'phone' => 'required|string',
            'master_class_id' => 'required|integer',
            'school_year' => 'required|integer'
        ]);
        User::whereUsername($student->nis)->update([
            'username' => $form['nis'],
        ]);
        $student->update($form);
        return redirect()->route('students.index')->with('success', 'Siswa berhasil diperbaharui ke database!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Siswa berhasil dihapus dari database!');
    }

    public function updatePassword(Student $student, Request $request)
    {
        User::whereUsername($student->nis)->update([
            'password' => bcrypt($request->password)
        ]);
        return back()->with('success', 'Password siswa berhasil diperbaharui!');
    }
}
