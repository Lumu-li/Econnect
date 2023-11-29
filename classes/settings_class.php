<?php

class Settings
{
    public function get_settings($id)
    {
        $DB = new Database();
        $sql = "SELECT * FROM users WHERE user_id = '$id' limit 1";
        $row = $DB->read($sql);

        if(is_array($row))
        {
            return $row[0];
        }

    }
    public function save_settings($data, $id)
    {
        $DB = new Database();

        if (isset($data['pass'])) {
            $pass = $data['pass'];
            $confirm = $data['cpass'];

            if ($pass === $confirm) {
                $data['pass'] = password_hash($pass, PASSWORD_DEFAULT);
            }
        }

        unset($data['cpass']);
        unset($data['submit']);

        $sql = "UPDATE users SET ";

        foreach ($data as $key => $value) {
            $sql .= "$key='$value', ";
        }

        $sql = rtrim($sql, ", ") . " WHERE user_id='$id' LIMIT 1";

        $DB->save($sql);
    }
    /*  $DB = new Database();

    
        echo$sql;
        die;

        
        if(strlen($pass) < 30)
        {
            if($data['pass'] == $data['cpass'])
            {
                $data['pass'] = $pass;
            }
            else
            {
                unset($data['pass']);
            }
        }
    */
}
