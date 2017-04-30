<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Data extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        // $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        // $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function data_get()
    {
        $row_1 = array(1,2,3,4,5);
        $row_2 = array(11,12,13,14,15);

        $data = array($row_1,$row_2);        

        log_message('debug', print_r(array(__METHOD__,__LINE__
            ,"data",$data
        ),true));

        $this->response(json_encode($data), REST_Controller::HTTP_OK);
    }

    public function data_post()
    {
        $params = $this->post();

        log_message('debug', print_r(array(__METHOD__,__LINE__
            ,"params",$params
            // ,"params",json_decode($params)
        ),true));


        $row_1 = array("A","B","C","D","E");
        $row_2 = array("M","N","O","P","Q");

        $data = array($row_1,$row_2);        

        log_message('debug', print_r(array(__METHOD__,__LINE__
            ,"data",$data
        ),true));

        $this->response(json_encode($data), REST_Controller::HTTP_OK);

    }

}
