
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

</div>