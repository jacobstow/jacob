			

		</div>
		<!-- /wrapper -->

		<!-- footer -->
			<footer class="footer" role="contentinfo">

				<nav id="footer_nav">
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'menu clear' ) ); ?>
				</nav>
<!--
				<div class="footer_social">
					<a href="" class="fa fa-facebook"></a>
					<a href="" class="fa fa-twitter"></a>
				</div>
-->
				<p class="copyright">
					&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>
				</p>

			</footer>
			<!-- /footer -->

		<?php wp_footer(); ?>

	</body>
</html>
