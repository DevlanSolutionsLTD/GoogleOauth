<?php
/*
 * @author Puneet Mehta
 * @website: http://www.PHPHive.info
 * @facebook: https://www.facebook.com/pages/PHPHive/1548210492057258
 */
require_once './config.php';
if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
  // user already logged in the site
  header("location:".SITE_URL . "home.php");
}
include './header.php';
?>
<div class="container">
  <div class="margin10"></div>
  
  <?php if ($_SESSION["e_msg"] <> "") { ?>
    <div class="alert alert-dismissable alert-danger">
      <button data-dismiss="alert" class="close" type="button">x</button>
      <p><?php echo $_SESSION["e_msg"]; ?></p>
    </div>
  <?php } ?>
  
  <div class="col-sm-3 col-sm-offset-4">
    <a class="btn btn-block btn-social btn-google-plus" href="login.php">
            <i class="fa fa-google-plus"></i> Login with Google
          </a>
  </div>
</div>
<?php
include './footer.php';
// unset if after it display the error.
$_SESSION["e_msg"] = "";
?>