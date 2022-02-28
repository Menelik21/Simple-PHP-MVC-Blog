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
        <h6 class="display-6">User Register</h6>
        <?php
          /**check errro message session message set or not*/
          if (session("registrtionError")!==NULL) {            
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>  '.flash("registrtionError").'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          }
          ?>
        <form class="g-3 row" action="<?php echo APP_ROOT_PATH.'index.php/user/registerprocess';?>" method="post">
        <div class="col-5">
          <label for="firstname" class="form-label">First Name :</label>
          <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Username" value="<?php formDataRetain("firstname");?>">
        </div>
        <div class="col-5">
          <label for="lastname" class="form-label">Last Name :</label>
          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Lastname" value="<?php formDataRetain("lastname");?>">
        </div>
        <div class="col-5">
          <label for="username" class="form-label">Username :</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?php formDataRetain("username");?>">
        </div>
        <div class="col-5">
          <label for="email" class="form-label">Email :</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php formDataRetain("email");?>">
        </div>
        <div class="col-md-5">
          <label for="password1" class="form-label">Password :</label>
          <input type="password" class="form-control" id="password1" name="password1" placeholder="Pleae enter the password">
        </div>
        <div class="col-md-5">
          <label for="password2" class="form-label">Password Confirm :</label>
          <input type="password" class="form-control" id="password2" name="password2" placeholder="Password Confirm">
        </div>
        <div class="col-md-4">
          <label for="gender" class="form-label">Gender :</label>
          <select id="gender" name="gender" class="form-select">
            <option selected>Gender</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
          </select>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary" id="signup" name="signup">Sign Up</button>
        </div>
    </form>
      </div>
      
  </div>
  </div>
</div>
<?php
require_once dirname(__FILE__,2)."/include/footer.inc.php";
?>