<?php

use App\core\Model;

/**
* 
*/
class ArticleModel extends Model
{
	public $conn;

	function __construct()
	{
		$this->conn = $this->connection();
	}

	public function articlePost($data = []){

	 	$sql = "INSERT into article (art_title,art_body,art_authorid)
        VALUES (:artTitle,:body,:authorId)";
        $stat = $this->conn->prepare($sql);
        $stat->execute($data);
        if ($this->conn->lastInsertId()) {
            return $this->conn->lastInsertId();
        }
        else{
            return false;
        }


	}
	/** 
	 * Retrive all articles
	 */
	public function allArticle(){

		$sql = "SELECT * FROM article";
		$stat = $this->conn->query($sql);
		$result = $stat->fetchAll(PDO::FETCH_ASSOC);
		if ($result) {
			return $result;
		}
		else{
			return false;
		}
		
	}
	/** Select article by Id */
	public function articleReadById($id){
		$sql = "SELECT * FROM article WHERE art_id = :id";
		$stat = $this->conn->prepare($sql);
		$stat->execute([":id"=>$id]);
		$result = $stat->fetchAll(PDO::FETCH_ASSOC);
		if($result){
			return $result;
		}
		else{
			return false;
		}
	}
	/** Delete article by id */
	public function articleDelete($articleId,$userId){
		/** First check the article */
		$sql = "SELECT * FROM article WHERE art_id =:id AND art_authorid =:authid";
		$stat = $this->conn->prepare($sql);
		$stat->execute([":id"=>$articleId,":authid"=>$userId]);
		$result = $stat->fetchAll(PDO::FETCH_ASSOC);
		/** If the article is found, delete it */
		if($result){
			$sql2 = "DELETE FROM article where art_id =:id";
			$stat2 = $this->conn->prepare($sql2);
			$stat2->bindParam(':id', $articleId, PDO::PARAM_INT);
			if($stat2->execute()){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	/** Article Edit by Id */
	public function articleEdit($articleId,$userId){
		/** Check the article author */
		$sql = "SELECT * FROM article WHERE art_id =:id AND art_authorid =:authid";
		$stat = $this->conn->prepare($sql);
		$stat->execute([":id"=>$articleId,":authid"=>$userId]);
		$result = $stat->fetchAll(PDO::FETCH_ASSOC);
		if($result){
			return $result;
		}
		else{
			return false;
		}
	}
	/** Article update by Id */
	public function articleUpdateModel($articleId,$userId,$data){
		/** First check the article */
		$sql = "SELECT * FROM article WHERE art_id =:id AND art_authorid =:authid";
		$stat = $this->conn->prepare($sql);
		$stat->execute([":id"=>$articleId,":authid"=>$userId]);
		$result = $stat->fetchAll(PDO::FETCH_ASSOC);
		/** If the article is found, delete it */
		if($result){
			$sql2 = "UPDATE article SET art_title =:title, art_body= :body where art_id =:id";
			$stat2 = $this->conn->prepare($sql2);
			$stat2->execute($data);
			if($stat2->execute()){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
}
