<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trip Details</title>
    <link type="text/css" href="css/booking.css" rel="stylesheet">
    <link type="text/css" href="css/navigation-bar.css" rel="stylesheet">
    <link type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway" >
<!--    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>-->
<!--    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<link rel="stylesheet" href="css/jquery-ui.css"/>
    <script src="js/jquery-3.3.1.js"></script> 
    <script src="js/jquery-ui.js"></script>
    <script src="js/myJs.js"></script>
    
    <script>
        
        <?php
            session_start();
            $price = $_SESSION['price'];
        ?>
        
        var adult_price = <?php echo $price?>;
        var child_price = adult_price/2;
        
        function display_price(){
            var adults = document.getElementById('adult_count').value;
            var children = document.getElementById('child_count').value;
            var total = (adults*adult_price)+(children*child_price);
            
            document.getElementById('total_price').value = total;
        }
        
       function validate_count(){
            //Ensure at least 1 adult and children are not less than zero
            var adults = document.getElementById('adult_count').value;
            var children = document.getElementById('child_count').value;

            if(adults<1){
                alert("There should be at least one adult");
                document.getElementById('adult_count').value = "";
                document.getElementById('child_count').value="";
                 document.getElementById('total_price').value ="";
                return false;
            }else if(children<0){
                alert("Negative value found for children");
                document.getElementById('adult_count').value = "";
                document.getElementById('child_count').value="";
                document.getElementById('total_price').value ="";
                return false;
            }else{
                return true;
            }
       }
        
        $(document).ready(function(){
           $('.dropdown li div').hide();
           
            $('.dropdown li').hover(
              function () {
                $('.dropdown-content', this).stop().slideDown(100);
              },
              function () {
                $('.dropdown-content', this).stop().slideUp(100);
              }
        ); 

        
        
        
        //Displaying the amount due
        $('#adult_count').change(function(){
           display_price(); 
        });
        
        $('#child_count').change(function(){
           display_price(); 
        });
        
        $("#bookingform").submit(function(e){
            
            var req = $("#special_requirements").val();
            if(req === null || req === ""){
                $("#special_requirements").val("None");
            }
            
            if(!validate_count()){
               e.preventDefault();
           } 
        });

});
    </script>
</head>

<body>
<?php require './nav-bar.php';?>

<!--<div class="search-container">
    <form role="search" method="get" action="">
        <input style="width: 500px; height: 50px" type="text" placeholder="Where do you want to go..." name="search">
        <button style="font-size:20px; background-color: #009933; width: 100px; height: 50px" type="submit">Search</button>
    </form>
</div>-->

  
<div class="title">
    <h3 id="page-title">Tour Booking</h3>
</div>

<section class="booking-form" id="booking-form">
    <div class="content" id="content">

<form name="bookingform" id="bookingform" class="book"  method="post" action="PHP/booking.php">
            <label style="font-size: 20px">Your Personal Information</label>
            <br>
            <div class="align">

                COUNTRY
                <br>
