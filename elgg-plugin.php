<?php

/**
 * Elgg autosubscribegroup plugin
 * This plugin allows new users to get joined to groups automatically when they register.
 *
 * @package autosubscribegroups
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author RONNEL Jérémy
 * @copyright (c) Elbee 2008
 * @link /www.notredeco.com
 *
 * for Elgg 1.8 onwards by iionly (iionly@gmx.de)
 */

return [
	'plugin' => [
		'name' => 'Autosubscribegroup',
		'version' => '4.0.0',
	],
	'events' => [
		'create' => [
			'user' => [
				'Autosubscripegroup\Events::autosubscribegroup_join' => [],
			],
		],
	],
];
