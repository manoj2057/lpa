<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Insurance;

class InsuranceController extends Controller
{
    public function index(){
        $insurances=Insurance::latest()->get();
        return view('admin.insurance.index',compact('insurances'));
    }
    public function addInsurance(){
        return view('admin.insurance.add');
    }
    public function storeInsurance(Request $request){
        $data =$request->all();
        $validateData=$request->validate([
            'title'=> 'required',
        ]);
        $insurance = new Insurance();
        $insurance->title = $data['title'];
        $insurance->save();
        Session::flash('success_message', 'insurance Has Been Added Successfully');
        return redirect()->back(); 



    }

    public function deleteInsurance(Request $request, $id){
        $insurance= Insurance::findOrFail($id);
        $insurance->delete();
        Session::flash('success_message', 'Insurance Has Been Deleted Successfully');
        return redirect()->back(); 
    }
}
