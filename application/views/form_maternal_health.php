<form name="form_mnh_assessment" id="form_mnh_assessment" method="POST" action="' . base_url() . 'submit/c_form/form_mnh_equipment_assessment11' . '" >
	<!-- form for collecting inventory status information -->

	<!-- begin facility  div --->
	<div id="facility_div" class="step">
		<h3 align="center">FACILITY REGISTRATION</h3>

		<div class="block">
			<div class="column">
				<div class="row-title">
					Facility Information
				</div>
				<!--div class="row2">
				<div class="left">
				<label>Date:</label>
				</div>
				<div class="right">
				<input type="date" name="facilityDateOfInventory" id="facilityDateOfInventory" readonly="readonly" class="autoDate" placeholder="click for date"/>
				</div>

				</div-->

				<div class="row2">
					<div class="left">
						<label>Facility Name:</label>
					</div>
					<div class="right">
						<input type="text" name="facilityName" id="facilityName"/>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Facility Type:</label>
					</div>
					<div class="right">
						<select name="facilityType" id="facilityType">
							<option value="" selected="selected">Select One</option>
							' . $this -> selectFacilityType . '
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Facility Level:</label>
					</div>
					<div class="right">
						<select name="facilityLevel" id="facilityLevel">
							<option value="" selected="selected">Select One</option>
							' . $this -> selectFacilityLevel . '
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Owned By:</label>
					</div>
					<div class="right">
						<select name="facilityOwner" id="facilityOwner">
							<option value="" selected="selected">Select One</option>
							' . $this -> selectFacilityOwner . '
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Province:</label>
					</div>
					<div class="right">
						<select name="facilityProvince" id="facilityProvince">
							<option value="" selected="selected">Select One</option>
							' . $this -> selectProvince . '
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="left">

						<label>District:</label>
					</div>
					<div class="right">
						<select name="facilityDistrict" id="facilityDistrict">
							<option value="" selected="selected">Select One</option>
							' . $this -> selectDistricts . '
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>County:</label>
					</div>
					<div class="right">
						<select name="facilityCounty" id="facilityCounty">
							<option value="" selected="selected">Select One</option>
							' . $this -> selectCounties . '
						</select>
					</div>
				</div>

			</div>
			<div class="column" style="margin-bottom:30px">
				<div class="row-title">
					In Charge Contact Information
				</div>
				<div class="row2">
					<div class="left">
						<label>Name:</label>
					</div>
					<div class="right">
						<input type="text" name="facilityContactPerson" id="facilityContactPerson"/>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Telephone:</label>
					</div>
					<div class="right">

					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 1:</label>
					</div>
					<div class="right">
						<input type="text" name="facilityTelephone" id="facilityTelephone" maxlength="14"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 2:</label>
					</div>
					<div class="right">
						<input type="text" name="facilityAltTelephone" id="facilityAltTelephone" maxlength="14"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Email:</label>
					</div>
					<div class="right">
						<input type="email" name="facilityEmail" id="facilityEmail" maxlength="90"/>
						<input type="hidden"  name="facilityMFC" id="facilityMFC"/>
					</div>
				</div>
			</div>
		</div>
		<div class="block">
			<div class="column" style="margin-bottom:30px">
				<div class="row-title">
					MCH Contanct
				</div>
				<div class="row2">
					<div class="left">
						<label>Name:</label>
					</div>
					<div class="right">
						<input type="text" name="MCHContactPerson" id="MCHContactPerson"/>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Telephone:</label>
					</div>
					<div class="right">

					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 1:</label>
					</div>
					<div class="right">
						<input type="text" name="MCHTelephone" id="MCHTelephone" maxlength="14"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 2:</label>
					</div>
					<div class="right">
						<input type="text" name="MCHAltTelephone" id="MCHAltTelephone" maxlength="14"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Email:</label>
					</div>
					<div class="right">
						<input type="email" name="MCHEmail" id="MCHEmail" maxlength="90"/>
						<input type="hidden"  name="MCHMFC" id="MCHMFC"/>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end facility div-->

	<!--begin diarrhoiea morbidity factor div-->
	<div id="diarrhoea_cases" class="step">
		<h3 align="center">Diarrhoea Morbidity Data </h3>

		<div class="row2">
			<div class="left">
				<label>Indicate number of diarrhoea cases seen in this facility in the month of August 2012</label>
			</div>
			<div class="center">

				<input type="text" id="diarrhoeaCases" name="diarrhoeaCases" class="cloned"/>
			</div>
		</div>
	</div>

	<!--end diarrhoiea morbidity factor div-->

	<!-- form for collecting inventory status information -->

	<!--begin emonc div-->
	<div id="emonc" class="step">
		<h3 align="center"> ASSESSMENT OF EQUIPMENT AND SUPPLIES FOR EmONC</h3>

		<div class="block">
			<div class="column-wide">
				<div class="row-title">
					<div class="left">
						<label class="dcah-label">Inventory Type: Labor &amp; Delivery</label>
					</div>
					<div class="center">
						<label class="dcah-label">ANSWER</label>
					</div>

				</div>

				<div class="row">
					<div class="left">
						<label>4. Does the facility provide for delivery services?</label>
					</div>
					<div class="center cloned" >

						<select name="lndq4FacilityDelivery" id="lndq4FacilityDelivery" class="cloned left-combo">
							<option value="" selected="selected">Select One</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
					</div>

					<div id="q4comm" class="right" style="display: none">
						<input type="text" name="lndq4Comment" id="lndq4Comment" class="cloned"/>

					</div>

				</div>

				<div class="row">
					<div class="left">
						<label>5. Does the facility provide 24 hour coverage for delivery services?</label>
					</div>
					<div class="center cloned" >

						<select name="lndq5FacilityDelivery" id="lndq5FacilityDelivery" class="cloned left-combo">
							<option value="" selected="selected">Select One</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
					</div>

					<div id="q5comm" class="right" style="display: none">
						<input type="text" name="lndq5Comment" id="lndq5Comment" class="cloned"/>

					</div>

				</div>
				<div class="row">
					<div class="left">
						<label>6a. Is a person skilled in conducting deliveries present  at the facility or on call 24 hours a day,
							including weekends, to provide delivery care?</label>
					</div>
					<div class="center cloned">

						<select name="lndq6aConductingDelivery" id="lndq6aConductingDelivery" class="cloned left-combo">
							<option value="" selected="selected">Select One</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
					</div>
				</div>
				<div id="q6ay" class="row" style="display: none">
					<div class="left">
						<label>6b. Who conducts deliveries in this facility?</label>
					</div>
					<div class="center cloned" >
						<select name="lndq6bSkilledProviders[]" multiple="multiple" id="lndq6bSkilledProviders">

							<option>Mid-wife</option>
							<option>Trained Medical Officer</option>
							<option>Clinicial Officer</option>
							<option>Nursing Officer</option>
							<option>Doctor</option>
							<option>Community Health Worker</option>

						</select>
						<label for="lndq6otherProvider">Others(Specify)</label>
						<input type="text" id="lndq6otherProvider" name="lndq6otherProvider" maxlength="55" placeholder="provider1,provider2,...,"/>

					</div>
				</div>
				<div class="row">
					<div class="left">
						<label>7. Indicate the total number of beds in the maternity ward / unit in this facility*</label>
					</div>
					<div class="right">

						<input type="number" name="lndq7TotalBeds" id="lndq7TotalBeds" class="cloned fromZero" min="0" style="float:left"/>

					</div>

				</div>
			</div>
		</div>

	</div>
	<!--end emonc div-->

	<!--begin delivery place description div-->
	<div id="delivery_div" class="step">
		<div class="block">
			<div class="row-title">
				<label class="dcah-label">*Ask to see the room where Normal Deliveries are conducted</label>
			</div>

			<div class="row">
				<div class="left">
					<label>8. What is the setting of the Delivery Room?</label>
				</div>
				<div class="right">

					<select name="lndq8DeliveryRoom" id="lndq8DeliveryRoom" class="cloned">

						<option value="" selected="selected">Select One</option>
						<option>Private Room (accomodates one client)</option>
						<option>Partitioned Shared Room</option>
						<option>Non-Partitioned Shared Room</option>
					</select>
				</div>

			</div>
		</div>
		<!--end delivery place description div-->
	</div>

	<!--begin delivery services equipment div-->
	<div id="delivery_serv_equip" class="step">
		<h3>NOTE THE AVAILABILITY AND FUNCTIONALITY OF SUPPLIES AND EQUIPMENT REQUIRED FOR DELIVERY SERVICES. EQUIPMENT MAY BE IN DELIVERY ROOM OR AN ADJACENT ROOM.</h3>

		<div class="column-wide">
			<div class="row">

				<div class="row-title">
					<div class="left">
						<label class="dcah-label">9. EQUIPMENT REQUIRED FOR DELIVERY SERVICES</label>
					</div>
					<div class="center">
						<label class="dcah-label" style="width:45%">Availability (A)</label>
						<label class="dcah-label" style="float:right;width:45%">Quantity</label>

					</div>
					<div class="right">
						<label class="dcah-label" style="width:45%">Functioning (b)</label>
						<label class="dcah-label" style="float:right;width:45%">Quantity</label>
					</div>
				</div>
			</div>

			<div id="tableEquipmentList">
				<div class="row2">
					<input type="button" id="editEquipmentListTopButton" name="editEquipmentListTopButton" class="awesome myblue medium" value="Edit List"/>
				</div>

				<div class="row" id="tr_1">
					<div class="left">
						<label>9a. Examination light</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_1" id="q9equipAvailability_1">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_1" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q9equipFunctioning_1" id="q9equipFunctioning_1" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_1" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q9equipCode_1" id="q9equipCode_1" value="EQP31" />
				</div>

				<div class="row" id="tr_2">
					<div class="left">
						<label>9b. Delivery bed/ couch</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_2" id="q9equipAvailability_2">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_2" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">

						<select name="q9equipFunctioning_2" id="q9equipFunctioning_2" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_2" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q9equipCode_2" id="q9equipCode_2" value="EQP32" />
				</div>

				<div class="row" id="tr_3">
					<div class="left">
						<label>9c. Drip stand</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_3" id="q9equipAvailability_3">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_3" type="number" class="cloned fromZero" min="0"/>
					</div>

					<div class="right">
						<select name="q9equipFunctioning_3" id="q9equipFunctioning_3" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_3" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q9equipCode_3" id="q9equipCode_3" value="EQP33" />
				</div>

				<div class="row" id="tr_4">
					<div class="left">
						<label>9d.Mackintosh (On the Delivery Couch)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_4" id="q9equipAvailability_4">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_4" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q9equipFunctioning_4" id="q9equipFunctioning_4" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_4" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q9equipCode_4" id="q9equipCode_4" value="EQP34" />
				</div>

				<div class="row" id="tr_5">
					<div class="left">
						<label>9e. Linen(Draping)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_5" id="q9equipAvailability_5">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_5" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">

						<select name="q9equipFunctioning_5" id="q9equipFunctioning_5" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_5" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q9equipCode_5" id="q9equipCode_5" value="EQP35" />
				</div>

				<div class="row" id="tr_6">
					<div class="left">
						<label>9f.i. Linen(Delivery Couch)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_6" id="q9equipAvailability_6">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_6" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q9equipFunctioning_6" id="q9equipFunctioning_6" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_6" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q9equipCode_6" id="q9equipCode_6" value="EQP36" />
				</div>

				<div class="row" id="tr_7">
					<div class="left">
						<label>9f.ii. Linen(Green Towels)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_7" id="q9equipAvailability_7">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_7" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q9equipFunctioning_7" id="q9equipFunctioning_7" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_7" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q9equipCode_7" id="q9equipCode_7" value="EQP37" />
				</div>

				<div class="row" id="tr_8">
					<div class="left">
						<label>9g. Sharps container</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_8" id="q9equipAvailability_8">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_8" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">

						<select name="q9equipFunctioning_8" id="q9equipFunctioning_8" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q9equipFQty_8" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q9equipCode_8" id="q9equipCode_8" value="EQP38" />
				</div>

				<div class="row" id="tr_9">
					<div class="left">
						<label>9h. At least five or more 2-ml or 5-ml disposable syringes</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_9" id="q9equipAvailability_9">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_9" id="q9equipCode_9" value="EQP39" />
				</div>

				<div class="row" id="tr_10">
					<div class="left">
						<label>9i. Three properly labeled or colour coded IP buckets</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_10" id="q9equipAvailability_10">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_10" id="q9equipCode_10" value="EQP40" />
				</div>

				<div class="row" id="tr_11">
					<div class="left">
						<label>9j. High Level Chemical Disinfectant (Jik, Cidex)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_11" id="q9equipAvailability_11">
							<option value="" selected="selected">Select One</option>
							<option>Always </option>
							<option>Sometimes </option>
							<option>Never </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_11" id="q9equipCode_11" value="EQP41" />
				</div>

				<div class="row" id="tr_12">
					<div class="left">
						<label>9k. Soap for washing instruments (constantly available)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_12" id="q9equipAvailability_12">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<div class="right">
						<select name="q9equipFunctioning_12" id="q9equipFunctioning_12" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_12" id="q9equipCode_12" value="EQP42" />
				</div>

				<div class="row" id="tr_13">
					<div class="left">
						<label>9l.Soap for handwashing (constantly available)</label>
					</div>
					<div class="center">
						<select class="cloned left-combo" name="q9equipAvailability_13" id="q9equipAvailability_13">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<div class="right">
						<select name="q9equipFunctioning_13" id="q9equipFunctioning_13" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_13" id="q9equipCode_13" value="EQP43" />
				</div>

				<div class="row" id="tr_14">
					<div class="left">
						<label>9m.Properly Labelled or colour coded waste segragation bins</label>
					</div>

					<div class="center">

						<select class="cloned left-combo" name="q9equipAvailability_14" id="q9equipAvailability_14">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q9equipAQty_14" type="number" class="cloned fromZero" min="0"/>
						<input type="hidden"  name="q9equipCode_14" id="q9equipCode_14" value="EQP44" />
					</div>
				</div>

				<div class="row" id="tr_15">
					<div class="left">
						<label>9o. Single-use hand-drying towels (constantly available)</label>
					</div>

					<div class="center">

						<select class="cloned left-combo" name="q9equipAvailability_15" id="q9equipAvailability_15">
							<option value="" selected="selected">Select One</option>

							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<div class="right">

						<select name="q9equipFunctioning_15" id="q9equipFunctioning_15" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_15" id="q9equipCode_15" value="EQP45" />
				</div>

				<div class="row" id="tr_16">
					<div class="left">
						<label>9p. Running  Water for handwashing (constantly available)</label>
					</div>

					<div class="center">

						<select class="cloned left-combo" name="q9equipAvailability_16" id="q9equipAvailability_16">
							<option value="" selected="selected">Select One</option>

							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<div class="right">
						<select name="q9equipFunctioning_16" id="q9equipFunctioning_16" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</div>
					<input type="hidden"  name="q9equipCode_16" id="q9equipCode_16" value="EQP46" />
				</div>

			</div>
			<!--close editTable-->
		</div>

	</div>
	<!--end delivery place description div-->

	<!--begin delivery kit contents div-->
	<div id="del_kit_content" class="step">
		<div class="column-wide">
			<div class="row">

				<div class="row-title">
					<div class="left">
						<label class="dcah-label">10. Indicate the quantities available of the following delivery instruments</label>
					</div>
					<div class="center">
						<label class="dcah-label" style="float:right;width:45%">Quantity</label>
					</div>

				</div>

			</div>

			<div class="row">
				<div class="left">
					<label>10a. Cord scissors</label>
				</div>
				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_1" id="q10equipAQty_1" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_1" id="q10equipCode_1" value="EQP47"/>
			</div>

			<div class="row">
				<div class="left">
					<label>10b. Long artery Forceps (straight, lockable)</label>
				</div>
				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_2" id="q10equipAQty_2" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_2" id="q10equipCode_2" value="EQP48" />
			</div>

			<div class="row">
				<div class="left">
					<label>10c. Episiotomy scissors</label>
				</div>

				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_3" id="q10equipAQty_3" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_3" id="q10equipCode_3" value="EQP49" />

			</div>

			<div class="row">
				<div class="left">
					<label>10d. Kidney dishes</label>
				</div>

				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_4" id="q10equipAQty_4" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_4" id="q10equipCode_4" value="EQP50" />
			</div>

			<div class="row">
				<div class="left">
					<label>10e. Gallipots</label>
				</div>
				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_5" id="q10equipAQty_5" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_5" id="q10equipCode_5" value="EQP51" />
			</div>

			<div class="row">
				<div class="left">
					<label>10f. Sponge-holding forceps</label>
				</div>

				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_6" id="q10equipAQty_6" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_6" id="q10equipCode_6" value="EQP52" />
			</div>

			<div class="row">
				<div class="left">
					<label>10g. Needle holder</label>
				</div>

				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_7" id="q10equipAQty_7" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_7" id="q10equipCode_7" value="EQP53" />
			</div>

			<div class="row">
				<div class="left">
					<label>>
						10h. Dissecting forceps -toothed</label
				</div>

				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_8" id="q10equipAQty_8" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_8" id="q10equipCode_8" value="EQP54" />
			</div>

			<div class="row">
				<div class="left">
					<label>10i. Instrument tray</label>
				</div>

				<div class="center">
					<input type="number" class="cloned fromZero" name="q10equipAQty_9" id="q10equipAQty_9" min="0"/>
				</div>
				<input type="hidden"  name="q10equipCode_9" id="q10equipCode_9" value="EQP55" />

			</div>
		</div>

	</div>
	</div>
	<!--end delivery kit contents div-->

	<!--begin other equipments div-->
	<div id="other_equip_sec" class="step">
		<div class="column-wide">
			<div class="row-title">
				<div class="left">

					<label class="dcah-label">11. Other Equipment and supplies</label>
				</div>
				<div class="center">
					<label class="dcah-label" style="width:45%">Availability (A)</label>
					<label class="dcah-label" style="float:right;width:45%">Quantity</label>
				</div>

				<div class="right">
					<label class="dcah-label" style="width:45%">Functioning (b)</label>
					<label class="dcah-label" style="float:right;width:45%">Quantity</label>
				</div>
			</div>

			<div id="tableEquipmentList_2">
				<div class="row2">
					<input type="button" id="editEquipmentListTopButton_2" name="editEquipmentListTopButton_2" class="awesome myblue medium" value="Edit List"/>
				</div>

				<div class="row" id="tr_17">
					<div class="left">
						<label>11a. Stethoscopes (Adult)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_17" id="q11equipAvailability_17">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_17" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_17" id="q11equipFunctioning_17" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_17" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_17" id="q11equipCode_17" value="EQP56" />
				</div>

				<div class="row" id="tr_18">
					<div class="left">
						<label>11b. Stethoscopes (Paediatric)</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_18" id="q11equipAvailability_18">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_18" type="number" class="cloned fromZero" min="0"/>

					</div>
					<div class="right">

						<select name="q11equipFunctioning_18" id="q11equipFunctioning_18" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_18" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_18" id="q11equipCode_18" value="EQP57" />
				</div>

				<div class="row" id="tr_19">
					<div class="left">
						<label>11c. BP machine</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_19" id="q11equipAvailability_19">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

					</div>
					<div class="right">

						<select name="q11equipFunctioning_19" id="q11equipFunctioning_19" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</div>
					<input type="hidden"  name="q11equipCode_19" id="q11equipCode_19" value="EQP58" />
				</div>

				<div class="row" id="tr_20">
					<div class="left">
						<label>11d.i. Clinical Thermometer</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_20" id="q11equipAvailability_20">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_20" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_20" id="q11equipFunctioning_20" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_20" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_20" id="q11equipCode_20" value="EQP59" />
				</div>

				<div class="row" id="tr_21">
					<div class="left">
						<label>11d.ii. Room Thermometer</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_21" id="q11equipAvailability_21">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_21" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_21" id="q11equipFunctioning_21" class="cloned">
							<option value="" selected="selected">Select One</option>

							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_21" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_21" id="q11equipCode_21" value="EQP60" />
				</div>

				<div class="row" id="tr_22">
					<div class="left">
						<label>11e. Fetoscope</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_22" id="q11equipAvailability_22">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_22" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_22" id="q11equipFunctioning_22" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_22" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_22" id="q11equipCode_22" value="EQP61" />
				</div>

				<div class="row" id="tr_23">
					<div class="left">
						<label>11f. Sonicaid</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_23" id="q11equipAvailability_23">
							<option value="" selected="selected">Select One</option>

							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_23" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_23" id="q11equipFunctioning_23" class="cloned">

							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_23" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_23" id="q11equipCode_23" value="EQP62" />
				</div>

				<div class="row" id="tr_24">
					<div class="left">
						<label>11g. Suction Machine</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_24" id="q11equipAvailability_24">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_24" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_24" id="q11equipFunctioning_24" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_24" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_24" id="q11equipCode_24" value="EQP63" />
				</div>

				<div class="row" id="tr_25">
					<div class="left">
						<label>11h. Weighing Scale for babies</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_25" id="q11equipAvailability_25">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_25" type="number" class="cloned fromZero" min="0"/>

						<select name="q11equipAType_25" id="q11equipAType_25" class="cloned">
							<option value="" selected="selected">Select Type</option>
							<option>Digital</option>
							<option>Graduated</option>
						</select>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_25" id="q11equipFunctioning_25" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_25" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_25" id="q11equipCode_25" value="EQP64" />
				</div>

				<div class="row" id="tr_26">
					<div class="left">
						<label>11i. Adult resuscitation tray</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_26" id="q11equipAvailability_26">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_26" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">

						<select name="q11equipFunctioning_26" id="q11equipFunctioning_26" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_26" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_26" id="q11equipCode_26" value="EQP65" />
				</div>

				<div class="row" id="tr_27a">
					<div class="left">
						<label>11j. Indicate the Sterilization Method(s) used or avaialable in this facility</label>
					</div>

					<div class="center">
						<select name="sterilizationMethod" id="sterilizationMethod" class="cloned">

							<option selected="selected" value="">Select One</option>
							<option>Autoclave</option>
							<option>HLD</option>
							<option value="other">Other(specify)</option>

						</select>

						<input type="text" style="display:none" name="sterilizationMethodOther" id="sterilizationMethodOther"/>

					</div>
				</div>

				<div class="row" id="tr_27">
					<div class="left">
						<label>11k. Indicate if a Manual Vacuum Aspiration kit is available in this unit or else where in the facility</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_27" id="q11equipAvailability_27">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_27" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_27" id="q11equipFunctioning_27" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_27" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q11equipCode_27" id="q11equipCode_27" value="EQP66" />
				</div>

				<div class="row" id="tr_29a">
					<div class="left">
						<label>11l. Indicate the Vacuum Extractors available in this unit/facility</label>
					</div>
					<div class="center">
						<select class="cloned left-combo" name="q1_1_equipCode_28" id="q1_1_equipCode_28">
							<option value="">Select One</option>
							<option value="EQP67">Ventouse </option>
							<option value="EQP68">Kiwi Vacuum Extractor </option>
						</select>

						<input name="q11equipAQty_28" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_28" id="q11equipFunctioning_28" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_28" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_28" id="q11equipCode_28" />
				</div>

				<div class="row" id="tr_29">
					<div class="left">
						<label>11n. Dilatation and curretage kit</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_29" id="q11equipAvailability_29">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_29" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_29" id="q11equipFunctioning_29" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_29" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_29" id="q11equipCode_29" value="EQP69" />
				</div>

				<div class="row" id="tr_30">
					<div class="left">
						<label>11o. Sterile gauze</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_30" id="q11equipAvailability_30">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<input type="hidden"  name="q11equipCode_30" id="q11equipCode_30" value="EQP70" />
				</div>

				<div class="row" id="tr_31">
					<div class="left">
						<label>11p. Sanitary pads</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_31" id="q11equipAvailability_31">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<input type="hidden"  name="q11equipCode_31" id="q11equipCode_31" value="EQP71" />
				</div>

				<div class="row" id="tr_32">
					<div class="left">
						<label>11q. Elbow length gloves</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_32" id="q11equipAvailability_32">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_32" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q11equipFunctioning_32" id="q11equipFunctioning_32" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_32" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_32" id="q11equipCode_32" value="EQP72" />
				</div>

				<div class="row" id="tr_33">
					<div class="left">
						<label>11r. Patellar Hammer</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q11equipAvailability_33" id="q11equipAvailability_33">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<div class="right">
						<select name="q11equipFunctioning_33" id="q11equipFunctioning_33" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

					</div>
					<input type="hidden"  name="q11equipCode_33" id="q11equipCode_33" value="EQP73" />
				</div>

				<div class="row" id="tr_34">
					<div class="left">
						<lable>
							11s. Sutures
						</lable>
					</div>

					<div class="center">
						<select name="q11equipAvailability_34" id="q11equipAvailability_34" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q11equipAQty_34" type="number" class="cloned fromZero" min="0"/>

					</div>
					<div class="right">
						<select name="q11equipFunctioning_34" id="q11equipFunctioning_34" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q11equipFQty_34" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_34" id="q11equipCode_34" value="EQP74" />
				</div>

				<div class="row" id="tr_35">
					<div class="left">
						<label>11s.i. Oxygen-Cylinder</label>
					</div>

					<div class="center">
						<select name="q11equipAvailability_35" id="q11equipAvailability_35" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

						<input name="q11equipAQty_35" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_35" id="q11equipCode_35" value="EQP75" />
				</div>

				<div class="row" id="tr_36">
					<div class="left">
						<label>11s.ii. Oxygen-Concentrator</label>
					</div>

					<div class="center">
						<select name="q11equipAvailability_36" id="q11equipAvailability_36" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

						<input name="q11equipAQty_36" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q11equipCode_36" id="q11equipCode_36" value="EQP76" />
				</div>

			</div>
			<!--close editList_2-->
		</div>
		<!--close div wide-->

	</div><!--end other equipments div-->

	<!--begin medications in the maternity/labour ward div -->
	<div id="mlw_medication" class="step">
		<div class="column-wide">

			<div class="row-title">
				<div class="left">
					<label class="dcah-label">12. Medications in the Maternity/Labour ward</label>
				</div>
				<div class="center">
					<label class="dcah-label" style="float:left;width:45%">Availability</label>
					<label class="dcah-label" style="float:right;width:45%">Quantity</label>
				</div>

			</div>

			<div class="row" id="tr_37">
				<div class="left">
					<label>12a.i. Injectable-Oxytocin(or Injectable-Syntocin)</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_1" id="q12mnhCommodityName_1" value="Injectable-Oxytocin" />

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_1" id="q12equipAvailability_1">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>

					<input name="q12equipAQty_1" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<!--div class="row" id="tr_39">
			<div class="left">
			12a.ii. Injectable-Syntocin
			</div>
			<input type="hidden"  name="q12mnhCommodityName_2" id="q12mnhCommodityName_2" value="Injectable-Syntocin" />
			<div class="center">
			<select class="cloned left-combo" name="q12equipAvailability_2" id="q12equipAvailability_2">
			<option value="" selected="selected">Select One</option>
			<option>Always Available</option>
			<option>Sometimes Available</option>
			<option>Never Available</option>
			</select>

			<input name="q12equipAQty_2" type="number" class="cloned fromZero" min="0"/>

			</div>

			</div-->

			<div class="row" id="tr_40">
				<div class="left">
					<label>12b.i. Indicate the available Intravenous fluids</label>
				</div>

				<div class="center">
					<select class="cloned left-combo" name="q12mnhCommodityName_3" id="q12mnhCommodityName_3">
						<option value="" selected="selected">Select Type</option>
						<option value="Intravenous solution-Ringers Lactate">Ringers Lactate</option>
						<option value="Intravenous solution-D5NS">D5NS</option>
						<option value="Intravenous solution-NS Infusion">NS Infusion</option>

					</select>
					<input name="q12equipAQty_3" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_41">
				<div class="left">
					<label>12b.ii. Intravenous Metronidazole</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_4" id="q12mnhCommodityName_4" value="Intravenous Metronidazole"/>
				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_4" id="q12equipAvailability_4">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>

					<input name="q12equipAQty_4" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<!--div class="row" id="tr_42">
			<div class="left">
			12c. Injectable methergine
			</div>
			<input type="hidden"  name="q12mnhCommodityName_5" id="q12mnhCommodityName_5" value="Injectable methergine"/>

			<div class="center">
			<select class="cloned left-combo" name="q12equipAvailability_5" id="q12equipAvailability_5">
			<option value="" selected="selected">Select One</option>
			<option>Always Available</option>
			<option>Sometimes Available</option>
			<option>Never Available</option>
			</select>
			<input name="q12equipAQty_5" type="number" class="cloned fromZero" min="0"/>
			</div>

			</div-->

			<div class="row" id="tr_43i">
				<div class="left">
					<label>12di. Injectable Hydralazine/Apresoline</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_6" id="q12mnhCommodityName_6" value="Injectable Hydralazine"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_6" id="q12equipAvailability_6">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>

					<input name="q12equipAQty_6" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>
			<!--div class="row" id="tr_43ii">
			<div class="left">
			12dii. Injectable Apresoline
			</div>
			<input type="hidden"  name="q12mnhCommodityName_7" id="q12mnhCommodityName_7" value="Injectable Apresoline"/>

			<div class="center">
			<select class="cloned left-combo" name="q12equipAvailability_7" id="q12equipAvailability_7">
			<option value="" selected="selected">Select One</option>
			<option>Always Available</option>
			<option>Sometimes Available</option>
			<option>Never Available</option>
			</select>

			<input name="q12equipAQty_7" type="number" class="cloned fromZero" min="0"/>
			</div>

			</div-->

			<div class="row" id="tr_44">
				<div class="left">
					<label>12e. Injectable diazepam</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_8" id="q12mnhCommodityName_8" value="Injectable diazepam"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_8" id="q12equipAvailability_8">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_8" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_45">
				<div class="left">
					<label>12f. Injectable magnesium sulfate</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_9" id="q12mnhCommodityName_9" value="Injectable magnesium sulfate"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_9" id="q12equipAvailability_9">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_9" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_46">
				<div class="left">
					<label>12g. Injectable penicillin</label>

				</div>
				<input type="hidden"  name="q12mnhCommodityName_10" id="q12mnhCommodityName_10" value="Injectable amoxicillin/ampicillin"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_10" id="q12equipAvailability_10">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>

					<input name="q12equipAQty_10" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_47">
				<div class="left">
					<label>12h. Injectable gentamicin</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_11" id="q12mnhCommodityName_11" value="Injectable gentamicin"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_11" id="q12equipAvailability_11">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_11" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_48">
				<div class="left">
					<label>12i. Calcium gluconate</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_12" id="q12mnhCommodityName_12" value="Calcium gluconate"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_12" id="q12equipAvailability_12">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_12" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_49">
				<div class="left">
					<label>12j. Methyldopa/Aldomet</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_13" id="q12mnhCommodityName_13" value="Methyldopa/Aldomet"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_13" id="q12equipAvailability_13">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_13" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_50">
				<div class="left">
					<label>12k. Lidocaine (lignocaine) or other local anesthetic</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_14" id="q12mnhCommodityName_14" value="Lidocaine(lignocaine)/other local anesthetic"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_14" id="q12equipAvailability_14">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_14" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_51">
				<div class="left">
					<label>12l. Nifedipine Tablets</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_15" id="q12mnhCommodityName_15" value="Nifedipine Tablets"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_15" id="q12equipAvailability_15">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_15" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_52">
				<div class="left">
					<label>12m. Vitamin A</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_16" id="q12mnhCommodityName_16" value="Vitamin A"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_16" id="q12equipAvailability_16">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_16" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>

			<div class="row" id="tr_53">
				<div class="left">
					<label>12n. Vitamin K</label>
				</div>
				<input type="hidden"  name="q12mnhCommodityName_17" id="q12mnhCommodityName_17" value="Vitamin K"/>

				<div class="center">
					<select class="cloned left-combo" name="q12equipAvailability_17" id="q12equipAvailability_17">
						<option value="" selected="selected">Select One</option>
						<option>Always Available</option>
						<option>Sometimes Available</option>
						<option>Never Available</option>
					</select>
					<input name="q12equipAQty_17" type="number" class="cloned fromZero" min="0"/>
				</div>

			</div>
		</div>

	</div><!--end medications in the maternity/labour ward div -->

	<!--begin newborn care div-->
	<div id="nbc_div_1" class="step">

		<h3>New-Born Care</h3>
		<div class="row">
			<div class="row-title">
				<div class="left">
					<label class="dcah-label">QUESTION</label>
				</div>
				<div class="center">
					<label class="dcah-label">ANSWER</label>
				</div>
			</div>
		</div>
		<div class="left">
			13. Does this facility perform newborn resuscitation?
		</div>
		<div class="right">

			<select name="nbcgqnewBornResuscitated" id="nbcgqnewBornResuscitated" class="cloned">

				<option value="" selected="selected">Select One</option>
				<option> Yes </option>
				<option> No </option>
			</select>

		</div>

	</div>
	<!--end of new born care div 1-->

	<!--begin new born care div 2-->
	<div id="nbc_div_2" class="step">
		<div class="column-wide">

			<div class="row-title">
				<div class="left">
					<label class="dcah-label">14. EQUIPMENT AND SUPPLIES FOR NEWBORN CARE</label>
				</div>
				<div class="center">
					<label class="dcah-label" style="width:45%">Availability (A)</label>
					<label class="dcah-label" style="float:right;width:45%">Quantity</label>
				</div>
				<div class="center">
					<label class="dcah-label" style="width:45%">Functioning (b)</label>
					<label class="dcah-label" style="float:right;width:45%">Quantity</label>
				</div>
				<div class="center">

				</div>
			</div>

			<div id="tableEquipmentList_3a">
				<div class="row2">
					<input type="button" id="editEquipmentListTopButton_3a" name="editEquipmentListTopButton_3a" class="awesome myblue medium" value="Edit List"/>
				</div>
				<div class="row" id="tr_54">
					<div class="left">

						<label>14a. Self inflating Neonatal Ambu bag (500 mls)</label>
					</div>
					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_54" id="q12equipAvailability_54">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q14equipAQty_54" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q14equipFunctioning_54" id="q14equipFunctioning_54" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q14equipFQty_54" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q14equipCode_54" id="q14equipCode_54" value="EQP78" />
				</div>

				<div class="row" id="tr_55">
					<div class="left">
						<label>14b.i. Infant masks-Size 0</label>
					</div>
					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_55" id="q12equipAvailability_55">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

						<input name="q14equipAQty_55" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q14equipCode_55" id="q14equipCode_55" value="EQP79" />
				</div>

				<div class="row" id="tr_56">
					<div class="left">
						<label>14b.ii. Infant masks-Size 1</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_56" id="q12equipAvailability_56">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

						<input name="q14equipAQty_56" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q14equipCode_56" id="q14equipCode_56" value="EQP80" />
				</div>

				<div class="row" id="tr_57">
					<div class="left">
						<label>14b.iii. Infant masks-Size 2</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_57" id="q12equipAvailability_57">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

						<input name="q14equipAQty_57" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q14equipCode_57" id="q14equipCode_57" value="EQP81" />

				</div>
			</div><!--close the tableEquipmentList_3a div -->
		</div>
		<!--end div column-wide -->
	</div><!--end new born care div 2-->

	<!--begin neonatal unit div-->
	<div id="neonatal_unit" class="step">

		<div class="column-wide">

			<div class="row">
				<h3> Neonatal Unit</h3>
			</div>

			<div class="row-title">
				<div class="left">
					<label class="dcah-label">14. EQUIPMENT AND SUPPLIES FOR NEWBORN CARE</label>
				</div>
				<div class="center">
					<label class="dcah-label" style="width:45%">Availability (A)</label>
					<label class="dcah-label" style="float:right;width:45%">Quantity</label>
				</div>
				<div class="center">
					<label class="dcah-label" style="width:45%">Functioning (b)</label>
					<label class="dcah-label" style="float:right;width:45%">Quantity</label>
				</div>
				<div class="center">

				</div>
			</div>

			<div id="tableEquipmentList_3b">
				<div class="row2">
					<input type="button" id="editEquipmentListTopButton_3b" class="awesome myblue medium" value="Edit List"/>
				</div>

				<div class="row" id="tr_58">
					<div class="left">
						<label>14c. Clock  with seconds arm</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_58" id="q14equipAvailability_58">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

					</div>
					<input type="hidden"  name="q14equipCode_58" id="q14equipCode_58" value="EQP82" />
				</div>

				<div class="row" id="tr_59">
					<div class="left">
						<label>14d. Neonatal Incubator</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_59" id="q14equipAvailability_59">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>
						<input name="q14equipAQty_59" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q14equipFunctioning_59" id="q14equipFunctioning_59" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q14equipFQty_59" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q14equipCode_59" id="q14equipCode_59" value="EQP83" />
				</div>

				<div class="row" id="tr_60">
					<div class="left">
						<label>14e. A Radiant Heater</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_60" id="q14equipAvailability_60">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>
						<input name="q14equipAQty_60" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q14equipFunctioning_60" id="q14equipFunctioning_60" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q14equipFQty_60" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q14equipCode_60" id="q14equipCode_60" value="EQP84" />
				</div>

				<div class="row" id="tr_61">
					<div class="left">
						<label>14f. Infant Scale</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_61" id="q14equipAvailability_61">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>
						<input name="q14equipAQty_61" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q14equipFunctioning_61" id="q14equipFunctioning_61" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q14equipFQty_61" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q14equipCode_61" id="q14equipCode_61" value="EQP85" />
				</div>

				<div class="row" id="tr_62">
					<div class="left">
						<label>14g. Suction bulb for mucus extraction</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_62" id="q14equipAvailability_62">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q14equipAQty_62" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">

						<select name="q14equipFunctioning_62" id="q14equipFunctioning_62" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q14equipFQty_62" type="number" class="cloned fromZero" min="0"/>

					</div>
					<input type="hidden"  name="q14equipCode_62" id="q14equipCode_62" value="EQP86" />
				</div>

				<div class="row" id="tr_63">
					<div class="left">
						<label>14h. Suction apparatus for use with catheter</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_63" id="q14equipAvailability_63">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

						<input name="q14equipAQty_63" type="number" class="cloned fromZero" min="0"/>
					</div>
					<div class="right">
						<select name="q14equipFunctioning_63" id="q14equipFunctioning_63" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>

						<input name="q14equipFQty_63" type="number" class="cloned fromZero" min="0"/>
					</div>
					<input type="hidden"  name="q14equipCode_63" id="q14equipCode_63" value="EQP87" />
				</div>

				<div class="row" id="tr_64">
					<div class="left">
						<label>14i. A flat, clean, dry and warm newborn resuscitation surface</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_64" id="q14equipAvailability_64">
							<option value="" selected="selected">Select One</option>
							<option>Yes </option>
							<option>No </option>
						</select>

					</div>
					<input type="hidden"  name="q14equipCode_64" id="q14equipCode_64" value="EQP88" />
				</div>

				<div class="row" id="tr_65">
					<div class="left">
						<label>14j. Disposable cord ties or clamps</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_65" id="q14equipAvailability_65">
							<option value="" selected="selected">Select One</option>
							<option>Yes</option>
							<option>No</option>
						</select>

					</div>
					<div class="right">
						<select name="q14equipFunctioning_65" id="q14equipFunctioning_65" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<input type="hidden"  name="q14equipCode_65" id="q14equipCode_65" value="EQP89" />
				</div>

				<div class="row" id="tr_66">
					<div class="left">
						<label>14k. Clean and warm towels/cloths for drying / warming / wrapping baby</label>
					</div>

					<div class="center">
						<select class="cloned left-combo" name="q14equipAvailability_66" id="q14equipAvailability_66">
							<option value="" selected="selected">Select One</option>
							<option>Select One</option>
							<option>Yes</option>
							<option>No</option>

						</select>

					</div>
					<div class="right">
						<select name="q14equipFunctioning_66" id="q14equipFunctioning_66" class="cloned">
							<option value="" selected="selected">Select One</option>
							<option>Always Available</option>
							<option>Sometimes Available</option>
							<option>Never Available</option>
						</select>

					</div>
					<input type="hidden"  name="q14equipCode_66" id="q14equipCode_66" value="EQP90" />

				</div>
			</div>
			<!--close div tableEquipmentList_3b-->

		</div>
		<!--close div column-wide -->
	</div>
	<!--end neonatal unit div-->

	<!--begin blood transfusion div-->
	<div id="blood_transfusion" class="step">
		<div class="column-wide">
			<h3>Blood Transfusion Services Assessment</h3>

			<div class="row-title">
				<div class="left">

					<label class="dcah-label">QUESTION</label>
				</div>
				<div class="center">
					<label class="dcah-label">ANSWER</label>
				</div>
			</div>

			<div class="row">
				<div class="left">

					<label>15. Does this facility perform blood transfusions?</label>
				</div>
				<div class="center">

					<select name="nbcgqBloodTransfusionsDone" class="cloned">
						<option value="" selected="selected">Select One</option>
						<option>Yes</option>
						<option>No</option>
					</select>
				</div>
				<div class="right">
					<label for="q15BloodTransfusions_2">Specify:</label>

					<select name="nbcgqBloodBank" class="cloned">
						<option selected="selected" value="">Select One</option>

						<option>Blood Bank available</option>
						<option>Transfusions done but no blood bank</option>
					</select>
				</div>
			</div>

			<!--div class="row">
			<div class="left">
			16. Does this facility ever perform caesarean section?
			</div>
			<div class="center">

			<select name="nbcgqCSDone" class="cloned">
			<option selected="selected" value="">Select One</option>

			<option> Yes</option>
			<option> No</option>
			</select>
			</div>
			<div class="row hide" style="display:true">
			<div class="left" >
			<label class="dcah-label"> If Yes, how many caesarean sections were performed in September 2012</label>
			</div>
			<div class="right">
			<div class="col">

			<input type="number" class="cloned fromZero" name="nbcgqNoOfDone" id="nbcgqNoOfDone"  value=""/>

			</div>
			</div>
			</div>
			</div-->
		</div>
		<!--close div column-wide -->

	</div>
	<!--end blood transfusion div-->

	<!--begin level-4-and-above-->

	<div id="level_4_above" class="step">
		<div class="column-wide">
			<div class="hide-level">
				<div class="row">
					<h3>Complete this section for Level 4, 5 and 6 Facilities</h3>
				</div>

				<div class="row">
					<div class="row-title">
						<div class="left">

							<label class="dcah-label">Supply/Equipment</label>
						</div>
						<div class="center">
							<label class="dcah-label" style="width:45%">Availability (A)</label>
							<label class="dcah-label" style="float:right;width:45%">Quantity</label>
						</div>
						<div class="right">
							<label class="dcah-label" style="width:45%">Functioning(b)</label>
							<label class="dcah-label" style="float:right;width:45%">Quantity</label>
						</div>
					</div>

					<div id="tableEquipmentList_4">
						<div class="row2">
							<input type="button" id="editEquipmentListTopButton_4" name="editEquipmentListTopButton_4" class="awesome myblue medium" value="Edit List"/>
						</div>
						<div class="row" id="tr_67">
							<div class="left">
								<label>18a. Operating Table</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_67" id="q18equipAvailability_67">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_67" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_67" id="q18equipFunctioning_67" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_67" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_67" id="q18equipCode_67" value="EQP91" />
						</div>

						<div class="row" id="tr_68">
							<div class="left">
								<label>18b. Operating Light</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_68" id="q18equipAvailability_68">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_68" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_68" id="q18equipFunctioning_68" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input type="number" class="cloned fromZero" />
							</div>
							<input type="hidden"  name="q18equipCode_68" id="q18equipCode_68" value="EQP92" />
						</div>

						<div class="row" id="tr_69">
							<div class="left">
								<label>18c. Anaesthetic machine</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_69" id="q18equipAvailability_69">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_69" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_69" id="q18equipFunctioning_69" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_69" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_69" id="q18equipCode_69" value="EQP93" />
						</div>

						<div class="row" id="tr_70">
							<div class="left">
								<label>18d. Laryngoscopes</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_70" id="q18equipAvailability_70">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_70" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_70" id="q18equipFunctioning_70" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_70" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_70" id="q18equipCode_70" value="EQP94" />
						</div>

						<div class="row" id="tr_71">
							<div class="left">
								<label>18e. Endotracheal tubes</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_71" id="q18equipAvailability_71">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_71" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_71" id="q18equipFunctioning_71" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_71" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_71" id="q18equipCode_71" value="EQP95" />
						</div>

						<div class="row" id="tr_72">
							<div class="left">
								<label>18f. Anaesthetic drugs e.g ketamine</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_72" id="q18equipAvailability_72">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_72" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_72" id="q18equipFunctioning_72" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option>Always Available</option>
									<option>Sometimes Available</option>
									<option>Never Available</option>
								</select>

								<input name="q18equipFQty_72" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_72" id="q18equipCode_72" value="EQP96" />
						</div>

						<div class="row" id="tr_73">
							<div class="left">
								<label>18g. Anaesthetic gases (halothane, NO2, Oxygen, etc)</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_73" id="q18equipAvailability_73">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_73" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_73" id="q18equipFunctioning_73" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option>Always Available</option>
									<option>Sometimes Available</option>
									<option>Never Available</option>
								</select>

								<input name="q18equipFQty_73" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_73" id="q18equipCode_73" value="EQP97" />
						</div>

						<div class="row" id="tr_74">
							<div class="left">
								<label>18h. Drugs and supplies for spinal anesthesia (e.g. Spinal needle)</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_74" id="q18equipAvailability_74">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_74" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_74" id="q18equipFunctioning_74" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option>Always Available</option>
									<option>Sometimes Available</option>
									<option>Never Available</option>
								</select>

								<input name="q18equipFQty_74" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_74" id="q18equipCode_74" value="EQP98" />
						</div>

						<div class="row" id="tr_75">
							<div class="left">
								<label>18i. Scrub area adjacent to or in the operating room</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_75" id="q18equipAvailability_75">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_75" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_75" id="q18equipFunctioning_75" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_75" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_75" id="q18equipCode_75" value="EQP99" />
						</div>

						<div class="row" id="tr_76">
							<div class="left">
								<label>18j. Running Water</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_76" id="q18equipAvailability_76">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_76" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_76" id="q18equipFunctioning_76" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_76" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_76" id="q18equipCode_76" value="EQP100" />
						</div>

						<div class="row" id="tr_77">
							<div class="left">
								<label>18k. Suction Machine</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_77" id="q18equipAvailability_77">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_77" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_77" id="q18equipFunctioning_77" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_77" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_77" id="q18equipCode_77" value="EQP101" />
						</div>

						<div class="row" id="tr_78">
							<div class="left">
								<label>18l. Standard Cesaerian Section kit</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_78" id="q18equipAvailability_78">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_78" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_78" id="q18equipFunctioning_78" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_78" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_78" id="q18equipCode_78" value="EQP102" />
						</div>

						<div class="row" id="tr_79">
							<div class="left">
								<label>18m. Sterile operation gowns</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_79" id="q18equipAvailability_79">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_79" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_79" id="q18equipFunctioning_79" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_79" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_79" id="q18equipCode_79" value="EQP103" />
						</div>

						<div class="row" id="tr_80">
							<div class="left">
								<label>18n. Sterile Drapes</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_80" id="q18equipAvailability_80">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_80" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_80" id="q18equipFunctioning_80" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_80" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_80" id="q18equipCode_80" value="EQP104" />
						</div>

						<div class="row" id="tr_81">
							<div class="left">
								<label>18o. Sterile gloves in various sizes</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_81" id="q18equipAvailability_81">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>
								<label>Sizes (Hold down Ctrl and click to select many)</label>
								<select multiple="multiple" name="q18equipAType_81[]" id="q18equipAType_81" class="cloned">

									<option value="1">Size 1</option>

									<option value="2">Size 2</option>
									<option value="3">Size 3</option>
									<option value="4">Size 4</option>
									<option value="5">Size 5</option>
									<option value="6">Size 6</option>
									<option value="6.5">Size 6.5</option>
									<option value="7">Size 7</option>

									<option value="7.5">Size 7.5 </option>

									<option value="8">Size 8</option>
									<option value="8.5">Size 8.5</option>
									<option value="9">Size 9</option>
								</select>

								<input name="q18equipAQty_81" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_81" id="q18equipFunctioning_81" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_81" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_81" id="q18equipCode_81" value="EQP105" />
						</div>

						<div class="row" id="tr_82">
							<div class="left">
								<label>18p. IV canulas</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_82" id="q18equipAvailability_82">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_82" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_82" id="q18equipFunctioning_82" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_82" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_82" id="q18equipCode_82" value="EQP106" />
						</div>

						<div class="row" id="tr_83">
							<div class="left">
								<label>18q. Drip Stand</label>
							</div>
							<input type="hidden"  name="q18equipCode_105" id="q18equipCode_105" value="EQP107" />

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_83" id="q18equipAvailability_83">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_83" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_83" id="q18equipFunctioning_83" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>
								<input name="q18equipFQty_83" type="number" class="cloned fromZero" min="0"/>
							</div>
						</div>

						<div class="row" id="tr_84">
							<div class="left">
								<label>18r. Blood transfusion set</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_84" id="q18equipAvailability_4">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_84" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_84" id="q18equipFunctioning_84" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_84" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_84" id="q18equipCode_84" value="EQP108" />
						</div>

						<div class="row" id="tr_85">
							<div class="left">
								<label>18s. Recovery room/ recovery area</label>
							</div>

							<div class="center">
								<select class="cloned left-combo" name="q18equipAvailability_85" id="q18equipAvailability_85">
									<option value="" selected="selected">Select One</option>
									<option>Yes </option>
									<option>No </option>
								</select>

								<input name="q18equipAQty_85" type="number" class="cloned fromZero" min="0"/>
							</div>
							<div class="center">
								<select name="q18equipFunctioning_85" id="q18equipFunctioning_85" class="cloned">
									<option value="" selected="selected">Select One</option>
									<option> Yes </option>
									<option> No </option>
									<option> Dont Know </option>
								</select>

								<input name="q18equipFQty_85" type="number" class="cloned fromZero" min="0"/>
							</div>
							<input type="hidden"  name="q18equipCode_85" id="q18equipCode_85" value="EQP109" />
						</div>
						<!--close div tableEquipmentList_4-->
					</div>

					<label class="dcah-label" style="text-align:center">End of Questionnaire</label>

				</div>
			</div><!--close div level-hide-->
		</div><!--close div column-wide-->

	</div>
	<!--end level-4-and-above-->
	<div class="buttons">
		<input title="To move to the previous step" id="back" class="awesome magenta medium" type="reset"/>
		<input title="To move to the next step" id="next" class="awesome blue medium"  type="submit"/>
		<!--a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a-->
	</div>
</form>
<hr />
<p id="data"></p>