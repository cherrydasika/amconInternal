/***
This tool is developed by CHarith Dasika on 12.07.2019
Please refer to license agreement on information regarding software distribution. 
****/

//Upload and read the file
$(document).ready(function() 
{
	$.post('productNameList.php',{upload:"yes"},function(data){
		$("#productId").html(data);
	});
		
	
	$(document).on('change', '#productId', function(){	
		
		$("#fileName").val('');
	    var textVal = $(this).val();	    
	    if(textVal)
	    {
	    	$("#copyText").show();
			$("#linkopen").html('');	    	
	    	var addon = "?"+textVal;		    	
		    var url = "http://www.theamcongroup.me/amcon/amconproducts.php";
		    var finalurl = url+addon;			   
		    $("#fileName").val(finalurl);
		    $("#linkopen").append('<br>Click <a href="'+finalurl+'" target="_blank"><b><u>here</u></b></a> to open<br>Or');
	    	
		}
		else
		{
			$("#linkopen").html('');
			$("#copyText").hide();
		}	   
	    
	});
	
	$("#copyText").click(function(){
		var file = $("#fileName").val();
		if(file.length>0){$("#fileName").select(); document.execCommand("copy");alert("Copied");}
	});	
	
}); 
/*End of document*/