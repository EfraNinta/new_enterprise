@extends('admin.app')
@section('content')
<div class="container">
    <h1>Payroll List</h1>
    <a href="{{ route('payroll.create') }}" class="btn btn-primary">Add Payroll</a>

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
                <th>ID</th>
                <th>User</th>
                <th>Salary</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payrolls as $payroll)
            <tr>
                <td>{{ $payroll->id }}</td>
                <td>{{ $payroll->employee->user->name ?? 'N/A' }}</td> <!-- Menampilkan nama user -->
                <td>{{ $payroll->salary }}</td>
                <td>{{ $payroll->created_at }}</td>
                <td>
                    <a href="{{ route('payroll.edit', $payroll->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('payroll.destroy', $payroll->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection