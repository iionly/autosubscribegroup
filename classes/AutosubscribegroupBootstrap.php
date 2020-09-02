<?php

class AutosubscribegroupBootstrap extends \Elgg\DefaultPluginBootstrap {

	public function init() {
		elgg_register_event_handler('create', 'user', 'autosubscribegroup_join', 502);
	}
}