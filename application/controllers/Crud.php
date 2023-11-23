<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct()
	{
		/*call CodeIgniter's default Constructor*/
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
		/*load database libray manually*/
		$this->load->database();

		/*load database libray manually*/
		$this->load->library('session');

		/*load Model*/
		$this->load->model('model');

	}
    
	// Home Page
	public function index()
	{
		$result['web']=$this->model->website_setting();
		$result['data']=$this->model->display_recordss();
		$result['toy']=$this->model->display_records_toy();
		$result['home']=$this->model->display_records_home_kitchen();
		$this->load->view('Home_page',$result);
		
	}

	// User Home Page
	public function user()
	{
		$result['data']=$this->model->website_setting();
		if ($this->session->userdata('user')) {
			// $v =$this->session->userdata('user');
			// 	 print_r($v); 
			$result['data']=$this->model->display_recordss();
		    $result['toy']=$this->model->display_records_toy();
		    $result['home']=$this->model->display_records_home_kitchen();
		    $this->load->view('user_page',$result);
			
		} else {
			redirect('http://localhost:8080/coreigniter_4/Crud');
		}
	}

	// Sign up Page
	public function sign_up()
	{
		$result['data']=$this->model->website_setting();
		$this->load->view('sign_up');

		if ($this->input->post('save')) {
			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['email'] = $this->input->post('email');
			$data['phone_num'] = $this->input->post('phone_no');
			$data['dob'] = $this->input->post('dob');
			$data['gender'] = $this->input->post('flexRadioDefault');
			$data['address'] = $this->input->post('address');

			$response = $this->model->saverecords($data);
			if ($response == true) {
				echo"<script>alert('login sucessfully')</script>";
				redirect('http://localhost:8080/coreigniter_4/Crud/verify');
				
			} else {
				echo "Insert error !";
				echo"<script>alert('Insert error !')</script>";
			}
		}
	}

	// Login Page
	public function login()
	{
		$result['data']=$this->model->website_setting();
		$this->load->view('login');

		if ($this->input->post('collect')) {
			
			$email= $this->input->post('email');
			$pass = $this->input->post('password');

			$data=$this->model->displayrecordsById($email,$pass);
			
			if($data == true) {
				echo"<script>alert('login sucessfully')</script>";
			     $this->session->set_userdata('user', $email);
				 $v =$this->session->userdata('user');
				 print_r($v);
				
				  redirect('http://localhost:8080/coreigniter_4/Crud/user');
				
			} else {
				echo"<script>alert('Incorrect !')</script>";
			} 
		
		}
	}

	// Home  Payment Page login
	public function checkout_login()
	{
		$result['data']=$this->model->website_setting();
		$this->load->view('login');

		if ($this->input->post('collect')) {
			
			$email= $this->input->post('email');
			$pass = $this->input->post('password');

			$data=$this->model->displayrecordsById($email,$pass);
			
			if($data == true) {
				echo"<script>alert('login sucessfully')</script>";
			     $this->session->set_userdata('user', $email);
				 $v =$this->session->userdata('user');
				 print_r($v);
				
				  redirect('http://localhost:8080/coreigniter_4/Crud/checkout');
				
			} else {
				echo"<script>alert('Incorrect !')</script>";
			} 
		
		}
	}

	// Forget Password Page
	public function forget_password()
	{
		$result['data']=$this->model->website_setting();
		$this->load->view('forget_pass');
	}

	// Verification Email Account Page
	public function verify()
	{
		$result['data']=$this->model->website_setting();
		$this->load->view('verify');

		if ($this->input->post('collect')) {
			$data['email'] = $this->input->post('email_id');
			$response = $this->model->saverecords($data);
			if ($response == true) {
				
				
			} else {
				echo "Insert error !";
				echo"<script>alert('Insert error !')</script>";
			}
		}
	}

	// Verify email by using OTP Page
	public function otp()
	{
		$result['data']=$this->model->website_setting();
		$this->load->view('otp');
		if ($this->input->post('collect')) {
			$otp = $this->input->post('otp');
			$response = $this->model->otp_sent($otp);

			if ($response == true) {
				echo"<script>alert('Login Successfully !')</script>";
				redirect('http://localhost:8080/coreigniter_4/Crud/login');
			} else {
				echo "Insert error !";
				echo"<script>alert('Insert error !')</script>";
			}
		}
	}

	// User Log out Page
	public function log_out()
	{
		echo"<script>alert('login out')</script>";
		session_destroy();
		
		redirect('http://localhost:8080/coreigniter_4/Crud');
	}


	// Home Product View Page
	public function view()
	{
		$result['data']=$this->model->website_setting();
		$result['data']=$this->model->display_records();
		$result['tv']=$this->model->display_records_tv();
		$this->load->view('view_more',$result);
		
	}

	// User Product view Page
	public function view_user()
	{
		if ($this->session->userdata('user')) {
			// $v =$this->session->userdata('user');
			// 	 print_r($v); 
			$result['data']=$this->model->website_setting();
		$result['data']=$this->model->display_records();
		$result['tv']=$this->model->display_records_tv();
			
		    $this->load->view('view_user',$result);	
	    }
	}

	// Home Product View Details Page
    public function view_product_detail()
	{
		
		$id=$this->input->get('id');
		$result['data']=$this->model->website_setting();
		$result['data']=$this->model->display_by_id($id);
		$this->load->view('view_product_info',$result);
	}

	// User Product View Details Page
	public function view_product_detail_user()
	{
		if ($this->session->userdata('user')) {
			// $v =$this->session->userdata('user');
			// 	 print_r($v); 
		     $id=$this->input->get('id');
			 $result['data']=$this->model->website_setting();
		    $result['data']=$this->model->display_by_id($id);
		    $this->load->view('view_product_info_user',$result);
	    }
	}

	// User Payment Page
	public function checkout()
	{
		if ($this->session->userdata('user')) {
			// $v =$this->session->userdata('user');
			// 	 print_r($v); 
			$id=$this->input->get('id');
			$result['data']=$this->model->website_setting();
		    $result['data']=$this->model->display_by_id($id);
		    $this->load->view('checkout_page',$result);
		} else {
			redirect('http://localhost:8080/coreigniter_4/Crud/checkout_login');
		}
	}


	public function view_info()
	{
		$id=$this->input->get('id');
		$result['data']=$this->model->website_setting();
		$result['data']=$this->model->display_by_id_info($id);
		$this->load->view('view_product_info',$result);
	}
	
	public function view_info_product()
	{
		if ($this->session->userdata('user')) {
			// $v =$this->session->userdata('user');
			// 	 print_r($v); 
		    $id=$this->input->get('id');
		    $result['data']=$this->model->display_by_id_info($id);
			$result['web']=$this->model->website_setting();
		    $this->load->view('view_product_info_user',$result);
	    }
    }
	
	// public function Product()
	// {
	// 	$result['data']=$this->model->display_records();
	// 	$this->load->view('Product',$result);
		
	// }

	// Admin Dashboard Page
	public function dashboard()
	{
		
		$result['data']=$this->model->website_setting();
		$result['data']=$this->model->users();
		$this->load->view('dashboard',$result);
		
	}
	
	// Admin Product Page
	public function product()
	{
		$result['data']=$this->model->website_setting();
		    $result['data']=$this->model->display_records();
		    $result['toy']=$this->model->display_records_tv();
		    $result['home']=$this->model->display_records_watch();
		$this->load->view('dashboard_product',$result);
		
	}
	public function product_phone_view()
	{
		$id=$this->input->get('id');
		$result['data']=$this->model->user_update_profile($id);
		$this->load->view('product_phone_view');

		if ($this->input->post('save')) {
			$data['photo'] = $this->input->post('photo');
			$data['product_name'] = $this->input->post('product_name');
			$data['model_number'] = $this->input->post('model_number');
			$data['opreating_system'] = $this->input->post('opreating_system');
			$data['gpu'] = $this->input->post('gpu');
			$data['ram'] = $this->input->post('ram');
			$data['product_dimention'] = $this->input->post('product_dimention');
			$data['battries'] = $this->input->post('battries');
			$data['wirless_communication_tech'] = $this->input->post('wirless_communication_tech');
			$data['connectivity_technology'] = $this->input->post('connectivity_technology');
			$data['special_feature'] = $this->input->post('special_feature');
			$data['display_technology'] = $this->input->post('display_technology');
			$data['other_display_feature'] = $this->input->post('other_display_feature');
			$data['form_factor'] = $this->input->post('form_factor');
			$data['color'] = $this->input->post('color');
			$data['battrey_rating'] = $this->input->post('battrey_rating');
			$data['in_the_box'] = $this->input->post('in_the_box');
			$data['manufacturing'] = $this->input->post('manufacturing');
			$data['country_of_origin'] = $this->input->post('country_of_origin');
			$data['item_weight'] = $this->input->post('item_weight');
			

			$response = $this->model->phone_product($data);
			if ($response == true) {
				echo"<script>alert('save sucessfully')</script>";
				// redirect('http://localhost:8080/coreigniter_4/Crud/verify');
				
			} else {
				echo "Insert error !";
				echo"<script>alert('Insert error !')</script>";
			}
		}
		
	}
	public function product_tv_view()
	{
		$id=$this->input->get('id');
		$result['data']=$this->model->user_update_profile($id);
		$this->load->view('product_tv_view');

		if ($this->input->post('save')) {
			$data['photo'] = $this->input->post('photo');
			$data['model_name'] = $this->input->post('model_name');
			$data['model'] = $this->input->post('model');
			$data['model_year'] = $this->input->post('model_year');
			$data['product_dimention'] = $this->input->post('product_dimention');
			$data['battries'] = $this->input->post('battries');
			$data['memorey_capacity'] = $this->input->post('memorey_capacity');
			$data['ram_installed_size'] = $this->input->post('ram_installed_size');
			$data['opreating_system'] = $this->input->post('opreating_system');
			$data['hardware_interface'] = $this->input->post('hardware_interface');
			$data['batteries_include'] = $this->input->post('batteries_include');
			$data['rechargable_battery'] = $this->input->post('rechargable_battery');
			$data['include_remote'] = $this->input->post('include_remote');
			$data['support_bluthooth'] = $this->input->post('support_bluthooth');
			$data['graphics_coprocesser'] = $this->input->post('graphics_coprocesser');
			$data['tuner_technology'] = $this->input->post('tuner_technology');
			$data['resolution'] = $this->input->post('resolution');
			$data['special_feature'] = $this->input->post('special_feature');
			$data['mounting_hardware'] = $this->input->post('mounting_hardware');
			$data['number_of_item'] = $this->input->post('number_of_item');
			$data['display_technology'] = $this->input->post('display_technology');
			$data['screen_display_size'] = $this->input->post('screen_display_size');
			$data['display_type'] = $this->input->post('display_type');
			$data['viewing_angle'] = $this->input->post('viewing_angle');
			$data['support_image_type'] = $this->input->post('support_image_type');
			$data['screen_resolution'] = $this->input->post('screen_resolution');
			$data['audio_encoding'] = $this->input->post('audio_encoding');
			$data['support_audio_format'] = $this->input->post('support_audio_format');
			$data['speaker_output_power'] = $this->input->post('speaker_output_power');
			$data['audio_wattage'] = $this->input->post('audio_wattage');
			$data['power_source'] = $this->input->post('power_source');
			$data['gsm_frquencies'] = $this->input->post('gsm_frquencies');
			$data['refresh_rate'] = $this->input->post('refresh_rate');
			$data['usb_ports'] = $this->input->post('usb_ports');
			$data['connector_type'] = $this->input->post('connector_type');
			$data['mounting_type'] = $this->input->post('mounting_type');
			$data['manufaturer'] = $this->input->post('manufaturer');
			$data['country_of_origin'] = $this->input->post('country_of_origin');
			$data['item_weight'] = $this->input->post('item_weight');
			$data['brand'] = $this->input->post('brand');
			
			

			$response = $this->model->tv_product($data);
			if ($response == true) {
				echo"<script>alert('save sucessfully')</script>";
				// redirect('http://localhost:8080/coreigniter_4/Crud/verify');
				
			} else {
				echo "Insert error !";
				echo"<script>alert('Insert error !')</script>";
			}
		}
		
	}

	public function product_watch_view()
	{
		
		$this->load->view('product_watch_view');

		if ($this->input->post('save')) {
			$data['photo'] = $this->input->post('photo');
			$data['brand'] = $this->input->post('brand');
			$data['manufacture'] = $this->input->post('manufacture');
			$data['series'] = $this->input->post('series');
			$data['colour'] = $this->input->post('colour');
			$data['item_height'] = $this->input->post('item_height');
			$data['item_width'] = $this->input->post('item_width');
			$data['screen_display_size'] = $this->input->post('screen_display_size');
			$data['product_dimensions'] = $this->input->post('product_dimensions');
			$data['model_number'] = $this->input->post('model_number');
			$data['connectivity_type'] = $this->input->post('connectivity_type');
			$data['wireless'] = $this->input->post('wireless');
			$data['wattage'] = $this->input->post('wattage');
			$data['opreating_system'] = $this->input->post('opreating_system');
			$data['battrey_life'] = $this->input->post('battrey_life');
			$data['include_component'] = $this->input->post('include_component');
			$data['water_resistence'] = $this->input->post('water_resistence');
			$data['country_of_origin'] = $this->input->post('country_of_origin');


			$response = $this->model->watch_product($data);
			if ($response == true) {
				echo"<script>alert('save sucessfully')</script>";
				// redirect('http://localhost:8080/coreigniter_4/Crud/verify');
				
			} else {
				echo "Insert error !";
				echo"<script>alert('Insert error !')</script>";
			}
		}
		
	}

	public function product_earphone_view()
	{
		
		$this->load->view('product_earphone_view');

		if ($this->input->post('save')) {
			$data['photo'] = $this->input->post('photo');
			$data['brand'] = $this->input->post('brand');
			$data['manufacture'] = $this->input->post('manufacture');
			$data['model_name'] = $this->input->post('model_name');
			$data['model_year'] = $this->input->post('model_year');
			$data['product_dimention'] = $this->input->post('product_dimention');
			$data['model_number'] = $this->input->post('model_number');
			$data['compatible_device'] = $this->input->post('compatible_device');
			$data['special_feature'] = $this->input->post('special_feature');
			$data['mounting_hardware'] = $this->input->post('mounting_hardware');
			$data['hardware_platform'] = $this->input->post('hardware_platform');
			$data['power_source'] = $this->input->post('power_source');
			$data['amplifire_type'] = $this->input->post('amplifire_type');
			$data['charging_time'] = $this->input->post('charging_time');
			$data['battery_cell'] = $this->input->post('battery_cell');
			$data['number_of_item'] = $this->input->post('number_of_item');
			$data['microphone_format'] = $this->input->post('microphone_format');
			$data['headphone_form_factor'] = $this->input->post('headphone_form_factor');
			$data['battries_included'] = $this->input->post('battries_included');
			$data['battries_required'] = $this->input->post('battries_required');
			$data['cell_required'] = $this->input->post('cell_required');
			$data['connector_type'] = $this->input->post('connector_type');
			$data['material'] = $this->input->post('material');
			$data['item_weight'] = $this->input->post('item_weight');
			$data['country_of_origin'] = $this->input->post('country_of_origin');
		

			$response = $this->model->earphone_product($data);
			if ($response == true) {
				echo"<script>alert('save sucessfully')</script>";
				// redirect('http://localhost:8080/coreigniter_4/Crud/verify');
				
			} else {
				echo "Insert error !";
				echo"<script>alert('Insert error !')</script>";
			}
		}
		
	}

	public function product_laptop_view()
	{
		
		$this->load->view('product_laptop_view');

		if ($this->input->post('save')) {
			$data['photo'] = $this->input->post('photo');
			$data['brand'] = $this->input->post('brand');
			$data['manufacture'] = $this->input->post('manufacture');
			$data['series'] = $this->input->post('series');
			$data['colour'] = $this->input->post('colour');
			$data['form_factor'] = $this->input->post('form_factor');
			$data['screen_display_size'] = $this->input->post('screen_display_size');
			$data['screen_resolution'] = $this->input->post('screen_resolution');
			$data['package_dimension'] = $this->input->post('package_dimension');
			$data['battries'] = $this->input->post('battries');
			$data['proccessor_brand'] = $this->input->post('proccessor_brand');
			$data['proccessor_type'] = $this->input->post('proccessor_type');
			$data['processor_speed'] = $this->input->post('processor_speed');
			$data['processor_count'] = $this->input->post('processor_count');
			$data['ram'] = $this->input->post('ram');
			$data['memorey_technology'] = $this->input->post('memorey_technology');
			$data['maximum_memory_supported'] = $this->input->post('maximum_memory_supported');
			$data['memory_clock_speed'] = $this->input->post('memory_clock_speed');
			$data['hard_drive_size'] = $this->input->post('hard_drive_size');
			$data['hard_disk_Description'] = $this->input->post('hard_disk_Description');
			$data['audio_details'] = $this->input->post('audio_details');
			$data['graphics_coprocesser'] = $this->input->post('graphics_coprocesser');
			$data['graphic_chipset_brand'] = $this->input->post('graphic_chipset_brand');
			$data['graphic_card_description'] = $this->input->post('graphic_card_description');
			$data['graphic_ram_type'] = $this->input->post('graphic_ram_type');
			$data['graphics_card_interface'] = $this->input->post('graphics_card_interface');
			$data['number_of_usb_2_0_port'] = $this->input->post('number_of_usb_2_0_port');
			$data['number_of_usb_3_0_port'] = $this->input->post('number_of_usb_3_0_port');
			$data['voltage'] = $this->input->post('voltage');
			$data['wattage'] = $this->input->post('wattage');
			$data['optical_drive_type'] = $this->input->post('optical_drive_type');
			$data['power_source'] = $this->input->post('power_source');
			$data['operating_system'] = $this->input->post('operating_system');
			$data['included_Components'] = $this->input->post('included_Components');
			$data['battries_included'] = $this->input->post('battries_included');
			$data['lithium_battery_energy_content'] = $this->input->post('lithium_battery_energy_content');
			$data['number_of_lithium_iron_cell'] = $this->input->post('number_of_lithium_iron_cell');
			$data['country_of_origin'] = $this->input->post('country_of_origin');
			$data['item_weight'] = $this->input->post('item_weight');

		

			$response = $this->model->laptop_product($data);
			if ($response == true) {
				echo"<script>alert('save sucessfully')</script>";
				// redirect('http://localhost:8080/coreigniter_4/Crud/verify');
				
			} else {
				echo "Insert error !";
				echo"<script>alert('Insert error !')</script>";
			}
		}
		
	}

	// Admin Order Page
	public function Order()
	{
		$result['data']=$this->model->website_setting();
		$result['data']=$this->model->users();
		$this->load->view('dashboard_order',$result);
		
	}

	// Admin Setting  Page
	public function website_setting()
	{
		$result['home']=$this->model->display_records_home_kitchen();
		// $result['sport']=$this->model->display_records();
		$result['elec']=$this->model->display_by_id_1();
		$result['data']=$this->model->website_setting();
		$this->load->view('dashboard_setting',$result);
		if ($this->input->post('save')) {
			$name = $this->input->post('website_name');
			$logo = $this->input->post('website_logo');
			$icon = $this->input->post('website_icon');


			$response = $this->model->update_info($name,$logo,$icon);
			if ($response == true) {
				echo"<script>alert('login sucessfully')</script>";
				
			} else {
				echo "Insert error !";
				echo"<script>alert('Insert error !')</script>";
			}
		}

		if ($this->input->post('collect')) {
			$data['store_name'] = $this->input->post('store_name');
			// $data['store_email'] = $this->input->post('store_email');
			$data['legal_name'] = $this->input->post('legal_name');
			$data['phone'] = $this->input->post('phone');
			$data['street'] = $this->input->post('street');
			$data['apartment'] = $this->input->post('apartment');
			$data['city'] = $this->input->post('city');
			$data['pin_num'] = $this->input->post('pin_num');
			$data['country'] = $this->input->post('country');
			$data['state'] = $this->input->post('state');
			$data['currency'] = $this->input->post('currency');


			$response = $this->model->update__store_info($data);
			if ($response == true) {
				echo"<script>alert('login sucessfully')</script>";
				
			} else {
				echo "Insert error !";
				echo"<script>alert('Insert error !')</script>";
			}
		}
		
	}
	public function payment()
	{
		if ($this->session->userdata('user')) {
		$id=$this->input->get('id');
		$result['data']=$this->model->display_by_id_info($id);
		$this->load->view('payment',$result);
		}
	}

	public function payment_success()
	{
		$this->load->view('payment_success');
		
	}

	public function admin_update_profile()
	{
		$this->load->view('admin_profile');
		
	}
	public function user_update_profile()
	{
		$id=$this->input->get('id');
		$result['data']=$this->model->user_update_profile($id);
		$this->load->view('user_profile',$result);

		if ($this->input->post('update')) {
			$data['first_name'] = $this->input->post('name');
			$data['photo'] = $this->input->post('photo');
			$data['last_name'] = $this->input->post('last_name');
			$data['phone_num'] = $this->input->post('phone_no');
			$data['email'] = $this->input->post('email');
			$data['address'] = $this->input->post('address');
			$data['dob'] = $this->input->post('dob');
			$data['gender'] = $this->input->post('gender');


			$response = $this->model->update__user_info($data,$id);
			if ($response == true) {
				echo"<script>alert('login sucessfully')</script>";
				
			} else {
				echo "Insert error !";
				echo"<script>alert('Insert error !')</script>";
			}
		}
		
	}

	public function user_delete_profile()
	{
		$id=$this->input->get('id');
		$result['data']=$this->model->user_delete_profile($id);
		if ($result == true) {
			echo"<script>alert('Delete sucessfully')</script>";
			redirect('http://localhost:8080/coreigniter_4/Crud/dashboard');
			
			
		} else {
			echo "Insert error !";
			echo"<script>alert('Insert error !')</script>";
		}

	
		
	}


	public function update_phone_product()
	{
		$id=$this->input->get('id');
		$result['data']=$this->model->display_by_id($id);
		$this->load->view('update_phone_product', $result);
	
		
	}

	public function update_laptop_product()
	{
		$this->load->view('update_laptop_product');
	
		
	}
	
	
}