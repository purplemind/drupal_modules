<?php

//Log In block upper case
function gophotostock_form_user_login_block_alter(&$form) {
   $items = array();
   if (variable_get('user_register', USER_REGISTER_VISITORS_ADMINISTRATIVE_APPROVAL)) {
     $items[] = l(t('Register'), 'user/register', array('attributes' => array('title' => t('Create a new user account.'))));
   }
   $items[] = l(t('Request New Password'), 'user/password', array('attributes' => array('title' => t('Request new password via e-mail.'))));
   $form['links'] = array('#markup' => theme('item_list', array('items' => $items)));
}

//shopping cart form -> change button title "Delete" to "Cancel this"
function gophotostock_form_views_form_gophotostock_credit_purchase_page_alter(&$form, &$form_state) {
    global $user;
	if ($user->uid!=0) {
	$form['actions'] = array();
	foreach($form['edit_delete'] as $index => $value) {
		if ( is_array($value) ) {
			$form['edit_delete'][$index]['#value'] = t('Cancel this');
		}
	}
	}//if
}

//search -> remove results which is not "display_my_product" type
function gophotostock_preprocess_search_results(&$variables) {
    $izbaci = array(); //niz indexa pretrage koje treba izbaciti, tj. koji nisu "display_my_product"
	foreach($variables['results'] as $indx => $value) {  //$value je niz podataka rezultata $indx
		if ( $value['type'] != 'Image product' ) {
			$izbaci[] = $indx;
			//unset($variables['results'][$indx]);
		}//if
	}//for
	for ($i=0; $i<count($izbaci); $i++) {
		unset($variables['results'][$izbaci[$i]]);
	}

	if ( count($variables['results']) == 0 ) {
		$variables['search_results'] = null;
	} 
	else {
		$result_arr = array();
		$result = $variables['search_results'];
		$result_arr = explode("</li>", $variables['search_results']);
		if (count($result_arr)>0) { unset($result_arr[count($result_arr)-1]); }
		for ($i=0; $i<count($izbaci); $i++) {
			unset($result_arr[$izbaci[$i]]);
		}
		$result = '';
		foreach($result_arr as $indx => $value) {
			$pom = substr_replace($value, '</li>', strlen($value), 0);
			$result .= $pom;
		}
		//print_r($result_arr);
		$variables['search_results'] = $result;
	}//else
}

function gophotostock_commerce_currency_info_alter(&$currencies, $langcode) {
	$currencies['EUR']['symbol_placement'] = 'before';
}

function gophotostock_form_user_profile_form_alter(&$form) {
 /* ob_start();
  print_r($form);
  $var = ob_get_contents();
  ob_end_clean();
  $fp=fopen('form_edit_profile.txt','w');
  fputs($fp,$var);
  fclose($fp);
 */
  //mail ispred curr_pass
  $form['account']['mail']['#weight'] = $form['account']['current_pass']['#weight'] - 1;
  $form['fieldset_acc'] = array (
    '#type' => 'fieldset',
    '#title' => t('E-mail and Password Settings'),
    '#weight' => $form['account']['#weight'],
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['fieldset_acc']['account'] = $form['account'];
  $form['account'] = array();
}