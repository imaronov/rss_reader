
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo<<<TITLE
$first_name $last_name
TITLE;
 ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/assets/css/offcanvas.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../bootstrap/assets/js/html5shiv.js"></script>
    <script src="../bootstrap/assets/js/respond.min.js"></script>
    <![endif]-->
    <script src="../app/scripts/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        function addFeed() {
            var url_name = document.getElementById('addUrlName').value;

            $.ajax({
                type: "GET",
                url: "feed/add.php",
                data: { url: url_name }
            }).done(function( data ) {
                    alert(data['feed_name']);
                // display success message
                $('#addUrlName').val('');
                $('#url_add_alert').removeClass().addClass('alert alert-success');
                $('#url_add_icon').removeClass().addClass('glyphicon glyphicon-thumbs-up');
                $('#url_add_message').text('Feed added')

                // TODO: add feed to list
                $('feeds_list').append('<li><a>' + data['feed_name'] + '</a></li>');
            }).fail(function() {
                // display error message
                $('#addUrlName').val('');
                $('#url_add_alert').removeClass().addClass('alert alert-danger');
                $('#url_add_icon').removeClass().addClass('glyphicon glyphicon-thumbs-down');
                $('#url_add_message').text('Invalid url')
            });

        }

        function hideAlert() {
            $('#url_add_alert').removeClass().addClass('hidden');
        }
    </script>
</head>

<body>
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="account/">RSS Reader</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#about">Manage</a></li>
                <li><a href="account/logout.php">Logout</a></li>
            </ul>

            <!-- search form
                TODO: .ajax call to for search query -->
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" style="width:320px;" placeholder="RSS Feed">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>

        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</div><!-- /.navbar -->

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
            </p>
            <div class="jumbotron">
                <h1>Welcome back!</h1>
                <p>Feeds: <?php echo $count['feeds'] ?></p>
                <p>Stories: <?php echo $count['items'] ?></p>
            </div>
            <div class="row">


                <?php
                // check if user has any items
                if($count['items'] > 0){
                    $items = $items[0];
                    foreach($items as $item) {
                    echo<<<ITEM
                    <div class="col-6 col-sm-6 col-lg-4" style="max-width:263px; min-width:263;">
                        <h3>$item->title</h3>
                        <p><!-- $item->description --></p>
                        <p><a class="btn btn-default" href="$item->link">Go to article &raquo</a></p>
                    </div>
ITEM;
                    }
                } else {
                    // if the user does not have items
                    // TODO: make notice for no items
                }
                ?>


            </div><!--/row-->
        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <div class="well sidebar-nav">
                <ul id="feeds_list" class="nav">

                <!-- Add Feeds input bar
                    TODO: .ajax call to add feed -->
                    <div class="input-group">
                        <input id="addUrlName" name="url" type="text" class="form-control" placeholder="url">
                        <span class="input-group-btn">
                        <button class="btn btn-default" onclick="addFeed()">Add</button>
                        </span>
                    </div>

                    <div id="url_add_alert" class="hidden">
                        <a class="close" data-dismiss="alert" onclick="hideAlert()">x</a>
                        <span id="url_add_icon" class=""></span>
                        <span id="url_add_message"></span>
                    </div>


                    <?php
                        // if user has feeds
                        if($count['feeds'] > 0) {
                    ?>
                    <hr/>
                    <li>Feed List - <?php echo sizeof($feeds);?></li>
                    <?php
                            foreach($feeds as $feed){
                                echo<<<ITEM
                                <li><a>
                                    $feed->name
                                </a></li>
ITEM;
                            }
                    ?>
                    <?php
                        } else{
                            // if user doesnt have feeds
                            // TODO: make notice for no feeds
                        }
                    ?>
                </ul>
            </div><!--/.well -->
        </div><!--/span-->
    </div><!--/row-->

    <hr>

    <footer>
        <p>&copy; imaronov 2013</p>
    </footer>

</div><!--/.container-->



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../../assets/js/jquery.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="offcanvas.js"></script>
</body>
</html>