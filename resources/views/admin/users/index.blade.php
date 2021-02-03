@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Users Table</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-info btn-sm">Create New User</a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>Status</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($users as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                @foreach ($row->getRoleNames() as $role)
                                <label for="" class="badge badge-info">{{ $role }}</label>
                                @endforeach
                            </td>
                            <td>
                                @if ($row->status)
                                <label class="badge badge-success">Aktif</label>
                                @else
                                <label for="" class="badge badge-default">Suspend</label>
                                @endif
                            </td>
                            <td>
                                {{-- <form action="{{ route('admin.users.destroy', $row->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE"> --}}
                                    <a href="{{ route('admin.users.roles', $row->id) }}" class="btn btn-info btn-sm"><i
                                            class="fa fa-user-secret"></i></a>
                                    <a href="{{ route('admin.users.edit', $row->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    {{-- <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form> --}}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
