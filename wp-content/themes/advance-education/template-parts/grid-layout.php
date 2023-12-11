<?php
/**
 * The template part for displaying grid post
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
<div class="col-lg-4 col-md-4">
  <article class="page-box p-4 mb-4">
    <?php if( get_theme_mod( 'advance_education_show_featured_image_post',true) != '') { ?>
      <div class="box-img mb-3">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php } ?>
    <div class="new-text p-2">
      <?php if( get_theme_mod( 'advance_education_date_hide',true) != '' || get_theme_mod( 'advance_education_comment_hide',true) != '' || get_theme_mod( 'advance_education_author_hide',true) != '' || get_theme_mod( 'advance_education_time_hide',true) != '') { ?>
        <div class="metabox">
          <?php if( get_theme_mod( 'advance_education_date_hide',true) != '') { ?>
            <span class="entry-date me-3"><i class="fa fa-calendar me-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span class="ms-1"><?php echo esc_html( get_theme_mod('advance_education_metabox_separator_blog_post','|') ); ?></span>
          <?php } ?>
          <?php if( get_theme_mod( 'advance_education_comment_hide',true) != '') { ?>
            <span class="entry-comments me-3"><i class="fas fa-comments me-2"></i><?php comments_number( __('0 Comments','advance-education'), __('0 Comments','advance-education'), __('% Comments','advance-education') ); ?></span><span class="ms-1"><?php echo esc_html( get_theme_mod('advance_education_metabox_separator_blog_post','|') ); ?></span>
          <?php } ?>
          <?php if( get_theme_mod( 'advance_education_author_hide',true) != '') { ?>
            <span class="entry-author me-3"><i class="fa fa-user me-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span class="ms-1"><?php echo esc_html( get_theme_mod('advance_education_metabox_separator_blog_post','|') ); ?></span>
          <?php } ?>
          <?php if( get_theme_mod( 'advance_education_time_hide',true) != '') { ?>
            <span class="entry-time me-3"><i class="fas fa-clock me-2"></i><?php echo esc_html( get_the_time() ); ?></span>
          <?php }?>
        </div>
      <?php }?>
      <h2 class="text-uppercase"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <div class="entry-content"><p class="my-2"><?php $excerpt = get_the_excerpt(); echo esc_html( advance_education_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_education_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('advance_education_post_suffix_option','...') ); ?></p></div>
      <?php if( get_theme_mod('advance_education_button_text','Read More') != ''){ ?>
        <div class="read-more-btn mt-4">
          <a href="<?php the_permalink(); ?>" class="p-3"><?php echo esc_html(get_theme_mod('advance_education_button_text','Read More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_education_button_text','Read More'));?></span></a>
        </div>
      <?php } ?>
    </div>
    <div class="clearfix"></div>
  </article>
</div>