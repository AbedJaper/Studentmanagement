<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $courses = Course::all();
        return view('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Course::create($input);
        return redirect('courses')->with('flash_message', 'Course Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $course = Course::findOrFail($id);
        return view('courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $course = Course::findOrFail($id);
        return view('courses.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $course = Course::findOrFail($id);
        $input = $request->all();
        $course->update($input);
        return redirect('courses')->with('flash_message', 'Course Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Course::destroy($id);
        return redirect('courses')->with('flash_message', 'Course deleted!');
    }
}
