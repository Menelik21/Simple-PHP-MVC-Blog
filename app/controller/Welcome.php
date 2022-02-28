<?php
/**
 * All contrller should extend the BaseController class
 */
use App\core\BaseController;

class Welcome extends BaseController{

	public $model;

    public function __construct(){

    	$this->model = $this->model("ArticleModel");

    }
    public function index(){

    	$allArticle = $this->model->allArticle();
    	$data = $allArticle;
        $this->view('welcome.view',$data);
    }
    
}

?>