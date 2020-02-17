$(document).ready(function(){
    $("#btn-show-data").click(function(){
        var month = $("#month-select").val();
        var year = $("#year-select").val();
        console.log(month);
        console.log(year);
        if(month!= "" && year!="")
        {
            var url = "includes/reportDetails.inc.php";
            
            $.ajax({
                url: url,
                type: 'POST',
                async: false,
                data: { functionType:1, month:month, year:year },
                success: function(response) { 
                    var rows = eval(response);
                    var buyer =[];
                    var totalAmount =[];
                    var rowValues;
                    console.log(rows); 
                    for(var i=0; i<rows.length; i++)
                    {
                        rowValues = Object.values(rows[i]);
                        buyer.push(rowValues[0]);
                        totalAmount.push(rowValues[2]);
                    }
                    console.log(buyer);                    
                    var totalAmtNum=totalAmount.map(Number);
                    console.log(totalAmtNum); 
                    generateGraph();
                },
                error: function(textStatus, errorThrown){
                alert(textStatus, errorThrown);
                }  
            });
        }
    })

    function generateGraph(xValues, yValues){
        var data = [
            {
                name: "2018",
                type: "waterfall",
                orientation: "v",
                measure: [
                    "relative",
                    "relative",
                    "total",
                    "relative",
                    "relative",
                    "total"
                ],
                x: [
                    "Sales",
                    "Consulting",
                    "Net revenue",
                    "Purchases",
                    "Other expenses",
                    "Profit before tax"
                ],
                textposition: "outside",
                text: [
                    "+60",
                    "+80",
                    "",
                    "-40",
                    "-20",
                    "Total"
                ],          
                y: [
                    60,
                    80,
                    0,
                    -40,
                    -20,
                    0
                ],
                connector: {
                  line: {color: "rgb(63, 63, 63)"}
                },
            }
        ];
        layout = {
                title: {
                    text: "Profit and loss statement 2018"
                },
                xaxis: {
                    type: "category"
                },
                yaxis: {
                    type: "linear"
                },
                autosize: true,
                showlegend: true
            };
        Plotly.newPlot('myDiv', data, layout);
    }
    

    
})