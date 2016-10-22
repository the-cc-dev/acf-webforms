<?php

class ACFWF_Webform {

  public function __construct( $settings = false ) {
    $this->setDefaultProperties();
    if( $settings ) {
      $this->settings( $settings );
    }
  }

  public function setOptionByProperty( $option ) {
    if( property_exists( $this, $option )) {
      $this->options[$option] = $this->$option;
    }
  }

  public function build() {
    $options = array();
    if( $this->id ) {
      $this->options['id'] = $this->id;
    }
    if( $this->form_type == 'webform' || $this->form_type == 'post_create' ) {
      $this->options['post_id'] = 'new_post';
      $this->options['new_post'] = array(
        'post_type'   => $this->post_type,
        'post_status' => 'publish',
      );
    } else {
      $this->options['new_post'] = false;
    }

    $optionKeys = array(
      'field_groups',
      'fields',
      'post_title',
      'post_content',
      'form',
      'form_attributes',
      'return',
      'html_before_fields',
      'html_after_fields',
      'submit_value',
      'updated_message',
      'label_placement',
      'instruction_placement',
      'field_el',
      'uploader',
      'honeypot',
    );
    foreach( $optionKeys as $option ) {
      $this->setOptionByProperty( $option );
    }
    return acf_form( $this->options );
  }

  public function settings( $settings ) {
    foreach( $settings as $setting => $value ) {
      $this->applySetting( $setting, $value );
    }
  }

  public function applySetting( $setting, $value ) {
    $this->$setting = $value;
  }

  public function setDefaultProperties() {
    $this->webform_post = 0;
    $this->id = false;
    $this->type = 'webform';
  }



}
