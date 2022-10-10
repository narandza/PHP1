<?php
include 'include/session.php';
require_once "config/connection.php";
include "include/functions.php";
include "pages/admin-head.php";
include "pages/admin-nav.php";
confirmAdmin();
?>
   <div class="container-fluid">
      <div class="row">
          <!--Side-->
          <?php
    include "pages/admin-side.php"
   ?>
           <!--End of Side-->
           <!--Main-->
          <div class="col-sm-10">
                  <h1 class="text-center1">Manage Admins</h1>
                  <?php echo ErrorMessage();
                    echo SuccessMessage();
                ?>
                  <div>
                      <h3>Add New Admin</h3>
                      <form action="models/add-admin.php" method="post">
                          <div class="form-group">
                              <label for="usernamename">UserName:</label>
                              <input type="text" name="Username" class="form-control"id="username" placeholder="username">
                          </div>
                          <div class="form-group">
                              <label for="firstname">First Name:</label>
                              <input type="text" name="FirstName" class="form-control"id="firstName" placeholder="First Name">
                          </div>
                          <div class="form-group">
                              <label for="lastname">Last Name:</label>
                              <input type="text" name="LastName" class="form-control"id="lastName" placeholder="Last Name">
                          </div>
                          <div class="form-group">
                              <label for="email">Email:</label>
                              <input type="email" name="Email" class="form-control"id="email" placeholder="Email">
                          </div>
                          <div class="form-group">
                              <label for="password">Password:</label>
                              <input type="password" name="Password" class="form-control"id="password" placeholder="password...">
                          </div>
                          <div class="form-group">
                              <label for="confirm-password">Confirm Password:</label>
                              <input type="password" name="ConfirmPassword" class="form-control"id="confirmPassword" placeholder="confirm password...">
                          </div>
                          <br>
                          <input class ="btn btn-success btn-lg" type="submit" value="Add New Admin" name="AddAdmin">
                          <br>
                      </form>
                  </div>
                  <div>
                      <h3>Admin List</h3>
                      <table class="table">
                          <tr>
                              <th>Sr No.</th>
                              <th>Date&Time</th>
                              <th>Admin Name</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Delete</th>
                          </tr>
                          <?php
                            $admins = fetchAll('users');
                                $SrNo=1;
                                foreach($admins as $admin):
                                    if($admin->role_id==1);
                                    ?>
                                <tr>
                                    <td><?=$SrNo?>.</td>
                                    <td><?=date("d.m.Y. G:i:s",strtotime($admin->datetime))?></td>
                                    <td><?=$admin->first_name." ".$admin->last_name?></td>
                                    <td><?=$admin->username?></td>
                                    <td><?=$admin->email?></td>
                                    <td><a href="models/delete-admin.php?id=<?=$admin->id?>" class="deleteCategory"><i class="fas fa-trash"></i></a></td>
                                    <td></td>
                                </tr>
                            <?php
                                $SrNo++;
                                endforeach;
                            ?>
                      </table>
                  </div>
              </div>
               <!--End of Main-->
      </div>




      <script src="js/admin.js"></script>
</body>
</html>