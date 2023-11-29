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
                            echo "<label>ABOUT ME:</label>";
                            echo "<div id = 'textbox' style= 'border:none;' class='input' placeholder = 'About me' >".htmlspecialchars($settings['about'])."</div>";
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