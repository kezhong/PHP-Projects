<?php
    require('dbConfig.php');
    require('header.php');
        $id=trim($_POST['id']);
        $title=trim($_POST['title']);
        $query="SELECT * FROM cmsinfo WHERE id = $id";
        $STH=$DBH->query($query);
        
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        if($STH->fetch()) :?>
                
        <p>Are you sure to delete:<b><?=$title?></b></p>
        <form method="post" action="deleteProcess.php">
        <p>
        <input type="hidden" name="id" value="<?=$id ?>"/>
        <input type="submit" value="Yes" name="delete" />
        <input type="submit" value="No" name="mainPage" onclick="form.action='index.php';" />
        </p>
        </form>
 

        
        <? else: header('Location:index.php');?>
        <? endif; ?>
    

<?php require('footer.php')?>
