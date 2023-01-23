<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Paymob_ extends Controller
{
  //Transaction Processed Callbacks -Sever Side-
   public function Response2(Request $request){ 
             $temp_request = $request;
             $json=json_decode($temp_request);

             $amount_cents = $json->obj->amount_cents;
             $order_created_at = $json->obj->order->created_at;
             $currency = $json->obj->currency;
             $error_occured=$json->obj->error_occured;
             $has_parent_transaction=$json->obj->has_parent_transaction;
             $id = $json->obj->order->id;
             $integration_id=$json->obj->integration_id;
             $is_3d_secure = $json->obj->is_3d_secure;
             $is_auth = $json->obj->is_auth;
             $is_capture = $json->obj->is_capture;
             $is_refunded = $json->obj->is_refunded;
             $is_standalone_payment=$json->obj->is_standalone_payment;
             $is_voided = $json->obj->is_voided;
             $order_id=$json->obj->order->id;
             $owner=$json->obj->owner;
             $pending = $json->obj->pending;
             $source_data_pan=$json->obj->source_data->pan;
             $source_data_sub_type=$json->obj->source_data->sub_type;
             $source_data_type=$json->obj->source_data->type;
             $success = $json->obj->success;
             $secure_hash = $json->obj->data->secure_hash;
            
             $request_appended=$amount_cents.$order_created_at.$currency.$error_occured.$has_parent_transaction.$id.$integration_id.$is_3d_secure.$is_auth.$is_capture.$is_refunded.$is_standalone_payment.$is_voided.$order.$owner.$pending.$source_data_pan.$source_data_sub_type.$source_data_type.$success;
             $hashed_string=hash_hmac('SHA512',$request_appended,'6FB5926FA9EBDABC33FDBBF76C2BE8FB');
            // return $request_appended.'<br>'.$hashed_string.'<br>'.$secure_hash;  
        }

        //Transaction Response Callbacks -Client Side-
  public function Response(){
    $data = request()->query();
    $id =$data['id'];
    $order=$data['order'];
    $success =$data['success'];
    $pending =$data['pending'];
    $hmac =$data['hmac'];
    $amount_cents=$data['amount_cents'];
    $created_at=$data['created_at'];
    $currency=$data['currency'];
    $error_occured=$data['error_occured'];
    $has_parent_transaction=$data['has_parent_transaction'];
    $id==$data['id'];
    $integration_id=$data['integration_id'];
    $is_3d_secure=$data['is_3d_secure'];
    $is_auth=$data['is_auth'];
    $is_capture=$data['is_capture'];
    $is_refunded=$data['is_refunded'];
    $is_standalone_payment=$data['is_standalone_payment'];
    $is_voided=$data['is_voided'];
    $order=$data['order'];
    $owner=$data['owner'];
    $pending=$data['pending'];
    $source_data_pan=$data['source_data_pan'];
    $source_data_sub_type=$data['source_data_sub_type'];
    $source_data_type=$data['source_data_type'];
    $success=$data['success'];
    $request_appended=$amount_cents.$created_at.$currency.$error_occured.$has_parent_transaction.$id.$integration_id.$is_3d_secure.$is_auth.$is_capture.$is_refunded.$is_standalone_payment.$is_voided.$order.$owner.$pending.$source_data_pan.$source_data_sub_type.$source_data_type.$success;
    $hashed_string=hash_hmac('SHA512',$request_appended,'6FB5926FA9EBDABC33FDBBF76C2BE8FB');
   // $test='mcmrocmoerm';

    if($hashed_string==$hmac){
        return view ('Response',compact(['id','order','success','pending','hmac']));
      }else{
     echo"<script>alert('Payment UnSuccesful , please try again');</script>";
      } 
}
}
