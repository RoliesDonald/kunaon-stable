<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * KuNaon Point Of Sales
 *
 * @author KuNaon Team - kunaon.studio@gmail.com
 *
 */

// Copyright (C) 2017 KuNaon Team - kunaon.studio@gmail.com
//
// This file is part of KuNaon Point Of Sales software library.
//
// KuNaon Point Of Sales is free software: you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// KuNaon Point Of Sales is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// See LICENSE.TXT file for more information.

if (!function_exists('user_image')) {
  
    function user_image($id = null) {
        $CI = get_instance();
        $CI->load->model('Model_account','account');
        $profile = $CI->account->Profile($CI->session->userdata('ID_USER'));
        if($id){
           $profile = $CI->account->Profile($id);
        }
        if($profile->photo){
        	return base_url().''.$profile->photo;
        }else{
        	return base_url().'assets/dist/img/user-blank.png';
        }
    }
}

if (!function_exists('account_name')) {

    function account_name($id = false) {
        $CI = get_instance();
        $CI->load->model('Model_account','account');
        $profile = $CI->account->Profile($CI->session->userdata('ID_USER'));
        if($id){
          return $CI->session->userdata('ID_USER');
        }else{
            if($profile->fullname){
              return $profile->fullname;
          }else{
              return $profile->email;
          }
        }
    }
}

if (!function_exists('sidebar_menu')) {

    function sidebar_menu($all = false,$selected = null) {
        $CI = get_instance();
        $CI->load->model('Model_account','account');
        $CI->account->get_menu($all,$selected);
    }
}

if (!function_exists('setting')) {

    function setting($name) {
        $CI = get_instance();
        $CI->load->database();
        $CI->db->where('name',trim($name));
        $CI->db->limit(1);
        $data = $CI->db->get('app_setting')->row();
        return $data->value;
    }
}


if (!function_exists('option_setting')) {

    function option_setting($name,$selected = -1) {
       $html = '<option></option>'; 
       $object = setting($name);
       $data = json_decode($object);
       foreach($data as $row){
           if($selected !=null && $selected==$row->id){
                $html .=  "<option value='".$row->id."' selected>".$row->name."</option>";
            }else{
                $html .=  "<option value='".$row->id."'>".$row->name."</option>";
            }
       }
       return $html;
    }
}

if (!function_exists('get_option')) {

    function get_option($data,$name,$selected = -1) {
       $html = '<option></option>'; 
       foreach($data as $row){
           if($selected !=null && $selected==$row->id){
                $html .=  "<option value='".$row->id_main."' selected>".$row->$name."</option>";
            }else{
                $html .=  "<option value='".$row->id_main."'>".$row->$name."</option>";
            }
       }
       return $html;
    }
}

if (!function_exists('user_role')) {

    function user_role($id) {
        $CI = get_instance();
        $CI->load->model('Model_account','model');
        return $CI->model->Roles($id);
    }
}


if (!function_exists('user_status')) {

    function user_status($index) {
       if($index=='1'){
          return '<span class="label label-primary">Active</span>';
       }else{
          return '<span class="label label-danger">No Active</span>';
       }
    }
}

if (!function_exists('crud_action')) {

    function crud_action($url,$id,$edit = true,$remove = true) {
       $html = '<a href="'.base_url($url.'detail/'.$id).'" class="btn btn-xs btn-success btn-details" data-toggle="tooltip" 
     data-placement="top" title="View data"><i class="fa fa-search"></i></a>';
       if($edit){
         $html .= ' <a href="'.base_url($url.'edit/'.$id).'" class="btn btn-xs btn-info btn-edit" data-toggle="tooltip" 
     data-placement="top" title="Edit data"><i class="fa fa-edit"></i></a>';
         }
         if($remove){
           $html .= ' <a href="'.base_url($url.'delete/'.$id).'" class="delete btn btn-xs btn-danger btn-remove" data-toggle="tooltip" 
     data-placement="top" title="Delete data"><i class="fa fa-trash"></i></a>';
       }
       return $html;
    }
}

if (!function_exists('my_date')) {

    function my_date($val) {
        if ($val != NULL) {
            date_default_timezone_set(setting('app_timezone'));
            $date = date_create($val);
            return date_format($date, setting('app_dateformat'));
        } else {
            return NULL;
        }
    }
}



if (!function_exists('date_db')) {

    function date_db($val) {
        if ($val != NULL) {
            return date('Y-m-d', strtotime(str_replace('/', '-', $val)));
        } else {
            return NULL;
        }
    }

}

if (!function_exists('json_select2')) {

    function json_select2($response,$useId = false) {
       $data = array();
         if($response){
          foreach($response as $row){
             if($useId){
               $data[] = array(
                  'id'=>$row->id_main,
                  'text'=>$row->name
                );
             }else{
                $data[] = array(
                  'id'=>$row->name,
                  'text'=>$row->name
                );
             }
          }
         }
        return $data;
    }

}

if (!function_exists('price')) {

    function price($val) {
      return number_format($val,0,"",".");
    }

}

if (!function_exists('tofloat')) {

    function tofloat($val) {
      return floatval(str_replace(',', '.', str_replace('.', '', $val)));
    }

}

if (!function_exists('random_bg')) {

    function random_bg() {
       $data = array('bg-green','bg-red','bg-yellow','bg-blue','bg-aqua');
       return $data[rand(0,(count($data)-1))];
    }

}

if (!function_exists('index_number')) {

    function index_number($val,$digit) {
        $i_number = strlen($val);
        $digit = $digit;
        for($i=$digit;$i>$i_number;$i--){
          $val = "0".$val;
        }
        return $val;
    }

}

if (!function_exists('json_datatables')) {

    function json_datatables($sEcho,$aaData,$total) {
        $sOutput = array(
            "sEcho" => $sEcho,
            "iTotalRecords" => $total,
            "iTotalDisplayRecords" => $total,
            "aaData" => $aaData
        );
        header('Content-Type: application/json');
        return json_encode($sOutput);
    }

}

if (!function_exists('transaction')) {

    function transaction($val) {
        if($val=='0'){
          return "<label class='label label-success'>Cash</label>";
        }else if($val=='1'){
          return "<label class='label label-warning'>Credit</label>";
        }else if($val=='2'){
          return "<label class='label label-info'>Cheque</label>";
        }else{
          return '-';
        }
    }

}

if (!function_exists('upload')) {

    function upload($name,$path) {
        $result = array();

        if(isset($_FILES[$name])){

          $count = count($_FILES[$name]['name']);
            for($i=0; $i<$count; $i++) {    
              $temp = explode(".", $_FILES[$name]["name"][$i]);
              $new_name = md5(date('Y-m-d H:i:s').''.$i);
              $newfilename = $new_name. '.' . end($temp);
              $new_path = $path.''.$newfilename;
              $moved = move_uploaded_file($_FILES[$name]["tmp_name"][$i], $new_path);
              if($moved){
                  $result[] = array('file_name'=>$_FILES[$name]["name"][$i],'path'=>$new_path);
              }

            }
        }

        return $result;
    }

}

if (!function_exists('gen_uuid')) {

    function gen_uuid(){
      return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
      );
    }

}

if (!function_exists('gen_token')) {

    function gen_token(){
        return base64_encode(gen_uuid().''.date("Y-m-d H:i:s"));
    }

}

if (!function_exists('get_messages')) {

    function get_messages() {
        $CI = get_instance();
        $CI->load->model('Model_messages','message');
        $id_user = $CI->session->userdata('ID_USER');
        $data = $CI->message->UnReadByUser($id_user);
        return $data;
    }

}
