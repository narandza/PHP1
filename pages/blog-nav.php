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
                                <li class="nav-item ">
                                    <a style="font-size:24px;"class="nav-link" href="<?=$link->href?>"><?=$link->name?><span class="sr-only">(current)</span></a>
                                </li>
                                <?php
                                endforeach;
                                if(!isset( $_SESSION['userRole'])):
                                ?>
                                <li class="nav-item ">
                                    <a style="font-size:24px;"class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item ">
                                    <a style="font-size:24px;"class="nav-link" href="registration.php">Register<span class="sr-only">(current)</span></a>
                                </li>
                                <?php
                                else:
                                ?>
                                <li class="nav-item">
                                    <p class="nav-link">Welcome <?=$_SESSION['userName']?></p>
                                </li>
                                <li class="nav-item active">
                                    <a style="font-size:24px;"class="nav-link" href="models/logout.php">Logout<span class="sr-only">(current)</span></a>
                                </li>
                                <?php
                                endif;
                                ?>
                            </ul>
                        <form class="form-inline my-2 my-lg-0 navbar-right">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="Search">
                            <button class="btn btn-primary my-2 my-sm-0" type="submit" name="SearchButton">Search</button>
                        </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>