@extends('backend.admin.dashboard.admin_master')
@section('title', 'SMS | Dashboard - Employee')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Employee List</h3>
                                <a href="{{ route('employee.registration.add') }}" style="float: right;"
                                    class="btn btn-rounded btn-success mb-5"> Add Employee</a>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Name</th>
                                                <th>ID NO</th>
                                                <th>Mobile</th>
                                                <th>Gender</th>
                                                <th>Join Date</th>
                                                <th>Salary</th>
                                                <th width="25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $employee)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td> {{ $employee->name }}</td>
                                                    <td> {{ $employee->id_no }}</td>
                                                    <td> {{ $employee->mobile }}</td>
                                                    <td> {{ $employee->gender }}</td>
                                                    <td> {{ $employee->join_date }}</td>
                                                    <td> {{ $employee->salary }}</td>
                                                    <td>
                                                        <a href="{{ route('employee.registration.edit', $employee->id) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <a target="_blank"
                                                            href="{{ route('employee.registration.details', $employee->id) }}"
                                                            class="btn btn-danger">Details</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
