<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        	
			<ul>
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				    <?php echo $active_link['as']?>
				    <a href="<?php echo base_url() ?>ch/analytics">
					<i class="icon-home"></i> 
					<span class="title">Analytics Summary</span>
					<?php echo $span_selected['as']?>
					</a>
				   </li>
				    <?php echo $active_link['fi']?>
					<a href="javascript:;">
					<i class="icon-bookmark-empty"></i> 
					<span class="title">Facility Information</span>
					<?php echo $span_selected['fi'];?>
					<span class="arrow "></span>
					</a>
					<ul class="sub">
						<li ><a href="<?php echo base_url() ?>analytics/facility/loc">Levels of Care</a></li>
						<li ><a href="<?php echo base_url() ?>analytics/facility/ownership">Ownership</a></li>
						<li ><a href="<?php echo base_url() ?>analytics/facility/types">Types</a></li>
					</ul>
				</li>
				<li class="">
					<a href="#">
					<i class="icon-th-list"></i> 
					<span class="title">Demographics</span>
					</a>
				</li>
				<?php echo $active_link['s2']?>
					<a href="javascript:;">
					<i class="icon-bar-chart"></i> 
					<span class="title">Facility Statistics</span>
					<?php echo $span_selected['s2'];?>
					<span class="arrow "></span>
					</a>
					<ul class="sub">
						<li id="communityStrategy"><a href="#" >Community Strategy</a></li>
						<li id="guidelines"><a href="#">Guidelines Availability</a></li>
						<li id="training"><a href="#">Staff Trainings</a></li>
						<li ><a href="<?php echo base_url() ?>analytics/section2/commodity-availability">Commodity Availability</a></li>
						<li ><a href="<?php echo base_url() ?>analytics/section2/commodity-supplier">Commodity Supplier</a></li>
						<li id="childrenServices"><a href="#">Children Services</a></li>
					</ul>
				</li>
				<li class="has-sub ">
					<a href="javascript:;">
					<i class="icon-bar-chart"></i> 
					<span class="title">Section 3</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub">
						<li ><a href="#">Service Delivery</a></li>
						<li ><a href="#">Quality of Diagnosis</a></li>
					</ul>
				</li>
				<li class="has-sub ">
					<a href="javascript:;">
					<i class="icon-bar-chart"></i> 
					<span class="title">Section 4</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub">
						<li ><a href="#">Necessary Tools</a></li>
						<li ><a href="#">Diarrhoea Cases</a></li>
						<li ><a href="#">Treatment of Records</a></li>
					</ul>
				</li>
				<li class="has-sub ">
					<a href="javascript:;">
					<i class="icon-bar-chart"></i> 
					<span class="title">Section 5</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub">
						<li ><a href="#">ORT Corner Assessment</a></li>
						<li ><a href="#">ORT Corner Equipment</a></li>
					</ul>
				</li>
				<li class="has-sub ">
					<a href="javascript:;">
					<i class="icon-bar-chart"></i> 
					<span class="title">Section 6</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub">
						<li ><a href="#">Safe Water Source</a></li>
						<li ><a href="#">Electricity and Hardware Resources</a></li>
						<li ><a href="#">Treatment of Records</a></li>
					</ul>
				</li>
				<li class="has-sub ">
					<a href="javascript:;">
					<i class="icon-table"></i> 
					<span class="title">Raw Data</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub">
						<li ><a href="#">Section 1</a></li>
						<li ><a href="#">Section 2</a></li>
						<li ><a href="#">Section 3</a></li>
						<li ><a href="#">Section 4</a></li>
						<li ><a href="#">Section 5</a></li>
						<li ><a href="#">Section 6</a></li>
					</ul>
				</li>
				<!--li class="">
					<a href="login.html">
					<i class="icon-user"></i> 
					<span class="title">Login Page</span>
					</a>
				</li-->
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>