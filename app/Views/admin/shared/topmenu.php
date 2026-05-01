
<div id="headerbar">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-2">
                <a href="/admin" class="shortcut-tiles tiles-brown">
                    <div class="tiles-body">
                        <div class="pull-left"><i class="fa fa-home"></i></div>
                    </div>
                    <div class="tiles-footer">
                        Dashboard
                    </div>
                </a>
            </div>
           
        </div>
    </div>
</div>
<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
    <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="Toggle Sidebar"></a>
    <a id="rightmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="left" title="Toggle Infobar"></a>

    <div class="navbar-header pull-left">
        <a class="" href="/home" style="color:white" target="_blank">
            <img src="<?php prt('admin-logo.png') ?>" style="padding-top:3px" />
        
        </a>
    </div>

    <ul class="nav navbar-nav pull-right toolbar">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
            <span class="hidden-xs"><?php echo session('Username'); ?>
<i class="fa fa-caret-down"></i></span>
            <img src="<?php prt('blank-profile.jpg') ?>" alt="user pic" /></a>
            <ul class="dropdown-menu userinfo arrow">
                <li class="username">
                    <a href="#">
                        <div class="pull-left">
                            <img src="<?php prt('blank-profile.jpg') ?>"
                                                    alt=" user pic" /></div>
                        <div class="pull-right">
                            <h5> 
                                <?php echo session('Username'); ?>
                            </h5><small>Logged in as <span> Admin</span></small></div>
                    </a>
                </li>
                <li class="userlinks">
                    <ul class="dropdown-menu">
                        <li><a href="/admin/pass">Change Password  <i class="pull-right fa fa-pencil"></i></a></li>
                       
                        <li><a href="#" onclick="$('#modHelp').modal('show');">Help <i class="pull-right fa fa-question-circle"></i></a></li>
                        <li class="divider"></li>
                        <li>

                          
                            <a href="<?= site_url('logout') ?>"  class="text-right" style="float:right;margin-right:2%;color:black">Sign Out</a>
                      

                        </li>
                    </ul>
                </li>
            </ul>
        </li>
       
        <li>
            <a href="#" id="headerbardropdown"><span><i class="fa fa-level-down"></i></span></a>
        </li>
        <li class="dropdown demodrop">
            <a href="#" class="dropdown-toggle tooltips" data-toggle="dropdown"><i class="fa fa-magic"></i></a>

            <ul class="dropdown-menu arrow dropdown-menu-form" id="demo-dropdown">
                <li>
                    <label for="demo-header-variations" class="control-label">Header Colors</label>
                    <ul class="list-inline demo-color-variation" id="demo-header-variations">
                        <li><a class="color-black" href="javascript:;" data-headertheme="header-black.css"></a></li>
                        <li><a class="color-dark" href="javascript:;" data-headertheme="default.css"></a></li>
                        <li><a class="color-red" href="javascript:;" data-headertheme="header-red.css"></a></li>
                        <li><a class="color-blue" href="javascript:;" data-headertheme="header-blue.css"></a></li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li>
                    <label for="demo-color-variations" class="control-label">Sidebar Colors</label>
                    <ul class="list-inline demo-color-variation" id="demo-color-variations">
                        <li><a class="color-lite" href="javascript:;" data-theme="default.css"></a></li>
                        <li><a class="color-steel" href="javascript:;" data-theme="sidebar-steel.css"></a></li>
                        <li><a class="color-lavender" href="javascript:;" data-theme="sidebar-lavender.css"></a></li>
                        <li><a class="color-green" href="javascript:;" data-theme="sidebar-green.css"></a></li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li>
                    <label for="fixedheader">Fixed Header</label>
                    <div id="fixedheader" style="margin-top:5px;"></div>
                </li>
            </ul>
        </li>
    </ul>
</header>
