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

			redirect('login/login');
		}
	}

	public function listdd()
	{
		$subscription_id = $this->input->post('document_no');


		if ($subscription_id == "new") {
			$dat[0] = array(
				"id" => "new",
				"vendor_name" => null,
				"ref_list_id" => null,
				"start" => date("Y-m-d"),
				"end" => date("Y-m-d"),
				"doc" => null,
				"work_start" => date("Y-m-d"),
				"work_end" => date("Y-m-d"),
				"status" => null,
				"service_type" => null,
				"list" => null,
				"cost" => 0,
				"product" => null,
				"amount" => 0,
				"note" => null,
				"date_create" => date("Y-m-d"),
				"pr_number" => null,
				"vendor_code" => null
			);
		} else {
			$dat = $this->data_model->get_data_detail_by_id($subscription_id);
		}
		/*
		echo "<pre>";	
		print_r($dat);
		echo "</pre>";	
		echo " Call View ";
		*/

		$data["list_detail"] = $dat;
		$this->load->view('subscription_form', $data);

		// 		
	}

	public function newSub()
	{

		$subId = $this->input->post('subId');


		if ($subId == "new") {
			$dat[0] = array(
				"id" => "new",
				"vendor_name" => null,
				"ref_list_id" => null,
				"start" => date("Y-m-d"),
				"end" => date("Y-m-d"),
				"doc" => null,
				"work_start" => date("Y-m-d"),
				"work_end" => date("Y-m-d"),
				"status" => null,
				"service_type" => null,
				"list" => null,
				"cost" => 0,
				"product" => null,
				"amount" => 0,
				"note" => null,
				"date_create" => date("Y-m-d"),
				"pr_number" => null,
				"vendor_code" => null
			);
		} else {
			$dat = $this->data_model->get_data_detail_by_id($subId);
		}
		/*
		echo "<pre>";	
		print_r($dat);
		echo "</pre>";	
		echo " Call View ";
		*/

		$data["list_detail"] = $dat;
		$this->load->view('insert_form_edit', $data);

		// 		
	}

	function subscription_submit()
	{
		$id = trim($this->input->post('id'));
		$vendor_name = trim($this->input->post('vendor_name'));
		$ref_list_id = trim($this->input->post('ref_list_id'));
		$start = trim($this->input->post('start'));
		$end = trim($this->input->post('end'));
		$doc = trim($this->input->post('doc'));
		$work_start = trim($this->input->post('work_start'));
		$work_end = trim($this->input->post('work_end'));
		$status = trim($this->input->post('status'));
		$service_type = trim($this->input->post('service_type'));
		$list = trim($this->input->post('list'));
		$cost = trim($this->input->post('cost'));
		$product = trim($this->input->post('product'));
		$amount = trim($this->input->post('amount'));
		$note = trim($this->input->post('note'));
		$date_create = trim($this->input->post('date_create'));
		$pr_number = trim($this->input->post('pr_number'));
		$vendor_code = trim($this->input->post('vendor_code'));

		$data_array = array(
			"id" => $id,
			"vendor_name" => $vendor_name,
			"ref_list_id" => $ref_list_id,
			"start" => $start,
			"end" => $end,
			"doc" => $doc,
			"work_start" => $work_start,
			"work_end" => $work_end,
			"status" => $status,
			"service_type" => $service_type,
			"list" => $list,
			"cost" => $cost,
			"product" => $product,
			"amount" => $amount,
			"note" => $note,
			"date_create" => $date_create,
			"pr_number" => $pr_number,
			"vendor_code" => $vendor_code,
		);
		if ($id == "new") {
			// insert
		} else {
			// update
		}
		// redirect to subscript list

	}




	public function index()
	{
		$data['project_data_detail'] = $this->data_model->display_list_detail("");
		$data['vendors'] = $this->data_model->vendor_list();
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
				'status' => $this->input->post('status'),
				'tel' => $this->input->post('tel'),
				'lineid' => $this->input->post('lineid'),
				'contact_name' => $this->input->post('contact_name'),
				'email' => $this->input->post('email')
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

	public function edit($vendor_id)
	{

		// $data['vendor'] = $this->data_model->vendor_list();
		// $data['project'] = $this->data_model->get_data($id);
		$data['get_vendor_name'] = $this->data_model->get_data_detail_id($vendor_id);
		$data['project_data_detail'] = $this->data_model->get_data_detail_vendor_id($vendor_id);
		$data['vendor'] = $this->data_model->vendor_list($vendor_id);
		$this->load->view('edit_form', $data);
	}

	// public function edit($id)
	// {

	// 	// $data['vendor'] = $this->data_model->vendor_list();
	// 	// $data['project'] = $this->data_model->get_data($id);

	// 	$data['project_data_detail'] = $this->data_model->get_data_detail($id);

	// 	$this->load->view('edit_form', $data);
	// }

	public function note()
	{
		// รับค่า id ที่ส่งมาจาก AJAX ผ่าน POST request
		$id = $this->input->post('id');

		// เรียกฟังก์ชันใน Model เพื่อดึงข้อมูล
		$data = $this->data_model->getsome_data_detail($id);

		// ตรวจสอบว่ามีข้อมูลหรือไม่ก่อนส่งกลับ
		if ($data) {
			echo json_encode(array('status' => 'success', 'detail' => $data));
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'No data found.'));
		}
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
				'status' => $this->input->post('status'),
				'tel' => $this->input->post('tel'),
				'lineid' => $this->input->post('lineid'),
				'email' => $this->input->post('email')
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

	// public function insert_edit()
	// {
	// 	$config['upload_path']          = './uploads/';
	// 	$config['allowed_types']        = 'gif|jpg|png';
	// 	$config['file_name']             = date("ymd_his");

	// 	$config['max_size'] = 5120; // ขนาดสูงสุดของไฟล์ในหน่วย KB (5MB)
	// 	$config['max_width'] = 2048; // ความกว้างสูงสุดของรูปภาพในพิกเซล
	// 	$config['max_height'] = 2048; // ความสูงสูงสุดของรูปภาพในพิกเซล

	// 	//$config['max_size']             = 100;
	// 	//$config['max_width']            = 1024;
	// 	//$config['max_height']           = 768;

	// 	$this->load->library('upload', $config);

	// 	if (! $this->upload->do_upload('userfile')) {
	// 		$error = $this->upload->display_errors();

	// 		// $this->load->view('upload_form', $error);
	// 		// $this->load->view('upload_form', $error);
	// 		$data["result"] = $error;
	// 		$data["status"] = "error";

	// 		// echo "error";
	// 		$this->load->view('edit_form', $data);
	// 	} else {
	// 		$file_data = $this->upload->data();
	// 		// $id = $this->input->post('ref_list_id');
	// 		$data = array(

	// 			// 'ref_list_id' => $this->input->post('ref_list_id'),
	// 			'doc' => $file_data['file_name'],
	// 			'pr_number' => $this->input->post('pr_number'),
	// 			'start' => $this->input->post('start'),
	// 			'end' => $this->input->post('end'),
	// 			'work_start' => $this->input->post('work_start'),
	// 			'work_end' => $this->input->post('work_end'),
	// 			'status' => $this->input->post('status'),
	// 			'list' => $this->input->post('list'),
	// 			'service_type' => $this->input->post('service_type'),
	// 			'amount' => $this->input->post('amount'),
	// 			'product' => $this->input->post('product'),
	// 			'note' => $this->input->post('note')

	// 		);

	// 		$this->data_model->insertdata_detail($data);
	// 		// $data['project'] = $this->data_model->get_data($id);
	// 		// $data['project_data_detail'] = $this->data_model->get_data_detail($id);
	// 		$data["result"] =  $this->upload->data();
	// 		// echo "success";
	// 		// echo "<pre>";
	// 		// print_r($data['project_data_detail']);
	// 		// echo "</pre>";
	// 		$data["status"] = "success";
	// 		// $this->load->view('edit_form', $data);
	// 		redirect('main/edit/' . $id);
	// 	}
	// }

	public function add_sub()
	{

		$id = $this->input->post('id');

			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['file_name']             = date("ymd_his");

			$config['max_size'] = 5120; // ขนาดสูงสุดของไฟล์ในหน่วย KB (5MB)
			$config['max_width'] = 2048; // ความกว้างสูงสุดของรูปภาพในพิกเซล
			$config['max_height'] = 2048; // ความสูงสูงสุดของรูปภาพในพิกเซล

			//$config['max_size']             = 100;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;

			$this->load->library('upload', $config);
			
			if ($id == 'new'){

				if (! $this->upload->do_upload('userfile')) {
					$error = $this->upload->display_errors();
	
					// $this->load->view('upload_form', $error);
					// $this->load->view('upload_form', $error);
					$data["result"] = $error;
					$data["status"] = "error";
	
	
					$this->load->view('edit_form', $data);
				} else {
					$file_data = $this->upload->data();
	
					$d = $this->data_model->search_vendor_id($this->input->post('vendor_name'));
					$vendor_code = $d[0]["vendor_code"];
					$data = array(
	
	
						'doc' => $file_data['file_name'],
						'pr_number' => $this->input->post('pr_number'),
						'start' => $this->input->post('start'),
						'end' => $this->input->post('end'),
						'work_start' => $this->input->post('work_start'),
						'work_end' => $this->input->post('work_end'),
						'status' => $this->input->post('status'),
						'list' => $this->input->post('list'),
						'service_type' => $this->input->post('service_type'),
						'cost' => $this->input->post('cost'),
						'product' => $this->input->post('product'),
						'amount' => $this->input->post('amount'),
						'note' => $this->input->post('note'),
						'vendor_name' => $this->input->post('vendor_name'),
						'vendor_code' => $vendor_code
					);
	
					$this->data_model->insertdata_detail($data);
					// $data['project'] = $this->data_model->get_data($id);
					// $data['project_data_detail'] = $this->data_model->get_data_detail($id);
					$data["result"] =  $this->upload->data();
					// echo "success";
					// echo "<pre>";
					// print_r($data['project_data_detail']);
					// echo "</pre>";
					$data["status"] = "success";
					redirect('main');
					
				}
			} else {

				if (! $this->upload->do_upload('userfile')) {
					$error = $this->upload->display_errors();
	
					// $this->load->view('upload_form', $error);
					// $this->load->view('upload_form', $error);
					$data["result"] = $error;
					$data["status"] = "error";
	
	
					$this->load->view('edit_form', $data);
				} else {

					$file_data = $this->upload->data();
	
					$d = $this->data_model->search_vendor_id($this->input->post('vendor_name'));
					$vendor_code = $d[0]["vendor_code"];
					$data = array(
	
	
						'doc' => $file_data['file_name'],
						'pr_number' => $this->input->post('pr_number'),
						'start' => $this->input->post('start'),
						'end' => $this->input->post('end'),
						'work_start' => $this->input->post('work_start'),
						'work_end' => $this->input->post('work_end'),
						'status' => $this->input->post('status'),
						'list' => $this->input->post('list'),
						'service_type' => $this->input->post('service_type'),
						'cost' => $this->input->post('cost'),
						'product' => $this->input->post('product'),
						'amount' => $this->input->post('amount'),
						'note' => $this->input->post('note'),
						'vendor_name' => $this->input->post('vendor_name'),
						'vendor_code' => $vendor_code
					);
	
					$this->data_model->update_data($id, $data);
					// $data['project'] = $this->data_model->get_data($id);
					// $data['project_data_detail'] = $this->data_model->get_data_detail($id);
					$data["result"] =  $this->upload->data();
					// echo "success";
					// echo "<pre>";
					// print_r($data['project_data_detail']);
					// echo "</pre>";
					$data["status"] = "success";
					redirect('main');
					
				}
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
		$data['add_software_list'] = $this->data_model->index_add_software("");
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

	public function check_upcoming()
	{
		$upcoming_events = $this->data_model->get_upcoming_events(); // ดึงข้อมูลจากโมเดล

		// ส่งข้อมูลกลับในรูปแบบ JSON
		echo json_encode($upcoming_events);
	}

	public function send_software_expiration_email()
	{
		// โหลด model
		$this->load->model('data_model');

		// ดึงข้อมูลซอฟต์แวร์ที่ใกล้หมดอายุจาก model
		$expiring_software = $this->data_model->get_expiring_software();

		// ดึงอีเมลผู้ใช้จาก session
		$user_email = $this->session->userdata('email');  // อีเมลของผู้ใช้

		// ส่งอีเมลแจ้งเตือนถ้ามีซอฟต์แวร์ที่กำลังจะหมดอายุภายใน 15 วัน
		foreach ($expiring_software as $software) {
			$this->send_email_notification($software['list'], $software['end'], $user_email);
		}

		// คืนค่าผลลัพธ์เป็นข้อความ JSON
		echo json_encode(['status' => 'Emails sent for expiring software if any.']);
	}

	private function send_email_notification($software_name, $expiration_date, $user_email)
	{
		// โหลดไลบรารี email
		$this->load->library('email');

		// ตั้งค่าการเชื่อมต่อ SMTP
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'peacepimpee2002@gmail.com', // อีเมลของคุณ
			'smtp_pass' => '029431173pee', // รหัสผ่านอีเมลของคุณ
			'mailtype' => 'html',
			'charset'  => 'utf-8',
			'wordwrap' => TRUE
		);
		$this->email->initialize($config);

		// ตั้งค่าเนื้อหาอีเมล
		$this->email->from('peacepimpee2002@gmail.com', 'Software Expiration System');
		$this->email->to($user_email);  // ใช้อีเมลของผู้ใช้จาก session
		$this->email->subject('Software Expiration Reminder: ' . $software_name);
		$this->email->message('The software "' . $software_name . '" will expire on ' . $expiration_date . '. Please renew it soon.');

		// ส่งอีเมล
		if ($this->email->send()) {
			log_message('info', 'Email sent successfully for software: ' . $software_name . ' to ' . $user_email);
		} else {
			log_message('error', 'Failed to send email for software: ' . $software_name);
			show_error($this->email->print_debugger());
		}
	}
}
