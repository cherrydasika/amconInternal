
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <?php include('includes/siteLinksUsed.inc.php'); ?>
    <link href="css/upload.css" rel="stylesheet" type="text/css"/>
    <script src="js/upload.js" type="text/javascript"></script>  
</head>
<body>
<?php include('includes/siteNavigation.inc.php'); ?>
<div class="container">
<div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h4 class="text-primary">1. Choose an area to upload...</h4>
            <select class="select-css" id="productId">       
            </select>
        
        </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h4 class="text-primary">2. Choose a file to upload...</h4>
            <div class="file-upload">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                <div class="image-upload-wrap">
                    <input class="file-upload-input" id="file" type='file' accept="image/*" />
                    <div class="drag-text">
                    <h4>Drag and drop a file or select add Image</h4>
                    </div>
                </div>
                <div class="file-upload-content">
                    <img class="file-upload-image" src="#" alt="your image" />
                    <div class="image-title-wrap">
                    <button type="button" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">           
            <h4 class="text-primary">3. Click upload..</h4>
            <button type="button" class="btn btn-primary btn-lg" id="formSubmit">Upload</button>
            <h6 class="text-success">File has been successfully uploaded.</h6>
            <h6 class="text-danger">File upload failed. Please try again. </h6>
        </div>  
        
    </div>
</div>    
</body>
</html>
