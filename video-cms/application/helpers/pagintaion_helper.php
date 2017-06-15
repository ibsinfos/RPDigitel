<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('pagintaion'))
{
  function pagintaion($total_rows, $per_page_item){
    $color_scheme              = get_settings('theme_color_scheme');
    $config['per_page']        = $per_page_item;
    $config['num_links']       = 2;
    $config['total_rows']      = $total_rows;
    $config['full_tag_open']   = '<ul class="pagination pagination-'.$color_scheme.'">';
    $config['full_tag_close']  = '</ul>';
    $config['prev_link']       = '«';
    $config['prev_tag_open']   = '<li><div class="ripple-container"></div>';
    $config['prev_tag_close']  = '</li>';
    $config['next_link']       = '»';
    $config['next_tag_open']   = '<li><div class="ripple-container"></div>';
    $config['next_tag_close']  = '</li>';
    $config['cur_tag_open']    = '<li class="active"><a href="#">';
    $config['cur_tag_close']   = '</a></li>';
    $config['num_tag_open']    = '<li>';
    $config['num_tag_close']   = '</li>';
    $config['first_tag_open']  = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open']   = '<li>';
    $config['last_tag_close']  = '</li>';
    $config['first_link']      = '&lt;&lt;';
    $config['last_link']       = '&gt;&gt;';
    return $config;
  }
}
