<?php

class D1PluginActivate{
	
	public static function activate() {
		flush_rewrite_rules();
	}
}