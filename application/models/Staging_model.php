<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Staging
 * ส่งข้อมูล 
 * @author it
 */
class Staging_model extends CI_Model {

    //private $source;
    //private $target;

    public function __construct() {
        parent::__construct();
        //$this->target = $this->load->database('msslq_trhv5');
    }

    /**
     * 
     */
    public function get_source() {
        $db = $this->load->database('mysql_ttr_mse', TRUE);
        $query = $db->get('ed_diag_last_staging', 5);
        return $query->result();
    }

    public function get_target() {
        $db = $this->load->database('mssql_trhv5', TRUE);
        $query = $db->get('LSTSTGV5PF', 5);
        return $query->result();
    }

    public function update_target() {
        $source = $this->load->database('mysql_ttr_mse', TRUE);
        $target = $this->load->database('mssql_trhv5', TRUE);
        $query = $source->get('ed_diag_last_staging', 100);
        $target->truncate('LSTSTGV5PF');
        foreach ($query->result() as $row) {
            //echo $row->id;
            $data = array(
                'LSGID' => $row->id,
                'LSGHN' => $row->hn
            );
            $target->query('SET IDENTITY_INSERT LSTSTGV5PF ON');
            $target->insert('LSTSTGV5PF', $data);
        }
    }

}
