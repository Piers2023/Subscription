<?php
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
    }



    public function index()
    {

        $this->load->view('login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $users = $this->user_model->login($username, $password);

        if ($users) {

            $this->session->set_userdata('user_id', $users->id);
            $this->session->set_userdata('username', $users->username);
            $this->session->set_userdata('password', $users->password);
            $this->session->set_userdata('email', $users->email);

            $session = $this->session->userdata('username');
            $date = date("d/M/y H:i:s");
            //  /n  = newline
            $str = "\nName : $session Login successfully";
            $str .= "\nTime : $date \n";
            $str .= "*** Test from MIS ***\n Line N o t i f y ";

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

            $this->session->set_flashdata('login_error', 'Invalid username or password!');
            redirect('login');
        }
    }

    private function send_line_notify($message)
    {
        define("LINE_API", "https://notify-api.line.me/api/notify");
        $token = "VTsWVe6MlL78EUq8ALjlGTdETItA2XRlOG6qQyk18UW"; // ใส่ Token ของคุณ

        $queryData = array("message" => $message);
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

        return $result;
    }

    public function logout()
    {

        // ดึงข้อมูล session ก่อนที่จะทำลาย session
        $session = $this->session->userdata('username');
        $date = date("d/M/y H:i:s");

        // สร้างข้อความสำหรับแจ้งเตือนการ logout
        $str = "\nName : $session Logged out successfully";
        $str .= "\nTime : $date \n";
        $str .= "*** Test from MIS ***\n Line N o t i f y ";

        // ส่งข้อความไปยัง LINE Notify
        $this->send_line_notify($str);

        $this->session->sess_destroy();

        redirect('login');
    }


}
