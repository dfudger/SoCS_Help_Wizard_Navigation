<?php
/*  SoCS Help Navigation System - An interactive way to navigate through posts in Wordpress
    Copyright (C) 2013  M. Cibulka, B. Doek, D. Fudger, C. Rose

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.*/

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

        </div><!-- #content -->

    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>