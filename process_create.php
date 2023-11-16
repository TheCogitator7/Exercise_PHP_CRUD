<?php 
    $link=mysqli_connect('localhost', 'port12345', 'ca11com1!');
    if(!$link){
        echo "Not connected".mysqli_error($link);
    }

    $selected_DB=mysqli_select_db($link, 'port12345');
    if(!$selected_DB){
        echo "Not selected the DB".mysqli_error($selected_DB);
    }

    $title=$_POST['title'];
    $description=$_POST['description'];

    $sql="INSERT INTO topic(title, description, date) VALUES('$title', '$description', NOW())";
    $result=mysqli_query($link, $sql);
    if(!$result){
        echo "Call to the admin. <a href='index.php'>Back to the main page.</a>";
    }else{
        echo "Success. <a href='index.php'>Back to the main page.</a>";
    }

?>