<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class staff_webservices extends MY_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct()
    {
        parent::__construct();
        ini_set('memory_limit', "-1");
        $this->load->dbforge();
        error_reporting(E_ALL ^ E_NOTICE);
        //require_once APPPATH."/libraries/phpToPDF.php";
    }

    public function getMenuListStaff()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getMenuListStaffModel($_POST);
        echo json_encode($data);
    }

    public function getStaffTaskLists()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getStaffTaskListsMOdel($_POST);
        echo json_encode($data);
    }

    public function getAllProjectsList()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getAllProjectsListMOdel();
        echo json_encode($data);
    }

    public function getAllBugList()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getAllBugListMOdel();
        echo json_encode($data);
    }

    public function addNewTask()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->addNewTaskModel($_POST);
        echo json_encode($data);
    }

    public function getTaskDetails()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getTaskDetailsModel($_POST);
        echo json_encode($data);
    }

    public function getTaskComments()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getTaskCommentsModel($_POST);
        echo json_encode($data);
    }

    public function saveNewTaskComment()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->saveNewTaskCommentModel($_POST);
        echo json_encode($data);
    }

    public function getAdminStaffList()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getAdminStaffListModel();
        echo json_encode($data);
    }

    public function saveTaskAttachments()
    {
        /*         * *********  Code For Image Upload ********* */
        $filename = time() . $_FILES['image']['name'];
		$filename = str_replace(" ","_",$filename);
		$filename = str_replace("#","",$filename);
		$filename = str_replace("-","",$filename);
		
        $config['allowed_types'] = '*';
        $config['upload_path'] = './uploads/';
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');

        /*         * *********  End Code For Image Upload ********* */

        /*         * *******Start OF getting the  width , height of the image that is saved ********  */
        $filename = str_replace(" ", "_", $filename);
        $dp = $_SERVER['DOCUMENT_ROOT'];
        list($width, $height) = getimagesize("$dp/uploads/$filename");
        $filesize = filesize("$dp/uploads/$filename");
        $filesize = ceil($filesize / 1024);

        /*         * *******Start OF getting the  width , height of the image that is saved ********  */

        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->saveTaskAttachmentsModel($_POST, $width, $height, $filesize, $filename);
        echo json_encode($data);
    }

    public function getTaskAttachmentList()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getTaskAttachmentListModel($_POST);
        echo json_encode($data);
    }

    public function getRecentActivityTasks()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getRecentActivityTasksModel($_POST);
        echo json_encode($data);
    }

    public function deleteTaskAttachment()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->deleteTaskAttachmentModel($_POST);
        echo json_encode($data);
    }

    /*    ###########  Star Webservices For The Data #############  */

    public function createNewCampaign()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->createNewCampaignModel($_POST);
        echo json_encode($data);
    }

    public function getCampaignListsUser()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getCampaignListsUserModel($_POST);
        echo json_encode($data);
    }

    public function getTableFormatList()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getTableFormatListModel();
        echo json_encode($data);
    }

    public function getTableFormatDetail()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getTableFormatDetailModel($_POST);
        echo json_encode($data);
    }

    public function addNewColoumnToTable()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->addNewColoumnToTableModel($_POST);
        echo json_encode($data);
    }

    public function createNewFormat()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->createNewFormatModel($_POST);
        echo json_encode($data);
    }

    public function getAllCampaignsList()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getAllCampaignsListModel();
        echo json_encode($data);
    }

    public function getFormatListForCampaign()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getFormatListForCampaignModel($_POST);
        echo json_encode($data);
    }

    public function uploadCampaignData()
    {
        $this->load->library('excel');
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->uploadCampaignDataModel($_POST, $_FILES);
        echo json_encode($data);
    }

    public function getDataFormats()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getDataFormatsModel();
        echo json_encode($data);
    }

    public function getFormatsByCampaign()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getFormatsByCampaignModel($_POST);
        echo json_encode($data);
    }

    public function getFormatFieldsByFormat()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getFormatFieldsByFormatModel($_POST);
        echo json_encode($data);
    }

    public function updateFormatFields()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->updateFormatFieldsModel($_POST);
        echo json_encode($data);
    }

    public function deleteFormatField()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->deleteFormatFieldModel($_POST);
        echo json_encode($data);
    }

    public function getCampaignFormatData()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getCampaignFormatDataModel($_POST);
        echo json_encode($data);
    }

    /* webservices created by atul on 22-Sept-2016 */

    public function addNewProject()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->addNewProjectModel($_POST);
        echo json_encode($data);
    }

    public function getProjectDetailsById()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getProjectDetailsByIdModel($_POST);
        echo json_encode($data);
    }

    public function addProjectComment()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->addProjectCommentModel($_POST);
        echo json_encode($data);
    }

    public function CommentByProjectId()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->CommentByProjectIdModel($_POST);
        echo json_encode($data);
    }

    public function getAllClient()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getAllClientModel();
        echo json_encode($data);
    }

    public function getAllTask()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getAllTaskModel();
        echo json_encode($data);
    }

    public function getAllProjectsByClient()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getAllProjectsByClientModel($_POST);
        echo json_encode($data);
    }

    public function createNewBugStaff()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->createNewBugStaffModel($_POST);
        echo json_encode($data);
    }

    public function getTimesheetProject()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getTimesheetProjectModel($_POST);
        echo json_encode($data);
    }

    public function saveTimesheetManualEntry()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->saveTimesheetManualEntryModel($_POST);
        echo json_encode($data);
    }

    public function saveProjectAttachments()
    {
        /*         * *********  Code For Image Upload ********* */
        $filename = time() . $_FILES['image']['name'];
		$filename = str_replace(" ","_",$filename);
		$filename = str_replace("#","",$filename);
		$filename = str_replace("-","",$filename);
		
        $config['allowed_types'] = '*';
        $config['upload_path'] = './uploads/';
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');

        /*         * *********  End Code For Image Upload ********* */

        /*         * *******Start OF getting the  width , height of the image that is saved ********  */
        $filename = str_replace(" ", "_", $filename);
        $dp = $_SERVER['DOCUMENT_ROOT'];
        list($width, $height) = getimagesize("$dp/uploads/$filename");
        $filesize = filesize("$dp/uploads/$filename");
        $filesize = ceil($filesize / 1024);

        /*         * *******Start OF getting the  width , height of the image that is saved ********  */

        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->saveProjectAttachmentsModel($_POST, $width, $height, $filesize, $filename);
        echo json_encode($data);
    }

    public function ProjectAttachmentList()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->ProjectAttachmentListModel($_POST);
        echo json_encode($data);
    }

    public function bugListByProject()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->bugListByProjectModel($_POST);
        echo json_encode($data);
    }

    public function deleteCampaign()
    {

        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->deleteCampaignModel($_POST);
        echo json_encode($data);
    }

    public function downloadFormat()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->downloadFormatModel($_POST);
        echo json_encode($data);
    }

    public function downloadCampaign()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->downloadCampaignModel($_POST);
        echo json_encode($data);
    }

    public function getTicketsListStaff()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getTicketsListStaffModel($_POST);
        echo json_encode($data);
    }

    public function getTicketDetailStaff()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getTicketDetailStaffModel($_POST);
        echo json_encode($data);
    }

    public function getAllCampaignLists()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getAllCampaignListsModel();
        echo json_encode($data);
    }

    public function getAllFormatsList()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getAllFormatsListModel();
        echo json_encode($data);
    }

    public function getTicketcommentListStaff()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getTicketcommentListStaffModel($_POST);
        echo json_encode($data);
    }

    public function saveTicketCommentStaff()
    {
        if ($_FILES['image'] != "") {

            /*             * *********  Code For Image Upload ********* */
            $filename = time() . $_FILES['image']['name'];
            $filename = str_replace(" ", "_", $filename);
            $filename = str_replace("#", "_", $filename);
            $config['allowed_types'] = '*';
            $config['upload_path'] = './uploads/';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            /*             * *********  End Code For Image Upload ********* */

            /*             * *******Start OF getting the  width , height of the image that is saved ********  */

            $dp = $_SERVER['DOCUMENT_ROOT'];
            list($width, $height) = getimagesize("$dp/uploads/$filename");
            $filesize = filesize("$dp/uploads/$filename");
            $filesize = ceil($filesize / 1024);

            /*             * *******Start OF getting the  width , height of the image that is saved ********  */
        } else {
            $width = "";
            $height = "";
            $filesize = "";
            $filename = "";
        }

        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->saveTicketCommentStaff($_POST, $width, $height, $filesize, $filename);
        echo json_encode($data);
    }

    public function saveNewTicketStaff()
    {
        if ($_FILES['image'] != "") {
            /*             * *********  Code For Image Upload ********* */
            $filename = time() . $_FILES['image']['name'];
			$filename = str_replace(" ","_",$filename);
			$filename = str_replace("#","",$filename);
			$filename = str_replace("-","",$filename);
			
			
            $config['allowed_types'] = '*';
            $config['upload_path'] = './uploads/';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            /*             * *********  End Code For Image Upload ********* */

            /*             * *******Start OF getting the  width , height of the image that is saved ********  */

            $dp = $_SERVER['DOCUMENT_ROOT'];
            list($width, $height) = getimagesize("$dp/uploads/$filename");
            $filesize = filesize("$dp/uploads/$filename");
            $filesize = ceil($filesize / 1024);

            /*             * *******Start OF getting the  width , height of the image that is saved ********  */
        } else {
            $width = "";
            $height = "";
            $filesize = "";
            $filename = "";
        }
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->saveNewTicketStaffModel($_POST, $width, $height, $filesize, $filename);
        echo json_encode($data);
    }

    public function changeStatusOfTicketStaff()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->changeStatusOfTicketStaffModel($_POST);
        echo json_encode($data);
    }

    public function deleteTicketStaff()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->deleteTicketStaffModel($_POST);
        echo json_encode($data);
    }

    public function saveAttachmentForBugStaff()
    {
        /*         * *********  Code For Image Upload ********* */

        $filename = time() . $_FILES['image']['name'];
		$filename = str_replace(" ","_",$filename);
		$filename = str_replace("#","",$filename);
		$filename = str_replace("-","",$filename);
		
		
        $config['allowed_types'] = '*';
        $config['upload_path'] = './uploads/';
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');

        /*         * *********  End Code For Image Upload ********* */

        /*         * *******Start OF getting the  width , height of the image that is saved ********  */

        $dp = $_SERVER['DOCUMENT_ROOT'];
        list($width, $height) = getimagesize("$dp/uploads/$filename");
        $filesize = filesize("$dp/uploads/$filename");
        $filesize = ceil($filesize / 1024);

        /*         * *******Start OF getting the  width , height of the image that is saved ********  */

        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->saveAttachmentForBugStaffModel($_POST, $width, $height, $filesize, $filename);
        echo json_encode($data);
    }

    public function getBugAttachmentList()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getBugAttachmentListModel($_POST);
        echo json_encode($data);
    }

    public function getBugNotesForStaff()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getBugNotesForStaffModel($_POST);
        echo json_encode($data);
    }

    public function saveBugNotesForStaff()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->saveBugNotesForStaffModel($_POST);
        echo json_encode($data);
    }

    public function getProjectTaskListStaffDashboard()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getProjectTaskListStaffDashboardModel($_POST);
        echo json_encode($data);
    }

    public function deleteBugAttachmentStaff()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->deleteBugAttachmentStaffModel($_POST);
        echo json_encode($data);
    }

    public function getOverdueProjectStaffDashboard()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getOverdueProjectStaffDashboardModel($_POST);
        echo json_encode($data);
    }

    public function getOverdueTaskStaffDashboard()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getOverdueTaskStaffDashboardModel($_POST);
        echo json_encode($data);
    }

    public function unConfirmedBugsStaff()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->unConfirmedBugsStaffModel($_POST);
        echo json_encode($data);
    }

    public function updateBugsStaff()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->updateBugsStaffModel($_POST);
        echo json_encode($data);
    }

    public function createNewProject()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->createNewProjectModel($_POST);
        echo json_encode($data);
    }
    
    public function deletTaskStaff(){
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->deleteTaskStaffModel($_POST);
        echo json_encode($data);
    }
    public function deletBugStaff(){
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->deleteBugStaffModel($_POST);
        echo json_encode($data);
    }

    /* Report for all
     * 
     */
    public function reportStaffAll($rptName){
        $this->load->model('mobile/staff_webservices_model');
        if($rptName == 'project_task'){
            $data = $this->staff_webservices_model->project_task_report($_POST);
        }
        if($rptName == 'project_bug'){
            $data = $this->staff_webservices_model->project_bug_report($_POST);
        }
        echo json_encode($data);
    }
	
	/* Task List For Staff
     * This is related to Project Id
     */
	public function getStaffTaskListsByProject()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->getStaffTaskListsByProjectMOdel($_POST);
        echo json_encode($data);
    }
	
	/* Edit Task For Staff
     * 
     */
	public function editTaskStaff()
    {
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->editTaskStaffMOdel($_POST);
        echo json_encode($data);
    }
	
	/* Edit Ticket For Staff
     * 
     */
	public function editTicketStaff()
    {
        if ( !empty( $_FILES['image']['name'] )) {
            /*             * *********  Code For Image Upload ********* */
            $filename = time() . $_FILES['image']['name'];
			$filename = str_replace(" ","_",$filename);
			$filename = str_replace("#","",$filename);
			$filename = str_replace("-","",$filename);
			
			
            $config['allowed_types'] = '*';
            $config['upload_path'] = './uploads/';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            /*             * *********  End Code For Image Upload ********* */

            /*             * *******Start OF getting the  width , height of the image that is saved ********  */

            $dp = $_SERVER['DOCUMENT_ROOT'];
            list($width, $height) = getimagesize("$dp/uploads/$filename");
            $filesize = filesize("$dp/uploads/$filename");
            $filesize = ceil($filesize / 1024);

            /*             * *******Start OF getting the  width , height of the image that is saved ********  */
        } else {
            $width = "";
            $height = "";
            $filesize = "";
            $filename = "";
        }
        $this->load->model('mobile/staff_webservices_model');
        $data = $this->staff_webservices_model->editTicketStaffModel($_POST, $width, $height, $filesize, $filename);
        echo json_encode($data);
    }
}

?>