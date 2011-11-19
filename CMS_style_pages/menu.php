<?php
    require_once('dbConfig.php');
    $query="SELECT title, permalink FROM cmsinfo";
    #values in the select statment
    $STH=$DBH->query($query);
        #setting the fetch mode
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    
    while($row = $STH->fetch()): ?>
       <a href="index.php?p=<?= $row['permalink']?>"><?=$row['title']?></a>
    <? endwhile; ?>
    