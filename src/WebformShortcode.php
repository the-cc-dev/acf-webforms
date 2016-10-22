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
    $settings = ACFWF_Settings::parseSettingsFromFields( $post->fields );
    $webform = new ACFWF_Webform( $settings );
    return $webform->build();
  }



}
