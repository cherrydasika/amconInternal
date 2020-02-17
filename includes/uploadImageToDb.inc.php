<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	       
			$errors = [];
	        $abs_path = 'products/uploads/images/';
	        
        	$extensions = ['jpg', 'jpeg', 'png', 'gif'];
			
        	$new_file_name = $_POST['fileName'];        	
            $file_name = $_FILES['fileToUpload']['name'];
            $file_tmp = $_FILES['fileToUpload']['tmp_name'];
            $file_type = $_FILES['fileToUpload']['type'];
            $file_size = $_FILES['fileToUpload']['size'];
            $file_val = explode('.',$file_name);
            $file_last = end($file_val);
            $file_ext = strtolower($file_last);			
			
			$new_file_name =$_POST['fileName'].".".$file_ext;
			
			
			$destination_path = getcwd().DIRECTORY_SEPARATOR;
			//echo $destination_path."<br>";			
			$final_path = $destination_path.$abs_path;  
			//echo $final_path."<br>";
	        $file = $final_path.$new_file_name;
	       
			
            if (!in_array($file_ext, $extensions)) {
                $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
            }    

            if ($file_size > 3097152) {
                $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
            }
            
			if(file_exists($file )){
			 	//$errors[] = 'File already exists: ' . $file_name . ' ' . $file_type;
			 	unlink($file);
			}	
		
            if (empty($errors)) {            	
                move_uploaded_file($file_tmp, $file);
            }         
        
        	if ($errors)
        	{
				for($i=0; $i<sizeof($errors); $i++)
				{
					echo'<div id="errors">'.$errors[$i].'</div>';
				}
			}
		
}
else
{
header('Location: index.php');
}

?>