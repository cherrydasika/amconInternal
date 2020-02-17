/***
This tool is developed by CHarith Dasika on 12.07.2019
Please refer to license agreement on information regarding software distribution. 
****/
$(document).ready(function() 
{
	var accountNo = "40263011000026";
	var accountName = "AMCON FIBREGLASS & PLASTIC ENGG. CO.";
	
	$("#p1acc").val(accountNo);
	$("#p3acc").val(accountNo);
	for(i=1;i<5;i++)	{	$("#p"+i+"name").val(accountName );	}
	
	function finalTotal(total, tdid, tid){
		totalIn = total.toLocaleString('en-IN');
		commaMatch = totalIn.match(/,/g);
		if(commaMatch ==null){commaMatch = 0;}else{commaMatch =commaMatch.length; }			
		if(commaMatch>1){total= (total/100000).toFixed(2);$("#"+tdid).val("LAKHS");  }
		else{total =totalIn; $("#"+tdid).val("");}						
		$("#"+tid).val(total);
	}
		
	
	function calRowtotal(id)
	{		
		setTimeout(grandTotal,2000);
		var total = 0;
		var q_col = "3";
		var r_col = "4"; //Always 4
		var t_col = "6";
		var td_col ="7";
		var first_id = id.substring(0,7); 
		
		var qid = first_id + q_col;
		var rid = first_id + r_col;
		var tid = first_id + t_col;
		var tdid = first_id + td_col; 
		var q_int_val ="";
		
		q_str_val = $("#"+qid).val();console.log("q_str_val:" + q_str_val);
		q_str_val = q_str_val.toUpperCase();
		
		T_index = q_str_val.indexOf("T");
		K_index = q_str_val.indexOf("K");
		r_val = $("#"+rid).val();
		
		if(r_val>0) //Rate given
		{
			if(T_index >=0){q_int_val = q_str_val.substring(T_index,-1); finalTotal(r_val*q_int_val*1000, tdid,tid);}
			else if(K_index >=0){q_int_val= q_str_val.substring(K_index,-1);finalTotal(r_val*q_int_val, tdid,tid);}
			console.log("Qvalue-");
			console.log(q_int_val);
		}	
	}
	
	function grandTotal()
	{
		var total = 0;
		for(i=1;i<=6;i++)
		{
			var rowCost = $("#p1t1r"+i+"c6").val();
			var checklakh = $("#p1t1r"+i+"c7").val();
			if(rowCost.length>0)
			{
				rowCost = rowCost.replace(/,/g,'');
				if(checklakh.length>0){total = total + parseFloat(rowCost)*100000;}else{total = total + parseFloat(rowCost);}
			}
		}
		//a - total
		//b
		margin =$("#p1t2r2c1").val();
		marginValue = total * margin/100;
		//c
		drawpower = total -  marginValue;
		//d
		limitSanction = $("#p1limit").val();  //string
		$("#p1t2r4c2").val(limitSanction);	
		
		sacmatch = limitSanction.match(/l/gi);
		//console.log("sacmatch",sacmatch);
		if(sacmatch==null){sacmatch=0;}else{sacmatch=sacmatch.length;}
		if(sacmatch>0){limitSanction =parseInt(limitSanction.match(/\d+/))*100000;}else{limitSanction = parseInt(limitSanction);}
		
		//e
		//console.log("drawpower",drawpower);
		//console.log("limitSanction",limitSanction);
		
		if(drawpower <= limitSanction){min = drawpower ;}else{min= limitSanction;}	
		


		convertoIn(total, "p1t1r7c5");//table1-row7
		convertoIn(total, "p1t2r1c2"); //row1
		convertoIn(marginValue, "p1t2r2c2"); //row2
		convertoIn(drawpower, "p1t2r3c2"); //row3			
		convertoIn(min, "p1t2r5c2"); //row3	
		
		prefill();
	}
	
	function prefill()
	{
		var total = $("#p1t1r7c5").val();
		$("#p2t3r6c4").val(total);
		
		for(i=1;i<=6;i++)
		{
			var rowCost = $("#p1t1r"+i+"c6").val();
			var checklakh = $("#p1t1r"+i+"c7").val();
			
			
			if(rowCost.length >0)
			{
				if(checklakh.length>0)
				{
					if(i==1){$("#p2t3r1c4").val(rowCost.toString()+" "+"LAKHS");}
					else if(i==2){$("#p2t3r2c4").val(rowCost.toString()+" "+"LAKHS");}
					else if(i==3){$("#p2t3r3c4").val(rowCost.toString()+" "+"LAKHS");}
					else if(i==4){$("#p2t3r4c4").val(rowCost.toString()+" "+"LAKHS");}
					else if(i==5){$("#p2t3r5c4").val(rowCost.toString()+" "+"LAKHS");}
					else if(i==6){$("#p2t3r51c4").val(rowCost.toString()+" "+"LAKHS");}
				}
				else
				{
					if(i==1){$("#p2t3r1c4").val(rowCost);}
					else if(i==2){$("#p2t3r2c4").val(rowCost);}
					else if(i==3){$("#p2t3r3c4").val(rowCost);}
					else if(i==4){$("#p2t3r4c4").val(rowCost);}
					else if(i==5){$("#p2t3r5c4").val(rowCost);}
					else if(i==6){$("#p2t3r51c4").val(rowCost);}
				
				}
				
			}
		}

		
		
		
		
	}//End of prefill
	
	

	$("ul.optionbuttons li").click(function(){		 
	   
	   var option = parseInt($(this).index())+ +1; //1:New;2:MakeCopies;3:DeleteCopies;4:Print

	   
	   //Buyer Database
	 
	   
	});
	
	function convertoIn(aval, id)
	{
		aval = aval.toString();
		lmatch = aval.match(/l/gi);
		if(lmatch==null){lmatch=0;}else{lmatch=lmatch.length;}
		//console.log("lmatch",lmatch);
		if(lmatch<1)
		{
				valIn = parseInt(aval).toLocaleString('en-IN');				
				valComma = valIn.match(/,/g);	
				if(valComma==null){valComma= 0;}else{valComma=valComma.length; }
				if(valComma>1) //Lakhs
				{
					aval= (aval/100000).toFixed(2);
					 $("#"+id).val(aval+" "+ "LAKHS");
		
				}
				else{$("#"+id).val(valIn);}
		}
		else
		{
			aval=aval.match(/\d+/);
			$("#"+id).val(aval+" "+ "LAKHS");
		}
	}
	
	
	
	//Limit value at page1
	$("#p1limit").change(function(){
			
		var val = $("#p1limit").val();
		if (val.length>0){	
		setTimeout(grandTotal,1000);	
		setTimeout(convertoIn,1000,val,"p1limit");
		setTimeout(convertoIn,1000,val,"p3limit");
		setTimeout(convertoIn,2500,val, "p1t2r4c2"); //row3			
		}
		else
		{
			$("#p1limit").val('');
			$("#p1t2r4c2").val('');
		}
		
	});
	
	$("#p1branch").change(function(){
		$("#p3branch").val($("#p1branch").val());
	});
	
	$("#p1t1r1c9").change(function(){
		var value = $("#p1t1r1c9").val();
		setTimeout(convertoIn,1000,value ,"p1t1r1c9");

	});
	$("#p2t1r1c1").change(function(){
		var value = $("#p2t1r1c1").val();
		setTimeout(convertoIn,1000,value ,"p2t1r1c1");
	});
	$("#p2t1r2c1").change(function(){
		var value = $("#p2t1r2c1").val();
		setTimeout(convertoIn,1000,value ,"p2t1r2c1");
	});
	$("#p2t1r3c1").change(function(){
		var value = $("#p2t1r3c1").val();
		setTimeout(convertoIn,1000,value ,"p2t1r3c1");
	});


	
	$("#p1date1").change(function(){
		var dateT = $("#p1date1").val();		
		$("#p1date2").val(dateT);
		$("#p3date").val(dateT);
	});
		
	$( "#p1t1r1c3,#p1t1r2c3,#p1t1r3c3,#p1t1r4c3,#p1t1r5c3,#p1t1r6c3" ).keyup(function(){		
		var idx = this.id;					
		calRowtotal(idx);
	});
	
	$( "#p1t1r1c4,#p1t1r2c4,#p1t1r3c4,#p1t1r4c4,#p1t1r5c4,#p1t1r6c4" ).keyup(function(){		
		var idx = this.id;				
		calRowtotal(idx);
	});

	
	

}); /*End of Document*/

























