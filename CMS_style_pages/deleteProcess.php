<?php

    require('dbConfig.php');
    if(empty($_POST['id'])){
        echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
    }
    else{
        $id = $_POST['id'];
        
        if (!is_numeric($id)) {
            //header('Location: index.php');
            echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
        }
        
        $query = "DELETE FROM cmsinfo WHERE id = $id";
        
        // Use the $g_db object to exectue the query
        $DBH->exec($query);
        // Redirect back to admin if the query was successful.
        echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=admin.php'>";
    }
    
    
?>