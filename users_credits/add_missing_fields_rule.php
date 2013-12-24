if ( $node->type == 'display_my_product' ) {
  $lang = $node->language;
  //get image filesize from db:
  $qry = db_select('file_managed', 'fm');
  $qry->fields('fm', array('filesize'));
  $qry->condition('fm.fid', $node->field_slika[$lang][0]['fid'], '=');
  $res = $qry->execute();
  $filesize = 'unknown';
  if ( $res->rowCount() > 0 ) {
    $res = $qry->execute()->fetchAssoc();
    $filesize = $res['filesize'];
  }
  //image_id:
  $node->field_image_id = array();
  $node->field_image_id[$lang] = array();
  $node->field_image_id[$lang][0] = array();
  $field_image_id = variable_get("field_image_id", null);
  if ( $field_image_id == null ) {
    variable_set("field_image_id", 124543);
    $field_image_id = 124543;
  } else { $field_image_id += 1; }
  $node->field_image_id[$lang][0]['value'] = $field_image_id;
  //image filesize:
  $node->field_file_size = array();
  $node->field_file_size[$lang] = array();
  $node->field_file_size[$lang][0] = array();
  if ( is_numeric($filesize) ) { $filesize = number_format((float)($filesize/(1024*1024)), 2); } //bytes -> MB, 2 decimal places
  $node->field_file_size[$lang][0]['value'] = $filesize .'MB';
  //image alt:
  $node->field_slika[$lang][0]['alt'] = $node->title;
  //dimension:
  $node->field_dimensions[$lang][0]['value'] = $node->field_slika[$lang][0]['width'] .'x' .$node->field_slika[$lang][0]['height'];
}//if