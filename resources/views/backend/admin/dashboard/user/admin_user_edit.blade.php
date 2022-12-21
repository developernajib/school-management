@extends('backend.admin.dashboard.admin_master')
@section('title', 'SMS | Dashboard - Add User')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit User Data</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('admin_user_edit_store', $editData->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>User Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" required=""
                                                        value="{{ $editData->name }}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>User Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" required=""
                                                        value="{{ $editData->email }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="text-xs-right">
                                        <a
                                            href="{{ route('admin_user_view') }}"class="btn btn-rounded btn-danger mb-5">Cancel</a>
                                        <input type="submit" class="btn btn-rounded btn-success mb-5" value="Update">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
