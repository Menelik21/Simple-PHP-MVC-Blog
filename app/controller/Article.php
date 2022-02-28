<?php

/**
* 
*/
use App\core\BaseController;

class Article extends BaseController
{
	public $model;
	
	public function __construct()
	{
		$this->model = $this->model("ArticleModel");
	}

	public function index(){

		$this->view("article/articleadd.view",["Title"=>"Post Add"]);
	}
	/** 
	 * Post the article
	 */
	public function articlePost(){

		//Check the data
		if (isset($_POST['post'])) {
			
			$title = $_POST['title'];
			$post = $_POST['article'];
			$authorId = session("userid");
			if (!empty($post) && !empty($title)) {
				$data = ["artTitle"=>$title,"body"=>$post,"authorId"=>$authorId];
				$return = $this->model->articlePost($data);

				if ($return) {
					flash("success","Article has been successfuly posted");
					redirect("article/index");
				}
				else{
					flash("errorpost","Article has not been successfuly posted");
					redirect("article/index");
				}
			}
			
			else{
				flash("errorpost","Please enter all required field!");
				redirect("article/index");
			}

		}
	}
	/**
	 * This method display full article
	 */
	public function articleRead($articlId){
		/** Pass article id to article retrive model method*/
		$return = $this->model->articleReadById($articlId);
		if($return){
			$data = $return;
			$this->view("article/articleread.view",$data);
		}
		else{
			redirect("welcome/index");
		}
	}
	/** Article delete */
	public function articleDelete($articlId){
		/** Send the user_id to check the user is the author of the article or not */
		$userId = session('userid');
		$return = $this->model->articleDelete($articlId,$userId);
		if($return){
			flash("success","Article has been deleted successfully");
			redirect("welcome/index");
		}
		else{
			flash("errormessage","Article has not been deleted successfully");
			redirect("welcome/index");
		}
	}
	/** Article edit by ID */
	public function articleEdit($articlId){
		/** First retrive the article */
		$userId = session('userid');
		$return = $this->model->articleEdit($articlId,$userId);
		if($return){
			$data = $return;
			$this->view("article/articleedit.view",$data);
		}
	}
	/** Article updat by id */
	public function articleUpdate($articlId){
		/** Send the user_id to check the user is the author of the article or not */
		$title = $_POST['title'];
		$post = $_POST['article'];
		$userId = session("userid");

		if (!empty($post) && !empty($title)) {
			$data = ["title"=>$title,"body"=>$post,"id"=>$articlId];
			$return = $this->model->articleUpdateModel($articlId,$userId,$data);
			if($return){
				flash("success","Article has been updated successfully");
				redirect("article/articleread/".$articlId);
			}
			else{
				flash("errormessage","Article has not been updated successfully");
				redirect("article/articleread/".$articlId);
			}
		}
		else{
			flash("errormessage","Please enter all required field!");
			redirect("article/articleread/".$articlId);
		}

	}
}