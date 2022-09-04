<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index () {
        $students = Student::all()->map(function ($student){
            return [
                'id' => $student->id,
                'name' => $student->name,
                'age' => $student->age,
                'gender' => $student->gender,
            ];
        });

        return Inertia::render('Students', ['students' => $students]);
    }

    public function show () {}

    public function create () {}

    public function update (Student $student) {
        $student->update(request()->toArray());
    }

    public function destroy () {}
}
