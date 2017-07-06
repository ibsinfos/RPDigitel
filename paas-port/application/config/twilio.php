<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Name:  Twilio
	*
	* Author: Ben Edmunds
	*		  ben.edmunds@gmail.com
	*         @benedmunds
	*
	* Location:
	*
	* Created:  03.29.2011
	*
	* Description:  Twilio configuration settings.
	*
	*
	*/
	/**
	 * Mode ("sandbox" or "prod")
	 **/
	$config['mode']   = 'test';
	/**
	 * Account SID
	 **/
	$config['account_sid']   = 'AC77e59f4cc96937c5d9d1d2327505d198';
	/**
	 * Auth Token
	 **/
	$config['auth_token']    = 'f9b80a5dfacbdd2e1aabc96d07014967';
	/**
	 * API Version
	 **/
	$config['api_version']   = '2010-04-01';
	/**
	 * Twilio Phone Number
	 **/
	$config['number']        = '+   12676573140';
/* End of file twilio.php */