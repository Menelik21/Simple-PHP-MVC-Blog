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
        <h6 class="display-6">User Login</h6>
          <?php
          /**check errro message session message set or not*/
          if (session("loginError")!==NULL) {            
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
          ?>
          <form action="<?php echo APP_ROOT_PATH.'index.php/user/login';?>" method="post">
              <div class="mb-2 col-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control <?php echo flash("errorclass");?>" id="username" name="username" required="true">
              </div>
              <div class="mb-2 col-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control <?php echo flash("errorclass");?>" id="password" name="password" required="true">
              </div>
              <div class="col-12">
                <button type="submit" name="signin" id="signin" class="btn btn-primary">Sign in</button>
              </div>
          </form>
			</div>
		</div>
	</div>
</div>
<?php
require_once dirname(__FILE__,2)."/include/footer.inc.php";
?>