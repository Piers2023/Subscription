<?php
class user_model extends CI_Model
{

    function __construct()
	{
		parent::__construct();

		$this->project = $this->load->database('project', TRUE);
	}

    public function login($username, $password)
    {

        $this->project->where('username', $username);
        $query = $this->project->get('users');

        if ($query->num_rows() == 1) {
            $user = $query->row();
            if ($password == $user->password) {
                return $user;
            } else {
                return false;
            }
        }

        return false;
    }


    public function get_users($id)
    {
        $query = $this->project->get_where('users', array('id' => $id));
        return $query->row_array();
    }


}
