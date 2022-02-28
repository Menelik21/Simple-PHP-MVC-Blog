<?php
//require header for all pages
	require_once dirname(__FILE__,1)."/include/header.inc.php";
?>
<div class="main-container">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-8 mx-auto">
			<?php
				/**check errro message session message set or not*/
				if (session("errormessage")!==NULL) {            
					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Error!</strong>  '.flash("loginError").'
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
				}
				if (session("success")!==NULL) {            
					echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Success !</strong>  '.flash("success").'
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
				}
          		if (isset($data) && $data!=NULL) {
					foreach ($data as $article) {
						echo '<div class="card mt-2" style="">
							<div class="card-body">
							<h5 class="card-title">'.$article['art_title'].'</h5>
							<h6 class="card-subtitle mb-2 text-muted">'.$article['art_created_date'].'</h6>
							<p class="card-text">'.$article['art_body'].'</p>
							<a href="'.APP_ROOT_PATH.'index/article/articleread/'.$article['art_id'].'" class="card-link"><button type="button" class="btn btn-primary">Readmore...</button></a>
							</div>
						</div>';
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
require_once dirname(__FILE__,1)."/include/footer.inc.php";
?>