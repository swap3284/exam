<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
	/* Code by swapnil Start */
	function __construct()
	{
		parent::__construct();
		$this->load->model('transaction_model');
	}

	public function add_det()
	{
		if($this->input->post('type'))
		{
			$customer_amt = $this->input->post('customer_amt');
			$service_tax = round(($customer_amt * 10) / 100,2);
			$vat = round(($service_tax * 12) / 100,2);
			$total_charges = $service_tax + $vat;
			$resource_amt = $customer_amt - $total_charges;
			$trans_date = date('Y-m-d H:i:s');

			$post_param = array('customer_amt' => $customer_amt, 'service_tax' => $service_tax, 'vat' => $vat, 'total_charges' => $total_charges, 'resource_amt' => $resource_amt, 'trans_date' => $trans_date);

			/*echo "<pre>";
			print_r($post_param);
			echo "</pre>";exit;*/
			$result_UU = $this->transaction_model->add_det($post_param);
			
			redirect('transaction');
		}
		else
		{
			$this->load->view('include/header');
			$this->load->view('add');
			$this->load->view('include/footer');
		}
	}
	
	public function listview()
	{
		$this->load->view('include/header');
		
		if(($this->input->post('search_submit') or $this->session->userdata('search_submit')!="") or ($this->input->post('search_from_date') and $this->input->post('search_to_date')) or ($this->session->userdata('search_from_date')!="" and $this->session->userdata('search_to_date')!=""))
		{
			if($this->input->post('search_submit'))
				$this->session->set_userdata('search_submit',$this->input->post('search_submit'));
			
			if($this->input->post('search_from_date') and $this->input->post('search_to_date'))
			{
				$this->session->set_userdata('search_from_date',$this->input->post('search_from_date'));
				$this->session->set_userdata('search_to_date',$this->input->post('search_to_date'));
			}
			
			$data1['translist'] = $this->transaction_model->getresult($this->session->userdata('search_submit'), $this->session->userdata('search_from_date'), $this->session->userdata('search_to_date'));
			
		}
		else
		{
			$data1['translist'] = $this->transaction_model->getresult('','','');
			//print_r($data1['translist']);
		}
		
		$this->load->view('transaction_list',$data1);
		$this->load->view('include/footer');
	}
	
	public function resetsearch()
	{
		$this->session->unset_userdata('search_submit');
		$this->session->unset_userdata('search_from_date');
		$this->session->unset_userdata('search_to_date');
		redirect('transaction');
	}
	/* Code by swapnil End */
}
?>