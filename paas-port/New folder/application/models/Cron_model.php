<?phpif (!defined('BASEPATH'))    exit('No direct script access allowed');/** * Login * @package Login * @author Atul * @category CI_Model API */class Cron_model extends CI_Model {    function __construct() {        parent::__construct();    }    /**     * Add admin user     * @param array $data     *   * @return inetger id     */    public function getPhoneNumber($id) {        $this->db->select('a.*,b.*');        $this->db->from(TABLES::$CLIENT_CONTACTS . ' as a');        $this->db->join(TABLES::$CONTACT_MAPPING . ' as b', 'a.id = b.list_id', 'inner');        $this->db->where('b.contact_id', $id);        $this->db->where('a.id = b.contact_id');        $query = $this->db->get();//        echo $this->db->last_query();        return $query->result_array();    }    /*     * Function for getting auto reposnder data     */    public function getAutoResponders() {        $this->db->select('a.*,b.*');        $this->db->from(TABLES::$MST_AUTO_RESPONDER . ' as a');        $this->db->join(TABLES::$TRANS_AUTO_RESPONDER . ' as b', 'a.id = b.responder_id', 'inner');        $query = $this->db->get();//        echo $this->db->last_query();        return $query->result_array();    }        public function getOptinUsers($list_id){        $this->db->select('a.phone,b.created_date as user_opted_in_time');        $this->db->from(TABLES::$CLIENT_CONTACTS . ' as a');        $this->db->join(TABLES::$CONTACT_MAPPING . ' as b', 'a.id = b.contact_id', 'inner');        $this->db->where('b.list_id',$list_id);        $query = $this->db->get();//        echo $this->db->last_query();        return $query->result_array();    }}