<?php
    require("authenticate.php");
    require("header.php");
    echo "<a href='addPage.php'>Add New Page</a>";
            #setting the fetch mode
    $query="SELECT * FROM cmsinfo ORDER BY created_at DESC";
    #values in the select statment
    $STH=$DBH->query($query);
    $STH->setFetchMode(PDO::FETCH_ASSOC);?>
    <table>
        <tr>
            <th>Title</th>
        </tr>
    <? while($row = $STH->fetch()): ?>    
        <tr>
            <td><span class="title"><?=$row['title']?></span></td>
        </tr>
        <tr>
            <td><?=$row['created_at']?>--<a href="edit.php?id=<?=$row['id']?>">Edit</a></td>                
        </tr>
        <tr>
            <td>
                <? if($row['permalink']!='home'): ?>
                <form  method="post" action="delete.php">
                <p><input type="hidden" name="title" value='<?=$row['title'] ?>' />
                <input type="hidden" name="id" value="<?=$row['id'] ?>"/>                
                <input type="submit" name="delete" value="Delete" /></p>
                </form>
                <? endif;?>
            </td>
        </tr>
    <? endwhile; ?>
    </table>
<? require("footer.php")?>