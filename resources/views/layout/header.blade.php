<header id="m_header" class="m-grid__item    m-header "  m-minimize-offset="200" m-minimize-mobile-offset="200" >
	<div class="m-container m-container--fluid m-container--full-height">
		<div class="m-stack m-stack--ver m-stack--desktop">
			<!-- BEGIN: Brand -->
			<div class="m-stack__item m-brand">
				<div class="m-stack m-stack--ver m-stack--general" style="width: 220px;">
					<div style="width: 220px;font-size: 20px;color: #843e71;">
						<div class="row">
						<img src="{{URL::to(session('userImage'))}}" style="border-radius: 50%;width: 15%;margin-top: 2px;margin-right: 10px;">
						<label style="margin: 0;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{Auth::user()->name}}</label>
						</div>
						@if(Auth::user()->type==1)
						<div class="row" style="width: 200px;">
						    <select class="custom-select" onchange="if (this.value) window.location.href=this.value">
						        <option value="/admin/admin/dashboard" <?php if(Request::path()=='admin/dashboard') echo "selected"; ?>>Dashboard</option>
						        <option value="/admin/admin/dailyvisitdashboard" <?php if(Request::path()=='admin/dailyvisitdashboard') echo "selected"; ?>>Dailyvisit dashboard</option>
						        <option value="/admin/admin/storedashboard" <?php if(Request::path()=='admin/storedashboard') echo "selected"; ?>>Drug Store Dashboard</option>
						        
						    </select>
						</div>
						@else
						<div class="row" style="width: 200px;">
						    Dashboard
						</div>
						@endif
					</div>
					<!-- <div class="m-stack__item m-stack__item--middle m-brand__logo">
						<a href="index.html" class="m-brand__logo-wrapper">
							<img alt="" src="assets/demo/default/media/img/logo/logo_default_dark.png"/>
						</a>
					</div> -->
					<div class="m-stack__item m-stack__item--middle m-brand__tools" >
						<!-- <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
							<span></span>
						</a> -->
						<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block" style="margin-right: 100%;">
							<span>test</span>
							<img src="http://npab.net/admin/public/mobilemenu.png" style="height: 30px;width: 30px;">
						</a>
						<!-- <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
							<span></span>
						</a>
						<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
							<i class="flaticon-more"></i>
						</a> -->
					</div>
				</div>
			</div>
			<!-- END: Brand -->
			<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
				<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
					<div class="m-stack__item m-topbar__nav-wrapper">
						<ul class="m-topbar__nav m-nav m-nav--inline">
							
							<li id="m_quick_sidebar_toggle" class="m-nav__item" style="display: flex;">
								<a href="{{URL::to('logout')}}" class="m-nav__link m-dropdown__toggle" style="background: #843e71;color: white;width: 90px;text-align: center;height: 10px;border-radius: 10px;align-self: center;">
									Logout
								</a>
							</li>
							<!-- <li id="m_quick_sidebar_toggle" class="m-nav__item">
								<a href="#" class="m-nav__link m-dropdown__toggle">
									<span class="m-nav__link-icon">
										<i class="flaticon-grid-menu"></i>
									</span>
								</a>
							</li> -->

						</ul>

					</div>
				</div>
				<!-- END: Topbar -->
			</div>
		</div>
	</div>
</header>