<div style="min-height:400px; width:100%; padding:20px; padding-right:0px; background-color:#fff; margin-top:10px; text-align:center;">
    <div style="padding:20px;">
        <?php

                    $DB = new Database();
                    $sql = "SELECT image , post_id FROM posts where has_image = 1 && user_id =  $user_data[user_id] ORDER BY id DESC limit 30 ";
                    $images = $DB->read($sql);

                    $image_class = new Image();

                    if(is_array($images))
                    {

                        foreach($images as $image_row)
                        {
                            echo "<a href = 'single_post.php?id=$image_row[post_id]'>";
                            echo "<img src ='" . $image_class->get_thumb_post($image_row['image']) . " 'style = 'width:150px; margin:10px; ' ";
                            echo "</a>";
                        }
                        
                    }
                    else
                    {
                        echo "No images found";
                    }
        ?>
    </div>
</div>