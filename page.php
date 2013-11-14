<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

    <div id="primary">
        <div id="content" role="main">
            <?php 
                if (is_front_page() || is_home()) {
                    echo do_shortcode("[metaslider id=1155]"); 
                } 

                while ( have_posts() ) : the_post();
                {
                    get_template_part( 'content', 'page' );
                    $pageTitle = get_the_title();                   
                }
                endwhile;
            ?>

        
            <?php if($pageTitle == "Help"): ?> 
                <!-- Help Section Begins -->
                <section id="content"><section class="clearfix combo-filters" id="options">

                <!-- Filter Navigation -->
                <h2>Filters:</h2>
                <div class="option-combo topic">
                <h4>Topic</h4>
                <ul class="filter option-set clearfix " data-filter-group="topic">
                    <li><a class="selected" href="#show-all" data-filter-value="">show all</a></li>
                    <li><a href="#elements" data-filter-value=".networking">Networking</a></li>
                    <li><a href="#features" data-filter-value=".labequipment">Lab Equipment</a></li>
                    <li><a href="#examples" data-filter-value=".grounds">Ground Keeping</a></li>
                </ul>
                </div>
                <div class="option-combo operatingSystem">
                <h4>Operating System</h4>
                <ul class="filter option-set clearfix " data-filter-group="size">
                    <li><a class="selected" href="#filter-size-any" data-filter-value="">any</a></li>
                    <li><a href="#filter-size-small" data-filter-value=".windows">Windows</a></li>
                    <li><a href="#filter-size-wide" data-filter-value=".mac">Mac OSX</a></li>
                    <li><a href="#filter-size-tall" data-filter-value=".linux">Linux</a></li>
                </ul>
                </div>


                <!-- Sample Navigation
                <div class="option-combo ">
                <h4>size</h4>
                <ul class="filter option-set clearfix " data-filter-group="size">
                    <li><a href="#filter-size-any" data-filter-value="" class="selected">any</a>
                    <li><a href="#filter-size-small" data-filter-value=".small">small</a>
                    <li><a href="#filter-size-wide" data-filter-value=".wide">wide</a>
                    <li><a href="#filter-size-tall" data-filter-value=".tall">tall</a>
                    <li><a href="#filter-size-big" data-filter-value=".big">big</a></ul>
                </div>
                -->
                </section> 
                <!-- End Filter Navigation -->

                <!-- Help Section Tutorial Loop -->
                <div class="super-list variable-sizes clearfix" id="container">
                <?php 
                    query_posts('category_name=Help');
                    if ( have_posts() ): 
                        while ( have_posts() ) : the_post(); ?>

                            <!-- Single Help Tutorial -->
                            <div>
                                <a href="<?php echo get_permalink() ?>">
                                <div class="element <?php
                                    $posttags = get_the_tags();
                                    if ($posttags) {
                                      foreach($posttags as $tag) {
                                        echo $tag->name . ' '; 
                                      }
                                    }
                                    ?>" data-category="<?php
                                    $posttags = get_the_tags();
                                    if ($posttags) {
                                      foreach($posttags as $tag) {
                                        echo $tag->name . ' '; 
                                      }
                                    }
                                    ?>">
                                    <h2 class="name"><?php echo the_title(); ?></h2>
                                    <p class="weight"><?php
                                    $posttags = get_the_tags();
                                    if ($posttags) {
                                      foreach($posttags as $tag) {
                                        echo $tag->name . ' '; 
                                      }
                                    } ?></p>
                                </div>
                                </a>
                            </div>
                    
                        <?php endwhile; ?>	<!-- #Stop looping through help posts -->

                    <?php endif; ?>

                </div>	<!-- #close outter box -->

                </section>	<!-- #content -->
            <?php endif; ?>	<!-- #end Help Section -->

        </div>	<!-- #content -->

    </div>	<!-- #primary -->

<?php if($pageTitle != "Help") get_sidebar(); ?>
<?php get_footer(); ?>