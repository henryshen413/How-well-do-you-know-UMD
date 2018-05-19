<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body class="background">

    <?php
        session_start();
        $body = "";
        $body .= <<<EOBODY
        <fieldset id="login_fieldset" class="login_fieldset">
            <legend id="login_legend" class="login_legend"><img src="{$_SESSION['pathway']}" class="login_icon"></legend>
                <div id="login_framework" class="login_framework">
                    <h2>Welcome, {$_SESSION['username']}!</h2>
                    
                    <a id="login_button1" class="login_button1" href="quiz.php">
                        <div class="heading_button_text">Start the quiz</div>
                    </a>
                    <a id="login_button2" class="login_button2" href="editProfile.php">
                        <div class="heading_button_text">Edit profile</div>
                    </a>
                    <a id="login_button4" class="login_button4" href="recentGrade.php">
                        <div class="heading_button_text">Recent Score</div>
                    </a>
                    <a id="login_button3" class="login_button3" href="dashboard.html">
                        <div class="heading_button_text">Log out</div>
                    </a><br>
                    </div>
          </fieldset>
EOBODY;
        echo $body;
    ?>

  

</body>
</html>