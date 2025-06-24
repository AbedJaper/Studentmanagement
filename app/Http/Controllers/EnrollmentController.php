<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Enrollment;
use App\Models\Batch;
use App\Models\Student;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $enrollments = Enrollment::with(['student', 'batch.course'])->get();
        return view('enrollments.index', compact('enrollments'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $batches  = Batch::with('course')->get();
        $students = Student::all();

        return view('enrollments.create', compact('batches', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'enroll_no'  => 'required|unique:enrollments,enroll_no',
            'batch_id'   => 'required|exists:batches,id',
            'student_id' => 'required|exists:students,id',
            'join_date'  => 'required|date',
            'fee'        => 'required|numeric|min:0',
        ]);

        Enrollment::create($validated);

        return redirect()
            ->route('enrollments.index')
            ->with('flash_message', 'Enrollment Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $enrollment = Enrollment::with(['student', 'batch'])->findOrFail($id);
        return view('enrollments.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $enrollment = Enrollment::findOrFail($id);
        $batches     = Batch::with('course')->get();
        $students    = Student::all();

        return view('enrollments.edit', compact('enrollment', 'batches', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $enrollment = Enrollment::findOrFail($id);

        // التحقق من صحة البيانات
        $validated = $request->validate([
            'enroll_no'  => "required|unique:enrollments,enroll_no,{$id}",
            'batch_id'   => 'required|exists:batches,id',
            'student_id' => 'required|exists:students,id',
            'join_date'  => 'required|date',
            'fee'        => 'required|numeric|min:0',
        ]);

        $enrollment->update($validated);

        return redirect()
            ->route('enrollments.index')
            ->with('flash_message', 'Enrollment Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Enrollment::destroy($id);

        return redirect()
            ->route('enrollments.index')
            ->with('flash_message', 'Enrollment Deleted!');
    }
}
