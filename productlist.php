<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{	
		require_once("productNameList.php");
		
		$productCode = $unique_code;
		$productTitle = $product_name;
		$productReq = $_POST['path'];
		$product="";
		$p_title="";
		
		for($j=0; $j<sizeof($productCode);$j++)
		{
			if(strcmp($productCode[$j], $productReq)==0){$product = $productCode[$j]; $p_title=$productTitle[$j]; break;}
		}
		if(!empty($product))
		{
			
			$abs_path = 'products/uploads/images/';
			$current_path = getcwd().DIRECTORY_SEPARATOR;
			$targetPath = $current_path.$abs_path;
			chdir($targetPath);
			$tosearch = $product."*.*";
			$pictureList = array_reverse(glob($tosearch));
			$picarrayLen =  sizeof($pictureList);
			$count=0;
			$ispdf = $_POST['topdf'];
			
			
			if($ispdf ==0)
			{
				echo'<h3>'.$p_title.'</h3><div class="galleria">';
				echo'<img src="products/uploads/images/isocertificate.jpeg" alt="isocertificate">';	
				for($i=0;$i<$picarrayLen; $i++)
				{					
					$pictoOpen = $abs_path.$pictureList[$i];					
					echo '<img src="'.$pictoOpen.'">';
				}
						
				echo "</div>".'<script>(function() { Galleria.loadTheme("dont open/galleria.classic.js"); Galleria.run(".galleria"); }()); </script>';
			}
			else if($ispdf ==1)
			{
				for($i=0;$i<$picarrayLen; $i++)
				{					
					$pictoOpen = $abs_path.$pictureList[$i];					
					echo '<img src="'.$pictoOpen.'">';	
				}					
			}
			
		}

		

 
}
else
{
	 
	 header('Location: index.php');

}

?>
