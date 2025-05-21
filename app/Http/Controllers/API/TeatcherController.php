<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Teatcher;
use Illuminate\Http\Request;

class TeatcherController extends Controller
{
    public function index()
    {
        return Teatcher::all();
    }

    public function store(Request $request)
    {
        $teacher = Teatcher::create($request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:teachers,email',
        ]));

        return response()->json($teacher, 201);
    }

    public function show(Teatcher $teacher)
    {
        return $teacher;
    }

    public function update(Request $request, Teatcher $teacher)
    {
        $teacher->update($request->validate([
            'name' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:teachers,email,' . $teacher->id,
        ]));

        return response()->json($teacher);
    }

    public function destroy(Teatcher $teacher)
    {
        $teacher->delete();

        return response()->json(null, 204);
    }
    public function courses($id)
{
    $teacher = Teatcher::with('courses')->findOrFail($id);
    return response()->json($teacher->courses);
}

}