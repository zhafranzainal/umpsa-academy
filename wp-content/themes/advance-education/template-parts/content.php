<?php
/**
 * The template part for displaying post 
 *
 * @package advance-education
 * @subpackage advance-education
 * @since advance-education 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>   
<article class="row page-box p-4 mb-4">
  <div class="post-thumb col-lg-5 col-md-5">
    <?php if(has_post_thumbnail() && get_theme_mod( 'advance_education_show_featured_image_post',true) != '') { ?>
      <div class="box-img">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php } ?>
  </div>
  <div class="new-text <?php if(has_post_thumbnail() && get_theme_mod( 'advance_education_show_featured_image_post',true) != '') { ?>col-lg-7 col-md-7<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
    <?php if( get_theme_mod( 'advance_education_date_hide',true) != '' || get_theme_mod( 'advance_education_comment_hide',true) != '' || get_theme_mod( 'advance_education_author_hide',true) != '' || get_theme_mod( 'advance_education_time_hide',true) != '') { ?>
      <div class="metabox">
        <?php if( get_theme_mod( 'advance_education_date_hide',true) != '') { ?>
          <span class="entry-date me-2"><i class="<?php echo esc_attr(get_theme_mod('advance_education_date_icon','fa fa-calendar')); ?> me-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span class="ms-1"><?php echo esc_html( get_theme_mod('advance_education_metabox_separator_blog_post','|') ); ?></span>
        <?php } ?>
        <?php if( get_theme_mod( 'advance_education_comment_hide',true) != '') { ?>
          <span class="entry-comments mx-2"><i class="<?php echo esc_attr(get_theme_mod('advance_education_comment_icon','fas fa-comments')); ?> me-2"></i><?php comments_number( __('0 Comments','advance-education'), __('0 Comments','advance-education'), __('% Comments','advance-education') ); ?></span><span class="ms-1"><?php echo esc_html( get_theme_mod('advance_education_metabox_separator_blog_post','|') ); ?></span>
        <?php } ?>
        <?php if( get_theme_mod( 'advance_education_author_hide',true) != '') { ?>
          <span class="entry-author mx-2"><i class="<?php echo esc_attr(get_theme_mod('advance_education_author_icon','fa fa-user')); ?> me-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span class="ms-1"><?php echo esc_html( get_theme_mod('advance_education_metabox_separator_blog_post','|') ); ?></span>
        <?php } ?>
        <?php if( get_theme_mod( 'advance_education_time_hide',true) != '') { ?>
          <span class="entry-time mx-2"><i class="<?php echo esc_attr(get_theme_mod('advance_education_time_icon','fas fa-clock')); ?> me-2"></i><?php echo esc_html( get_the_time() ); ?></span>
        <?php }?>
      </div>
    <?php }?>
    <h2 class="text-uppercase"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <?php if(get_theme_mod('advance_education_blog_post_description_option') == 'Full Content'){ ?>
      <div class="entry-content"><p class="my-2 mx-0"><?php the_content(); ?></p></div>
    <?php }
    if(get_theme_mod('advance_education_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="entry-content"><p class="my-2"><?php $excerpt = get_the_excerpt(); echo esc_html( advance_education_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_education_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('advance_education_post_suffix_option','...') ); ?></p></div>
      <?php }?>
    <?php }?>
    <?php if( get_theme_mod('advance_education_button_text','Read More') != ''){ ?>
      <div class="read-more-btn mt-4">
        <a href="<?php the_permalink(); ?>" class="p-3"><?php echo esc_html(get_theme_mod('advance_education_button_text','Read More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_education_button_text','Read More'));?></span></a>
      </div>
    <?php } ?>
  </div>
  <div class="clearfix"></div>
</article>