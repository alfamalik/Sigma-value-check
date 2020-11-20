<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Panggildata_model extends CI_Model{    
  function panggildata($tabel,$kondisi,$orderby ='',$orderby_value='',$limit =''){     
		if($orderby !=''){ 
			return $limit ==''? $this->db->order_by($orderby,$orderby_value)->get_where($tabel,$kondisi):$this->db->order_by($orderby,$orderby_value)->get_where($tabel,$kondisi,$limit);	
		}else{ 
			return $limit ==''? $this->db->get_where($tabel,$kondisi):$this->db->get_where($tabel,$kondisi,$limit);	
		}
  }   
}