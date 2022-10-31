<?php
namespace nachvollciba\honeypotantispam\event;

use phpbb\language\language;
use phpbb\request\request;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	protected $language;
    protected $request;

	public function __construct(
		language $language,
        request $request
    )
	{
		$this->language = $language;
        $this->request = $request;
	}


	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.ucp_register_data_before' => 'core_ucp_register_data_before',
            'core.ucp_register_data_after'  => 'core_ucp_register_data_after',
		);
	}

	/**
	* Adds hidden honeypot form field
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function core_ucp_register_data_before($event)
	{
		$event['data'] = array_merge($event['data'], array(
			'honeypot' => $this->request->variable('ashp-hobby', '', true),
		));

		$this->language->add_lang('common', 'nachvollciba/honeypotantispam');
	}


	/**
	* Validates that the honeypot form field is empty.
    * If not, we are dealing with a bot, therefore deny registration
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function core_ucp_register_data_after($event)
	{
		if ($event['submit'] && !empty($event['data']['honeypot']))
		{
			$error_array = $event['error'];
			$error_array[] = $this->language->lang('HONEYPOT_ERROR');
			$event['error'] = $error_array;
		}
	}
}
