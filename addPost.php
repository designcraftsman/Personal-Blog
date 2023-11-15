<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal-Blog</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label for="postTitle">Title :</label>
        <input type="text" name="postTitle">   
        <label for="postImg">Upload image:</label>
        <input type="file" name="postImg">   
        <label for="postContent">Content :</label>
        <input type="text" name="postContent">  
        <select name="categorie" >
            <option value="lifestyle">lifestyle</option>
            <option value="science">science</option>
            <option value="food">food</option>
            <option value="health">health</option>
        </select>
        <button type="submit">Save</button>
    </form>
<?php

    if (!isset($_POST['postTitle']) || !isset($_POST['postContent']) || !isset($_POST['postCategorie']) || !isset($_FILES['postImg']) && $_FILES['postImg']['error'] == 0) 
    {
	    echo('Erreur D\'envoie !');
        return;
    }
    $postTitle = $_POST['postTitle'];	
    $postContent = $_POST['postContent'];
    $postCategorie = $_POST['postCategorie'];
    $fileInfo = pathinfo($_FILES['postImg']['name']);
    $extension = $fileInfo['extension'];
    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
    if (in_array($extension, $allowedExtensions))
                {
                    move_uploaded_file($_FILES['postImg']['tmp_name'], 'uploads/' . basename($_FILES['postImg']['name']));
                    $postImgPath = 'uploads/' . basename($_FILES['postImg']['name']);
                    try
                    {
	                    $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root');
                    }
                    catch (Exception $e)
                    {
                        die('Erreur : ' . $e->getMessage());
                    }
                    $sqlQuery = 'INSERT INTO posts(postTitle,postImg,postContent,categorie) VALUES (:title,:img,:content,:categorie)';
                    $insertPost = $db->prepare($sqlQuery);
                    $insertPost->execute([
                        'title'=> $postTitle,
                        'img'=> $postImgPath,
                        'content'=>$postContent,
                        'categorie'=>$postCategorie,
                    ]);
                }


?>
</body>
</html>