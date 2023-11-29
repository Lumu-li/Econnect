
<div class="content">

<!--FRIENDS AREA-->
<div class="content_friends">
    <div class="friends_bar">
        
        <h2>Connect Users</h2> 
        <?php

            if($friends)
            {
                foreach($friends as $FRIEND_ROW)
                {
                    
                    include("user.php");
                }
            }

        ?>
                                
    </div>
    <br>
</div>

<!--POSTS AREA-->
<div class="content_messages">
    <!--Me to Post-->
    <div class="post_area">

        <form method="POST" enctype="multipart/form-data">
            <textarea name="post" placeholder="What's on your Mind?"></textarea>
            <input type="file" name="file" class="load">
            <input type="submit" class="post_button" name="submit" value="POST">
            <br> 
        </form>

    </div>

    <!--POSTS-->
    <div class="post_bar">

        <?php
        
        if($posts)
        {
            foreach($posts as $ROW)
            {
                $user = new User();
                $ROW_USER = $user->get_user($ROW['user_id']);
                
                include("post.php");
            }
        }

        ?>

        <?php 


            $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $page_number = ($page_number < 1) ? 1 : $page_number;

            //get current url
            $url = $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
            $url .= "?";

            $next_page_link = $url;
            $prev_page_link = $url;

            $num = 0;
            foreach ($_GET as $key => $value)
            {
                # code...
                $num++;

                    if($num == 1)
                    {
                        if($key == "page")
                        {
                            $next_page_link .= $key ."=" . ($page_number + 1);
                            $prev_page_link .= $key ."=" . ($page_number - 1);
                        }
                        else
                        {
                            $next_page_link .= $key ."=" . $value;
                            $prev_page_link .= $key ."=" . $value;
                        }
                        
                    }
                    else
                    {
                        if($key == "page")
                        {
                            $next_page_link .= "&". $key ."=" . ($page_number + 1);
                            $prev_page_link .= "&". $key ."=" . ($page_number - 1);                           
                        }
                        else
                        {
                            $next_page_link .= "&". $key ."=" . $value;
                            $prev_page_link .= "&". $key ."=" . $value;
                        }
                    }
            
                }

            //echo $next_page_link;
            //echo $prev_page_link;
            

            $limit = 3;
            $offset = ($page_number - 1) * $limit;

            echo "<a href='profile.php?page=".($page_number+1)."'><input type='button' class='btn' name='submit' value='NEXT'></a>";
            echo "<a href='profile.php?page=".($page_number-1 < 1 ? 1 : $page_number-1)."'><input type='button' class='btn' name='submit' value='PREV'></a>";
            
        ?>
        
        
        
    </div>

    
</div>
</div>