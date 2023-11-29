
<div class="content">

<!--FRIENDS AREA-->
<div class="content_friends">
    <div class="friends_bar">
        
        <h2>Friends</h2> 
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


    </div>
</div>
</div>