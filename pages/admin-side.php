<?php
$links = fetchAll("admin_side");

$NoOfAllUnapprovedComments = fetchUnaaprovedComments();
$NoOfAllUnapprovedComments->total> 0 ? $displayAllUnapproved = $NoOfAllUnapprovedComments->total:  $displayAllUnapproved = "";

?>

<div class="col-sm-2">
              <h1>AdminPanel</h1>
              <ul class="nav nav-pills flex-column" id="side-menu">
                  <?php
                    foreach($links as $link):
                        if($link->name == "Comments"):
                  ?>
                  <li class="nav-item"><a href="<?=$link->href?>"  class="nav-link"><i class="<?=$link->icon?>"></i><?=$link->name?><span class="badge badge-warning"><?=$displayAllUnapproved?></span></a></li>
                <?php
                else:
                ?>
                   <li class="nav-item"><a href="<?=$link->href?>"  class="nav-link"><i class="<?=$link->icon?>"></i><?=$link->name?></a></li>
                <?php
                    endif;
                endforeach;
                ?>
              </ul>
          </div>