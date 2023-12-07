<?php
            if(!isset($_POST['commentMessage']) || !isset($_POST['memberName']) || !isset($_POST['memberEmail'])){
                echo('Error.Please fill in all the fields ! ');
                return;
            }else{
                $commentMessage = $_POST['commentMessage'];
                $memberName = $_POST['memberName'];
                $memberEmail = $_POST['memberEmail'];
            }
            $sqlQuery = 'INSERT INTO comments(commentMessage, postId, memberEmail,memberName) VALUES (:commentMessage, :postId ,:memberEmail, :memberName)';
            $insertComment = $db->prepare($sqlQuery);
            $insertComment->execute([
                'commentMessage' => $commentMessage,
                'postId' => $id,
                'memberEmail' => $memberEmail,
                'memberName' => $memberName, 
            ]);
?>