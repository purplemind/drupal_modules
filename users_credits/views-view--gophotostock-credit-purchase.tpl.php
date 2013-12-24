<?php
/**
 *  views-view--gophotostock-credit-purchase.tpl.php
 */

 /*
ob_start();
print_r($variables);
$var = ob_get_contents();
ob_end_clean();
$fp=fopen('variables_shopping_cart','w');
fputs($fp,$var);
fclose($fp);
*/
?>
<?php
	drupal_add_css(drupal_get_path('module', 'users_credits') .'/purchase_cart.css');
	global $user;
	$order = commerce_cart_order_load($user->uid);

	if (!$order || empty($order->commerce_line_items)) {
		// Display an appropriate message.
		print 'You have not <a href="' .base_path() .'pricing">purchase</a> any credit package yet!';
	}
	else {
?>

<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php }//else  /* class view */ ?>