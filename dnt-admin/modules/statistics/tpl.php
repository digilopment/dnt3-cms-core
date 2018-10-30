<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php";?>
<?php 
	$db 	= new Db;
	$rest 	= new Rest;
	$image 	= new Image;
	$logs 	= new DntLog;
	
	
	$andWhere = "AND `HTTP_COOKIE` <> 'IS_JOB=1'";
	
	$allAccess 		= $logs->getAllAccess($andWhere);
	$uniqueAccess 	= $logs->getUniqueAccess($andWhere);
	$osx 			= $logs->getCountOs($andWhere);
	$uniqueUsers 	= $logs->getUniqueUsers(false);
	$allUsers 		= $logs->getallUsers(false);
	
	
	$agentUniq = $logs->getCountOs("GROUP BY REMOTE_ADDR");
	$osArrUniq 		= $agentUniq['os'];
	$browserArrUniq = $agentUniq['browser'];
	
	$agent = $logs->getCountOs();
	$osArr 		= $agent['os'];
	$browserArr = $agent['browser'];
	
?>
<section class="content">
				<div class="row">&#65279;
					<!-- BEGIN WIDGET -->
					<div class="col-sm-12">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-6">
								<div class="grid widget bg-light-blue">
									<div class="grid-body">
										<span class="title">ZOBRAZENÍ</span>
										<span class="value"><?php echo $allAccess; ?></span>
										<span class="stat1 chart">&nbsp;</span>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6">
								<div class="grid widget bg-green">
									<div class="grid-body">
										<span class="title">NÁVŠTEV</span>
										<span class="value"><?php echo $uniqueAccess; ?></span>
										<span class="stat2 chart">&nbsp;</span>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6">
								<div class="grid widget bg-purple">
									<div class="grid-body">
										<span class="title">REGISTRÁCII</span>
										<span class="value"><?php echo $allUsers; ?></span>
										<span class="stat3 chart">&nbsp;</span>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6">
								<div class="grid widget bg-red">
									<div class="grid-body">
										<span class="title">JEDINEČNÝCH REGISTRÁCII</span>
										<span class="value"><?php echo $uniqueUsers; ?> </span>
										<span class="stat4 chart">&nbsp;</span>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<!-- END WIDGET -->
	
				<div class="row">
					
					<div class="col-md-6">
						<div class="grid work-progress no-border">
							<div class="grid-header">
								<span class="title"><b>Prístupy zo zariadení všetki</b><span class="pull-right"></span></span>
							</div>
							<div class="grid-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<tbody>
										
											<tr>
												<td>#</td>
												<td>Zariadenie</td>
												<td>Počet v %</td>
												<td>Počet prístupov</td>
												
												</tr>
											<?php
											
												$together = 0;
												foreach(array_count_values($osArr) as $os => $count){
													$together = $together + $count;
												}
												$i = 1;
												foreach(array_count_values($osArr) as $os => $count){
												?>
												<tr>
												<td><?php echo $i; ?></td>
												<td><i class="fa fa-repeat"></i> <?php echo $os; ?></td>
												<td>
													<span class="label label-primary">
														<?php echo round($count/$together*100, 2); ?>%
													</span></td>
												<td>
													<span class="label label-success">
														<?php echo $count; ?>
													</span></td>
												
												</tr>
												
												<?php
													
													$i++;
												}
												?>
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="grid work-progress no-border">
							<div class="grid-header">
								<span class="title"><b>Prístupy z prehliadačov všetki</b><span class="pull-right"></span></span>
							</div>
							<div class="grid-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<tbody>
										
										<tbody>
										
										<tr>
												<td>#</td>
												<td>Browser</td>
												<td>Počet v %</td>
												<td>Počet prístupov</td>
												
												</tr>
											<?php
											
												$together = 0;
												foreach(array_count_values($browserArr) as $browser => $count){
													$together = $together + $count;
												}
												$i = 1;
												foreach(array_count_values($browserArr) as $browser => $count){
												?>
												<tr>
												<td><?php echo $i; ?></td>
												<td><i class="fa fa-repeat"></i> <?php echo $browser; ?></td>
												<td>
													<span class="label label-primary">
														<?php echo round($count/$together*100, 2); ?>%
													</span></td>
												<td>
													<span class="label label-success">
														<?php echo $count; ?>
													</span></td>
												
												</tr>
												
												<?php
													
													$i++;
												}
												?>
											
											
										</tbody>
										
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- END STATS -->
				</div>
				
				
				
				<div class="row">
					
					<div class="col-md-6">
						<div class="grid work-progress no-border">
							<div class="grid-header">
								<span class="title"><b>Prístupy zo zariadení unikátne</b> <br/><small>Do štatistiky sa berú zariadenia pod jednou unikátnou IP. Ak je pod jednou unikátnou IP viac prístupov z roznych operačných systémov, potom sa berie do úvahy len prvý prístup z prvého operačného systému.</small><span class="pull-right"></span></span>
							</div>
							<div class="grid-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<tbody>
										
											<tr>
												<td>#</td>
												<td>Zariadenie</td>
												<td>Počet v %</td>
												<td>Počet prístupov</td>
												
												</tr>
											<?php
											
												$together = 0;
												foreach(array_count_values($osArrUniq) as $os => $count){
													$together = $together + $count;
												}
												$i = 1;
												foreach(array_count_values($osArrUniq) as $os => $count){
												?>
												<tr>
												<td><?php echo $i; ?></td>
												<td><i class="fa fa-repeat"></i> <?php echo $os; ?></td>
												<td>
													<span class="label label-primary">
														<?php echo round($count/$together*100, 2); ?>%
													</span></td>
												<td>
													<span class="label label-success">
														<?php echo $count; ?>
													</span></td>
												
												</tr>
												
												<?php
													
													$i++;
												}
												?>
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="grid work-progress no-border">
							<div class="grid-header">
								<span class="title"><b>Prístupy z prehliadačov unikátne</b><br/><small>Do štatistiky sa berú prehliadače pod unikátnou IP. Ak je pod jednou unikátnou IP viac prístupov z roznych prehliadačov, potom sa berie do úvahy len prvý prístup z prvého prehliadača.</small><span class="pull-right"></span></span>
							</div>
							<div class="grid-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<tbody>
										
										<tbody>
										
										<tr>
												<td>#</td>
												<td>Browser</td>
												<td>Počet v %</td>
												<td>Počet prístupov</td>
												
												</tr>
											<?php
											
												$together = 0;
												foreach(array_count_values($browserArrUniq) as $browser => $count){
													$together = $together + $count;
												}
												$i = 1;
												foreach(array_count_values($browserArrUniq) as $browser => $count){
												?>
												<tr>
												<td><?php echo $i; ?></td>
												<td><i class="fa fa-repeat"></i> <?php echo $browser; ?></td>
												<td>
													<span class="label label-primary">
														<?php echo round($count/$together*100, 2); ?>%
													</span></td>
												<td>
													<span class="label label-success">
														<?php echo $count; ?>
													</span></td>
												
												</tr>
												
												<?php
													
													$i++;
												}
												?>
											
											
										</tbody>
										
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- END STATS -->
				</div>
				
					<!-- END PROFILE -->
					<!-- BEGIN WORK PROGRESS -->


					<!-- END WORK PROGRESS -->
							</div>
		</section>
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>