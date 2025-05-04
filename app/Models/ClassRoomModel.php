<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//  get the DB facade
use Illuminate\Support\Facades\DB;

class ClassRoomModel
{

    // get all students
    public static function  getAllStudents()
    {
        return DB::table('Students')->get();

    }
    // get all teachers
    public static function getAllTeachers()
    {
        return DB::table('Teachers')->get();
    }
    // get students by id
    public static function getStudentById($id)
    {
        return DB::table('Students')->where('id', $id)->first();
    }
    // get teachers by id
    public static function getTeacherById($id)
    {
        return DB::table('Teachers')->where('id', $id)->first();
    }

    // add student
    public static function addStudent($data)
    {
        if (isset($data['name']) && isset($data['email']) && isset($data['age'])) {
            $id = DB::table('Students')->insertGetId([
                'name' => $data['name'],
                'email' => $data['email'],
                'age' => $data['age'],
                'created_at' => now(),
            ]);
            return DB::table('Students')->where('id', $id)->first();
        }
        return null;
    }
    // add teacher
    public static function addTeacher($data)
    {
        if (isset($data['name']) && isset($data['email']) && isset($data['subject'])) {
            $id = DB::table('Teachers')->insertGetId([
                'name' => $data['name'],
                'email' => $data['email'],
                'subject' => $data['subject'],
                'created_at' => now(),
            ]);
            return DB::table('Teachers')->where('id', $id)->first();
        }
        return null;
    }
    // update student
    public static function updateStudent($id, $data)
    {
        if (isset($data['name']) && isset($data['email']) && isset($data['age'])) {
            DB::table('Students')->where('id', $id)->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'age' => $data['age'],
                'created_at' => now(),
            ]);
            
            return DB::table('Students')->where('id', $id)->first();
        }
        return null;
    }
    // update teacher
    public static function updateTeacher($id, $data)
    {
        if (isset($data['name']) && isset($data['email']) && isset($data['subject'])) {
            DB::table('Teachers')->where('id', $id)->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'subject' => $data['subject'],
                'created_at' => now(),
            ]);
            return DB::table('Teachers')->where('id', $id)->first();
        }
        return null;
    }
    // delete student
    public static function deleteStudent($id)
    {
        // check if student exists
        $student = DB::table('Students')->where('id', $id)->first();
        if (!$student) {
            return false;
        }else {
            DB::table('Students')->where('id', $id)->delete();
            return true;
        }
    }
    // delete teacher
    public static function deleteTeacher($id)
    {
        // check if teacher exists
        $teacher = DB::table('Teachers')->where('id', $id)->first();
        if (!$teacher) {
            return false;
        }else {
            DB::table('Teachers')->where('id', $id)->delete();
            return true;
        }
    }
    
}
