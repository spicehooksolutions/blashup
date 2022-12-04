<script src="<?php echo base_url(); ?>assets/frontend/js/dashboard.js"></script>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
                <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="text-success font-weight-bold"><?php echo $totalcampaigns;?></h2>
                                <i class="mdi mdi-file-video mdi-18px text-dark"></i>
                            </div>
                        </div>
                        <canvas id="newClient"></canvas>
                        <div class="line-chart-row-title">TOTAL CAMPAIGNS</div>
                    </div>
                </div>
                <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="text-danger font-weight-bold"><?php echo $totalrunningcampaigns; ?></h2>
                                <i class="mdi mdi-file-video mdi-18px text-dark"></i>
                            </div>
                        </div>
                        <canvas id="allProducts"></canvas>
                        <div class="line-chart-row-title">RUNNING CAMPAIGNS</div>
                    </div>
                </div>
                <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="text-info font-weight-bold"><?php echo $totalfailedcampaigns; ?></h2>
                                <i class="mdi mdi-file-video mdi-18px text-dark"></i>
                            </div>
                        </div>
                        <canvas id="invoices"></canvas>
                        <div class="line-chart-row-title">FAILED CAMPAIGNS</div>
                    </div>
                </div>
                
            </div>
           
            <!-- <div class="row mt-4">
                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4 class="card-title">Sales Difference</h4>
                                    <canvas id="salesDifference"></canvas>
                                    <p class="mt-3 mb-4 mb-lg-0">Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit.
                                    </p>
                                </div>
                                <div class="col-lg-5">
                                    <h4 class="card-title">Best Sellers</h4>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <ul class="graphl-legend-rectangle">
                                                <li><span class="bg-danger"></span>Automotive</li>
                                                <li><span class="bg-warning"></span>Books</li>
                                                <li><span class="bg-info"></span>Software</li>
                                                <li><span class="bg-success"></span>Video games</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-8 grid-margin">
                                            <canvas id="bestSellers"></canvas>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-4 mb-lg-0">Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit.
                                    </p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="card-title">Social Media Statistics</h4>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="progress progress-lg grouped mb-2">
                                                <div class="progress-bar  bg-danger" role="progressbar"
                                                    style="width: 40%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 10%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 20%" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 30%" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <ul class="graphl-legend-rectangle">
                                                <li><span class="bg-danger"></span>Instagram (15%)</li>
                                                <li><span class="bg-warning"></span>Facebook (20%)</li>
                                                <li><span class="bg-info"></span>Website (25%)</li>
                                                <li><span class="bg-success"></span>Youtube (40%)</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="mb-0 mt-2">Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <div class="card congratulation-bg text-center">
                        <div class="card-body pb-0">
                            <img src="images/dashboard/face29.png" alt="">
                            <h2 class="mt-3 text-white mb-3 font-weight-bold">Congratulations
                                Johnson
                            </h2>
                            <p>You have done 57.6% more sales today.
                                Check your new badge in your profile.
                            </p>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-sm-12 flex-column d-flex stretch-card">
                    <div class="row">
                        <!-- <div class="col-lg-4 d-flex grid-margin stretch-card">
                            <div class="card bg-primary">
                                <div class="card-body text-white">
                                    <h3 class="font-weight-bold mb-3">18,39 (75GB)</h3>
                                    <div class="progress mb-3">
                                        <div class="progress-bar  bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="pb-0 mb-0">Bandwidth usage</p>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-6 d-flex grid-margin stretch-card">
                            <div class="card sale-diffrence-border">
                               
                                <div class="card-body">
                                    <h3 class="text-dark mb-2 font-weight-bold"><mark id="current_balance"
                                    class="bg-danger text-white"></mark> INR</h3>
                                    <h4 class="card-title mb-2">WALLET BALANCE</h4>
                                    <small class="text-muted"><?php echo date("F Y"); ?></small>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex grid-margin stretch-card">
                            <div class="card sale-visit-statistics-border">
                                <div class="card-body">
                                    <h2 class="text-dark mb-2 font-weight-bold"><?php echo $totalcampaignsale." INR"; ?></h2>
                                    <h4 class="card-title mb-2">TOTAL CAMPAIGN SALES</h4>
                                    <small class="text-muted"><?php echo date("F Y"); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                <div class="col-sm-8 grid-margin grid-margin-md-0 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Impression report</h4>
                                <h4 class="text-success font-weight-bold">Impression<span class="text-dark ms-3">163</span>
                                </h4>
                            </div>
                            <div id="support-tracker-legend" class="support-tracker-legend"></div>
                            <canvas id="supportTracker"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 flex-column d-flex stretch-card">
                    <div class="row flex-grow">
                        <!-- <div class="col-sm-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h3 class="font-weight-bold text-dark">Canada,Ontario</h3>
                                            <p class="text-dark">Monday 3.00 PM</p>
                                            <div class="d-lg-flex align-items-baseline mb-3">
                                                <h1 class="text-dark font-weight-bold">23<sup
                                                        class="font-weight-light"><small>o</small><small
                                                            class="font-weight-medium">c</small></sup></h1>
                                                <p class="text-muted ms-3">Partly cloudy</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="position-relative">
                                                <img src="images/dashboard/live.png" class="w-100" alt="">
                                                <div class="live-info badge badge-success">Live</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 mt-4 mt-lg-0">
                                            <div class="bg-primary text-white px-4 py-4 card">
                                                <div class="row">
                                                    <div class="col-sm-6 pl-lg-5">
                                                        <h2>$1635</h2>
                                                        <p class="mb-0">Your Iincome</p>
                                                    </div>
                                                    <div class="col-sm-6 climate-info-border mt-lg-0 mt-2">
                                                        <h2>$2650</h2>
                                                        <p class="mb-0">Your Spending</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt-3 mt-md-1">
                                        <div class="col">
                                            <div class="d-flex purchase-detail-legend align-items-center">
                                                <div id="circleProgress1" class="p-2"></div>
                                                <div>
                                                    <p class="font-weight-medium text-dark text-small">Sessions</p>
                                                    <h3 class="font-weight-bold text-dark  mb-0">26.80%</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex purchase-detail-legend align-items-center">
                                                <div id="circleProgress2" class="p-2"></div>
                                                <div>
                                                    <p class="font-weight-medium text-dark text-small">Users</p>
                                                    <h3 class="font-weight-bold text-dark  mb-0">56.80%</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-sm-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h4 class="card-title mb-0">Visits Today</h4>
                                                <div class="dropdown">
                                                    <a href="#" class="text-success btn btn-link  px-1"><i
                                                            class="mdi mdi-refresh"></i></a>
                                                    <a href="#"
                                                        class="text-success btn btn-link px-1 dropdown-toggle dropdown-arrow-none"
                                                        data-bs-toggle="dropdown" id="profileDropdownvisittoday"><i
                                                            class="mdi mdi-dots-horizontal"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                        aria-labelledby="profileDropdownvisittoday">
                                                        <a class="dropdown-item">
                                                            <i class="mdi mdi-grease-pencil text-primary"></i>
                                                            Edit
                                                        </a>
                                                        <a class="dropdown-item">
                                                            <i class="mdi mdi-delete text-primary"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-1">Calculated in last 30 days</p>
                                            <div class="d-lg-flex align-items-center justify-content-between">
                                                <h1 class="font-weight-bold text-dark">4332</h1>
                                                <div class="mb-3">
                                                    <button type="button"
                                                        class="btn btn-outline-light text-dark font-weight-normal">Day</button>
                                                    <button type="button"
                                                        class="btn btn-outline-light text-dark font-weight-normal">Month</button>
                                                </div>
                                            </div>
                                            <canvas id="visitorsToday"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- <div class="row">
                        <div class="col-sm-12 grid-margin d-flex stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="card-title mb-2">Sales Difference</h4>
                                        <div class="dropdown">
                                            <a href="#" class="text-success btn btn-link  px-1"><i
                                                    class="mdi mdi-refresh"></i></a>
                                            <a href="#"
                                                class="text-success btn btn-link px-1 dropdown-toggle dropdown-arrow-none"
                                                data-bs-toggle="dropdown" id="settingsDropdownsales">
                                                <i class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                aria-labelledby="settingsDropdownsales">
                                                <a class="dropdown-item">
                                                    <i class="mdi mdi-grease-pencil text-primary"></i>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item">
                                                    <i class="mdi mdi-delete text-primary"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <ul class="nav nav-tabs tab-no-active-fill" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active ps-2 pe-2" id="revenue-for-last-month-tab"
                                                    data-bs-toggle="tab" href="#revenue-for-last-month" role="tab"
                                                    aria-controls="revenue-for-last-month" aria-selected="true">Revenue
                                                    for last month</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link ps-2 pe-2" id="server-loading-tab"
                                                    data-bs-toggle="tab" href="#server-loading" role="tab"
                                                    aria-controls="server-loading" aria-selected="false">Server
                                                    loading</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link ps-2 pe-2" id="data-managed-tab" data-bs-toggle="tab"
                                                    href="#data-managed" role="tab" aria-controls="data-managed"
                                                    aria-selected="false">Data managed</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link ps-2 pe-2" id="sales-by-traffic-tab"
                                                    data-bs-toggle="tab" href="#sales-by-traffic" role="tab"
                                                    aria-controls="sales-by-traffic" aria-selected="false">Sales by
                                                    traffic</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content tab-no-active-fill-tab-content">
                                            <div class="tab-pane fade show active" id="revenue-for-last-month"
                                                role="tabpanel" aria-labelledby="revenue-for-last-month-tab">
                                                <div class="d-lg-flex justify-content-between">
                                                    <p class="mb-4">+5.2% vs last 7 days</p>
                                                    <div id="revenuechart-legend" class="revenuechart-legend">f</div>
                                                </div>
                                                <canvas id="revenue-for-last-month-chart"></canvas>
                                            </div>
                                            <div class="tab-pane fade" id="server-loading" role="tabpanel"
                                                aria-labelledby="server-loading-tab">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-4">+5.2% vs last 7 days</p>
                                                    <div id="serveLoading-legend" class="revenuechart-legend">f</div>
                                                </div>
                                                <canvas id="serveLoading"></canvas>
                                            </div>
                                            <div class="tab-pane fade" id="data-managed" role="tabpanel"
                                                aria-labelledby="data-managed-tab">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-4">+5.2% vs last 7 days</p>
                                                    <div id="dataManaged-legend" class="revenuechart-legend">f</div>
                                                </div>
                                                <canvas id="dataManaged"></canvas>
                                            </div>
                                            <div class="tab-pane fade" id="sales-by-traffic" role="tabpanel"
                                                aria-labelledby="sales-by-traffic-tab">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-4">+5.2% vs last 7 days</p>
                                                    <div id="salesTrafic-legend" class="revenuechart-legend">f</div>
                                                </div>
                                                <canvas id="salesTrafic"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                
            </div>
           
            
                <!-- <div class="col-sm-6 grid-margin grid-margin-md-0 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-lg-flex align-items-center justify-content-between mb-4">
                                <h4 class="card-title">Product Orders</h4>
                                <p class="text-dark">+5.2% vs last 7 days</p>
                            </div>
                            <div class="product-order-wrap padding-reduced">
                                <div id="productorder-gage" class="gauge productorder-gage"></div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- content-wrapper ends -->
        
    </div>
    <!-- main-panel ends -->
