<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Enrollment;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of payments.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $payments = Payment::with('enrollment')->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new payment.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        return view('payments.create', compact('enrollments'));
    }

    /**
     * Store a newly created payment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date'     => 'required|date',
            'amount'        => 'required|numeric',
        ]);

        Payment::create($request->only(['enrollment_id', 'paid_date', 'amount']));

        return redirect()->route('payments.index')
                         ->with('flash_message', 'Payment Added!');
    }

    /**
     * Display the specified payment.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
           $item = Payment::with('enrollment')->findOrFail($id);
           return view('payments.show', compact('item'));
    }

    /**
     * Show the form for editing the specified payment.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        return view('payments.edit', compact('payment', 'enrollments'));
    }

    /**
     * Update the specified payment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date'     => 'required|date',
            'amount'        => 'required|numeric',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($request->only(['enrollment_id', 'paid_date', 'amount']));

        return redirect()->route('payments.index')
                         ->with('flash_message', 'Payment Updated!');
    }

    /**
     * Remove the specified payment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Payment::destroy($id);
        return redirect()->route('payments.index') ->with('flash_message', 'Payment Deleted!');
    }
}
