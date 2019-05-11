<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MaxxTravel | Forgot Password</title>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
    <form action="<?php echo base_url('login/viewforgetpassword');?>" method="post" name="fromForgotPass" id="fromForgotPass">
      <table cellpadding="0" cellspacing="0" border="0" height="100px" width="180px" align="center">
        <tr align="center"><td><input type="text" name="txtEmail" placeholder="Email" required=""></td></tr>
        <tr align="center"><td><input type="text" name="txtDOB" placeholder="Date of Birth" required=""></td></tr>
          <td colspan="2" align="center">
            <input type="submit" name="btnSubmit" value="Next">
          </td>
        </tr>
      </table>
  </form>
  </div>
</body>
</html>
