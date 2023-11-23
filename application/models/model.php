<?php
class model extends CI_Model
{

	/*View User database*/
	function display_records()
	{
		$query = $this->db->get("phone_product");
		return $query->result();
	}

	function display_records_tv()
	{
		$query = $this->db->get("tv_product");
		return $query->result();
	}
	function display_records_watch()
	{
		$query = $this->db->get("watch_product");
		return $query->result();
	}

	/*View User database by ID*/
	function display_by_id($id)
	{
		$query=$this->db->query("select * from phone_product where id='".$id."'");
	return $query->result();
	}

	function display_by_id_1()
	{
		$query=$this->db->query("select * from phone_product where id='1'");
		
	return $query->result();
	}

	/*View electronics  database by ID*/
	function display_by_id_info($id)
	{
		$query=$this->db->query("select * from users where id='".$id."'");
	return $query->result();
	}

	function display_records_toy()
	{
		$query = $this->db->get("toys");
		return $query->result();
	}
	function display_records_home_kitchen()
	{
		$query = $this->db->get("home_kitichen");
		return $query->result();
	}

	/*View Electronics database*/
	function display_recordss()
	{
		$query = $this->db->get("electronics");
		return $query->result();
	}

	/*View User database*/
	function users()
	{
		$query = $this->db->get("users");
		return $query->result();
	}

	/*View website_information database*/
	function website_setting()
	{
		$query = $this->db->get("website_information");
		return $query->result();
	}
	function update_info($name,$logo,$icon)
	{
		// $data = array(
		// 	"name"=> $name,
		// 	"logo"=> $logo,
		// 	"icon"=> $icon,$data
		// );
		
		// $query=
		$this->db->query("UPDATE website_information SET name='$name', logo='$logo' , icon='$icon' WHERE id=1");
		return true;
	}
	function update__store_info($data)
	{
		$query =$this->db->insert('store_information', $data);
		// $this->db->insert("UPDATE `store_information` SET `store_name`='$store_name',`store_email`='$store_email',`legal_name`='$legal_name',`phone`='$phone',`street`='$street',`apartment`='$apartment',`city`='$city',`pin_num`='$pin_num',`country`='$country',`state`='$state',`currency`='$currency' WHERE `id =1'");
		return true;
	}

	function otp_sent($otp)
	{
		$query=$this->db->query("select* from users where otp='$otp'");
		return $query->result();
	}

	/*save data in database*/
	function saverecords($data)
	{
		$query =$this->db->insert('users', $data);
		return true;
	}
	       
	function displayrecordsById($email, $pass)
	{
		$query = $this->db->get_where('users', array('email' => $email, 'otp' => $pass));

		return $query->row_array();
	}


	function user_update_profile($id)
	{
		$query=$this->db->query("select * from users where id='".$id."'");
	return $query->result();
	}
	function user_delete_profile($id)
	{
		$query=$this->db->query("DELETE FROM `users` WHERE id='".$id."'");
	    return true;
	}

	function update__user_info($data,$id)
	{

		$data = array(
			"photo"=>$data['photo'],
				"first_name"=>$data['first_name'],
				"last_name"=> $data['last_name'],
				"email"=> $data['email'],
				'phone_num'=> $data['phone_num'],
				'dob'=> $data['dob'],
				'gender'=> $data['gender'],
				'address'=> $data['address'],
			);
			$this->db->where('id', $id);
			$this->db->update('users', $data);
	return true;
	}

	 

	/*Update*/
	function User_login($email, $pass)
	{
		$query = $this->db->query("select * from Users where email='$email',otp='$pass' ");
		$row = $query->num_rows();
		if (count($row) > 0) {
			echo "<script>alert('login succesfull')</script>";
			// redirect('http://localhost:8080/coreigniter_4/Welcome'); 
		} else {
			echo "Insert error !";

		}
	}

	
 // ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  
    //  save phone_product in database
	function phone_product($data)
	{
		$query =$this->db->insert('phone_product', $data);
		return true;
	}

	//  save tv_product in database
	function tv_product($data)
	{
		$query =$this->db->insert('tv_product', $data);
		return true;
	}

	//  save tv_product in database
	function watch_product($data)
	{
		$query =$this->db->insert('watch_product', $data);
		return true;
	}

	//  save earphone_product in database
	function earphone_product($data)
	{
		$query =$this->db->insert('earphone_product', $data);
		return true;
	}

	//  save earphone_product in database
	function laptop_product($data)
	{
		$query =$this->db->insert('laptop_product', $data);
		return true;
	}

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


	

}