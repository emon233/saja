@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h6>{{ $title }}</h6>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-lg-10 col-md-10 mb-4">
        <div class="table table-responsive">
            <table class="table table-condensed table-bordered dataTable">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->first_name. ' ' .$user->middle_name. ' ' .$user->last_name  }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>
                            <a href="{{ route('users.editors.profile', $user->id) }}" class="info">
                                <i class="fa fa-info-circle"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection