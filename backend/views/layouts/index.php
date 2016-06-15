<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\IndexAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

IndexAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="loaded">
<?php $this->beginBody() ?>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

        
        <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href=<?=Url::to(['site/index']);?> class="brand-logo darken-1"><img src=<?= Url::to('@web/images/logo.png'); ?> alt="website logo"></a> <span class="logo-text">chunk</span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="检索菜单关键字">
                    </div>
                    <ul class="right hide-on-med-and-down">
                        <li><ul id="translation-dropdown" class="dropdown-content">

                     
                    </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">5</small></i>
                        
                        </a><ul id="notifications-dropdown" class="dropdown-content">
                      <li>
                        <h5>NOTIFICATIONS <span class="new badge">5</span></h5>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#!"><i class="mdi-action-add-shopping-cart"></i> A new order has been placed!</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                      </li>
                      <li>
                        <a href="#!"><i class="mdi-action-stars"></i> Completed the task</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                      </li>
                      <li>
                        <a href="#!"><i class="mdi-action-settings"></i> Settings updated</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                      </li>
                      <li>
                        <a href="#!"><i class="mdi-editor-insert-invitation"></i> Director meeting started</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                      </li>
                      <li>
                        <a href="#!"><i class="mdi-action-trending-up"></i> Generate monthly report</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
                      </li>
                    </ul>
                        </li>                        
                        <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                        </li>
                    </ul>
                    <!-- translation-button -->
                    
                    <!-- notifications-dropdown -->
                    
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation ps-container ps-active-y" style="width: 240px;">
                <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <img src=<?= Url::to('@web/images/head.jpg'); ?> alt="" class="circle responsive-img valign profile-image">
                    </div>
                    <div class="col col s8 m8 l8">
                        
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?=Yii::$app->user->identity->username;?><i class="mdi-navigation-arrow-drop-down right"></i></a><ul id="profile-dropdown" class="dropdown-content">
                            <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                            </li>
                            <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                            </li>
                            <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                            </li>
                            <li><a href=<?=Url::to(['site/logout']);?> data-method="post"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                            </li>
                        </ul>
                        <p class="user-roal">Administrator</p>
                    </div>
                </div>
                </li>
                <li class="bold active"><a href=<?=Url::to(['site/index']);?> class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> 管理主页</a>
                </li>
          
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-chart"></i> 营业数据</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href=<?=Url::to(['sum/index']); ?>>汇总报表</a>
                                    </li>
                                    <li><a href=<?=Url::to(['feei/index']);?>>汇总Feei</a>
                                    </li>
                                    <li><a href="css-animations.html">Animations</a>
                                    </li>
                                    <li><a href="css-shadow.html">Shadow</a>
                                    </li>
                                    <li><a href="css-media.html">Media</a>
                                    </li>
                                    <li><a href="css-sass.html">Sass</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-insert-comment"></i> 店长日志</a>
                            <div class="collapsible-body" style="">
                                <ul>                                        
                                    <li><a href="page-contact.html">Contact Page</a>
                                    </li>
                                    <li><a href="page-todo.html">ToDos</a>
                                    </li>
                                    <li><a href="page-blog-1.html">Blog Type 1</a>
                                    </li>
                                    <li><a href="page-blog-2.html">Blog Type 2</a>
                                    </li>
                                    <li><a href="page-404.html">404</a>
                                    </li>
                                    <li><a href="page-500.html">500</a>
                                    </li>
                                    <li><a href="page-blank.html">Blank</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-shopping-cart"></i> 网购清单</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="eCommerce-products-page.html">Products Page</a>
                                    </li>                                        
                                    <li><a href="eCommerce-pricing.html">Pricing Table</a>
                                    </li>
                                    <li><a href="eCommerce-invoice.html">Invoice</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-image-image"></i> Medias</a>
                            <div class="collapsible-body" style="">
                                <ul>                                        
                                    <li><a href="media-gallary-page.html">Gallery Page</a>
                                    </li>
                                    <li><a href="media-hover-effects.html">Image Hover Effects</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-account-circle"></i> 员工管理</a>
                            <div class="collapsible-body" style="">
                                <ul>     
                                    <li><a href=<?=Url::to(['staff/index']); ?>>员工列表</a>
                                    </li>                                   
                                    <li><a href="user-login.html">Login</a>
                                    </li>                                        
                                    <li><a href="user-register.html">Register</a>
                                    </li>
                                    <li><a href="user-forgot-password.html">Forgot Password</a>
                                    </li>
                                    <li><a href="user-lock-screen.html">Lock Screen</a>
                                    </li>                                        
                                    <li><a href="user-session-timeout.html">Session Timeout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-chart"></i> ......</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href=<?=Url::to(['member/index']); ?>>会员列表</a>
                                    </li>
                                    <li><a href="charts-chartist.html">Chartist</a>
                                    </li>
                                    <li><a href="charts-morris.html">Morris Charts</a>
                                    </li>
                                    <li><a href="charts-xcharts.html">xCharts</a>
                                    </li>
                                    <li><a href="charts-flotcharts.html">Flot Charts</a>
                                    </li>
                                    <li><a href="charts-sparklines.html">Sparkline Charts</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                
                <li class="li-hover"><div class="divider"></div></li>
                <li class="li-hover"><p class="ultra-small margin more-text">规章制度</p></li>
                    <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-chart"></i> 营业数据</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="css-typography.html">Typography</a>
                                    </li>
                                    <li><a href="css-icons.html">Icons</a>
                                    </li>
                                    <li><a href="css-animations.html">Animations</a>
                                    </li>
                                    <li><a href="css-shadow.html">Shadow</a>
                                    </li>
                                    <li><a href="css-media.html">Media</a>
                                    </li>
                                    <li><a href="css-sass.html">Sass</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-insert-comment"></i> 店长日志</a>
                            <div class="collapsible-body" style="">
                                <ul>                                        
                                    <li><a href="page-contact.html">Contact Page</a>
                                    </li>
                                    <li><a href="page-todo.html">ToDos</a>
                                    </li>
                                    <li><a href="page-blog-1.html">Blog Type 1</a>
                                    </li>
                                    <li><a href="page-blog-2.html">Blog Type 2</a>
                                    </li>
                                    <li><a href="page-404.html">404</a>
                                    </li>
                                    <li><a href="page-500.html">500</a>
                                    </li>
                                    <li><a href="page-blank.html">Blank</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-shopping-cart"></i> 网购清单</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="eCommerce-products-page.html">Products Page</a>
                                    </li>                                        
                                    <li><a href="eCommerce-pricing.html">Pricing Table</a>
                                    </li>
                                    <li><a href="eCommerce-invoice.html">Invoice</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-image-image"></i> Medias</a>
                            <div class="collapsible-body" style="">
                                <ul>                                        
                                    <li><a href="media-gallary-page.html">Gallery Page</a>
                                    </li>
                                    <li><a href="media-hover-effects.html">Image Hover Effects</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-account-circle"></i> 员工管理</a>
                            <div class="collapsible-body" style="">
                                <ul>     
                                    <li><a href="user-profile-page.html">User Profile</a>
                                    </li>                                   
                                    <li><a href="user-login.html">Login</a>
                                    </li>                                        
                                    <li><a href="user-register.html">Register</a>
                                    </li>
                                    <li><a href="user-forgot-password.html">Forgot Password</a>
                                    </li>
                                    <li><a href="user-lock-screen.html">Lock Screen</a>
                                    </li>                                        
                                    <li><a href="user-session-timeout.html">Session Timeout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-chart"></i> Charts</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="charts-chartjs.html">Chart JS</a>
                                    </li>
                                    <li><a href="charts-chartist.html">Chartist</a>
                                    </li>
                                    <li><a href="charts-morris.html">Morris Charts</a>
                                    </li>
                                    <li><a href="charts-xcharts.html">xCharts</a>
                                    </li>
                                    <li><a href="charts-flotcharts.html">Flot Charts</a>
                                    </li>
                                    <li><a href="charts-sparklines.html">Sparkline Charts</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                
			   <!--微信管理--Start -->
               <li class="li-hover"><div class="divider"></div></li>
                <li class="li-hover"><p class="ultra-small margin more-text">微信管理</p></li>
                    <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-chart"></i> 云端会员</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href=<?=Url::to(['member/index']); ?>>会员列表</a>
                                    </li>
                                    <li><a href="css-icons.html">Icons</a>
                                    </li>
                                    <li><a href="css-animations.html">Animations</a>
                                    </li>
                                    <li><a href="css-shadow.html">Shadow</a>
                                    </li>
                                    <li><a href="css-media.html">Media</a>
                                    </li>
                                    <li><a href="css-sass.html">Sass</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-insert-comment"></i> 店长日志</a>
                            <div class="collapsible-body" style="">
                                <ul>                                        
                                    <li><a href="page-contact.html">Contact Page</a>
                                    </li>
                                    <li><a href="page-todo.html">ToDos</a>
                                    </li>
                                    <li><a href="page-blog-1.html">Blog Type 1</a>
                                    </li>
                                    <li><a href="page-blog-2.html">Blog Type 2</a>
                                    </li>
                                    <li><a href="page-404.html">404</a>
                                    </li>
                                    <li><a href="page-500.html">500</a>
                                    </li>
                                    <li><a href="page-blank.html">Blank</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-shopping-cart"></i> 网购清单</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="eCommerce-products-page.html">Products Page</a>
                                    </li>                                        
                                    <li><a href="eCommerce-pricing.html">Pricing Table</a>
                                    </li>
                                    <li><a href="eCommerce-invoice.html">Invoice</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-image-image"></i> Medias</a>
                            <div class="collapsible-body" style="">
                                <ul>                                        
                                    <li><a href="media-gallary-page.html">Gallery Page</a>
                                    </li>
                                    <li><a href="media-hover-effects.html">Image Hover Effects</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-account-circle"></i> 员工管理</a>
                            <div class="collapsible-body" style="">
                                <ul>     
                                    <li><a href="user-profile-page.html">User Profile</a>
                                    </li>                                   
                                    <li><a href="user-login.html">Login</a>
                                    </li>                                        
                                    <li><a href="user-register.html">Register</a>
                                    </li>
                                    <li><a href="user-forgot-password.html">Forgot Password</a>
                                    </li>
                                    <li><a href="user-lock-screen.html">Lock Screen</a>
                                    </li>                                        
                                    <li><a href="user-session-timeout.html">Session Timeout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-chart"></i> Charts</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="charts-chartjs.html">Chart JS</a>
                                    </li>
                                    <li><a href="charts-chartist.html">Chartist</a>
                                    </li>
                                    <li><a href="charts-morris.html">Morris Charts</a>
                                    </li>
                                    <li><a href="charts-xcharts.html">xCharts</a>
                                    </li>
                                    <li><a href="charts-flotcharts.html">Flot Charts</a>
                                    </li>
                                    <li><a href="charts-sparklines.html">Sparkline Charts</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                
                <!--微信管理--END -->
                
                <li class="li-hover"><div class="divider"></div></li>
                <li class="li-hover"><p class="ultra-small margin more-text">站点设置</p></li>
                <li><a href="angular-ui.html"><i class="mdi-action-verified-user"></i> Angular UI  <span class="new badge"></span></a>
                </li>
                <li><a href="css-grid.html"><i class="mdi-image-grid-on"></i> Grid</a>
                </li>
                <li><a href="css-color.html"><i class="mdi-editor-format-color-fill"></i> Color</a>
                </li>
                <li><a href="css-helpers.html"><i class="mdi-communication-live-help"></i> Helpers</a>
                </li>
                <li><a href="changelogs.html"><i class="mdi-action-swap-vert-circle"></i> Changelogs</a>
                </li>                    
                <li class="li-hover"><div class="divider"></div></li>
                <li class="li-hover"><p class="ultra-small margin more-text">Daily Sales</p></li>
                <li class="li-hover">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="sample-chart-wrapper">                            
                                <div class="ct-chart ct-golden-section" id="ct2-chart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-labels"><foreignObject style="overflow: visible;" x="45" y="104" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">1</span></foreignObject><foreignObject style="overflow: visible;" x="66" y="104" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">2</span></foreignObject><foreignObject style="overflow: visible;" x="87" y="104" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">3</span></foreignObject><foreignObject style="overflow: visible;" x="108" y="104" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">4</span></foreignObject><foreignObject style="overflow: visible;" x="129" y="104" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">5</span></foreignObject><foreignObject style="overflow: visible;" x="150" y="104" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">6</span></foreignObject><foreignObject style="overflow: visible;" x="171" y="104" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">7</span></foreignObject><foreignObject style="overflow: visible;" x="192" y="104" width="21" height="30"><span class="ct-label ct-horizontal" xmlns="http://www.w3.org/1999/xhtml">8</span></foreignObject><foreignObject style="overflow: visible;" y="84" x="-5" height="20.88888888888889" width="40"><span class="ct-label ct-vertical" xmlns="http://www.w3.org/1999/xhtml">0</span></foreignObject><foreignObject style="overflow: visible;" y="66.9090909090909" x="-5" height="20.88888888888889" width="40"><span class="ct-label ct-vertical" xmlns="http://www.w3.org/1999/xhtml">2</span></foreignObject><foreignObject style="overflow: visible;" y="49.81818181818181" x="-5" height="20.88888888888889" width="40"><span class="ct-label ct-vertical" xmlns="http://www.w3.org/1999/xhtml">4</span></foreignObject><foreignObject style="overflow: visible;" y="32.72727272727273" x="-5" height="20.88888888888889" width="40"><span class="ct-label ct-vertical" xmlns="http://www.w3.org/1999/xhtml">6</span></foreignObject><foreignObject style="overflow: visible;" y="15.63636363636364" x="-5" height="20.88888888888889" width="40"><span class="ct-label ct-vertical" xmlns="http://www.w3.org/1999/xhtml">8</span></foreignObject></g><g class="ct-grids"><line x1="45" x2="45" y1="5" y2="99" class="ct-grid ct-horizontal"></line><line x1="66" x2="66" y1="5" y2="99" class="ct-grid ct-horizontal"></line><line x1="87" x2="87" y1="5" y2="99" class="ct-grid ct-horizontal"></line><line x1="108" x2="108" y1="5" y2="99" class="ct-grid ct-horizontal"></line><line x1="129" x2="129" y1="5" y2="99" class="ct-grid ct-horizontal"></line><line x1="150" x2="150" y1="5" y2="99" class="ct-grid ct-horizontal"></line><line x1="171" x2="171" y1="5" y2="99" class="ct-grid ct-horizontal"></line><line x1="192" x2="192" y1="5" y2="99" class="ct-grid ct-horizontal"></line><line y1="99" y2="99" x1="45" x2="213" class="ct-grid ct-vertical"></line><line y1="81.9090909090909" y2="81.9090909090909" x1="45" x2="213" class="ct-grid ct-vertical"></line><line y1="64.81818181818181" y2="64.81818181818181" x1="45" x2="213" class="ct-grid ct-vertical"></line><line y1="47.72727272727273" y2="47.72727272727273" x1="45" x2="213" class="ct-grid ct-vertical"></line><line y1="30.63636363636364" y2="30.63636363636364" x1="45" x2="213" class="ct-grid ct-vertical"></line></g><g class="ct-series ct-series-a"><path d="M45,99L45,56.273C48.5,50.576,59,24.939,66,22.091C73,19.242,80,37.758,87,39.182C94,40.606,101,27.788,108,30.636C115,33.485,122,49.152,129,56.273C136,63.394,143,73.364,150,73.364C157,73.364,164,57.697,171,56.273C178,54.848,188.5,63.394,192,64.818L192,99" class="ct-area" values="5,9,7,8,5,3,5,4"></path><path d="M45,56.273C48.5,50.576,59,24.939,66,22.091C73,19.242,80,37.758,87,39.182C94,40.606,101,27.788,108,30.636C115,33.485,122,49.152,129,56.273C136,63.394,143,73.364,150,73.364C157,73.364,164,57.697,171,56.273C178,54.848,188.5,63.394,192,64.818" class="ct-line" values="5,9,7,8,5,3,5,4"></path><line x1="45" y1="56.27272727272727" x2="45.01" y2="56.27272727272727" class="ct-point" value="5"></line><line x1="66" y1="22.090909090909093" x2="66.01" y2="22.090909090909093" class="ct-point" value="9"></line><line x1="87" y1="39.18181818181818" x2="87.01" y2="39.18181818181818" class="ct-point" value="7"></line><line x1="108" y1="30.63636363636364" x2="108.01" y2="30.63636363636364" class="ct-point" value="8"></line><line x1="129" y1="56.27272727272727" x2="129.01" y2="56.27272727272727" class="ct-point" value="5"></line><line x1="150" y1="73.36363636363636" x2="150.01" y2="73.36363636363636" class="ct-point" value="3"></line><line x1="171" y1="56.27272727272727" x2="171.01" y2="56.27272727272727" class="ct-point" value="5"></line><line x1="192" y1="64.81818181818181" x2="192.01" y2="64.81818181818181" class="ct-point" value="4"></line></g></svg></div>
                            </div>
                        </div>
                    </div>
                </li>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 915px; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 639px;"></div></div></ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">


	        	<?= $content ?>


                <!--end container-->
            	</div>
            </section>
            <!-- END CONTENT -->



        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->
    
    
    <!-- START FOOTER -->
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2015-<?=date("Y"); ?> <a class="grey-text text-lighten-4" href="http://Www.73ChunK.Com" target="_blank">73ChunK.Com</a> All rights reserved.
                <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://LiYijun.com/">冷色调</a></span>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
