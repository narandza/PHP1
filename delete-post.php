<?php
include 'include/session.php';
require_once "config/connection.php";
include "include/functions.php";
include "pages/admin-head.php";
include "pages/admin-nav.php";
confirmAdmin();
$id = $_GET['delete'];
$posts = fetchWithId("post",$id);
?>
   <div class="container-fluid">
      <div class="row">
          <!--Side-->
          <   <?php
    include "pages/admin-side.php"
   ?>
           <!--End of Side-->
           <!--Main-->
          <div class="col-sm-10">
                  <h1>Delete Post</h1>
                  <?php echo ErrorMessage();
                    echo SuccessMessage();
                ?>
                  <div class="">
                  <?php foreach($posts as $post):
                     $category =fetchWithId("categories",$post->category_id);?>
                      <form action="models/delete-post-model.php?id=<?=$id?>" method="post" enctype = "multipart/form-data">
                          <div class="form-group">
                              <label for="title-post"><b><?=$post->title?></b></label>
                          </div>
                          <div class="form-group">
                          <span> Category: <b><?=$category[0]->name?></b></span><br>
                          </div>
                          <div class="form-group">
                          <span> Image:<img class="rounded img-thumbnail"src="upload/<?=$post->image?>" alt="image<?=$post->id?>"> </span><br>
                          </div>
                          <div class="form-group">
                            <label >Text :</label>
                            <p><?=$post->post?></p>
                          </div>
                          <br>
                          <input class ="btn btn-danger btn-lg" type="submit" value="Delete Post"name="Submit">
                          <br>
                      </form>
                      <?php endforeach;?>
                  </div>
                          
                      </table>
                  </div>
              </div>
               <!--End of Main-->
      </div>




      <script src="js/admin.js"></script>
</body>
</html>