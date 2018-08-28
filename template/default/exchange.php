
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>


<script src="https://www.amcharts.com/lib/3/amstock.js"></script>


<div class="row">
	<div class="col">
		<?php echo $pair;?> / <?php echo $base;?><br>
		<?php echo $info->name;?>
	</div>

	<div class="col">
		Last Prices<br>
		<span id="lastprices"></span>
	</div>


	<div class="col">
		Last 24h change<br>
		<span id="change24"></span>
	</div>


	<div class="col">
		24h High<br>
		<span id="high24"></span>
	</div>


	<div class="col">
		24h Low<br>
		<span id="low24"></span>
	</div>

	<div class="col">
		24h Volume<br>
		<span id="volume24"></span>/<span id="volume24btc"></span>
	</div>
</div>
<br>
<div class="row d-flex flex-row">
	<div class="col-lg-9 col-sm-3">
		<div id="main_chart2" style="height: 550px;"></div>
		
	</div>
	<div class="col-lg-3 col-sm-3">
		<div id="coinValible" class="border">
			<nav>
			  <div class="nav nav-tabs" id="nav-tab" role="tablist">
			  	
			  	<a class="nav-item flex-sm-fill nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" title="Favorites"><i class="ti-star"></i></a>
			  	<?php 
			  	$i = 0;
			  	foreach ($data as $key => $value) { 
			  		$i++;
			  	?>
			    <a class="nav-item flex-sm-fill nav-link <?php echo ($base == $key ? "active" : "");?>" id="nav-home-tab" data-toggle="tab" href="#nav-trade-<?php echo strtolower($key);?>" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo $key;?></a>
			    <?php } ?>
			  </div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
			  <?php 
			  $i = 0;
			  foreach ($data as $key => $value) { 
			  	$i++;
			  	?>
			  <div class="tab-pane fade <?php echo ($base == $key ? "show active" : "");?>" id="nav-trade-<?php echo strtolower($key);?>" role="tabpanel" aria-labelledby="nav-home-tab">
			  	<div class="input-group mb-3 input-group-sm">
				  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
				  <div class="input-group-append">
				    <button class="btn btn-outline-secondary" type="button">Search</button>
				  </div>
				</div>
				<div class="listcoins">
					<table class="table">
						<?php foreach ($value as $key_alt => $value_alt) { ?>
							<tr id="coind_<?php echo $key.$value_alt->symbol;?>">
								<td width="2%"><i class="ti-star"></i></td>
								<td><a href="<?php echo store_url("exchange/".$key."/".$value_alt->symbol);?>" title="<?php echo $value_alt->name;?>"><?php echo $value_alt->symbol;?></a></td>
								<td>0</td>
								<td class="text-right">0</td>
							</tr>
						<?php } ?>
						

						

					</table>
				</div>
			  </div>
			  <?php } ?>
			  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
			  
			</div>
		</div>
	</div>
</div>
		<br>
<div class="row d-flex flex-row">
	<div class="col-lg-3 col-sm-3">
		<div class="task border">
			<div class="sell-task">
				<?php include __DIR__."/forms/ask.php";?>
			</div>
			<div class="price-task text-center bg-light">7500 <span>7500 <?php echo $base;?></span></div>
			<div class="buy-task">
				<?php include __DIR__."/forms/bid.php";?>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-sm-6">
		
		<div class="controller">
			<nav>
			  <div class="nav nav-tabs" id="nav-tab" role="tablist">
			  	
			  	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Limit</a>
			    <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Market</a>
			    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Stop limit</a>
			    
			  </div>
			</nav>
			<div class="tab-content border border-top-0" id="nav-tabContent">
			  	
			  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			  		<?php include __DIR__."/forms/limit.php";?>
			  </div>
			</div>
		</div>

		<br>
		<div class="border" style="padding:30px; min-height: 350px;">
			<h5>Depth</h5>
			<div id="depthchart" style="height: 240px;"></div>
		</div>
		
	</div>
	<div class="col-lg-3">
		<div id="trol">
			
			<div class="trade-history border align-items-end" id="chatbox">
				<?php include __DIR__."/forms/troll.php";?>
			</div>
			<form id="chatForm">
			<div class="input-group mb-3 input-group-sm" style="margin-top: 5px;">
			  <input type="text" class="form-control" placeholder="Enter Chat" aria-label="Recipient's username" aria-describedby="button-addon2">
			  <div class="input-group-append">
			    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Send</button>
			  </div>
			</div>
			</form>
		</div>
		<!--// Trade History -->
		<div id="history">
			<h5>Trade History</h5>
			<div class="history-task border align-items-end">
				<?php include __DIR__."/forms/history.php";?>
			</div>
		</div>
	</div>
