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
                <h1>Manage Comments</h1>
                <?php echo ErrorMessage();
                        echo SuccessMessage();
                ?>
                <div class="row">
                    <h3>UnapprovedComments</h3>
                    <table class="table">
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Comment</th>
                            <th>Approve</th>
                            <th>Delete comment</th>
                            <th>Details</th>
                        </tr>
                        <?php
                            $comments = fetchCommentsByOrderDesc('comment');
                            $SrNo=1;
                            foreach($comments as $comment):
                            if($comment->status_id == 0):
                        ?>
                        <tr>
                            <td><?=$SrNo?></td>
                            <td><?=$comment->name?></td>
                            <td><?=date("d.m.Y : G:i",strtotime($comment->datetime))?></td>
                            <td><?=$comment->comment,18?></td>
                            <td><a href="models/approve-comment.php?id=<?=$comment->id?>"><i class="fas fa-check"></i></a></td>
                            <td><a href="models/delete-comment.php?id=<?=$comment->id?>"><i class="fas fa-trash"></i></a></td>
                            <td><a href="full-post.php?id=<?=$comment->post_id?>"target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
                        </tr>
                        <?php
                        $SrNo++;
                        endif;
                        endforeach;?>
                        </table>
                        <h3>Approved comments</h3>
                        <table class="table">
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Comment</th>
                            <th>Aproved by</th>
                            <th>Dissaprove</th>
                            <th>Delete comment</th>
                            <th>Details</th>
                        </tr>
                        <?php
                        $SrNo=1;

                        foreach($comments as $comment):
                        if($comment->status_id == 1):
                        ?>
                        <tr>
                            <td><?=$SrNo?></td>
                            <td><?=$comment->name?></td>
                            <td><?=date("d.m.Y : G:i",strtotime($comment->datetime))?></td>
                            <td><?=$comment->comment,18?></td>
                            <td><?=shortDisplay($_SESSION['userName'],10)?></td>
                            <td><a href="models/disapprove-comment.php?id=<?=$comment->id?>"><i class="fas fa-times"></i></a></td>
                            <td><a href="models/delete-comment.php?id=<?=$comment->id?>"><i class="fas fa-trash"></i></a></td>
                            <td><a href="full-post.php?id=<?=$comment->post_id?>"target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
                        </tr>
                        <?php
                        $SrNo++;
                        endif;
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