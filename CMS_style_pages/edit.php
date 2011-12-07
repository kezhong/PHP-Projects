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
    
        $query="SELECT * FROM cmsinfo LEFT OUTER JOIN images ON cmsinfo.image_id =images.image_id WHERE id = ?";
        
        $STH=$DBH->prepare($query);
        $STH->bindParam(1,$id);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $row = $STH->fetch();
        if(!$row){
            echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>"; 
        }
    
?>
            <form method="post" action="#" enctype="multipart/form-data">
                    <label for="title">Title: </label>
                    <input type="text" name="title" id="title" value="<?=$row['title']?>" required/><br />
                    
                    <label for="content">Content:</label><br />
                    <textarea name="content" id="content"><?=$row['content']?></textarea><br />
                    
                    <label for="permalink">Permalink: </label>
                    <input type="text" name="permalink" id="permalink" value="<?=$row['permalink']?>" required/><br/>
                    
                    <? if($row['image_id']) :?>
                    <label>Image (optional)</label><br/>
                    <img src="<?= $row['filename']?>" hight="100" width="80"/><br/>
                    Delete Image: <input style="width:25px;" type="checkbox" name="delete_image" value="yes" />
                    <input type="hidden" name="image_id" value="<?=$row['image_id']?>" />
                    
                    <? else: ?>
                    <label for="file">Image:</label>
                    <input type="file" name="file" id="file"/><br/>
                    <? endif; ?>
                    
                    <input type="hidden" name="id" value="<?=$id?>"/>
                    <input type="submit" name="update" value="Update" onclick="form.action='update.php';"/>
                    <input type="submit" name="delete" value="Delete" onclick="form.action='delete.php';" />
            </form>
<?php require('footer.php')?>
