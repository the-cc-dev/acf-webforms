<?php

class ACFWF_Settings {

  public function __construct() {

  }

  public function parseSettingsFromFields( $fields ) {

    foreach( $fields as $key => $field ) {

      // unset empty strings ''
      if( strlen($field) == 0 && $field !== false ) {
        unset($fields[$key]);
      }

    }

    if( array_key_exists( 'acfwf_fields', $fields )) {
      $fields['fields'] = $this->parseSettingCommaSep( $fields['acfwf_fields'] );
      unset( $fields['acfwf_fields'] );
    }

    if( array_key_exists( 'acfwf_field_groups', $fields )) {
      $fields['field_groups'] = $this->parseSettingCommaSep( $fields['acfwf_field_groups'] );
      unset( $fields['acfwf_field_groups'] );
    }

    return $fields;
  }

  public function parseSettingCommaSep( $commaSepSetting ) {
    if( strlen($commaSepSetting) < 1 ) {
      return false;
    }
    str_replace( ' ', '', $commaSepSetting );
    $settingsArray = explode(',', $commaSepSetting);
    if( is_array( $settingsArray )) {
      return $settingsArray;
    }
    return false;
  }

}
