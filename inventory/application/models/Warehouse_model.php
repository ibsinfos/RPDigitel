<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Warehouse_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
    public function creating_new_warehouse($data){
      $this->db->insert('warehouse', $data);
    }

    public function updating_warehouse($data){
      //echo $data['warehouse_code'];
      $this->db->where('warehouse_code',$data['warehouse_code']);
      $this->db->update('warehouse',$data);
    }

    public function get_all_manager(){
      $this->db->where('type',5);
      $query       = $this->db->get('user');
      $all_manager = $query->result_array();
      return $all_manager;
    }

    public function delete_warehouse($code){
      $this->db->where('warehouse_code' , $code);
      $this->db->delete('warehouse');
    }

    public function get_manager_name($manager_code){
      $this->db->where('user_code', $manager_code);
      $query = $this->db->get('user');
      $query_result = $query->row_array();
      return $query_result;
    }
    public function get_warehouse_name(){
      $query = $this->db->get('warehouse');
      $query_result = $query->result_array();
      return $query_result;
    }
    public function get_product_id($variant_code){
      $this->db->where('code', $variant_code);
      $query = $this->db->get('variant');
      $query_result = $query->row_array();
      return $query_result;
    }
    public function add_to_different_warehouse_table($data){
      $new_quantity = 0;
      $checking_data = array(
        'warehouse_code' => $data['warehouse_code'],
        'product_id'     => $data['product_id'],
        'variant_code'   => $data['variant_code'],
        'product_status' => '1'
      );

      $this->db->where($checking_data);
      $query = $this->db->get('warehouse_details');
      if ($query->num_rows() > 0){

        $this->db->where($checking_data);
        $query_result = $this->db->get('warehouse_details')->row_array();
        $id = $query_result['id'];

        $previous_quantity = $query_result['quantity'];
        $new_quantity = $previous_quantity + $data['quantity'];
        $data = array(
          'warehouse_code' => $data['warehouse_code'],
          'product_id'     => $data['product_id'],
          'variant_code'   => $data['variant_code'],
          'quantity'       => $new_quantity,
          'product_status' => '1',
          'date' => strtotime(date("Y-m-d H:i:s"))
        );
        //print_r($data);
        $this->db->where('id', $id);
        $this->db->update('warehouse_details', $data);
      }
      else{
        $this->db->insert('warehouse_details', $data);
        $new_quantity = $data['quantity'];
      }
      // //counting entering total amount of product
      // $variant_code = $data['variant_code'];
      // $arr = array(
      //   'variant_code' => $variant_code,
      //   'product_status' => 1
      // );

      // $this->db->where($arr);

      // $query = $this->db->get('warehouse_details')->result_array();
      // $entering_sum = 0;
      // foreach ($query as $key) {

      //   $entering_sum = $entering_sum + $key['quantity'];
      // }

      // // counting leaving sum
      // $arr2 = array(
      //   'variant_code' => $variant_code,
      //   'product_status' => 0
      // );

      // $this->db->where($arr2);

      // $query = $this->db->get('warehouse_details')->result_array();
      // $leaving_sum = 0;
      // foreach ($query as $key) {

      //   $leaving_sum = $leaving_sum + $key['quantity'];
      // }

      // //total sum
      // $total_sum = $entering_sum - $leaving_sum;
      $total_product = 0;
      $variant_code = $data['variant_code'];

      $total_product_counting_arr = array(
        'variant_code'   => $variant_code,
        'product_status' => 1
        );

      $this->db->where($total_product_counting_arr);

      $counting_array = $this->db->get('warehouse_details')->result_array();
      foreach ($counting_array as $count) {
        $total = $total + $count['quantity'];
      }

      $update_arr = array(
        'quantity' => $total
      );
      echo $total;
      $this->db->where('code', $variant_code);
      $this->db->update('variant', $update_arr);
    }
    public function dynamic_warehouse_table(){
      $this->db->where('product_status',1);
      $query = $this->db->get('warehouse_details');
      $query_result = $query->result_array();
      return $query_result;
    }
    public function get_product_name($product_id){
      $this->db->select('name');
      $this->db->where('product_id', $product_id);
      $result = $this->db->get('product')->row_array();
      return $result;
    }

    public function get_product_specification($variant_code){
      $this->db->select('specification');
      $this->db->where('code', $variant_code);
      $result = $this->db->get('variant')->row_array();
      return $result;
    }
    public function get_product_quantity_for_warehouse_table($warehouse_code, $variant_code){
      $this->db->select('quantity');
      $array = array(
        'warehouse_code' => $warehouse_code,
        'variant_code' => $variant_code
      );
      $this->db->where($array);
      $result = $this->db->get('warehouse_details')->row_array();
      return $result;
    }
    // public function get_product_quantity($variant_code, $warehouse_code, $product_id){
    //   $arr = array(
    //     'warehouse_code' => $warehouse_code,
    //     'variant_code'   => $variant_code,
    //     'product_id'     => $product_id,
    //     'product_status' => 1
    //   );
    //   $this->db->select('quantity');
    //   $this->db->where($arr);
    //   $result = $this->db->get('warehouse_details')->row_array();
    //   return $result;
    // }
    public function get_warehouse_name_on_table($warehouse_code){
      $this->db->select('warehouse_title');
      $this->db->where('warehouse_code', $warehouse_code);
      $result = $this->db->get('warehouse')->row_array();
      return $result;
    }
    public function get_warehouse_manager_name($warehouse_code){
      $this->db->select('warehouse_user_code');
      $this->db->where('warehouse_code', $warehouse_code);
      $result1 = $this->db->get('warehouse')->row_array();
      $this->db->select('name');
      $this->db->where('user_code', $result1['warehouse_user_code']);
      $result = $this->db->get('user')->row_array();
      return $result;
    }
    public function get_warehouse_phone_number($warehouse_code){
      $this->db->select('warehouse_phone_number');
      $this->db->where('warehouse_code', $warehouse_code);
      $result = $this->db->get('warehouse')->row_array();
      return $result;
    }
    public function get_warehouse_address($warehouse_code){
      $this->db->select('warehouse_address');
      $this->db->where('warehouse_code', $warehouse_code);
      $result = $this->db->get('warehouse')->row_array();
      return $result;
    }
  public function specific_managers_warehouse_table($user_id){
    $array = array(
      'warehouse_code' => $this->session->userdata('warehouse_code'),
      'product_status' => 1
      );

    $this->db->where($array);
    $final_result = $this->db->get('warehouse_details')->result_array();
     return $final_result;
   }
   public function find_specific_product_quantity($warehouse_code, $variant_code){
     $this->db->select('quantity');
     $this->db->where('warehouse_code', $warehouse_code, 'variant_code', $variant_code);
     $query_result = $this->db->get('warehouse_details')->row_array();
     return $query_result;
   }
   public function get_maximum_quantity($variant_code){
     //$this->db->select('quantity');
     $arr = array(
       'variant_code' => $variant_code,
       'product_status' => 1
     );
     $this->db->where($arr);
     $query_result = $this->db->get('warehouse_details')->result_array();
     return $query_result;
    //  $this->db->where('variant_code', $variant_code);
    //  $query_result = $this->db->get('warehouse_details')->result_array();
    //  return $query_result;
   }
   public function adding_to_shipment_from_warehouse($data){
     $this->db->insert('warehouse_details', $data);

     $checking_data = array(
       'warehouse_code' => $data['warehouse_code'],
       'product_id'     => $data['product_id'],
       'variant_code'   => $data['variant_code'],
       'product_status' => 1
     );
     $this->db->where($checking_data);
     $query_row = $this->db->get('warehouse_details')->row_array();
     $remain_quantity =  $query_row['quantity']-$data['quantity'];
     //echo $data['warehouse_code']."----".$remain_quantity;

     $quantity_array = array(
       'quantity' => $remain_quantity
     );
     $this->db->where('id', $query_row['id']);
     $this->db->update('warehouse_details', $quantity_array);

    // //counting entering total amount of product
    //  $variant_code = $data['variant_code'];
    //  $arr = array(
    //    'variant_code' => $variant_code,
    //    'product_status' => 1
    //  );

    //  $this->db->where($arr);

    //  $query = $this->db->get('warehouse_details')->result_array();
    //  $entering_sum = 0;
    //  foreach ($query as $key) {

    //    $entering_sum = $entering_sum + $key['quantity'];
    //  }

    //  // counting leaving sum
    //  $arr2 = array(
    //    'variant_code' => $variant_code,
    //    'product_status' => 0
    //  );

    //  $this->db->where($arr2);

    //  $query = $this->db->get('warehouse_details')->result_array();
    //  $leaving_sum = 0;
    //  foreach ($query as $key) {

    //    $leaving_sum = $leaving_sum + $key['quantity'];
    //  }

    //  //total sum
    //  $total_sum = $entering_sum - $leaving_sum;

    //  $update_arr = array(
    //    'quantity' => $total_sum
    //  );
    //  $this->db->where('code', $variant_code);
    //  $this->db->update('variant', $update_arr);

     $total_product = 0;
      $variant_code = $data['variant_code'];

      $total_product_counting_arr = array(
        'variant_code'   => $variant_code,
        'product_status' => 1
        );

      $this->db->where($total_product_counting_arr);

      $counting_array = $this->db->get('warehouse_details')->result_array();
      foreach ($counting_array as $count) {
        $total = $total + $count['quantity'];
      }

      $update_arr = array(
        'quantity' => $total
      );
      echo $total;
      $this->db->where('code', $variant_code);
      $this->db->update('variant', $update_arr);
   }
   public function get_product_heading($variant_code){
    $this->db->where('code', $variant_code);
    $query_result = $this->db->get('variant')->row_array();
    $this->db->where('product_id', $query_result['product_id']);
    $product_name = $this->db->get('product')->row_array();

    return $product_name['name'].' '.$query_result['specification'];
   }
   function hudai($data){
     $this->db->where('warehouse_code', $data);
     $result = $this->db->get('warehouse')->result_array();
     return $result;

   }
   function get_data_from_warehouse_details($warehouse_code){
     if($warehouse_code == 'all'){
       $array = array(
         'product_status' => 1
       );
       $this->db->where($array);
       $query = $this->db->get('warehouse_details');
       $query_result = $query->result_array();
       return $query_result;
     }
     else{
       $array = array(
         'warehouse_code' => $warehouse_code,
         'product_status' => 1
       );
       $this->db->where($array);
       $query = $this->db->get('warehouse_details');
       $query_result = $query->result_array();
       return $query_result;
     }

   }
}
