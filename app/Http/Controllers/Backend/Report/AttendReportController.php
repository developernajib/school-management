<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Moderator;
use App\Models\EmployeeAttendance;
use PDF;

class AttendReportController extends Controller
{
	public function AttenReportView()
	{
		$data['employees'] = Moderator::all();
		return view('backend.admin.dashboard.report.attend_report.attend_report_view', $data);
	}

	public function AttenReportGet(Request $request)
	{
		$employee_id = $request->employee_id;
		if ($employee_id != '') {
			$where[] = ['employee_id', $employee_id];
		}
		$date = date('Y-m', strtotime($request->date));
		if ($date != '') {
			$where[] = ['date', 'like', $date . '%'];
		}

		$singleAttendance = EmployeeAttendance::with(['user'])->where($where)->get();

		if ($singleAttendance == true) {
			$data['allData'] = EmployeeAttendance::with(['user'])->where($where)->get();

			$data['absents'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status', 'Absent')->get()->count();

			$data['leaves'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status', 'Leave')->get()->count();

			$data['month'] = date('m-Y', strtotime($request->date));

			$pdf = PDF::loadView('backend.admin.dashboard.report.attend_report.attend_report_pdf', $data);
			$pdf->SetProtection(['copy', 'print'], '', 'pass');
			$pdfName = 'attend-r-date- ' . $request->date;
			return $pdf->stream($pdfName);
		} else {
			$notification = array(
				'message' => 'Sorry These Criteria Dose not match',
				'alert-type' => 'error'
			);
			return redirect()->back()->with($notification);
		}
	}
}
