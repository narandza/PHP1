<?php
include 'include/session.php';
require_once "config/connection.php";
include "include/functions.php";
include "pages/blog-head.php";
include "pages/blog-nav.php";
$id = $_GET['id'];
$posts = fetchWithId("post",$id);
if(isset($_GET['SearchButton'])){
    $search  = $_GET['Search'];
    $posts = search();
    RedirectTo('blog.php?search='.$search);
    
}
?>
<div class="container mt-5">
    <div class="row">
        <!--Main-->
        <div class="col-sm-8">
        <?php
            foreach($posts as $post):
                $category =fetchWithId("categories",$post->category_id);
        ?>
       
        <div class="blogpost thumbnail">
        <h1 id="heading"><?=$post->title?></h1>
        <?php echo ErrorMessage();
                    echo SuccessMessage();
                ?>
                <p class="description">Category: <?=$category[0]->name;?>  Published on: <?=date("d.m.Y.",strtotime($post->datetime));?></p>
            <img class="rounded img-fluid"src="upload/<?=$post->image?>" alt="image<?=$post->id?>">
            <div class="caption">
               
                <p class="post"><?=nl2br($post->post)?></p>
            </div>
        </div>
        <?php
            endforeach;
        ?>
        <div class='col-8'>
        <h4>Comments</h4>
        <?php
            $comments = fetchCommentByPostId($id);
            foreach($comments as $comment):
        ?>
        <div class="comment-blog">
            <img class="float-left comment-user-image" src="images/user.png" alt="user">
            <p class="comment-user"><?=$comment->name?></p>
            <p class="description"><?=date('d.m.Y  G:i',strtotime($comment->datetime))?></p>
            <p><?=nl2br($comment->comment)?></p>
        </div>
        <hr>
        <?php endforeach;?>
        <h5>Share your thoughts about this post</h5>
        
        <?php 
            if(isset($_SESSION['userRole']))
            {
                include "pages/add-comment.php";
            }
            else{
                echo "<p class='alert'>Must be loged in to comment.</p>";
            }
        ?>
        </div>
        </div>
        
        <!--End of Main-->
        <!--Side-->
        <div class="offset-1 col-sm-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h2 class="card-title">Categories</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php
                        $categories = fetchAll('categories');
                        foreach($categories as $category):
                        ?>
                        <li class="list-group-item"><a href="blog.php?category=<?=$category->name?>" class="card-link"><?=$category->name?></a></li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
                <div class="card-footer">
                    
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h2 class="card-title">Recent Posts</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php
                            $recentPosts = fetchPostsByOrderDescLimit(0,5);
                            foreach($recentPosts as $post):
                        ?>
                        <li class="list-group-item"><a href="full-post.php?id=<?=$post->id?>" class="card-link"><?=shortDisplay($post->title,25)?></a></li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
        <!--End of Side-->
    </div>

    <?php
   include "pages/blog-footer.php"
   ?>