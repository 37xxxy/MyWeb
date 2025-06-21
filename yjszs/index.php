<?php get_header(); ?>
<!-- 轮播图开始 -->
<div class="swiper-container gallery-top">
  <div class="swiper-wrapper">
    <?php query_posts(array('category_name' => 'syhdp', 'orderby' => 'date', 'order' => 'DSC', 'posts_per_page' => 6)); ?>
    <?php while (have_posts()) : the_post(); ?>
      <div
        class="swiper-slide"
        style="background: url(<?php getArticleImgUrl($post->post_content); ?>) center / cover no-repeat">
        <a href="<?php the_permalink(); ?>"></a>
      </div>
    <?php endwhile; ?>
    <?php // 重置文章数; 
    ?>
    <?php wp_reset_query() ?>
  </div>
  <div class="swiper-pagination"></div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
		<div class="default_circle"><a href="#xw"></a></div>
</div>
<!-- 栏目开始 -->

<div class="content">
 <div class="sy_xw" id="xw">
 	<div class="con">
 		<div class="box">
			<div class="tit">
				<div class="t_p"><img src="<?php bloginfo('template_directory'); ?>/images/yjs.jpg" alt=""></div>
				<div class="mb">
					<div class="zi">
						<a href="<?php echo esc_url(get_category_link(get_cat_ID('硕士招生'))); ?>" title="精彩不断，阅读更多">
							<h1>硕士招生</h1>
							<h3>Master</h3>
						</a>
					</div>
						
				</div>
			</div>
			<div class="xx1">
				<div class="hd">
					<ul>
						<li>通知公告</li>
						<li>简章目录</li>
						<li>考试大纲</li>
						<li>报名初试</li>
						<li>文件规定</li>
						<li>表格下载</li>
						<li>联系我们</li>
					</ul>
				</div>
				<div class="bd">
					<div class="xx11">
						<div>
							<div class="list">
								<ul>
									<?php $showSingleSum = 6; ?>
									<?php $stickyPage = 0; ?>
									<?php query_posts(array("category_name" => "sszs_tzgg", "post__in" => get_option("sticky_posts")));
									while (have_posts()) : the_post(); ?>
											<?php if ($stickyPage < $showSingleSum) : ?>
													<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
											<?php endif; ?>
											<?php $stickyPage++; ?>
									<?php endwhile;
									wp_reset_query(); ?>

									<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
									<?php if ($notStickyPage) :
											query_posts(array('category_name' => 'sszs_tzgg', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
											<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
															<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
													<?php endwhile; ?>
													<!-- post navigation -->
											<?php else : ?>
													<h3>正在维护中……</h3>
											<?php endif; ?>
											<?php wp_reset_query() ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
						<div>
							<div class="list">
								<ul>
									<?php $showSingleSum = 6; ?>
									<?php $stickyPage = 0; ?>
									<?php query_posts(array("category_name" => "sszs_jzml", "post__in" => get_option("sticky_posts")));
									while (have_posts()) : the_post(); ?>
											<?php if ($stickyPage < $showSingleSum) : ?>
													<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
											<?php endif; ?>
											<?php $stickyPage++; ?>
									<?php endwhile;
									wp_reset_query(); ?>

									<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
									<?php if ($notStickyPage) :
											query_posts(array('category_name' => 'sszs_jzml', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
											<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
															<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
													<?php endwhile; ?>
													<!-- post navigation -->
											<?php else : ?>
													<h3>正在维护中……</h3>
											<?php endif; ?>
											<?php wp_reset_query() ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
						<div>
							<div class="list">
								<ul>
									<?php $showSingleSum = 6; ?>
									<?php $stickyPage = 0; ?>
									<?php query_posts(array("category_name" => "sszs_ksdg", "post__in" => get_option("sticky_posts")));
									while (have_posts()) : the_post(); ?>
											<?php if ($stickyPage < $showSingleSum) : ?>
													<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
											<?php endif; ?>
											<?php $stickyPage++; ?>
									<?php endwhile;
									wp_reset_query(); ?>

									<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
									<?php if ($notStickyPage) :
											query_posts(array('category_name' => 'sszs_ksdg', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
											<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
															<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
													<?php endwhile; ?>
													<!-- post navigation -->
											<?php else : ?>
													<h3>正在维护中……</h3>
											<?php endif; ?>
											<?php wp_reset_query() ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
						<div>
							<div class="list">
								<ul>
									<?php $showSingleSum = 6; ?>
									<?php $stickyPage = 0; ?>
									<?php query_posts(array("category_name" => "sszs_bmcs", "post__in" => get_option("sticky_posts")));
									while (have_posts()) : the_post(); ?>
											<?php if ($stickyPage < $showSingleSum) : ?>
													<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
											<?php endif; ?>
											<?php $stickyPage++; ?>
									<?php endwhile;
									wp_reset_query(); ?>

									<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
									<?php if ($notStickyPage) :
											query_posts(array('category_name' => 'sszs_bmcs', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
											<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
															<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
													<?php endwhile; ?>
													<!-- post navigation -->
											<?php else : ?>
													<h3>正在维护中……</h3>
											<?php endif; ?>
											<?php wp_reset_query() ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
						<div>
							<div class="list">
								<ul>
									<?php $showSingleSum = 6; ?>
									<?php $stickyPage = 0; ?>
									<?php query_posts(array("category_name" => "sszs_wjgd", "post__in" => get_option("sticky_posts")));
									while (have_posts()) : the_post(); ?>
											<?php if ($stickyPage < $showSingleSum) : ?>
													<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
											<?php endif; ?>
											<?php $stickyPage++; ?>
									<?php endwhile;
									wp_reset_query(); ?>

									<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
									<?php if ($notStickyPage) :
											query_posts(array('category_name' => 'sszs_wjgd', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
											<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
															<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
													<?php endwhile; ?>
													<!-- post navigation -->
											<?php else : ?>
													<h3>正在维护中……</h3>
											<?php endif; ?>
											<?php wp_reset_query() ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
						<div>
							<div class="list">
								<ul>
									<?php $showSingleSum = 6; ?>
									<?php $stickyPage = 0; ?>
									<?php query_posts(array("category_name" => "sszs_bgxz", "post__in" => get_option("sticky_posts")));
									while (have_posts()) : the_post(); ?>
											<?php if ($stickyPage < $showSingleSum) : ?>
													<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
											<?php endif; ?>
											<?php $stickyPage++; ?>
									<?php endwhile;
									wp_reset_query(); ?>

									<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
									<?php if ($notStickyPage) :
											query_posts(array('category_name' => 'sszs_bgxz', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
											<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
															<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
													<?php endwhile; ?>
													<!-- post navigation -->
											<?php else : ?>
													<h3>正在维护中……</h3>
											<?php endif; ?>
											<?php wp_reset_query() ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
						<div>
							<div class="list">
								<ul>
									<?php $showSingleSum = 6; ?>
									<?php $stickyPage = 0; ?>
									<?php query_posts(array("category_name" => "sszs_lxwm", "post__in" => get_option("sticky_posts")));
									while (have_posts()) : the_post(); ?>
											<?php if ($stickyPage < $showSingleSum) : ?>
													<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
											<?php endif; ?>
											<?php $stickyPage++; ?>
									<?php endwhile;
									wp_reset_query(); ?>

									<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
									<?php if ($notStickyPage) :
											query_posts(array('category_name' => 'sszs_lxwm', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
											<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
															<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
													<?php endwhile; ?>
													<!-- post navigation -->
											<?php else : ?>
													<h3>正在维护中……</h3>
											<?php endif; ?>
											<?php wp_reset_query() ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				jQuery(".xx1").slide({mainCell:".bd .xx11",effect:"fade",autoPlay:false,trigger:"click"});
			</script>
		</div>
 		
		<div class="box">
				<div class="tit">
					<div class="t_p"><img src="<?php bloginfo('template_directory'); ?>/images/bs.jpg" alt=""></div>
					<div class="mb">
						<div class="zi">
							<a href="<?php echo esc_url(get_category_link(get_cat_ID('博士招生'))); ?>" title="精彩不断，阅读更多">
								<h1>博士招生</h1>
								<h3>Doctor</h3>
							</a>
						</div>
					</div>
				</div>
				<div class="xx2">
					<div class="hd">
						<ul>
							<li>通知公告</li>
							<li>简章目录</li>
							<li>申请考核</li>
							<li>硕博连读</li>
							<li>直接攻博</li>
							<li>表格下载</li>
							<li>联系我们</li>
						</ul>
					</div>
					<div class="bd">
						<div class="xx11">
							<div>
								<div class="list">
									<ul>
										<?php $showSingleSum = 6; ?>
										<?php $stickyPage = 0; ?>
										<?php query_posts(array("category_name" => "bszs_tzgg", "post__in" => get_option("sticky_posts")));
										while (have_posts()) : the_post(); ?>
												<?php if ($stickyPage < $showSingleSum) : ?>
														<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
												<?php endif; ?>
												<?php $stickyPage++; ?>
										<?php endwhile;
										wp_reset_query(); ?>

										<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
										<?php if ($notStickyPage) :
												query_posts(array('category_name' => 'bszs_tzgg', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
												<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
																<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
														<?php endwhile; ?>
														<!-- post navigation -->
												<?php else : ?>
														<h3>正在维护中……</h3>
												<?php endif; ?>
												<?php wp_reset_query() ?>
										<?php endif; ?>
									</ul>
								</div>
							</div>
							<div>
								<div class="list">
									<ul>
										<?php $showSingleSum = 6; ?>
										<?php $stickyPage = 0; ?>
										<?php query_posts(array("category_name" => "bszs_jzml", "post__in" => get_option("sticky_posts")));
										while (have_posts()) : the_post(); ?>
												<?php if ($stickyPage < $showSingleSum) : ?>
														<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
												<?php endif; ?>
												<?php $stickyPage++; ?>
										<?php endwhile;
										wp_reset_query(); ?>

										<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
										<?php if ($notStickyPage) :
												query_posts(array('category_name' => 'bszs_jzml', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
												<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
																<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
														<?php endwhile; ?>
														<!-- post navigation -->
												<?php else : ?>
														<h3>正在维护中……</h3>
												<?php endif; ?>
												<?php wp_reset_query() ?>
										<?php endif; ?>
									</ul>
								</div>
							</div>
							<div>
								<div class="list">
									<ul>
										<?php $showSingleSum = 6; ?>
										<?php $stickyPage = 0; ?>
										<?php query_posts(array("category_name" => "bszs_sqkh", "post__in" => get_option("sticky_posts")));
										while (have_posts()) : the_post(); ?>
												<?php if ($stickyPage < $showSingleSum) : ?>
														<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
												<?php endif; ?>
												<?php $stickyPage++; ?>
										<?php endwhile;
										wp_reset_query(); ?>

										<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
										<?php if ($notStickyPage) :
												query_posts(array('category_name' => 'bszs_sqkh', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
												<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
																<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
														<?php endwhile; ?>
														<!-- post navigation -->
												<?php else : ?>
														<h3>正在维护中……</h3>
												<?php endif; ?>
												<?php wp_reset_query() ?>
										<?php endif; ?>
									</ul>
								</div>
							</div>
							<div>
								<div class="list">
									<ul>
										<?php $showSingleSum = 6; ?>
										<?php $stickyPage = 0; ?>
										<?php query_posts(array("category_name" => "bszs_sbld", "post__in" => get_option("sticky_posts")));
										while (have_posts()) : the_post(); ?>
												<?php if ($stickyPage < $showSingleSum) : ?>
														<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
												<?php endif; ?>
												<?php $stickyPage++; ?>
										<?php endwhile;
										wp_reset_query(); ?>

										<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
										<?php if ($notStickyPage) :
												query_posts(array('category_name' => 'bszs_sbld', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
												<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
																<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
														<?php endwhile; ?>
														<!-- post navigation -->
												<?php else : ?>
														<h3>正在维护中……</h3>
												<?php endif; ?>
												<?php wp_reset_query() ?>
										<?php endif; ?>
									</ul>
								</div>
							</div>
							<div>
								<div class="list">
									<ul>
										<?php $showSingleSum = 6; ?>
										<?php $stickyPage = 0; ?>
										<?php query_posts(array("category_name" => "bszs_zjgb", "post__in" => get_option("sticky_posts")));
										while (have_posts()) : the_post(); ?>
												<?php if ($stickyPage < $showSingleSum) : ?>
														<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
												<?php endif; ?>
												<?php $stickyPage++; ?>
										<?php endwhile;
										wp_reset_query(); ?>

										<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
										<?php if ($notStickyPage) :
												query_posts(array('category_name' => 'bszs_zjgb', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
												<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
																<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
														<?php endwhile; ?>
														<!-- post navigation -->
												<?php else : ?>
														<h3>正在维护中……</h3>
												<?php endif; ?>
												<?php wp_reset_query() ?>
										<?php endif; ?>
									</ul>
								</div>
							</div>
							<div>
								<div class="list">
									<ul>
										<?php $showSingleSum = 6; ?>
										<?php $stickyPage = 0; ?>
										<?php query_posts(array("category_name" => "bszs_bgxz", "post__in" => get_option("sticky_posts")));
										while (have_posts()) : the_post(); ?>
												<?php if ($stickyPage < $showSingleSum) : ?>
														<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
												<?php endif; ?>
												<?php $stickyPage++; ?>
										<?php endwhile;
										wp_reset_query(); ?>

										<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
										<?php if ($notStickyPage) :
												query_posts(array('category_name' => 'bszs_bgxz', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
												<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
																<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
														<?php endwhile; ?>
														<!-- post navigation -->
												<?php else : ?>
														<h3>正在维护中……</h3>
												<?php endif; ?>
												<?php wp_reset_query() ?>
										<?php endif; ?>
									</ul>
								</div>
							</div>
							<div>
								<div class="list">
									<ul>
										<?php $showSingleSum = 6; ?>
										<?php $stickyPage = 0; ?>
										<?php query_posts(array("category_name" => "bszs_lxwm", "post__in" => get_option("sticky_posts")));
										while (have_posts()) : the_post(); ?>
												<?php if ($stickyPage < $showSingleSum) : ?>
														<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
												<?php endif; ?>
												<?php $stickyPage++; ?>
										<?php endwhile;
										wp_reset_query(); ?>

										<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
										<?php if ($notStickyPage) :
												query_posts(array('category_name' => 'bszs_lxwm', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
												<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
																<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
														<?php endwhile; ?>
														<!-- post navigation -->
												<?php else : ?>
														<h3>正在维护中……</h3>
												<?php endif; ?>
												<?php wp_reset_query() ?>
										<?php endif; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					jQuery(".xx2").slide({mainCell:".bd .xx11",effect:"fade",autoPlay:false,trigger:"click"});
				</script>
		</div>
 	</div>
 </div>

	<div class="sy_zt">
	 <div class="section-title container">
                        <h3>研招<span>宣传</span></h3>
                        <span class="line"></span>
                     <div class="more"><a href="<?php echo esc_url(get_category_link(get_cat_ID('研招宣传'))); ?>" title="精彩不断，阅读更多">查看更多</a></div>
                    </div>
		<div class="con">
		
		
		<div class="box">
			<div class="list">
		<ul>
			<?php $showSingleSum = 6; ?>
			<?php $stickyPage = 0; ?>
			<?php query_posts(array("category_name" => "yzxc", "post__in" => get_option("sticky_posts")));
			while (have_posts()) : the_post(); ?>
					<?php if ($stickyPage < $showSingleSum) : ?>
							<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
					<?php endif; ?>
					<?php $stickyPage++; ?>
			<?php endwhile;
			wp_reset_query(); ?>

			<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
			<?php if ($notStickyPage) :
					query_posts(array('category_name' => 'yzxc', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
							<?php endwhile; ?>
							<!-- post navigation -->
					<?php else : ?>
							<h3>正在维护中……</h3>
					<?php endif; ?>
					<?php wp_reset_query() ?>
			<?php endif; ?>
    </ul>
</div>
		</div>
		<div class="box">
			<div class="list">
		<ul>
			<?php $showSingleSum = 6; ?>
			<?php $stickyPage = 0; ?>
			<?php query_posts(array("category_name" => "yzxc", "post__in" => get_option("sticky_posts")));
			while (have_posts()) : the_post(); ?>
					<?php if ($stickyPage < $showSingleSum) : ?>
							<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">【置顶】<?php echo wp_trim_words(get_the_title(), 44); ?></a></p></li>
					<?php endif; ?>
					<?php $stickyPage++; ?>
			<?php endwhile;
			wp_reset_query(); ?>

			<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
			<?php if ($notStickyPage) :
					query_posts(array('category_name' => 'yzxc', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage,'offset' => 6)); ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<li><span class="time"><?php echo the_time('Y-m-d'); ?></span><p class="desc"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 50); ?></a></p></li>
							<?php endwhile; ?>
							<!-- post navigation -->
					<?php else : ?>
							<h3>正在维护中……</h3>
					<?php endif; ?>
					<?php wp_reset_query() ?>
			<?php endif; ?>
    </ul>
</div>
		</div>
		
		
		</div>
	</div>
<div class="sy_yjs">
	<div class="con">
		 <div class="section-title">
                        <h3>研究生<span>成果</span></h3>
                        <span class="line"></span>
                     <div class="more"><a href="<?php echo esc_url(get_category_link(get_cat_ID('研究生成果'))); ?>" title="精彩不断，阅读更多">查看更多</a></div>
                    </div>
											<ul>
												<?php $showSingleSum = 4; ?>
												<?php $stickyPage = 0; ?>
												<?php query_posts(array("category_name" => "yjscg", "post__in" => get_option("sticky_posts")));
												while (have_posts()) : the_post(); ?>
														<?php if ($stickyPage < $showSingleSum) : ?>
																<li>
																	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
																			<div class="tp"><img src="<?php getArticleImgUrl($post->post_content) ?>" alt=""></div>
																			<div class="wenz">
																				<h3>【置顶】<?php the_title_attribute(); ?></h3>
																				<h4><i class="iconfont icon-shijian-xianxing"></i><?php echo get_the_date('Y年m月d日') . ' ' . get_the_time('H:i'); ?></h4>
																		</div>
																	</a>
																</li>
														<?php endif; ?>
														<?php $stickyPage++; ?>
												<?php endwhile;
												wp_reset_query(); ?>

												<?php $notStickyPage = $stickyPage > $showSingleSum ? 0 : $showSingleSum - $stickyPage ?>
												<?php if ($notStickyPage) :
														query_posts(array('category_name' => 'yjscg', 'orderby' => 'date', 'order' => 'DSC', "post__not_in" => get_option("sticky_posts"), 'posts_per_page' => $notStickyPage)); ?>
														<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
																		<li>
																			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
																					<div class="tp"><img src="<?php getArticleImgUrl($post->post_content) ?>" alt=""></div>
																					<div class="wenz">
																						<h3><?php the_title_attribute(); ?></h3>
																						<h4><i class="iconfont icon-shijian-xianxing"></i><?php echo get_the_date('Y年m月d日') . ' ' . get_the_time('H:i'); ?></h4>
																				</div>
																			</a>
																		</li>
																<?php endwhile; ?>
																<!-- post navigation -->
														<?php else : ?>
																<h3>正在维护中……</h3>
														<?php endif; ?>
														<?php wp_reset_query() ?>
												<?php endif; ?>
											</ul>



		
	</div>
</div>

 	<div class="pc_all honor">
	<div class="con clearer">
		 <div class="section-title">
                        <h3>卓越<span>工程师</span></h3>
                        <span class="line"></span>
												<div class="more"><a href="<?php echo esc_url(get_category_link(get_cat_ID('卓越工程师'))); ?>" title="精彩不断，阅读更多">查看更多</a></div>			
                    </div>
		<!-- Swiper -->
		<div class="swiper-container rongyu ">			
			<div class="swiper-wrapper">
				<?php query_posts(array('category_name' => 'zygcs', 'orderby' => 'date', 'order' => 'DSC', 'posts_per_page' => 6)); ?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="swiper-slide">
						<a href="<?php the_permalink(); ?>">
							<img src="<?php getArticleImgUrl($post->post_content) ?>" alt="">
						</a>
					</div>
				<?php endwhile; ?>
				<?php // 重置文章数; 
				?>
				<?php wp_reset_query() ?>
			</div>
			<!-- Add Arrows -->
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>
	

		
	</div>
</div>


</div>
<div class="z_fd">
	<ul>
		<li>
			<a href="https://yz.chsi.com.cn/apply/cjcx/"><img src="<?php bloginfo('template_directory'); ?>/images/cx.png">
			<p>初试查询</p></a>
		</li>
		<li>
			<a href="https://yz.chsi.com.cn/bsbm/">
				<img src="<?php bloginfo('template_directory'); ?>/images/bk.png">
			<p>博士报名</p>
			</a>
		</li>
		<li>
			<a href="#">
				<img src="<?php bloginfo('template_directory'); ?>/images/sj.png">
			<p>录取数据</p>
			</a>
		</li>
		
	</ul>
</div>
<div class="r_fd">
<img src="<?php bloginfo('template_directory'); ?>/images/znzx.png" class="zxt">
	<ul>
		<li>
			<a href="https://robot.360eol.com/robot/homePage/chatIndex?schoolId=pcPaK2au9Ic%3D&type=2">
			<p>智能咨询</p></a>
		</li>
		<li class="has-qr">
			<a href="#">
			<p>学校官微</p>
			</a>
			<!-- 新增二维码容器 -->
      <div class="qr-code left">
        <img src="<?php bloginfo('template_directory'); ?>/images/gw.jpg" alt="学校官微二维码">
        <p>佛大官微</p>
      </div>
		</li>
		<li class="has-qr">
			<a href="#">
			<p>研招官微</p>
			</a>
			<!-- 新增二维码容器 -->
      <div class="qr-code left">
        <img src="<?php bloginfo('template_directory'); ?>/images/yzgw.jpg" alt="研招官微二维码">
        <p>研招官微</p>
      </div>
		</li>													
	</ul>
</div>

<?php get_footer(); ?>