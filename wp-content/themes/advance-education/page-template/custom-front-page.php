<?php
/**
 * Template Name: Custom home
 */
get_header(); ?>

<main role="main" id="maincontent">

  <?php do_action( 'advance_education_above_slider' ); ?>

  <?php if( get_theme_mod( 'advance_education_slider_hide', false) != '' || get_theme_mod( 'advance_education_responsive_slider', false) != '') { ?>    
    <section id="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('advance_education_slider_speed_option', 3000)); ?>"> 
        <?php $advance_education_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'advance_education_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $advance_education_slider_pages[] = $mod;
            }
          }
          if( !empty($advance_education_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $advance_education_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/theme-block-pattern/images/banner.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <?php if( get_theme_mod('advance_education_slider_title_Show_hide',true) != ''){ ?>
                    <h1 class="text-uppercase"><?php the_title(); ?></h1>
                  <?php } ?>
                  <?php if( get_theme_mod('advance_education_slider_content_Show_hide',true) != ''){ ?>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_education_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_education_slider_excerpt_length','20')))); ?></p>
                  <?php } ?>
                  <?php if( get_theme_mod('advance_education_slider_button_show_hide',true) != ''){ ?>
                  <?php if( get_theme_mod('advance_education_slider_button','Read More') != ''){ ?>
                    <div class="readbtn mt-md-3">
                      <a href="<?php the_permalink(); ?>" class="py-2 px-3"><?php echo esc_html(get_theme_mod('advance_education_slider_button','Read More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_education_slider_button','Read More'));?></span></a>
                    </div>
                  <?php } ?>
                  <?php }?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <div class="slider-nex-pre">
          <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left p-3"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Previous','advance-education' );?></span>
          </a>
          <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right p-3"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Next','advance-education' );?></span>
          </a>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'advance_education_below_slider' ); ?>
  
  <div class="header-nav">
    <?php get_template_part( 'template-parts/header/header-navigation' ); ?> 
  </div>

  <?php do_action( 'advance_education_above_popular_courses_section' ); ?>

  <?php if( get_theme_mod('advance_education_title') != '' || get_theme_mod( 'advance_education_popular_courses_category' )!= ''){ ?>
    <section id="courses" class="py-5">
      <div class="container">
        <?php if( get_theme_mod('advance_education_title') != ''){ ?>
          <h2 class="text-center mb-3"><i class="fas fa-book"></i><?php echo esc_html(get_theme_mod('advance_education_title','')); ?></h2>
        <?php } ?>
        <div class="row">
          <?php 
            $advance_education_catData =  get_theme_mod('advance_education_popular_courses_category');
            if($advance_education_catData){
              $page_query = new WP_Query(array( 'category_name' => esc_html($advance_education_catData,'advance-education')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class=" col-lg-4 col-md-6">
                  <div class="cat_content">
                    <div class="cat-posts">
                      <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                      <div class="cat_body p-lg-2">
                        <h3 class="title"><?php the_title(); ?></h3>
                        <p class="description my-3">
                          <?php $excerpt = get_the_excerpt(); echo esc_html( advance_education_string_limit_words( $excerpt,12 ) ); ?>
                        </p> 
                        <div class="theme_button mt-3">
                          <?php if( get_theme_mod('advance_education_popular_courses_button_text', 'APPLY NOW') != ''){ ?>
                            <a href="<?php the_permalink(); ?>" class="py-2 px-3"><?php echo esc_html( get_theme_mod('advance_education_popular_courses_button_text',__('APPLY NOW', 'advance-education')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('advance_education_popular_courses_button_text',__('APPLY NOW', 'advance-education')) ); ?></span>
                            </a>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <h3 class="title-btn p-3"><?php the_title(); ?></h3>
                  </div>
                </div> 
              <?php endwhile;
              wp_reset_postdata();
            }
          ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'advance_education_below_popular_courses_section' ); ?>
  <div id="content">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>