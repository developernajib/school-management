@extends('backend.admin.dashboard.admin_master')
@section('title', 'SMS | Dashboard - Grade marks add')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Grade Marks </h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('store.marks.grade') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Grade Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="grade_name" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Grade Point <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="grade_point" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Start Marks <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="start_marks" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>End Marks <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="end_marks" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Start Point <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="start_point" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>End Point <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="end_point" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Remarks <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="remarks" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                                            </div>
                                        </div>
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
