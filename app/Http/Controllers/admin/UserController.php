<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;


class UserController extends Controller
{
    public function users(){
        $data['users'] =User::get();
        return view('admin.users.userList', $data );
    }

    public function createUuser(){
        return view('admin.users.createUser');
    }

    //create a new user
    public function storeUser(Request $request){
     
        User::create( [
            'name'      => $request->name,
            'email'     => $request->email, 
            'password'  => $request->password
           ]);
           Toastr::success('User has been successfuly created', 'Title', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }

    //update a user
    public function updateUser($id){
        $userdata['user'] = User::find($id);
        return view('admin.users.updateUser', $userdata);
    }

    public function updateSubmit(Request $request, $id){

        User::find($id)->update([
            'name'      => $request->name,
            'email'     => $request->email, 
            'password'  => $request->password
        ]);
        return redirect()->back();
        }  

    public function delete($id){
      User::find($id)->delete();
      return redirect()->back();

      
    }
    
}