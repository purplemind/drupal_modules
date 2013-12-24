<?php
// $Id: page.tpl.php,v 1.00 2012/01/14 01:25:33 dries Exp $
?>
<div class="clearfix"  id="page-wrapper">

	<!-- HEADER -->
	<div class="clearfix" id="header-wrapper">
		<div class="clearfix" id="header-top">
			<!-- NAVIGATION -->
			
			<div id="navigation">
			<?php print render($page['header_top_region']); ?>
				<?php  if ($main_menu):?>		
					<div id="main-menu">
						<?php print theme('links__system_main_menu', array('links' => $main_menu,'attributes' => array('id' => 'main-menu-links', 
					'class' => array('links', 'clearfix'),),'heading' => array('text' => t('Main menu'),'level' => 'h2', 'class' => array('element-invisible'),),)); ?>
					</div>
				<?php endif; ?>	
			</div>	
			<!-- NAVIGATION END -->
			
		</div>
		<div class="clearfix" id="header-bottom">
			<div id="logo">
				<?php if ($logo): ?>
					<a id="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
						<img alt="<?php print t('Home')?>" src="<?php print $logo; ?>">
					</a>
				<?php endif; ?>

			</div>
			<?php print render($page['header']); ?>

		</div>
			
					
		
			
	</div>
	<!-- HEADER END-->

	<!-- MAIN -->
	<div class="clearfix" id="main-wrapper">
		<div id="left-side">	
				
				<div id="sidebar-first">
					<?php print render($page['sidebar_first']); ?>
				</div>
				
				
				<div id="sidebar-second">
					<?php print render($page['sidebar_second']); ?>
				</div>
		</div>
		<div id="main-content">
				<?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
				<?php if ($tabs):?><div id="tabs"><?php print render($tabs); ?></div><?php endif; ?>
				<?php print render($page['help']); ?>
				<?php if ($action_links):?><div id="action-links"><?php print render($action_links); ?></div><?php endif; ?>
				<?php print render($page['content']); ?>
				<?php  //print $feed_icons; ?>
		</div>
		
	</div>
	<!-- MAIN END -->
	<!-- FOOTER -->
	<div id="footer-wrapper">
		<div id="footer">
		<?php print render($page['footer']); ?>
		</div>
	<div id="footer-bottom">
	</div>
	</div>
	<!-- FOOTER END -->

</div>   
