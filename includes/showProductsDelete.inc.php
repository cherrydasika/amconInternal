<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    
    if(isset($_POST['functionType'])){
        $functionType = $_POST['functionType'];
        if($functionType==1){
           
            $areaToSearch = $_POST['productArea'];
            $files = glob("../products/uploads/images/$areaToSearch*.*");

            if(count($files)>0){
                echo  json_encode($files);
            }
        }
        else if($functionType==2){                
            $images = json_decode(stripslashes($_POST['imageToDelete']));
            var_dump($images);
            foreach($images as $image){
                $imageUrl = "../products/uploads/images/$image";
                if (!unlink($imageUrl)) {  
                    echo false;  
                    exit();
                }  
                else {  
                    echo ("$imageUrl has been deleted");  
                }  
            }
        }
        

    }
    
}
?>