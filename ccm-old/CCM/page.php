<?php
/**
 * The template for displaying any single page.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>

<section class="mid-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div id="primary" class="row-fluid">
            		<div id="content" role="main" class="span8 offset2">
            
            			<?php if ( have_posts() ) : 
            			// Do we have any posts/pages in the databse that match our query?
            			?>
            
            				<?php while ( have_posts() ) : the_post(); 
            				// If we have a page to show, start a loop that will display it
            				?>
            
            					<article class="post">
            					
            						<h1 class="title"><?php the_title(); // Display the title of the page ?></h1>
            						
            						<div class="the-content">
            						    <?php if( (is_shop() || is_product_category()) && $_GET['orderby'] != 'menu_order' ) {
                                                $category = get_queried_object();
    
                                                if(  is_product_category() ) {
                                                    $tax_query = array(
                                                        array(
                                                            'taxonomy' => 'product_cat',
                                                            'field'    => 'term_id',
                                                            'terms'    => $category->term_id
                                                        ),
                                                    );
                                                }
                                                $args = array(
                                                    'post_type'  => 'product',
                                                    'meta_query' => array(
                                                        array(
                                                            'key'     => 'ccm_product_bike_com',
                                                            'value'   => $_GET['orderby'],
                                                            'compare' => 'LIKE',
                                                        ),
                                                    ),
                                                    'tax_query' => $tax_query
                                                );
                                                $query = new WP_Query( $args );
                                                if( empty($query->posts) && isset($_GET['product_type']) ) {
                                                    $option_array = array(
                                                                'Bobber',
                                                                'CaféRacer',
                                                                'Flat Tracker',
                                                                'RAF',
                                                                'Foggy',
                                                                'Spitfire Six',
                                                                'Scrambler',
                                                                'Basic Spitfire'
                                                    );
                                                ?>
                                                    <form class="woocommerce-ordering" method="get">
                                                    	<select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
                                                    	    <option value="menu_order">Filter by bike</option>
                                                    	    <?php foreach( $option_array as $lab => $val ) {
                                                    		            $selected = $val == $_GET['orderby'] ? 'selected="selected"' : '';
                                                                    ?>
                                                                <option value="<?php echo esc_attr( $val ); ?>" <?php echo $selected; ?>><?php echo esc_html( $val ); ?></option>
                                                        <?php } ?>
                                                    	</select>
                                                    	
                                                    	<input type="hidden" name="paged" value="1" />
                                                    	<input type="hidden" name="product_type" value="bike" />
                                                    	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
                                                    </form>
                                                <?php }
                                        } ?>
            							<?php the_content(); 
            							// This call the main content of the page, the stuff in the main text box while composing.
            							// This will wrap everything in p tags
            							?>
            							
            							<?php wp_link_pages(); // This will display pagination links, if applicable to the page ?>
            						</div><!-- the-content -->
            						
            					</article>
            
            				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>
            
            			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
            				
            				<article class="post error">
            					<h1 class="404">Nothing posted yet</h1>
            				</article>
            
            			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>
            
            		</div><!-- #content .site-content -->
            	</div><!-- #primary .content-area -->
            </div>
        </div>
    </div>
</section>
<script>
    if ( jQuery('.woocommerce-ordering').lenght > 0 ) {
        
    }
</script>

	
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>