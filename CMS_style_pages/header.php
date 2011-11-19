<!DOCTYPE HTML>
<html>
<head>
    <title>Ke's CMS</title>
    <link type="text/css" rel="stylesheet" href="cms.css" />
    <!-- load the tinyMCE -->
    <script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
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
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <div id="name">
                Ke's CMS
            </div>
            <div id="search">
                <form action="search.php" method="post">
                    <p><label for="searchId">Search: </label>
                    <input type="text" name="search" id="searchId"/>
                    <input type="submit" value="Search" /></p>
                </form>
            </div>
            <div id="menu">
                <nav>
                    <a href="#">Home</a>
                </nav>
            </div>
        </div> <!-- end header -->
        <div id="main">
            <div id="infoForm">


            
            
            