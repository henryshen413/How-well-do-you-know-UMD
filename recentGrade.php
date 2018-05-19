<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Recent Grade</title>
        <link rel="stylesheet" href="stylesheet.css"/>
    </head>
    <body class="background">

        <?php
            require_once("db.php");
            session_start();
            $username = $_SESSION['username'];
            $db = new mysqli($host, $user, $password, $database);

            //check if connect database successfully
            if ($db->connect_error) {
                die($db->connect_error);
            }
            
            $sqlQuery = sprintf("select score,pathway from $table1 where username = '%s'", $username);
            $result = $db->query($sqlQuery);
            if ($result) {
                $num_rows = $result->num_rows;
                if ($num_rows > 0) {
                    while ($recordArray = $result->fetch_array(MYSQLI_ASSOC)) {
                        $score = $recordArray['score'];
                        $pathway = $recordArray['pathway'];
                    }
                }
                                    
            }
        ?>
        <fieldset id="login_fieldset" class="login_fieldset">
            <legend id="login_legend" class="login_legend"><img id="profile" src="" class="login_icon"></legend>
            <div id="login_framework" class="login_framework">
                <h2 id="message"></h2>
                <div id="score" class="score"></div>
                <a id="login_button3" class="login_button3" href="personalInfo.php">
                    <div class="heading_button_text">Back</div>
                </a><br>
            </div>

        </fieldset>

        <script>

            let score = "<?php echo $score; ?>";
            let pathway = "<?php echo $pathway; ?>";
            document.getElementById("profile").src=pathway;
            document.getElementById("message").innerHTML = "Your recent score is "+score+"!";

            if (score === ""){
                document.getElementById("message").innerHTML = "You haven't done any quiz yet!";
            }else{
                let correct = Number(score);
                document.getElementById("message").innerHTML = "Your most recent score is "+score+"!";
                let all = 100;
                let answerPic = "<img src=''>";

                if (correct / all === 1) {
                    answerPic = "<img src='100.gif' class='pic'>";
                } else if (correct / all >= 0.8) {
                    answerPic = "<img src='80-100.jpg' class='pic'>";
                } else if (correct / all >= 0.6) {
                    answerPic = "<img src='60-80.jpg' class='pic'>";
                } else if (correct / all > 0) {
                    answerPic = "<img src='0-60.jpg' class='pic'>";
                } else {
                    answerPic = "<img src='0.png' class='pic'>";
                }

                document.getElementById("score").innerHTML = answerPic;
            } 
        </script>

    </body>
</html>