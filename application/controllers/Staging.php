<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Staging
 *
 * @author it
 */
class Staging extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('staging_model');
    }

    public function print_source() {
        print_r($this->staging_model->get_source());
    }
    
    public function print_target() {
        print_r($this->staging_model->get_target());
    }
    
    public function transfer(){
        $this->staging_model->update_target();
    }

}
