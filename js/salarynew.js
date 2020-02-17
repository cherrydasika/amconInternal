$(document).ready(function(){
    $("#btn-show-data").click(function(){
        var url = "includes/salarydetails.inc.php";
        $.ajax({
            url: url,
            type: 'POST',
            async: false,
            data: { functionType:1 },
            success: function(response) {
              var rows = eval(response);
              var rowCount = rows.length;
              var grandTotal=0;

              var str="";
              $(".table-salary tbody").html("");
              for(var i=0; i<rowCount; i++){
                var rowValuesArr = Object.values(rows[i]);
                var rowno= i + 1;
                var rowTotal = rowValuesArr[6].replace(",","");
                rowTotal = parseFloat(rowTotal).toFixed(2);
                grandTotal = grandTotal + +(rowTotal);
                str += "<tr><td>"+rowno+"</td><td>"+rowValuesArr[1]+"</td><td>"+rowValuesArr[2]+"</td><td>"+rowValuesArr[3]+"</td><td>"+rowValuesArr[4]+"</td><td>"+rowValuesArr[5]+"</td><td contenteditable='true'>"+rowValuesArr[6]+"</td></tr>"  
              }
              grandTotalIn = grandTotal.toLocaleString('en-IN');
              str+='<tr><td colspan="6" class="text-right">TOTAL</td><td>'+grandTotalIn+'</td></tr>'
              $(".table-salary tbody").append(str);
            },
            error: function(textStatus, errorThrown){
              alert(textStatus, errorThrown);
            }  
          });
    })


    $("#add-new-salary").click(function(){
      var url = "includes/salarydetails.inc.php";
      var name=$("#name").val();
      var bank=$("#bank").val();
      var branch=$("#branch").val();
      var ifsc=$("#ifsc").val();
      var account=$("#account").val();
      var salary=$("#amount").val();
      salary = salary.replace(",","");
      console.log(name);
      console.log(bank);
      console.log(branch);
      console.log(ifsc);
      console.log(account);
      console.log(salary);
      if(name=="" || bank==""||account=="" || ifsc==""){
        $("#data-missing").show();
      }
      else{
        $.ajax({
          url: url,
          type: 'POST',
          async: false,
          data: { functionType:2,name:name, bank:bank, branch:branch, ifsc:ifsc, account:account, salary:salary },
          success: function(response) { 
            console.log(response); 
            if(response!=false){
              $("#record-add").show();
              $("#data-missing").hide();
              //setTimeout(reload_page,3000);
            }       
          },
          error: function(textStatus, errorThrown){
            alert(textStatus, errorThrown);
          }  
        });
      }

    })

    function reload_page(){location.reload();}
    


});