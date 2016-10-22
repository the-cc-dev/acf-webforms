<?php

class ACFWF_WebformPostType {

  public function __construct() {

  }

  public static function getPostByID( $id ) {
    $post = get_post( $id );
    $post->fields = get_fields( $id );
    return $post;
  }



}
