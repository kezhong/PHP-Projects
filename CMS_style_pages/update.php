<?php
    require('dbConfig.php');
    require('header.php');
        $id=trim($_POST['id']);
        $title=trim($_POST['title']);
        $content=trim($_POST['content']);
        $permalink=trim($_POST['permalink']);
        
            $query="UPDATE cmsinfo SET title=?,content=?,created_at=NOW(),permalink=? WHERE id=?";
            $STH = $DBH->prepare($query);
            $STH->bindParam(1,$title);
            $STH->bindParam(2,$content);
            $STH->bindParam(3,$permalink);
            $STH->bindParam(4,$id);
            $row = $STH->execute();
            
            if($row){
                echo "Article: <b>{$title}</b> has been updated!<br/>";
                echo "It will automatically go back to home page after 3 seconds";
                echo "<META HTTP-EQUIV='refresh' CONTENT='2;URL=admin.php'>";                
            }
            else{
                echo "Articale couldn't be updated!";
                echo "<META HTTP-EQUIV='refresh' CONTENT='3;URL=admin.php'>";             
                
            }
            
 

    
?>
<?php require('footer.php')?>