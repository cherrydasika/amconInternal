 /**Button to open a particular buyer id details */
 $("#show-selected-buyerItem").click(function()
 {      
   buyerId = localStorage.getItem("BuyerID");
   localStorage.removeItem("BuyerID"); 
   if(buyerId.length==0){alert("Please select a record")}
   else
   {

     //Clear the contents of the form before importing data
     $(".item-owner tbody tr td, .item-owner-gst tbody tr td").html("");
     $(".item-bill-no tbody tr td, .item-taxation tbody tr td").html("");
     $(".item-description tbody tr td").html("");
     emptyDescriptionTotals();

     /*Show buyer details including gst and payment terms */
     arrBuyerDetailsTemp = ajaxCalls('includes/showInvoice.inc.php', 4, buyerId);
     arrBuyerDetails = $.parseJSON(arrBuyerDetailsTemp);
     arrBuyerDetailsList = Object.values(arrBuyerDetails[0]);
     
     //console.log(arrBuyerDetailsList);

     $(".item-owner tbody tr").find("td:nth-child(1)").text(arrBuyerDetailsList[1]);
     $(".item-owner tbody tr").find("td:nth-child(2)").text(arrBuyerDetailsList[2]);

     $(".item-owner-gst tbody tr").find("td:nth-child(2)").text(arrBuyerDetailsList[3]);
     $(".item-owner-gst tbody tr").find("td:nth-child(4)").text(arrBuyerDetailsList[4]);

     $(".item-bill-no tbody tr:nth-child(1)").find("td:nth-child(2)").text(arrBuyerDetailsList[5]);
     $(".item-bill-no tbody tr:nth-child(1)").find("td:nth-child(4)").text(arrBuyerDetailsList[6]);
     $(".item-bill-no tbody tr:nth-child(1)").find("td:nth-child(6)").text(arrBuyerDetailsList[7]);
     $(".item-bill-no tbody tr:nth-child(1)").find("td:nth-child(8)").text(arrBuyerDetailsList[8]);
     $(".item-bill-no tbody tr:nth-child(3)").find("td:nth-child(1)").text(arrBuyerDetailsList[9]);
     $(".item-bill-no tbody tr:nth-child(3)").find("td:nth-child(2)").text(arrBuyerDetailsList[10]);

     $(".item-taxation tbody tr:nth-child(2)").find("td:first").text(arrBuyerDetailsList[11]);
     $(".item-taxation tbody tr:nth-child(3)").find("td:first").text(arrBuyerDetailsList[12]);
     $(".item-taxation tbody tr:nth-child(4)").find("td:first").text(arrBuyerDetailsList[13]);
   

     /*Show buyer items and show totals including interest rates */
     
     arrItemList = ajaxCalls('includes/showInvoice.inc.php', 2, buyerId);
     arrItemListTemp = $.parseJSON(arrItemList);
     console.log(arrItemListTemp);
     arrBuyerItemListLen = arrItemListTemp.length;
     
     
     addBuyerListRows(arrBuyerItemListLen);
     
     for(var j= 0; j< arrBuyerItemListLen; j++)
     {
       var count = j+1;
       var arrBuyerListObjVal =  Object.values(arrItemListTemp[j]);
       $(".item-description tbody tr:nth-child("+count+")").find("td:nth-child(2)").text(arrBuyerListObjVal[1]);
       $(".item-description tbody tr:nth-child("+count+")").find("td:nth-child(3)").text(arrBuyerListObjVal[2]);
       $(".item-description tbody tr:nth-child("+count+")").find("td:nth-child(4)").text(arrBuyerListObjVal[3]);
     }
     console.log(arrItemListTemp);
     populateDescription();
     arrTotalValue2 = populateQuantityRate(); 
     $(".item-description tbody tr:last").find("#master-total").text(arrTotalValue2[2]); 
     console.log(arrTotalValue2);
     populateTaxation(arrTotalValue2[1],arrTotalValue2[2], arrTotalValue2[0]);

   } 

   function addBuyerListRows(arrBuyerRows){
    var rowCount = $(".item-description tbody tr").length - 1;
    console.log(arrBuyerRows);
    console.log(rowCount);
    while(rowCount<arrBuyerRows)
    {
        $("#add-new-row").click();
        rowCount++;
        console.log("This");
    }
    
   }
 });