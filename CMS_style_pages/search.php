<?
    $search = $_POST['search'];
    require_once("dbConfig.php");
    //$query="SELECT * FROM myBlog WHERE title LIKE '%$search%'";
    $query="SELECT id, title, content, date FROM myBlog WHERE title LIKE ?";
    $stm=$db->prepare($query);
    $var="%".$search."%";
    $stm->bind_param("s",$var);
    $stm->execute();
    $stm->store_result();
    $stm->bind_result($id,$title,$content,$date);
    $numRows=$stm->affected_rows;
    //$result=$db->query($query);
?>
<?php
    require("header.php");
    if($numRows!=0):
    while($stm->fetch()):
    //while($row = $result->fetch_assoc()): ?>
    <p>
        <span class="title"><?=$title ?></span>--<a href="edit.php?id=<?=$id ?>">Edit</a>        
    </p>
    <p><?=$date ?></p>
    <p><? 
         if(strlen($content)>200): echo substr($content,0,200) ?>
         ...<a href="readMore.php?id=<?=$id ?>"> Read More</a>
         <? else: echo $content ?>
         <? endif; ?>
    </p>
    <? endwhile; ?>
    <? else:
        echo "<p><b>No record found!</b></p>"; ?>
    <? endif; ?>
<? require("footer.php")?>