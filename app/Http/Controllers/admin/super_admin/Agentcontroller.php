<?php

namespace App\Http\Controllers\admin\super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\admin_user;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationSuccessful;
use App\Cropper\Slim;
use App;

class Agentcontroller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //agent Main page view

        $agents = admin_user::where('role', 'agent')->get();
        $count = admin_user::where('role', 'agent')->count();
        return view('admin.super_admin.agents.view', ['agents'=>$agents, 'count'=>$count]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.super_admin.agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $count = admin_user::where('role', 'agent')->exists();
        //Add New Agent
        $this->validate($request,[
          'firstname'=>'required',
          'lastname'=>'required',
          'email'=>'required|unique:admin_users|email',
          'contact'=>'required|numeric',
          'company_name'=>'required'
        ]);
        $hashpass = Hash::make($request->contact);
        $agent = new admin_user;
        $agent->firstname = $request->firstname;
        $agent->lastname = $request->lastname;
        $agent->username = $request->email;
        $agent->company_name = $request->company_name;
        $agent->email = $request->email;
        $agent->password = $hashpass;
        $agent->contact = $request->contact;
        $agent->role = 'agent';
        $agent->remember_token = $request->_token;
        $result = $agent->save();
        if($result == 1){
          Mail::to($request->email)->send(new RegistrationSuccessful($request));
          return redirect('admin/agent')->with(['notification_title'=>'Success', 'notification_type'=>'success', 'notification'=>'Agent '.$request->firstname.' Registered Successfully']);
        }else{
          return redirect('admin/agent')->with(['notification_title'=>'Error', 'notification_type'=>'error', 'notification'=>'Agent '.$request->firstname.' Registration Failed']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $id = preg_replace('/[^0-9]/', '', $id);
      $check = admin_user::where(['id'=>$id, 'role'=>'agent'])->exists();
      if($check){
        $user = admin_user::where(['id'=>$id, 'role'=>'agent'])->limit(1)->get();
        return view('admin.super_admin.agents.edit', ['user'=>$user, 'id'=>$id]);

      }else{
        abort(403, 'Something Went Wrong');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'firstname'=>'required',
        'lastname'=>'required',
        'contact'=>'required|regex:/^[6-9]\d{9}$/|numeric',
        'password'=>'nullable|min:6|confirmed',
      ]);

      $images = Slim::getImages();
      if($images != false){

        foreach ($images as $image) {
          $profile_img = base64_encode($image['output']['data']);
          $img_type = $image['output']['type'];
        }
      }else{
        $profile_img = '';
        $img_type = '';
      }


      $id = preg_replace('/[^0-9]/', '', $id);
      $check = admin_user::where(['id'=>$id, 'role'=>'agent'])->exists();
      if($check){
        $profile = admin_user::find($id);
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->company_name = $request->company_name;
        $profile->address = $request->address;
        $profile->landmark = $request->landmark;
        $profile->contact = $request->contact;
        $profile->gst_in = $request->gst_in;
        $profile->pan_no = $request->pan_no;
        $profile->website = $request->website;
        $profile->profile_img = $profile_img;
        $profile->img_type = $img_type;
        $profile->city = $request->city;
        $profile->district = $request->district;
        $profile->state = $request->state;
        $profile->postal_code = $request->postal_code;
        $profile->password = Hash::make($request->password);
        $result = $profile->save();

        if($result){

          $match = admin_user::where(['id'=>$id, 'username'=>$request->username])->doesntExist();

          if($match){
            echo "Not Same Entery";
            $check2 = admin_user::where('username', $request->username)->doesntExist();
            if($request->username != null ){
              if( $check2 == 1){
                $profile->username = $request->username;
                $result = $profile->save();
              }else{
                return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Duplicate', 'notification'=>'Username is already taken']);
              }
            }else{
              return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Duplicate', 'notification'=>'Please Enter a Username']);
            }
            if($result !=1){
              return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Duplicate', 'notification'=>'Can\'t Edit Username at this time']);
            }
          }

          return redirect()->back()->with(['notification_type'=>'success', 'notification_title'=>'Edited', 'notification'=>'Agent Edited Successfully']);
        }else{
          return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Failed to Edit']);
        }
      }else{
        abort(403, 'Something Went Wrong');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chk = admin_user::find($id)->exists();

      if($chk == 1){
        $result = admin_user::find($id)->delete();
        if($result){
          return redirect()->back()->with(['notification_type'=>'success', 'notification_title'=>'Deleted', 'notification'=>'Agent Deleted Successfully']);
        }else{
          return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Failed to Delete']);
        }
      }else{
        return redirect()->back();
      }
    }
}
