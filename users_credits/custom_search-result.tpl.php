<?php

/**
 * @file
 * Theme implementation for displaying a single search result.
 *
 * This template renders a single search result and is collected into
 * custom_search-results.tpl.php. This and the parent template are
 * dependent to one another sharing the markup for definition lists.
 *
 * Available variables:
 * - $url: URL of the result.
 * - $title: Title of the result.
 * - $snippet: A small preview of the result. Does not apply to user searches.
 * - $info: String of all the meta information ready for print. Does not apply
 *   to user searches.
 * - $info_split: Contains same data as $info, split into a keyed array.
 * - $type: The type of search, e.g., "node" or "user".
 *
 * Default keys within $info_split:
 * - $info_split['type']: Node type.
 * - $info_split['user']: Author of the node linked to users profile. Depends
 *   on permission.
 * - $info_split['date']: Last update of the node. Short formatted.
 * - $info_split['comment']: Number of comments output as "% comments", %
 *   being the count. Depends on comment.module.
 * - $info_split['upload']: Number of attachments output as "% attachments", %
 *   being the count. Depends on upload.module.
 *
 * Since $info_split is keyed, a direct print of the item is possible.
 * This array does not apply to user searches so it is recommended to check
 * for their existence before printing. The default keys of 'type', 'user' and
 * 'date' always exist for node searches. Modules may provide other data.
 *
 *   <?php if (isset($info_split['comment'])) : ?>
 *     <span class="info-comment">
 *       <?php print $info_split['comment']; ?>
 *     </span>
 *   <?php endif; ?>
 *
 * To check for all available data within $info_split, use the code below.
 *
 *   <?php print '<pre>'. check_plain(print_r($info_split, 1)) .'</pre>'; ?>
 *
 * @see template_preprocess_custom_search_result()
 
 *
 ob_start();
 print_r($url);
$var = ob_get_contents();
ob_end_clean();
$fp=fopen('VREDNOSTI_PROMENLJIVE.txt','w');
fputs($fp,$var);
fclose($fp);
 */
?>
 <?php //if ($variables['result']['node']->nid != 58 : ?>
<li>


<dt class="title">
<?php 
//print $variables['result']['node']->nid; 
//$variables['result']['node']->nid
  $qry = db_select('file_managed' , 'fm');
  $qry->fields('fm', array('uri', 'filename'));
  $qry->join('field_data_field_slika' , 'fdfs', 'fm.fid=fdfs.field_slika_fid');
  $qry->condition('fdfs.entity_id', $variables['result']['node']->nid, '=');
  $qry->condition('fdfs.bundle', 'display_my_product', '=');
  $cnt = $qry->execute()->rowCount();
  if ( $cnt > 0 ) {
  $res = $qry->execute()->fetchAssoc();   
  //print 'DOBIO SI: ' .$res['filename'] .' na adresi: ' .$res['uri'];  
  drupal_add_css(drupal_get_path('module', 'lightbox_album') .'/lightbox_album.css');
  print '<a href="/node/' .$variables['result']['node']->nid .'">' .theme('image_style', array('style_name' => 'thumbnail', 'path' => $res['uri'])) .'</a>';
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
        '#href' => 'lightbox-add-image/nojs/' .$variables['result']['node']->nid,
        '#ajax' => array(
          'wrapper' => 'proba',
          'effect' => 'fade',
        ),
        '#attributes' => array('class' => array('save-link')),
      ),
    ),
  );
  print render($links);
  }
?>
</dt>



</li>
<?php //endif; ?>
