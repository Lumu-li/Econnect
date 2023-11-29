<?php

class Post
{
    private $error = "";
    public function create_post($user_id, $data, $files)
    {
        if(!empty($data['post']) || !empty($files['file']['name']) || isset($data['is_profile_image']) || isset($data['is_cover_image']))
        {
            $my_image = ""; 
            $has_image = 0;
            $is_cover_image = 0;
            $is_profile_image = 0;

            if(isset($data['is_profile_image']) || isset($data['is_cover_image']))
            {
                $my_image = $files;
                $has_image = 1;
                if(isset($data['is_profile_image']))
                {
                    $is_profile_image = 1;
                }
                if(isset($data['is_cover_image']))
                {
                    $is_cover_image = 1;
                }
            }
            else
            {
                if(!empty($files['file']['name']))
                {
                    //Everything is fine
                    $folder = "uploads/" . $user_id . "/";

                    //Create Folder
                    if(!file_exists($folder))
                    {
                        mkdir($folder, 0777, true);
                        
                    }
    
                    $image_class = new Image();
    
                    $my_image = $folder .  $image_class->generate_filename(15). ".jpg";
                    move_uploaded_file($_FILES['file']['tmp_name'], $my_image);
    
                    $image_class->resize_image($my_image, $my_image, 700, 700);
                    
                    $has_image = 1;
                }
            }

            $post = "";

            if(isset($data['post']))
            {
                $post = addslashes($data['post']);
            }


            $post_id = $this->create_post_id();

            $query = "INSERT INTO posts (post_id, user_id, post, image, has_image, is_profile_image, is_cover_image) VALUES ('$post_id', '$user_id', '$post', '$my_image', '$has_image', '$is_profile_image', '$is_cover_image') ";

            $DB = new Database();
            $DB->save($query);

        }
        else
        {
            $this->error .= "Please Type Something to Post!!<br>";
        }
        return $this->error;
    }

    public function get_post($id)
    {
     
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page_number = ($page_number < 1) ? $page_number = 1 : $page_number;

        $limit = 10;
        $offset = ($page_number - 1) * $limit;

        //takes in from database posts from the latest to the oldest post
        $query = "SELECT * FROM posts WHERE user_id = '$id' ORDER BY id DESC limit $limit offset $offset";

        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    public function get_one_post($post_id)
    {
        if(!is_numeric($post_id))
        {
            return false;
        }
        //takes in from database posts from the latest to the oldest post
        $query = "SELECT * FROM posts WHERE post_id = '$post_id' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
           return $result[0];
        }
        else
        {
            return false;
        }
    }

    public function delete_post($post_id)
    {

        if(!is_numeric($post_id))
        {
            return false;
        }
         
        //takes in from database posts from the latest to the oldest post
        $query = "DELETE FROM posts WHERE post_id = '$post_id' limit 1";

        $DB = new Database();
        $DB->save($query);

    }

    public function own_post($post_id, $connect_user_id)
    {
        if(!is_numeric($post_id))
        {
            return false;
        }
        
        $query = "SELECT * FROM posts WHERE post_id = '$post_id' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if(is_array($result))
        {
            if($result[0]['user_id'] == $connect_user_id)
            {
                return true;
            }
        }

        return false;
    }

    private function create_post_id()
    {
        $length = rand(4, 19);
        $number = "";
        
        for($i=0; $i< $length; $i++)
        {
            $new_rand = rand(0,9);

            $number = $number . $new_rand;
        }

        return $number;
    }

}