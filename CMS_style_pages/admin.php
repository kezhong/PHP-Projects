<?
    require_once("dbConfig.php");
    $query="SELECT * FROM cmsinfo ORDER BY created_at DESC";
    #values in the select statment
    $STH=$DBH->query($query);
?>
<?php
    require("header.php");
    #setting the fetch mode
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    
    while($row = $STH->fetch()): ?>
       <p> <span class="title"><?=$row['title']?></span><br/><?=$row['created_at']?>--<a href="edit.php?id=<?=$row['id']?>">Edit</a></p>
        <form  method="post" action="delete.php">
        <p><input type="hidden" name="title" value='<?=$row['title'] ?>' />
        <input type="hidden" name="id" value="<?=$row['id'] ?>"/>
        <input type="submit" name="delete" value="Delete" /></p>
        </form>
    <? endwhile; ?>
<? require("footer.php")?>