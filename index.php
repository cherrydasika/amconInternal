<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
 
  <?php include('includes/siteLinksUsed.inc.php'); ?>

  
  <script src="js/index.js" type="text/javascript"></script>  
  <link href="css/index.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php include('includes/siteNavigation.inc.php'); ?>

<div class="container">  

   
    <!-- Button to Open the Modal -->
    

    <div class="clearfix hide-print">
        <div class="mb-0 float-left col-xs-6">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="btn-show-data">Open Invoice </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" id="btn-save-data">Save Invoice </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" id="add-new-row">Add Row </button>
        </div>
        <div class="mb-0 float-left col-xs-3 ">
            <select class="form-control" id="challan-type">
                <option selected>GST INVOICE CUM CHALLAN</option>
                <option>PROFORMA INVOICE</option>        
            </select>
        </div>
        <div class="mb-0 float-left col-xs-3">
        <select class="form-control" id="challan-copy">
            <option selected>SELLER COPY</option>
            <option>BUYER COPY</option>
            <option>TRANSPORT COPY</option>
            <option>FILE COPY</option>
        </select>
        </div>
    </div>
    <!-- <p class="text-success text-center">Invoice saved to database successfully</p> -->
         
    
       
      
    
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Past Invoices</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <table class="table table-condensed table-hover table-bordered tab-buyers-list">
                        <thead>
                            <tr>
                                <th style="width:5%">ID</th>                                
                                <th style="width:68%">Buyer</th>
                                <th style="width:15%">Date</th>
                                <th style="width:12%">Time</th>
                                
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <ul class="pagination pagination-sm">
                        <li class="page-item"><a class="page-link" href="#" id="page-previous">Previous</a></li>                      
                        <li class="page-item"><a class="page-link" href="#" id="page-next">Next</a></li>
                    </ul>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="show-selected-buyerItem">Show</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <div id="test"></div>
    <div class="page" >
        <div class="row">
            <div class="col-xs-4" ><p class="text-left challan-type" id="amcon-m-0" ><small>GST INVOICE CUM CHALLAN</small></p></div>
            <div class="col-xs-4" ><p class="text-center challan-copy" id="amcon-m-0"><small>   SELLERS COPY</small></p></div>
            <div class="col-xs-4" ><p class="text-right" id="amcon-m-0"><small> Please retain your receipt </small></p></div>
        </div>
        <div class="row" id="amcon-bb-1">
            <div class="col-xs-2"><img src="images/amcon.jpg" alt="logo" class="img-thumbnail"></div>
            <div class="col-xs-10"><div class="text-center"><strong> AMCON FIBREGLASS & PLASTIC ENGG. CO.</strong></div>
            <div class="clearfix">
                <div class="mb-0 float-left col-xs-2"><strong><small>WORK</small></strong></div>
                <div class="mb-0 float-left col-xs-10"><small>H.Molla lndustrial Estate, Bakrahat Main Road, Bonogram, Raspunja, 24PGS (S), Kolkata, West Bengal, India, PIN - 700 104</small></div>
            </div>
            <div class="clearfix">
            <div class="mb-0 float-left col-xs-2"><strong><small>HOME</small></strong></div>
            <div class="mb-0 float-left col-xs-10"><small>21/1, Ballygunge Place, Kolkata, West Bengal,India, PIN - 700 019</small></div>
            </div>
            <div class="clearfix">
            <div class="mb-0 float-left col-xs-2"><strong><small>CONTACT</small></strong></div>
            <div class="mb-0 float-left col-xs-10"><small>☎(033) 2440-3358 / 2283-3039   📱(+91) 9339780681   ✉ abhay.misra1234@gmail.com</small></div>
            </div>          
            </div>         
        </div>
        <div class="row" id="amcon-bb-1">
            <div class="col-xs" >
                <table class="table table-striped table-condensed table-hover table-bordered item-owner" id="amcon-p-0">
                        <thead >                           
                            <tr>
                                <th colspan="4" style="width:50%">Buyer Address:</th>
                                <th colspan="4" style="width:50%">Consignee Address:</th>                                      
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <td contenteditable='true' colspan="4" ></td>
                                <td contenteditable='true' colspan="4" ></td>                                      
                            </tr>                           
                        </tbody>                        
                </table>
                <table class="table table-striped table-condensed table-hover table-bordered item-owner-gst">
                        <tbody>   
                                <tr>
                                    <th style="width:15%">Buyer GST</th>
                                    <td style="width:35%" contenteditable='true'></td>
                                    <th style="width:15%">Consignee GST</th>
                                    <td style="width:35%" contenteditable='true'></td>                                      
                                </tr>
                        </tbody>
                </table>
                
            </div>
           
        </div>
        <div class="row" id="amcon-bb-1">
            <div class="col-xs">
                <table class="table table-striped table-condensed table-hover table-bordered item-bill-no">
                    <tbody>
                        <tr>
                            <th style="width:7%">Bill No:</th>
                            <td contenteditable='true' style="width:20%"></td>
                            <th style="width:5%">Date</th>
                            <td style="width:9%"><input type="date" id="in-bill-date"></td>
                            <th style="width:9%">Order No:</th>
                            <td contenteditable='true' style="width:20%"></td>
                            <th style="width:5%">Date</th>     
                            <td style="width:10%"><input type="date" id="in-order-date"></td>                       
                        </tr>
                        <tr>
                            <th colspan="4">Payment Terms:</th>
                            <th colspan="4">Dispatch Through:</th>                                      
                        </tr>
                        <tr>
                            <td contenteditable='true' colspan="4"></td>
                            <td contenteditable='true' colspan="4"></td>                                      
                        </tr>
                    </tbody>
                    
                </table>
            </div>
        </div>
        <div class="row" id="amcon-bb-1">
            <div class="col-xs">
            <table class="table table-striped table-condensed table-hover table-bordered item-description">
                <thead>
                <tr>
                    <th style="width:5%">Item</th>
                    <th style="width:60%">Description</th>
                    <th style="width:10%">Quantity</th>
                    <th style="width:10%">Rate (Rs)</th>
                    <th style="width:15%">Total (Rs)</th>
                </tr>
                </thead>
                <tbody>
                    <tr><th></th><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><th></th></tr>
                    <tr><th></th><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><th></th></tr>
                    <!-- <tr><th></th><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><th></th></tr>
                    <tr><th></th><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><th></th></tr>
                    <tr><th></th><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><th></th></tr> -->
                   
                    <tr><th></th><th><strong>HSN Code:</strong> 39259090 <strong>SAC Code:</strong> 00</th><th colspan="2">Total Value (Rs)</th><th id='master-total'></th></tr>
                </tbody>    
                </table>
            </div>
        </div>
        <div class="row" id="amcon-bb-1">
            <table class="table table-striped table-condensed table-hover table-bordered item-taxation">
                    <thead>
                    <tr>
                        <th style="width:12%">Description</th>
                        <th style="width:5%">Rate</th>
                        <th style="width:68%">Amount in Words</th>
                        <th style="width:15%">Amount (Rs)</th>                    
                    </tr>
                    </thead>
                    <tbody>
                        <tr><th>Taxable Value</th><td></td><td></td><td></td></tr>
                        <tr><th>C.G.S.T (%)</th><td contenteditable='true'>9</td><td></td><td></td></tr>
                        <tr><th>S.G.S.T (%)</th><td contenteditable='true'>9</td><td></td><td></td></tr>
                        <tr><th>I.G.S.T (%)</th><td contenteditable='true'>0</td><td></td><td></td></tr>
                        <tr><th>Total (Rs)</th><td></td><td></td><td id="grand-total"></td></tr>
                    </tbody>
            </table>
            <p class="text-center" id="amcon-p-0"><small> <strong> Conditions</strong> - Interest at 24% will be charged, if payment is not received within due date. All disputes subject to Kolkata jurisdiction.</small></p>
        </div>
        <div class="row last-section-height" id="amcon-bb-1">
            <div class="col-xs-6">
                <table class="table table-striped table-condensed table-hover table-bordered">
                    <thead>
                        <tr><th colspan="2" style="width:25%">Seller Details</th></tr>
                        <tr><th style="width:25%">GST No.</th><td>19AAFHA6668F1Z4</td></tr>
                        <tr> <th style="width:25%">VAT No.</th><td>19291268045 Dt. 30-11-05</td></tr>
                        <tr> <th style="width:25%">CST No.</th><td>19291268045 Dt. 30-11-05</td></tr>
                        <tr> <th style="width:25%">PAN No.</th><td>AAFHA6668F</td> </tr>                   
                        <tr> <th style="width:25%">Service Tax</th><td>AAFHA6668FSD001</td></tr>  
                    </thead>
                    
                </table>
            </div>
            <div class="col-xs-6">            
                <p class="text-right"><strong><small> For AMCON FIBREGLASS & PLASTIC ENGG. CO.</small></strong></p>
                <p class="text-right" style="margin-top:70px"><strong><small> Authorised Signature</small></strong></p>
                <p class="text-right" id="last-element" style="margin-top:30px"><strong><small> E. & O.E</small></strong></p>
                
            </div>
        </div>
    </div>
</div>

</body>
</html>
