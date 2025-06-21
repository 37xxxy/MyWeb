<?php
  $current = "";
  if(is_single()){
     $parent = get_the_category();
      $parent = $parent[0];
      $current = "&current_category=".$parent->term_id;
  }else if(is_category()){
      global $cat;
      $parent = get_category($cat);
  }
  if($parent->category_parent != 0){
      $cat_id = $parent->category_parent;
      $parent = get_category($cat_id);
     if($parent->category_parent != 0){
         $cat_id = $parent->category_parent;
     }else{
         $cat_id = $parent->term_id;
     }
  }else{
     $cat_id = $parent->term_id;
  }
?>
<div class="left-menu"> 
  <div class="head">
   <?php echo $parent->cat_name; ?>
  </div> 
  <ul> 
  <?php 
  if (is_page()) {
    
  }else{
    $cat_name = $parent->cat_name;
    $cat_ID = get_cat_ID($cat_name);  
    wp_list_categories("child_of=". $cat_ID. "&depth=0&hide_empty=0&show_count=0&title_li=&orderby=id&order=asc&show_option_none=");
  }
    ?> 
     <!-- <div style="width:100%;height:25px;"></div>  -->
  </ul> 
</div> 
 