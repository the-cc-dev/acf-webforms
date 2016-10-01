<?php

class ACFWF_OptionPage {

  public function add( $args ) {

    $page_title = $args['page_title'];
    $settings = $args['settings'];

    $args = array(
      'page_title' => $page_title,
      'menu_title' => $settings['menu_title'],
      'menu_slug' => $settings['menu_slug'],
      'autoload' => false,
    );

    $this->setCapability( $args, $settings );
    $this->setRedirect( $args, $settings );
    $this->setParentSlug( $args, $settings );
    $this->setPostID( $args, $settings );
    $this->setAutoload( $args, $settings );
    $this->setPosition( $args, $settings );
    $this->setIconUrl( $args, $settings );

    acf_add_options_page( $args );

  }

  public function setCapability( &$args, $settings ) {
    if( $settings['capability'] ) {
      $args['capability'] = $settings['capability'];
    }
  }

  public function setRedirect( &$args, $settings ) {
    if( $settings['redirect'] != true ) {
      $args['redirect'] = false;
    }
  }

  public function setParentSlug( &$args, $settings ) {
    if( $settings['parent_slug'] ) {
      $args['parent_slug'] = $settings['parent_slug'];
    }
  }

  public function setPostID( &$args, $settings ) {
    if( $settings['post_id'] ) {
      $args['post_id'] = $settings['post_id'];
    }
  }

  public function setAutoload( &$args, $settings ) {
    if( $settings['autoload'] ) {
      $args['autoload'] = $settings['autoload'];
    }
  }

  public function setPosition( &$args, $settings ) {
    if( $settings['position'] ) {
      $args['position'] = $settings['position'];
    }
  }

  public function setIconUrl( &$args, $settings ) {
    if( $settings['icon_url'] ) {
      $args['icon_url'] = $settings['icon_url'];
    }
  }

}
