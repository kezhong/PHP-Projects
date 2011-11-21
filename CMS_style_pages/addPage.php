<?php
    require("authenticate.php");
    require("header.php");
?>
<!-- Scripts --> 


<form action="add.php" method="post">
    <label for="title">Title: </label>
    <input type="text" name="title" id="title" required/><br/><br/>
    <label for="content">content: </label><br/>
    <textarea id="content" name="content" rows="" cols="" >
    </textarea><br/><br/>
    <label for="permalink">Permalink: </label>
    <input type="text" name="permalink" id="permalink" required/><br/>
    <input type="submit" name="submit" value="Submit"/>
</form>

<?
    require ("footer.php");
?>