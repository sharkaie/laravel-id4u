<?php

namespace App\Http\Controllers\admin\agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Model\admin_user;
use App\Cropper\Slim;
use App;
use Auth;

class Profilecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Auth::guard('admin')->user()->id;
      if($id!=null){
        $user = admin_user::where('id',$id)->get();
        return view('admin.agent.profile.view', ['user'=>$user, 'id'=>$id]);
      }else{
        return redirect()->back();
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
        'company_name'=>'required',
        'address'=>'required',
        'landmark'=>'required',
        'contact'=>'required|regex:/^[6-9]\d{9}$/|numeric',
        'gst_in'=>'required',
        'pan_no'=>'required',
        'website'=>'required',
        'photo'=>'required',
        'password'=>'nullable|min:6|confirmed',
        'city'=>'required',
        'district'=>'required',
        'state'=>'required',
        'postal_code'=>'required',
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

          return redirect()->back()->with(['notification_type'=>'success', 'notification_title'=>'Edited', 'notification'=>'Profile Updated Successfully']);
        }else{
          return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Failed to Update Profile']);
        }
      }else{
        abort(403, 'Something Went Wrong');
      }
    }
}
