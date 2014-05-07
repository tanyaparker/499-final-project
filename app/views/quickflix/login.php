<?php
use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
$session->start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quick Flix - Log In</title>

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/full.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/quickflix">QUICK FLIX</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/quickflix/theaters">Now Playing</a>
                    </li>
                    <li><a href="/quickflix/soon">Coming Soon</a>
                    </li>
                    <li><a href="/quickflix/bucket">My Bucket List</a>
                    </li>
                </ul>
                <div class="nav navbar-right" style="padding: 8px 0 0 0">
                    <a href="logout" class="btn btn-danger" role="button">Log Out</a>
                </div>
                <div class="col-sm-3 col-md-3 pull-right">
                <form class="navbar-form" role="search" action="/quickflix/search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search by Title" name="title" >
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page content goes here -->

    <div class="container" style="padding: 200px 0 0 0">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
        <div class="well">
            <h1>Log In</h1>
            <form role="form" method="post" action="/quickflix/login-process">
            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            <br><input type="password" name="password" class="form-control" placeholder="Password" required>
            <br><button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
            </form>
            <br><h4>Don't have an account yet?</h4>
            <p><a href="register" class="btn btn-lg btn-info btn-block" role="button">Register</a>
        </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    </div>


    <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>

</body>

</html>
