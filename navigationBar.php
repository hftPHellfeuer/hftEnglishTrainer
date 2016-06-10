<?php
function navigationBar()
{
    include_once 'userManagement.php';


    $adminExtras = '';
    if (isTeacher())
    {
        $adminExtras = '<li><a href="admin.php">Admin</a></li>';
    }
    $welcomeString=  '';
    if (isLogedIn())
    {
        $welcomeString=  '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> '. 'Welcome '.getUserName();
    }
  echo(

        '
        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">English Trainer <span class="sr-only">(current)</span></a></li>'.
                $adminExtras.
              '</ul>
               <ul class="nav navbar-nav navbar-right">   
                <li><a><b>  ' . $welcomeString . '     </b></a></li>
              ');


if (isLogedIn())
{
  echo('             
               <li><a href="logout.php">Logout</a></li>
     ');
}else
{
    echo('
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
         ');
}


echo('      
                </ul>
              </div>
          </div><!-- /.container-fluid -->
        </nav>'
);

}