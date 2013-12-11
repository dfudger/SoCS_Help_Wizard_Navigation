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
 * Template Name: Help
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
        <div id="helpContent" role="main">
        
        <!-- Help Section Begins -->
                <section id="helpContent"><section class="clearfix combo-filters" id="options">
        <h1 class="entry-title"><?php echo get_the_title();?></h1>
    <br>
                <!-- Filter Navigation -->
                <div class="option-combo topic">
                <h4>Topics</h4>
                <ul class="filter option-set clearfix " data-filter-group="topic">
                    <li><a class="selected" href="#topics-all" data-filter-value="">All</a></li>
                    <li><a href="#topic-grounds" data-filter-value=".grounds">Grounds Keeping</a></li>
                    <li><a href="#topic-labequipment" data-filter-value=".labequipment">Lab Equipment</a></li>
                    <li><a href="#topic-moodle" data-filter-value=".moodle">Moodle</a></li>
                    <li><a href="#topic-networking" data-filter-value=".networking">Networking</a></li>
            <li><a href="#topic-printing" data-filter-value=".printing">Printing</a></li>
                    <li><a href="#topic-raspberrypi" data-filter-value=".raspberrypi">Raspberry Pi</a></li>
                    <li><a href="#topic-sunray" data-filter-value=".sunray">Sun Ray</a></li>
                </ul>
                </div> 
                <div class="option-combo operatingSystem">
                <h4>Operating Systems</h4>
                <ul class="filter option-set clearfix " data-filter-group="os">
                    <li><a class="selected" href="#os-all" data-filter-value="">All</a></li>
                    <li><a href="#os-linux" data-filter-value=".linux">Linux</a></li>
                    <li><a href="#os-mac" data-filter-value=".mac">Mac OS X</a></li>
                    <li><a href="#os-windows" data-filter-value=".windows">Windows</a></li>
                </ul>
                </div>


        <div class="option-combo example">
                <h4>I am a...</h4>
                <ul class="filter option-set clearfix " data-filter-group="iama">
                    <li><a class="selected" href="#user-all" data-filter-value="">All</a></li>
                    <li><a href="#iama-student" data-filter-value=".student">Student</a></li>
            <li><a href="#iama-prospectivestudent" data-filter-value=".prospectivestudent">Prospective Student</a></li>
                    <li><a href="#iama-faculty" data-filter-value=".faculty">Faculty Member</a></li>
                    <li><a href="#iama-staff" data-filter-value=".staff">Staff Member</a></li>
                </ul>
                </div>
    

                </section> 
                <!-- End Filter Navigation -->
                <!-- Help Section Tutorial Loop -->
                <div class="super-list variable-sizes clearfix" id="container">
                <?php 
                    query_posts('category_name=Help');
                    if ( have_posts() ): 
                        while ( have_posts() ) : the_post(); ?>

                            <!-- Single Help Tutorial -->
                                <div class="element elementColour <?php
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
                        <a href="<?php echo get_permalink() ?>">
                    <div class="element">
                                    <h2 class="name"><?php echo the_title(); ?></h2>
                               
                                    </div>
                    </a>
                                </div>
                    
                        <?php endwhile; ?> <!-- #Stop looping through help posts -->
                    <?php endif; ?>
                
                </div> <!-- #close outter box -->
                </section><!-- #helpContent -->
    <!-- #end Help Section -->

        </div><!-- #helpContent -->

    </div><!-- #primary -->

<?php get_footer(); ?>