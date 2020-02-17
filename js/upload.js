$(document).ready(function(){

    $.post('includes/productAreas.inc.php',{upload:"yes"},function(data){
		$(".select-css").html(data);
	});



    $(".file-upload-input").on("change", function(){        
        console.log(this);
        readURL(this);
        let fileToUpload = this.files[0];
        
        
        $("#formSubmit").click(function(){  
            var productId =  $("#productId").val();
            console.log(productId);
            if(productId==""){alert("Please select an area to upload");}
            else{ajax_file_upload(fileToUpload, productId); }      
            
        })
    })
    function readURL(input) {
        if (input.files && input.files[0]) 
        {
            console.log(input.files);
            console.log(input.files[0]);
            var reader = new FileReader();
    
            reader.onload = function(e) {
                $('.image-upload-wrap').hide();
        
                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();
        
                $('.image-title').html(input.files[0].name);
            };
    
            reader.readAsDataURL(input.files[0]);
    
        } 
        else 
        {
        removeUpload();
        }
    }

    $(".remove-image").on("click",function(){

        removeUpload();
    })
    
    function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
    }

    $('.image-upload-wrap').bind('dragover', function () 
    {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
    });

    function reload_page(){location.reload();}

    function ajax_file_upload(fileToUpload, productId) 
    {
        
        var pictureName;
        console.log("id:" + productId);           
        pictureName = productId+"_"+$.now();
        var url = 'includes/uploadImageToDb.inc.php';       
        
        var formData = new FormData();
        formData.append('fileToUpload', fileToUpload); 
        formData.append('fileName', pictureName);
        $.ajax
        ({
            url: url, 
            type: 'POST', 
            cache: false,
            processData: false,
            contentType: false,					   
            data: formData ,
            success: function(data)
            { 
                $('.text-success').show();					       	 
                setTimeout(reload_page,2000);                					 
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                $('.text-danger').show();
                setTimeout(reload_page,2000);   
            }       
        });	         
        
    } //End of function
    
});