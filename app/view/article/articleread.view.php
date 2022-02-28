<?php
//require header for all pages
	require_once dirname(__FILE__,2)."/include/header.inc.php";
?>
<div class="main-container">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-8 mx-auto">
				<?php
				if (isset($data) && $data!=NULL) {
					foreach ($data as $article) {
                        if((session('userid')!=NULL && session('userid') == $article['art_authorid'])){
                            $editBtn = '<button type="button" class="btn btn-primary">Edit</button>';
                            $deleteBtn = '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#article'.$article['art_id'].'">Delete</button>';
                            $deleteModal = '<div class="modal fade" id="article'.$article['art_id'].'" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="deleteModal">Article Delete</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  Are you sure you want to delete this article?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                  <a href="'.APP_ROOT_PATH.'index/article/articledelete/'.$article['art_id'].'"><button type="button" class="btn btn-danger">Yes</button></a>
                                </div>
                              </div>
                            </div>
                          </div>';
                        }
                        else{
                            $editBtn = NULL; $deleteBtn = NULL; $deleteModal = NULL;
                        }
						echo '<div class="card mt-2" style="">
							<div class="card-body">
							<h5 class="card-title">'.$article['art_title'].'</h5>
							<h6 class="card-subtitle mb-2 text-muted">'.$article['art_created_date'].'</h6>
							<p class="card-text">'.$article['art_body'].'</p>
                            <a href="'.APP_ROOT_PATH.'index/article/articleedit/'.$article['art_id'].'" class="card-link">'.$editBtn.'</a>
							'.$deleteBtn.'
							</div>
						</div>';
                        echo $deleteModal;
					}
				}
				else{
					echo '<div class="alert alert-info" role="alert"><p>There is not article</p></div>';
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php
require_once dirname(__FILE__,2)."/include/footer.inc.php";
?>