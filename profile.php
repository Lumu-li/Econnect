 <?php
    session_start();

    include("./include.php");

    $login = new Login();
    $user_data = $login->check_login($_SESSION['connect_user_id']);

    $USER = $user_data;

   
    if (isset($_GET['id']) && is_numeric($_GET['id']))//input white listing
    {
        $profile = new Profile();
        $profile_data = $profile->get_profile($_GET['id']);
    
        if(is_array($profile_data))
        {
            $user_data = $profile_data[0];
        }
    }
    
    
    //For Posting
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        include ("change_image.php");

        if(isset($_POST['fname']))
        {
            $settings_class = new Settings();
            $settings_class->save_settings($_POST, $_SESSION['connect_user_id']);
        }
        else
        {
            $post = new Post();
            $id = $_SESSION['connect_user_id'];
            $result = $post->create_post($id, $_POST, $_FILES);

            //Don't repeat posts when refreshing
            if($result = "")
            {
                echo "<div style= 'text-align: center; font-size:12px; color:white; background-color:var(--theme-color);'>";
                echo "<br> The following erros occured: <br>";
                echo "- ";
                echo $result;
                echo "</div>";
                
            }
            else
            {
                header("Location: profile.php");
                die;
            }  
            }
        
    }

    //Post Collector
    $post = new Post();
    $id = $user_data['user_id'];    

    $posts = $post->get_post($id);

    //Friend Collector
    $user = new User();

    $friends = $user->get_friends($id);

    $image_class = new Image();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect | Userpage</title>

    <link rel="shortcut icon" type="image/png" href="img/logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage/profile.css">

</head>
<body>

   <?php include("./header.php")?>

   <!-- CHANGE PROFILE IMAGE AREA -->
    <div id="change_profile_image" style="display:none; position:absolute; width:100%; height:100%; background-color:#000000aa;">
        <div class="content_messages" style="max-width:600px; margin:auto;">
            <!--Me to Post-->
            <div class="post_area">
                    
                <form action="profile_change.php?change=profile" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <input type="submit" class="post_button" name="submit" value="CHANGE">
                </form>
                <br> 
                <div style= "text-align: center;">
                    <?php
                    
                        echo "<img src = '$user_data[profile_image]' style = 'max-width:500px; margin-top:40px; border-radius: 8px;'>";
                        
                    ?>
                </div>

            </div>
            <br>
           
        </div>
    </div>

    <!-- CHANGE COVER IMAGE AREA -->
    <div id="change_cover_image" style="display:none; position:absolute; width:100%; height:100%; background-color:#000000aa;">
        <div class="content_messages" style="max-width:600px; margin:auto;">
            <!--Me to Post-->
            <div class="post_area">
                    
                <form action="profile_change.php?change=cover" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <input type="submit" class="post_button" name="submit" value="CHANGE">
                </form>
                <br> 
                <div style= "text-align: center;">

                    <?php
                    
                        echo "<img src = '$user_data[cover_image]' style = 'max-width:500px; margin-top:40px; border-radius: 8px;'>";
                    ?>

                </div>

            </div>
            <br>
           
        </div>
    </div>

    <!-- COVER AREA -->
    <div class="cover_area">
        <div class="cover_page">

                <?php
                    $image = "img/user_coverpage.jpg";

                    if(file_exists($user_data['cover_image']))
                    {
                        $image = $image_class->get_thumb_cover($user_data['cover_image']);
                    }
                ?>
            <img src="<?php echo $image ?>">
            <span>
                <?php
                    $image = "img/user_male.jpg";

                    if($user_data['gender'] == "female")
                    {
                        $image = "img/user_female.jpg";
                    }

                    if(file_exists($user_data['profile_image']))
                    {
                        $image = $image_class->get_thumb_profile($user_data['profile_image']);
                    }
                ?>
                <img id="profile_pic" src="<?php echo $image ?>"><br>

                <a onclick="show_change_profile_image(event)" href="profile_change.php?change=profile">Change Profile Image</a><br>
                <a onclick="show_change_cover_image(event)" href="profile_change.php?change=cover">Change Cover</a>
            </span>
            <br>
            <div class="profile_name">
                <a href="profile.php?id=<?php echo $user_data['user_id']?>">
                    <?php
                        echo $user_data['fname'] . "  " . $user_data['lname']
                    ?>
                </a>
            </div>
            <br>
        </div>

        <!--BELOW COVER AREA-->
        <?php
            $section = "default";

            if(isset($_GET['section'])) // add a check for isset($_GET['section'])
            {
                $section = $_GET['section'];
            }

            if($section == "default")
            {
                include("profile_content_default.php");
            }
            else if($section == "photos")
            {
                include("profile_content_photos.php");
            }
            else if($section == "friends")
            {
                include("profile_content_friends.php");
            }
            else if($section == "inbox")
            {
                include("profile_content_inbox.php");
            }
            else if($section == "inbox/new")
            {
                include("profile_content_user_inbox.php");
            }
            else if($section == "about")
            {
                include("profile_content_about.php");
            }
            else if($section == "settings")
            {
                include("profile_content_settings.php");
            }
                
        ?>
        

    </div>

    <script src="js/users.js"></script>
    <script src="js/profile_loader.js"></script>
</body>
</html>