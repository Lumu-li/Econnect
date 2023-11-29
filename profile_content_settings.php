<link rel="stylesheet" href="./css/register2.css">
<div style="min-height:400px; width:100%; padding:20px; padding-right:0px; background-color:#fff; margin-top:10px; text-align:center;">
    <div style="padding:20px;">

        <div class="wrapper" >
            <div class="title">
                UPDATE SETTINGS
            </div>
            <div class="form">
                <form method="POST" enctype="multipart/form-data" onsubmit="return validateRegistrationNumber()" id="registration_form" id="content">
                    <?php

                        $settings_class = new Settings();
                        $settings = $settings_class->get_settings($_SESSION['connect_user_id']);

                        if(is_array($settings))
                        {
                            echo "<div class='input_field'>";
                            echo "<label>First Name</label>";
                            echo "<input value='".htmlspecialchars($settings['fname'])."' id = 'textbox' type='text' name='fname' class='input' placeholder = 'First Name'>";
                            echo "</div>";

                            echo "<div class='input_field'>";
                            echo "<label>Last Name</label>";
                            echo "<input value='".htmlspecialchars($settings['lname'])."' id = 'textbox' type='text' name='lname' class='input' placeholder = 'Last Name'>";
                            echo "</div>";

                            echo "<div class='input_field'>";
                            echo "<div class='custom_select'>";
                            echo "<label>Gender</label>";
                            echo "<select name='gender' required>
                                    <option>".htmlspecialchars($settings['gender'])."</option>
                                    <option'>Male</option>
                                    <option>Female</option>
                                </select>";
                            echo "</div>";
                            echo "</div>";

                            echo "<div class='input_field'>";
                            echo "<label>Registration Number</label>";
                            echo "<input value='".htmlspecialchars($settings['regnum'])."' type='text' id='registration_number' name='regnum' class='input' required autocomplete='on' placeholder='Enter your Reg. No. e.g. ITE/D/01-55621/2020'>";
                            echo "</div>";

                            echo "<div class='input_field'>";
                            echo "<label>Date of Birth</label>";
                            echo "<input value='".htmlspecialchars($settings['dob'])."' type='date' name='dob' class='input' id='dob' required pattern='\d{4}-\d{2}-\d{2}'  placeholder='YYYY-MM-DD'>";
                            echo "</div>";

                            echo "<div class='input_field'>";
                            echo "<label>EMAIL</label>";
                            echo "<input value='".htmlspecialchars($settings['email'])."' id = 'textbox' type='email' name='email' class='input' placeholder = 'Email Address'>";
                            echo "</div>";

                            echo "<div class='input_field'>";
                            echo "<label>Phone Number</label>";
                            echo "<input value='".htmlspecialchars($settings['phone'])."' type='tel' name='phone' class='input' required autocomplete='on' placeholder='Enter your Phone Number'>";
                            echo "</div>";

                            echo "<div class='input_field'>";
                            echo "<label>Password</label>";
                            echo "<input value='$settings[pass]' id = 'textbox' type='password' name='pass' class='input' placeholder = 'Password'>";
                            echo "</div>";

                            echo "<div class='input_field'>";
                            echo "<label>Password</label>";
                            echo "<input value='$settings[pass]' id = 'textbox' type='password' name='cpass' class='input' placeholder = 'Confirm Password'>";
                            echo "</div>";

                            echo "<div class='input_field'>";
                            echo "<label>ABOUT ME:</label>";
                            echo "<textarea id = 'textbox' name='about' class='input' placeholder = 'About me' >".htmlspecialchars($settings['about'])."</textarea>";
                            echo "</div>";

                            echo "<div class='input_field'>";
                            echo '<input type="submit" id="post_button" name="submit" value="UPDATE" class="btn">';
                            echo "</div>"; 
                        }

                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="./js/register.js"></script>
<script src="./js/DOBvalid.js"></script>