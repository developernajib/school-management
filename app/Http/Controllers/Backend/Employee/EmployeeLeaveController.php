<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Moderator;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;

class EmployeeLeaveController extends Controller
{
	public function LeaveView()
	{
		$data['allData'] = EmployeeLeave::orderBy('id', 'desc')->get();
		return view('backend.admin.dashboard.employee.employee_leave.employee_leave_view', $data);
	}

	public function LeaveAdd()
	{

		$data['employees'] = Moderator::all();
		$data['leave_purpose'] = LeavePurpose::all();
		return view('backend.admin.dashboard.employee.employee_leave.employee_leave_add', $data);
	}

	public function LeaveStore(Request $request)
	{

		if ($request->leave_purpose_id == "0") {
			$leavepurpose = new LeavePurpose();
			$leavepurpose->name = $request->name;
			$leavepurpose->save();
			$leave_purpose_id = $leavepurpose->id;
		} else {
			$leave_purpose_id = $request->leave_purpose_id;
		}

		$data = new EmployeeLeave();
		$data->employee_id = $request->employee_id;
		$data->leave_purpose_id = $leave_purpose_id;
		$data->start_date = date('Y-m-d', strtotime($request->start_date));
		$data->end_date = date('Y-m-d', strtotime($request->end_date));
		$data->save();

		$notification = array(
			'message' => 'Employee Leave Data Inserted Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('employee.leave.view')->with($notification);
	}

	public function LeaveEdit($id)
	{
		$data['editData'] = EmployeeLeave::find($id);
		$data['employees'] = Moderator::all();
		$data['leave_purpose'] = LeavePurpose::all();
		return view('backend.admin.dashboard.employee.employee_leave.employee_leave_edit', $data);
	}

	public function LeaveUpdate(Request $request, $id)
	{
		if ($request->leave_purpose_id == "0") {
			$leavepurpose = new LeavePurpose();
			$leavepurpose->name = $request->name;
			$leavepurpose->save();
			$leave_purpose_id = $leavepurpose->id;
		} else {
			$leave_purpose_id = $request->leave_purpose_id;
		}

		$data = EmployeeLeave::find($id);
		$data->employee_id = $request->employee_id;
		$data->leave_purpose_id = $leave_purpose_id;
		$data->start_date = date('Y-m-d', strtotime($request->start_date));
		$data->end_date = date('Y-m-d', strtotime($request->end_date));
		$data->save();

		$notification = array(
			'message' => 'Employee Leave Data Updated Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('employee.leave.view')->with($notification);
	}

	public function LeaveDelete($id)
	{
		$leave = EmployeeLeave::find($id);
		$leave->delete();

		$notification = array(
			'message' => 'Employee Leave Data Deleted Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('employee.leave.view')->with($notification);
	}
}
