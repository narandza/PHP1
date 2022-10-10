<?php
include 'include/session.php';
require_once "config/connection.php";
include "include/functions.php";
include "pages/blog-head.php";
include "pages/blog-nav.php";
$page=0;
$noPosts = 5;
$posts= displayPosts($noPosts);
?>
<div class="container mt-5">
    <div class="blog-header">
                <h1>New News</h1>
                <p class="lead">The Newest News</p>
            </div>
    <div class="row">
        <!--Main-->
        <div class="col-sm-8">
        <?php
            foreach($posts as $post):
            $category =fetchWithId("categories",$post->category_id);
        ?>
       
        <div class="blogpost thumbnail">
            <img class="rounded img-fluid"src="upload/<?=$post->image?>" alt="image<?=$post->id?>">
            <div class="caption">
                <h1 id="heading"><?=$post->title?></h1>
                <p class="description">Category: <?=$category[0]->name;?>  Published on: <?=date("d.m.Y.",strtotime($post->datetime));?></p>
                <p class="post"><?=shortDisplay($post->post,150)?></p>
                <a href="full-post.php?id=<?=$post->id?>"><span class="btn btn-info float-right">Read More &rsaquo;&rsaquo;</span></a>
            </div>
        </div>
        <?php
            endforeach;
            include "pages/blog-pagination.php"
        ?>
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