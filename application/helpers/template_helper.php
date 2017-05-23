<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (! function_exists('setMenuItemActive')) {
	/**
	 * Gere qual o menu activo
	 * @param boolean $flag [description]
	 */
	function setMenuActiveItem($flag = false) {
		if($flag) {
			return 'class="active"';
		} else {
			return '';
		}
	}
}