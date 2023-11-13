<?php

namespace App\Http\Controllers\admin\super_admin;

use App\Exports\LotExport;
use App\Http\Controllers\Controller;
use Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\admin_user;
use App\Model\digital_form;
use App\Model\lot_submission_log;
use App\Model\form_field;
use App\Model\form_fields_log;
use App\Model\form_fields_option;
use App\Model\user_data_entry;
use App\Model\project;
use App\Model\project_setting;
use ZipArchive;

use Excel;

class Generatorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(session('agent_id')&&session('customer_id'))
        {
          $agent_id = session('agent_id');
          $customer_id = session('customer_id');
          $customer_info = admin_user::where('id', $customer_id)->get();
          $agents = admin_user::where('role', 'agent')->get();
          $agent_info = admin_user::where('id', $agent_id)->get();
          $projects = project::where('customer_id', $customer_id)->get();

          return view('admin.super_admin.generator.view', ['projects'=>$projects, 'agents'=>$agents, 'agent_info'=>$agent_info, 'customer_info'=>$customer_info, 'customer_id'=>$customer_id, 'agent_id'=>$agent_id, 'user_pass'=>1]);
        }else{
          $agents = admin_user::where('role', 'agent')->get();
          return view('admin.super_admin.generator.view', ['agents'=>$agents,'user_pass'=>0]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $img = Image::make('design.jpg')->insert('photo.png', '','200','350')->encode('png');
        // $base64 = 'data:image/png;base64,' . base64_encode($img);
        // echo '<img src="'.$base64.'" style="cursor:url('.url('cursor.png').'),auto;" />';
        if(session('agent_id') && session('customer_id')){

          $agent_id = session('agent_id');
          $customer_id = session('customer_id');
          $customer_info = admin_user::where('id', $customer_id)->get();
          $agents = admin_user::where('role', 'agent')->get();
          $agent_info = admin_user::where('id', $agent_id)->get();
          $lot = lot_submission_log::where('customer_id', $customer_id)->get();


          return view('admin.super_admin.generator.create', ['agents'=>$agents, 'agent_info'=>$agent_info, 'lots'=>$lot, 'customer_info'=>$customer_info, 'customer_id'=>$customer_id, 'agent_id'=>$agent_id, 'user_pass'=>1]);
        }else{
          $agents = admin_user::where('role', 'agent')->get();
          return view('admin.super_admin.generator.create', ['agents'=>$agents, 'user_pass'=>'0']);
        }



    }

    public function show_design($id, $side){

      if(session('agent_id') && session('customer_id')){
        $connection = project::where('id', $id)->get();
        if($side== 'D'){
          $connection2 = project::where('id', $id)->where('card_type', $side)->count();
        }else{
          $connection2 =1;
        }

        if($connection && $connection2 ==1){
          foreach($connection as $data){
            if($side == 'S'){
              return '<img style="display: block;margin-left: auto;margin-right: auto;width: 50%;" src="'.$data->card_template_front.'" alt = "No Design" />';
            }
            if($side == 'D'){
              return '<img style="display: block;margin-left: auto;margin-right: auto;width: 50%;" src="'.$data->card_template_back.'" alt = "No Design" />';
            }
          }
        }else{
          return redirect()->back();
        }
      }else{
        return redirect()->back();
      }
    }

    public function results(){

      return "Working";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
          'project_title' => 'required',
          'card_width' => 'numeric|required',
          'card_height'=> 'numeric|required',
          'card_template_f' => 'required',
          'card_template_b' => 'nullable',
          'card_type' => 'required'
        ]);

        if(session('customer_id') && session('agent_id')){
          $customer_id = session('customer_id');
          $card_width = $request->card_width * 12;
          $card_height = $request->card_height * 12;

          $temp_data_f = 'data:image/png;base64,' . base64_encode(file_get_contents($request->card_template_f));
          $temp_data_f = Image::make($temp_data_f)->resize($card_width, $card_height)->encode('png');
          $img_f = new \Imagick();
          $img_f->readImageBlob($temp_data_f);
          $img_f->setImageResolution(118.111,118.111);
          $img_f->setImageFormat("png");
          $blob_f = $img_f->getImageBlob();
          $temp_data_f = 'data:image/png;base64,' . base64_encode($blob_f);

          if($request->card_template_b!=null){
            $temp_data_b = 'data:image/png;base64,' . base64_encode(file_get_contents($request->card_template_b));
            $temp_data_b = Image::make($temp_data_b)->resize($card_width, $card_height)->encode('png');
            $img_b = new \Imagick();
            $img_b->readImageBlob($temp_data_b);
            $img_b->setImageResolution(118.111,118.111);
            $img_b->setImageFormat("png");
            $blob_b = $img_b->getImageBlob();
            $temp_data_b = 'data:image/png;base64,' . base64_encode($blob_b);

          }elseif($request->card_type == 'D'){
            $blank_b = Image::canvas($card_width, $card_height, '#fff')->encode('png');
            $img_b = new \Imagick();
            $img_b->readImageBlob($blank_b);
            $img_b->setImageResolution(118.111,118.111);
            $img_b->setImageFormat("png");
            $blob_b = $img_b->getImageBlob();
            $temp_data_b = 'data:image/png;base64,' . base64_encode($blob_b);
            echo '<img src="'.$temp_data_b.'" />';
          }else{
            $temp_data_b = '';
          }

          $project = new project;
          $project->project_title = $request->project_title;
          $project->customer_id = $customer_id;
          $project->card_width = $request->card_width;
          $project->card_height = $request->card_height;
          $project->card_template_front = $temp_data_f;
          $project->card_template_back = $temp_data_b;
          $project->card_type = $request->card_type;
          $result = $project->save();
          if($result){
            return redirect('admin/id-generator/')->with(['notification'=>'Project Created Successfully', 'notification_type'=>'success', 'notification_title'=>'Project Created']);
          }else{
            return redirect('admin/id-generator/create')->with(['notification'=>'Project Submission Failed', 'notification_type'=>'error', 'notification_title'=>'Project Not Created']);
          }

        }else{
          return view('admin.super_admin.generator.create', ['agents'=>$agents, 'user_pass'=>'0']);
        }
    }

    public function test(){
      $id = array(2,3 );
      return DB::table('admin_users')->whereIn('id', $id)->get();
    }

    public function set_field($id){

      //403
      //210
  //     $img = Image::make('front.jpg');
  //
  //       $img->text('Vedant Bhoyar', $request->card_front_x, $request->card_front_y, function($font) {
  //       $font->file(public_path('/open_sans_b.ttf'));
  //       $font->size(30);
  //       $font->color('#000');
  //       $font->align('left');
  //       $font->valign('bottom');
  //     });
  // return $img->response('jpg');
  //
  //     echo "X :".$request->card_front_x."<br>";
  //     echo "Y :".$request->card_front_y."<br>";

      if(session('agent_id') && session('customer_id')){

        $agent_id = session('agent_id');
        $customer_id = session('customer_id');
        $customer_info = admin_user::where('id', $customer_id)->get();
        $agents = admin_user::where('role', 'agent')->get();
        $agent_info = admin_user::where('id', $agent_id)->get();
        $lot = lot_submission_log::where('customer_id', $customer_id)->get();


        return view('admin.super_admin.generator.set_field', ['agents'=>$agents, 'agent_info'=>$agent_info, 'lots'=>$lot, 'customer_info'=>$customer_info, 'customer_id'=>$customer_id, 'agent_id'=>$agent_id, 'user_pass'=>1]);
      }else{
        $agents = admin_user::where('role', 'agent')->get();
        return view('admin.super_admin.generator.set_field', ['agents'=>$agents, 'user_pass'=>'0']);
      }
    }

    public function store_set(Request $request){
      return $request;
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
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
