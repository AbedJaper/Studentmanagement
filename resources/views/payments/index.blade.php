@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Payments</h2>
    </div>

    <div class="card-body">
        <a href="{{ url('/payments/create') }}" class="btn btn-success btn-sm" title="Add New Payment">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <br />
        <hr />

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Enrollment No</th>
                        <th>Paid Date</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->enrollment->enroll_no ?? 'N/A' }}</td>
                            <td>{{ $item->paid_date }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>
                                <a href="{{ url('/payments/' . $item->id) }}" class="btn btn-info btn-sm" title="View Payment">
                                    <i class="fa fa-eye"></i> View
                                </a>
                                <a href="{{ url('/payments/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm" title="Edit Payment">
                                    <i class="fa fa-pencil-square-o"></i> Edit
                                </a>
                                <form method="POST" action="{{ url('/payments/' . $item->id) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Payment" onclick="return confirm('Confirm delete?')">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </button>
                                </form>

                            


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
