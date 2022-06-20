<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\PdfListing;

class PdfListingController extends Controller
{
    public function index(){
        $pdfs=PdfListing::latest()->get();
        return view('admin.pdf.index',compact('pdfs'));
    }
    public function addpdf(){
        return view('admin.pdf.add');
    }
    public function storePdf(Request $request){
        $data =$request->all();
        $validateData=$request->validate([
            'name'=> 'required',
            'upload'=>'required',
            'date'=> 'required',

        ]);
        $pdf = new PdfListing();
       $pdf->name = $data['name'];
       if($request->hasFile('upload')) {
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName.'_'.time().'.'.$extension;
        $request->file('upload')->move(public_path('uploads/pdf'), $fileName);
        $pdf->file = $fileName;
        
        }
        
        $pdf->date=$data['date'];
       $pdf->save();
       Session::flash('success_message', 'Pdf Has Been Added Successfully');
        return redirect()->back(); 
    }

    public function deletePdf(Request $request, $id){
        $pdf= PdfListing::findOrFail($id);
        $pdf->delete();
        Session::flash('success_message', 'Pdf Has Been Deleted Successfully');
        return redirect()->back(); 
    }
    public function downloadFile($id){
        $pdf= PdfListing::findOrFail($id);
        $path = 'public/uploads/pdf/'.$pdf->file;
        return response()->download($path);
    }
}
