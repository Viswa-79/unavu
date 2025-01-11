<?php include "config.php"; ?>

  <?php include "head.php";?>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "menu.php";?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include "header.php";?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              
              <!-- Users List Table -->


              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-success">PARTY&nbsp;LIST</button><br>
                      

                      <div class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a  tabindex="0" onclick="addParty();" aria-controls="DataTables_Table_0"
                 type="button" data-bs-toggle="modal"
                          data-bs-target="#largeModal" class="btn btn-primary" style="color: white;"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
                             
</a>
                              
                              
                              <div class="btn-group" role="group">
                                <button
                                  id="btnGroupDrop1"
                                  type="button"
                                  class="btn btn-label-warning dropdown-toggle"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false">
                                  Tools
                                </button>
                               
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                           
                                  <a class="dropdown-item" href="javascript:void(0);">  <span class="ti ti-file"></span> Report</a>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    </div>
              <div class="card mt-4">
              

                    <div class="card-body">
                  <div class="card-datatable table-responsive">
                <table id="myTable" class="table table-hover display">
                    <thead>
                      <tr>
                      <th><div align="center">S.No</div></th>   
                      <th><div align="center" hidden>ID<div></th>                    
                      <th>Party Name</th>
                        <th>Group</th>
                        <th>Process</th>
                        <th>Status</th>
                        <?php if($user_role!=3){ ?><th style="padding-left:80px">Action</th><?php } ?>
                       </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                                      
                  
                  
                                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
					if($department == '1' || $department == '6')
					{
                  $sql = " SELECT *,p.id as id FROM partymaster p left join process pr on p.process=pr.id order by name asc";
					}
					else
					{
					$sql = " SELECT *,p.id as id FROM partymaster p left join process pr on p.process=pr.id where party_group!='Sales' order by name asc";	
					}
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {
                    
                  ?>
                  <tr>
                      <!-- FETCHING DATA FROM EACH
                          ROW OF EVERY COLUMN -->
                      <td align="center"><?php echo $sno;?></td>
                      <td><input type"text" name="id" hidden id ="id<?php echo $sno;?>" value="<?php echo $rows['id'];?>"></td>
                      <td nowrap><?php echo $rows['name'];?></td>
                      <td><?php echo $rows['party_group'];?></td>
                      <td><?php echo $rows['process'];?></td>
                      
                      <td><span class="badge bg-label-primary me-1">Active</span></td>
                      <?php if($user_role!=3){ ?>                   
                      <td nowrap>
                                          <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#largeModal"
                id="edit<?php echo $sno;?>" onclick="getParty(edit<?php echo $sno;?>.id);">
                    <span class="ti-xs ti ti-edit me-1"></span>Edit
               </button>

                  <button type="button" 
                    class="btn btn-outline-danger" 
                    id="del<?php echo $sno;?>" onclick="delParty(del<?php echo $sno;?>.id);" >
                    <span class="ti-xs ti ti-trash me-1"></span>Delete
                  </button> 
                                          </td>
                                          <?php } ?>

                      </tr>
                      <?php
                  $sno++;
                      }
                    
                    }
                 else{ ?>
               <tr><td colspan="7" align="center">  <p>No Data Found</p></td> </tr>
                 <?php
                 } ?>
                    </tbody>
                                    </table>
                 
                </div>
                </div>
                </div>
                <!-- Offcanvas to add new user -->
               
              </div>
            </div>
            <!-- / Content -->

            <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                          <form action="" method="post" autocomplete="off">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel3"><span id="form-title">Add</span> Party Details</h5>
                              
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="col-md-3">
                                <label class="form-label" hidden for="formtabs-country">ID</label>
                                <input
                          type="text"
                          class="form-select"
                          id="id"
                          hidden
                          placeholder=""
                          name="id"
                          aria-label="John Doe" />
                                </div>
                              <div class="row g-4">
                                <div class="col-md-3">
                                  
                                  <label class="form-label" for="form-repeater-1-4">Group&nbsp;<span style="color:red;">*</span></label>
                            <select id="party_group" class="select form-select" name="party_group" data-allow-clear="true" required>
                                <option value="">Select</option>
                                <option value="Sales">Sales</option>
                                <option value="Purchase">Purchase</option>
                                <option value="Job Work">Job Work</option>
								<option value="Internal Transfer">Internal Transfer</option>
                                
                              </select>
                                </div>
                                
                                <div class="col-md-3">
                                <label class="form-label"  for="formtabs-country">Process</label>
                              <select id="process" class="select form-select" name="process" data-allow-clear="true">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM process order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['process'];?>
						 </option>
					<?php } ?>
                              </select>
                                </div>
                                <div class="col-md-6">
                                <label class="form-label" for="formtabs-country">Party Name&nbsp;<span style="color:red;">*</span></label>
                              <input
                              type="text"
                              class="form-control"
                              id="name"
                              placeholder="Enter Name"
                              name="name"
                              aria-label="Product barcode" required/>
                                </div>
                                <div class="col-md-6">
                                  
                                <label class="form-label" for="formtabs-country">Contact Person Name&nbsp;<span style="color:red;">*</span></label>
                      <div class="input-group">
                        
                        <span style="width: 60px;"  class="input-group-text"><select style="border: none;padding: 0px;"  id="title" class="form-control" name="title" data-allow-clear="true">
                          <option value="">..</option>
                          <option value="Mr.">Mr.</option>
                          <option value="Ms.">Ms.</option>
                          <option value="Mrs">Mrs</option>
                         
                        </select></span>
                        <input
                          type="text"
                          class="form-control"
                          id="cpname"
                              placeholder=""
                              name="cpname"
                           />
                      </div>
                                </div>
                            
                                
                                <div class="col-md-3">
                                <label class="form-label"  for="formtabs-country">Mobile No&nbsp;</label>
                                <input
                              type="number"
                              class="form-control"
                              id="mobileno"
                              placeholder="+91 6398X XXXXX"
                              name="mobileno" />
                                </div>
                                <div class="col-md-3">
                                <label class="form-label" for="formtabs-country">Telephone No</label>
                                <input
                              type="number"
                              class="form-control"
                              id="telephone"
                              placeholder="+91 9874X XXXXX"
                              name="telephone" />
                                </div>
                             
							   </div>
                              
                              <div class="row g-3 mt-1">
                                <div class="col-md-3">
                                  
                                  <label class="form-label" for="form-repeater-1-4">Email</label>
                                  <input class="form-control" type="email" name="email" id="email" />
                                </div>
                                <div class="col-md-3">
                                <label class="form-label" for="formtabs-country">GST No</label>
                                <input
                              type="text"
                              class="form-control"
                              id="gstno"
                              name="gstno" />
                                </div>
								  <div class="col-md-6">
                                  <label for="emailLarge" class="form-label">Address&nbsp;</label>
                                  <input type="text" id="address" name="address" class="form-control" required>
                                   </input>
								   </div>
                                </div>
                                <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                  
                                  <label class="form-label" for="form-repeater-1-4">Eori No</label>
                                  <input class="form-control" type="text" name="eorino" id="eorino" />
                                </div>
                                <div class="col-md-6">
                                <label class="form-label" for="formtabs-country">Vat No</label>
                                <input
                              type="text"
                              class="form-control"
                              id="vatno"
                              name="vatno" />
                                </div>
								
                                </div>
                              
                                <div class="row g-3 mt-1">
								
								        
                          
                              
                             
                                <div class="col-md-3">
                                  
                                  <label class="form-label" for="form-repeater-1-4">City</label>
                                  <input
                              type="text"
                              class="form-control"
                              id="city"
                              placeholder="Enter City"
                              name="city" />
                                
                              </select>
                                </div>
                                <div class="col-md-3">
                                <label class="form-label"  for="formtabs-country">Pincode</label>
                                <input
                              type="text"
                              class="form-control"
                              id="pincode"
                              name="pincode" />
                                </div>
								
								      <div class="col-md-3">
                                <label class="form-label" for="formtabs-country">State&nbsp;</label>
                                <input
                              type="text"
                              class="form-control"
                              id="state"
                              placeholder="Enter State"
                              name="state" />
                                </div>
                                <div class="col-md-3">
                                <label class="form-label"  for="formtabs-country1">Country&nbsp;<span style="color:red;">*</span></label>
                                <select class="select form-select" name="country" id="country" data-allow-clear="true" required>
    <option value="">Select Country</option>
    <option value="Afghanistan">Afghanistan</option>
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antartica">Antarctica</option>
    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Aruba">Aruba</option>
    <option value="Australia">Australia</option>
    <option value="Austria">Austria</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bermuda">Bermuda</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam">Brunei Darussalam</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo</option>
    <option value="Congo">Congo, the Democratic Republic of the</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
    <option value="Croatia">Croatia (Hrvatska)</option>
    <option value="Cuba">Cuba</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czech Republic</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="East Timor">East Timor</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="France Metropolitan">France, Metropolitan</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia">Gambia</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Gibraltar">Gibraltar</option>
    <option value="Greece">Greece</option>
    <option value="Greenland">Greenland</option>
    <option value="Grenada">Grenada</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Guam">Guam</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
    <option value="Holy See">Holy See (Vatican City State)</option>
    <option value="Honduras">Honduras</option>
    <option value="Hong Kong">Hong Kong</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India" >India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran">Iran (Islamic Republic of)</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
    <option value="Korea">Korea, Republic of</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao">Lao People's Democratic Republic</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon" >Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macau">Macau</option>
    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia">Micronesia, Federated States of</option>
    <option value="Moldova">Moldova, Republic of</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Netherlands Antilles</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Reunion</option>
    <option value="Romania">Romania</option>
    <option value="Russia">Russian Federation</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
    <option value="Saint LUCIA">Saint LUCIA</option>
    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Slovakia">Slovakia (Slovak Republic)</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
    <option value="Spain">Spain</option>
    <option value="SriLanka">Sri Lanka</option>
    <option value="St. Helena">St. Helena</option>
    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
    <option value="Swaziland">Swaziland</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syria">Syrian Arab Republic</option>
    <option value="Taiwan">Taiwan, Province of China</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania">Tanzania, United Republic of</option>
    <option value="Thailand">Thailand</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos">Turks and Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Vietnam">Viet Nam</option>
    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Yugoslavia">Yugoslavia</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
