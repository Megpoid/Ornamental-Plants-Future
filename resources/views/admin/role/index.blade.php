@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-4">
        <form role="form" action="{{ route('role.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Role</label>
                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                    id="name" required>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Role</td>
                        <td>Guard</td>
                        <td>Created At</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($role as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->guard_name }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>
                            <form action="{{ route('role.destroy', $row->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="float-right">
            {!! $role->links() !!}
        </div>
    </div>
</div>
@endsection
