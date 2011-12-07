<?php
    
    require('header.php');
    require_once('dbConfig.php');
            $image_id = null;
            
                    if ($_FILES["file"]["error"]!=4) { 
                     if ($_FILES["file"]["error"] > 0) { 
                         $error = "File Upload Error #" . $_FILES["file"]["error"];
                         echo "<META HTTP-EQUIV='refresh' CONTENT='5;URL=addPage.php'>";
                     } else { 
                         $error = false; 
                     } 
                  
                     $imageinfo = getimagesize($_FILES['file']['tmp_name']); 
                     //list($width, $height)=getimagesize($_FILES['file']['tmp_name']);
                     $width = $imageinfo[0];
                     $height = $imageinfo[1];
            
                    if($imageinfo['mime'] == 'image/gif' || $imageinfo['mime'] == 'image/jpeg' || $imageinfo['mime'] == 'image/png') { 
                      $filename = basename($_FILES['file']['name']); 
                      $newname = dirname(__FILE__).'\\upload\\'.$filename;
                      $imageName = 'upload/'.$filename;
                      $query_insert_image = "INSERT INTO images(filename,mimetype,height,width) VALUES (?,?,?,?)";
                      
                      $STH = $DBH->prepare($query_insert_image);
                      $STH->bindParam(1,$imageName);
                      $STH->bindParam(2,$imageinfo['mime']);
                      $STH->bindParam(3,$height);
                      $STH->bindParam(4,$width);
                      $row = $STH->execute();
                      $image_id = $DBH->lastInsertId();
                      if($row){
                                echo "Image has been successfully added into database<br/>";                                
                                //echo "<META HTTP-EQUIV='refresh' CONTENT='2;URL=admin.php'>";
                                //header('Refresh:2;url=admin.php');
                            }
                            else{
                                echo"Error: $filename has not added into database";
                            }
                      
            
                      if (!(move_uploaded_file($_FILES['file']['tmp_name'],$newname))) { 
                          $error = "A problem occurred during file upload!"; 
                        }
                        } else { 
                            $error = "Sorry, we only accept GIF, PNG and JPEG images.";
                            echo $error."<br/>";
                            echo "<META HTTP-EQUIV='refresh' CONTENT='5;URL=addPage.php'>";
                            die();
                            
                        } 
                    }
    
    $title=trim($_POST['title']);    
    $content=trim($_POST['content']);
    $permalink=trim($_POST['permalink']);
    
    if(!empty($title)&&!empty($permalink)){
        
        
        $query="INSERT INTO cmsinfo(title,content,created_at,permalink,image_id) VALUES (?,?,NOW(),?,?)";
        $STH = $DBH->prepare($query);
        $STH->bindParam(1,$title);
        $STH->bindParam(2,$content);
        $STH->bindParam(3,$permalink);
        $STH->bindParam(4,$image_id);
        $row = $STH->execute();
    
        if($row){
            echo "{$title} has been successfully added into database";
            echo "<META HTTP-EQUIV='refresh' CONTENT='3;URL=admin.php'>";
            //header('Refresh:2;url=admin.php');
        }
        else{
            echo"Error: {$title} has not added into database";
        }
        

        
    }
    else{
        echo "<META HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
        }
        
    require('footer.php');
?>