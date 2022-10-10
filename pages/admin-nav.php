<?php
    $links = fetchAll("nav_menu")
?>
<div class="container-fluid p-0">
            <div class="row-fluid">
                <div class="col-12 p-0">
                    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark mx">
                        <a class="navbar-brand " href="blog.php"><img id ="logo"src="images/logo.png" alt="logo"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <?php
                                foreach($links as $link):
                                ?>
                                <li class="nav-item active">
                                    <a style="font-size:24px;"class="nav-link" href="<?=$link->href?>"><?=$link->name?><span class="sr-only">(current)</span></a>
                                </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>