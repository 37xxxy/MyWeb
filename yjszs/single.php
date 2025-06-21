<?php get_header(); ?>
<!--网页主体部分 begin--> 
<div class="page-main-box"> 
	<div class="banner-c"></div>
	<div class="page-main-mbox"> 
	<div class="page-main"> 
	 <?php get_sidebar(); ?>
	 <div class="right-main-box-box"> 
	  <div class="right-main-box"> 
	   <div style="width:100%;height:43px;"></div> 
	   <div class="right-main">
			<div class="right-title">
	      当前位置：<?php wheatv_breadcrumbs(); ?>
	    </div>  
	    <div class="right-map"> 
	     <div class="left">
	     <?php if(is_single()){
			$category = get_the_category();
			echo $category[0]->cat_name;
			}
		  ?>
	     </div> 
	    </div> 
	    <div class="common-content"> 
	  	<?php if (have_posts()) : ?>                    
		<?php while (have_posts()) : the_post(); ?>
			<div class="essay-title"><?php the_title_attribute(); ?></div>
			<div class="essay-time">发布时间：<?php the_time('Y-m-d'); ?></div>
			<div class="essay-field"><?php the_content(); ?></div>
			<div class="next-page">
				<ul>
					<li><span class="blue">上一篇：</span><?php previous_post_link('%link','%title',true,''); ?></li>
					<li><span class="blue">下一篇：</span><?php next_post_link('%link','%title',true,''); ?></li>
				</ul>
			</div>
		<?php endwhile; ?>
		<?php else : ?>
		<?php endif; ?>
	    </div> 
	   </div> 
	  </div> 
	 </div> 
	 <div style="clear:both;"></div> 
	</div> 
	</div> 
</div> 
<!--网页主体部分 end--> 
<?php get_footer(); ?>