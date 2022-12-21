@extends('backend.admin.dashboard.admin_master')
@section('title', 'SMS | Dashboard - Profile view')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box box-widget widget-user">
                            <div class="widget-user-header bg-black">
                                <h3 class="widget-user-username">Name : {{ $admin->name }}</h3>

                                <a href="{{ route('admin_profile_edit') }}" style="float: right;"
                                    class="btn btn-rounded btn-success mb-5"> Edit Profile</a>

                                <h6 class="widget-user-desc">Type : Administrator</h6>
                                <h6 class="widget-user-desc">Email : {{ $admin->email }}</h6>
                            </div>
                            <div class="widget-user-image">
                                <img class="rounded-circle"
                                    src="{{ !empty($admin->image) ? url('upload/user_images/' . $admin->image) : url('upload/no_image.jpg') }} "
                                    alt="Admin Avatar">
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Mobile No</h5>
                                            <span class="description-text">{{ $admin->mobile }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 br-1 bl-1">
                                        <div class="description-block">
                                            <h5 class="description-header">Address</h5>
                                            <span class="description-text">{{ $admin->address }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Gender</h5>
                                            <span class="description-text">{{ $admin->gender }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
