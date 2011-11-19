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
    $query="SELECT * FROM cmsinfo WHERE permalink = '$permalink'";
    #values in the select statment
    $STH=$DBH->query($query);
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    
    if($row = $STH->fetch()): ?>
    
    <div id="content">
    <?= $row['content'] ?>
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