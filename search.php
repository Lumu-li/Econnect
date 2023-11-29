<?php

    session_start();

    include("./include.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['connect_user_id']);

    if(isset($_GET['find']))
    {
        $find = addslashes($_GET['find']);

        $sql = "SELECT * FROM users WHERE fname LIKE '%$find%' || lname LIKE '%$find%' limit 20";

        $DB = new Database();
        $results = $DB->read($sql);

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect | Search</title>

    <link rel="shortcut icon" type="image/png" href="img/logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage/timeline.css">

</head>
<body>

    <?php include("./header.php")?>
    <div class="cover_area">
     
        <!--BELOW COVER AREA-->
        <div class="content">

            <!--POSTS AREA-->
            <div class="content_messages">
                <?php

                $User = new User();
                $image_class = new Image();

                if(is_array($results))
                {
                    foreach ($results as $row)
                    {
                        # code...
                        $FRIEND_ROW = $User->get_user($row['user_id']);
                        include("user.php");

                    }
                }
                else
                {
                    echo "User Not found";
                }
                
                
                ?>
            </div>
        </div>

    </div>

    <script src="js/users.js"></script>
</body>
</html> 