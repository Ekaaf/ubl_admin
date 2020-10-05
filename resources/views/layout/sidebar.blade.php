<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark sidebar-left ">
					<!-- BEGIN: Aside Menu -->
	<div 
		id="m_ver_menu" 
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
		m-menu-vertical="1"
		 m-menu-scrollable="0" m-menu-dropdown-timeout="500"  
		>	
			<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
				
				@if(Auth::user()->role_id==1)
				<li class="m-menu__item parent-menu <?php if(Request::path()=='admin/dashboard') echo "customselect"; ?>" aria-haspopup="true">
					<a href="{{URL::to('admin/dashboard')}}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph color-white"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text color-white">
									Dashboard
								</span>
							</span>
						</span>
					</a>
				</li>

				<li class="m-menu__item parent-menu parent-menu" aria-haspopup="true">
					<a href="{{URL::to('admin/dailyvisitdashboard')}}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph color-white"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text color-white">
									Daily Visit Dashboard
								</span>
							</span>
						</span>
					</a>
				</li>

				<li class="m-menu__item parent-menu parent-menu" aria-haspopup="true">
					<a href="{{URL::to('admin/storedashboard')}}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph color-white"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text color-white">
									Drug Store Dashboard
								</span>
							</span>
						</span>
					</a>
				</li>


				<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-layers color-white"></i>
						<span class="m-menu__link-text color-white">
							Manage Users
						</span>
						<i class="m-menu__ver-arrow la la-angle-right color-white"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<!-- <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Manage users
									</span>
								</span>
							</li> -->
							<li class="m-menu__item child-menu" aria-haspopup="true" >
								<a  href="{{URL::to('admin/doctor/add')}}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot color-white">
										<span></span>
									</i>
									<span class="m-menu__link-text color-white">
										Add User
									</span>
								</a>
							</li>

							<li class="m-menu__item child-menu" aria-haspopup="true" >
								<a  href="{{URL::to('admin/doctor/index')}}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot color-white">
										<span></span>
									</i>
									<span class="m-menu__link-text color-white">
										All Users
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>


				<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-layers color-white"></i>
						<span class="m-menu__link-text color-white">
							Manage Doctors
						</span>
						<i class="m-menu__ver-arrow la la-angle-right color-white"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<!-- <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Manage users
									</span>
								</span>
							</li> -->
							<li class="m-menu__item child-menu" aria-haspopup="true" >
								<a  href="{{URL::to('admin/doctor/add')}}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot color-white">
										<span></span>
									</i>
									<span class="m-menu__link-text color-white">
										Add Doctor
									</span>
								</a>
							</li>

							<li class="m-menu__item child-menu" aria-haspopup="true" >
								<a  href="{{URL::to('admin/doctor/index')}}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot color-white">
										<span></span>
									</i>
									<span class="m-menu__link-text color-white">
										All Doctors
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>

				<li class="m-menu__item parent-menu <?php if(Request::path()=='admin/dailyvisit') echo "customselect"; ?>" aria-haspopup="true">
					<a href="{{URL::to('admin/dailyvisit')}}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph color-white"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text color-white">
									Daily Visit
								</span>
							</span>
						</span>
					</a>
				</li>

				<li class="m-menu__item parent-menu <?php if(Request::path()=='admin/store') echo "customselect"; ?>" aria-haspopup="true">
					<a href="{{URL::to('admin/store')}}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph color-white"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text color-white">
									Drug Store
								</span>
							</span>
						</span>
					</a>
				</li>

				<li class="m-menu__item parent-menu <?php if(Request::path()=='admin/audit') echo "customselect"; ?>" aria-haspopup="true">
					<a href="{{URL::to('admin/audit')}}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph color-white"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text color-white">
									Audit
								</span>
							</span>
						</span>
					</a>
				</li>


				<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
					<a  href="javascript:;" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-layers color-white"></i>
						<span class="m-menu__link-text color-white">
							Options
						</span>
						<i class="m-menu__ver-arrow la la-angle-right color-white"></i>
					</a>
					<div class="m-menu__submenu ">
						<span class="m-menu__arrow"></span>
						<ul class="m-menu__subnav">
							<!-- <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
								<span class="m-menu__link">
									<span class="m-menu__link-text">
										Manage users
									</span>
								</span>
							</li> -->
							<li class="m-menu__item child-menu" aria-haspopup="true" >
								<a  href="{{URL::to('admin/options/add')}}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot color-white">
										<span></span>
									</i>
									<span class="m-menu__link-text color-white">
										Add option
									</span>
								</a>
							</li>

							<li class="m-menu__item child-menu" aria-haspopup="true" >
								<a  href="{{URL::to('admin/options')}}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot color-white">
										<span></span>
									</i>
									<span class="m-menu__link-text color-white">
										All Options
									</span>
								</a>
							</li>

							<li class="m-menu__item child-menu" aria-haspopup="true" >
								<a  href="{{URL::to('admin/doctors')}}" class="m-menu__link ">
									<i class="m-menu__link-bullet m-menu__link-bullet--dot color-white">
										<span></span>
									</i>
									<span class="m-menu__link-text color-white">
										Doctors
									</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				@endif




				@if(Auth::user()->type==2 || Auth::user()->type==4)
				<li class="m-menu__item parent-menu <?php if(Request::path()=='bdo/dailyvisit') echo "customselect"; ?>" aria-haspopup="true">
					<a href="{{URL::to('bdo/dailyvisit')}}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph color-white"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text color-white">
									Daily Visit
								</span>
							</span>
						</span>
					</a>
				</li>

				<li class="m-menu__item parent-menu <?php if(Request::path()=='bdo/store') echo "customselect"; ?>" aria-haspopup="true">
					<a href="{{URL::to('bdo/store')}}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph color-white"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text color-white">
									Store
								</span>
							</span>
						</span>
					</a>
				</li>

				<li class="m-menu__item parent-menu <?php if(Request::path()=='bdo/audit') echo "customselect"; ?>" aria-haspopup="true">
					<a href="{{URL::to('bdo/audit')}}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph color-white"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text color-white">
									Audit
								</span>
							</span>
						</span>
					</a>
				</li>
				@endif


				@if(Auth::user()->type==5)
				<li class="m-menu__item parent-menu <?php if(Request::path()=='reportuser/storedashboard') echo "customselect"; ?>" aria-haspopup="true">
					<a href="{{URL::to('reportuser/dailyvisitdashboard')}}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph color-white"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text color-white">
									Drug Store Dashboard
								</span>
							</span>
						</span>
					</a>
				</li>

				<li class="m-menu__item parent-menu <?php if(Request::path()=='reportuser/store') echo "customselect"; ?>" aria-haspopup="true">
					<a href="{{URL::to('reportuser/store')}}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph color-white"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text color-white">
									Drug Store
								</span>
							</span>
						</span>
					</a>
				</li>

				<li class="m-menu__item parent-menu <?php if(Request::path()=='reportuser/audit') echo "customselect"; ?>" aria-haspopup="true">
					<a href="{{URL::to('reportuser/audit')}}" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-line-graph color-white"></i>
						<span class="m-menu__link-title">
							<span class="m-menu__link-wrap">
								<span class="m-menu__link-text color-white">
									Audit
								</span>
							</span>
						</span>
					</a>
				</li>
				@endif

			</ul>
		</div>
		<!-- END: Aside Menu -->
</div>

