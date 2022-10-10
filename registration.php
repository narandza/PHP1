<?php
include 'include/session.php';
require_once "config/connection.php";
include "include/functions.php";
include "pages/admin-head.php";
include "pages/admin-nav.php";
?>
           <!--Main-->
          <div class="offset-4 col-sm-4">
                  <h1>Create Account</h1>
                  <?php echo ErrorMessage();
                    echo SuccessMessage();
                ?>
                  <div>
                      <form action="models/registration-model.php"  method="post">
                          <div class="form-group">
                              <label for="firstname">First Name:</label>
                              <input type="text" name="FirstName" class="form-control"id="firstNameReg" placeholder="First Name">
                            </div>
                          <div class="form-group">
                              <label for="lastname">Last Name:</label>
                              <input type="text" name="LastName" class="form-control"id="lastNameReg" placeholder="Last Name">
                            </div>
                          <div class="form-group">
                              <label for="email">Email:</label>
                              <input type="email" name="Email" class="form-control"id="emailReg" placeholder="Email">
                            </div>
                          <div class="form-group">
                              <label for="username">UserName:</label>
                              <input type="text" name="Username" class="form-control"id="usernameReg" placeholder="User Name">
                            </div>
                          <div class="form-group">
                              <label for="password">Password:</label>
                              <input type="password" name="Password" class="form-control"id="passwordReg" placeholder="Password">
                          </div>
                          <div class="form-group">
                              <label for="password">Confirm Password:</label>
                              <input type="password" name="cPassword" class="form-control"id="cpasswordReg" placeholder="Confirm password">
                          </div>
                          
                          <br>
                          <input class ="btn btn-outline-info btn-block" type="submit" value="Sign up" name="Register" >
                          <br>
                      </form>
                      <button class="btn btn-success"><a style="color: white" href="login.php">Login</a></button>
                  </div>
                  
               <!--End of Main-->
      </div>




<?php
include "pages/blog-footer.php"
?>