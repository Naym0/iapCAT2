<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fees;

class FeesController extends Controller
{
    public function fees(){
        return view('Muswanya.fees');
    }

    public function allfees(){
        $fees = Fees::all();
        return view('Muswanya.allfees', ['fees' => $fees]);
    }

    public function store(Request $request){
        $validation = $request->validate([
            'id' => 'required',
            'amount' => 'required',
        ], [
            //CUSTOM ERROR MESSAGES
            'id.required' => 'Student id field is mandatory',
            'amount.required' => 'Amount field is mandatory',
        ]);

        $fee = new Fees;
        $fee->student_id = request('id');
        $fee->amount = request('amount');
        $fee->save();

        session()->flash('notif', 'New fees paid successfully!');
        return view('Muswanya.fees');
    }
}
