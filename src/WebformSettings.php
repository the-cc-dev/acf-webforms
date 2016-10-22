<?php

class ACFWF_Settings {

  public function __construct() {

  }

  public static function parseSettingsFromFields( $fields ) {
    foreach( $fields as $key => $field ) {

      // unset empty strings ''
      if( strlen($field) == 0 && $field !== false ) {
        unset($fields[$key]);
      }

    }
    return $fields;
  }

}
