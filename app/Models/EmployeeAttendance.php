<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
     public function user()
     {
          return $this->belongsTo(Moderator::class, 'employee_id', 'id');
     }
}
