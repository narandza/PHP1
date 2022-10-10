<nav>
<ul class="pagination justify-content-center">
                <?php
                if($page>1):
                ?>
               <li class="page-item">
                    <a class="page-link" href="blog.php?page=<?=$page-1?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php
                endif;
                    $countPosts = countPosts();
                    $totalPosts = $countPosts->total;
                    $postPerPage = ceil($totalPosts/$noPosts);
                    for($i = 1; $i<=$postPerPage;$i++):
                    if(isset($page)):
                    if($i==$page):
                ?>
                <li class="page-item active"><a class="page-link" href="blog.php?page=<?=$i?>"><?=$i?></a></li>
                <?php 
                    else:
                ?>
                 <li class="page-item"><a class="page-link" href="blog.php?page=<?=$i?>"><?=$i?></a></li>
                <?php 
                endif;
                endif;
                endfor;
                if($page<$postPerPage):
                ?>
                <li class="page-item">
                <a class="page-link" href="blog.php?page=<?=$page+1?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
                <?php
                endif;
                ?>
            </ul>
        </nav>