$(document).ready(function(){

    $.post('includes/productAreas.inc.php',{upload:"yes"},function(data){
		$(".select-css").html(data);
    });

    let deleteArr = [];
   
    $("#deleteImages").on("click", function(){
        console.log(deleteArr);
        if(deleteArr.length>0){productsToDelete(deleteArr);}
        else{alert("Please select images to delete");}
    })
    

    //When product Id changes on the screen
    $("#productId").on("change", function(){
        console.log("Changed");
        let showArea = $("#productId").val();
        console.log(showArea);
        if(showArea.length!=0){
            $("#deleteConfirm").show();
            //Area is given
            showProductToDelete(showArea);

        }


        $(".product-grid .social img").click(function(){
            var imgName = $(this).parent().parent().prev().attr('src');
            imgName = imgName.replace("products/uploads/images/", "");
            if(jQuery.inArray(imgName, deleteArr)>-1){
                //The item is in the array
                //Remove the item
                deleteArr = $.grep(deleteArr, function(value){
                    return value != imgName;
                })
                $(this).parent().parent().css('opacity', '0');
            }
            else{
                //The item is not in the array
                deleteArr.push(imgName);
                $(this).parent().parent().css('opacity', '1');
            }
            
            
            

            
    
        });

    });

    
    function productsToDelete(productArr){
        productArr = JSON.stringify(productArr);
        var url = 'includes/showProductsDelete.inc.php';  
        $.ajax({
            url: url,
            type: 'POST',
            async: false,
            data: { imageToDelete: productArr, functionType:2 },
            success: function(response) { 
                console.log(response);  
                if(response!= false){
                    $(".text-success").show();
                    setTimeout(reload_page,2000);
                }            
            },
            error: function(textStatus, errorThrown){
              alert(textStatus, errorThrown);
            }  
        });
    }

    

    
    function reload_page(){location.reload();}

    function showProductToDelete(productArea) 
    {
        
        console.log("productArea:" + productArea);   
        var url = 'includes/showProductsDelete.inc.php';     
        $.ajax({
            url: url,
            type: 'POST',
            async: false,
            data: { productArea: productArea, functionType:1 },
            success: function(response) {
                let imgArray = eval(response);
                imgArray =imgArray.reverse();
                let totalImages = imgArray.length;
                let str="";
                let count = 0;
                $("#productLists").html("");                
                for(var i=0; i<totalImages; i++){
                    imgToUse = imgArray[i].replace("../","");
                    if(i%4 ==0){
                        //If divisible by 4 add new row
                        str+='<div class="row">';
                        count = 0;
                    }
                    str+= '<div class="col-md-3"><div class="product-grid">';
                    str+= '<div class="product-image"><img class="pic-1" src="'+imgToUse+'">';
                    str+= '<ul class="social"><li><img class="pic-2" src="images/tick.jfif"></li></ul></div></div></div>';
                    count++;
                    if(count%4 ==0){
                        //If divisible by 4 add new row
                        str+='</div>';
                    }

                }
                
                $("#productLists").append(str);


            },
            error: function(textStatus, errorThrown){
              alert(textStatus, errorThrown);
            }  
          });
        
    } //End of function
    
});