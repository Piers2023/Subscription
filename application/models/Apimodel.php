<?php

class ApiModel extends CI_Model {

    function __construct()
	{
		parent::__construct();

		$this->project = $this->load->database('project', TRUE);
	}

    public function get_dataa() {
        // ตรวจสอบว่าการเชื่อมต่อฐานข้อมูลทำงานได้
        $query = $this->project->get('list'); // เปลี่ยน 'your_table_name' เป็นชื่อของตารางในฐานข้อมูล
        $data = $query->result(); // ส่งผลลัพธ์กลับในรูปแบบของอาเรย์
        return $data;
    }
}
