<?php
global $wpsl_settings, $wpsl;

$output         = $this->get_custom_css();
$autoload_class = (!$wpsl_settings['autoload']) ? 'class="wpsl-not-loaded"' : '';


$output .= '<div class="row">';
$output .= "\t" . '<div class="col-lg-4">';

//start of search
$output .= '<div id="wpsl-wrap">' . "\r\n";
$output .= "\t" . '<div class="wpsl-search wpsl-clearfix ' . $this->get_css_classes() . '">' . "\r\n";
$output .= "\t\t" . '<div id="wpsl-search-wrap">' . "\r\n";
$output .= "\t\t\t" . '<form autocomplete="off" class="row">' . "\r\n";
$output .= "\t\t\t" . '<div class="col">' . "\r\n";
$output .= "\t\t\t" . '<div class="wpsl-input">' . "\r\n";
$output .= "\t\t\t\t" . '<input id="wpsl-search-input" placeholder="ENTER LOCATION OR POSTCODE" type="text" value="' . apply_filters('wpsl_search_input', '') . '" name="wpsl-search-input" placeholder="" aria-required="true" />' . "\r\n";
$output .= "\t\t\t" . '</div>' . "\r\n";
$output .= "\t\t\t" . '</div>' . "\r\n";


if ($this->use_category_filter()) {
    $output .= $this->create_category_filter();
}
$output .= "\t\t\t" . '<div class="col-auto">' . "\r\n";
$output .= "\t\t\t\t" . '<div class="wpsl-search-btn-wrap"><input id="wpsl-search-btn" type="submit" value="' . esc_attr($wpsl->i18n->get_translation('search_btn_label', __('Search', 'wpsl'))) . '"></div>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t\t" . '</form>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t" . '</div>' . "\r\n";
//end of search


$output .= "\t" . '<div id="wpsl-result-list">' . "\r\n";
$output .= "\t\t" . '<div id="wpsl-stores" ' . $autoload_class . '>' . "\r\n";
$output .= "\t\t\t" . '<ul></ul>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t\t" . '<div id="wpsl-direction-details">' . "\r\n";
$output .= "\t\t\t" . '<ul></ul>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t" . '</div>' . "\r\n";

if ($wpsl_settings['show_credits']) {
    $output .= "\t" . '<div class="wpsl-provided-by">' . sprintf(__("Search provided by %sWP Store Locator%s", "wpsl"), "<a target='_blank' href='https://wpstorelocator.co'>", "</a>") . '</div>' . "\r\n";
}

$output .= '</div>' . "\r\n";
$output .= "\t" . '</div>';

$output .= "\t" . '<div class="col-lg-8">';
$output .= "\t" . '<div id="wpsl-gmap" class="wpsl-gmap-canvas"></div>' . "\r\n";
$output .= "\t" . '</div>';
$output .= '</div>';



return $output;
