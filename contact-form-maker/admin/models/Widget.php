<?php

/**
 * Class FMModelWidget_fmc
 */
class FMModelWidget_fmc {
  /**
   * PLUGIN = 2 points to Contact Form Maker
   */
  const PLUGIN = 2;

  public function get_gallery_rows_data() {
    global $wpdb;
    $query = 'SELECT * FROM ' . $wpdb->prefix . 'formmaker';
    if ( WDFMInstance(self::PLUGIN)->is_free && !class_exists('WDFM') ) {
      $query .= (!WDFMInstance(self::PLUGIN)->is_free ? '' : ' WHERE id' . (WDFMInstance(self::PLUGIN)->is_free == 1 ? ' NOT ' : ' ') . 'IN (' . (get_option('contact_form_forms', '') != '' ? get_option('contact_form_forms') : 0) . ')');
    }
    $query .= ' order by `title`';
    $rows = $wpdb->get_results($query);

    return $rows;
  }
}
