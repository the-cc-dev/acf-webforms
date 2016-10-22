<?php

class ACFWF_WebformShortcode {

  public $id;

  public function __construct() {

  }

  public function setID( $id ) {
    $this->id = $id;
  }

  public function render() {
    $post = ACFWF_WebformPostType::getPostByID( $this->id );
    $wfs = new ACFWF_Settings;
    $settings = $wfs->parseSettingsFromFields( $post->fields );
    $webform = new ACFWF_Webform( $settings );
    return $webform->build();
  }



}