<!--                 The countries-->
                <br>
                <select name="country" required>
                    <option value="AF">Afghanistan</option>
                    <option value="AX">Åland Islands</option>
                    <option value="AL">Albania</option>
                    <option value="DZ">Algeria</option>
                    <option value="AS">American Samoa</option>
                    <option value="AD">Andorra</option>
                    <option value="AO">Angola</option>
                    <option value="AI">Anguilla</option>
                    <option value="AQ">Antarctica</option>
                    <option value="AG">Antigua and Barbuda</option>
                    <option value="AR">Argentina</option>
                    <option value="AM">Armenia</option>
                    <option value="AW">Aruba</option>
                    <option value="AU">Australia</option>
                    <option value="AT">Austria</option>
                    <option value="AZ">Azerbaijan</option>
                    <option value="BS">Bahamas</option>
                    <option value="BH">Bahrain</option>
                    <option value="BD">Bangladesh</option>
                    <option value="BB">Barbados</option>
                    <option value="BY">Belarus</option>
                    <option value="BE">Belgium</option>
                    <option value="BZ">Belize</option>
                    <option value="BJ">Benin</option>
                    <option value="BM">Bermuda</option>
                    <option value="BT">Bhutan</option>
                    <option value="BO">Bolivia, Plurinational State of</option>
                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                    <option value="BA">Bosnia and Herzegovina</option>
                    <option value="BW">Botswana</option>
                    <option value="BV">Bouvet Island</option>
                    <option value="BR">Brazil</option>
                    <option value="IO">British Indian Ocean Territory</option>
                    <option value="BN">Brunei Darussalam</option>
                    <option value="BG">Bulgaria</option>
                    <option value="BF">Burkina Faso</option>
                    <option value="BI">Burundi</option>
                    <option value="KH">Cambodia</option>
                    <option value="CM">Cameroon</option>
                    <option value="CA">Canada</option>
                    <option value="CV">Cape Verde</option>
                    <option value="KY">Cayman Islands</option>
                    <option value="CF">Central African Republic</option>
                    <option value="TD">Chad</option>
                    <option value="CL">Chile</option>
                    <option value="CN">China</option>
                    <option value="CX">Christmas Island</option>
                    <option value="CC">Cocos (Keeling) Islands</option>
                    <option value="CO">Colombia</option>
                    <option value="KM">Comoros</option>
                    <option value="CG">Congo</option>
                    <option value="CD">Congo, the Democratic Republic of the</option>
                    <option value="CK">Cook Islands</option>
                    <option value="CR">Costa Rica</option>
                    <option value="CI">Côte d'Ivoire</option>
                    <option value="HR">Croatia</option>
                    <option value="CU">Cuba</option>
                    <option value="CW">Curaçao</option>
                    <option value="CY">Cyprus</option>
                    <option value="CZ">Czech Republic</option>
                    <option value="DK">Denmark</option>
                    <option value="DJ">Djibouti</option>
                    <option value="DM">Dominica</option>
                    <option value="DO">Dominican Republic</option>
                    <option value="EC">Ecuador</option>
                    <option value="EG">Egypt</option>
                    <option value="SV">El Salvador</option>
                    <option value="GQ">Equatorial Guinea</option>
                    <option value="ER">Eritrea</option>
                    <option value="EE">Estonia</option>
                    <option value="ET">Ethiopia</option>
                    <option value="FK">Falkland Islands (Malvinas)</option>
                    <option value="FO">Faroe Islands</option>
                    <option value="FJ">Fiji</option>
                    <option value="FI">Finland</option>
                    <option value="FR">France</option>
                    <option value="GF">French Guiana</option>
                    <option value="PF">French Polynesia</option>
                    <option value="TF">French Southern Territories</option>
                    <option value="GA">Gabon</option>
                    <option value="GM">Gambia</option>
                    <option value="GE">Georgia</option>
                    <option value="DE">Germany</option>
                    <option value="GH">Ghana</option>
                    <option value="GI">Gibraltar</option>
                    <option value="GR">Greece</option>
                    <option value="GL">Greenland</option>
                    <option value="GD">Grenada</option>
                    <option value="GP">Guadeloupe</option>
                    <option value="GU">Guam</option>
                    <option value="GT">Guatemala</option>
                    <option value="GG">Guernsey</option>
                    <option value="GN">Guinea</option>
                    <option value="GW">Guinea-Bissau</option>
                    <option value="GY">Guyana</option>
                    <option value="HT">Haiti</option>
                    <option value="HM">Heard Island and McDonald Islands</option>
                    <option value="VA">Holy See (Vatican City State)</option>
                    <option value="HN">Honduras</option>
                    <option value="HK">Hong Kong</option>
                    <option value="HU">Hungary</option>
                    <option value="IS">Iceland</option>
                    <option value="IN">India</option>
                    <option value="ID">Indonesia</option>
                    <option value="IR">Iran, Islamic Republic of</option>
                    <option value="IQ">Iraq</option>
                    <option value="IE">Ireland</option>
                    <option value="IM">Isle of Man</option>
                    <option value="IL">Israel</option>
                    <option value="IT">Italy</option>
                    <option value="JM">Jamaica</option>
                    <option value="JP">Japan</option>
                    <option value="JE">Jersey</option>
                    <option value="JO">Jordan</option>
                    <option value="KZ">Kazakhstan</option>
                    <option value="KE">Kenya</option>
                    <option value="KI">Kiribati</option>
                    <option value="KP">Korea, Democratic People's Republic of</option>
                    <option value="KR">Korea, Republic of</option>
                    <option value="KW">Kuwait</option>
                    <option value="KG">Kyrgyzstan</option>
                    <option value="LA">Lao People's Democratic Republic</option>
                    <option value="LV">Latvia</option>
                    <option value="LB">Lebanon</option>
                    <option value="LS">Lesotho</option>
                    <option value="LR">Liberia</option>
                    <option value="LY">Libya</option>
                    <option value="LI">Liechtenstein</option>
                    <option value="LT">Lithuania</option>
                    <option value="LU">Luxembourg</option>
                    <option value="MO">Macao</option>
                    <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                    <option value="MG">Madagascar</option>
                    <option value="MW">Malawi</option>
                    <option value="MY">Malaysia</option>
                    <option value="MV">Maldives</option>
                    <option value="ML">Mali</option>
                    <option value="MT">Malta</option>
                    <option value="MH">Marshall Islands</option>
                    <option value="MQ">Martinique</option>
                    <option value="MR">Mauritania</option>
                    <option value="MU">Mauritius</option>
                    <option value="YT">Mayotte</option>
                    <option value="MX">Mexico</option>
                    <option value="FM">Micronesia, Federated States of</option>
                    <option value="MD">Moldova, Republic of</option>
                    <option value="MC">Monaco</option>
                    <option value="MN">Mongolia</option>
                    <option value="ME">Montenegro</option>
                    <option value="MS">Montserrat</option>
                    <option value="MA">Morocco</option>
                    <option value="MZ">Mozambique</option>
                    <option value="MM">Myanmar</option>
                    <option value="NA">Namibia</option>
                    <option value="NR">Nauru</option>
                    <option value="NP">Nepal</option>
                    <option value="NL">Netherlands</option>
                    <option value="NC">New Caledonia</option>
                    <option value="NZ">New Zealand</option>
                    <option value="NI">Nicaragua</option>
                    <option value="NE">Niger</option>
                    <option value="NG">Nigeria</option>
                    <option value="NU">Niue</option>
                    <option value="NF">Norfolk Island</option>
                    <option value="MP">Northern Mariana Islands</option>
                    <option value="NO">Norway</option>
                    <option value="OM">Oman</option>
                    <option value="PK">Pakistan</option>
                    <option value="PW">Palau</option>
                    <option value="PS">Palestinian Territory, Occupied</option>
                    <option value="PA">Panama</option>
                    <option value="PG">Papua New Guinea</option>
                    <option value="PY">Paraguay</option>
                    <option value="PE">Peru</option>
                    <option value="PH">Philippines</option>
                    <option value="PN">Pitcairn</option>
                    <option value="PL">Poland</option>
                    <option value="PT">Portugal</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="QA">Qatar</option>
                    <option value="RE">Réunion</option>
                    <option value="RO">Romania</option>
                    <option value="RU">Russian Federation</option>
                    <option value="RW">Rwanda</option>
                    <option value="BL">Saint Barthélemy</option>
                    <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                    <option value="KN">Saint Kitts and Nevis</option>
                    <option value="LC">Saint Lucia</option>
                    <option value="MF">Saint Martin (French part)</option>
                    <option value="PM">Saint Pierre and Miquelon</option>
                    <option value="VC">Saint Vincent and the Grenadines</option>
                    <option value="WS">Samoa</option>
                    <option value="SM">San Marino</option>
                    <option value="ST">Sao Tome and Principe</option>
                    <option value="SA">Saudi Arabia</option>
                    <option value="SN">Senegal</option>
                    <option value="RS">Serbia</option>
                    <option value="SC">Seychelles</option>
                    <option value="SL">Sierra Leone</option>
                    <option value="SG">Singapore</option>
                    <option value="SX">Sint Maarten (Dutch part)</option>
                    <option value="SK">Slovakia</option>
                    <option value="SI">Slovenia</option>
                    <option value="SB">Solomon Islands</option>
                    <option value="SO">Somalia</option>
                    <option value="ZA">South Africa</option>
                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                    <option value="SS">South Sudan</option>
                    <option value="ES">Spain</option>
                    <option value="LK">Sri Lanka</option>
                    <option value="SD">Sudan</option>
                    <option value="SR">Suriname</option>
                    <option value="SJ">Svalbard and Jan Mayen</option>
                    <option value="SZ">Swaziland</option>
                    <option value="SE">Sweden</option>
                    <option value="CH">Switzerland</option>
                    <option value="SY">Syrian Arab Republic</option>
                    <option value="TW">Taiwan, Province of China</option>
                    <option value="TJ">Tajikistan</option>
                    <option value="TZ">Tanzania, United Republic of</option>
                    <option value="TH">Thailand</option>
                    <option value="TL">Timor-Leste</option>
                    <option value="TG">Togo</option>
                    <option value="TK">Tokelau</option>
                    <option value="TO">Tonga</option>
                    <option value="TT">Trinidad and Tobago</option>
                    <option value="TN">Tunisia</option>
                    <option value="TR">Turkey</option>
                    <option value="TM">Turkmenistan</option>
                    <option value="TC">Turks and Caicos Islands</option>
                    <option value="TV">Tuvalu</option>
                    <option value="UG">Uganda</option>
                    <option value="UA">Ukraine</option>
                    <option value="AE">United Arab Emirates</option>
                    <option value="GB">United Kingdom</option>
                    <option value="US">United States</option>
                    <option value="UM">United States Minor Outlying Islands</option>
                    <option value="UY">Uruguay</option>
                    <option value="UZ">Uzbekistan</option>
                    <option value="VU">Vanuatu</option>
                    <option value="VE">Venezuela, Bolivarian Republic of</option>
                    <option value="VN">Viet Nam</option>
                    <option value="VG">Virgin Islands, British</option>
                    <option value="VI">Virgin Islands, U.S.</option>
                    <option value="WF">Wallis and Futuna</option>
                    <option value="EH">Western Sahara</option>
                    <option value="YE">Yemen</option>
                    <option value="ZM">Zambia</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
            </div>
            <div class="align" id="align-three">
                PHONE NUMBER
                <br>
                <br>
                <input style="width: 300px; height: 40px; background-color: #DCDCDC" type="number" name="phone_number">
            </div>
            <div class="align" id="align-three">
                PACKAGE 
                <br>
                <br>
                <input style="width: 400px; height: 40px; background-color: #DCDCDC" type="text" name="package" value="<?php echo $_SESSION['package']?>" readonly >
            </div>
            <br> 
            <br>
            <div class="align-one">
                ARRIVAL DATE
                <br>
                <br>
                <input style="width: 300px; height: 40px" type="text" name="arrival_date" id="arrival_date" placeholder="Select Date" required>
            </div>
            <div class="align-one" id="align-one">
                ADULTS
                <br>
                <br>
                <input style="width: 300px; height: 40px" type="number" name="adult_count" id="adult_count" required>
            </div>
            <div class="align-one" id="align-two">
                KIDS
                <br>
                <br>
                <input style="width: 300px; height: 40px" type="number" name="child_count" id="child_count">
            </div>
            <div class="align-one" id="align-two" style="margin-left: 10%">
                <br>
                AMOUNT DUE
                <br>
                <br>
                <input style="width: 300px; height: 40px;" type="number" name="total_price" id="total_price"  readonly required>
            </div>
            </div>
            <br>
            <br>
            <div class="requirements">
                SPECIAL REQUIREMENTS
                <br>
                <br>
                <textarea rows="8" cols="100" name="special_requirements" id="special_requirements" placeholder="This field is optional"></textarea>
            </div>
            <br>
            <br>
            <!-- START CAPTCHA -->
            <div class="captcha-box">
                <span id="captcha"></span>
                <input type="text" name="captcha" class="captcha" maxlength="4" size="20" placeholder="Enter captcha code" tabindex=3  required/>
            </div>
            <br>
            <br>
            <!-- END CAPTCHA -->
            <input type="submit" value="CONFIRM BOOKING" class="submit" name="bookingform">
        </form>
    </div>
    
     <form name="logout-form" action="PHP/logout.php">
             <input type="submit" value="Logout" class="submit">
      </form>


    <script type="text/javascript">
        function captchaCode() {
            var Numb1, Numb2, Numb3, Numb4, Code;
            Numb1 = (Math.ceil(Math.random() * 10)-1).toString();
            Numb2 = (Math.ceil(Math.random() * 10)-1).toString();
            Numb3 = (Math.ceil(Math.random() * 10)-1).toString();
            Numb4 = (Math.ceil(Math.random() * 10)-1).toString();

            Code = Numb1 + Numb2 + Numb3 + Numb4;
            $("#captcha span").remove();
            $("#captcha input").remove();
            $("#captcha").append("<span id='code'>" + Code + "</span><input type='button' onclick='captchaCode();'>");
        }

        $(function() {
            captchaCode();

            $('#contactForm').submit(function(){
                var captchaVal = $("#code").text();
                var captchaCode = $(".captcha").val();
                if (captchaVal == captchaCode) {
                    $(".captcha").css({
                        "color" : "#609D29"
                    });
                }
                else {
                    $(".captcha").css({
                        "color" : "#CE3B46"
                    });
                }

                var emailFilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,10})+$/;
                var emailText = $(".email").val();
                if (emailFilter.test(emailText)) {
                    $(".email").css({
                        "color" : "#609D29"
                    });
                }
                else {
                    $(".email").css({
                        "color" : "#CE3B46"
                    });
                }

                var nameFilter = /^([a-zA-Z \t]{3,15})+$/;
                var nameText = $(".name").val();
                if (nameFilter.test(nameText)) {
                    $(".name").css({
                        "color" : "#609D29"
                    });
                }
                else {
                    $(".name").css({
                        "color" : "#CE3B46"
                    });
                }

                var messageText = $(".message").val().length;
                if (messageText > 50) {
                    $(".message").css({
                        "color" : "#609D29"
                    });
                }
                else {
                    $(".message").css({
                        "color" : "#CE3B46"
                    });
                }

                if ((captchaVal !== captchaCode) || (!emailFilter.test(emailText)) || (!nameFilter.test(nameText)) || (messageText < 50)) {
                    return false;
                }
                if ((captchaVal == captchaCode) && (emailFilter.test(emailText)) && (nameFilter.test(nameText)) && (messageText > 50)) {
                    $("#booking-form").css("display", "none");
                    $("#content").append("<h2>Message sent!</h2>");
                    return false;
                }
            });
        });
    </script>
</section>
<br>
<br>
<footer style="margin-left: 10px; margin-right: 10px;">

    <div class="search-text">
        <div class="container">
            <div class="row text-center">

                <div class="form">
                    <h4>SIGN UP TO OUR NEWSLETTER</h4>
                    <form id="search-form" class="form-search form-horizontal">
                        <input type="text" class="input-search" placeholder="Email Address">
                        <button type="submit" class="btn-search">SUBMIT</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container" style="border-top:1px solid grey; text-align: center">
        <div class="row text-center">
            <div class="col-lg-6 col-lg-offset-3">
                <ul class="menu">

                    <li>
                        <a href="home.html">Home</a>
                    </li>

                    <li>
                        <a href="#">About</a>
                    </li>

                    <li>
                        <a href="#">Blog</a>
                    </li>

                    <li>
                        <a href="#">Gallery</a>
                    </li>

                    <li>
                        <a href="contactUs.html">Contact</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

</footer>


<div class="copyright">
    <div class="container">

        <div class="row text-center">
            <p>Copyright © 2018 All rights reserved</p>
        </div>

    </div>
</div>
</body>
</html>
