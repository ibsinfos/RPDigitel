<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author 	: Creativeitem
 *	date		: 25 May, 2017
 *	Vidplanet Video Cms Pro version
 *	http://codecanyon.net/user/Creativeitem
 *	support.creativeitem.com
 */

class Install extends CI_Controller
{
    // Default function, Instruction to user to install for the first time
    public function index()
    {
        $this->load->view('backend/install');
    }
    function test()
    {
    	echo 'hello';
    }
}
