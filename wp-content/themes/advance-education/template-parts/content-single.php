<?php
/**
 * The template part for displaying single post
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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="page-box-single p-3">
    <h1 class="p-0 mx-0 mt-0 mb-3"><?php the_title();?></h1>
    <?php if( get_theme_mod( 'advance_education_show_featured_image_single_post',true) != '') { ?>
      <div class="box-img">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php } ?>
    <div class="new-text p-2">
      <?php if( get_theme_mod( 'advance_education_single_post_date_hide',true) != '' || get_theme_mod( 'advance_education_single_post_comment_hide',true) != '' || get_theme_mod( 'advance_education_single_post_author_hide',true) != '' || get_theme_mod( 'advance_education_single_post_time_hide',true) != '') { ?>
        <div class="metabox pt-3 px-0 pb-2">
          <?php if( get_theme_mod( 'advance_education_single_post_date_hide',true) != '') { ?>
            <span class="entry-date me-2"><i class="fa fa-calendar me-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a><span class="ms-2"><?php echo esc_html( get_theme_mod('advance_education_single_post_meta_seperator','|') ); ?></span></span>
          <?php } ?>
          <?php if( get_theme_mod( 'advance_education_single_post_comment_hide',true) != '') { ?>
            <span class="entry-comments me-2"><i class="fas fa-comments me-2"></i><?php comments_number( __('0 Comments','advance-education'), __('0 Comments','advance-education'), __('% Comments','advance-education') ); ?><span class="ms-2"><?php echo esc_html( get_theme_mod('advance_education_single_post_meta_seperator','|') ); ?></span></span>
          <?php } ?>
          <?php if( get_theme_mod( 'advance_education_single_post_author_hide',true) != '') { ?>
            <span class="entry-author me-2"><i class="fa fa-user me-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a><span class="ms-2"><?php echo esc_html( get_theme_mod('advance_education_single_post_meta_seperator','|') ); ?></span></span>
          <?php } ?>
          <?php if( get_theme_mod( 'advance_education_single_post_time_hide',true) != '') { ?>
            <span class="entry-time"><i class="fas fa-clock me-2"></i> <?php echo esc_html( get_the_time() ); ?></span>
          <?php }?>
        </div>
      <?php }?>
      <?php if( get_theme_mod('advance_education_category_show_hide',true) != ''){ ?>
        <div class="category-sec">
          <span class="category"><?php esc_html_e('Categories:','advance-education'); ?></span>
          <?php the_category(); ?>
        </div>
      <?php } ?>
      <div class="entry-content"><p class="my-2 mx-0"><?php the_content();?></p></div>
      <?php if( get_theme_mod( 'advance_education_tags_hide',true) != '') { ?>
        <div class="tags my-3 mx-0"><p><?php
          if( $tags = get_the_tags() ) {
            echo '<i class="fas fa-tags"></i>';
            echo '<span class="meta-sep"></span>';
            foreach( $tags as $content_tag ) {
              $sep = ( $content_tag === end( $tags ) ) ? '' : ' ';
              echo '<a href="' . esc_url(get_term_link( $content_tag, $content_tag->taxonomy )) . '">' . esc_html($content_tag->name) . '</a>' . esc_html($sep);
            }
          } ?></p>
        </div>
      <?php } ?>

      <?php if( get_theme_mod( 'advance_education_show_single_post_pagination',true) != '') { ?>
        <?php
          the_post_navigation( array(
            'next_text' => '<span class="meta-nav text-uppercase p-2" aria-hidden="true">' . __( 'Next <i class="far fa-long-arrow-alt-right"></i>', 'advance-education' ) . '</span> ' .
              '<span class="screen-reader-text">' . __( 'Next post:', 'advance-education' ) . '</span> ',
            'prev_text' => '<span class="meta-nav text-uppercase p-2" aria-hidden="true">' . __( '<i class="far fa-long-arrow-alt-left"></i> Previous', 'advance-education' ) . '</span> ' .
              '<span class="screen-reader-text">' . __( 'Previous post:', 'advance-education' ) . '</span> ',
          ) );
        echo '<div class="clearfix"></div>';?>
      <?php } ?>

  </div>

   <?php if( get_theme_mod( 'advance_education_post_comment',true) != '') { 
   // If comments are open or we have at least one comment, load up the comment template.
  if ( comments_open() || get_comments_number() ) {
    comments_template();}
  }?>

  <?php get_template_part('template-parts/related-posts'); ?>
  </div>
</article>


              