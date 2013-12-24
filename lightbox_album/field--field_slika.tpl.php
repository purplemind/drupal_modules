<?php
/*
ob_start();
print_r($element);
$var = ob_get_contents();
ob_end_clean();
$fp=fopen('slika_field.txt','w');
fputs($fp,$var);
fclose($fp);
*/

drupal_add_css(drupal_get_path('module', 'lightbox_album') .'/lightbox_album.css');
drupal_add_css(drupal_get_path('module', 'users_credits') .'/users_credits.css');
drupal_add_css(drupal_get_path('module', 'users_credits') .'/jquery.tooltip.css');

//drupal_add_js(drupal_get_path('module', 'ajax_register') .'/js/ajax-register.js');

drupal_add_js(drupal_get_path('module', 'users_credits') .'/js/jquery.bgiframe.js', array (
  'type' => 'file', 'scope' => 'header', 'weight' => 50)
);
drupal_add_js(drupal_get_path('module', 'users_credits') .'/js/jquery.dimensions.js', array (
  'type' => 'file', 'scope' => 'header', 'weight' => 51)
);
drupal_add_js(drupal_get_path('module', 'users_credits') .'/js/jquery.tooltip.js', array (
  'type' => 'file', 'scope' => 'header', 'weight' => 52)
);
drupal_add_js(drupal_get_path('module', 'users_credits') .'/js/gps_thumb_water.js', array (
  'type' => 'file', 'scope' => 'footer', 'weight' => 53)
);

  print '<div id="image-box-wrapper">';
   print '<div id="image-id-wrapper">';
  print render($items);
   print '</div>';
  $links = array(
    '#prefix' => '<div id="box">',
    '#suffix' => '</div><div id="proba"></div>',
    //'#prefix' => '<div id="proba">',
    //'#suffix' => '</div>',
    'links' => array(
      'save_link' => array(
        '#type' => 'link',
        '#title' => t('Add to lightbox'),
        //'#href' => 'lightbox-add-image/' .$items[0]['#item']['fid'], //product id za ovo fotku
        '#href' => 'lightbox-add-image/nojs/' .$element['#object']->nid,
        '#ajax' => array(
          'wrapper' => 'proba',
          'effect' => 'fade',
        ),
        '#attributes' => array('class' => array('save-link')), //za koordinate prikaza!
      ),
    ),
  );
  print render($links);
  $licence_links = array(
    '#prefix' => '<div id="licence-box">',
    '#suffix' => '</div><div id="download-box"></div>',
    'links' => array (
      'standard_licence' => array(
        '#type' => 'link',
        '#title' => t('Download photo with Standard Lincense - 1 credit'),
        '#href' => 'download/nojs/standard/' .$element['#object']->nid, //download/%/%/%, //1-nojs\ajax, 2-standard\extended, 3-photo id
        '#ajax' => array(
          'wrapper' => 'download-box',
          'effect' => 'fade',
        ),
        '#attributes' => array('class' => array('licence-link')),
      ),
      'extended_licence' => array(
        '#type' => 'link',
        '#title' => t('Download photo with Extended Lincense - 75 credits'),
        '#href' => 'download/nojs/extended/' .$element['#object']->nid,
        '#ajax' => array(
          'wrapper' => 'download-box',
          'effect' => 'fade',
        ),
        '#attributes' => array('class' => array('licence-link')),
      ),
    ),
  );
  print render($licence_links);
  print '</div>';  //sale_blok
/*
  print "HELLO SLIKA 2!";
  print "<pre>";
  print "FID = " .$items[0]['#item']['fid'];
  print "</pre>";
*/ ?>