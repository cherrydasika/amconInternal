function insertDateTime(){
  var dt = new Date();
  var month = dt.getMonth()+1;
  var day = dt.getDate();
  var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

  var dateTimeOutput = dt.getFullYear() + '/' +
  ((''+month).length<2 ? '0' : '') + month + '/' +
  ((''+day).length<2 ? '0' : '') + day + ' ' + time;

  return dateTimeOutput;

 }


function populateDescription(){
    $(".item-description tbody tr").each(function()
    {
      var idNumber = $(this).index() + 1;
      var description = $(this).find("td:nth-child(2)").text();
      if(description!=""){$(this).find("th:first").text(idNumber);}else{$(this).find("th:first").text("");}
    });
  }
  
  function emptyDescriptionTotals(){
    $(".item-description tbody tr").each(function(){$(this).find("th:first").text("");$(this).find("th:last").text("");});
  }

  


  function populateQuantityRate(){
    let totalAllRows = 0;
    let totalEachRow = 0;
    let totalAllRowsINRFormat;
    let arrMasterTotal = [];

    $(".item-description tbody tr").each(function()    
    {           
          
          var quantity = $(this).find("td:nth-child(3)").text();
          var rate = $(this).find("td:nth-child(4)").text();  
          /* Only calculate if quantity and rates are available */         
          if(quantity!="" && rate!="")
          {
            totalEachRow = parseFloat(quantity) * parseFloat(rate);
            totalAllRows = +totalAllRows + +(totalEachRow).toFixed(2);              
            totalEachRowINRFormat = totalEachRow.toLocaleString('en-IN');        
            $(this).find("th:last").text(totalEachRowINRFormat);

            totalAllRowsINRFormat = totalAllRows.toLocaleString('en-IN');              
            totalAllRowsInWords = convertNumberToWords(totalAllRowsINRFormat, 2);
            
            
          }else{ $(this).find("th:last").text("");}           
    })
    arrMasterTotal.push(totalAllRows,totalAllRowsInWords, totalAllRowsINRFormat);
    return arrMasterTotal;

  }

  function checkEmptyTaxation(){
    $(".item-taxation tbody tr"). each(function(){
      $(this).find("td:nth-child(3)").text("");
      $(this).find("td:nth-child(4)").text("");
    });
  }

  function populateTaxation(totalAllRowsInWords,totalAllRowsINRFormat, totalAllRows){
    let grandTotal = 0;
    $(".item-taxation tbody tr"). each(function(){           
      let taxId = $(this).index(); 
      rateOfInterest = $(this).find("td:nth-child(2)").text();
      if(taxId==0)
      {
        $(this).find("td:nth-child(3)").text(totalAllRowsInWords);
        $(this).find("td:nth-child(4)").text(totalAllRowsINRFormat); 
      }
      else if(taxId==4)
      {
        grandTotal +=  parseFloat(totalAllRows); 
        grandTotalINRFormat = grandTotal.toLocaleString('en-IN');  
        grandTotalInWords = convertNumberToWords(grandTotalINRFormat, 2);
        $(this).find("td:nth-child(3)").text(grandTotalInWords);
        $(this).find("td:nth-child(4)").text(grandTotalINRFormat); 
      }
      else{
        if(rateOfInterest>0){  
          rowInterest = parseFloat(rateOfInterest*totalAllRows/100).toFixed(2);               
          rowInterestInWords = convertNumberToWords(rowInterest, 2);
          rowInterestINRFormat = parseFloat(rowInterest).toLocaleString('en-IN');
          $(this).find("td:nth-child(3)").text(rowInterestInWords);
          $(this).find("td:nth-child(4)").text(rowInterestINRFormat); 
          grandTotal +=  parseFloat(rowInterest);      
          
                  
        }
      }       
      
    })
  }


  function insertIntoDb(url,functionType,arrList){
    arrListJson = JSON.stringify(arrList);
    var jqXHR = $.ajax({
      url: url,
      type: 'POST',
      async: false,
      data: { arrList: arrListJson, functionType: functionType},
      success: function(response) {           
      },
      error: function(textStatus, errorThrown){
        alert(textStatus, errorThrown);
      }  
    });

    return jqXHR.responseText;
 }


  function ajaxCalls(url,functionType, buyerId){
    
    var jqXHR = $.ajax({
      url: url,
      type: 'POST',
      async: false,
      data: { buyerId: buyerId, functionType: functionType},
      success: function(response) {
        //arrBuyerItemList =$.parseJSON(response);  
        //console.log("success");
        //return($.parseJSON(response));
      },
      error: function(textStatus, errorThrown){
        alert(textStatus, errorThrown);
      }  
    });

    return jqXHR.responseText;
    

  }


  //Function to show results from the database
  function changePageNum(pageNumber)
  {
    var strTemp =""; 
    var arrTemp;
    var arrBuyerItemList;
      
    arrBuyerItemList = ajaxCalls('includes/showInvoice.inc.php', 1, pageNumber);
    arrTemp = $.parseJSON(arrBuyerItemList);
    len = arrTemp.length;
    $(".tab-buyers-list tbody").html("");      
    for (var i = 0 ; i < len; i++)
    {
      var arrayObjVal = Object.values(arrTemp[i]);
      strTemp +="<tr><td>"+arrayObjVal[0]+"</td><td>"+arrayObjVal[1]+"</td><td>"+arrayObjVal[2]+"</td><td>"+arrayObjVal[3]+"</td></tr>";
    }          
    $(".tab-buyers-list tbody").append(strTemp);

    $(".tab-buyers-list tbody tr").on('click',function(){ 
      $(this).addClass("bg-success").siblings().removeClass("bg-success");           
      var buyerId = $(this).find("td:first").text();
      //console.log("BuyerID: " + buyerId);  
      localStorage.setItem("BuyerID",buyerId);  
      
    });

      

    }


    function buyerItemPreparedArray(invoiceDetails){
      var invoiceTemp1 =  invoiceDetails.splice(10,invoiceDetails.length);
      var lenToRetain = invoiceTemp1.length - 6;
      invoiceTemp1.length = lenToRetain;
      return invoiceTemp1;
    }
