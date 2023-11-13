<?php

namespace App\Http\Controllers\admin\agent;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\admin_user;
use Auth;
use App\Cropper\Slim;
use App;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationSuccessful_c;

class Customercontroller extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent_id = Auth::guard('admin')->user()->id;
        for($i=0;$i<5;$i++){
          $AlphaN = str_shuffle("ABCDEFG12345BCDEFG6789HJKLMNPQRSTWXYZaABCDEFG12345BCDEFG67789HJKLMNPQRSTWXYZaABCDEFG12345BCDEFG6789HJKLMNPQRSTWXYZab12345BCDEFGBCDEFG6789cdefghBCDEFGjkmn89HJKLMNPQRSTWXYZab12345BCDEFGBCDEFG6789cdefghBCDEFGjkmnpqr123456789BCDEFGstwxyz123456789");
        }

        do {
          $AlphaN = "@#".$AlphaN;
          $username = substr(str_shuffle($AlphaN),0, 6);
          $pass = admin_user::where('username',$username)->doesntExist();
        } while ($pass != 1);

        //show customers
        $customers = admin_user::where(['role'=>'customer', 'agent_refered'=>$agent_id])->get();
        return view('admin.agent.customers.view', ['customers'=>$customers, 'username'=>$username]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //s
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $agent_id = Auth::guard('admin')->user()->id;
        //add new customer
        $this->validate($request,[
          'firstname'=>'required',
          'lastname'=>'required',
          'email'=>'required|email',
          'company_name'=>'required',
          'username'=>'nullable|unique:admin_users',
          'contact'=>'required',
        ]);

        if($request->username == null){
          $request->username = $request->email;
        }else{
          $username = $request->username;

        }

        $val = admin_user::where('username',$request->username)->doesntExist();
        if($val == 1){
          $hashpass = Hash::make($request->contact);
          $customer = new admin_user;
          $customer->firstname = $request->firstname;
          $customer->lastname = $request->lastname;
          $customer->username = $username;
          $customer->email = $request->email;
          $customer->company_name = $request->company_name;
          $customer->password = $hashpass;
          $customer->contact = $request->contact;
          $customer->agent_refered = $agent_id;
          $customer->role = 'customer';
          $customer->remember_token = $request->_token;
          $result = $customer->save();
        }else{
          return redirect(route('customers.index'))->with(['notification_title'=>'Error', 'notification_type'=>'error', 'notification'=>'Username is already taken']);
        }

        if($result == 1){
            Mail::to($request->email)->send(new RegistrationSuccessful_c($request));
          return redirect(route('customers.index'))->with(['notification_title'=>'Success', 'notification_type'=>'success', 'notification'=>'Customer '.$request->firstname.' Registered Successfully']);
        }else{
          return redirect(route('customers.index'))->with(['notification_title'=>'Error', 'notification_type'=>'error', 'notification'=>'Customer '.$request->firstname.' Registration Failed']);
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
       $check = admin_user::where(['id'=>$id, 'role'=>'customer'])->exists();
       if($check){
         $user = admin_user::where(['id'=>$id, 'role'=>'customer'])->limit(1)->get();
         return view('admin.agent.customers.edit', ['user'=>$user, 'id'=>$id]);

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
       $check = admin_user::where(['id'=>$id, 'role'=>'customer'])->exists();
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

           return redirect()->back()->with(['notification_type'=>'success', 'notification_title'=>'Edited', 'notification'=>'Customer Edited Successfully']);
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
          return redirect()->back()->with(['notification_type'=>'success', 'notification_title'=>'Deleted', 'notification'=>'Customer Deleted Successfully']);
        }else{
          return redirect()->back()->with(['notification_type'=>'error', 'notification_title'=>'Error', 'notification'=>'Failed to Delete']);
        }
      }else{
        return redirect()->back();
      }

    }

    public function json_customers($id)
    {
      $customers = admin_user::where('agent_refered',$id)->get();
      return $customers;
    }
}
