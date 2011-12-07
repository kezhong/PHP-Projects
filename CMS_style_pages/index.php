<?php
    if(empty($_GET['p']))
    {
        $permalink = "home";
    }
    else{
        $permalink = $_GET['p'];
    } 
    
    require_once('dbConfig.php');
    require("header.php");
    $query="SELECT * FROM cmsinfo LEFT OUTER JOIN images ON cmsinfo.image_id =images.image_id WHERE permalink = '$permalink'";
    #values in the select statment
    $STH=$DBH->query($query);
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    
    if($row = $STH->fetch()): ?>
    
    <div id="content">
    <?= $row['content'] ?>
    
    <? if($row['filename']): ?>
    <div id="image">
        <? if($row['width']>750){
            $width = 750;
        }
        else{
            $width = $row['width'];
        }
        ?>
        <img src="<?= $row['filename']?>" alt="images" width="<?=$width?>" />
    </div>
    <? endif; ?>
    
    <p><b>Created At:</b> <?= $row['created_at'] ?> <b>Updated At:</b> <?= $row['update_at'] ?></p>
    </div>
    
    <? else: ?>
    <div id="content">
    <p>Not this page</p>
    </div>
    
    <? endif; ?>
    
<?
    require ("footer.php");
?>