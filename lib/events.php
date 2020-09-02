<?php

function autosubscribegroup_join(\Elgg\Event $event) {
	$user = $event->getObject();

	if (($user instanceof \ElggUser) && ($event->getName() == 'create') && ($event->getType() == 'user')) {
		//auto submit relationships between user & groups
		//retrieve groups ids from plugin
		$groups = elgg_get_plugin_setting('systemgroups', 'autosubscribegroup');
		$groups = explode(',', $groups);

		//for each group ids
		foreach($groups as $groupId) {
			elgg_call(ELGG_IGNORE_ACCESS, function() use ($user, $groupId) {
				$groupEnt = get_entity($groupId);
			
				//if group exist : submit to group
				if ($groupEnt instanceof \ElggGroup) {
					//join group succeed?
					if ($groupEnt->join($user)) {
						// Remove any invite or join request flags
						elgg_delete_metadata([
							'guid' => $user->guid,
							'metadata_name' => 'group_invite',
							'metadata_value' => $groupEnt->guid,
							'limit' => false,
						]);
						elgg_delete_metadata([
							'guid' => $user->guid,
							'metadata_name' => 'group_join_request',
							'metadata_value' => $groupEnt->guid,
							'limit' => false,
						]);
					}
				}
			});
		}
	}
}
