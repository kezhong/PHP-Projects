<?php  
    
    if(empty($_GET['id'])){
        echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
    }
    else{
       $id=trim($_GET['id']);
       require('dbConfig.php');
        require('header.php');
    }
    
    if(!is_numeric($id))
    {
       echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";  
    }
        $query="SELECT title,content,permalink FROM cmsinfo WHERE id = ?";
        
        $STH=$DBH->prepare($query);
        $STH->bindParam(1,$id);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $row = $STH->fetch();
        if(!$row){
            echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>"; 
        }
    
?>
            <form method="post" action="#">
                    <label for="title">Title: </label>
                    <input type="text" name="title" id="title" value="<?=$row['title']?>" required/><br />
                    
                    <label for="content">Content:</label><br />
                    <textarea name="content" id="content"><?=$row['content']?></textarea><br />
                    
                    <label for="permalink">Permalink: </label>
                    <input type="text" name="permalink" id="permalink" value="<?=$row['permalink']?>" required/><br/>
                    
                    <input type="hidden" name="id" value="<?=$id?>"/>
                    <input type="submit" name="update" value="Update" onclick="form.action='update.php';"/>
                    <input type="submit" name="delete" value="Delete" onclick="form.action='delete.php';" />
            </form>
<?php require('footer.php')?>