</select>
                                </div>
                               
                        
                                
                              </div>
                              
                              <div class="divider my-4">
                <div class="divider-text">Shipment Details</div>
              </div>

              <div class="row g-4 ">
                                <div class="col-md-3">
                                  
                                  <label class="form-label" for="form-repeater-1-4">Port Of Destination&nbsp;</label>
                                  <input
                              type="text"
                              id="Destination"
                              name="Destination"
                              class="form-control" />
                                </div>
                                
                                <div class="col-md-3">
                                <label class="form-label"  for="formtabs-country">Payment&nbsp;</label>
                                <input
                              type="text"
                              id="payment"
                              name="payment"
                              class="form-control" />
                                </div>
                                <div class="col-md-3">
                                <label class="form-label" for="formtabs-country">Tolerance&nbsp;(%)&nbsp;</label>
                                <input
                              type="number"
							                 step="0.1"
                              id="tolerance"
                              name="tolerance"
                              class="form-control phone-mask"
                              aria-label="658 799 8941" />
                                </div>
                                <div class="col-md-3">
                                  
                                <label class="form-label"  for="formtabs-country1">Currency&nbsp;</label>
                                <select class="select form-control" name="currency" id="currency" data-allow-clear="true" >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM currency order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['currency'];?>
						 </option>
					<?php } ?>
                              </select>
                                </div>
                              </div>
              <div class="row g-4 mt-1">
                                <div class="col-md-3">
                                  
                                  <label class="form-label" for="form-repeater-1-4">Shipment Terms</label>
                                  <input
                              type="text"
                              id="shipterm"
                              name="shipterm"
                              class="form-control" />
                                </div>
                                
                                <div class="col-md-3">
                                <label class="form-label"  for="formtabs-country">Shipment Port</label>
                                <input
                              type="text"
                              id="shipport"
                              name="shipport"
                              class="form-control" />
                                </div>
                                <div class="col-md-3">
                                <label class="form-label"  for="formtabs-country">Port of Discharge</label>
                                <input
                              type="text"
                              id="portofdischarge"
                              name="portofdischarge"
                              class="form-control" />
                                </div>
                                <div class="col-md-3">
                                <label class="form-label" for="formtabs-country">Agent Name&nbsp;</label>
                                <input
                              type="text"
                              id="agent"
                              name="agent"
                              class="form-control"
                           />
                                </div>
                               
                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                Close
                              </button>
                              <button class="btn btn-primary btn-next" onSubmit="return true" name="submit" value="submit">
                                <span class="align-middle me-sm-1">Submit</span>
                                
                              </button>
                            </div>
          </form>
                          </div>
                        </div>
                      </div>

            <!-- Footer -->
            <?php include "footer.php";?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

  
  </body>

<?php
if(isset($_POST['submit']))
{
  $id=$_POST['id']; 
$party_group=$_POST['party_group'];
$process=$_POST['process'];
$name=$_POST['name'];
$title=$_POST['title'];
$cpname=$_POST['cpname'];
$mobileno=$_POST['mobileno'];
$telephone=$_POST['telephone'];
$email=$_POST['email'];
$address=$_POST['address'];
$eorino=$_POST['eorino'];
$vatno=$_POST['vatno'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$gstno=$_POST['gstno'];
$Destination=$_POST['Destination'];
$payment=$_POST['payment'];
$tolerance=$_POST['tolerance'];
$currency=$_POST['currency'];
$shipterm=$_POST['shipterm'];
$shipport=$_POST['shipport'];
$agent=$_POST['agent'];
$portofdischarge=$_POST['portofdischarge'];

if($id==""){
  $sql="insert into partymaster (party_group,process,name,title,cpname,mobileno,telephone,email,address,eorino,vatno,country,state,city,pincode,gstno,payment,tolerance,currency,shipterm,shipport,agent,portofdischarge) 
 values('$party_group','$process','$name','$title','$cpname','$mobileno','$telephone','$email','$address','$eorino','$vatno','$country','$state','$city','$pincode','$gstno','$payment','$tolerance','$currency','$shipterm','$shipport','$agent','$portofdischarge')"; 
$result1=mysqli_query($conn, $sql);
}else{
  $sql="UPDATE partymaster SET party_group='$party_group',process='$process',name='$name',title='$title',cpname='$cpname',mobileno='$mobileno',telephone='$telephone',email='$email',address='$address',eorino='$eorino',vatno='$vatno',country='$country',state='$state',city='$city',pincode='$pincode',gstno='$gstno',Destination='$Destination',payment='$payment',tolerance='$tolerance',currency='$currency',shipterm='$shipterm',shipport='$shipport',agent='$agent',portofdischarge='$portofdischarge' WHERE id='$id'"; 
  $result2=mysqli_query($conn, $sql);
}
if($result1) { 
 
  echo "<script>alert('Party Registered successfully');window.location='party_master.php';</script>";
 
}
else if($result2) { 
  echo "<script>alert('Party Updated Successfully');window.location='party_master.php';</script>";

}
else{
echo '<script>alert("Party Name Already Existed, data not stored")</script>';
}
}
?>  


<script>
function getParty(id) {
  document.getElementById('form-title').innerHTML='Edit';  
  
  var c=(id.substr(4));
  var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        
        r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
                    $('#id').val(data.id);                 
                    $('#party_group').val(data.party_group);                 
                    $('#process').val(data.process);                 
                    $('#name').val(data.name);
					          $('#title').val(data.title);  					
                    $('#cpname').val(data.cpname);                 
                    $('#mobileno').val(data.mobileno);                 
                    $('#telephone').val(data.telephone);                 
                    $('#email').val(data.email);                 
                    $('#address').val(data.address);                 
                    $('#eorino').val(data.eorino);                 
                    $('#vatno').val(data.vatno);                 
                    $('#country').val(data.country);                 
                    $('#state').val(data.state);                 
                    $('#city').val(data.city);                 
                    $('#pincode').val(data.pincode);                 
                    $('#gstno').val(data.gstno);  
                    $('#Destination').val(data.Destination);  
                    $('#payment').val(data.payment);  
                    $('#tolerance').val(data.tolerance);  
                    $('#currency').val(data.currency);  
                    $('#shipterm').val(data.shipterm);  
                    $('#shipport').val(data.shipport);  
                    $('#agent').val(data.agent);  
                    $('#portofdischarge').val(data.portofdischarge);  
}

      }
    };
    xmlhttp.open("GET","ajax/getParty.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>

<script>
function addParty() {
  document.getElementById('form-title').innerHTML='Add';
                    $('#id').val('');                 
                    $('#party_group').val('');                 
                    $('#process').val('');                 
                    $('#name').val('');                 
                    $('#cpname').val('');                 
                    $('#mobileno').val('');                 
                    $('#telephone').val('');                 
                    $('#email').val('');                 
                    $('#address').val('');                 
                    $('#eorino').val('');                 
                    $('#vatno').val('');                 
                    $('#country').val('');                 
                    $('#state').val('');                 
                    $('#city').val('');                 
                    $('#pincode').val('');                 
                    $('#gstno').val('');  
                    $('#Destination').val('');  
                    $('#payment').val('');  
                    $('#tolerance').val('');  
                    $('#currency').val('');  
                    $('#shipterm').val('');  
                    $('#shipport').val('');  
                    $('#agent').val('');  
                    $('#portofdischarge').val('');  
}
</script>

<script>
function delParty(id) {

  var res = confirm("Are you sure to Delete?");
if (res) {
    
  var c=(id.substr(3));
				var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='party_master.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delParty.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script>