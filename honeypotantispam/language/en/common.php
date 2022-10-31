<?php

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [
	'HONEYPOT_LABEL' => 'Anti-Spam form field, dont fill if you are human',
	'HONEYPOT_ERROR' => 'We think you might be a spam bot. If this is an error, please contact a board administrator.'
]);
