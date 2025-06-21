<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/images/favicon.ico" type="image/x-icon" />
  <title>
    <?php if (is_home()) { ?><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?><?php } ?>
    <?php if (is_search()) { ?>搜索结果 | <?php bloginfo('name'); ?><?php } ?>
    <?php if (is_single()) { ?><?php echo trim(wp_title('', 0)); ?> | <?php bloginfo('name'); ?><?php } ?>
    <?php if (is_page()) { ?><?php echo trim(wp_title('', 0)); ?> | <?php bloginfo('name'); ?><?php } ?>
    <?php if (is_category()) { ?><?php single_cat_title(); ?> | <?php bloginfo('name'); ?><?php } ?>
    <?php if (is_month()) { ?><?php the_time('F'); ?> | <?php bloginfo('name'); ?><?php } ?>
    <?php if (function_exists('is_tag')) {
      if (is_tag()) { ?>
        <?php single_tag_title("", true); ?> | <?php bloginfo('name'); ?><?php } ?> <?php } ?>
  </title>


	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/index.css"  type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/swiper.min.css" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/animate.min.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/public.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/category.css" />

  <?php wp_head(); ?>

  <!--banner-->
  <script src="<?php bloginfo('template_directory'); ?>/js/rem.js" type="text/javascript"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.8.3.min.js" type="text/javascript"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery.SuperSlide.2.1.1.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/main.js" type="text/javascript"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/wow.min.js" type="text/javascript"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/swiper.min.js" type="text/javascript"></script>
  <script>
    new WOW().init();
  </script>
</head>

<body>
  <!--[if lte IE 8]>
    <div class="top-browserupgrade">
      <p>您所使用的浏览器版本过低，为了能正常预览并使用网页，建议您将浏览器升级到最新版或使用更先进的浏览器再访问。</p>
      <p>
        推荐使用以下浏览器的最新版本。如果您的电脑已有以下浏览器则可直接使用。
        <span><a href="https://www.google.cn/chrome/thank-you.html?standalone=1&statcb=0&installdataindex=empty" target="_blank">谷歌浏览器</a></span>
        <span><a href="https://download.mozilla.org/?product=firefox-latest-ssl&os=win&lang=zh-CN" target="_blank">火狐浏览器</a></span>
        <span><a href="https://dl.360safe.com/netunion/20140425/360se+75526+n1abed0ce91.exe" target="_blank">360安全浏览器</a></span>
        <span><a href="https://dn-2345.cdn.bcebos.com/2345explorer/p8_k2345886_v2.0.exe" target="_blank">2345加速浏览器</a></span>
        <span><a href="https://qqbrowser-1251013107.file.myqcloud.com/QQBrowser_subid@100002_urlid@100002.exe" target="_blank">QQ浏览器</a></span>
      </p>
      <span id="closeBrowserUpgrade">关闭</span>
    </div>
    <![endif]-->
  <div class="header">
    <div class="container">
      <div class="logo">
        <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img class="img1" src="<?php bloginfo('template_directory'); ?>/images/logo.png" /></a>
      </div>
      <div class="additional-nav">
        <a href="https://web.fosu.edu.cn/yanjiusheng/" class="nav-link">研究生院</a>
        <a href="https://web.fosu.edu.cn/teaching-faculty" class="nav-link">招生学院</a>
      </div>
      <div class="an">
        <span class="a1"></span><span class="a2"></span><span class="a3"></span>
      </div>
      <div class="right">
        <div class="ss"></div>
      </div>
      <div class="search">
        <div class="box">
          <form action="<?php bloginfo('url'); ?>/" target="_blank">
            <input class="i_z" name="s" id="s" autocomplete="off" onfocus="if(value=='请输入关键字...') {value=''}" onblur="if (value=='') {value='请输入关键字...'}" value="请输入关键字..." />
            <button type="submit" class="s_c">
              <i class="iconfont icon-sousuo1"></i>
            </button>
            <div class="an_sj"><i class="iconfont icon-guanbi1"></i></div>
          </form>
        </div>
      </div>
      <div class="nav">
       <?php wp_nav_menu(array('theme_location' => 'PrimaryMenu', 'container_id' => 'nav-cont',  'container_class' => 'nav-cont', 'walker' => new new_walker(), 'depth' => 3)); ?>
        <div class="clear"></div>
      </div>
    </div>
  </div>
  <div class="head_h"></div>