<?php
class Transaction_model extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}

	function add_det($transhis)
	{
		$this->db->insert('transactions', $transhis); 
		return $this->db->insert_id();	
	}
	
	public function getresult($src="", $start_date="", $end_date="")
	{
		if($src=="" and $start_date=="" and $end_date=="")
		{
			$query = $this->db->query("SELECT * FROM transactions order by trans_date desc");
		}
		else
		{
			if($src=="" and ($start_date!="" and $end_date!=""))
			{
				$query = $this->db->query("SELECT * FROM transactions WHERE DATE_FORMAT(trans_date,'%Y/%m/%d') >= '".$start_date."' AND DATE_FORMAT(trans_date,'%Y/%m/%d') <= '".$end_date."' order by trans_date desc");
				
			}
			elseif($src!="" and ($start_date=="" and $end_date==""))
			{
				$query = $this->db->query("SELECT * FROM transactions WHERE customer_amt like '%".$src."%' or service_tax like '%".$src."%' or vat like '%".$src."%' or total_charges like '%".$src."%' or  resource_amt like '%".$src."%' or trans_date like '%".$src."%' order by trans_date desc");
			}
			elseif($src!="" and ($start_date!="" and $end_date!=""))
			{
				$query = $this->db->query("SELECT * FROM transactions WHERE (customer_amt like '%".$src."%' or service_tax like '%".$src."%' or vat like '%".$src."%' or total_charges like '%".$src."%' or  resource_amt like '%".$src."%' or trans_date like '%".$src."%') AND (DATE_FORMAT(trans_date,'%Y/%m/%d') >= '".$start_date."' AND DATE_FORMAT(trans_date,'%Y/%m/%d') <= '".$end_date."') order by trans_date desc");
			}
		}
		
		//echo $this->db->last_query();exit;
		$result = $query->result_array();
		//print_r($result);
		return $result;
	}
}
?>