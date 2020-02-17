<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
 
  <?php include('includes/siteLinksUsed.inc.php'); ?>

  
  <script src="js/salarynew.js" type="text/javascript"></script>  
  <link href="css/salarynew.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php include('includes/siteNavigation.inc.php'); ?>

<div class="container">  
<div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add new person</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="bank">Bank:</label>
                        <input type="text" class="form-control" id="bank">
                    </div>
                    <div class="form-group">
                        <label for="branch">Branch:</label>
                        <input type="text" class="form-control" id="branch">
                    </div>
                    <div class="form-group">
                        <label for="ifsc">IFSC:</label>
                        <input type="text" class="form-control" id="ifsc">
                    </div>
                    <div class="form-group">
                        <label for="accno">Account Number:</label>
                        <input type="text" class="form-control" id="account">
                    </div>
                    <div class="form-group">
                        <label for="accno">Amount:</label>
                        <input type="text" class="form-control" id="amount">
                    </div>
                    <div class="form-group">
                        <p class="text-danger" id="data-missing">Missing details...</p>
                    </div>
                    <div class="form-group">
                        <p class="text-success" id="record-add">Record successfully added</p>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-success"id="add-new-salary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="clearfix hide-print">        
            <div class="mb-0 float-left col-xs-3">
                <button type="button" class="btn btn-primary" id="btn-show-data">Show All </button>
                <button type="button" class="btn btn-danger" id="btn-delete" data-toggle="tooltip" title="Delete Record">Delete</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="btn-show-data">Add </button>   
            </div>
            <div class="mb-0 float-left col-xs-3">
                <select class="form-control" id="month-select">
                    <option selected>JANUARY</option>
                    <option>FEBRUARY</option>
                    <option>MARCH</option>
                    <option>APRIL</option>
                    <option>MAY</option>
                    <option>JUNE</option>
                    <option>JULY</option>
                    <option>AUGUST</option>
                    <option>SEPTEMBER</option>
                    <option>OCTOBER</option>
                    <option>NOVEMBER</option>
                    <option>DECEMBER</option>
                </select>
            </div>
            <div class="mb-0 float-left col-xs-3 ">
                <select class="form-control" id="year-select">
                    <option selected>2019</option>
                    <option>2020</option>
                    <option>2021</option>
                    <option>2022</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                    <option>2027</option>
                    <option>2028</option>
                </select>
            </div>          
        </div>
    </div>
    <div class="page" >
        <div class="row">
            <div class="col-md">
                <table class="table table-striped table-condensed table-hover table-bordered ">
                    <thead >                           
                        <tr>
                            <th style="width:50%">AMCON FIBREGLASS & PLASTIC ENGG. CO.</th>
                            <th style="width:50%">Salary for the month of</th>                                      
                        </tr>
                    </thead>
                </table>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md">
                <table class="table table-striped table-condensed table-hover table-bordered table-salary">
                <thead>
                <tr>
                    <th style="width:5%">No</th>
                    <th style="width:20%">Full Name</th>
                    <th style="width:20%">Bank</th>
                    <th style="width:15%">Branch</th>
                    <th style="width:15%">IFSC</th>
                    <th style="width:15%">Account</th>
                    <th style="width:10%">Amount (Rs)</th>
                </tr>
                </thead>
                <tbody></tbody>
                </table>
            </div>
            
        </div>
</div>

</body>
</html>
