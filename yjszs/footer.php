<!-- 底部开始 -->
<div class="footer_bg">
	<div class="con">
		
		<div class="wz">
邮箱：fosuyzb@fosu.edu.cn <br />
                                            
地址： 广东省佛山市南海区狮山镇广云路33号  <br />
研究生招生电话： &nbsp;0757-82771159&nbsp; <br />
(工作日&nbsp;08:00-11:30&nbsp;&nbsp;13:30-16:30&nbsp;寒暑假除外)<br />
 
研究生工作部：   0757-82982297  <br />                                                         
全日制本科招生： 0757-83989841 </div>
		<div class="fl link"><h3>友情链接</h3>
<a href="https://www.fosu.edu.cn/" target="_blank" title="" class="fl">佛山大学</a>
<a href="https://web.fosu.edu.cn/yanjiusheng/" class="fl">佛山大学研究生院</a>
<a href="https://web.fosu.edu.cn/teaching-faculty" class="fl">招生学院</a>
<a href="#" class="fl">中国研究生招生信息网</a>
<a href="#" class="fl">广东省教育考试院</a>
<a href="https://zsb.fosu.edu.cn/" class="fl">佛山大学本科招生网</a>
</div>
		<div class="ewm">
			<li>
			
				<img src="<?php bloginfo('template_directory'); ?>/images/yzgw.jpg">
				<p>研招官微</p>
			</li>
			<li>
			
				<img src="<?php bloginfo('template_directory'); ?>/images/gw.jpg">
				<p>佛大官微</p>
			</li>
			
		</div>
	

	</div>
	<div class="clear"></div>
	<div class="banq">
		Copyright © 2025 佛山大学研究生院 版权所有
	</div>
</div>
<div class="kjcd_wap">
	<li class="cd">
	<div class="y_j">
		<a href="javascript:void(0);">
			<img src="<?php bloginfo('template_directory'); ?>/images/cd_sj.png">
			<p>快捷导航</p>
		</a>
	</div>
		
		
<div class="z_fdsj son">
	<dl>
		<dt>
			<a href="https://yz.chsi.com.cn/apply/cjcx/"><img src="<?php bloginfo('template_directory'); ?>/images/cx.png">
			<p>初试查询</p></a>
		</dt>
		<dt>
			<a href="https://yz.chsi.com.cn/bsbm/">
				<img src="<?php bloginfo('template_directory'); ?>/images/bk.png">
			<p>博士报名</p>
			</a>
		</dt>
		<dt>
			<a href="#">
				<img src="<?php bloginfo('template_directory'); ?>/images/sj.png">
			<p>录取数据</p>
			</a>
		</dt>
		
	</dl>
</div>
		

	</li>
	<li class="zxsj">
	<div class="y_j">
		<a href="javascript:void(0);">
			<img src="<?php bloginfo('template_directory'); ?>/images/zx_sj.png">
			<p>智能咨询</p>
		</a>
	</div>
		
		<div class="r_fdsj son">

	<dl>
		<dt>
			<a href="https://robot.360eol.com/robot/homePage/chatIndex?schoolId=pcPaK2au9Ic%3D&type=2">
			<p>智能咨询</p></a>
		</dt>
		<dt class="ewm">
			<a href="#">
			<p>学校官微</p>
			</a>
		</dt>
		<dt class="ewm">
			<a href="#">
			<p>研招官微</p>
			</a>
		</dt>
	</dl>
</div>
	</li>
	
</div>
	<!--底部结束-->
</body>


<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/swiper.min.js"></script> 
<script type="text/javascript">
  var galleryTop = new Swiper('.pc_ban', {
	pagination:'.swiper-pagination',
	prevButton:'.swiper-button-prev',
	nextButton:'.swiper-button-next',
	paginationClickable:true,
	slideToClickedSlide:true,
	autoplayDisableOnInteraction:false,
	autoplay:5000,
	loop:true,
  });
</script>
<script type="text/javascript">
  var galleryTop = new Swiper('.gallery-top', {
	pagination: '.swiper-pagination',
	paginationClickable: true,
	slideToClickedSlide: true,
	autoplayDisableOnInteraction : false,
	autoplay : 5000,
	loop: true,
  });
</script>
<script>
  var swiper = new Swiper('.swiper-tpzs', {
	pagination: '.swiper-pagination',
    slidesPerView: 4,
	  slidesPerGroup : 4,
	spaceBetween: 30,
	autoplay : 5000,
	paginationClickable: true,
	slideToClickedSlide: true,
	autoplayDisableOnInteraction : false,
	loop: true,
	   breakpoints: { 
        //当宽度大于等于320
        320: {
          slidesPerView: 1,
          spaceBetween: 0,
			slidesPerGroup : 1,
        },
       //当宽度大于等于480
        480: { 
          slidesPerView: 1,
          spaceBetween: 0,
			slidesPerGroup :1,
        },
        //当宽度大于等于640
        1024: {
          slidesPerView: 2,
          spaceBetween: 20,
			slidesPerGroup : 2,
        },
		   1281: {
          slidesPerView: 4,
          spaceBetween: 30,
			slidesPerGroup : 4,
        }
      }
  });
</script>
  <script>
    var swiper = new Swiper('.rongyu', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
		
      coverflowEffect: {
        rotate: 30,
        stretch: 0,
        depth: 0,
        modifier: 1,
        slideShadows : true,
      },
	  initialSlide :2,//默认第二个
	  loop: true,
		 nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    });
  </script>
	<script>
	  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
			anchor.addEventListener('click', function(e) {
				e.preventDefault();
				const target = document.querySelector(this.getAttribute('href'));
				if(target) {
					target.scrollIntoView({
						behavior: 'smooth',
						block: 'start'
					});
				}
			});
		});
	</script>

</html>

<?php wp_footer(); ?>