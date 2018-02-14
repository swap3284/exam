<form enctype="multipart/form-data" name="user" id="user" method="post" accept-charset="utf-8" action="<?=$this->config->item('base_url')?>/add_det">
		<h3>Add Details</h3>

		<table border="0" width="790" cellspacing="0" cellpadding="0">
			<tbody>
        <tr>
          <td>
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tbody><tr align="center" style="color:#F00; font-weight:bold;"><td colspan="2"></td></tr>
                <tr>
                  <td width="150">Customer Amount<span style="color:#F00">*</span></td>
                  <td>
                    <input type="text" data-bvalidator="required" value="" id="customer_amt" name="customer_amt">
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
          <td>
            <input type="submit" value="Save" name="type">
            <a href="<?=$this->config->item('base_url')?>/transaction">Back</a>
          </td>
        </tr>
			</tbody>
    </table>
</form>

<script type="text/javascript">
	$(document).ready(function (){
		$('#user').bValidator();
	});
</script>