<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	/**
	* @param $data array
	* @usage : $result = $this->user_model->update(['login' => 'Gabkings1'],2);
	*/

	public function update($data, $user_id)
	{
		$this->db->where(['user_id' => $user_id]);
		$this->db->update('user',$data);
		return $this->db->affected_rows();
		
	}

	/**
	*@usage
	* Single: $this->user_model->get(2)
	* All: $this->user_model->get()
	*/

	public function get($user_id = null)
	{
		if($user_id === null){
			$query = $this->db->get('user');
		}else if(is_array($user_id)){
			$query = $this->db->get_where('user', $user_id);
		}
		else{
			$query = $this->db->get_where('user',['user_id' => $user_id]);
		}

		return $query->result_array();
		
	}

	/**
	* @param array $data;
	* @usage: $result = $this->user_model->insert('user',['login' => Gabkings1]);
	*/

	public function insert($data)
	{
		$this->db->insert('user',$data);
		return $this->db->insert_id();

		
	}

	public function delete($user_id)
	{
		$this->db->delete('user',['user_id' => $user_id]);
		return $this->db->affected_rows();
		
	}
}