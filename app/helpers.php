<?php

if( ! function_exists('fa_link_to_route') ) {
	function fa_link_to_action($route, $text, $icon = '', $params = array(), $attrs = array() )
	{
		if($icon) {
			$text = '<span class="fi-' . $icon . '" aria-hidden="true"></span> ' . $text;
		}
		return link_to_action($route, $text, $params, $attrs);
	}
}
