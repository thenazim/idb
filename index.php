<?php

require_once 'vendor/autoload.php';

use App\Services\Database;

?>

<form action="" method="post">


    Username:<input type="text" name="username">
    <br>

    Email:<input type="email" name="email">
    <br>

    Password:<input type="password" name="password">
    <br>

    <input type="submit" name="submit">


</form>


<?php

//require_once 'app/Services/Database.php';

$db = new Database();

if (isset($_POST['submit'])) {

   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];

    $isInserted = $db->insertRow('insert into users (id, username, password, email) VALUES ("", ?, ?,?)',

            [$username, $password, $email]
    );

    if($isInserted){
        echo 'successfully inserted';
    }

}






