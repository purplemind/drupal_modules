<?php
  drupal_add_css(drupal_get_path('module', 'lightbox_album') .'/lightbox_album.css');
?>
  <div id="lightbox-block">
    <div id="lightbox-block-header">
      <?php if ($block->subject): ?>
        <h2<?php print $title_attributes; ?> style="width: 830px; float: left;"><?php print $block->subject ?></h2>
      <?php endif;?>
      <div id="lightbox-block-header-open" style="width: 20px; float: left;">&nbsp;</div>
      <div id="lightbox-block-header-close" style="width: 20px; float: left;">&nbsp;</div>
      <br style="clear: left;" />
    </div>
    <div id="lightbox-block-content">
      <?php print render($title_suffix); ?>
      <div class="content"<?php print $content_attributes; ?>>
        <?php print $content ?>
      </div>
    </div>
  </div>
