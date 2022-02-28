<?php
/**
 * All page require the header
 */
	require_once dirname(__FILE__,2)."/include/header.inc.php";
?>
<div class="main-container">
	<div class="container">
		<div class="row">

      <div class="col-lg-6 mx-auto g-3">
        <h6 class="display-6">Article Add</h6>
        <?php
          /**check errro message session message set or not*/
          if (session("errorpost")!==NULL) {            
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>  '.flash("errorpost").'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          }
          if (session("success")!==NULL) {            
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success !</strong>  '.flash("success").'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          }
          ?>
        <form action="<?php echo APP_ROOT_PATH.'index.php/article/articlePost';?>" method="post">
          <div class="form-floating mb-3">
            <input type="title" class="form-control" id="title" name="title" placeholder="Article Title">
            <label for="title">Title</label>
        </div>
          <div class="form-floating">
            <textarea class="form-control" placeholder="Enter Post here" id="article" name="article" style="height: 100px"></textarea>
            <label for="article">Post</label>
          </div>
          <div class="col-12 mt-3">
              <button type="submit" name="post" id="post" class="btn btn-primary">Sign in</button>
            </div>
        </form>
			</div>
		</div>
	</div>
</div>
<?php
require_once dirname(__FILE__,2)."/include/footer.inc.php";
?>