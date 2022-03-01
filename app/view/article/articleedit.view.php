<?php
//require header for all pages
require_once dirname(__FILE__,2)."/include/header.inc.php";
?>
<div class="main-container">
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-8 mx-auto">
	<?php
	/**check errro message session message set or not*/
	if (session("errormessage")!==NULL) {            
	    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Error!</strong>  '.flash("errormessage").'
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	    </div>';
	}
	?>
			<?php if (isset($data) && $data!=NULL):?> 
	<?php foreach ($data as $article):?>
	<form action="<?php echo APP_ROOT_PATH.'index.php/article/articleupdate/'.$article['art_id'];?>" method="post">
	    <div class="form-floating mb-3">
		<input type="title" class="form-control" id="title" value="<?php echo $article['art_title'];?>" name="title" placeholder="Article Title">
		<label for="title">Title</label>
	    </div>
	    <div class="form-floating">
		<textarea class="form-control" id="article" name="article" style="height: 100px"><?php echo htmlspecialchars_decode($article['art_body']);?></textarea>
		<label for="article">Post</label>
	    </div>
	    <div class="col-12 mt-3">
		<button type="submit" name="update" id="update" class="btn btn-primary">Update</button>
	    </div>
	</form>
			<?php endforeach;?>
	<?php else:?>
	<?php echo '<div class="alert alert-info" role="alert"><p>There is not article</p></div>';?>
	<?php endif;?>
    </div>
	</div>
</div>
</div>
<?php
require_once dirname(__FILE__,2)."/include/footer.inc.php";
?>
