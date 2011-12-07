<?php

    require('dbConfig.php');
    if(empty($_POST['id'])){
        echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
    }
    else{
        $id = $_POST['id'];
        $image_id = $_POST['image_id'];
        if (!is_numeric($id)) {
            //header('Location: index.php');
            echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
        }
        $query = "DELETE FROM cmsinfo  WHERE id = $id";
        if($image_id)
        {
           $query_image = "DELETE FROM images WHERE image_id = $image_id";
           $DBH->exec($query_image);
        }
        
        // Use the $g_db object to exectue the query
        $DBH->exec($query);
        // Redirect back to admin if the query was successful.
        echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=admin.php'>";
    }
    
    
?>