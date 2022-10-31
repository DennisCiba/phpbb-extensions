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
	'HONEYPOT_LABEL' => 'Anti-Spam Feld, nicht ausfüllen wenn du ein Mensch bist',
	'HONEYPOT_ERROR' => 'Wir glauben, dass du ein Spam-Bot bist. Wenn dies ein Fehler ist, kontaktiere einen Board-Administrator.',
]);
