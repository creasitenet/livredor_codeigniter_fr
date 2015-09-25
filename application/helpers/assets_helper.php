<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('css_url')) {
	function css_url($name) {
		return base_url() . 'assets/css/' . $name . '.css';
	}
}

if ( ! function_exists('js_url')) {
	function js_url($name) {
		return base_url() . 'assets/js/' . $name . '.js';
	}
}

if ( ! function_exists('img_url')) {
	function img_url($name) {
		return base_url() . 'assets/img/' . $name;
	}
}

if ( ! function_exists('img')) {
	function img($name, $alt = '', $width='', $height='') {
		return '<img src="' . img_url($name) . '" width="' . $width . '" height="' . $height . '" alt="' . $alt . '" />';
	}
}

if ( ! function_exists('picture_url')) {
	function picture_url($name) {
		return base_url() . 'server/picture/' . $name;
	}
}

if ( ! function_exists('picture')) {
	function picture($name, $alt = '') {
		return '<img src="' . picture_url($name) . '" alt="' . $alt . '" />';
	}
}

if (!function_exists('js_ckeditor_url')) {
	function js_ckeditor_url($name) {
		return base_url() . 'assets/plugins/ckeditor/' . $name . '.js';
	}
}

if (!function_exists('js_ckfinder_url')) {
	function js_ckfinder_url($name) {
		return base_url() . 'assets/plugins/ckfinder/' . $name . '.js';
	}
}