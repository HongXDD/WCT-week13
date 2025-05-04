<?php

use Illuminate\Support\Facades\Route;
use App\Models\ClassRoomModel;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});
// get all students
Route::get('/students', function() {
    $students = ClassRoomModel::getAllStudents();
    return response()->json($students);
});
// get all teachers
Route::get('/teachers', function() {
    $teachers = ClassRoomModel::getAllTeachers();
    return response()->json($teachers);
});
// get students by id
Route::get('/students/{id}', function($id) {
    $student = DB::table('Students')->where('id', $id)->first();
    return response()->json($student);
});
// get teachers by id
Route::get('/teachers/{id}', function($id) {
    $teacher = DB::table('Teachers')->where('id', $id)->first();
    return response()->json($teacher);
});
// add student
Route::post('/students', function() {
    $data = request()->all();
    $student = ClassRoomModel::addStudent($data);
    return response()->json($student);
});
// add teacher
Route::post('/teachers', function() {
    $data = request()->all();
    $teacher = ClassRoomModel::addTeacher($data);
    return response()->json($teacher);
});
// update student
Route::put('/students/{id}', function($id) {
    $data = request()->all();
    $student = ClassRoomModel::updateStudent($id, $data);
    return response()->json($student);
});
// update teacher
Route::put('/teachers/{id}', function($id) {
    $data = request()->all();
    $teacher = ClassRoomModel::updateTeacher($id, $data);
    return response()->json($teacher);
});
// delete student
Route::delete('/students/{id}', function($id) {
    $student = ClassRoomModel::deleteStudent($id);
    if ($student) {
        return response()->json(['message' => 'Student deleted successfully'],202);
    }else {
        return response()->json(['message' => 'Student not found'], 404);
    }
});
// delete teacher
Route::delete('/teachers/{id}', function($id) {

    $teacher = ClassRoomModel::deleteTeacher($id);
    if ($teacher) {
        return response()->json(['message' => 'Teacher deleted successfully'], 202);
    } else {
        return response()->json(['message' => 'Teacher not found'], 404);
    }
});




