<?php
if( isset($_SESSION["user"])){
    if($_SESSION["user"]=="user")
    RedirectTo("blog.php");
}
    include 'include/session.php';
    require_once "config/connection.php";
    include "include/functions.php";
    include "pages/admin-head.php";
    include "pages/admin-nav.php";
    confirmAdmin();
    $posts = fetchPostsByOrderDesc();
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
                <h1>Admin Dashboard</h1>
                <?php echo ErrorMessage();
                    echo SuccessMessage();
                ?>
                <div>
                    <table class="table">
                    <tr>
                        <th>No.</th>
                        <th>Post Title</th>
                        <th>Date&Time</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Banner</th>
                        <th>Comments</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Details</th>
                    </tr>
                    <?php
                    $srNo = 1; 
                     foreach($posts as $post):
                    $category =fetchWithId("categories",$post->category_id);
                    $NoOfCommentsApproved = fetchNumberOfComments($post->id,1);
                    $NoOfCommentsApproved->total>0 ? $displayApproved = $NoOfCommentsApproved->total : $displayApproved = "";
                    $NoOfCommentsUnapproved = fetchNumberOfComments($post->id,0);
                    $NoOfCommentsUnapproved->total>0 ?  $displayUnaproved = $NoOfCommentsUnapproved->total :  $displayUnaproved = "";
                    ?>
                        <tr>
                            <td><?=$srNo?></td>
                            <td><?=shortDisplay($post->title,10)?></td>
                            <td><?=date('d.m.Y',strtotime($post->datetime))?></td>
                            <td><?=shortDisplay($post->author,10)?></td>
                            <td><?=$category[0]->name?></td>
                            <td><img class="rounded img-thumbnail"src="upload/<?=$post->image?>" alt="image<?=$post->id?>"></td>
                            <td>
                                <span class="badge badge-danger float-left"><?=$displayUnaproved?></span>
                                <span class="badge badge-success float-right"><?=$displayApproved?></span>
                            </td>
                            <td><a href="edit-post.php?edit=<?=$post->id?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="delete-post.php?delete=<?=$post->id?>"><i class="fas fa-trash"></i></a></td>
                            <td><a href="full-post.php?id=<?=$post->id?>"target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
                        </tr>
                    <?php 
                    $srNo++; 
                endforeach;
                ?>
                    </table>
                </div>
            </div>
            <!--End of Main-->
      </div>
    </div>




    <script src="js/admin.js"></script>
</body>
</html>