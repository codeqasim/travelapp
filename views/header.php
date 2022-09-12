<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php if(isset($title)){echo $title;} ?></title>
<link rel="shortcut icon" href="./assets/img/favicon.png">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta http-equiv="Cache-control" content="private">
<link rel="shortcut icon" href="./assets/img/favicon.png">
<link rel="stylesheet" href="./assets/css/layui.css" />
<link rel="stylesheet" href="./assets/css/style.css" />
<script type="text/javascript" src="./assets/jquery-3.6.1.min.js"></script>

<script>setTimeout(function() { $('.bodyload').fadeOut(); }, 10);</script>
</head>

<body>

<div class="layui-layout layui-layout-admin">


<div class="layui-header">
    <div class="layui-logo layui-hide-xs layui-bg-black">Control Panel</div>

    <ul class="layui-nav layui-layout-left">
 
      <li class="layui-nav-item layui-show-xs-inline-block layui-hide-sm" lay-header-event="menuLeft">
        <i class="layui-icon layui-icon-spread-left"></i>
      </li>
      
      <li class="layui-nav-item layui-hide-xs"><a href="">nav 1</a></li>
      <li class="layui-nav-item layui-hide-xs"><a href="">nav 2</a></li>
      <li class="layui-nav-item layui-hide-xs"><a href="">nav 3</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">nav groups</a>
        <dl class="layui-nav-child">
          <dd><a href="">menu 11</a></dd>
          <dd><a href="">menu 22</a></dd>
          <dd><a href="">menu 33</a></dd>
        </dl>
      </li>
    </ul>

    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item layui-hide layui-show-md-inline-block">
        <a href="javascript:;">
          <img src="https://qasimhussain.com/img/qasim.png" class="layui-nav-img">
          Super Admin
        </a>
        <dl class="layui-nav-child">
          <dd><a href="./profile">Profile</a></dd>
          <dd><a href="./settings">Settings</a></dd>
          <dd><a href="./logout">Logout</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item" lay-header-event="menuRight" lay-unselect>
        <a href="javascript:;">
          <i class="layui-icon layui-icon-more-vertical"></i>
        </a>
      </li>
    </ul>
  </div>

  <!-- SIDEBAR -->

  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree" lay-filter="test">
        <li class="layui-nav-item"><a href="./dashboard">
          <svg opacity="0.8" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
          Dashboard</a></li>
        <li class="layui-nav-item #layui-nav-itemed">
          <a class="" href="javascript:;">
            <svg opacity="0.8" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            Settings</a>
          <dl class="layui-nav-child">
            <dd><a href="./settings">General Settings</a></dd>
            <dd><a href="./modules">Modules</a></dd>
            <dd><a href="./payment-gateways">Payment Gateways</a></dd>
            <dd><a href=".currencies">Currencies</a></dd>
            <dd><a href="./languages">Languages</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">
            <svg width="18" height="18" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="nav-inactive-icon"><g opacity="0.8"><g clip-path="url(#clip0)"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.69 12.2V13.43C11.6913 13.5083 11.677 13.5861 11.6479 13.6588C11.6189 13.7316 11.5756 13.7978 11.5207 13.8537C11.4658 13.9095 11.4003 13.9538 11.3281 13.9841C11.2559 14.0144 11.1783 14.03 11.1 14.03C10.9408 14.03 10.7882 13.9668 10.6757 13.8542C10.5632 13.7417 10.5 13.5891 10.5 13.43V12.2C10.5 11.7014 10.3019 11.2232 9.94931 10.8706C9.59674 10.5181 9.11857 10.32 8.61996 10.32H3.66995C3.17308 10.3226 2.69748 10.5218 2.34708 10.8741C1.99667 11.2264 1.79995 11.7031 1.79996 12.2V13.43C1.79996 13.5891 1.73676 13.7417 1.62424 13.8542C1.51172 13.9668 1.35908 14.03 1.19995 14.03C1.04082 14.03 0.888218 13.9668 0.775696 13.8542C0.663174 13.7417 0.599976 13.5891 0.599976 13.43V12.2C0.599976 11.3858 0.923409 10.6049 1.49915 10.0292C2.07488 9.45342 2.85574 9.12996 3.66995 9.12996H8.61996C9.02349 9.12864 9.42329 9.20716 9.79636 9.36098C10.1694 9.51479 10.5084 9.74086 10.7937 10.0262C11.0791 10.3115 11.3051 10.6505 11.459 11.0236C11.6128 11.3966 11.6913 11.7964 11.69 12.2Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M6.11993 1.70001C5.51274 1.70001 4.91919 1.88007 4.41433 2.21741C3.90948 2.55474 3.51599 3.03422 3.28363 3.59518C3.05127 4.15615 2.99046 4.77341 3.10891 5.36893C3.22737 5.96445 3.51978 6.51148 3.94912 6.94083C4.37847 7.37017 4.92547 7.66258 5.52099 7.78104C6.11651 7.89949 6.7338 7.83868 7.29477 7.60632C7.85574 7.37396 8.33521 6.98048 8.67254 6.47562C9.00988 5.97076 9.18994 5.37721 9.18994 4.77002C9.1873 3.95662 8.863 3.17728 8.28784 2.60211C7.71267 2.02695 6.93333 1.70265 6.11993 1.70001ZM6.11993 6.65002C5.7481 6.65002 5.38463 6.53977 5.07547 6.33319C4.7663 6.12661 4.52532 5.833 4.38302 5.48947C4.24073 5.14595 4.20352 4.76794 4.27606 4.40326C4.3486 4.03857 4.52766 3.70357 4.79059 3.44064C5.05351 3.17772 5.38849 2.99869 5.75317 2.92615C6.11786 2.85361 6.49586 2.89082 6.83938 3.03311C7.18291 3.1754 7.47653 3.41639 7.6831 3.72556C7.88968 4.03472 7.99994 4.39819 7.99994 4.77002C7.99994 5.26863 7.80184 5.7468 7.44928 6.09937C7.09671 6.45193 6.61854 6.65002 6.11993 6.65002Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.4 12.2V13.43C15.4013 13.5083 15.387 13.5861 15.358 13.6588C15.3289 13.7316 15.2857 13.7978 15.2307 13.8537C15.1758 13.9095 15.1103 13.9538 15.0381 13.9841C14.9658 14.0144 14.8883 14.03 14.81 14.03C14.6508 14.03 14.4982 13.9668 14.3857 13.8542C14.2732 13.7417 14.21 13.5891 14.21 13.43V12.2C14.2116 11.7828 14.0737 11.377 13.8182 11.0473C13.5627 10.7175 13.2043 10.4826 12.7999 10.38C12.6463 10.34 12.5147 10.2407 12.4341 10.1038C12.3535 9.967 12.3304 9.80379 12.37 9.64998C12.3904 9.5744 12.4257 9.50363 12.4738 9.44182C12.5218 9.38001 12.5817 9.32839 12.65 9.28996C12.7395 9.23337 12.8441 9.20547 12.9499 9.20998C12.9995 9.20027 13.0504 9.20027 13.1 9.20998C13.7623 9.37977 14.3486 9.76646 14.7655 10.3084C15.1824 10.8503 15.4057 11.5163 15.4 12.2Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M12.93 4.78002C12.9357 5.46632 12.7113 6.13472 12.2925 6.67851C11.8738 7.22231 11.285 7.61013 10.62 7.78002C10.5447 7.80023 10.4662 7.80533 10.389 7.79503C10.3118 7.78473 10.2373 7.75921 10.17 7.71999C10.0353 7.63641 9.9385 7.50372 9.89998 7.34999C9.87977 7.27474 9.87467 7.19624 9.88497 7.119C9.89527 7.04177 9.92076 6.96734 9.95998 6.90001C10.0443 6.76608 10.1767 6.66946 10.33 6.62999C10.7333 6.52559 11.0905 6.29019 11.3454 5.96077C11.6004 5.63135 11.7388 5.2266 11.7388 4.81001C11.7388 4.39343 11.6004 3.98865 11.3454 3.65923C11.0905 3.32981 10.7333 3.09441 10.33 2.99001C10.176 2.94624 10.0439 2.84634 9.95998 2.71001C9.92023 2.64289 9.89442 2.56843 9.88411 2.49111C9.8738 2.41378 9.87921 2.33518 9.89998 2.26C9.91867 2.18428 9.95219 2.11302 9.99858 2.05034C10.045 1.98766 10.1033 1.93481 10.1703 1.89482C10.2372 1.85484 10.3115 1.82849 10.3887 1.81737C10.4658 1.80625 10.5445 1.81055 10.62 1.83C11.2767 1.99777 11.8594 2.3781 12.2772 2.91173C12.6951 3.44535 12.9246 4.10228 12.93 4.78002Z" fill="white"></path></g></g><defs><clipPath id="clip0"><rect width="14.8" height="12.33" fill="white" transform="translate(0.599976 1.70001)"></rect></clipPath></defs></svg>
            Users
          </a>
          <dl class="layui-nav-child">
            <dd><a href="./users/all">All Users</a></dd>
            <dd><a href="./users/admins">Admins</a></dd>
            <dd><a href="./users/suppliers">Suppliers</a></dd>
            <dd><a href="./users/agents">Agents</a></dd>
            <dd><a href="./users/customers">Customers</a></dd>
          </dl>
        </li>
        <!-- <li class="layui-nav-item"><a href="">the links</a></li> -->
      </ul>
    </div>
</div>

<div class="layui-body" id="content">

<!-- CONTENT -->
<div style="padding: 15px;">