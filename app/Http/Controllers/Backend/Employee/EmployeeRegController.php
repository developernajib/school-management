<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;

use App\Models\Designation;
use App\Models\Moderator;
use App\Models\EmployeeSalaryLog;

class EmployeeRegController extends Controller
{

	public function EmployeeView()
	{
		$data['allData'] = Moderator::all();
		return view('backend.admin.dashboard.employee.employee_reg.employee_view', $data);
	}

	public function EmployeeAdd()
	{
		$data['designation'] = Designation::all();
		return view('backend.admin.dashboard.employee.employee_reg.employee_add', $data);
	}

	public function EmployeeStore(Request $request)
	{
		DB::transaction(function () use ($request) {
			$checkYear = date('Ym', strtotime($request->join_date));
			$employee = Moderator::orderBy('id', 'DESC')->first();

			if ($employee == null) {
				$firstReg = 0;
				$employeeId = $firstReg + 1;
				if ($employeeId < 10) {
					$id_no = '000' . $employeeId;
				} elseif ($employeeId < 100) {
					$id_no = '00' . $employeeId;
				} elseif ($employeeId < 1000) {
					$id_no = '0' . $employeeId;
				}
			} else {
				$employee = Moderator::orderBy('id', 'DESC')->first()->id;
				$employeeId = $employee + 1;
				if ($employeeId < 10) {
					$id_no = '000' . $employeeId;
				} elseif ($employeeId < 100) {
					$id_no = '00' . $employeeId;
				} elseif ($employeeId < 1000) {
					$id_no = '0' . $employeeId;
				}
			}

			$final_id_no = $checkYear . $id_no;
			$user = new Moderator();
			$user->id_no = $final_id_no;
			$user->email = $request->email;
			$user->password = Hash::make("123456789");
			$user->name = $request->name;
			$user->fname = $request->fname;
			$user->mname = $request->mname;
			$user->mobile = $request->mobile;
			$user->address = $request->address;
			$user->gender = $request->gender;
			$user->religion = $request->religion;
			$user->salary = $request->salary;
			$user->designation_id = $request->designation_id;
			$user->dob = date('Y-m-d', strtotime($request->dob));
			$user->join_date = date('Y-m-d', strtotime($request->join_date));

			if ($request->file('image')) {
				$file = $request->file('image');
				$filename = date('YmdHi') . $file->getClientOriginalName();
				$file->move(public_path('upload/employee_images'), $filename);
				$user['image'] = $filename;
			}
			$user->save();

			$employee_salary = new EmployeeSalaryLog();
			$employee_salary->employee_id = $user->id;
			$employee_salary->effected_salary = date('Y-m-d', strtotime($request->join_date));
			$employee_salary->previous_salary = $request->salary;
			$employee_salary->present_salary = $request->salary;
			$employee_salary->increment_salary = '0';
			$employee_salary->save();
		});

		$notification = array(
			'message' => 'Employee Registration Inserted Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('employee.registration.view')->with($notification);
	}

	public function EmployeeEdit($id)
	{
		$data['editData'] = Moderator::find($id);
		$data['designation'] = Designation::all();
		return view('backend.admin.dashboard.employee.employee_reg.employee_edit', $data);
	}

	public function EmployeeUpdate(Request $request, $id)
	{
		$user = Moderator::find($id);
		$user->name = $request->name;
		$user->fname = $request->fname;
		$user->mname = $request->mname;
		$user->mobile = $request->mobile;
		$user->address = $request->address;
		$user->gender = $request->gender;
		$user->religion = $request->religion;

		$user->designation_id = $request->designation_id;
		$user->dob = date('Y-m-d', strtotime($request->dob));

		if ($request->file('image')) {
			$file = $request->file('image');
			@unlink(public_path('upload/employee_images/' . $user->image));
			$filename = date('YmdHi') . $file->getClientOriginalName();
			$file->move(public_path('upload/employee_images'), $filename);
			$user['image'] = $filename;
		}
		$user->save();

		$notification = array(
			'message' => 'Employee Registration Updated Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('employee.registration.view')->with($notification);
	}

	public function EmployeeDetails($id)
	{
		$data['details'] = Moderator::find($id);
		$pdf = PDF::loadView('backend.admin.dashboard.employee.employee_reg.employee_details_pdf', $data);
		$pdf->SetProtection(['copy', 'print'], '', 'pass');
		$pdfName = 'employee-r-id- ' . $id;
		return $pdf->stream($pdfName);
	}
}
