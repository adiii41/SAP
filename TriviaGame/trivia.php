<?php
/*
Name :Mohammad Mahmudur  Rahman
Date: 2020/11/15
Subject : CIS-2288
Assignment: 05
This page is about creating a trivia game
*/
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trivia Game</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="customStyle.css" type="text/css" rel="stylesheet">
</head>
<body>
<div id="container">

    <h2>Play Trivia</h2>
    <?php
    // call this class so that we can get access to the session

    include ('utility.php');
    $next = true;
    $fileName = "triviaQuestions.txt";

    $gameComplete = false;
    $_userAnswer = array();
    $questionNum = array();

    session_start();
    if(!isset($_SESSION['questionNum'] ))
    {
        $_SESSION['questionNum'] = 0;
    }
    if(!isset($_SESSION['answer_array']))
    {
        $_SESSION['answer_array'] = array();
    }


    // The is_readable function is use to return true if the file or directory specified by filename exists and is readable
    if(!is_readable($fileName))
    {
        echo "<p>File not found </p>";
    }
    else
    {
        //Open the file for reading
        $fp = fopen($fileName, "r");

        // Lock file for reading (LOCK_SH - shared)
        flock($fp,LOCK_SH);

        //Check if the file is empty
        if(filesize($fileName) ==0)
        {
            // There is nothing in the file so it is empty
            echo "<p> Sorry, the file is empty</p>";
        }
        else{
            $triviaQuestions = file($fileName);
            $question_array = array();
            $answer_array = array();

            for($i=0; $i < count($triviaQuestions); $i++)
            {


                list($key,$value) = explode("\t",$triviaQuestions[$i]);
                $question_array[$i] = $key;
                $answer_array[$i] = $value;

            }
        }
    }


    $score = 0;

    if(isset($_POST['play']))
    {
        $gameComplete = false;
        // Remove all of the session variables.
        session_unset();

        // Delete the session cookie.
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        $score =0;

    }
    //$_SESSION['clickCount'] = $_POST['next'];
    if (isset($_POST['next'])) {
        // if they answer is empty

        if (($_POST['answer']) == "") {
            $error = "<span style='color:red; font-weight:bold;'>You must enter a answer to proceed</span><br />";
            echo $error;
        }
        else{
            // user answer will be saved in session and another array

            if($_SESSION['questionNum']<(count($triviaQuestions)-1))
            {

                $_SESSION['answer_array'][$_SESSION['questionNum']]= $_POST['answer'];
                $_userAnswer[$_SESSION['questionNum']] =$_SESSION['answer_array'][$_SESSION['questionNum']];
                //array_push( $_SESSION['answer_array'],$_POST['answer']);
                echo   $_userAnswer[$_SESSION['questionNum']];
                $progressbar = (( $_SESSION['questionNum'] +1)/count($triviaQuestions)) *100;
                $_SESSION['questionNum'] =  $_SESSION['questionNum']+1;

            }
            else
            {
                $gameComplete = true;
                // Remove all of the session variables.
                session_unset();

                // Delete the session cookie.
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(session_name(), '', time() - 42000,
                        $params["path"], $params["domain"],
                        $params["secure"], $params["httponly"]
                    );
                }

                session_destroy();
                $score =0;

            }
        }
    }
    //if game complete is false form will be appeared
    if(!$gameComplete)
    {?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="Question"><?php  echo $question_array[$_SESSION['questionNum']] ?></label>
                <label>
                    <input type="text" class="form-control" name="answer" placeholder="Enter your answer">
                </label>
            </div>
            <button type="submit" class="btn btn-primary" name="next">Next</button>

            <div class="progress">
                <div class="progress-bar" role="progressbar"  aria-valuemax="100" style="width: <?php echo (( $_SESSION['questionNum'] +1)/count($triviaQuestions)) *100;?>  ">

                    <?php echo "Question ".($_SESSION['questionNum']+1)." of ".count($triviaQuestions);?>
                </div>


            </div>

            <button type="submit" class="btn btn-primary" name="play">Play Again</button>
        </form>
    <?php }
    // if the game is over show the table data
    else{

        echo "<h2>The game is over</h2>";
        echo "<table>";
        echo "<tr>
        <th>Number</th>
        <th>Question</th>
        <th>Answer</th>
        <th>User answered</th>
        <th>Percentage</th>
        </tr>";

        for($i = 0; $i <count($triviaQuestions); $i++){
            $i = $_SESSION['questionNum'];
            $num = ($i+1);

            if(test_input($answer_array[$i])==test_input($_userAnswer[$i])){
                $score++;
                echo $question_array[$_SESSION['questionNum']];
                echo "<tr style='background-color: green'> 
                    <td>$num</td>
                   <td>$question_array[$i]</td>
                    <td>$answer_array[$i]</td>
                    <td>$_userAnswer[$i]</td>
                    </tr>";
            }else{
                echo "<tr style='background-color: #ff0000'> 
                    <td>$num</td>
                    <td>$question_array[$i]</td>
                    <td>$answer_array[$i]</td>
                    <td>$_userAnswer[$i]</td>
                    </tr>";
            }

        }

        echo "<h2> Score is .$score</h2>";
        echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Restart</a>";
    }?>

</div>
</body>
</html>