@extends('layouts.admin.app')
@section('content')

    <div class="d-flex gap-2 mb-3 mt-2">
        <div>
            <form class="position-relative">
                <input type="search" name="name" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Search">
                <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>

        <form>
            <div class="d-flex gap-2">
                <select name="status" class="form-select">
                    <option>---</option>
                    <option value="panding">Panding</option>
                    <option value="approved">Approved</option>
                    <option value="notapproved">Reject</option>
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>
    </div>

    <div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    <form action="{{ route('user.approved', ['user' => $user->id]) }}" method="post">
                        @method('patch')
                        @csrf
                        <button type="submit" name="status" class="btn btn-success" value="approved">Approved</button>
                    </form>

                    <form action="{{ route('user.reject', ['user' => $user->id]) }}" method="post">
                        @method('patch')
                        @csrf
                        <button type="submit" name="status" class="btn btn-danger" value="notapproved">Reject</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
