@extends('admin.app')

@section('content')
<div class="container">
    <h3>Leave</h3>

    <a href="{{ route('leave.create') }}" class="btn btn-primary mb-3">Tambah Leave</a>

      <!-- Search Field -->
      <div class="form-group">
                <input type="text" class="form-control" placeholder="Search..." id="search">
            </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $leave->employee->user->name ?? 'N/A' }}</td>
                    <td>{{ $leave->description }}</td>
                    <td>{{ $leave->start_of_date->format('Y-m-d') }}</td>
                    <td>{{ $leave->end_of_date->format('Y-m-d') }}</td>
                    <td>{{ ucfirst($leave->status) }}</td>
                    <td>
                        <a href="{{ route('leave.edit', $leave->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('leave.destroy', $leave->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Data Ini Di Hapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection