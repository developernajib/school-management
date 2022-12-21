@extends('backend.admin.dashboard.admin_master')
@section('title', 'SMS | Dashboard - View All User')
@section('admin')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">User List</h3>
                        <a href="{{ route('admin_user_add') }}" style="float:right;"
                            class="btn btn-rounded btn-success mb-5">Add
                            User</a>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Role</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userData as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>User</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->status }}</td>
                                            <td>
                                                <a href="{{ route('admin_user_edit', $user->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('admin_user_delete', $user->id) }}" class="btn btn-danger"
                                                    id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
