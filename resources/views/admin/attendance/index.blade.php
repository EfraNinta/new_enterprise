@extends('admin.app')

@section('content')
<div class="container">
    <h3>Daftar Absensi</h3>

    <a href="{{ route('attendance.create') }}" class="btn btn-primary mb-3">Tambah Absensi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <!-- Search Field -->
    <div class="form-group">
                <input type="text" class="form-control" placeholder="Search..." id="search">
            </div>

            <!-- Departments Table -->
            <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Employee</th>
                <th>Tanggal Absensi</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $attendance->employee->user->name ?? 'N/A' }}</td>
                    <td>{{ $attendance->attendance_date->format('Y-m-d') }}</td>
                    <td>{{ ucfirst($attendance->status) }}</td>
                    <td>
                        <a href="{{ route('attendance.edit', $attendance->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" style="display:inline-block;">
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