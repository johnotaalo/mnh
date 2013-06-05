<!-- begin facility  div --->
	<table id="facility_div" class="step" style="display:none">
	<input type="hidden" name="step_name" value="facility_div"/>
		<h3 align="center">FACILITY REGISTRATION</h3>

		<tr>
			<td class="column">
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
						<input type="text" name="facilityName" class="cloned" readonly="readonly" id="facilityName"/>
					</div>
				</div>
				<div class="row2">
					<div class="left">
						<label>Facility Type:</label>
					</div>
					<div class="right">
						<select name="facilityType" id="facilityType" class="cloned">
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
						<select name="facilityLevel" id="facilityLevel" class="cloned">
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
						<select name="facilityOwner" id="facilityOwner" class="cloned">
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
						<select name="facilityProvince" id="facilityProvince" class="cloned">
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
						<select name="facilityDistrict" id="facilityDistrict" class="cloned">
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
						<select name="facilityCounty" id="facilityCounty" class="cloned">
							<option value="" selected="selected">Select One</option>
							' . $this -> selectCounties . '
						</select>
					</div>
				</div>

			</td>
			<td class="column">
				<div class="row-title">
					In Charge Contact Information
				</div>
				<div class="row2">
					<div class="left">
						<label>Name:</label>
					</div>
					<div class="right">
						<input type="text" name="facilityContactPerson" id="facilityContactPerson" class="cloned"/>
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
						<input type="text" name="facilityTelephone" id="facilityTelephone" maxlength="14" class="cloned numbers"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 2:</label>
					</div>
					<div class="right">
						<input type="text" name="facilityAltTelephone" id="facilityAltTelephone" maxlength="14" class="numbers"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Email:</label>
					</div>
					<div class="right">
						<input type="email" name="facilityEmail" id="facilityEmail" maxlength="90" class="cloned"/>
						<input type="hidden"  name="facilityMFC" id="facilityMFC"/>
					</div>
				</div>
			</td>
		</tr>
		<tr class="block">
			<td class="column" style="margin-bottom:30px">
				<div class="row-title">
					MCH Contact
				</div>
				<div class="row2">
					<div class="left">
						<label>Name:</label>
					</div>
					<div class="right">
						<input type="text" name="MCHContactPerson" id="MCHContactPerson" class="cloned" />
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
						<input type="text" name="MCHTelephone" id="MCHTelephone" maxlength="14" class="cloned numbers"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 2:</label>
					</div>
					<div class="right">
						<input type="text" name="MCHAltTelephone" id="MCHAltTelephone" maxlength="14" class="numbers"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Email:</label>
					</div>
					<div class="right">
						<input type="email" name="MCHEmail" id="MCHEmail" maxlength="90" class="cloned"/>
					</div>
				</div>
			</td>

			<td class="column">
				<div class="row-title">
					Maternity Contact 
				</div>
				
				
				<div class="row2">
				<div class="left">
				<label><b>Click on the Checkbox on the right if no Maternity Contact Information is available</b></label>
				</div>
				<div class="center">
				<input type="checkbox" name="noMaternityContact" id="noMaternityContact" title="check this box if Maternity Contact Information is not available"/>
				</div>
				
				</div>
				
				
				<div id="maternity_info">
				<div class="row2">
					<div class="left">
						<label>Name:</label>
					</div>
					<div class="right">
						<input type="text" name="MaternityContactPerson" id="MaternityContactPerson" class="cloned"/>
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
						<input type="text" name="MaternityTelephone" id="MaternityTelephone" maxlength="14" class="cloned numbers"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Cell 2:</label>
					</div>
					<div class="right">
						<input type="text" name="MaternityAltTelephone" id="MaternityAltTelephone" maxlength="14" class="numbers"/>
					</div>

				</div>

				<div class="row2">
					<div class="left">
						<label>Email:</label>
					</div>
					<div class="right">
						<input type="email" name="MaternityEmail" id="MaternityEmail" maxlength="90" class="cloned"/>
					</div>
				</div>
				</div>
			</div>
		</div>
	</table>
	<!--end facility div-->