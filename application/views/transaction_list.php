<?php if (!defined('BASEPATH'))exit('No direct script access allowed'); ?>
<script  type="text/javascript">
var dateToday = new Date();
///////////////////   for date picker ///////////////
$(function() {
		var dates = jQuery( "#search_from_date" ).datepicker({
			//defaultDate: "+1w",
			changeMonth: true,
			changeYear: true,
			maxDate: 365,
			numberOfMonths: 1,
		});		
	});
	
	$(function() {
		var dates = jQuery( "#search_to_date" ).datepicker({
			//defaultDate: "+1w",
			changeMonth: true,
			changeYear: true,
			maxDate: 365,
			numberOfMonths: 1,
		});		
	});
</script>
 
<header>
  <h3 class="tabs_involved">Transaction History</h3>

  <form method="post" action="<?=$this->config->item('base_url')?>/transaction/listview" name="frmuser">
    <a href="<?=$this->config->item('base_url')?>/add_det" style="text-decoration:none;">Add Details</a> | 
    <a href="<?=$this->config->item('base_url')?>/resetsearch" style="text-decoration:none;">Reset</a> | 
    <input type="submit" id="search" name="search" value="search" style="margin-top:-2px;"/>
    
    <div style="clear : both;">
      <br>
      <label>keyword : </label>
      <input type="text" name="search_submit" id="search_submit" value="<?=$this->session->userdata('search_submit')?>" onFocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
      
      <label>Date : </label>
      <input type="text" name="search_from_date" id="search_from_date" data-bvalidator="required" value="<?=$this->session->userdata('search_from_date')?>">
      
      <label>to </label>
      <input type="text" name="search_to_date" id="search_to_date" data-bvalidator="required" value="<?=$this->session->userdata('search_to_date')?>">
    </div>
  </form>
</header>
<br>

<table id="insured_list" cellspacing="0" border="1" width="100%">
  <thead>
    <tr>
      <th>Customer Amount</th>
      <th>Service Tax</th>
      <th>Vat</th>
      <th>Total Charges</th>
      <th>Resource Amount</th>
      <th>Transaction Date</th>
	  </tr>
  </thead>
  <tbody>
	<?php
  $list_array_meal=count($translist);
  if($list_array_meal>0)
  {
    for($i=0; $i<$list_array_meal; $i++)
    {
  ?>
        <td class="text_capitalize"><?=$translist[$i]['customer_amt']?></td>
        <td class="text_capitalize"><?=$translist[$i]['service_tax']?></td>
        <td class="text_capitalize"><?=$translist[$i]['vat']?></td>
        <td class="text_capitalize"><?=$translist[$i]['total_charges']?></td>
        <td class="text_capitalize"><?=$translist[$i]['resource_amt']?></td>
        <td class="text_capitalize"><?=$translist[$i]['trans_date']?></td>
      </tr>
  <?php
    }
  }
  else
  {
  ?>
    <tr><td class="text_capitalize" colspan="9" align="center">No Transaction Found</td></tr>
  <?php
  }
  ?>
	</tbody>
</table>