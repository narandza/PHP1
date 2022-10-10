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
                  <h1>Add New Post</h1>
                  <?php echo ErrorMessage();
                    echo SuccessMessage();
                ?>
                  <div>
                      <form action="models/add-new-post-model.php" method="post" enctype ="multipart/form-data">
                          <div class="form-group">
                              <label for="title-post">Title:</label>
                              <input type="text" name="PostTitle" class="form-control"id="postTitle" placeholder="Title">
                          </div>
                          <div class="form-group">
                              <label for="categroySelect">Category:</label>
                              <select class="form-control" name="CategorySelect" id="categorySelect">
                                  <option value="0">Select category</option>
                                  <?php
                                    $categories = fetchAll('categories');
                                    foreach($categories as $catObj):
                                  ?>
                                    <option value="<?=$catObj->id?>"><?=$catObj->name?> </option>
                                  <?php
                                     endforeach;
                                  ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="imageSelect">Select Image: </label>
                              <input type="file" name="PostImage" class="form-control"id="imageSelect">
                          </div>
                          <div class="form-group">
                              <label for="postArea">Post: </label>
                             <textarea class="form-control"name="PostText" id="postArea" cols="30" rows="10"></textarea>
                          </div>
                          <br>
                          <input class ="btn btn-success btn-lg" type="submit" value="Add New Post"name="Submit">
                          <br>
                      </form>
                  </div>
                          
                      </table>
                  </div>
              </div>
               <!--End of Main-->
      </div>




      <script src="js/admin.js"></script>
</body>
</html>