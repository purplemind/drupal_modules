<?php
$uid = $commerce_order->uid;
$order_wrapper = entity_metadata_wrapper('commerce_order', $commerce_order);
foreach ($order_wrapper->commerce_line_items as $delta => $line_item_wrapper) {
   $product_wrapper = $line_item_wrapper->value();
   foreach ($product_wrapper->data['context']['product_ids'] as $key => $product_id) {
     module_invoke('users_credits', 'buy_credits', $product_id, $uid);
  }
}
?>