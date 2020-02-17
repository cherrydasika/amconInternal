<?php
	$unique_code = array("jdhqgdbs","vicyaisn","xrptbkzq","rfyjelrs","mdlwvokn","lyljnoex","fqzgowly","diiphfhv","togcvagf","wcfjheis","jvxrmlfd","vrlsisru");
	$product_name = array("DUSTBINS","FRP SHEETS","CABINS AND SHELTERS","FRP/GRP CHEMICAL STORAGE TANKS","DECORATIVE MOULDINGS",
							"DOORS FRAMES &amp; WINDOWS","CHIMNEY, EXHAUST DUCTS, SCRUBBERS, BLOWERS &amp; FRP IMPELLERS",
							"FRP RCC CASTING SHUTTERING MOULDS","STP PACKAGE PLANT, SEPTIC TANKS (AEROBIC/ANAEROBIC), ETP",
							"WATER STORAGE FRP/GRP PANEL / SECTION TANKS", "MANHOLE","MISCELLANEOUS");
	
	if(isset($_POST['upload']))
	{
		$upload = $_POST['upload'];	
		if($upload ==="yes")
		{
			
			echo "<option value='' selected>SELECT AREA</option>";
			for($i=0;$i<sizeOf($unique_code);$i++)
			{
				echo"<option value=".$unique_code[$i].">".$product_name[$i]."</option>";
			}	
		}
	}
	
	

?>
