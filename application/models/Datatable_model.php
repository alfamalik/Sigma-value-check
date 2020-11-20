<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Datatable_model extends CI_Model{  
    
    // start general datatable
    function get_datatable($tabel,$aksi = '',$param_search = '',$param_order ='',$orderby = '',$orderby_value ='',$kondisi = '')
    {
        if($aksi == 'selectdata'){ 
            $get = $this->input->get();
            $this->_get_query($tabel,$param_search,$param_order,$orderby,$orderby_value,$kondisi);
            if($get['length'] != -1)
            $this->db->limit($get['length'], $get['start']);
            $query = $this->db->get();
            return $query->result();
        }elseif($aksi == 'countfilter'){
            $this->_get_query($tabel,$param_search,$param_order,$orderby,$orderby_value,$kondisi);
            $query = $this->db->get();
            return $query->num_rows();
        }elseif($aksi == 'countall'){
            $this->db->from($tabel);
            return $this->db->count_all_results();
        }else{
            return false;
        }
    }
       
    private function _get_query($tabel,$param_search = '',$param_order ='',$orderby = '',$orderby_value ='', $kondisi = '')
    { 
        $get = $this->input->get();
        if($kondisi == ''){
            $this->db->from($tabel); 
        }else{
            $this->db->where($kondisi)->from($tabel);  
        }
        $i = 0; 
        foreach ($param_search as $item)
        {
            if($get['search']['value'] != '')
            {  
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $get['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $get['search']['value']);
                }
 
                if(count($param_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        } 
        if(isset($get['order'])) 
        {
            $this->db->order_by($param_order[$get['order']['0']['column']], $get['order']['0']['dir']);
        } 
        else if($orderby !='')
        { 
            $this->db->order_by($orderby, $orderby_value);
        }
    }
    // end general datatable
 }