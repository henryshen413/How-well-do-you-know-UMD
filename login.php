<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheet.css"/>
</head>
<style>
    #content{
        color: white;
    }

    .head_button {
        width: 90%;
        max-width: 150px;
        margin-top: 2rem;
        padding: 10px 20px;

        font-family: "Microsoft YaHei";
        text-align: center;
        color: white;
        background-color: #4dc562;
        border-radius: 4px;
    }

    .heading_button_text {
        font-family: "Microsoft YaHei";
        font-weight: 600;
        line-height: 1.2;
        font-size: 1rem;
        color: white;
    }
</style>

<body style="">
<div class="">
    <div id="navigation" class="navigation">
        <div id="navigation_framework" class="navigation_framework" style="position: relative;">
            <div id="navigation_text" class="navigation_text">
                <a id="nav_item1" class="navigation_block_left nav_item1">
                    <div class="fr-text"><strong>A CMSC389N Project</strong></div>
                </a>
                <a id="nav_item2" class="navigation_block_right nav_item2" href="dashboard.html">
                    <div class="fr-text">Dashboard</div>
                </a>
                <a id="nav_item3" class="navigation_block_right nav_item3" href="signup.html">
                    <div class="fr-text">Sign Up</div>
                </a>
            </div>
        </div>
    </div>

    <div id="heading" class="heading">
        <div id="heading_framework" class="heading_framework">
            <div id="heading_text" class="heading_text">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <h1> Login </h1>
                    <div id="content">
                        <strong>Username: </strong><input id="username" type="text" name="username" autofocus required="required" />
                        <br ><br ><br >
                        <strong>Password: </strong><input id="pass" type="password" name="pass" autofocus required="required" />
                        <br ><br ><br >
                        
                        <button class="head_button" type="submit" name="submitButton">
                            <div class="heading_button_text">Submit</div>
                        </button>&nbsp;&nbsp;&nbsp;
                        
                    </div>
                </form> 

                <?php
                    require_once("db.php");

                    session_start();

                    if (isset($_POST["submitButton"])) {
                        $username = $_POST["username"];
                        $pass = $_POST["pass"];

                        $db_connection = new mysqli($host, $user, $password, $database);

                        //check if connect database successfully
                        if ($db_connection->connect_error) {
                            die($db_connection->connect_error);
                        }

                        $sqlQuery = sprintf("select password,pathway from %s where username = '%s'", $table1, $username); 
                        $result = $db_connection->query($sqlQuery);

                        if ($result) {
                            $num_rows = $result->num_rows;
                            if ($num_rows === 0) {
                                echo '<br ><div id="content">No entry exists in the database for the specified username and password</div>';
                            } else {
                                while ($recordArray = $result->fetch_array(MYSQLI_ASSOC)) {
                                    $hashed = $recordArray['password'];
                                    $pathway = $recordArray['pathway'];
                                }

                                if(password_verify($pass,$hashed)) {
                                    $_SESSION['username'] = $username;
                                    $_SESSION['pathway'] = $pathway; 
                                    header("Location: personalInfo.php");
                                    exit;
                                } else {
                                    echo '<br ><div id="content">No entry exists in the database for the specified username and password</div>';
                                }   
                            }
                        }  else {
                            die("Retrieving records failed.".$db_connection->error);
                        }

                        /* Freeing memory */
                        $result->close();
            
                        /* Closing connection */
                        $db_connection->close();
                    }
                ?>      
            </div>
        </div>
    </div>

    <div id="footer" class="footer">
        <div id="footer_framework" class="footer_framework">
            <div id="footer_text" class="footer_text">
                <p>
                    We are a dedicate and hard-working group under the UMD class CMSC389N with the best professor Nelson Padua-Perez.<br>
                    For Group Project description check <a href="http://cs.umd.edu/class/fall2017/cmsc389N/content/projects/GroupProject/" style="color: green"><strong>this</strong></a>.<br><br>
                    <img src="phone.png" class="contact_icon">&nbsp;&nbsp;<a href="mailto:sqh1078534232@gmail.com" style="color: rgba(255,255,255,0.8)"><strong>sqh1078534232@gmail.com</strong></a>
                </p>
            </div>
        </div>

    </div>
</div>
</div>

<div id="footer-assets">
</div>
</body>
</html>