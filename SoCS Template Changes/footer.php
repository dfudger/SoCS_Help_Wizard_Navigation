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
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>



  <script src="http://www-staging.socs.uoguelph.ca/wp-content/themes/socs/js/help-jquery.min.js"></script>
  <script src="http://www-staging.socs.uoguelph.ca/wp-content/themes/socs/js/help-isotope.min.js"></script>
  <script>
    $(function(){
    
      var $container = $('#container'),
        filters = {};
    
      $container.isotope({
        masonry: {
          columnWidth: 420 /***************************** space between **************************/
        },
        sortBy: 'number',
        getSortData: {
          number: function( $elem ) {
            var number = $elem.hasClass('element') ? 
              $elem.find('.number').text() :
              $elem.attr('data-number');
            return parseInt( number, 10 );
          },
          alphabetical: function( $elem ) {
            var name = $elem.find('.name'),
                itemText = name.length ? name : $elem;
            return itemText.text();
          }
        }
      });
    
    // filter buttons
    $('.filter a').click(function(){
      var $this = $(this);
      // don't proceed if already selected
      if ( $this.hasClass('selected') ) {
        return;
      }
      
      var $optionSet = $this.parents('.option-set');
      // change selected class
      $optionSet.find('.selected').removeClass('selected');
      $this.addClass('selected');
      
      // store filter value in object
      // i.e. filters.color = 'red'
      var group = $optionSet.attr('data-filter-group');
      filters[ group ] = $this.attr('data-filter-value');
      // convert object into array
      var isoFilters = [];
      for ( var prop in filters ) {
        isoFilters.push( filters[ prop ] )
      }
      var selector = isoFilters.join('');
      $container.isotope({ filter: selector });

      return false;
    });

/*      
      var $optionSets = $('#options .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });

*/

    
    
    });
  </script>



  </div><!-- #main -->
  <br />
  <footer id="colophon" role="contentinfo" style="background: #ddd;">

      <?php
        /* A sidebar in the footer? Yep. You can can customize
         * your footer with three columns of widgets.
         */
        if ( ! is_404() )
          get_sidebar( 'footer' );
      ?>

    <div class="pad center small">
      School of Computer Science - University of Guelph
    </div>
  </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>