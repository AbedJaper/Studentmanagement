<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Course;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $batches = Batch::all(); 
        return view('batches.index')->with('batches', $batches);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        
    $courses = Course::pluck('name', 'id');
    return view('batches.create', compact('courses'));

       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{
       $input = $request->all();

       Batch::create($input);
       return redirect('batches')->with('flash_message', 'Batch Added!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
       
    $batch = Batch::findOrFail($id);
    return view('batches.show')->with('batch', $batch);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $batch = Batch::findOrFail($id);
        $courses = Course::pluck('name', 'id');
        return view('batches.edit', compact('batch', 'courses'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {

    $request->validate([
        'name' => 'required|string|max:255',
        'course_id' => 'required|exists:courses,id',
        'start_date' => 'required|date',
    ]);

    $batch = Batch::findOrFail($id);
    $batch->update($request->all());

    return redirect('batches')->with('flash_message', 'Batch Updated!'); 

    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Batch::destroy($id);
        return redirect('batches')->with('flash_message', 'Batch deleted!');
    }
}
