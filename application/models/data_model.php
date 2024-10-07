<?php
class data_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();

		$this->project = $this->load->database('project', TRUE);
	}

	public function display_list() {

		$sql = "select * from list";
		$query = $this->project->query($sql);
		return $query->result_array();
	}

	public function vendor_list()
	{
		$sql = "select * from vendor_name";
		$query = $this->project->query($sql);
		return $query->result_array();
	}


	public function insertdata($data) {

		$this->project->insert('list', $data);
	}

	public function insertdata_detail($data) {

		$this->project->insert('list_detail', $data);
	}

    public function users_list()
	{
		$sql = "select * from users";
		$query = $this->project->query($sql);
		return $query->result_array();
	}

	public function get_data($id) {
		$query = $this->project->get_where('list', array('id' => $id));
		return $query->row_array();
	}

	public function get_data_detail($id) {
		// $query = $this->project->get_where('list_detail', array('ref_list_id' => $id));
		// return $query->row_array();
		$sql = "select * from list_detail where ref_list_id = $id  ";
			
			$query = $this->project->query($sql);
			return $query->result_array();
	}

	public function update_data($id, $data) {
		$this->project->where('id', $id);
		$this->project->update('list', $data);
	}


    public function get_events() {
        // ใช้ Query Builder Class เพื่อเลือกคอลัมน์ที่ต้องการ
    $this->project->select('list.vendor_name as title, list.software, list_detail.start, list_detail.end');
    $this->project->from('list');
	$this->project->join('list_detail', 'list.id = list_detail.ref_list_id');
    $query = $this->project->get(); // ดึงข้อมูลจากฐานข้อมูล

    $events = $query->result_array();

	return $events;	
    }
	

	public function index_add_data() {

		$sql = "select * from vendor_name";
		$query = $this->project->query($sql);
		return $query->result_array();
	}

	public function insert_vendorName($data) {

		$this->project->insert('vendor_name', $data);
		
	}

	public function get_vendor_name($id)
	{
		$query = $this->project->get_where('vendor_name', array('id' => $id));
		return $query->row_array();
	}

	public function update_add_data($id, $data)
	{
		$this->project->where('id', $id);
		$this->project->update('vendor_name', $data);
	}

	public function vendor_delete($id)
	{
		$this->project->where('id', $id);
		$this->project->delete('vendor_name');

	}

	public function get_vendor_data($id)
	{
		$this->project->where('id', $id);
		$query = $this->project->get('list');
		return $query->row_array();
	}

	
}
