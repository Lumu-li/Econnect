<?php

    session_start();

    include("./include.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['connect_user_id']);

    $USER = $user_data;

    if(isset($_GET['find']) && is_numeric($_GET['find']))
    {
        $profile = new Profile();
        $profile_data = $profile->get_profile($_GET['find']);

        if(is_array($profile_data))
        {
            $user_data = $profile_data[0];
        }
    }

    $Post = new Post();
    $ROW = false;

    $ERROR = "";
    if(isset($_GET['id']))
    {
        $ROW = $Post->get_one_post(isset($_GET['id']));

    }
    else
    {
        $ERROR = "No post was found";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect | Single Post</title>

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

                $user = new User();
                $image_class = new Image();

                if(is_array($ROW))
                {
                    
                    $ROW_USER = $user->get_user($ROW['user_id']);
                    include ("post.php");
                }

                ?>
            </div>
        </div>

    </div>

    <script src="js/users.js"></script>
</body>
</html> 