</div>
<script>
jQuery(document).ready(function() {

    $.ajax({
        url: '<?php echo base_url('users/wallet'); ?>',
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function(data) {
            jQuery('#current_balance').html(data);
        }
    });

    var newClientData = {
			labels: [<?php for ($i = 1; $i <=6; $i++) {
  echo '"'.date('F', strtotime("-$i month")).'",';
} ?>],
			datasets: [{
				label: 'TOTAL CAMPAIGNS',
				data: [<?php echo $sixmonthscampaogns;?>],
				backgroundColor: [
						'#f7f7f7',
				],
				borderColor: [
						'#dcdcdc'
				],
				borderWidth: 2,
				fill: true,
			},],
		};
		var newClientOptions = {
			scales: {
				yAxes: [{
					display: false,
				}],
				xAxes: [{
					display: false,
				}],
			},
			legend: {
				display: false,
			},
			elements: {
				point: {
					radius: 0
				},		
			},
			plugins: {
				datalabels: {
					display: false,
					align: 'center',
					anchor: 'center'
				}
			}				
		};
		if ($("#newClient").length) {
			var lineChartCanvas = $("#newClient").get(0).getContext("2d");
			var saleschart = new Chart(lineChartCanvas, {
				type: 'line',
				data: newClientData,
				options: newClientOptions
			});
		}



        var allProductsData = {
			labels: [<?php for ($i = 1; $i <=6; $i++) {
  echo '"'.date('F', strtotime("-$i month")).'",';
} ?>],
			datasets: [{
				label: 'RUNNING CAMPAIGNS',
				data: [<?php echo $sixmonthsrunnings;?>],
				backgroundColor: [
						'#f7f7f7',
				],
				borderColor: [
						'#dcdcdc'
				],
				borderWidth: 2,
				fill: true,
			}, ],
		};
		var allProductsOptions = {
			scales: {
				yAxes: [{
					display: false,
				}],
				xAxes: [{
					display: false,
				}],
			},
			legend: {
				display: false,
			},
			elements: {
				point: {
					radius: 0
				},
			},
			plugins: {
				datalabels: {
					display: false,
					align: 'center',
					anchor: 'center'
				}
			}				
	
		};
		if ($("#allProducts").length) {
			var lineChartCanvas = $("#allProducts").get(0).getContext("2d");
			var saleschart = new Chart(lineChartCanvas, {
				type: 'line',
				data: allProductsData,
				options: allProductsOptions
			});
		}


        var invoicesData = {
			labels: [<?php for ($i = 1; $i <=6; $i++) {
  echo '"'.date('F', strtotime("-$i month")).'",';
} ?>],
			datasets: [{
				label: 'FAILED CAMPAIGNS',
				data: [<?php echo $sixmonthsfailed;?>],
				backgroundColor: [
						'#f7f7f7',
				],
				borderColor: [
						'#dcdcdc'
				],
				borderWidth: 2,
				fill: true,
			}, ],
		};
		var invoicesOptions = {
			scales: {
				yAxes: [{
					display: false,
				}],
				xAxes: [{
					display: false,
				}],
			},
			legend: {
				display: false,
			},
			elements: {
					point: {
						radius: 0
					},
			},
			plugins: {
				datalabels: {
					display: false,
					align: 'center',
					anchor: 'center'
				}
			}				
	
		};
		if ($("#invoices").length) {
			var lineChartCanvas = $("#invoices").get(0).getContext("2d");
			var saleschart = new Chart(lineChartCanvas, {
				type: 'line',
				data: invoicesData,
				options: invoicesOptions
			});
		}

});
</script>