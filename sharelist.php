<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
		
		$productCode =array("jdhqgdbs","vicyaisn","xrptbkzq","rfyjelrs","mdlwvokn","lyljnoex","fqzgowly","diiphfhv","togcvagf","wcfjheis","vrlsisru");
		$productReq = $_POST['textVal']-1;
		
		echo $productCode[$productReq];
		
}
else
{
	 header('Location: ../index.php');

}

?>
