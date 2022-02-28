<?php
/**
 * All controller should extend the BaseController class
 */

use App\core\BaseController;

class About extends BaseController{

    public function __construct(){

    }

    public function index(){

    	$data = ["title"=>"About Us"];
        $this->view('about.view',$data);
    }
}

?>