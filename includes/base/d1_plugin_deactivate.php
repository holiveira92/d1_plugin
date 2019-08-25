<?php

class D1PluginDeactivate{
	
	public static function deactivate() {
		flush_rewrite_rules();
	}
}