<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		$titile = "Customer Industry Group ";
		parent::__construct();

		$this->load->library('session');

		if (!$this->session->userdata('username')) {

			redirect('Login/login');
		}

		
	}

	public function index()
	{
		$data['vendor'] = $this->data_model->vendor_list();
		$data["list"] = $this->data_model->display_list("");
		$this->load->view('list_request', $data);
	}

	public function logout()
	{
		$this->load->view('login_form');
	}

	public function insert()
	{

		$password = $this->input->post('password');

		// รับรหัสผ่านที่เก็บใน session
		$session_password = $this->session->userdata('password'); // รหัสผ่านจากการ login

		if ($password === $session_password) {
			$data = array(
				// 'id' => $this->input->post('id'),
				'purchase_date' => $this->input->post('purchase_date'),
				'vendor_name' => $this->input->post('vendor_name'),
				'address' => $this->input->post('address'),
				'software' => $this->input->post('software'),
				'status' => $this->input->post('status')
			);

			$this->data_model->insertdata($data);
			// $data["project"] = $this->data_model->select_project("");
			$session = $this->session->userdata('username');
			$date = date("d/M/y H:i:s");
			//  /n  = newline
			$str = "\nName : $session";
			$str .= "\nTime : $date \n";
			$str .= "*** Announcement from MIS ***\n Vendor has been added ";

			define("LINE_API", "https://notify-api.line.me/api/notify");
			$token = "VTsWVe6MlL78EUq8ALjlGTdETItA2XRlOG6qQyk18UW"; //ใส่Token ที่copy เอาไว้   //  group erp/premium	


			$queryData = array("message" => $str);
			$queryData = http_build_query($queryData, "", "&");
			$headerOptions = array(
				"http" => array(
					"method" => "POST",
					"header" => "Content-Type: application/x-www-form-urlencoded\r\n"
						. "Authorization: Bearer " . $token . "\r\n"
						. "Content-Length: " . strlen($queryData) . "\r\n",
					"content" => $queryData
				),
			);
			$context = stream_context_create($headerOptions);
			$result = file_get_contents(LINE_API, FALSE, $context);
			redirect('main');
		} else {
			// รหัสผ่านไม่ถูกต้อง
			$this->session->set_flashdata('error', 'รหัสผ่านไม่ถูกต้อง');
			redirect('main');
		}
	}

	public function edit($id)
	{
			
		$data['vendor'] = $this->data_model->vendor_list();
		$data['project'] = $this->data_model->get_data($id);
		$data['project_data_detail'] = $this->data_model->get_data_detail($id);
		$this->load->view('edit_form', $data);
	}


	// public function update($id)
	// {

	// 	$this->load->model('data_model');
	// 	$data = array(
	// 		'no' => $this->input->post('no'),
	// 		'purchase_date' => $this->input->post('purchase_date'),
	// 		'vendor_name' => $this->input->post('vendor_name'),
	// 		'groupp' => $this->input->post('group'),
	// 		'software' => $this->input->post('software'),
	// 		'status' => $this->input->post('status')
	// 	);

	// 	$this->data_model->update_data($id, $data);
	// 	redirect('main');
	// }


	public function update()
	{
		// รับข้อมูลจากฟอร์ม
		$id = $this->input->post('id');

		$password = $this->input->post('password');

		// รับรหัสผ่านที่เก็บใน session
		$session_password = $this->session->userdata('password'); // รหัสผ่านจากการ login

		// ตรวจสอบรหัสผ่าน
		if ($password === $session_password) {
			// รหัสผ่านถูกต้อง อัปเดตข้อมูลในฐานข้อมูล
			$this->load->model('data_model');
			$data = array(
				// 'id' => $this->input->post('id'),
				'purchase_date' => $this->input->post('purchase_date'),
				'vendor_name' => $this->input->post('vendor_name'),
				'address' => $this->input->post('address'),
				'software' => $this->input->post('software'),
				'status' => $this->input->post('status')
			);
			$this->data_model->update_data($id, $data);

			// ตั้งค่า flashdata แจ้งเตือนความสำเร็จ
			$this->session->set_flashdata('success', 'อัปเดตข้อมูลสำเร็จ');
			redirect('main/edit/' . $id);
		} elseif ($password !== $session_password) {
			// รหัสผ่านไม่ถูกต้อง
			$this->session->set_flashdata('error', 'รหัสผ่านไม่ถูกต้อง');
			redirect('main/edit/' . $id);
		}
	}




	// public function insert_edit()
	// {
	// 	$id = $this->input->post('ref_list_id');
	// 	$data = array(

	// 		'ref_list_id' => $this->input->post('ref_list_id'),
	// 		'doc' => $this->input->post('doc'),
	// 		'start' => $this->input->post('start'),
	// 		'end' => $this->input->post('end'),
	// 		'work_start' => $this->input->post('work_start'),
	// 		'work_end' => $this->input->post('work_end'),
	// 		'status' => $this->input->post('status'),
	// 		'list' => $this->input->post('list'),
	// 		'amount' => $this->input->post('amount')
	// 	);

	// 	$this->data_model->insertdata_detail($data);
	// 	$data['project'] = $this->data_model->get_data($id);
	// 	$data['project_data_detail'] = $this->data_model->get_data_detail($id);
	// 	$this->load->view('edit_form', $data);
	// }

	public function insert_edit()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']             = date("ymd_his");

		//$config['max_size']             = 100;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (! $this->upload->do_upload('userfile')) {
			$error = $this->upload->display_errors();

			// $this->load->view('upload_form', $error);
			// $this->load->view('upload_form', $error);
			$data["result"] = $error;
			$data["status"] = "error";
			// echo "error";
			$this->load->view('edit_form', $data);
		} else {
			$file_data = $this->upload->data();
			$id = $this->input->post('ref_list_id');
			$data = array(

				'ref_list_id' => $this->input->post('ref_list_id'),
				'doc' => $file_data['file_name'],
				'start' => $this->input->post('start'),
				'end' => $this->input->post('end'),
				'work_start' => $this->input->post('work_start'),
				'work_end' => $this->input->post('work_end'),
				'status' => $this->input->post('status'),
				'list' => $this->input->post('list'),
				'amount' => $this->input->post('amount')
			);

			$this->data_model->insertdata_detail($data);
			$data['project'] = $this->data_model->get_data($id);
			$data['project_data_detail'] = $this->data_model->get_data_detail($id);
			$data["result"] =  $this->upload->data();
			// echo "success";
			// echo "<pre>";
			// print_r($data['project_data_detail']);
			// echo "</pre>";
			$data["status"] = "success";
			// $this->load->view('edit_form', $data);
			redirect('main/edit/' . $id);
		}
	}

	public function calendar()
	{

		$this->load->view('calendar');
	}

	// ฟังก์ชันสำหรับดึงข้อมูล Event
	public function fetch_events()
	{
		$events = $this->data_model->get_events();


		echo json_encode($events);
	}

	public function add_data()
	{
		$data['add_data_list'] = $this->data_model->index_add_data("");
		$this->load->view('add_data', $data);
	}

	public function insert_add_data()
	{

		$data = array(
			'vendor_name' => $this->input->post('vendor_name')
		);

		$data['vendor_name'] = $this->data_model->insert_vendorName($data);
		redirect('main/add_data');
	}

	public function edit_vendor_name()
	{
		$id = $this->input->post('id');
		$result = $this->data_model->get_vendor_name($id);
		echo json_encode($result); // ใช้ echo เพื่อส่งข้อมูลกลับ
	}

	public function update_add_data()
	{

		$id = $this->input->post('vendor_id');

		$data = array(
			'vendor_name' => $this->input->post('vendor_name')
		);

		$this->data_model->update_add_data($id, $data);
		redirect('main/add_data');
	}

	public function vendor_delete($id)
	{

		$this->data_model->vendor_delete($id);
		redirect('main/add_data');
	}

	
}
