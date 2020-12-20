<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use DB;
class EmployeeController extends Controller
{

	//emloyee
    public function employee(){

    	return view('backend.employee');
    }

    //add employee

    public function addemployee(Request $request){

         //ORM


        $data = [
            'name'=>$request->input('name'),
            'address'=>$request->input('address'),
            'contact'=>$request->input('contact'),
            'email'=>$request->input('email'),
            'designation'=>$request->input('designation'),

        ];

             if($request->image){

                $image_full_name=uniqid('upload__',true).'.'.strtolower($request->image->getClientOriginalExtension());
        

                $success=$request->image->move(public_path('uploads/'),$image_full_name);
                if($success){
                    $data['image']=$image_full_name;
                     Employee::create($data);
                      return redirect()->route('eview');
                }
            }else{
                 Employee::create($data);
                  return redirect()->route('eview');
            }       

      
}


//view all emloyee
    public function eview()
    {
            
        $employees= Employee::paginate(5);
        return view('Backend.eview', compact('employees'));

    }

//delete employee

    public function deleteemployee($id)
    {
       $employee=Employee::find($id);

       if(!empty($employee))
       {
           $employee->delete();
           $message="Employee Deleted Successfully";
       }else{
           $message="No data found.";
       }
        return redirect()->back()->with('message',$message);
    }






}
