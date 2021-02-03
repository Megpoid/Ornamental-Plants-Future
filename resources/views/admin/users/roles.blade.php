@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="{{ route('admin.users.set_role', $user->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>:</td>
                            <td>
                                @foreach ($roles as $row)
                                <input type="radio" name="role" {{ $user->hasRole($row) ? 'checked':'' }}
                                    value="{{ $row }}"> {{  $row }} <br>
                                @endforeach
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm float-right">
                    Set Role
                </button>
            </div>
        </form>
    </div>
</div>
@endsection