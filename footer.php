</div><!--END BG-->


<footer>
	
	<div class="copyright">
		<div id="footer-menu">
			<?php wp_nav_menu(array('theme_location' => 'footer','sort_column' => 'menu_order', 'container_id'=>'footer-menu','menu_id'=>'footer-menu-id','menu_class'=>'footer-menu-class') ); ?> 
		</div>
		<span class="float">
			Copyright &copy; 2013 <?php bloginfo('name'); ?> - Design By <a href="http://www.geeku.net">Shu</a></span>      
		</span>    
	</div>

</footer>


<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/go-top.js"></script>
<script>
/* <![CDATA[ */
(new GoTop()).init({
	pageWidth		:1060,
	nodeId			:'go-top',
	nodeWidth		:50,
	distanceToBottom	:125,
	hideRegionHeight	:130,
	text			:''
});
/* ]]> */
</script>

<?php wp_footer(); ?>

</body>   
</html> 