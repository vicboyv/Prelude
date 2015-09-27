<?php 

class Artists_model extends CI_Model 
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    public function getRandomArtists($size)
	{
		$this->load->database();
		$this->db->select("id, name, img");
		$this->db->order_by("id", "random"); 
		$this->db->where('type', 'artist');
		$query = $this->db->get('artists', $size);
		$results = $query->result_array();
		return $results;
	}
	public function getSongs($artist)
	{
		$artist = urldecode($artist);
		$this->load->database();
		$this->db->select("title, artist, filename");
		$this->db->where("artist", $artist);
		$query = $this->db->get('songs');
		$results = $query->result_array();
		return json_encode($results);
	}
	public function getProfile($artist)
	{
		$this->load->database();
		$this->db->select("name, img, bio, location, coordinates");
		$this->db->where("name", $artist);
		$query = $this->db->get('artists');
		$results = null;
		foreach ($query->result() as $row)
		{
			$results = $row;
		}
		return $results;
	}
	/*
	public function openUser($username)
	{
		$this->db->select("username, password");
		$query = $this->db->get_where('users', array('username' => $username));
		$results = $query->result_array()[0];
		return $results;
	}
	public function editUser($username, $password, $newuser, $newpass)
	{
		if($password != $newpass) //If newpass (without hashing) matches old password, password was not changed! Else, hash it.
		{
			$newpass = md5(SaltConstant . md5($newpass) . $newpass);
		}
		if($this->validateEntries($newuser, $newpass, $username, $password))
		{
			$data = array(
				   'username' => $newuser,
				   'password' => $newpass
				);
			$this->db->where('username', $username);
			$this->db->update('users', $data); 
			//If edit name, edit entries as well?
		}
		else
		{
			throw new Exception("Conflict found!");
		}
	}
	public function deleteUser($username, $password)
	{
		$this->db->delete('users', array('username' => $username, 'password' => $password)); 
	}
	public function addUser($username, $password)
	{
		$password = md5(SaltConstant . md5($password) . $password);
		if($this->validateEntries($username, $password))
		{
			$data = array(
				   'username' => $username ,
				   'password' => $password
				);
			$this->db->insert('users', $data); 
		}
		else
		{
			throw new Exception("Conflict found!");
		}
	}
	private function validateEntries($newname, $newpass, $oldname = '', $oldpass = '') //Consider hashing the newpass prior to use.
	{
		if($newname == $oldname && $newpass == $oldpass)
		{
			return true;
		}
		if($newname != $oldname)
		{
			$this->db->where('username', $newname);
		}
		if($newpass != $oldpass)
		{
			$this->db->or_where('password', $newpass);
		}
		$this->db->from('users');
		if($this->db->count_all_results() == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}*/
}

?>