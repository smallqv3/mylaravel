
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Apple iOS and Android stuff (do not remove) -->
<meta name="apple-mobile-web-app-capable" content="no" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/reset.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/text.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/fonts/ptsans/stylesheet.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/fluid.css')}}"  media="screen" />

<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/mws.style.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/icons/16x16.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/icons/24x24.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/icons/32x32.css')}}"  media="screen" />

<!-- Demo and Plugin Stylesheets -->
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/demo.css')}}"  media="screen" />

<link rel="stylesheet" type="text/css" href="{{asset('/admins/plugins/colorpicker/colorpicker.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/plugins/imgareaselect/css/imgareaselect-default.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/plugins/fullcalendar/fullcalendar.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/plugins/fullcalendar/fullcalendar.print.css')}}"  media="print" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/plugins/chosen/chosen.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/plugins/prettyphoto/css/prettyPhoto.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/plugins/tipsy/tipsy.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/plugins/sourcerer/Sourcerer-1.2.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/plugins/jgrowl/jquery.jgrowl.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/plugins/spinner/ui.spinner.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admins/jui/css/jquery.ui.all.css')}}"  media="screen" />

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="{{asset('/admins/css/mws.theme.css')}}"  media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('/admin/css/main.css')}}">

<!-- JavaScript Plugins -->
<script type="text/javascript" src="{{asset('/admins/js/jquery-1.7.2.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/js/jquery.mousewheel.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/js/jquery.placeholder.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/js/jquery.fileinput.js')}}" ></script>

<!-- jQuery-UI Dependent Scripts -->
<script type="text/javascript" src="{{asset('/admins/jui/js/jquery-ui.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/jui/js/jquery.ui.timepicker.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/jui/js/jquery.ui.touch-punch.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/spinner/ui.spinner.min.js')}}" ></script>

<!-- Plugin Scripts -->
<script type="text/javascript" src="{{asset('/admins/plugins/imgareaselect/jquery.imgareaselect.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/duallistbox/jquery.dualListBox-1.3.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/jgrowl/jquery.jgrowl-min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/fullcalendar/fullcalendar.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/datatables/jquery.dataTables.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/chosen/chosen.jquery.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/prettyphoto/js/jquery.prettyPhoto.min.js')}}" ></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="plugins/flot/excanvas.min.js" ></script>
<![endif]-->
<script type="text/javascript" src="{{asset('/admins/plugins/flot/jquery.flot.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/flot/jquery.flot.pie.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/flot/jquery.flot.stack.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/flot/jquery.flot.resize.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/colorpicker/colorpicker-min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/tipsy/jquery.tipsy-min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/sourcerer/Sourcerer-1.2-min.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/smartwizard/js/jquery.smartWizard-2.0.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/plugins/validate/jquery.validate-min.js')}}" ></script>

<!-- Core Script -->
<script type="text/javascript" src="{{asset('/admins/js/core/mws.js')}}" ></script>

<!-- Themer Script (Remove if not needed) -->
<script type="text/javascript" src="{{asset('/admins/js/core/themer.js')}}" ></script>

<!-- Demo Scripts (remove if not needed) -->
<script type="text/javascript" src="{{asset('/admins/js/demo/demo.js')}}" ></script>
<script type="text/javascript" src="{{asset('/admins/js/demo/demo.dashboard.js')}}" ></script>


<title>@yield('title')</title>

</head>

<body>

	<!-- Themer (Remove if not needed) -->  
	<div id="mws-themer">
        <div id="mws-themer-content">
        	<div id="mws-themer-ribbon"></div>
            <div id="mws-themer-toggle"></div>
        	<div id="mws-theme-presets-container" class="mws-themer-section">
	        	<label for="mws-theme-presets">Color Presets</label>
            </div>
            <div class="mws-themer-separator"></div>
        	<div id="mws-theme-pattern-container" class="mws-themer-section">
	        	<label for="mws-theme-patterns">Background</label>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
                <ul>
                    <li class="clearfix"><span>Base Color</span> <div id="mws-base-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Highlight Color</span> <div id="mws-highlight-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Color</span> <div id="mws-text-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Color</span> <div id="mws-textglow-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Opacity</span> <div id="mws-textglow-op"></div></li>
                </ul>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
	            <button class="mws-button red small" id="mws-themer-getcss">Get CSS</button>
            </div>
        </div>
        <div id="mws-themer-css-dialog">
        	<form class="mws-form">
            	<div class="mws-form-row">
		        	<div class="mws-form-item">
                    	<textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Themer End -->

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<!-- <img src="{{asset('/admins/images/mws-logo.png')}}"  alt="mws admin" /> -->
                <span style="color:white; font-size:20px; font-family:microsoft yahei">Ours Logo Admin</span>
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
        	<div id="mws-user-notif" class="mws-dropdown-menu">
            	<a href="#" class="mws-i-24 i-alert-2 mws-dropdown-trigger">Notifications</a>
                
                <!-- Unread notification count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
            	<a href="#" class="mws-i-24 i-message mws-dropdown-trigger">Messages</a>
                
                <!-- Unred messages count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-messages">
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="{{asset('/admins/example/profile.jpg')}}"  alt="User Photo" />
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, John Doe
                    </div>
                    <ul>
                    	<li><a href="#">Profile</a></li>
                        <li><a href="#">Change Password</a></li>
                        <li><a href="index.html" >Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="http://www.malijuthemeshop.com/themes/mws-admin/1.5/typography.html">
                	<input type="text" class="mws-search-input" />
                    <input type="submit" class="mws-search-submit" />
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
            	<ul>
                	
                	<li>
                    	<a href="#" class="mws-i-24 i-list"> 用户管理</a>
                        <ul class="closed">
                        	<li><a href="{{url('/user/add')}}" >用户添加</a></li>
                        	<li><a href="{{url('/user/index')}}" >用户列表</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="mws-i-24 i-list"> 分类管理</a>
                        <ul class="closed">
                            <li><a href="{{url('/cate/create')}}" >分类添加</a></li>
                            <li><a href="{{url('/cate')}}" >分类列表</a></li>
                        </ul>
                    </li>
                	
                </ul>
            </div>            
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
                @if(session('info')) 
                <div class="mws-form-message info" style="border-radius:5px;margin-bottom:10px;">
                    {{session('info')}}
                </div>
                @endif
                @section('content')
                @show
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

</body>
</html>