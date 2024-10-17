@extends('admin.app')

@section('content')
<div class="container">
    <h3>Tambah Cuti</h3>

    <form action="{{ route('leave.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">Karyawan</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Pilih Karyawan</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->user_id }}">{{ $employee->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="start_of_date" class="form-label">Tanggal Mulai</label>
            <input type="date" name="start_of_date" id="start_of_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_of_date" class="form-label">Tanggal Akhir</label>
            <input type="date" name="end_of_date" id="end_of_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection