<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />

<link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png" />
<link rel="icon" type="image/png" href="../img/favicon.png" />

<!-- CSS Files -->

<div class="image-container set-full-height" style="background-image: url('../img/wizard-book.jpg')">

    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <!--      Wizard container        -->
                <div class="wizard-container" style="margin-top: 100px">
                    <div class="card wizard-card" data-color="purple" id="wizard">
                        <form action="" method="">
                            <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

                            <div class="wizard-header">
                                <h3 class="wizard-title">
                                    Booking !!!
                                </h3>
                                <h5>Please Provide the information needed.</h5>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#details" data-toggle="tab">Select a Trip</a></li>
                                    <li><a href="#captain" data-toggle="tab">Submit Traveler's Info</a></li>
                                    <li><a href="#description" data-toggle="tab">Send Payment</a></li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="details">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text">Process Booking Now </h4>
                                        </div>
                                        <div class="col-sm-6">
                                            {{--<div class="input-group">--}}
													{{--<span class="input-group-addon">--}}
														{{--<i class="material-icons">email</i>--}}
													{{--</span>--}}
                                                {{--<div class="form-group label-floating">--}}
                                                    {{--<label class="control-label">Your Email</label>--}}
                                                    {{--<input name="name" type="text" class="form-control">--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            <div class="form-group label-floating">
                                                <label class="control-label">Enter number of Travellers</label>
                                                <input name="travelnumber" type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Nationality</label>
                                                <select class="form-control" required>
                                                    <option disabled="" selected=""></option>
                                                    option value="USA">USA &amp; Canada</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="European Union">European Union</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="Other International">Other International</option>
                                                    <option value="...">...</option>
                                                </select>
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Trip Name</label>
                                                <select class="form-control" name="tripname" required>
                                                    <option disabled="" selected=""></option>
                                                    @foreach($itinerary as $itinerary)
                                                        <option>{{ $itinerary->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group label-floating">
                                                <label >Trip Start Date</label>
                                                <input name="tripdate" type="date" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="captain">
                                    <h4 class="info-text"></h4>
                                                                              <div class="customize-box alert alert-info">

                                             </div>


                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Title:</label>
                                                    <div class="controls">
                                                        <select name="title1" class="form-control" id="title" required="">
                                                            <option value="Mr.">
                                                                Mr.                                    </option>
                                                            <option value="Ms.">
                                                                Ms.                                    </option>
                                                            <option value="Mrs.">
                                                                Mrs.                                    </option>
                                                            <option value="Dr.">
                                                                Dr.                                    </option>
                                                            <option value="Er.">
                                                                Er.                                    </option>
                                                            <option value="Prof.">
                                                                Prof.                                    </option>
                                                        </select>
                                                        <div class="help-block with-errors"></div> </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">First Name *:</label>
                                                    <div class="controls">
                                                        <input name="firstName1" type="text" class="validate[required,length[0,20]] form-control" id="firstName1" size="40" required="">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Middle Name :</label>
                                                    <div class="controls">
                                                        <input name="mname1" type="text" class="form-control" id="mname1" size="20">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name *:</label>
                                                    <div class="controls">
                                                        <input name="lastName1" type="text" class=" form-control" id="lastName" size="40" required="">

                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Nationality *:</label>
                                                    <select class="country form-control" id="country" name="country1" required="">
                                                        <option value="">-- Select Country --</option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AD">Andorra</option>
                                                        <option value="AO">Angola</option>
                                                        <option value="AQ">Antarctica</option>
                                                        <option value="AG">Antigua and Barbuda</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="AM">Armenia</option>
                                                        <option value="AW">Aruba</option>
                                                        <option value="AU">Australia</option>
                                                        <option value="AS">Austria</option>
                                                        <option value="AZ">Azerbaijan</option>
                                                        <option value="BH">Bahrain</option>
                                                        <option value="BD">Bangladesh</option>
                                                        <option value="BB">Barbados</option>
                                                        <option value="BY">Belarus</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option>
                                                        <option value="BM">Bermuda</option>
                                                        <option value="BT">Bhutan</option>
                                                        <option value="BO">Bolivia</option>
                                                        <option value="BA">Bosnia and Herzegovina</option>
                                                        <option value="BW">Botswana</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="IO">British Indian Ocean Territory</option>
                                                        <option value="BN">Brunei Darussalam</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option>
                                                        <option value="MM">Myanmar</option>
                                                        <option value="BI">Burundi</option>
                                                        <option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="CV">Cape Verde</option>
                                                        <option value="CF">Central African Republic</option>
                                                        <option value="TD">Chad</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CN">China</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="KM">Comoros</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="CI">Cote d'Ivoire</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CU">Cuba</option>
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
                                                        <option value="FO">Faroe Islands</option>
                                                        <option value="FJ">Fiji</option>
                                                        <option value="FI">Finland</option>
                                                        <option value="FR">France</option>
                                                        <option value="GF">French Guiana</option>
                                                        <option value="GA">Gabon</option>
                                                        <option value="GE">Georgia</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="GH">Ghana</option>
                                                        <option value="GR">Greece</option>
                                                        <option value="GL">Greenland</option>
                                                        <option value="GD">Grenada</option>
                                                        <option value="GP">Guadeloupe</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-Bissau</option>
                                                        <option value="GY">Guyana</option>
                                                        <option value="HT">Haiti</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IR">Iran</option>
                                                        <option value="IQ">Iraq</option>
                                                        <option value="IE">Ireland</option>
                                                        <option value="IL">Israel</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="JE">Jersey</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option>
                                                        <option value="KE">Kenya</option>
                                                        <option value="KI">Kiribati</option>
                                                        <option value="KP">Korea North</option>
                                                        <option value="KR">Korea South</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Lao People's Democratic Republic</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LB">Lebanon</option>
                                                        <option value="LS">Lesotho</option>
                                                        <option value="LR">Liberia</option>
                                                        <option value="LY">Libyan Arab Jamahiriya</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MO">Macau</option>
                                                        <option value="MK">Macedonia</option>
                                                        <option value="MG">Madagascar</option>
                                                        <option value="MW">Malawi</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MV">Maldives</option>
                                                        <option value="ML">Mali</option>
                                                        <option value="MT">Malta</option>
                                                        <option value="MQ">Martinique</option>
                                                        <option value="MR">Mauritania</option>
                                                        <option value="MU">Mauritius</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="MD">Moldova</option>
                                                        <option value="MC">Monaco</option>
                                                        <option value="MN">Mongolia</option>
                                                        <option value="ME">Montenegro</option>
                                                        <option value="MS">Montserrat</option>
                                                        <option value="MA">Morocco</option>
                                                        <option value="MZ">Mozambique</option>
                                                        <option value="NA">Namibia</option>
                                                        <option value="NP">Nepal</option>
                                                        <option value="NL">Netherlands</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="NE">Niger</option>
                                                        <option value="NG">Nigeria</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option>
                                                        <option value="PW">Palau</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="RE">Reunion</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russian Federation</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="SH">Saint Helena</option>
                                                        <option value="KN">Saint Kitts and Nevis</option>
                                                        <option value="LC">Saint Lucia</option>
                                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                                        <option value="SM">San Marino</option>
                                                        <option value="ST">Sao Tome and Principe</option>
                                                        <option value="SA">Saudi Arabia</option>
                                                        <option value="SN">Senegal</option>
                                                        <option value="RS">Serbia</option>
                                                        <option value="SC">Seychelles</option>
                                                        <option value="SL">Sierra Leone</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SK">Slovakia</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="SB">Solomon Islands</option>
                                                        <option value="SO">Somalia</option>
                                                        <option value="ZA">South Africa</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SD">Sudan</option>
                                                        <option value="SR">Suriname</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="SY">Syrian Arab Republic</option>
                                                        <option value="TW">Taiwan</option>
                                                        <option value="TJ">Tajikistan</option>
                                                        <option value="TZ">Tanzania</option>
                                                        <option value="TH">Thailand</option>
                                                        <option value="TG">Togo</option>
                                                        <option value="TT">Trinidad and Tobago</option>
                                                        <option value="TN">Tunisia</option>
                                                        <option value="TR">Turkey</option>
                                                        <option value="TM">Turkmenistan</option>
                                                        <option value="UG">Uganda</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option value="GB">United Kingdom</option>
                                                        <option value="US">United States</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="UZ">Uzbekistan</option>
                                                        <option value="VU">Vanuatu</option>
                                                        <option value="VE">Venezuela</option>
                                                        <option value="VN">Vietnam</option>
                                                        <option value="EH">Western Sahara</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">State :</label>
                                                    <select class=" form-control state" id="state" name="state1">
                                                        <option value="">-- Select State --</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Email *:</label>
                                                    <input name="email1" type="text" class="validate[required,custom[email]] form-control" id="email1" size="40" data-error="email address is invalid" required="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Phone (Landline):</label>
                                                    <input name="phoneDay1" type="text" class=" form-control" id="phoneDay1" size="40">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Phone (Mobile):</label>
                                                    <input name="phoneEvening1" type="text" class=" form-control" id="phoneEvening1" size="40">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                        <label class="control-label date">Date of Birth *:</label>
                                                        <div class="input-group date">
                                                            <input type="date" class="form-control" name="dob1" id="dob1" size="29" required> </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            <div class="col-md-3">
                                                <div class="form-group">

                                                    <label class="control-label">Occupation *:</label>
                                                    <select name="occupation1" class=" form-control" id="occupation" required="">
                                                        <option value="">--Select Occupation--</option>
                                                        <option value="31">Accounting</option>
                                                        <option value="1">Administration</option>
                                                        <option value="34">Agriculture</option>
                                                        <option value="33">Airlines/Aviation</option>
                                                        <option value="2">Armed Forces</option>
                                                        <option value="3">Arts</option>
                                                        <option value="4">Business</option>
                                                        <option value="5">Civil Service</option>
                                                        <option value="6">Computing/Communications</option>
                                                        <option value="7">Consultancy/Analyst</option>
                                                        <option value="8">Engineering/Architect</option>
                                                        <option value="38">Enterprener</option>
                                                        <option value="9">Financial/Bank</option>
                                                        <option value="10">Government/NGOs</option>
                                                        <option value="11">Housewife</option>
                                                        <option value="12">Insurance</option>
                                                        <option value="13">Law</option>
                                                        <option value="14">Manufacturing/logistics</option>
                                                        <option value="15">Marketing</option>
                                                        <option value="16">Media/Advertising</option>
                                                        <option value="17">Medical</option>
                                                        <option value="30">Others</option>
                                                        <option value="35">Photographer</option>
                                                        <option value="19">Professional</option>
                                                        <option value="20">Public Services</option>
                                                        <option value="21">Retail/Consumer services</option>
                                                        <option value="22">Retired</option>
                                                        <option value="23">Sales</option>
                                                        <option value="24">Scientific</option>
                                                        <option value="25">Social Services</option>
                                                        <option value="39">Sports/Athlete</option>
                                                        <option value="26">Student</option>
                                                        <option value="27">Teaching/Academic</option>
                                                        <option value="28">Tradesman</option>
                                                        <option value="29">Travel</option>
                                                        <option value="37">Volunteer/Intern</option>
                                                    </select>
                                                    <!--<input name="occupation1" type="text"  size="40" required /> -->
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Detailed Mailing Address :</label>
                                                    <textarea name="address1" cols="30" rows="4" class=" form-control" id="address"></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Passport No *:</label>
                                                        <input name="passportno1" type="text" class=" form-control" id="passportno" size="40" required="">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Place of Issue *:</label>
                                                    <input name="issueplace1" type="text" class=" form-control" id="issueplace" size="40" required="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Issue Date *:</label>
                                                    <div class="input-group date">
                                                        <input type="date" name="issuedate1" class="form-control" id="issuedate1" size="40"></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Expiration Date *:</label>
                                                    <div class="input-group date">
                                                        <input name="expiredate1" type="date" class="form-control" id="expiredate1" size="40" required></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Emergency  contact ( <em>Name/Phone no.</em>)</label><textarea name="emergency_contact1" cols="30" rows="4" class=" form-control" id="emergency_contact"></textarea></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="tab-pane" id="description">
                                    <div class="row">
                                        <h4 class="info-text"> Drop us a small description.</h4>
                                        <div class="col-sm-6 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Room description</label>
                                                <textarea class="form-control" placeholder="" rows="6"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label">Example</label>
                                                <p class="description">"The room really nice name is recognized as being a really awesome room. We use it every sunday when we go fishing and we catch a lot. It has some kind of magic shield around it."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' id="next" name='next' value='Next' />
                                    <input type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish' />
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />

                                    {{--<div class="footer-checkbox">--}}
                                        {{--<div class="col-sm-12">--}}
                                            {{--<div class="checkbox">--}}
                                                {{--<label>--}}
                                                    {{--<input type="checkbox" name="optionsCheckboxes">--}}
                                                {{--</label>--}}
                                                {{--Subscribe to our newsletter--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div> <!-- row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container text-center">
             <i class="fa fa-heart heart"></i></a>
        </div>
    </div>
</div>

<script type="text/javascript">
$('#next').click(function () {
    var number = $(('.travelnumber').val())
    var tripname = $(('.tripname').val())
});



</script>