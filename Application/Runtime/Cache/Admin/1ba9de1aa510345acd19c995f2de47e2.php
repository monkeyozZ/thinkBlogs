<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>文章列表</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/thinkBlogs/Public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/thinkBlogs/Public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/thinkBlogs/Public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/thinkBlogs/Public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="/thinkBlogs/Public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="/thinkBlogs/Public/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="/thinkBlogs/Public/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="/thinkBlogs/Public/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/thinkBlogs/Public/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/thinkBlogs/Public/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="/thinkBlogs/Public/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="/thinkBlogs/Public/assets/layouts/layout/css/themes/light2.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/thinkBlogs/Public/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <!--<link rel="shortcut icon" href="favicon.ico" /> -->
        
    <style>
        .page-bar {
            margin-bottom: 20px!important;
        }
        .form-control, output{
            display: inline-block;
        }
        label{
            vertical-align: top;
        }
        textarea.form-control{
            height: 85px!important;
            resize: none;
        }
        .page-content{
            overflow: hidden;
        }
        .form .form-actions, .portlet-form .form-actions{
            background-color: #fff;
            border-top: none;
            max-width: 1100px;
        }
        @media (max-width: 414px) {
            #edui1{
                width: 300px!important;
                height: 400px!important;
            }
        }
    </style>

        </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.html">
                        <img src="/thinkBlogs/Public/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-envelope-open"></i>
                                <span class="badge badge-default"> 4 </span>
                            </a>
                        
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">7 New</span> Messages</h3>
                                    <a href="app_inbox.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="max-height: 275px;height: 100%" data-handle-color="#637283">
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="/thinkBlogs/Public/assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">Just Now </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="/thinkBlogs/Public/assets/layouts/layout/img/avatar3_small.jpg" />
                                <span class="username username-hide-on-mobile"> Nick </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="app_inbox.html">
                                        <i class="icon-envelope-open"></i> My Inbox
                                        <span class="badge badge-danger"> 3 </span>
                                    </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="<?php echo U('login/loginout');?>">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed nav-box" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <?php if(is_array($nav_data)): foreach($nav_data as $key=>$v): if(empty($v['_data'])): ?><li class="nav-item start">
                                    <a href="<?php echo U($v['mca']);?>" class="nav-link nav-toggle">
                                        <i class="<?php echo ($v['icon']); ?>"></i>
                                        <span class="title"><?php echo ($v['name']); ?></span>
                                        <!--<span class="selected"></span>-->
                                        <!--<span class="arrow open"></span>-->
                                    </a>
                                </li>
                                <?php else: ?>
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="<?php echo ($v['icon']); ?>"></i>
                                        <span class="title"><?php echo ($v['name']); ?></span>
                                        <!--<span class="selected"></span>-->
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <?php if(is_array($v['_data'])): foreach($v['_data'] as $key=>$n): ?><li class="nav-item start">
                                            <a href="<?php echo U($n['mca']);?>" class="nav-link ">
                                                <span class="title"><?php echo ($n['name']); ?></span>
                                                <!--<span class="selected"></span>-->
                                            </a>
                                        </li><?php endforeach; endif; ?>
                                    </ul>
                                </li><?php endif; endforeach; endif; ?>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo U('index/index');?>">首页</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="javascript:;">文章管理</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>添加文章</span>
            </li>
        </ul>
    </div>
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-circle"></i>添加文章</div>
            </div>
            <div class="portlet-body">
                <form role="form" action="/thinkBlogs/index.php/Admin/Article/insert" id="myform" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>文章标题：</label>
                        <input type="text" class="form-control input-large" name="title" id="title" placeholder="文章标题">
                    </div>
                    <div class="form-group">
                        <label>文章描述：</label>
                        <textarea class="form-control input-large" name="des" id="des" placeholder="文章描述"></textarea>
                    </div>
                    <div class="form-group">
                        <label>列表图片上传：</label>
                        <input type="file" id="listimg" name='listimg'  style="display: inline-block">
                        <img src="" alt="">
                    </div>
                    <div class="form-group">
                        <label>文章分类：</label>
                        <select class="form-control input-small" name="category" id="category">
                            <option value="1">Option 1</option>
                            <option value="">Option 2</option>
                            <option value="">Option 3</option>
                            <option value="">Option 4</option>
                            <option value="">Option 5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>文章标签：</label>
                        <select class="form-control input-small" name="tag" id="tag">
                            <option value="1">Option 1</option>
                            <option value="">Option 2</option>
                            <option value="">Option 3</option>
                            <option value="">Option 4</option>
                            <option value="">Option 5</option>
                        </select>
                    </div>
                    <textarea id="Uedit" class="Uedit" name="content" type="text/plain"></textarea>

                    <div class="portlet-body form">
                        <div class="form-actions right">
                            <button type="submit" class="btn green">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer" style="text-align: center;">
            <div class="page-footer-inner" style="float:none;"> 2017 &copy; thinkBlogs by monkey
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="/thinkBlogs/Public/assets/global/plugins/respond.min.js"></script>
<script src="/thinkBlogs/Public/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="/thinkBlogs/Public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="/thinkBlogs/Public/assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/thinkBlogs/Public/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/thinkBlogs/Public/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="/thinkBlogs/Public/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="/thinkBlogs/Public/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        
    <!-- 配置文件 -->
    <script type="text/javascript" src="/thinkBlogs/Public/Ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/thinkBlogs/Public/Ueditor/ueditor.all.js"></script>
    <script type="text/javascript" src="/thinkBlogs/Public/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/thinkBlogs/Public/layer/layer.js"></script>
    <script>
        var str = '';
        str+='<span class="selected open"></span>';
        $('.nav-box li').eq(2).addClass('active open').children('a').children('.arrow').addClass('open');
        $('.nav-box li').eq(2).children('a').append(str);
        $('.nav-box li').eq(2).children('ul.sub-menu').children('li').eq(1).addClass('active open')

        $(document).ready(function () {
            UE.getEditor('Uedit', {
                initialFrameHeight: 500,
                initialFrameWidth: 1100,
                imageUrlPrefix:'127.0.0.1'

            })
        })

        $(function() {
            $("#myform").validate({
                onfocusout: false,
                onkeyup: false,
                rules: {
                    title: {
                        required: true
                    },

                    des: {
                        required: true
                    },
                    listimg: {
                        required: true
                    },
                    category: {
                        required: true
                    },
                    tag: {
                        required: true
                    },
                    content: {
                        required: true
                    }
                },

                messages: {
                    title: {
                        required: '标题忘了啦？'
                    },
                    des: {
                        required: '描述忘了啦'
                    },
                    listimg: {
                        required: '列表图片必须噢'
                    },
                    category: {
                        required: '所属分类必填噢'
                    },
                    tag: {
                        required: '所属类别标签必填噢'
                    },
                    content: {
                        required: '文章内容必填噢'
                    }

                },
            //重写showErrors
                showErrors: function (errorMap, errorList) {
                    var msg = "";
                    $.each(errorList, function (i, v) {
                        layer.tips(v.message,'#'+v.element.id,{
                            tips:["2","#3598dc"]
                        });
                        return false;
                    });
                }
            });
        })

    </script>

    </body>

</html>