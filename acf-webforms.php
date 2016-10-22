<?php

/*
  Plugin Name: ACF Webforms
  Plugin URI: http://goldhat.ca/plugins/acf-webforms
  Description: Create webforms with ACF field groups
  Version: 1.0.0
  Author: Joel Milne, GoldHat Group
  Author URI: http://goldhat.ca
  Text Domain: acf-webforms
  License: GPLv2 or later
 */

new ACF_Webforms;

class ACF_Webforms {

  public function __construct() {
    require('src/PostType.php');
    require('src/OptionPage.php');
    require('src/Webform.php');
    require('src/WebformShortcode.php');
    require('src/WebformPostType.php');
    require('src/WebformSettings.php');
    //add_action('init', array( $this, 'includeAcfFields' ));
    add_action('init', array( $this, 'addAcfWebformPostType' ));
    add_action('get_header', array( $this, 'acfFormHeader' ));
    add_shortcode('webform', array( $this, 'shortcodeWebform' ));
  }

  public function shortcodeWebform( $params ) {
    // check if id exists
    if( !is_array( $params ) || !array_key_exists( 'id', $params )){
      return false;
    }
    // render field
    $sc = new ACFWF_WebformShortcode;
    $sc->setID( $params['id'] );
    return $sc->render();
  }

  public function acfFormHeader() {
    acf_form_head();
  }

  public function includeAcfFields() {
    require('assets/acf/fields.php');
  }

  public function addAcfWebformPostType() {
    $pt = new ACFWF_PostType;
    $args = array(
      'key' => 'acf_webform',
      'name' => 'Webform',
      'settings' => array(
        'lbl_name'          => 'Webform',
        'lbl_add_new'       => 'Add Webform',
        'lbl_add_new_item'  => 'Add Webform',
      )
    );
    $pt->add( $args );
  }

}
