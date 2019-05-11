<?php

/**
 * Created by PhpStorm.
 * User: Instructor
 * Date: 5/11/2019
 * Time: 3:49 PM
 */
 include '../lib/Session.php';
 Session::init();
?>

<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css"/>
</head>
<body>
<div class="container">
    <section id="content">
        <?php
        $db = new Database();

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = mysqli_real_escape_string($db->link, $username);
            $password = mysqli_real_escape_string($db->link, $password);

            $query = "SELECT * FROM user WHERE username='$username'
     and password='$password'";
            $result = $db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set("login", true);
                Session::set("username", $value['username']);
                Session::set("userId", $value['id']);
                header("Location: index.php");
                //echo "<script>window.location = 'index.php';</script>";
            } else { echo "<span style='color:red;font-size:18px;'>Username
   or Password Not Matched !!</span>";}
        }
        ?>

        <form action="login.php" method="post">
            <h1>Admin Login</h1>
            <div>
                <input type="text" placeholder="Username" required="1"
                       name="username" />
            </div>
            <div>
                <input type="password" placeholder="Password" required="1"
                       name="password" />
            </div>
            <div>
                <input type="submit" value="Log in" />
            </div>
        </form><!-- form -->


        <div class="button">
            <a href="http://www.trainingwithliveproject.com"
               target="_blank">Training with live project</a>
        </div><!-- button -->
    </section><!-- content -->
</div><!-- container -->
</body>
</html>