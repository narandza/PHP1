<?php
include 'include/session.php';
require_once "config/connection.php";
include "include/functions.php";
include "pages/admin-head.php";
include "pages/admin-nav.php";
confirmAdmin();
$id = $_GET['edit'];
$posts = fetchWithId("post",$id);
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
                  <h1>Edit Post</h1>
                  <?php echo ErrorMessage();
                    echo SuccessMessage();
                ?>
                  <div class="">
                  <?php foreach($posts as $post):
                     $category =fetchWithId("categories",$post->category_id);?>
                      <form action="models/edit-post-model.php?id=<?=$id?>" method="post" enctype = "multipart/form-data">
                          <div class="form-group">
                              <label for="title-post">New Title:</label>
                              <input type="text" value="<?=$post->title?>" name="PostTitle" class="form-control"id="postTitle" placeholder="Title">
                          </div>
                          <div class="form-group">
                          <span>Existing Category: <b><?=$category[0]->name?></b></span><br>
                              <label for="categroySelect">Category:</label>
                              <select class="form-control" name="CategorySelect" id="categorySelect">
                                  <option value="0">Select</option>
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
                          <span>Existing Image:<img class="rounded img-thumbnail"src="upload/<?=$post->image?>" alt="image<?=$post->id?>"> </span><br>
                              <label for="imageSelect">Select Image: </label>
                              <input type="file" name="PostImage" class="form-control"id="imageSelect">
                          </div>
                          <div class="form-group">
                              <label for="postArea">Post: </label>
                             <textarea class="form-control"name="PostText" id="postArea" cols="30" rows="10">
                             <?=$post->post?>
                             </textarea>
                          </div>
                          <br>
                          <input class ="btn btn-success btn-lg" type="submit" value="Finish"name="Submit">
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