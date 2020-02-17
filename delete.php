
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <?php include('includes/siteLinksUsed.inc.php'); ?>
    <link href="css/delete.css" rel="stylesheet" type="text/css"/>
    <script src="js/delete.js" type="text/javascript"></script>  
</head>
<body>
<?php include('includes/siteNavigation.inc.php'); ?>
<div class="container">
<div class="modal fade" id="myModal" role="dialog">

    <div class="modal-dialog">    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete File</h4>
            </div>
            <div class="modal-body">
            <p class="text-danger">Are you sure? </p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="deleteImages">Yes</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
            </div>
        </div>
        
        </div>
    </div>

    <div class="row row-margin-btm">
            <div class="col-md-6">                
                <select class="select-css" id="productId">       
                </select>            
            </div>
            <div class="col-md-6">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" id="deleteConfirm">Delete</button>
            <h6 class="text-success">File has been successfully deleted.</h6>
            <h6 class="text-danger">Delete failed. Please try again. </h6>
            </div>
    </div>        
    <div id="productLists"></div>
</div>    
</body>
</html>
