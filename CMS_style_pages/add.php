<?php
    
    require('header.php');
    require_once('dbConfig.php');
    
    $title=trim($_POST['title']);    
    $content=trim($_POST['content']);
    $permalink=trim($_POST['permalink']);
    
    if(!empty($title)&&!empty($permalink)){
        $query="INSERT INTO cmsinfo(title,content,created_at,permalink) VALUES (?,?,NOW(),?)";
        $STH = $DBH->prepare($query);
        $STH->bindParam(1,$title);
        $STH->bindParam(2,$content);
        $STH->bindParam(3,$permalink);
        $row = $STH->execute();
    
        if($row){
            echo "{$title} has been successfully added into database";
            echo "<META HTTP-EQUIV='refresh' CONTENT='2;URL=admin.php'>";
            //header('Refresh:2;url=admin.php');
        }
        else{
            echo"Error: {$title} has not added into database";
        }
        
    }
    else{
        echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
        }
        
    require('footer.php');
?>