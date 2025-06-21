<?php get_header(); ?>


<div class="clear"></div>
<div class="page-main-box"> 
 <div class="banner-c"></div>
 <div class="page-main-mbox"> 
  <div class="page-main"> 
   <div class="search-page-box"> 
    <div class="right-main-box"> 
     <div style="width:100%;height:43px;"></div> 
     <div class="search-page-box right-main">
      <div class="right-title">
        当前位置：搜索结果
      </div>  
      <div class="right-map"> 
       <div class="left">
       搜索结果
       </div> 
       
      </div> 
      <ul class="essay-list"> 

      <?php $posts = query_posts($query_string . '&orderby=date&showposts=10'); ?>
      <?php query_posts(array("category__in"=>array(get_query_var("cat")), "post__in" => get_option("sticky_posts")));while(have_posts()) : the_post(); ?>
      <a href="<?php the_permalink(); ?>"><li><span class="list-title">[置顶]<?php echo wp_trim_words( get_the_title(), 48 );?></span> <span class="list-time"><?php echo the_time('Y-m-d');?></span></li></a>
      <?php endwhile;wp_reset_query();?>
      <?php while(have_posts()) : the_post(); ?><?php if(!is_sticky()){?>
      <a href="<?php the_permalink(); ?>"><li><span class="list-title"><?php echo wp_trim_words( get_the_title(), 48 );?></span> <span class="list-time"><?php echo the_time('Y-m-d');?></span></li></a>
      <?php } endwhile;?>
      <?php if(!have_posts()): ?>
      <h3>暂未发布文章</h3>
      <?php endif; ?>  


      </ul> 
      <div style="" class="pagedao pagedao1">
      <center><?php par_pagenavi(5); ?></center>
      </div>
      <div style="" class="pagedao pagedao2">
      <center><?php par_pagenavi(2); ?></center>
      </div>
      <div class="pagedao"> 
       <ul> 
       </ul> 
      </div> 
     </div> 
    </div> 
   </div> 
   <div style="clear:both;"></div> 
  </div> 
  <div style="width:auto;height:40px;"></div>
 </div> 
</div> 

<?php get_footer(); ?>