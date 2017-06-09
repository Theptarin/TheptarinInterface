<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tools
 *
 * @author it
 */
class Tools extends CI_Controller {

        public function message($to = 'World')
        {
                echo "Hello {$to}!".PHP_EOL;
        }
}