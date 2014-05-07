<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quick Flix - Now Playing</title>

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

    <p>Space
        <p>Space

    <div class="container">
    <?php 
        $i = 1;
        foreach($result->movies as $m) {
            if($i%4 == 0)
                echo "<div class='row'>";
            ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <div class="well">
                    <center><img src="<?php echo $m->posters->detailed ?>"></center>
                    <p><h3> <?php echo $m->title ?> </h3>
                    <b>Rating:</b> <?php echo $m->mpaa_rating ?>

                        <?php
                        $critics_score = $m->ratings->critics_score;
                        if($critics_score == -1)
                            $critics_score == "N/A";
                        else
                            $critics_score = $critics_score . "%";

                        $aud_score = $m->ratings->audience_score;
                        if($aud_score == -1)
                            $aud_score == "N/A";
                        else
                            $aud_score = $aud_score . "%";
                        ?>

                    <br><b>Critics:</b> <?php echo $critics_score ?>
                    <br><b>Audience:</b> <?php echo $aud_score ?>

                        <?php 
                            $synopsis = $m->synopsis;
                            $synopsis = (strlen($synopsis) > 200) ? substr($synopsis, 0, 200) . '...' : $synopsis; 
                        ?>

                    <br><?php echo $synopsis ?>
                    <center><button class="btn btn-info" style="width:200px">More Info <i class="glyphicon glyphicon-chevron-right"></i></button></center>
                    <p><center><button class="btn btn-success" style="width:200px">Add to Favorites <i class="glyphicon glyphicon-plus"></i></button></center>
                </div>
                </div>
    
            <?php
            if($i%4 == 0)
                echo "</div>";

            $i = $i + 1;
        }
    ?>
    </div>


    <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>

</body>

</html>
