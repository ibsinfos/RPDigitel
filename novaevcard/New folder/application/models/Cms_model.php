<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms_Model extends CI_Model {

    function getCmsList() {
        $fields_to_pass = "A.cms_id,A.page_alias,B.page_title,B.page_content,A.status";
        $this->db->select($fields_to_pass);
        $this->db->from('mst_cms as A');
        $this->db->join('trans_cms as B', 'A.cms_id=B.cms_id', 'left');
        $this->db->order_by('A.cms_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getCmsPageDetails($cms_page_id) {

        $fields_to_pass = "A.cms_id,A.page_alias,A.page_title,A.page_content,A.status,A.page_meta_keywords,A.page_meta_description,A.page_seo_title";
        $condition_to_pass = array("A.cms_id" => $cms_page_id);

        $this->db->select($fields_to_pass);
        $this->db->from('mst_cms as A');
        $this->db->where($condition_to_pass);
        $this->db->order_by('A.cms_id', 'ASC');

        $query = $this->db->get();

        return $query->result_array();
    }

    #function to get cms from the database if edit_id and lang_id black then it will return all reacords   

    public function getCMS($edit_id = '') {
        $this->db->select('mst_cms.*,cms.*');
        $this->db->from('mst_cms as mst_cms');
        $this->db->join('hlp_trans_cms as cms', 'mst_cms.cms_id = cms.cms_id', 'left');
        if ($edit_id != '') { #if edit id not blank passed it will return all records
            $this->db->where("cms.cms_id", $edit_id);
        }
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getCMSByAlias($alias_name = '', $lang_id = '') {
        $this->db->select('mst_cms.*,cms.*');
        $this->db->from('mst_cms as mst_cms');
        $this->db->join('hlp_trans_cms as cms', 'mst_cms.cms_id = cms.cms_id', 'left');
        if ($alias_name != '') {
            $this->db->where("mst_cms.page_alias", $alias_name);
        }
        if ($lang_id != '') {
            $this->db->where("cms.lang_id", $lang_id);
        } else {
            $this->db->where("cms.lang_id", 17);
        }
        $this->db->where("mst_cms.status", 'Published');
        $result = $this->db->get();
        return $result->result_array();
    }
	
	function getSliderById($post_id)
    {
        $this->db->select("s.*");
        $this->db->from('tbl_slider as s');
        $this->db->where('s.id', $post_id);

        $query = $this->db->get();
     
        return $query->result_array();
    }
}
?>
