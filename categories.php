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
                  <h1>Manage Categories</h1>
                  <?php echo ErrorMessage();
                    echo SuccessMessage();
                ?>
                  <div class="">
                      <form action="models/add-categories-model.php" method="post">
                          <div class="form-group">
                              <label for="categoryname">Name:</label>
                              <input type="text" name="Category" class="form-control"id="categoryname" placeholder="Name">
                          </div>
                          <br>
                          <input class ="btn btn-success btn-lg"type="submit" value="Add New Category"name="Submit">
                          <br>
                      </form>
                  </div>
                  <div id="categoriesTable">
                      <table class="table">
                          <tr>
                              <th>Sr No.</th>
                              <th>Date&Time</th>
                              <th>Category Name</th>
                              <th>Creator Name</th>
                              <th>Delete</th>
                          </tr>
                          <?php
                            $categories = fetchAll('categories');
                                $SrNo=1;
                                foreach($categories as $catObj):
                                    ?>
                                <tr>
                                    <td><?=$SrNo?>.</td>
                                    <td><?=date("d.m.Y. G:i:s",strtotime($catObj->datetime))?></td>
                                    <td><?=$catObj->name?></td>
                                    <td><?=$catObj->creator?></td>
                                    <td><a href="models/delete-category.php?id=<?=$catObj->id?>" data-idcat="<?=$catObj->id?>" class="deleteCategory"><i class="fas fa-trash"></i></a></td>
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