<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid'] == 0)) {
	header('location:logout.php');
} else {



?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PiggySave - Dashboard</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/datepicker3.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">

		<!--Custom Font-->
		<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&family=Roboto+Slab&display=swap" rel="stylesheet">	<script src="js/respond.min.js"></script>
	<![endif]-->
	</head>

	<body>

		<?php include_once('includes/header.php'); ?>
		<?php include_once('includes/sidebar.php'); ?>

		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="#">
							<em class="fa fa-home"></em>
						</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</div>
			<!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Dashboard</h1>
				</div>
			</div>
			<!--/.row-->




			<div class="row">
				<div class="col-xs-6 col-md-3">

					<div class="panel panel-default">
						<div class="panel-body easypiechart-panel">
							<?php
							//Today Expense
							$userid = $_SESSION['detsuid'];
							$tdate = date('Y-m-d');
							$query = mysqli_query($con, "select sum(ExpenseCost)  as todaysexpense from tblexpense where (ExpenseDate)='$tdate' && (UserId='$userid');");
							$query7 = mysqli_query($con, "select sum(IncomeCost)  as todaysincome from tblincome where (IncomeDate)='$tdate' && (UserId='$userid');");

							$result = mysqli_fetch_array($query);
							$result7 = mysqli_fetch_array($query7);
							$sum_today_expense = $result['todaysexpense'];
							$sum_today_income = $result7['todaysincome'];

							?>

							<h4>Today's Expense</h4>
							<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_today_expense/$sum_today_income*100; ?>"><span class="percent"><?php if ($sum_today_expense == "") {
																																						echo "0";
																																					} else {
																																						echo $sum_today_expense;
																																					}

																																					?></span></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php


						//Yestreday Expense
						$userid = $_SESSION['detsuid'];
						$ydate = date('Y-m-d', strtotime("-1 days"));
						$query1 = mysqli_query($con, "select sum(ExpenseCost)  as yesterdayexpense from tblexpense where (ExpenseDate)='$ydate' && (UserId='$userid');");
						$query8= mysqli_query($con, "select sum(IncomeCost)  as yesterdayincome from tblincome where (IncomeDate)='$ydate' && (UserId='$userid');");

						$result1 = mysqli_fetch_array($query1);
						$result8 = mysqli_fetch_array($query8);

						$sum_yesterday_expense = $result1['yesterdayexpense'];
						$sum_yesterday_income = $result8['yesterdayincome'];

						?>
						<div class="panel-body easypiechart-panel">
							<h4>Yesterday's Expense</h4>
							<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $sum_yesterday_expense/$sum_yesterday_income*100; ?>"><span class="percent"><?php if ($sum_yesterday_expense == "") {
																																								echo "0";
																																							} else {
																																								echo $sum_yesterday_expense;
																																							}

																																							?></span></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
						//Weekly Expense
						$userid = $_SESSION['detsuid'];
						$pastdate =  date("Y-m-d", strtotime("-1 week"));
						$crrntdte = date("Y-m-d");
						$query2 = mysqli_query($con, "select sum(ExpenseCost)  as weeklyexpense from tblexpense where ((ExpenseDate) between '$pastdate' and '$crrntdte') && (UserId='$userid');");
						$query6 = mysqli_query($con, "select sum(IncomeCost)  as incomeAll from tblincome where ((IncomeDate) between '$pastdate' and '$crrntdte') && (UserId='$userid');");
						$result2 = mysqli_fetch_array($query2);
						$result6 = mysqli_fetch_array($query6);
						$sum_weekly_expense = $result2['weeklyexpense'];
						$sum_weekly_income = $result6['incomeAll'];
						
						?>
						<div class="panel-body easypiechart-panel">
							<h4>Last 7 day's Expense</h4>
							<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_weekly_expense/$sum_weekly_income*100; ?>"><span class="percent"><?php if ($sum_weekly_expense == "") {
																																						echo "0";
																																					} else {
																																						echo $sum_weekly_expense;
																																					}

																																					?></span></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
						//this month expense
						$userid = $_SESSION['detsuid'];
						$monthdate =  date("Y-m-d", strtotime("-1 month"));
						$crrntdte = date("Y-m-d");
						$query3 = mysqli_query($con, "select sum(ExpenseCost)  as monthlyexpense from tblexpense where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
						$query9 = mysqli_query($con, "select sum(IncomeCost)  as monthlyIncome from tblincome where ((IncomeDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");

						$result3 = mysqli_fetch_array($query3);
						$result9 = mysqli_fetch_array($query9);



						$sum_monthly_expense = $result3['monthlyexpense'];
						$sum_monthly_income = $result9['monthlyIncome'];
																																		

						?>
						<div class="panel-body easypiechart-panel">
							<h4>This Month Expenses</h4>
							<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_monthly_expense/$sum_monthly_income*100; ?>"><span class="percent"><?php if ($sum_monthly_expense == "") {
																																						echo "0";
																																					} else {
																																						echo $sum_monthly_expense;
																																					}

																																					?></span></div>
						</div>
					</div>
				</div>

			</div>

																																			
		<!--/.row 2 -->
		<div class="row">
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
						//Today Income
						$userid = $_SESSION['detsuid'];
						$cyear = date("Y");
						$tdate = date('Y-m-d');
						
						
						?>
						<div class="panel-body easypiechart-panel">
							<h4>Today's Income</h4>
							<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_today_income; ?>"><span class="percent"><?php if ($sum_today_income == "") {
																																						echo "0";
																																					} else {
																																						echo $sum_today_income;
																																					}

																																					?></span></div>


						</div>

					</div>

				</div>

				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
						//Yesterday Income
						$userid = $_SESSION['detsuid'];
						$query5 = mysqli_query($con, "select sum(ExpenseCost)  as totalexpense from tblexpense where UserId='$userid';");
						$result5 = mysqli_fetch_array($query5);
						$sum_total_expense = $result5['totalexpense'];
						?>
						<div class="panel-body easypiechart-panel">
							<h4>Yesterday's Income</h4>
							<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $sum_yesterday_income; ?>"><span class="percent"><?php if ($sum_yesterday_income == "") {
																																						echo "0";
																																					} else {
																																						echo $sum_yesterday_income;
																																					}

																																					?></span></div>


						</div>

					</div>

				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
						//last 7 day's Income
						$userid = $_SESSION['detsuid'];
						$cyear = date("Y");
						$query10 = mysqli_query($con, "select sum(IncomeCost)  as yearlyincome from tblincome where (year(IncomeDate)='$cyear') && (UserId='$userid');");
						$result10 = mysqli_fetch_array($query10);
						$sum_yearly_income = $result10['yearlyincome'];
						?>
						<div class="panel-body easypiechart-panel">
							<h4>Last 7 day's Income</h4>
							<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_weekly_income; ?>"><span class="percent"><?php if ($sum_weekly_income == "") {
																																						echo "0";
																																					} else {
																																						echo $sum_weekly_income;
																																					}

																																					?></span></div>


						</div>

					</div>

				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-orange">
						<?php
						//
						$userid = $_SESSION['detsuid'];
						$cyear = date("Y");
						
						$query11 = mysqli_query($con, "select sum(IncomeCost)  as totalincome from tblincome where UserId='$userid';");
						$result11 = mysqli_fetch_array($query11);
						$sum_total_income = $result11['totalincome'];
						$moneyleft = $sum_total_income-$sum_total_expense;
						?>
						<div class="panel-body easypiechart-panel">
							<h4 style="color:white">Total money exist</h4>
							<div class="easypiechart" id="easypiechart-default" data-percent="<?php echo $moneyleft; ?>"><span class="percent"><?php if ($moneyleft == "") {
																																						echo "0";
																																					} else {
																																						echo $moneyleft;
																																					}

																																					?></span></div>


						</div>

					</div>

				</div>

				


			</div>

			<!--/.row-->
			
			<!--/.row 3-->
			<div class="row">
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default" > 
						<?php
						//Yearly Expense
						$userid = $_SESSION['detsuid'];
						$cyear = date("Y");
						$query4 = mysqli_query($con, "select sum(ExpenseCost)  as yearlyexpense from tblexpense where (year(ExpenseDate)='$cyear') && (UserId='$userid');");
						$result4 = mysqli_fetch_array($query4);
						$sum_yearly_expense = $result4['yearlyexpense'];
						?>
						<div class="panel-body easypiechart-panel" >
							
							<h4>Current Year Expenses</h4>
							<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_yearly_expense; ?>"><span class="percent"><?php if ($sum_yearly_expense == "") {
																																						echo "0";
																																					} else {
																																						echo $sum_yearly_expense;
																																					}

																																					?></span></div>


						</div>

					</div>

				</div>

				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
						//Total Expense
						$userid = $_SESSION['detsuid'];
						$query5 = mysqli_query($con, "select sum(ExpenseCost)  as totalexpense from tblexpense where UserId='$userid';");
						$result5 = mysqli_fetch_array($query5);
						$sum_total_expense = $result5['totalexpense'];
						?>
						<div class="panel-body easypiechart-panel">
							<h4>Total Expenses</h4>
							<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_total_expense; ?>"><span class="percent"><?php if ($sum_total_expense == "") {
																																						echo "0";
																																					} else {
																																						echo $sum_total_expense;
																																					}

																																					?></span></div>


						</div>

					</div>

				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
						//Yearly Income
						$userid = $_SESSION['detsuid'];
						$cyear = date("Y");
						$query10 = mysqli_query($con, "select sum(IncomeCost)  as yearlyincome from tblincome where (year(IncomeDate)='$cyear') && (UserId='$userid');");
						$result10 = mysqli_fetch_array($query10);
						$sum_yearly_income = $result10['yearlyincome'];
						?>
						<div class="panel-body easypiechart-panel">
							<h4>Current Year Income</h4>
							<div class="easypiechart" id="easypiechart-default" data-percent="<?php echo $sum_yearly_income; ?>"><span class="percent"><?php if ($sum_yearly_income == "") {
																																						echo "0";
																																					} else {
																																						echo $sum_yearly_income;
																																					}

																																					?></span></div>


						</div>

					</div>

				</div>

				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
						//Total Income
						$userid = $_SESSION['detsuid'];
						
						?>
						<div class="panel-body easypiechart-panel">
							<h4>Total Income</h4>
							<div class="easypiechart" id="easypiechart-default" data-percent="<?php echo $sum_total_income; ?>"><span class="percent"><?php if ($sum_total_income == "") {
																																						echo "0";
																																					} else {
																																						echo $sum_total_income;
																																					}

																																					?></span></div>


						</div>

					</div>

				</div>


			</div>

			<!--/.row-->
		</div>
		<!--/.main-->
		<?php include_once('includes/footer.php'); ?>
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/chart.min.js"></script>
		<script src="js/chart-data.js"></script>
		<script src="js/easypiechart.js"></script>
		<script src="js/easypiechart-data.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/custom.js"></script>
		<script>
			window.onload = function() {
				var chart1 = document.getElementById("line-chart").getContext("2d");
				window.myLine = new Chart(chart1).Line(lineChartData, {
					responsive: true,
					scaleLineColor: "rgba(0,0,0,.2)",
					scaleGridLineColor: "rgba(0,0,0,.05)",
					scaleFontColor: "#c5c7cc"
				});
			};
		</script>

	</body>

	</html>
<?php } ?>