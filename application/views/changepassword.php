<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MaxxTravel | Change Password</title>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript">
    function validate()
    {
        var newPass = document.fromChange.txtNew.value;
        var confirmPass = document.fromChange.txtConfirm.value;
        if(newPass != confirmPass)
        {
            alert( "Mismatch Password..!!" );
            return false;
        }
        else
        {
            return true;
        }
    }
  </script>
</head>
<body>
  <div>
    <div>
      <?php if ($this->session->userdata('success')) { ?>
        <div class="alert alert-success">
            <?php echo $this->session->userdata('success');?>
        </div>
      <?php }?>
      <?php if ($this->session->userdata('error')) { ?>
        <div class="alert alert-danger">
            <?php echo $this->session->userdata('error');?>
        </div>
      <?php }?>
    </div>
    <form action="<?php echo base_url('dashboard/changepassword');?>" method="post" name="fromChange" id="fromChange" onSubmit = "return(validate());">
      <table cellpadding="0" cellspacing="0" border="0" height="100px" width="180px" align="center">
        <tr align="center"><td><input type="Password" name="txtNew" id='txtNew' placeholder="New Password" required=""></td></tr>
        <tr align="center"><td><input type="Password" name="txtConfirm" id='txtConfirm' placeholder="Confirm Password" required=""></td></tr>
          <td colspan="2" align="center">
            <input type="submit" name="btnSubmit" value="Save">
          </td>
        </tr>
      </table>
  </form>
  </div>
</body>
</html>
