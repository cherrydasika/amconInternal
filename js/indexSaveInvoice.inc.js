//Button trigger to save details to database. This is only done when the following preconditions are met
$("#btn-save-data").click(function(){

    var invoiceDetails=[]; 
    var formEmpty;
    var dateTimeString = insertDateTime();

    /*Final bill and tax paid */
    var preTaxTotal = $("#master-total").text().replace(",","");
    //preTaxTotal = preTaxTotal.replace(",",""); 
    var GrandTotal = $("#grand-total").text().replace(",","");
    //GrandTotal = GrandTotal.replace(",","");
    var taxCharged = parseFloat(GrandTotal) - parseFloat(preTaxTotal);
    taxCharged = taxCharged.toFixed(2);
    

    $(".item-owner tbody tr td").each(function(){invoiceDetails.push($(this).text()); })
    $(".item-owner-gst tbody tr td").each(function(){invoiceDetails.push($(this).text());})
    $(".item-bill-no tbody tr td").each(function(){invoiceDetails.push($(this).text());})
    invoiceDetails[5] = $("#in-bill-date").val();
    invoiceDetails[7] = $("#in-order-date").val();

    console.log(invoiceDetails);
    
    formEmpty = jQuery.inArray("", invoiceDetails);
  
    if(formEmpty > -1)
    { 
      console.log("Form empty");
      alert("Please fill first 2 sections of the form (Buyers Address to Dispatch Through)")
    }
    else
    {
      $(".item-description tbody tr td").each(function(){
        invoiceDetails.push($(this).text());
      })

      
      
      var cgst = $(".item-taxation tbody tr:nth-child(2) td:nth-child(2)").text();
      var sgst =$(".item-taxation tbody tr:nth-child(3) td:nth-child(2)").text();
      var igst =$(".item-taxation tbody tr:nth-child(4) td:nth-child(2)").text();
      invoiceDetails.push(cgst);
      invoiceDetails.push(sgst);
      invoiceDetails.push(igst);

      invoiceDetails.push(preTaxTotal);
      invoiceDetails.push(taxCharged);
      invoiceDetails.push(dateTimeString);
      console.log(invoiceDetails);
      
       //Insert into Database (array)
      dataInsertStatus1 = insertIntoDb('includes/saveInvoice.inc.php',1,invoiceDetails);
      console.log(dataInsertStatus1);

      //Insert List items into Database (array)
      var invoiceTemp1 =  buyerItemPreparedArray(invoiceDetails);
      var noItemPerRow = 3;
      var totalRows = invoiceTemp1.length/noItemPerRow;
      
      var k =0;
      for(var i=0; i< totalRows; i++)
      {          
        var tempArrList=[];
        tempArrList.push(dataInsertStatus1);
        tempArrList.push(invoiceTemp1[k]);k++;
        tempArrList.push(invoiceTemp1[k]);k++;
        tempArrList.push(invoiceTemp1[k]);k++;
        if(tempArrList[1].length>0 && tempArrList[2].length>0 && tempArrList[3].length>0){
          console.log(tempArrList);
          dataInsertStatus2 = insertIntoDb('includes/saveInvoice.inc.php',2,tempArrList);
          console.log(dataInsertStatus2);
        
        }
        
        
      }

    }//end-0f-else 

   }) //end of btn-save-data