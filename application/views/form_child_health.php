<form name="zinc_ors_inventory" id="zinc_ors_inventory" method="POST" action="' . base_url() . 'submit/c_form/form_zinc_ors_inventory' . '" >
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
			<div class="column">
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
					MCH Contact
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

			<div class="column" style="margin-bottom:30px">
				<div class="row-title">
					Maternity Contact
				</div>
				<div class="row2">
					<div class="left">
						<label>Name:</label>
					</div>
					<div class="right">
						<input type="text" name="MaternityContactPerson" id="MaternityContactPerson"/>
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
						<input type="text" name="MaternityTelephone" id="MaternityTelephone" maxlength="14"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 2:</label>
					</div>
					<div class="right">
						<input type="text" name="MaternityAltTelephone" id="MaternityAltTelephone" maxlength="14"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Email:</label>
					</div>
					<div class="right">
						<input type="email" name="MaternityEmail" id="MaternityEmail" maxlength="90"/>
						<input type="hidden"  name="MaternityMFC" id="MaternityMFC"/>
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
				<lable>
					Indicate number of diarrhoea cases seen in this facility in the month of August 2012</label>
			</div>
			<div class="center">
				<input type="text" id="diarrhoeaCases" name="diarrhoeaCases" class="cloned"/>
			</div>
		</div>
	</div>

	<!--end diarrhoiea morbidity factor div-->

	<!--begin child health drug div -->
	<div id="childhealth_drugs" class="step">
		<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

		<h3 align="center"> Commodities Assessment </h3>
		<p style="text-align: center;color:#872300">
			Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the following units

		</p>
		<div id="tabs">
			<ul>
				<li>
					<a href="#tabs-1">MCH</a>
				</li>
				<li>
					<a href="#tabs-2">PEDS WARD</a>
				</li>
				<li>
					<a href="#tabs-3">OPD</a>
				</li>
				<li>
					<a href="#tabs-4">PHARMACY</a>
				</li>
				<li>
					<a href="#tabs-5">STORES</a>
				</li>
				<li>
					<a href="#tabs-6">Others*</a>
				</li>
			</ul>
			<div id="tabs-1" class="tab MCH">

				<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
				<table>
					<thead>
						<tr></tr>
						<tr>

							<!--td width="144">Batch No</td-->
							<td width="144">Quantities at Hand (Tablets)</td>
							<!--td width="144">Date Supplied to Facility</td-->
							<!--td width="144">Supplier</td-->
							<td width="144">Expiry Date</td>
							<!--td width="144">Comments</td-->

						</tr>
					</thead>
					<tr class="clonable zinc">
						<!--td width="144">
						<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
						</td-->
						<td width="144">
						<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
						</td>
						<!--td width="144">
						<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td-->
						<!--td width="144">
						<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
						</td-->
						<td width="144">
						<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<!--td width="144">
						<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
						</td-->
					</tr>
					<tr id="formbuttons_1">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add a Batch" width="auto"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch" width="auto"/>
					</tr>
				</table>

				<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
				<table>
					<thead>
						<tr>

							<!--td width="144">Batch No</td-->
							<td width="144">Quantities at Hand (Sachets)</td>
							<!--td width="144">Date Supplied to Facility</td-->
							<!--td width="144">Supplier</td-->
							<td width="144">Expiry Date</td>
							<!--td width="144">Comments</td-->

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<!--td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

						</td-->
						<td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td-->
						<!--td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td-->
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<!--td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td-->
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>

				<h3 align="center"> Ciprofloxacin Assessment</h3>
				<table>
					<thead>
						<tr>

							<!--td width="144">Batch No</td-->
							<td width="144">Quantities at Hand (Sachets)</td>
							<!--td width="144">Date Supplied to Facility</td-->
							<!--td width="144">Supplier</td-->
							<td width="144">Expiry Date</td>
							<!--td width="144">Comments</td-->

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<!--td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

						</td-->
						<td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td-->
						<!--td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td-->
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<!--td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td-->
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>

				<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
				<table>
					<thead>
						<tr>

							<!--td width="144">Batch No</td-->
							<td width="144">Quantities at Hand (Sachets)</td>
							<!--td width="144">Date Supplied to Facility</td-->
							<!--td width="144">Supplier</td-->
							<td width="144">Expiry Date</td>
							<!--td width="144">Comments</td-->

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<!--td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

						</td-->
						<td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td-->
						<!--td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td-->
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<!--td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td-->
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>
			</div>
			<!--close tabs-1-->

			<div id="tabs-2" class="tab PEDS">
				<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
				<table>
					<thead>

						<tr>

							<!--td width="144">Batch No</td-->
							<td width="144">Quantities at Hand (Tablets)</td>
							<!--td width="144">Date Supplied to Facility</td-->
							<!--td width="144">Supplier</td-->
							<td width="144">Expiry Date</td>
							<!--td width="144">Comments</td-->

						</tr>
					</thead>
					<tr class="clonable zinc">
						<!--td width="144">
						<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
						</td-->
						<td width="144">
						<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
						</td>
						<!--td width="144">
						<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td-->
						<!--td width="144">
						<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
						</td-->
						<td width="144">
						<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<!--td width="144">
						<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
						</td-->
					</tr>
					<tr id="formbuttons_1">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add a Batch" width="auto"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch" width="auto"/>
					</tr>
				</table>

				<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
				<table>
					<thead>
						<tr>

							<!--td width="144">Batch No</td-->
							<td width="144">Quantities at Hand (Sachets)</td>
							<!--td width="144">Date Supplied to Facility</td-->
							<!--td width="144">Supplier</td-->
							<td width="144">Expiry Date</td>
							<!--td width="144">Comments</td-->

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<!--td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

						</td-->
						<td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td-->
						<!--td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td-->
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<!--td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td-->
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>

				<h3 align="center"> Ciprofloxacin Assessment</h3>
				<table>
					<thead>
						<tr>

							<!--td width="144">Batch No</td-->
							<td width="144">Quantities at Hand (Sachets)</td>
							<!--td width="144">Date Supplied to Facility</td-->
							<!--td width="144">Supplier</td-->
							<td width="144">Expiry Date</td>
							<!--td width="144">Comments</td-->

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<!--td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

						</td-->
						<td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td-->
						<!--td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td-->
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<!--td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td-->
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>

				<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
				<table>
					<thead>
						<tr>

							<!--td width="144">Batch No</td-->
							<td width="144">Quantities at Hand (Sachets)</td>
							<!--td width="144">Date Supplied to Facility</td-->
							<!--td width="144">Supplier</td-->
							<td width="144">Expiry Date</td>
							<!--td width="144">Comments</td-->

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<!--td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

						</td-->
						<td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td-->
						<!--td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td-->
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<!--td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td-->
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>
			</div>
			<!--close tabs-2-->

			<div id="tabs-3" class="tab OPD">
				<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
				<table>
					<thead>
						<tr>

							<!--td width="144">Batch No</td-->
							<td width="144">Quantities at Hand (Tablets)</td>
							<!--td width="144">Date Supplied to Facility</td-->
							<!--td width="144">Supplier</td-->
							<td width="144">Expiry Date</td>
							<!--td width="144">Comments</td-->

						</tr>
					</thead>
					<tr class="clonable zinc">
						<!--td width="144">
						<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
						</td-->
						<td width="144">
						<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
						</td>
						<!--td width="144">
						<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td-->
						<!--td width="144">
						<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
						</td-->
						<td width="144">
						<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<!--td width="144">
						<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
						</td-->
					</tr>
					<tr id="formbuttons_1">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add a Batch" width="auto"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch" width="auto"/>
					</tr>
				</table>

				<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
				<table>
					<thead>
						<tr>

							<!--td width="144">Batch No</td-->
							<td width="144">Quantities at Hand (Sachets)</td>
							<!--td width="144">Date Supplied to Facility</td-->
							<!--td width="144">Supplier</td-->
							<td width="144">Expiry Date</td>
							<!--td width="144">Comments</td-->

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<!--td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

						</td-->
						<td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td-->
						<!--td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td-->
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<!--td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td-->
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>

				<h3 align="center"> Ciprofloxacin Assessment</h3>
				<table>
					<thead>
						<tr>

							<!--td width="144">Batch No</td-->
							<td width="144">Quantities at Hand (Sachets)</td>
							<!--td width="144">Date Supplied to Facility</td-->
							<!--td width="144">Supplier</td-->
							<td width="144">Expiry Date</td>
							<!--td width="144">Comments</td-->

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<!--td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

						</td-->
						<td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td-->
						<!--td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td-->
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<!--td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td-->
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>

				<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
				<table>
					<thead>
						<tr>

							<!--td width="144">Batch No</td-->
							<td width="144">Quantities at Hand (Sachets)</td>
							<!--td width="144">Date Supplied to Facility</td-->
							<!--td width="144">Supplier</td-->
							<td width="144">Expiry Date</td>
							<!--td width="144">Comments</td-->

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<!--td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

						</td-->
						<td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td-->
						<!--td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td-->
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<!--td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td-->
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>
			</div>
			<!--close tabs-3-->

			<div id="tabs-4" class="tab Pharmacy">
				<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
				<table>
					<thead>
						<tr>

							<td width="144">Batch No</td>
							<!--td width="144">Quantities at Hand (Tablets)</td-->
							<td width="144">Date Supplied to Facility</td>
							<td width="144">Supplier</td>
							<td width="144">Expiry Date</td>
							<td width="144">Comments</td>

						</tr>
					</thead>
					<tr class="clonable zinc">
						<td width="144">
						<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
						<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
						</td>
						<!--td width="144">
						<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						</td-->
						<td width="144">
						<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
						</td>
						<td width="144">
						<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
						</td>
					</tr>
					<tr id="formbuttons_1">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add a Batch" width="auto"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch" width="auto"/>
					</tr>
				</table>

				<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
				<table>
					<thead>
						<tr>

							<td width="144">Batch No</td>
							<!--td width="144">Quantities at Hand (Sachets)</td-->
							<td width="144">Date Supplied to Facility</td>
							<td width="144">Supplier</td>
							<td width="144">Expiry Date</td>
							<td width="144">Comments</td>

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						</td-->
						<td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td>
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>

				<h3 align="center"> Ciprofloxacin Assessment</h3>
				<table>
					<thead>
						<tr>

							<td width="144">Batch No</td>
							<!--td width="144">Quantities at Hand (Sachets)</td-->
							<td width="144">Date Supplied to Facility</td>
							<td width="144">Supplier</td>
							<td width="144">Expiry Date</td>
							<td width="144">Comments</td>

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						</td-->
						<td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td>
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>

				<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
				<table>
					<thead>
						<tr>

							<td width="144">Batch No</td>
							<!--td width="144">Quantities at Hand (Sachets)</td-->
							<td width="144">Date Supplied to Facility</td>
							<td width="144">Supplier</td>
							<td width="144">Expiry Date</td>
							<td width="144">Comments</td>

						</tr>
					</thead>

					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						</td-->
						<td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td>
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>
			</div>
			<!--close tabs-4-->

			<div id="tabs-5" class="tab Stores">
				<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
				<table>
					<thead>
						<tr>

							<td width="144">Batch No</td>
							<!--td width="144">Quantities at Hand (Tablets)</td-->
							<td width="144">Date Supplied to Facility</td>
							<td width="144">Supplier</td>
							<td width="144">Expiry Date</td>
							<td width="144">Comments</td>

						</tr>
					</thead>
					<tr class="clonable zinc">
						<td width="144">
						<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
						<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
						</td>
						<!--td width="144">
						<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						</td-->
						<td width="144">
						<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
						</td>
						<td width="144">
						<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
						</td>
					</tr>
					<tr id="formbuttons_1">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add a Batch" width="auto"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch" width="auto"/>
					</tr>
				</table>

				<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
				<table>
					<thead>
						<tr>

							<td width="144">Batch No</td>
							<!--td width="144">Quantities at Hand (Sachets)</td-->
							<td width="144">Date Supplied to Facility</td>
							<td width="144">Supplier</td>
							<td width="144">Expiry Date</td>
							<td width="144">Comments</td>

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						</td-->
						<td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td>
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>

				<h3 align="center"> Ciprofloxacin Assessment</h3>
				<table>
					<thead>
						<tr>

							<td width="144">Batch No</td>
							<!--td width="144">Quantities at Hand (Sachets)</td-->
							<td width="144">Date Supplied to Facility</td>
							<td width="144">Supplier</td>
							<td width="144">Expiry Date</td>
							<td width="144">Comments</td>

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						</td-->
						<td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td>
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>

				<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
				<table>
					<thead>
						<tr>

							<td width="144">Batch No</td>
							<!--td width="144">Quantities at Hand (Sachets)</td-->
							<td width="144">Date Supplied to Facility</td>
							<td width="144">Supplier</td>
							<td width="144">Expiry Date</td>
							<td width="144">Comments</td>

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						</td-->
						<td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td>
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>

			</div>
			<!--close tabs-5-->

			<div id="tabs-6" class="tab Others">
				<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
				<table>
					<thead>
						<tr>

							<td width="144">Batch No</td>
							<!--td width="144">Quantities at Hand (Tablets)</td-->
							<td width="144">Date Supplied to Facility</td>
							<td width="144">Supplier</td>
							<td width="144">Expiry Date</td>
							<td width="144">Comments</td>

						</tr>
					</thead>
					<tr class="clonable zinc">
						<td width="144">
						<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
						<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
						</td>
						<!--td width="144">
						<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						</td-->
						<td width="144">
						<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
						</td>
						<td width="144">
						<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
						</td>
					</tr>
					<tr id="formbuttons_1">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add a Batch" width="auto"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch" width="auto"/>
					</tr>
				</table>

				<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
				<table>
					<thead>
						<tr>

							<td width="144">Batch No</td>
							<!--td width="144">Quantities at Hand (Sachets)</td-->
							<td width="144">Date Supplied to Facility</td>
							<td width="144">Supplier</td>
							<td width="144">Expiry Date</td>
							<td width="144">Comments</td>

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						</td-->
						<td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td>
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>

				<h3 align="center"> Ciprofloxacin Assessment</h3>
				<table>
					<thead>
						<tr>

							<td width="144">Batch No</td>
							<!--td width="144">Quantities at Hand (Sachets)</td-->
							<td width="144">Date Supplied to Facility</td>
							<td width="144">Supplier</td>
							<td width="144">Expiry Date</td>
							<td width="144">Comments</td>

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						</td-->
						<td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td>
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>

				<h3 align="center"> Metronidazole (Flagyl)</h3>
				<table>
					<thead>
						<tr>

							<td width="144">Batch No</td>
							<!--td width="144">Quantities at Hand (Sachets)</td-->
							<td width="144">Date Supplied to Facility</td>
							<td width="144">Supplier</td>
							<td width="144">Expiry Date</td>
							<td width="144">Comments</td>

						</tr>
					</thead>
					<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
					<tr class="clonable ors">
						<td width="144">
						<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
						<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
						</td>
						<!--td width="144">
						<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
						</td-->
						<td width="144">
						<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
						</td>
						<td width="144">
						<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
						</td>
					</tr>
					<tr id="formbuttons_2">
						<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
						<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
					</tr>
				</table>
			</div>
			<!--end of tabs-6-->
		</div><!--end of div tabs-->
	</div>
	<!--end child health drug div -->

	<!--begin ort corner div-->
	<div id="ort_part1" class="step">
		<h3 align="center"> Oral Rehydration Therapy Corner Assessment </h3>
		<div class="block">
			<div class="column">
				<div class="row-title">
					<div class="left">
						ASPECTS
					</div>
					<div class="right" style="float:right">
						<div class="col">
							YES
						</div>
						<div class="col">
							NO
						</div>
					</div>
				</div>
				<div class="row">
					<div class="left">
						<label> Are dehydrated children rehydrated at this facility? </label>
					</div>
					<div class="right">
						<div class="col">
							<input type="radio" name="ortQuestion1" id="ortQuestion1_y" value="1" />
						</div>
						<div class="col">
							<input type="radio" name="ortQuestion1" id="ortQuestion1_n" value="0" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="left">
						<label> Does the facility have a designated location for oral rehydration ?</label>
					</div>
					<div class="right">
						<div class="col">
							<input type="radio" name="ortQuestion2" id="ortQuestion2_y"  value="1" />
						</div>
						<div class="col">
							<input type="radio" name="ortQuestion2" id="ortQuestion2_n" value="0" />
						</div>
					</div>
				</div>
				<div class="row hide" style="display:none">
					<label class="dcah-label"> Check the various locations where rehydration is carried out</label>
				</div>
				<div class="row hide" style="display:none">
					<div class="left" >
						<label> MCH</label>
					</div>
					<div class="right">
						<div class="col">
							<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
						</div>
					</div>
				</div>
				<div class="row hide" style="display:none">
					<div class="left" >
						<label> OPD</label>
					</div>
					<div class="right">
						<div class="col">
							<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
						</div>
					</div>
				</div>
				<div class="row hide" style="display:none">
					<div class="left" >
						<label> WARD </label>
					</div>
					<div class="right">
						<div class="col">
							<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
						</div>
					</div>
				</div>
				<div class="row hide" style="display:none">
					<div class="left" >
						<label> Other*?</label>
					</div>
					<div class="right">
						<div class="col">
							<input type="text" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end of ort corner part1 -->
	<div id="ort_questions" class="step">
		<h3 align="center"> Oral Rehydration Therapy Corner Assessment ...</h3>
		<div class="block">
			<div class="row">
				<label class="dcah-label" style="font-size:1.0em">Who supplied the supplies to the facility?</label>
				<input style="font-size:1.0em" type="text" />
			</div>

			<div class="row">
				<label class="dcah-label" style="font-size:1.0em">Is there a budget for replacement of the missing or Broken ORT Corner equipment?</label>
				<input style="font-size:1.0em" type="text" />
			</div>
		</div>
	</div>
	<div id="ort_part2" class="step">
		<div class="row-title">
			<label class="dcah-label">EQUIPMENT</label>
		</div>
		<h3 align="center"> State the availability &amp; Quantities of the following Equipment at the ORT Corner-(Assessor should ensure the interviewee responds to each of the questions). </h3>
		<div class="block">
			<table id="tableEquipmentList">
				<tr class="row2">
					<input type="button" id="editEquipmentListTopButton" name="editEquipmentListTopButton" class="awesome myblue medium" value="Edit List"/>
				</tr>
				<tr>
					<thead >
						<td width="400"><label class="dcah-label" style="font-size:1.0em">Equipment Name</label></td>
						<td width="400"><label class="dcah-label" style="font-size:1.0em">Yes/No</label></td>
						<td width="400"><label class="dcah-label" style="font-size:1.0em">Total Equipment Quantities</label></td>
					</thead>

				</tr>

				<tr class="row2" id="tr_1">
					<td width="400"><label>Tea spoons </label>
					<input type="hidden"  name="equipCode_1" id="equipCode_1" value="EQP01" />
					</td>
					<td width="400">
					<select name="equipAvailable_1" id="equipAvailable_1" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_1" id="equipQuantity_1" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_2">
					<td width="400"><label>Table spoons </label>
					<input type="hidden"  name="equipCode_2" id="equipCode_2" value="EQP02" />
					</td>
					<td width="400">
					<select name="equipAvailable_2" id="equipAvailable_2" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_2" id="equipQuantity_2" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_3">
					<td width="400"><label>Stirring spoon </label>
					<input type="hidden"  name="equipCode_3" id="equipCode_3" value="EQP03" />
					</td>
					<td width="400">
					<select name="equipAvailable_3" id="equipAvailable_3" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_3" id="equipQuantity_3" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_4">
					<td width="400"><label>Plastic buckets (with lids for infection prevention) </label>
					<input type="hidden"  name="equipCode_4" id="equipCode_4" value="EQP04" />
					</td>
					<td width="400">
					<select name="equipAvailable_4" id="equipAvailable_4" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_4" id="equipQuantity_4" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_5">
					<td width="400"><label> Buckets – for storing cups, spoons </label>
					<input type="hidden"  name="equipCode_5" id="equipCode_5" value="EQP05" />
					</td>
					<td width="400">
					<select name="equipAvailable_5" id="equipAvailable_5" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_5" id="equipQuantity_5" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_6">
					<td width="400"><label> Plastic cups (50-100mls) </label>
					<input type="hidden"  name="equipCode_6" id="equipCode_6" value="EQP06" />
					</td>
					<td width="400">
					<select name="equipAvailable_6" id="equipAvailable_6" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_6" id="equipQuantity_6" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_7">
					<td width="400"><label> Plastic cups (101-200mls) </label>
					<input type="hidden"  name="equipCode_7" id="equipCode_7" value="EQP07" />
					</td>
					<td width="400">
					<select name="equipAvailable_7" id="equipAvailable_7" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_7" id="equipQuantity_7" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_8">
					<td width="400"><label> Plastic cups (201mls-499mls) </label>
					<input type="hidden"  name="equipCode_8" id="equipCode_8" value="EQP08" />
					</td>
					<td width="400">
					<select name="equipAvailable_8" id="equipAvailable_8" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_8" id="equipQuantity_8" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_9">
					<td width="400"><label> Plastic cups (500mls) </label>
					<input type="hidden"  name="equipCode_9" id="equipCode_9" value="EQP09" />
					</td>
					<td width="400">
					<select name="equipAvailable_9" id="equipAvailable_9" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_9" id="equipQuantity_9" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_10">
					<td width="400"><label> 1 litre Calibrated measuring jars </label>
					<input type="hidden"  name="equipCode_10" id="equipCode_10" value="EQP10" />
					</td>
					<td width="400">
					<select name="equipAvailable_10" id="equipAvailable_10" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_10" id="equipQuantity_10" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_11">
					<td width="400"><label> Table Trays </label>
					<input type="hidden"  name="equipCode_11" id="equipCode_11" value="EQP11" />
					</td>
					<td width="400">
					<select name="equipAvailable_11" id="equipAvailable_11" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_11" id="equipQuantity_11" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_12">
					<td width="400"><label> Wash Basins </label>
					<input type="hidden"  name="equipCode_12" id="equipCode_12" value="EQP12" />
					</td>
					<td width="400">
					<select name="equipAvailable_12" id="equipAvailable_12" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_12" id="equipQuantity_12" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_13">
					<td width="400"><label> Water heating equipment,(e.g..hot plate/Meko ) </label>
					<input type="hidden"  name="equipCode_13" id="equipCode_13" value="EQP13" />
					</td>
					<td width="400">
					<select name="equipAvailable_13" id="equipAvailable_13" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_13" id="equipQuantity_13" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_14">
					<td width="400"><label> Hot plate-Electric/Solar powered </label>
					<input type="hidden"  name="equipCode_14" id="equipCode_14" value="EQP14" />
					</td>
					<td width="400">
					<select name="equipAvailable_14" id="equipAvailable_14" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_14" id="equipQuantity_14" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_15">
					<td width="400"><label> Heater- Gas powered </label>
					<input type="hidden"  name="equipCode_15" id="equipCode_15" value="EQP15" />
					</td>
					<td width="400">
					<select name="equipAvailable_15" id="equipAvailable_15" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_15" id="equipQuantity_15" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_16">
					<td width="400"><label> Charcoal or Firewood  stove/Heater </label>
					<input type="hidden"  name="equipCode_16" id="equipCode_16" value="EQP16" />
					</td>
					<td width="400">
					<select name="equipAvailable_16" id="equipAvailable_16" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_16" id="equipQuantity_16" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_17">
					<td width="400"><label> Paraffin Stove/Heater </label>
					<input type="hidden"  name="equipCode_17" id="equipCode_17" value="EQP17" />
					</td>
					<td width="400">
					<select name="equipAvailable_17" id="equipAvailable_17" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_17" id="equipQuantity_17" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_18">
					<td width="400"><label> Sufurias  with a Lid (14 inch) </label>
					<input type="hidden"  name="equipCode_18" id="equipCode_18" value="EQP18" />
					</td>
					<td width="400">
					<select name="equipAvailable_18" id="equipAvailable_18" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_18" id="equipQuantity_18" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_19">
					<td width="400"><label> Waste Container </label>
					<input type="hidden"  name="equipCode_19" id="equipCode_19" value="EQP19" />
					</td>
					<td width="400">
					<select name="equipAvailable_19" id="equipAvailable_19" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_19" id="equipQuantity_19" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_20">
					<td width="400"><label> Wall Clock /Timing device </label>
					<input type="hidden"  name="equipCode_20" id="equipCode_20" value="EQP20" />
					</td>
					<td width="400">
					<select name="equipAvailable_20" id="equipAvailable_20" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_20" id="equipQuantity_20" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_21">
					<td width="400"><label> Table- for mixing ORS </label>
					<input type="hidden"  name="equipCode_21" id="equipCode_21" value="EQP21" />
					</td>
					<td width="400">
					<select name="equipAvailable_21" id="equipAvailable_21" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_21" id="equipQuantity_21" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_22">
					<td width="400"><label> Benches/chair(s) </label>
					<input type="hidden"  name="equipCode_22" id="equipCode_22" value="EQP22" />
					</td>
					<td width="400">
					<select name="equipAvailable_22" id="equipAvailable_22" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_22" id="equipQuantity_22" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_23">
					<td width="400"><label> Water Storage Container ( at least 40lts)- With Tap </label>
					<input type="hidden"  name="equipCode_23" id="equipCode_23" value="EQP23" />
					</td>
					<td width="400">
					<select name="equipAvailable_23" id="equipAvailable_23" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_23" id="equipQuantity_23" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_24">
					<td width="400"><label> Water Storage Container ( at least 40lts)- Without Tap </label>
					<input type="hidden"  name="equipCode_24" id="equipCode_24" value="EQP24" />
					</td>
					<td width="400">
					<select name="equipAvailable_24" id="equipAvailable_24" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_24" id="equipQuantity_24" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_25">
					<td width="400"><label> Locally available measuring containers e.g. cooking fat Tins. </label>
					<input type="hidden"  name="equipCode_25" id="equipCode_25" value="EQP25" />
					</td>
					<td width="400">
					<select name="equipAvailable_25" id="equipAvailable_25" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_25" id="equipQuantity_25" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_26">
					<td width="400"><label> Weighing scale </label>
					<input type="hidden"  name="equipCode_26" id="equipCode_26" value="EQP26" />
					</td>
					<td width="400">
					<select name="equipAvailable_26" id="equipAvailable_26" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_26" id="equipQuantity_26" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_27">
					<td width="400"><label> Hand Washing Facility/Point e.g. tippy taps. </label>
					<input type="hidden"  name="equipCode_27" id="equipCode_27" value="EQP27" />
					</td>
					<td width="400">
					<select name="equipAvailable_27" id="equipAvailable_27" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_27" id="equipQuantity_27" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_28">
					<td width="400"><label> Safe water source </label>
					<input type="hidden"  name="equipCode_28" id="equipCode_28" value="EQP28" />
					</td>
					<td width="400">
					<select name="equipAvailable_28" id="equipAvailable_28" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_28" id="equipQuantity_28" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_29">
					<td width="400"><label> Thermometer </label>
					<input type="hidden"  name="equipCode_29" id="equipCode_29" value="EQP29" />
					</td>
					<td width="400">
					<select name="equipAvailable_29" id="equipAvailable_29" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_29" id="equipQuantity_29" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<tr class="row2" id="tr_30">
					<td width="400"><label> MUAC Tape </label>
					<input type="hidden"  name="equipCode_30" id="equipCode_30" value="EQP30" />
					</td>
					<td width="400">
					<select name="equipAvailable_30" id="equipAvailable_30" class="cloned left-combo">
						<option value="" selected="selected">Select One</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select></td>
					<td width="400">
					<input type="number"  name="equipQuantity_30" id="equipQuantity_30" class="cloned fromZero" maxlength="6"/>
					</td>

				</tr>
				<!--tr class="row2">
				<input type="button" id="editEquipmentListBottomButton" name="editEquipmentList" class="awesome myblue medium" value="Edit List"/-->
				</tr>
			</table>
		</div>
	</div>
	<!--end of ort corner part 2 -->
	<!--end ort corner div-->

	<div class="buttons">
		<input title="To move to the previous step" id="back" class="awesome magenta medium" type="reset"/>
		<input title="To move to the next step" id="next" class="awesome blue medium"  type="submit"/>
		<!--a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a-->
	</div>
</form>

<p id="data"></p>
