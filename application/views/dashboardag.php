<?php include_once('header.php');?>
			

<span  class="col-lg-12 float-left text-right user-info p-3 bg-primary" style="color: #FFF;">
		<?php
			$checkuservars = $this->session->userdata; echo isset($checkuservars['useremail']) ? 'Wecome, '.$checkuservars['useremail'] : '';   
		?>
</span>	
<section class="w-100 float-left wrap-signup pt-3 pb-5">
	<div class="col-lg-12">
		<div class="w-100 float-left agent-dashboard">

			<div class="w-100 float-left mb-5">
			<div class="col-lg-4 col-md-12 col-12 float-left wrap-tot-wall-amount">
				<div class="w-100 float-left wrap-inner-amount">
				<h5>Total Points Available</h5>
				<h2><!-- <i class="fas fa-rupee-sign"></i> --> 500</h2>
				</div>
				</div>
				
				<div class="col-lg-8 col-md-12 col-12 float-left wrap-transaction-graph mt-4">
				<div class="w-100 float-left wrap-inner-graph">
				<h4>Transactions</h4>
				<div id="chartdiv" class="agent-trans-chart mt-4"></div>
				</div>
				</div>
			</div>
			
				
				<div class="col-lg-6 col-md-12 col-12 float-left last-five-orders">
					<h4>Last 5 Order</h4>
				<div class="w-100 float-left lastfive-inner-orders dataTables_wrapper">
				<table class="table table-striped dataTable no-footer">
						<thead>
							<tr>
								<th>Name</th>
								<th>phone</th>
								<th>Name</th>
								<th>phone</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>AAAA</td>
								<td>323232</td>
								<td>BBBBB</td>
								<td>323232</td>
							</tr>
							<tr>
								<td>CCCCC</td>
								<td>3435656</td>
								<td>BBBBB</td>
								<td>323232</td>
							</tr>
							<tr>
								<td>BBBBB</td>
								<td>323232</td>
								<td>BBBBB</td>
								<td>323232</td>
							</tr>
							<tr>
								<td>CCCCC</td>
								<td>3435656</td>
								<td>BBBBB</td>
								<td>323232</td>
							</tr>
							<tr>
								<td>CCCCC</td>
								<td>3435656</td>
								<td>BBBBB</td>
								<td>323232</td>
							</tr>
							
						</tbody>
					</table>
				   <a href="<?php echo base_url('orderag/');?>" class="morebut-dash register-button-form float-left mt-1">See All</a>
				</div>
				</div>
				
				<div class="col-lg-6 col-md-12 col-12 float-left last-five-orders">
						<h4>Last 5 Transactions</h4>
					<div class="w-100 float-left lastfive-inner-orders dataTables_wrapper">
					<table class="table table-striped dataTable no-footer">
							<thead>
								<tr>
									<th>Name</th>
									<th>phone</th>
									<th>Name</th>
									<th>phone</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>AAAA</td>
									<td>323232</td>
									<td>BBBBB</td>
									<td>323232</td>
								</tr>
								<tr>
									<td>CCCCC</td>
									<td>3435656</td>
									<td>BBBBB</td>
									<td>323232</td>
								</tr>
								<tr>
									<td>BBBBB</td>
									<td>323232</td>
									<td>BBBBB</td>
									<td>323232</td>
								</tr>
								<tr>
									<td>CCCCC</td>
									<td>3435656</td>
									<td>BBBBB</td>
									<td>323232</td>
								</tr>
								<tr>
									<td>CCCCC</td>
									<td>3435656</td>
									<td>BBBBB</td>
									<td>323232</td>
								</tr>
								
							</tbody>
						</table>
					   <a href="<?php echo base_url('trnscag/');?>" class="morebut-dash register-button-form float-left mt-1">See All</a>
					</div>
					</div>

		</div>
	</div>
</section>

<?php include_once('footer.php');?>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
		<script src="https://www.amcharts.com/lib/4/charts.js"></script>
		<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
		
		<!-- Chart code -->
		<script>
		am4core.ready(function() {
		
		// Themes begin
		am4core.useTheme(am4themes_animated);
		// Themes end
		
		var chart = am4core.create("chartdiv", am4charts.XYChart);
		
		var data = [];
		
		chart.data = [{
		  "year": "2014",
		  "income": 23.5,
		  "expenses": 21.1,
		  "lineColor": chart.colors.next()
		}, {
		  "year": "2015",
		  "income": 26.2,
		  "expenses": 30.5
		}, {
		  "year": "2016",
		  "income": 30.1,
		  "expenses": 34.9
		}, {
		  "year": "2017",
		  "income": 20.5,
		  "expenses": 23.1
		}, {
		  "year": "2018",
		  "income": 30.6,
		  "expenses": 28.2,
		  "lineColor": chart.colors.next()
		}, {
		  "year": "2019",
		  "income": 34.1,
		  "expenses": 31.9
		}, {
		  "year": "2020",
		  "income": 34.1,
		  "expenses": 31.9
		}, {
		  "year": "2021",
		  "income": 34.1,
		  "expenses": 31.9,
		  "lineColor": chart.colors.next()
		}, {
		  "year": "2022",
		  "income": 34.1,
		  "expenses": 31.9
		}, {
		  "year": "2023",
		  "income": 34.1,
		  "expenses": 31.9
		}, {
		  "year": "2024",
		  "income": 34.1,
		  "expenses": 31.9
		}];
		
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.ticks.template.disabled = true;
		categoryAxis.renderer.line.opacity = 0;
		categoryAxis.renderer.grid.template.disabled = true;
		categoryAxis.renderer.minGridDistance = 40;
		categoryAxis.dataFields.category = "year";
		categoryAxis.startLocation = 0.4;
		categoryAxis.endLocation = 0.6;
		
		
		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.tooltip.disabled = true;
		valueAxis.renderer.line.opacity = 0;
		valueAxis.renderer.ticks.template.disabled = true;
		valueAxis.min = 0;
		
		var lineSeries = chart.series.push(new am4charts.LineSeries());
		lineSeries.dataFields.categoryX = "year";
		lineSeries.dataFields.valueY = "income";
		lineSeries.tooltipText = "income: {valueY.value}";
		lineSeries.fillOpacity = 0.5;
		lineSeries.strokeWidth = 3;
		lineSeries.propertyFields.stroke = "lineColor";
		lineSeries.propertyFields.fill = "lineColor";
		
		var bullet = lineSeries.bullets.push(new am4charts.CircleBullet());
		bullet.circle.radius = 6;
		bullet.circle.fill = am4core.color("#fff");
		bullet.circle.strokeWidth = 3;
		
		chart.cursor = new am4charts.XYCursor();
		chart.cursor.behavior = "panX";
		chart.cursor.lineX.opacity = 0;
		chart.cursor.lineY.opacity = 0;
		
		chart.scrollbarX = new am4core.Scrollbar();
		chart.scrollbarX.parent = chart.bottomAxesContainer;
		
		}); // end am4core.ready()
		</script>


			