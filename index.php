<?php 
    $link=mysqli_connect('localhost', 'port12345', 'ca11com1!');
    if(!$link){
        echo "Not connected".mysqli_error($link);
    }

    $selected_DB=mysqli_select_db($link, 'port12345');
    if(!$selected_DB){
        echo "Not selected the DB".mysqli_error($selected_DB);
    }

    $sql="SELECT * FROM topic";
    $result=mysqli_query($link, $sql);
    $list='';
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $list=$list."<li><a href='index.php?id={$row['id']}'>{$row['title']}</a></li>";
    }

    $article['title']="Welcome";
    $article['description']="Hello, PHP";
    $article['date']="2023-11-16";

    if(isset($_GET['id'])){
        $sql="SELECT * FROM topic WHERE id={$_GET['id']}";
        $result=mysqli_query($link, $sql);
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
        $article['title']=$row['title'];
        $article['description']=$row['description'];
        $article['date']=$row['date'];

        $update_link="<a href='update.php?id={$_GET['id']}'>Update</a>";
        $delete_link="<a href='process_delete.php?id={$_GET['id']}'>Delete</a>";
    }
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WEB</title>
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <ol>
            <?=$list ?>       
        </ol>
        <a href="create.php">Create</a>
        <?=$update_link ?>
        <?=$delete_link ?>
        <h2><?=$article['title'] ?></h2>
        <p><?=$article['description'] ?></p>
        <p><?=$article['date'] ?></p>
    </body>
</html>