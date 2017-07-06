<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * CodeIgniter vCard  library
 * Extended by Jeremy Gimbel [jeremy@jgimbel.com]
 * Based upon vCard library for Codeigniter by Carlos Alcala [carlos.alcala@upandrunningsoftware.com]
 * and class_vcard from Troy Wolf [troy@troywolf.com]
 *
 * March 3, 2010
 *
 * Usage within Codeigniter:
 *
 * Place the Vcard.php file in your system/application/libraries directory.
 * Load the library using $this->load->library('vcard');
 * Create an associative array for the card data using keys for each field that match those below
 * Generate a vCard file using one of the generate methods (generate_string, generate_file, 
 * generate_download)
 *
 * See sample app.php controller file for an example.
 *
 * Information at: http://dreadfullyposh.com/
 */
if ( ! defined('BASEPATH') )
    exit( 'No direct script access allowed' );

class Nativesession
{
    public function __construct()
    {
	if(!isset($_SESSION)){
        session_start();
	}
    }

    public function set( $key, $value )
    {
        $_SESSION[$key] = $value;
    }

    public function get( $key )
    {
        return isset( $_SESSION[$key] ) ? $_SESSION[$key] : null;
    }

    public function regenerateId( $delOld = false )
    {
        session_regenerate_id( $delOld );
    }

    public function delete( $key )
    {
        unset( $_SESSION[$key] );
    }
}

?>