<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{

		$this->load->view('welcome_message');
	}
	public function addnew()
	{
		 
		// $this->load->view('welcome_message');
		//$this->load->view('manual');
				$data['id']="new";
		$this->load->view('addnew',$data);
	}
	public function edit()
	{
		// $this->load->view('welcome_message');
		//$this->load->view('manual');
		$data['data_id']= $this->input->post('data_id');
		$data['data'] = $this->Customer_model->get_customer($this->input->post('data_id'));
		$data['id']="edit";
		$this->load->view('edit',$data);
	}
	
	public function save()
	{

		$id= $this->input->post('id');
		$cust_name= $this->input->post('customer_name');		
		$data['result'] = $this->Customer_model->save_customers($id,$cust_name);	
		
	
		$data['customers'] = $this->Customer_model->get_all_customers('');
		echo "<script>alert('finished');
		window.location.href = '".site_url('welcome')."';
		</script>		
		";
		//$this->load->view('list',$data);
			
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */