<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Moderator;
use App\Models\EmployeeAttendance;


class EmployeeAttendanceController extends Controller
{
	public function AttendanceView()
	{
		$data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id', 'DESC')->get();
		return view('backend.admin.dashboard.employee.employee_attendance.employee_attendance_view', $data);
	}

	public function AttendanceAdd()
	{
		$data['employees'] = Moderator::all();
		return view('backend.admin.dashboard.employee.employee_attendance.employee_attendance_add', $data);
	}

	public function AttendanceStore(Request $request)
	{

		EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
		$countemployee = count($request->employee_id);
		for ($i = 0; $i < $countemployee; $i++) {
			$attend_status = 'attend_status' . $i;
			$attend = new EmployeeAttendance();
			$attend->date = date('Y-m-d', strtotime($request->date));
			$attend->employee_id = $request->employee_id[$i];
			$attend->attend_status = $request->$attend_status;
			$attend->save();
		}

		$notification = array(
			'message' => 'Employee Attendace Data Update Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('employee.attendance.view')->with($notification);
	}

	public function AttendanceEdit($date)
	{
		$data['editData'] = EmployeeAttendance::where('date', $date)->get();
		$data['employees'] = Moderator::all();
		return view('backend.admin.dashboard.employee.employee_attendance.employee_attendance_edit', $data);
	}

	public function AttendanceDetails($date)
	{
		$data['details'] = EmployeeAttendance::where('date', $date)->get();
		return view('backend.admin.dashboard.employee.employee_attendance.employee_attendance_details', $data);
	}
}
