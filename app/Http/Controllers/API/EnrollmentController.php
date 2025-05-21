<?php

namespace App\Http\Controllers\API;
Use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
      public function enroll(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::find($data['student_id']);
        $student->courses()->syncWithoutDetaching([$data['course_id']]);

        return response()->json(['message' => 'تم تسجيل الطالب في الكورس بنجاح'], 200);
    }
}
