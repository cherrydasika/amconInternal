<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reports</title>
 
  <?php include('includes/siteLinksUsed.inc.php'); ?>

  <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
  <script src="js/report.js" type="text/javascript"></script>  
  <link href="css/report.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php include('includes/siteNavigation.inc.php'); ?>

<div class="container">  
<div class="row">
        <div class="clearfix hide-print">        
            <div class="mb-0 float-left col-xs-3">
                <button type="button" class="btn btn-primary" id="btn-show-data">Show All </button>                  
            </div>
            <div class="mb-0 float-left col-xs-3">
                <select class="form-control" id="month-select">
                    <option value="01" selected>JANUARY</option>
                    <option value="02">FEBRUARY</option>
                    <option value="03">MARCH</option>
                    <option value="04">APRIL</option>
                    <option value="05">MAY</option>
                    <option value="06">JUNE</option>
                    <option value="07">JULY</option>
                    <option value="08">AUGUST</option>
                    <option value="09">SEPTEMBER</option>
                    <option value="10">OCTOBER</option>
                    <option value="11">NOVEMBER</option>
                    <option value="12">DECEMBER</option>
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
    <div class="row">
        <div class="col">
        <div id='myDiv'></div>
        </div>
    </div>

</div>

</body>
</html>
