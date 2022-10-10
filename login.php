<?php
include 'include/session.php';
require_once "config/connection.php";
include "include/functions.php";
include "pages/admin-head.php";
include "pages/admin-nav.php";
?>
           <!--Main-->
          <div class="offset-4 col-sm-4">
                  <h1>Login</h1>
                  <?php 
                    echo ErrorMessage();
                    echo SuccessMessage();
                  ?>
                  <div>
                      <form action="models/login-model.php"  method="post">
                          <div class="form-group">
                              <label for="username">UserName:</label>
                              <input type="text" name="Username" class="form-control"id="usernameReg" placeholder="User Name">
                            </div>
                          <div class="form-group">
                              <label for="password">Password:</label>
                              <input type="password" name="Password" class="form-control"id="passwordReg" placeholder="Password">
                          </div>
                          <br>
                          <input class ="btn btn-outline-info btn-block" type="submit" value="Sign up" name="Register" >
                          <br>
                      </form>
                  </div>
                  <button class="btn btn-success"><a style="color: white" href="registration.php">Register</a></button>
               <!--End of Main-->
      </div>




      <script src="js/main.js"></script>
</body>
</html>