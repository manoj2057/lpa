<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Callout;

class CalloutController extends Controller
{
    public function index(){
        $callouts=Callout::latest()->get();
        return view('admin.callout.index',compact('callouts'));
        }
        public function addCallout(){
            return view('admin.callout.add');
        }
        public function storeCallout(Request $request){
            $data =$request->all();
            $validateData=$request->validate([
                'heading'=> 'required',
                'content'=>'required',
                'icon'=> 'required',
    
            ]);
            $callout = new Callout();
            $callout->heading = $data['heading'];
    
        
            $callout->content = $data['content'];
            $callout->icon = $data['icon'];
        
            $callout->save();
            Session::flash('success_message', 'Callout has been added Successfully');
            return redirect()->back(); 
    
    
            }
            
            public function editCallout($id){
                $callout= Callout::findOrFail($id);
                return view('admin.Callout.edit',compact('callout'));
            }
            public function updateCallout(Request $request, $id){
                
                $data =$request->all();
                $callout= Callout::findOrFail($id);
                $callout->heading = $data['heading'];
                $callout->content = $data['content'];
                $callout->icon = $data['icon'];
                
                
               
                $callout->save();
                Session::flash('success_message', 'Callout has been updated Successfully');
                return redirect()->back(); 
        
        
                }
                
                public function deleteCallout(Request $request, $id){
                    $callout= Callout::findOrFail($id);
                    $callout->delete();
                    Session::flash('success_message', 'Callout Has Been Deleted Successfully');
                    return redirect()->back(); 
                }
    
}
