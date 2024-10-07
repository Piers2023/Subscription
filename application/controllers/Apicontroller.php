<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ApiModel'); // โหลด Model
        header('Access-Control-Allow-Origin: *'); // อนุญาตให้เข้าถึงจากทุกโดเมน
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // กำหนด HTTP methods ที่อนุญาต
        header('Access-Control-Allow-Headers: Content-Type, Authorization'); // กำหนด headers ที่อนุญาต
        header('Content-Type: application/json'); // ตั้งค่าหมายเหตุให้เป็น JSON
    }

    public function get_data() {
        $data = $this->Apimodel->get_dataa(); // เรียกใช้ฟังก์ชันใน Model ที่มีอยู่
        echo json_encode($data); // แสดงผลเป็น JSON
    }
}
?>