</div>
<br>
<div id="mytask">
<h5>Open Order</h5>
<div class="run-task">
	<table class="table">
		<thead>
			<th>Date</th>
			<th>Pair</th>
			<th>Type</th>
			<th>Side</th>
			<th>Price</th>
			<th>Amount</th>
			<th>Filled%</th>
			<th>Total</th>
			<th>Trigger Conditions</th>
			<th class="text-right"><a href="#" class="btn btn-outline-info btn-sm">Cancel All</a></th>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>
<br>
<h5>My 24h Order History</h5>
<table class="table">
		<thead>
			<th>Date</th>
			<th>Pair</th>
			<th>Type</th>
			<th>Side</th>
			<th>Price</th>
			<th>Amount</th>
			<th>Filled%</th>
			<th>Total</th>
			<th>Trigger Conditions</th>
			<th class="text-right">Status</th>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var history = $("#history").height();
		var parenHeight = $(".controller").parent().height();
		var priceTask = $(".price-task").outerHeight();
		//$("#coinValible").height($("#main_chart").height());
		//$(".task").height(parenHeight);
		$(".sell-task, .buy-task").height((parenHeight - priceTask - 2)/2);
		
		$(".sell-task").animate({scrollTop: $(".sell-task").get(0).scrollHeight}, 500);
		getDataJson();
		
		$("input.amcharts-start-date-input").parent().hide();
		$('[href="http://www.amcharts.com"]').hide();
		
		
	});
	
	var getDataJson = function(){

			$.getJSON("/api/trade/<?php echo $base;?>/<?php echo $pair;?>", function(data){
				$.each(data, function(keys, value){
					sum = 0;
					$.each(value, function(index, vdata){
						if(keys == "sell"  && vdata){

							sum = Number.parseFloat(vdata.amount * vdata.prices) + Number.parseFloat(sum);
							$("."+keys+"-task #sdata-"+(20-index)+" td:eq(0)").text(vdata.prices);
							$("."+keys+"-task #sdata-"+(20-index)+" td:eq(1)").text(vdata.amount);
							$("."+keys+"-task #sdata-"+(20-index)+" td:eq(2)").text(sum.toFixed(8));

						}else if(keys == "buy" && vdata){
							sum = Number.parseFloat(vdata.amount * vdata.prices) + Number.parseFloat(sum);
							$("."+keys+"-task #sdata-"+index+" td:eq(0)").text(vdata.prices);
							$("."+keys+"-task #sdata-"+index+" td:eq(1)").text(vdata.amount);
							$("."+keys+"-task #sdata-"+index+" td:eq(2)").text(sum.toFixed(8));
						}
						if(keys == "history"  && vdata){

							sum = Number.parseFloat(vdata.amount * vdata.prices) + Number.parseFloat(sum);
							$("."+keys+"-task #sdata-"+index+" td:eq(0)").text(vdata.prices);
							$("."+keys+"-task #sdata-"+index+" td:eq(1)").text(vdata.amount);
							$("."+keys+"-task #sdata-"+index+" td:eq(2)").text(sum.toFixed(8));
							
							if(vdata.trade_type == "buy"){
								$(".history-task #sdata-"+index).removeClass("red");
								$(".history-task #sdata-"+index).addClass("green");
							}else{
								$(".history-task #sdata-"+index).removeClass("green");
								$(".history-task #sdata-"+index).addClass("red");
							}

						}
						
					});
				});

				$("#lastprices").html(data.sumary.lastprice);
				$("#change24").html(data.sumary.change);
				$("#high24").html(data.sumary.high);
				$("#low24").html(data.sumary.low);
				$("#volume24").html(data.sumary.volume);
				$("#volume24btc").html(data.sumary.volumebtc);
				
				$("#coind_<?php echo $base;?><?php echo $pair;?> td:eq(2)").html(data.sumary.lastprice);
				$("#coind_<?php echo $base;?><?php echo $pair;?> td:eq(3)").html(data.sumary.volume);

				$(".sell-task tr").on("click", function(){
					var prices = $("td:eq(0)",this).text();
					var amount = $("td:eq(1)",this).text();
					$("#formBuyLimit [name='prices']").val(prices);
					$("#formBuyLimit [name='amount']").val(amount);
				});

				$(".buy-task tr").on("click", function(){
					var prices = $("td:eq(0)",this).text();
					var amount = $("td:eq(1)",this).text();
					$("#formSellLimit [name='prices']").val(prices);
					$("#formSellLimit [name='amount']").val(amount);
				});

			});

		}



