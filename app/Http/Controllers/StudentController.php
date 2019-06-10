<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use App\Fees;

class StudentController extends Controller
{
    public function student(){
        return view('Muswanya.student');
    }

    public function onestudent(Request $request){
        $validation = $request->validate([
            'id' => 'required | exists:students,student_id'
        ]);
        $payments = Fees::where('student_id', $request->post('id'))->get();
        return view('Muswanya.onestudent')->with('payments', $payments);
    }

    public function insert(Request $request){
        $validation = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required | unique:students,email',
            'age' => 'required',
            'dob' => 'required | date | before:yesterday',
            'course' => 'required',
        ], [
            //CUSTOM ERROR MESSAGES
            'fname.required' => 'Please ensure first name field is filled',
            'lname.required' => 'Please ensure last name field is filled',
            'email.required' => 'Please ensure email field is filled',
            'age.required' => 'Please ensure age is filled',
            'dob.required' => 'Please ensure date of birth is filled',
            'course.required' => 'Please ensure course field is filled',
            'email.unique' => 'That email address is already in use, please use another'
        ]);

        $student = new Student;
        $student->first_name = request('fname');
        $student->last_name = request('lname');
        $student->email = request('email');
        $student->age = request('age');
        $student->dob = request('dob');
        $student->course = request('course');
        $student->save();

        session()->flash('notif', 'New student added successfully!');
        return view('Muswanya.student');
        // return 'Saved!';
    }
}
