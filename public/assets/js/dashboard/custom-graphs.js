
$.get('/transaction/graphs/daily',function(resp){

    drawLineGraph(resp,'daily-transaction-graph');

});


$.get('transaction/graphs/sales/part-type',function(resp){

  drawDoughnutGraph(resp,'topsellingPartType');

});


$.get('/transaction/graphs/daily-sales',function(resp){

    drawBarGraph(resp,'daily-sales-transaction-graph');

});
