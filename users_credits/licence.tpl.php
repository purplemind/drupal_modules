<?php 
/*LICENCE TEMPLATE
 *  $photo_id
 *  $photo_uri: uri fotografije koja se download-uje.
 *  $licence: 'standard' ili 'extended'
 *  $title: photo title
 */
  //prepare image for display
  $image = array(
    'style_name' => 'watermark',
    'path' => $photo_uri,
    'alt' => $title,
    'title' => $title,
  );
  
?>
<div id="licence_template">
  <h4><?php if ($licence && $licence=='standard'): ?>Standard license<?php endif; ?>
      <?php if ($licence && $licence=='extended'): ?>Extended license<?php endif; ?>
  </h4>
  <div id="licence_photo">
    <h5><?php print $title; ?></h5>
    <?php print render(theme('image_style', $image)); ?>
  </div>
  <div id="licence_form" style="margin-top: 10px;">
  <?php if ($photo_uri && $title) { print drupal_render(drupal_get_form('users_credits_accept_licence_form', $title, $photo_uri, $licence, $photo_id)); }
        else { print 'Error during proccess licence form. Please contact admin.'; } //TODO: test red! obrisati
  ?>
  </div>
</div>

<?php
?>