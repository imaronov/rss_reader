<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="shortcut icon" href="../bootstrap/assets/ico/favicon.png">

    <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/assets/css/jumbotron.css" rel="stylesheet">
    <script src="../assets/js/html5shiv.js"></script>
    <script src="../assets/js/respond.min.js"></script>

</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">

    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">RSS Reader</a>
        </div>

        <div class="navbar-collapse collapse">

            <form class="navbar-form navbar-right" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>

        </div><!--/.navbar-collapse -->
    </div>
</div>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>RSS Reader</h1>
        <p>View your news and other media here.</p>
        <p><a class="btn btn-primary btn-lg" href="register.php">Register &raquo;</a></p>
    </div>
</div>

<div class="container">
    <footer>
        <p>&copy; imaronov 2013</p>
    </footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../bootstrap/assets/js/jquery.js"></script>
<script src="../bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
