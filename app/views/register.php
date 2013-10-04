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

            <form class="navbar-form navbar-right" method="post" action="index.php">
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
    <div class="container" style="max-width: 330px;">
        <form method="post">
            <input type="text" placeholder="First Name" class="form-control" name="first_name">
            <input type="text" placeholder="Last Name" class="form-control" name="last_name">
            <input type="text" placeholder="Email" class="form-control" name="email">
            <input type="password" placeholder="Password" class="form-control" name="password1">
            <input type="password" placeholder="Retype Password" class="form-control" name="password2">
            <input type="submit" class="btn btn-lg btn-primary btn-block" value="Register">
        </form>
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