/**
 * This demo uses direct URL to Poloniex exchance, which means that depending on your browser settings,
 * it may not work dure to CORS restrictions.
 * Please consult Poloniex API for further information:
 * https://poloniex.com/support/api/
 */

var chart = AmCharts.makeChart("depthchart", {
  "type": "serial",
  "theme": "light",
  "dataLoader": {
    "url": "https://poloniex.com/public?command=returnOrderBook&currencyPair=BTC_ETH&depth=50",
    "format": "json",
    "reload": 30,
    "postProcess": function(data) {
      
      // Function to process (sort and calculate cummulative volume)
      function processData(list, type, desc) {
        
        // Convert to data points
        for(var i = 0; i < list.length; i++) {
          list[i] = {
            value: Number(list[i][0]),
            volume: Number(list[i][1]),
          }
        }
       
        // Sort list just in case
        list.sort(function(a, b) {
          if (a.value > b.value) {
            return 1;
          }
          else if (a.value < b.value) {
            return -1;
          }
          else {
            return 0;
          }
        });
        
        // Calculate cummulative volume
        if (desc) {
          for(var i = list.length - 1; i >= 0; i--) {
            if (i < (list.length - 1)) {
              list[i].totalvolume = list[i+1].totalvolume + list[i].volume;
            }
            else {
              list[i].totalvolume = list[i].volume;
            }
            var dp = {};
            dp["value"] = list[i].value;
            dp[type + "volume"] = list[i].volume;
            dp[type + "totalvolume"] = list[i].totalvolume;
            res.unshift(dp);
          }
        }
        else {
          for(var i = 0; i < list.length; i++) {
            if (i > 0) {
              list[i].totalvolume = list[i-1].totalvolume + list[i].volume;
            }
            else {
              list[i].totalvolume = list[i].volume;
            }
            var dp = {};
            dp["value"] = list[i].value;
            dp[type + "volume"] = list[i].volume;
            dp[type + "totalvolume"] = list[i].totalvolume;
            res.push(dp);
          }
        }
       
      }
      
      // Init
      var res = [];
      processData(data.bids, "bids", true);
      processData(data.asks, "asks", false);
      
      //console.log(res);
      return res;
    }
  },
  "graphs": [{
    "id": "bids",
    "fillAlphas": 0.1,
    "lineAlpha": 1,
    "lineThickness": 2,
    "lineColor": "#0f0",
    "type": "step",
    "valueField": "bidstotalvolume",
    "balloonFunction": balloon
  }, {
    "id": "asks",
    "fillAlphas": 0.1,
    "lineAlpha": 1,
    "lineThickness": 2,
    "lineColor": "#f00",
    "type": "step",
    "valueField": "askstotalvolume",
    "balloonFunction": balloon
  }, {
    "lineAlpha": 0,
    "fillAlphas": 0.2,
    "lineColor": "#000",
    "type": "column",
    "clustered": false,
    "valueField": "bidsvolume",
    "showBalloon": false
  }, {
    "lineAlpha": 0,
    "fillAlphas": 0.2,
    "lineColor": "#000",
    "type": "column",
    "clustered": false,
    "valueField": "asksvolume",
    "showBalloon": false
  }],
  "categoryField": "value",
  "chartCursor": {},
  "balloon": {
    "textAlign": "left"
  },
  "valueAxes": [{
    "title": "Volume"
  }],
  "categoryAxis": {
    "title": "Price (BTC/ETH)",
    "minHorizontalGap": 100,
    "startOnAxis": true,
    "showFirstLabel": false,
    "showLastLabel": false
  },
  "export": {
    "enabled": true
  }
});

