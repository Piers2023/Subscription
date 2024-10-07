<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function isymd($date) {
	// input y m d  0 1 2 
	$date = trim(substr($date,0,10));
	
	
	$tempDate = explode('-', $date);
	// checkdate(month, day, year)
	$return = null;
	if (sizeof($tempDate) ==3)
	{  
		if (strlen($tempDate[0]) ==4)
		{
			$result =  checkdate($tempDate[1], $tempDate[2], $tempDate[0]);
			if ($result==1)
			{
				
				return  $date;
			}
		}
	}    
}


if ( ! function_exists('tonum2'))
{
	function tonum2($val)
	{
		$val = str_replace(",","",$val);
		$ret=0;
		if (is_numeric($val)) $ret = $val;				
		return $ret;
	}
}

if ( ! function_exists('check_input'))
{
	function check_input($data)
	{
	$data = trim($data);
	$data = str_replace("'","",$data);
	$data = str_replace('"',"",$data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	
	
	return $data;
	}	
}/* End Function convertDbDate */
	
function dmytoymd($valdate)
{
	//return "<font color='#0000FF'>".$text."</font>";
	$ret="";
	
		
		$d="";
		
		$valdate=substr($valdate,0,10);
		$valdate = str_replace("/","-",$valdate);
		if ($valdate <> "")
		{	
			$dmy=explode("-",$valdate);
			$d=$dmy[0];
			$m=$dmy[1];
			$y=$dmy[2];
			/*
			$d=substr($valdate,8,2);
			$m=substr($valdate,5,2);
			$y=substr($valdate,0,4);
			*/
			
			$ret= $y."-".$m."-".$d;
		}
		if ($d=="00")$ret="";
	
		if (isymd($ret))
		{
		}
		else
		{
			$ret="";
		}	
			
		return $ret;
			
}
	
function ymdtodmy($valdate)
{
	//return "<font color='#0000FF'>".$text."</font>";
		$d="00";
		$y="";		
		$return= "";
		if (isymd($valdate))
		{	
			if (strlen($valdate) >= 10 )
			{	
				$valdate=substr($valdate,0,10);
				$d=substr($valdate,8,2);
				$m=substr($valdate,5,2);
				$y=substr($valdate,0,4);
				$return= $d."-".$m."-".$y;
			}
			if ($d=="00")$return="";
			if ($y=="1753") $return="";
		}
		return $return;
			
}


if ( ! function_exists('convertDbDate'))
{
	function convertDbDate($date)
	{
		$day = substr($date,0,2);
		$month = substr($date,2,4);
		$year = substr($date,6,4);
		$db_date = $year.$month.$day;
		return $db_date;
	}	
}/* End Function convertDbDate */

if ( ! function_exists('convertDateNormal'))
{	
	function convertDateNormal($date)
	{
		$day = substr($date,8,2);
		$month = substr($date,4,4);
		$year = substr($date,0,4);
		$db_date = $day.$month.$year;
		return $db_date;
	}
}/* End Function convertDateNormal */

if ( ! function_exists('covertDateTime'))
{
	function convertDateTime($date)
	{
		$day = substr($date,8,2);
		$month = substr($date,4,4);
		$year = substr($date,0,4);
		$time = substr($date,11,8);
		$db_date = $day.$month.$year.' '.$time;
		return $db_date;
	}
}/* End Function convertDateTime */

if ( ! function_exists('nav_bar'))
{
	function nav_bar($code,$username,$o)
	{
		?>
        <!-- Start Navigator Bar -->
		<div class="navbar navbar-default navbar-fixed-top" id="top">
      		<div class="container">
            	<div class="navbar-header" style="margin-right:10px; image-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                <img src="<?php echo base_url() ?>img/logo_pee.png" style="width:40px; padding-top:5px;" />
                </div>
        		<div class="navbar-header">
                
                  <b class="navbar-brand" style="color:#C33; text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">  Spare Parts Requisition</b>
                  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
        		</div>
                
        		<div class="navbar-collapse collapse" id="navbar-main">
	          		<ul class="nav navbar-nav">
	                    <li><a href="<?php echo site_url('spare_parts/new_spare_parts') ?>">Spare Parts Request</a></li>
	                    <!--<li><a href="<?php echo site_url('history/spare_parts_history') ?>">History</a></li>-->
	                    <?php
	                    	$check_role_approve = $o->Setup_model->check_role_approve($username);
	                    	$check_role_supervisor = $o->Setup_model->check_role_supervisor($username);
							if($check_role_approve > 0 )
							{
								$check_role_approve = $o->Setup_model->check_role_approve_useless($username);
								$check_role_supervisor = $o->Setup_model->check_role_supervisor_useless($username);
								if($check_role_approve[0]['approval_useless'] == 1 )
								{
									?>
										<li><a href="<?php echo site_url('history/spare_parts_history2') ?>">History</a></li>
										<li><a href="<?php echo site_url('history/spare_parts_history3_mybranch') ?>">Branch</a></li>
									<?php
								}
								else
								{
									?>
										<li><a href="<?php echo site_url('history/spare_parts_history1') ?>">History</a></li>
									<?php
								}	
							}
							else if($check_role_supervisor > 0)
							{
								$check_role_supervisor = $o->Setup_model->check_role_supervisor_useless($username);
								if($check_role_supervisor[0]['supervisor_status'] == 1 )
								{
									?>
										<li class="dropdown">
									        <a class="dropdown-toggle" data-toggle="dropdown" href="#">History
									        <span class="caret"></span></a>
									        <ul class="dropdown-menu">
												<li><a href="<?php echo site_url('history/spare_parts_history1') ?>">My History</a></li>
												<li><a href="<?php echo site_url('history/spare_parts_history3_mybranch') ?>">My Branch</a></li>
											</ul>
										</li>
									<?php
								}
								else
								{
									?>
										<li><a href="<?php echo site_url('history/spare_parts_history1') ?>">History</a></li>
									<?php
								}
							}
							else
							{
								?>
									<li><a href="<?php echo site_url('history/spare_parts_history1') ?>">History</a></li>
								<?php
							}
	                    ?>
	                    <?php
	                    	$check_role_approve = $o->Setup_model->check_role_approve($username);
							if($check_role_approve > 0)
							{
								?>
									<li class="dropdown">
								        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Task
								        <span class="caret"></span></a>
								        <ul class="dropdown-menu">
											<li><a href="<?php echo site_url('task/spare_parts_task_wpsn') ?>">Watting PR,SPR No.</a></li>
											<li><a href="<?php echo site_url('task/spare_parts_task_wpn') ?>">Waitting PO No.</a></li>
											<li><a href="<?php echo site_url('task/spare_parts_task_wr') ?>">Waitting Receive</a></li>
											<li><a href="<?php echo site_url('task/spare_parts_task_c') ?>">Complete</a></li>
											<li><a href="<?php echo site_url('task/spare_parts_task') ?>">Show All</a></li>
											<li><a href="<?php echo site_url('history/spare_parts_report') ?>">Report</a></li>
										</ul>
									</li>
								<?php
							}
	                    ?>
	                    <li class="dropdown">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manual
					        <span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          	<li><a href="<?php echo site_url('manual/spare_parts_manual') ?>">คู่มือการใช้งานโปรแกรมเบื้องต้น</a></li>
					          	<?php
			                    	$check_role_approve = $o->Setup_model->check_role_approve($username);
									if($check_role_approve > 0)
									{
										?>
								          	<li><a href="<?php echo site_url('manual/spare_parts_manual_task') ?>">คู่มือการใช้งาน Task</a></li>
								          	<!--<li><a href="<?php echo site_url('manual/spare_parts_manual_management') ?>">คู่มือการใช้งาน Managament</a></li>-->
										<?php
									}
			                    ?>
					        </ul>
					    </li>
	                    <li class="dropdown">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Management
					        <span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          	<li><a href="<?php echo site_url('management/approvers') ?>">Approvers</a></li>
					          	<li><a href="<?php echo site_url('management/supervisor') ?>">Supervisor</a></li>
					          	<li><a href="<?php echo site_url('management/groups') ?>">Group</a></li>
					          	<li><a href="<?php echo site_url('management/emails') ?>">E-Mail</a></li>
					        </ul>
					    </li>
					    <!--<li><a href="<?php echo site_url('unit/load_unit') ?>">create_unit</a></li>-->
	          		</ul>
	                <ul class="nav navbar-nav navbar-right">
	                	<?php
	                		$showuserflname = $o->Spare_parts_model->getfixbranch_user($username);
	                		$showuserbranch = $o->Spare_parts_model->getfixbranch_department($showuserflname[0]['Department']);
	                    ?>
	                    <!--<li class="dropdown">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="<?php echo base_url() ?>asset/img/setting_icon.png" width="20" style="cursor:pointer" /></a>
					        <ul class="dropdown-menu">
					          	<li><a href="#">User : <?php echo $showuserflname[0]['Fname'].' '.$showuserflname[0]['Lname'] ?></a></li>
					          	<li><a href="#">Branch : <?php echo $showuserbranch[0]['DeptName'] ?></a></li>
					          	<li><hr></li>
					          	<li><a href="<?php echo ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http') ."://".$_SERVER['HTTP_HOST']."/intranet" ?>" >Exit</a></li>
					        </ul>
					    </li>-->
	                	<li><a href="#" style="color:#C33; text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
	                		<?php echo $showuserflname[0]['Fname'].' '.$showuserflname[0]['Lname'] ?> / 
	                		<?php echo $showuserbranch[0]['DeptName'] ?>
	                	</a></li>
	                    <li><a href="<?php echo ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http') ."://".$_SERVER['HTTP_HOST']."/intranet" ?>" >Exit</a></li>
	                </ul>
        		</div>
      		</div>
		</div><!-- end .navbar navbar-default navbar-fixed-top -->
		<!-- Wnd Navigator Bar -->
        <?php
	}
}/* End Function nav_bar */

if( ! function_exists('footer'))
{
	function footer()
	{
		?>
       	<br />
       	<br />
       	<footer class="footer">
            <div class="container">
                <p>Last Update : 28/08/2018 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Version : 1.4.6 </p>
                <p>Made by <a href="https://intranet.premium.co.th">MIS</a>. Contact at <a href="mailto:kasidit@premium.co.th">kasidit@premium.co.th</a> Tel <a href="#">519</a></p>
                <p>Analys And Test IT System Engineer <a href="#">chalermchai_ch@premium.co.th</a> Tel <a href="#">519</a></p>
                <p>Code licensed under the <a href="http://www.premium.co.th">Premium Euipment & Engineering</a>.</p>
            </div>
    	</footer>
        <?php
	}
}

if( ! function_exists('import_css'))
{
	function import_css()
	{
		echo link_tag('asset/bootstrap-3.3.2/css/bootstrap.css');
		echo link_tag('asset/bootstrap-3.3.2/css/bootstrap.theme.min.css');
		//echo link_tag('asset/bootstrap-3.3.2/css/bootstrap.min.spacelab.css');
		echo link_tag('asset/jquery-ui-1.11.3.custom/jquery-ui.theme.min.css');
		echo link_tag('asset/jquery-ui-1.11.3.custom/jquery-ui.min.css');
	}
}

if( ! function_exists('import_sortable'))
{
	function import_sortable()
	{
		echo link_tag('asset/css/style_sorter.css');
	}
}

if( ! function_exists('show_fullname'))
{
	function show_fullname($username,$db)
	{
		$res = $db->Setup_model->get_fullname($username);
		return $res[0]['Fname'].' '.$res[0]['Lname'];
	}
}

if( ! function_exists('show_branchname'))
{
	function show_branchname($code,$db)
	{
		$res = $db->Setup_model->get_branchname($code);
		return $res[0]['department_name'];
	}
}