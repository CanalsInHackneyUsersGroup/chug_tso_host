<!DOCTYPE html>
<html lang="en">
  <head>
    <title>C.H.U.G. - Canals in Hackney Users Group</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/jquery.fancybox/jquery.fancybox.css?v=2.0.3" />
    <script src="<?php bloginfo('template_directory'); ?>/lib/jquery.fancybox/jquery.fancybox.pack.js?v=2.0.3"></script>
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js">IE7_PNG_SUFFIX=".png";</script>
    <![endif]-->
    <script>
    $(document).ready(function(){
      $('.gallery a').fancybox();
    });
    </script>
  </head>
  <body>
    <div class="top">
      <div class="inner">
        <header id="header">
          <h1><a href="/home/"><img src="<?php bloginfo('template_directory'); ?>/img/logo-bw.png" alt="C.H.U.G." /></a></h1>
        </header>
        <div id="mission-statement"><?php the_field('mission_statement', 'options'); ?></div>
        <nav id="nav"><?php wp_nav_menu (array('menu'=>'custom_menu'));?></nav>
      </div>
    </div>
    <div class="main">
      <div class="inner">
          