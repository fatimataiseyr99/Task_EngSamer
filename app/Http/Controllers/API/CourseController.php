<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return Course::with('teacher')->get();
    }

    public function store(Request $request)
    {
        $course = Course::create($request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'teacher_id' => 'required|exists:teachers,id',
        ]));

        return response()->json($course, 201);
    }

    public function show(Course $course)
    {
        return $course->load('teacher');
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->validate([
            'title' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'teacher_id' => 'sometimes|required|exists:teachers,id',
        ]));

        return response()->json($course);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json(null, 204);
    }
    public function students($id)
{
    $course = Course::with('students')->findOrFail($id);
    return response()->json($course->students);
}

}