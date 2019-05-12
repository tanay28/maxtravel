<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MaxxTravel | Signup</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript">
    $(document).ready(function(){
      $('#gstDetails').hide();
      if($('#txtPassword').val() != $('#txtConfirmPassword').val())
      {
        alert('Mismatch Password..!!');
        return false;
      }
      $('#cmbCountry').on('change',function(){
        $('#cmbCity').empty();
        var con = $(this).val();
        alert(con);
        $.ajax({
          url  : "<?php echo base_url('signup/ajax_fetch_city');?>",
          type : "post",
          data : {"key":con}, 
          success: function(result){ 
          $("#cmbCity").html(result);
        }});
        if(con == 'IN')
        {
          $('#gstDetails').show('slow');
        }
        else
        {
          $('#gstDetails').hide('slow'); 
        }
      });
    });
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
    <form action="<?php echo base_url('login');?>" method="post" name="fromLogin" enctype="multipart/form-data">
      <table cellpadding="0" cellspacing="0" border="1" height="100px" width="180px" align="center">
        <tr>
          <td colspan="3" style="background:'#d5dbe5';" align="left">Personal Details</td>    
        </tr>
        <tr>
          <td><input type="text" name="txtAgencyname" placeholder="Agency Name" required=""></td>
          <td><input type="text" name="txtAgencyemail" placeholder="Agency Email" required=""></td>
        </tr>
        <tr>
          <td><input type="text" name="txtFirstname" placeholder="First Name" required=""></td>
          <td><input type="text" name="txtLastname" placeholder="Last Name" required=""></td>
        </tr>
        <tr>
          <td><input type="text" name="txtDesignation" placeholder="Designation" required=""></td>
          <td>
            <label>IATA Status</label>
            <input type="radio" name="Rdoiatastatus" value="not_approved" checked=""> Not Approved
            <input type="radio" name="Rdoiatastatus" value="approved">Approved
          </td>
        </tr>
        <tr>
          <td>
            <select name="cmbNatureofbusiness" placeholder="Nature of Business" required="">
              <option value="none">Select</option>
              <option value="destination_management_company">Destination Management Company</option>
              <option value="tour_operator">Tour Operator</option>
              <option value="travel_agent">Travel Agent</option>
              <option value="wholesale_travel_company">Wholesale Travel Company</option>
              <option value="corporate">Corporate</option>
            </select>
          </td>
          <td>
            <select name="cmbBusinesstype" placeholder="Type of Business" required="">
              <option value="none">Select</option>
              <option value="B2B">B2B</option>
              <option value="B2C">B2C</option>
              <option value="BOTH">Both</option>
              <option value="OTHERS">Others</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <select name="cmbKnowfrom" placeholder="How did you hear about Travelmaxx.com?" required="">
              <option value="none">Select</option>
              <option value="email_marketing">Email Marketing</option>
              <option value="trade_show">Trade Show</option>
              <option value="search_engine">Search Engine</option>
              <option value="advertisement">Advertisement</option>
              <option value="business_associate_refferal">Business Associate Refferal</option>
              <option value="sales_person">Sales Person</option>
            </select>
          </td>
          <td>
            <select name="cmbPrefferdcurrency" placeholder="Prefferd Currency" required="">
              <option value="none">Select</option>
              <option value="USD">United States Dollars</option>
              <option value="EUR">Euro</option>
              <option value="GBP">United Kingdom Pounds</option>
              <option value="DZD">Algeria Dinars</option>
              <option value="ARP">Argentina Pesos</option>
              <option value="AUD">Australia Dollars</option>
              <option value="ATS">Austria Schillings</option>
              <option value="BSD">Bahamas Dollars</option>
              <option value="BBD">Barbados Dollars</option>
              <option value="BEF">Belgium Francs</option>
              <option value="BMD">Bermuda Dollars</option>
              <option value="BRR">Brazil Real</option>
              <option value="BGL">Bulgaria Lev</option>
              <option value="CAD">Canada Dollars</option>
              <option value="CLP">Chile Pesos</option>
              <option value="CNY">China Yuan Renmimbi</option>
              <option value="CYP">Cyprus Pounds</option>
              <option value="CSK">Czech Republic Koruna</option>
              <option value="DKK">Denmark Kroner</option>
              <option value="NLG">Dutch Guilders</option>
              <option value="XCD">Eastern Caribbean Dollars</option>
              <option value="EGP">Egypt Pounds</option>
              <option value="FJD">Fiji Dollars</option>
              <option value="FIM">Finland Markka</option>
              <option value="FRF">France Francs</option>
              <option value="DEM">Germany Deutsche Marks</option>
              <option value="XAU">Gold Ounces</option>
              <option value="GRD">Greece Drachmas</option>
              <option value="HKD">Hong Kong Dollars</option>
              <option value="HUF">Hungary Forint</option>
              <option value="ISK">Iceland Krona</option>
              <option value="INR">India Rupees</option>
              <option value="IDR">Indonesia Rupiah</option>
              <option value="IEP">Ireland Punt</option>
              <option value="ILS">Israel New Shekels</option>
              <option value="ITL">Italy Lira</option>
              <option value="JMD">Jamaica Dollars</option>
              <option value="JPY">Japan Yen</option>
              <option value="JOD">Jordan Dinar</option>
              <option value="KRW">Korea (South) Won</option>
              <option value="LBP">Lebanon Pounds</option>
              <option value="LUF">Luxembourg Francs</option>
              <option value="MYR">Malaysia Ringgit</option>
              <option value="MXP">Mexico Pesos</option>
              <option value="NLG">Netherlands Guilders</option>
              <option value="NZD">New Zealand Dollars</option>
              <option value="NOK">Norway Kroner</option>
              <option value="PKR">Pakistan Rupees</option>
              <option value="XPD">Palladium Ounces</option>
              <option value="PHP">Philippines Pesos</option>
              <option value="XPT">Platinum Ounces</option>
              <option value="PLZ">Poland Zloty</option>
              <option value="PTE">Portugal Escudo</option>
              <option value="ROL">Romania Leu</option>
              <option value="RUR">Russia Rubles</option>
              <option value="SAR">Saudi Arabia Riyal</option>
              <option value="XAG">Silver Ounces</option>
              <option value="SGD">Singapore Dollars</option>
              <option value="SKK">Slovakia Koruna</option>
              <option value="ZAR">South Africa Rand</option>
              <option value="KRW">South Korea Won</option>
              <option value="ESP">Spain Pesetas</option>
              <option value="XDR">Special Drawing Right (IMF)</option>
              <option value="SDD">Sudan Dinar</option>
              <option value="SEK">Sweden Krona</option>
              <option value="CHF">Switzerland Francs</option>
              <option value="TWD">Taiwan Dollars</option>
              <option value="THB">Thailand Baht</option>
              <option value="TTD">Trinidad and Tobago Dollars</option>
              <option value="TRL">Turkey Lira</option>
              <option value="VEB">Venezuela Bolivar</option>
              <option value="ZMK">Zambia Kwacha</option>
              <option value="EUR">Euro</option>
              <option value="XCD">Eastern Caribbean Dollars</option>
              <option value="XDR">Special Drawing Right (IMF)</option>
              <option value="XAG">Silver Ounces</option>
              <option value="XAU">Gold Ounces</option>
              <option value="XPD">Palladium Ounces</option>
              <option value="XPT">Platinum Ounces</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><textarea name="txtAddress" placeholder="Address" required=""></textarea></td>
          <td><input type="text" name="txtPin" placeholder="Pincode/Zipcode/Postcode" maxlength="6" required=""></td>
        </tr>
        <tr>
          <td><input type="text" name="txtPhone" placeholder="Telephone" required=""></td>
          <td><input type="text" name="txtMobile" placeholder="Mobile" required="" maxlength="10"></td>
        </tr>
        <tr>
          <td><input type="text" name="txtFax" placeholder="Fax"></td>
          <td></td>
        </tr>
        <tr>
          <td>
           <select name="cmbCountry" id="cmbCountry" placeholder="Country" required="">
             <option value="none">Select</option>
             <?php
              if(isset($country) && count($country)>0)
              {
                foreach ($country as $ikey => $ivalue)
                {
            ?>
             <option value="<?php echo $ivalue['cc_fips'];?>"><?php echo $ivalue['country_name'];?></option> 
            <?php
                }
              }
             ?>
           </select>
          </td>
          <td>
            <select name="cmbCity" id="cmbCity" required=""></select>
          </td>
        </tr>
        <tr id="gstDetails" style="display: none">
          <td><input type="text" name="txtGSTNO" placeholder="GST No"></td>
          <td><input type="file" name="fileGSTDoc" placeholder="Upload document"></td>
        </tr>
        <tr>
          <td>
            <select name="cmbTimezone" required="">
              <option value="29">(GMT) Casablanca</option>
              <option value="30">(GMT) Dublin</option>
              <option value="31">(GMT) Lisbon</option>
              <option value="32">(GMT) London</option>
              <option value="33">(GMT) Monrovia</option>
              <option value="34">(GMT+01:00) Amsterdam</option>
              <option value="35">(GMT+01:00) Belgrade</option>
              <option value="36">(GMT+01:00) Berlin</option>
              <option value="37">(GMT+01:00) Bratislava</option>
              <option value="38">(GMT+01:00) Brussels</option>
              <option value="39">(GMT+01:00) Budapest</option>
              <option value="40">(GMT+01:00) Copenhagen</option>
              <option value="41">(GMT+01:00) Ljubljana</option>
              <option value="42">(GMT+01:00) Madrid</option>
              <option value="43">(GMT+01:00) Paris</option>
              <option value="44">(GMT+01:00) Prague</option>
              <option value="45">(GMT+01:00) Rome</option>
              <option value="46">(GMT+01:00) Sarajevo</option>
              <option value="47">(GMT+01:00) Skopje</option>
              <option value="48">(GMT+01:00) Stockholm</option>
              <option value="49">(GMT+01:00) Vienna</option>
              <option value="50">(GMT+01:00) Warsaw</option>
              <option value="51">(GMT+01:00) Zagreb</option>
              <option value="52">(GMT+02:00) Athens</option>
              <option value="53">(GMT+02:00) Bucharest</option>
              <option value="54">(GMT+02:00) Cairo</option>
              <option value="55">(GMT+02:00) Harare</option>
              <option value="56">(GMT+02:00) Helsinki</option>
              <option value="58">(GMT+02:00) Jerusalem</option>
              <option value="59">(GMT+02:00) Kyiv</option>
              <option value="60">(GMT+02:00) Minsk</option>
              <option value="61">(GMT+02:00) Riga</option>
              <option value="62">(GMT+02:00) Sofia</option>
              <option value="63">(GMT+02:00) Tallinn</option>
              <option value="64">(GMT+02:00) Vilnius</option>
              <option value="57">(GMT+03:00) Istanbul</option>
              <option value="65">(GMT+03:00) Baghdad</option>
              <option value="66">(GMT+03:00) Kuwait</option>
              <option value="67">(GMT+03:00) Nairobi</option>
              <option value="68">(GMT+03:00) Riyadh</option>
              <option value="69">(GMT+03:30) Tehran</option>
              <option value="70">(GMT+04:00) Moscow</option>
              <option value="71">(GMT+04:00) Baku</option>
              <option value="72">(GMT+04:00) Volgograd</option>
              <option value="73">(GMT+04:00) Muscat</option>
              <option value="74">(GMT+04:00) Tbilisi</option>
              <option value="75">(GMT+04:00) Yerevan</option>
              <option value="113">(GMT+04:00) Dubai</option>
              <option value="76">(GMT+04:30) Kabul</option>
              <option value="77">(GMT+05:00) Karachi</option>
              <option value="78">(GMT+05:00) Tashkent</option>
              <option value="79">(GMT+05:30) Kolkata</option>
              <option value="80">(GMT+05:45) Kathmandu</option>
              <option value="81">(GMT+06:00) Ekaterinburg</option>
              <option value="82">(GMT+06:00) Almaty</option>
              <option value="83">(GMT+06:00) Dhaka</option>
              <option value="84">(GMT+07:00) Novosibirsk</option>
              <option value="85">(GMT+07:00) Bangkok</option>
              <option value="86">(GMT+07:00) Jakarta</option>
              <option value="87">(GMT+08:00) Krasnoyarsk</option>
              <option value="88">(GMT+08:00) Chongqing</option>
              <option value="89">(GMT+08:00) Hong Kong</option>
              <option value="90">(GMT+08:00) Kuala Lumpur</option>
              <option value="91">(GMT+08:00) Perth</option>
              <option value="92">(GMT+08:00) Singapore</option>
              <option value="93">(GMT+08:00) Taipei</option>
              <option value="94">(GMT+08:00) Ulaan Bataar</option>
              <option value="95">(GMT+08:00) Urumqi</option>
              <option value="96">(GMT+09:00) Irkutsk</option>
              <option value="97">(GMT+09:00) Seoul</option>
              <option value="98">(GMT+09:00) Tokyo</option>
              <option value="99">(GMT+09:30) Adelaide</option>
              <option value="100">(GMT+09:30) Darwin</option>
              <option value="101">(GMT+10:00) Yakutsk</option>
              <option value="102">(GMT+10:00) Brisbane</option>
              <option value="103">(GMT+10:00) Canberra</option>
              <option value="104">(GMT+10:00) Guam</option>
              <option value="105">(GMT+10:00) Hobart</option>
              <option value="106">(GMT+10:00) Melbourne</option>
              <option value="107">(GMT+10:00) Port Moresby</option>
              <option value="108">(GMT+10:00) Sydney</option>
              <option value="109">(GMT+11:00) Vladivostok</option>
              <option value="110">(GMT+12:00) Magadan</option>
              <option value="111">(GMT+12:00) Auckland</option>
              <option value="112">(GMT+12:00) Fiji</option>
              <option value="27">(GMT-01:00) Azores</option>
              <option value="28">(GMT-01:00) Cape Verde Is.</option>
              <option value="26">(GMT-02:00) Stanley</option>
              <option value="24">(GMT-03:00) Buenos Aires</option>
              <option value="25">(GMT-03:00) Greenland</option>
              <option value="23">(GMT-03:30) Newfoundland</option>
              <option value="20">(GMT-04:00) Atlantic Time (Canada)</option>
              <option value="21">(GMT-04:00) La Paz</option>
              <option value="22">(GMT-04:00) Santiago</option>
              <option value="19">(GMT-04:30) Caracas</option>
              <option value="15">(GMT-05:00) Eastern Time (US & Canada)</option>
              <option value="16">(GMT-05:00) Indiana (East)</option>
              <option value="17">(GMT-05:00) Bogota</option>
              <option value="18">(GMT-05:00) Lima</option>
              <option value="11">(GMT-06:00) Mexico City</option>
              <option value="12">(GMT-06:00) Monterrey</option>
              <option value="13">(GMT-06:00) Saskatchewan</option>
              <option value="14">(GMT-06:00) Central Time (US & Canada)</option>
              <option value="7">(GMT-07:00) Arizona</option>
              <option value="8">(GMT-07:00) Mountain Time (US & Canada)</option>
              <option value="9">(GMT-07:00) Chihuahua</option>
              <option value="10">(GMT-07:00) Mazatlan</option>
              <option value="5">(GMT-08:00) Pacific Time (US & Canada)</option>
              <option value="6">(GMT-08:00) Tijuana</option>
              <option value="4">(GMT-09:00) Alaska</option>
              <option value="3">(GMT-10:00) Hawaii</option>
              <option value="1">(GMT-11:00) Midway Island</option>
              <option value="2">(GMT-11:00) Samoa</option>
            </select>
          </td>
          <td><input type="text" name="txtWbsite" required="" placeholder="Website"></td>
        </tr>
        <tr><td colspan="3" align="left" style="background:'#d5dbe5';">Access Details</td></tr>
        <tr>
          <td><input type="text" name="txtUsername" required="" placeholder="User Name"></td>
          <td><input type="password" name="txtPassword" id="txtPassword" required="" placeholder="Password"></td>
          <td><input type="password" name="txtConfirmPassword" id="txtConfirmPassword" required="" placeholder=" Confirm Password"></td>
        </tr>
        <tr><td colspan="4" align="left" style="background:'#d5dbe5';">Contact Details</td></tr>
        <tr>
          <td colspan="4" align="center">
            <table cellpadding="0" cellspacing="0" height="150px" width="200px" border="1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Accounts:</th>
                  <th>Reservation / Operations:</th>
                  <th>Managements</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Name:</td>
                  <td><input type="text" name="txtAccountName" required=""></td>
                  <td><input type="text" name="txtOperationName" required=""></td>
                  <td><input type="text" name="txtManagementName" required=""></td>
                  <td><a href="javascript:void()">Copy</a></td>
                </tr>
                <tr>
                  <td>Email:</td>
                  <td><input type="text" name="txtAccountEmail" required=""></td>
                  <td><input type="text" name="txtOperationEmail" required=""></td>
                  <td><input type="text" name="txtManagementEmail" required=""></td>
                  <td><a href="javascript:void()">Copy</a></td>
                </tr>
                <tr>
                  <td>Number:</td>
                  <td><input type="text" name="txtAccountNo" required=""></td>
                  <td><input type="text" name="txtOperationNo" required=""></td>
                  <td><input type="text" name="txtManagementNo" required=""></td>
                  <td><a href="javascript:void()">Copy</a></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="left">
            <input type="submit" name="btnSubmit" value="Register Now">
            <input type="reset" name="btnReset" value="Cancel">
          </td>
        </tr>
      </table>
  </form>
  </div>
</body>
</html>
