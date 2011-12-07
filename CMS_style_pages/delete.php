<?php
    require('dbConfig.php');
    require('header.php');
    if(empty($_POST['id'])||empty($_POST['title'])||!is_numeric($_POST['id'])){
       echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>"; 
    }
        $id=trim($_POST['id']);
        $title=trim($_POST['title']);
        $query="SELECT * FROM cmsinfo LEFT OUTER JOIN images ON cmsinfo.image_id = images.image_id WHERE id = $id";
        $STH=$DBH->query($query);
        
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        if($row = $STH->fetch()) :?>
                
        <p>Are you sure to delete:<b><?=$title?></b></p>
        <form method="post" action="deleteProcess.php">
        <p>
        <input type="hidden" name="image_id" value="<?=$row['image_id'] ?>"/>
        <input type="hidden" name="id" value="<?=$id ?>"/>
        <input type="submit" value="Yes" name="delete" />
        <input type="submit" value="No" name="mainPage" onclick="form.action='index.php';" />
        </p>
        </form>
 

        
        <? else: echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=admin.php'>";?>
        <? endif; ?>
    

<?php require('footer.php')?>