function balloon(item, graph) {
  var txt;
  if (graph.id == "asks") {
    txt = "Ask: <strong>" + formatNumber(item.dataContext.value, graph.chart, 4) + "</strong><br />"
      + "Total volume: <strong>" + formatNumber(item.dataContext.askstotalvolume, graph.chart, 4) + "</strong><br />"
      + "Volume: <strong>" + formatNumber(item.dataContext.asksvolume, graph.chart, 4) + "</strong>";
  }
  else {
    txt = "Bid: <strong>" + formatNumber(item.dataContext.value, graph.chart, 4) + "</strong><br />"
      + "Total volume: <strong>" + formatNumber(item.dataContext.bidstotalvolume, graph.chart, 4) + "</strong><br />"
      + "Volume: <strong>" + formatNumber(item.dataContext.bidsvolume, graph.chart, 4) + "</strong>";
  }
  return txt;
}

function formatNumber(val, chart, precision) {
  return AmCharts.formatNumber(
    val, 
    {
      precision: precision ? precision : chart.precision, 
      decimalSeparator: chart.decimalSeparator,
      thousandsSeparator: chart.thousandsSeparator
    }
  );
}







var chart = AmCharts.makeChart( "main_chart2", {
  "type": "stock",
"theme": "light",

  //"color": "#fff",
  "dataSets": [ {
    "title": "MSFT",
    "fieldMappings": [ {
      "fromField": "Open",
      "toField": "open"
    }, {
      "fromField": "High",
      "toField": "high"
    }, {
      "fromField": "Low",
      "toField": "low"
    }, {
      "fromField": "Close",
      "toField": "close"
    }, {
      "fromField": "Volume",
      "toField": "volume"
    } ],
    "compared": false,
    "categoryField": "Date",

    /**
     * data loader for data set data
     */
    "dataLoader": {
      "url": "https://www.amcharts.com/wp-content/uploads/assets/stock/MSFT.csv",
      "format": "csv",
      "showCurtain": true,
      "showErrors": true,
      "async": true,
      "reverse": true,
      "delimiter": ",",
      "useColumnNames": true
    },

   

  }, {
    "title": "TXN",
    "fieldMappings": [ {
      "fromField": "Open",
      "toField": "open"
    }, {
      "fromField": "High",
      "toField": "high"
    }, {
      "fromField": "Low",
      "toField": "low"
    }, {
      "fromField": "Close",
      "toField": "close"
    }, {
      "fromField": "Volume",
      "toField": "volume"
    } ],
    "compared": true,
    "categoryField": "Date",
    "dataLoader": {
      "url": "https://www.amcharts.com/wp-content/uploads/assets/stock/TXN.csv",
      "format": "csv",
      "showCurtain": true,
      "showErrors": true,
      "async": true,
      "reverse": true,
      "delimiter": ",",
      "useColumnNames": true
    }
  } ],
  "dataDateFormat": "YYYY-MM-DD",

  "panels": [ {
      "title": "Value",
      "percentHeight": 70,

      "stockGraphs": [ {
        "type": "candlestick",
        "id": "g1",
        "openField": "open",
        "closeField": "close",
        "highField": "high",
        "lowField": "low",
        "valueField": "close",
        "lineColor": "#fff",
        "fillColors": "#fff",
        "negativeLineColor": "#db4c3c",
        "negativeFillColors": "#db4c3c",
        "fillAlphas": 1,
        "comparedGraphLineThickness": 2,
        "columnWidth": 0.7,
        "useDataSetColors": false,
        "comparable": true,
        "compareField": "close",
        "showBalloon": false,
        "proCandlesticks": true
      } ],

      "stockLegend": {
        "valueTextRegular": undefined,
        "periodValueTextComparing": "[[percents.value.close]]%"
      }

    },

    {
      "title": "Volume",
      "percentHeight": 30,
      "marginTop": 1,
      "columnWidth": 0.6,
      "showCategoryAxis": false,

      "stockGraphs": [ {
        "valueField": "volume",
        "openField": "open",
        "type": "column",
        "showBalloon": false,
        "fillAlphas": 1,
        "lineColor": "#fff",
        "fillColors": "#fff",
        "negativeLineColor": "#db4c3c",
        "negativeFillColors": "#db4c3c",
        "useDataSetColors": false
      } ],

      "stockLegend": {
        "markerType": "none",
        "markerSize": 0,
        "labelText": "",
        "periodValueTextRegular": "[[value.close]]"
      },

      "valueAxes": [ {
        "usePrefixes": true
      } ]
    }
  ],

  "panelsSettings": {
    //    "color": "#fff",
    "plotAreaFillColors": "#333",
    "plotAreaFillAlphas": 1,
    "marginLeft": 60,
    "marginTop": 5,
    "marginBottom": 5
  },

  "chartScrollbarSettings": {
    "graph": "g1",
    "graphType": "line",
    "usePeriod": "WW",
    "backgroundColor": "#333",
    "graphFillColor": "#666",
    "graphFillAlpha": 0.5,
    "gridColor": "#555",
    "gridAlpha": 1,
    "selectedBackgroundColor": "#444",
    "selectedGraphFillAlpha": 1
  },

  "categoryAxesSettings": {
    "equalSpacing": true,
    "gridColor": "#555",
    "gridAlpha": 1
  },

  "valueAxesSettings": {
    "gridColor": "#555",
    "gridAlpha": 1,
    "inside": false,
    "showLastLabel": true
  },

  "chartCursorSettings": {
    "pan": true,
    "valueLineEnabled": true,
    "valueLineBalloonEnabled": true
  },

  "legendSettings": {
    //"color": "#fff"
  },

  "stockEventsSettings": {
    "showAt": "high",
    "type": "pin"
  },

  "balloon": {
    "textAlign": "left",
    "offsetY": 10
  },

  "periodSelector": {
    "position": "top",
    "periods": [ {
        "period": "DD",
        "count": 10,
        "label": "5m"
      }, {
        "period": "MM",
        "count": 1,
        "label": "15m"
      }, {
        "period": "MM",
        "count": 6,
        "label": "30m"
      }, {
        "period": "YYYY",
        "count": 1,
        "label": "1h"
      }, {
        "period": "YYYY",
        "count": 2,
        "selected": true,
        "label": "4h"
      },
      /* {
           "period": "YTD",
           "label": "YTD"
         },*/
      {
        "period": "MAX",
        "label": "MAX"
      }
    ]
  }
} );


</script>
<style type="text/css">
	a[title="JavaScript charts"]{
		display: none;
	}
</style>