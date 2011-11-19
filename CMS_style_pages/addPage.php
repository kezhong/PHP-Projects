<?php
    require("authenticate.php");
    require("header.php");
?>
<!-- Scripts  -->
        <script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript">
            tinyMCE.init({
                mode  : "textareas",
                theme : "advanced",
                theme_advanced_buttons1 : "bold,italic,underline,separator," +
                                          "strikethrough,justifyleft,justifycenter,justifyright,bullist,numlist,blockquote,hr,separator," +
                                          "undo,redo,separator,link,unlink",
                theme_advanced_buttons2 : "",
                theme_advanced_buttons3 : "",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
		height: '300px'
            });
        </script>

<form action="add.php" method="post">
    <label for="title">Title: </label>
    <input type="text" name="title" id="title" required/><br/><br/>
    <label for="content">content: </label><br/>
    <textarea rows="" cols="" id="content" name="content">
    </textarea><br/><br/>
    <label for="permalink">Permalink: </label>
    <input type="text" name="permalink" id="permalink" required/><br/>
    <input type="submit" name="submit" value="Submit"/>
</form>

<?
    require ("footer.php");
?>