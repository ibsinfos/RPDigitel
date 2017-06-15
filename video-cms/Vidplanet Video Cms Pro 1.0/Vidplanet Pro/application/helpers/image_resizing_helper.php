<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('create_thumb'))
{
   function create_thumb($upload_data, $width, $height)
   {
      //  print_r($upload_data).'<br/>';
      //  echo 'width: '.$width.'<br/>';
      //  echo 'height: '.$height;
      //  die();
       $config['image_library'] = 'gd2';
       $config['source_image'] = $upload_data["full_path"];
       $config['new_image'] = $upload_data["file_path"] . 'thumbs/'.$upload_data['file_name'];
       $config['create_thumb'] = FALSE;
       $config['maintain_ratio'] = TRUE;
       $config['width']         = $width;
       $config['height']       = $height;
       $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($config['width'] / $config['height']);
       $config['master_dim'] = ($dim > 0)? "height" : "width";

       $CI = get_instance();
       $CI->load->library('image_lib', $config);

       $CI->image_lib->resize();
      //  print_r($config);
      //  die();
       //Cropping the image
       $config['image_library'] = 'gd2';
       $config['source_image'] = $upload_data["file_path"] . 'thumbs/'.$upload_data['file_name'];
       $config['maintain_ratio'] = FALSE;
       $config['width'] = $width;
       $config['height'] = $height;
       $config['x_axis'] = 0;
       $config['y_axis'] = 0;

       $CI->image_lib->clear();
       $CI->image_lib->initialize($config);

       $CI->image_lib->crop();
   }

}
