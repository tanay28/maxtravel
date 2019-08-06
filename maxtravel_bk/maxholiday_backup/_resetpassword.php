<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MaxxTravel | Reset Password</title>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript">
    function validate()
    {
        var newPass = document.fromReset.txtNew.value;
        var confirmPass = document.fromReset.txtConfirm.value;
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
    <form action="<?php echo base_url('login/resetpassword');?>" method="post" name="fromReset" id="fromReset" onSubmit = "return(validate());">
      <input type="hidden" name="hiddEmail" value="<?php echo isset($user['email']) ? $user['email'] : '';?>">
      <input type="hidden" name="hiddDOB" value="<?php echo isset($user['dob']) ? $user['dob'] : '';?>">
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
