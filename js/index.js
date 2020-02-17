$(document).ready(function(){
  $.getScript("js/indexNumToWords.inc.js", function() {});
  $.getScript("js/indexFunctions.inc.js", function() {});
  $.getScript("js/indexOpenInvoice.inc.js", function() {});
  $.getScript("js/indexSaveInvoice.inc.js", function() {});

  $(".container").on('keyup', function(){
    documentLimits();
  });

  function documentLimits(){
    var docLimit = $('.last-section-height').position().top;
    var innerHeight = $('.page').innerHeight();
    if(docLimit < innerHeight-100){
      //do nothing
    }else{alert("Document outside margins. Please remove additional unused rows");}
    console.log(docLimit);
    console.log(innerHeight);
  }
  $(".item-description, .item-taxation").on('keyup', function(){
    let arrTotalValues; 
    console.log($('.last-section-height').offset().top);
    arrTotalValues = populateQuantityRate();      
    populateDescription();
  
    $(".item-description tbody tr:last").find("#master-total").text(arrTotalValues[2]);

    if(arrTotalValues[0]>0)
    {     
      populateTaxation(arrTotalValues[1],arrTotalValues[2], arrTotalValues[0]); 
    }
    else{
      checkEmptyTaxation();
    }
  })  //keyup

  //Function to output the challan type on the form based on the user select option
  $("#challan-type").on('change', function(){
    $(".challan-type").html("");
    let selectedValue = $("#challan-type option:selected").text();
    $(".challan-type").append("<small>" + selectedValue + "</small>");
  })

  $("#challan-copy").on('change', function(){
    $(".challan-copy").html("");
    let selectedValue = $("#challan-copy option:selected").text();
    $(".challan-copy").append("<small>" + selectedValue + "</small>");
  })
  
  //Button trigger to add new item rows on the user interface
  $("#add-new-row").click(function(){
    documentLimits();
    $(".item-description tbody").find("tr:last").prev().after("<tr><th></th><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><th></th></tr>")
  })     

  //Button trigger to show results from database on to modal screen
    $("#btn-show-data").click(function(){
        let pageNumber = 1;
        changePageNum(pageNumber);
        $("#page-previous").click(function(){if(pageNumber>1){ pageNumber--;changePageNum(pageNumber);}})
        $("#page-next").click(function(){if(pageNumber>=1){ pageNumber++;changePageNum(pageNumber);}})  
    })



    

});