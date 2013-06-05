<h3 align="center">Diarrhoea Morbidity Data </h3>
<!--begin of child health commodity form-->
<!--begin diarrhoiea morbidity factor div-->
<table id="diarrhoea_cases" class="step">
	<input type="hidden" name="step_name" value="diarrhoea_cases"/>

	<tr class="row2">
		<td ><label> Indicate number of diarrhoea cases seen in this facility in the <b>last 2 months</b></label></td>
		<td>
		<input type="text" id="diarrhoeaCases" name="diarrhoeaCases" class="cloned numbers"/>
		</td>
	</tr>
</table>

<!--end diarrhoiea morbidity factor div-->

<!--begin child health drug section -->
<div id="tabs-1" class="tab MCH step">
	<input type="hidden" name="step_name" value="childhealth_mch_tab"/>
	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	<p style="text-align: center;color:#872300">
		Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<div align="center" class="row-title" style="font-size:1.8em">
		Unit: MCH
	</div>

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
			<input type="number"  name="znMCHStockQuantity_1" id="znMCHStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="znMCHCommodityName_1" id="znMCHCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
			<input type="hidden"  name="znMCHUnit_1" id="znMCHUnit_1" value="MCH" />
			</td>
			<!--td width="144">
			<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="znMCHStockExpiryDate_1" id="znMCHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_1">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add Batch Number" width="auto"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch Number" width="auto"/>
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
			<input type="number"  name="orsMCHStockQuantity_1" id="orsMCHStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="orsMCHCommodityName_1" id="orsMCHCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
			<input type="hidden"  name="orsMCHUnit_1" id="orsMCHUnit_1" value="MCH" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="orsMCHStockExpiryDate_1" id="orsMCHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_2">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch Number" width="12"/>
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
			<input type="number"  name="cipStockQuantity_1" id="cipStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="cipCommodityName_1" id="cipCommodityName_1" value="Ciprofloxacin" />
			<input type="hidden"  name="cipMCHUnit_1" id="cipMCHUnit_1" value="MCH" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="cipStockExpiryDate_1" id="cipStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_3">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_3" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_3" value="Remove Batch Number" width="12"/>
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
			<input type="number"  name="metStockQuantity_1" id="metStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="metCommodityName_1" id="metCommodityName_1" value="Metronidazole (Flagyl)" />
			<input type="hidden"  name="metMCHUnit_1" id="metMCHUnit_1" value="MCH" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="metStockExpiryDate_1" id="metStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_4">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_4" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_4" value="Remove Batch Number" width="12"/>
		</tr>
	</table>
</div>
<!--close tabs-1-->

<div id="tabs-2" class="tab PEDS step">
	<input type="hidden" name="step_name" value="childhealth_peds_tab"/>
	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	<p style="text-align: center;color:#872300">
		Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<div align="center" class="row-title" style="font-size:1.8em">
		Unit: PEDS
	</div>
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
			<input type="number"  name="znPEDStockQuantity_1" id="znPEDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="znPEDCommodityName_1" id="znPEDCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
			<input type="hidden"  name="znPEDUnit_1" id="znPEDUnit_1" value="PED" />
			</td>
			<!--td width="144">
			<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="znPEDStockExpiryDate_1" id="znPEDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_5">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_5" value="Add Batch Number" width="auto"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_5" value="Remove Batch Number" width="auto"/>
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
			<input type="number"  name="orsPEDStockQuantity_1" id="orsPEDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="orsPEDCommodityName_1" id="orsPEDCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
			<input type="hidden"  name="orsPEDUnit_1" id="orsPEDUnit_1" value="PED" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="orsPEDStockExpiryDate_1" id="orsPEDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_6">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_6" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_6" value="Remove Batch Number" width="12"/>
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
			<input type="number"  name="cipPEDStockQuantity_1" id="cipPEDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="cipPEDCommodityName_1" id="cipPEDCommodityName_1" value="Ciprofloxacin" />
			<input type="hidden"  name="cipPEDUnit_1" id="cipPEDUnit_1" value="PED" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="cipPEDStockExpiryDate_1" id="cipPEDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_7">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_7" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_7" value="Remove Batch Number" width="12"/>
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
			<input type="number"  name="metPEDStockQuantity_1" id="metPEDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="metPEDCommodityName_1" id="metPEDCommodityName_1" value="Metronidazole (Flagyl)" />
			<input type="hidden"  name="metPEDUnit_1" id="metPEDUnit_1" value="PED" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="metPEDStockExpiryDate_1" id="metPEDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_8">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_8" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_8" value="Remove Batch Number" width="12"/>
		</tr>
	</table>
</div>
<!--close tabs-2-->

<div id="tabs-3" class="tab OPD step">
	<input type="hidden" name="step_name" value="childhealth_opd_tab"/>
	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	<p style="text-align: center;color:#872300">
		Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<div align="center" class="row-title" style="font-size:1.8em">
		Unit: OPD
	</div>
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
			<input type="number"  name="znOPDStockQuantity_1" id="znOPDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="znOPDCommodityName_1" id="znOPDCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
			<input type="hidden"  name="znOPDUnit_1" id="znOPDUnit_1" value="OPD" />
			</td>
			<!--td width="144">
			<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="znOPDStockExpiryDate_1" id="znOPDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_9">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_9" value="Add Batch Number" width="auto"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_9" value="Remove Batch Number" width="auto"/>
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
			<input type="number"  name="orsOPDStockQuantity_1" id="orsOPDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="orsOPDCommodityName_1" id="orsOPDCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
			<input type="hidden"  name="orsOPDUnit_1" id="orsOPDUnit_1" value="OPD" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="orsOPDStockExpiryDate_1" id="orsOPDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_10">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_10" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_10" value="Remove Batch Number" width="12"/>
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
			<input type="number"  name="cipOPDStockQuantity_1" id="cipOPDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="cipOPDCommodityName_1" id="cipOPDCommodityName_1" value="Ciprofloxacin" />
			<input type="hidden"  name="cipOPDUnit_1" id="cipOPDUnit_1" value="OPD" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="cipOPDStockExpiryDate_1" id="cipOPDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_11">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_11" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_11" value="Remove Batch Number" width="12"/>
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
			<input type="number"  name="metOPDStockQuantity_1" id="metOPDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="metOPDCommodityName_1" id="metOPDCommodityName_1" value="Metronidazole (Flagyl)" />
			<input type="hidden"  name="metOPDUnit_1" id="metOPDUnit_1" value="OPD" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="metOPDStockExpiryDate_1" id="metOPDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_12">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_12" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_12" value="Remove Batch Number" width="12"/>
		</tr>
	</table>
</div>
<!--close tabs-3-->

<div id="tabs-4" class="tab Pharmacy step">
	<input type="hidden" name="step_name" value="childhealth_pharm_tab"/>
	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	<p style="text-align: center;color:#872300">
		Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<div align="center" class="row-title" style="font-size:1.8em">
		Unit: Pharmacy
	</div>
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
			<input type="hidden"  name="znPHAUnit_1" id="znPHAUnit_1" value="PHA" />
			</td>
			<!--td width="144">
			<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="znPHAStockDispensedDate_1" id="znPHAStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="znPHAStockSupplier_1" id="znPHAStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="znPHAStockExpiryDate_1" id="znPHAStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="znPHAStockComments_1" id="znPHAStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_13">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_13" value="Add Batch Number" width="auto"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_13" value="Remove Batch Number" width="auto"/>
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
			<input type="text"  name="orsPHAStockBatchNo_1" id="orsPHAStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="orsPHACommodityName_1" id="orsPHACommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
			<input type="hidden"  name="orsPHAUnit_1" id="orsPHAUnit_1" value="PHA" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="orsPHAStockDispensedDate_1" id="orsPHAStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="orsPHAStockSupplier_1" id="orsPHAStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="orsPHAStockExpiryDate_1" id="orsPHAStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="orsPHAStockComments_1" id="orsPHAStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_14">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_14" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_14" value="Remove Batch Number" width="12"/>
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
			<input type="text"  name="cipPHAStockBatchNo_1" id="cipPHAStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="cipPHACommodityName_1" id="cipPHACommodityName_1" value="Ciprofloxacin" />
			<input type="hidden"  name="cipPHAUnit_1" id="cipPHAUnit_1" value="PHA" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="cipPHAStockDispensedDate_1" id="cipPHAStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="cipPHAStockSupplier_1" id="cipPHAStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="cipPHAStockExpiryDate_1" id="cipPHAStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="cipPHAStockComments_1" id="cipPHAStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_15">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_15" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_15" value="Remove Batch Number" width="12"/>
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
			<input type="text"  name="metPHAStockBatchNo_1" id="metPHAStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="metPHACommodityName_1" id="metPHACommodityName_1" value="Metronidazole (Flagyl)" />
			<input type="hidden"  name="metPHAUnit_1" id="metPHAUnit_1" value="PHA" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="metPHAStockDispensedDate_1" id="metPHAStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="metPHAStockSupplier_1" id="metPHAStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="metPHAStockExpiryDate_1" id="metPHAStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="metPHAStockComments_1" id="metPHAStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_16">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_16" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_16" value="Remove Batch Number" width="12"/>
		</tr>
	</table>
</div>
<!--close tabs-4-->

<div id="tabs-5" class="tab Stores step">
	<input type="hidden" name="step_name" value="childhealth_store_tab"/>
	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	<p style="text-align: center;color:#872300">
		Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<div align="center" class="row-title" style="font-size:1.8em">
		Unit: Stores
	</div>
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
			<input type="text"    name="znSTOBatchNo_1" id="znSTOStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="znSTOCommodityName_1" id="znSTOCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
			<input type="hidden"  name="znSTOUnit_1" id="znSTOUnit_1" value="Store" />
			</td>
			<!--td width="144">
			<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="znSTOStockDispensedDate_1" id="znSTOStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="znSTOStockSupplier_1" id="znSTOStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="znSTOStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="znSTOStockComments_1" id="znSTOStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_17">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_17" value="Add Batch Number" width="auto"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_17" value="Remove Batch Number" width="auto"/>
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
			<input type="text"  name="orsSTOStockBatchNo_1" id="orsSTOStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="orsSTOCommodityName_1" id="orsSTOCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
			<input type="hidden"  name="orsSTOUnit_1" id="orsSTOUnit_1" value="Store" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="orsSTOStockDispensedDate_1" id="orsSTOStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="orsSTOStockSupplier_1" id="orsSTOStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="orsSTOStockExpiryDate_1" id="orsSTOStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="orsSTOStockComments_1" id="orsSTOStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_18">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_18" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_18" value="Remove Batch Number" width="12"/>
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
			<input type="text"  name="cipSTOStockBatchNo_1" id="cipSTOStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="cipSTOCommodityName_1" id="cipSTOCommodityName_1" value="Ciprofloxacin" />
			<input type="hidden"  name="cipSTOUnit_1" id="cipSTOUnit_1" value="Store" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="cipSTOStockDispensedDate_1" id="cipSTOStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="cipSTOStockSupplier_1" id="cipSTOStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="cipSTOStockExpiryDate_1" id="cipSTOStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="cipSTOStockComments_1" id="cipSTOStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_19">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_19" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_19" value="Remove Batch Number" width="12"/>
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
			<input type="text"  name="metSTOStockBatchNo_1" id="metSTOStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="metSTOCommodityName_1" id="metSTOCommodityName_1" value="Metronidazole (Flagyl)" />
			<input type="hidden"  name="metSTOUnit_1" id="metSTOUnit_1" value="Store" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="metSTOStockDispensedDate_1" id="metSTOStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="metSTOStockSupplier_1" id="metSTOStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="metSTOStockExpiryDate_1" id="metSTOStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="metSTOStockComments_1" id="metSTOStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_20">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_20" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_20" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

</div>
<!--close tabs-5-->

<div id="tabs-6" class="tab Others step">
	<input type="hidden" name="step_name" value="childhealth_other_tab"/>
	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	<p style="text-align: center;color:#872300">
		Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<div align="center" class="row-title" style="font-size:1.8em">
		Unit: Others
	</div>
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
		<div class="row2">
			<label>Unit Name</label>
			<input type="text"  name="otherUnit_1" id="otherUnit_1" class="cloned" maxlength="45"/>
		</div>
		<tr class="clonable zinc">
			<td width="144">
			<input type="text"  name="znOTHStockBatchNo_1" id="znOTHStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="znOTHCommodityName_1" id="znOTHCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
			</td>
			<!--td width="144">
			<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="znOTHStockDispensedDate_1" id="znOTHStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="znOTHStockSupplier_1" id="znOTHStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="znOTHStockExpiryDate_1" id="znOTHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_21">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_21" value="Add Batch Number" width="auto"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_21" value="Remove Batch Number" width="auto"/>
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
			<input type="text"  name="orsOTHStockBatchNo_1" id="orsOTHStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="orsOTHCommodityName_1" id="orsOTHCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="orsOTHStockDispensedDate_1" id="orsOTHStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="orsOTHStockSupplier_1" id="orsOTHStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="orsOTHStockExpiryDate_1" id="orsOTHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsOTHStockComments_1" id="orsOTHStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_22">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_22" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_22" value="Remove Batch Number" width="12"/>
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
			<input type="text"  name="cipOTHStockBatchNo_1" id="cipOTHStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="cipOTHCommodityName_1" id="cipOTHCommodityName_1" value="Ciprofloxacin" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="cipOTHStockDispensedDate_1" id="cipOTHStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="cipOTHStockSupplier_1" id="cipOTHStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="cipOTHStockExpiryDate_1" id="cipOTHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_23">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_23" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_23" value="Remove Batch Number" width="12"/>
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
			<input type="text"  name="metOTHStockBatchNo_1" id="metOTHStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="metOTHCommodityName_1" id="metOTHCommodityName_1" value="Metronidazole" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="metOTHStockDispensedDate_1" id="metOTHStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="metOTHStockSupplier_1" id="metOTHStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="metOTHStockExpiryDate_1" id="metOTHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="metOTHStockComments_1" id="metOTHStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_24">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_24" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_24" value="Remove Batch Number" width="12"/>
		</tr>
	</table>
</div>
<!--end of tabs-6-->
<!--end child health drug section -->

<h3 align="center"> Oral Rehydration Therapy Corner Assessment </h3>
<table id="ort_part1" class="step">
	<input type="hidden" name="step_name" value="ort_part1"/>

	<tr class="row-title">
		<td ><b>ASPECTS</b></td>
		<td  style="float:right"><td class="col"><b>YES</b></td>
		<td class="col"><b>NO</b></td>
		</td>
	</tr>
	<tr>
		<td ><label>1. Are dehydrated children rehydrated at this facility? </label></td>
		<td ><td class="col">
		<input type="radio" name="ortQuestion1" id="ortQuestion1_y" value="1" />
		</td>
		<td class="col">
		<input type="radio" name="ortQuestion1" id="ortQuestion1_n" value="0" />
		</td>
		</td>
	</tr>
	<tr>
		<td ><label>2. Does the facility have a designated location for oral rehydration ?</label></td>
		<td ><td class="col">
		<input type="radio" name="ortQuestion2" id="ortQuestion2_y"  value="1" />
		</td>
		<td class="col">
		<input type="radio" name="ortQuestion2" id="ortQuestion2_n" value="0" />
		</td>
		</td>
	</tr>
	<tr class="row hide" style="display:none">
		<label class="dcah-label">3. Check the various locations where rehydration is carried out</label>
	</tr>
	<tr class="row hide" style="display:none">
		<td  ><label> MCH</label></td>
		<td ><td class="col">
		<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
		</td>
		</td>
	</tr>
	<tr class="row hide" style="display:none">
		<td  ><label> OPD</label></td>
		<td ><td class="col">
		<input type="checkbox" name="ortDehydrationLocationOPD" id="ortDehydrationLocationOPD"  value="" maxlength="50"/>
		</td>
		</td>
	</tr>
	<tr class="row hide" style="display:none">
		<td  ><label> WARD </label></td>
		<td ><td class="col">
		<input type="checkbox" name="ortDehydrationLocationWard" id="ortDehydrationLocationWard"  value="" maxlength="50"/>
		</td>
		</td>
	</tr>
	<tr class="row hide" style="display:none">
		<td  ><label> Other*?</label></td>
		<td ><td class="col">
		<input type="text" name="ortDehydrationLocationOther" id="ortDehydrationLocationOther"  value="" maxlength="50"/>
		</td>
		</td>
	</tr>

</table>
<!--end of ort corner part1 -->

<table id="ort_questions" class="step">

	<tr class="row">
		<td ><label class="dcah-label" style="font-size:1.0em">4. Who supplied the supplies to the facility?</label></td>
		<td ><label>Government</label>
		<input type="radio" />
		<label>Partners</label>
		<input type="radio" />
		</td>
	</tr>

	<tr class="row">
		<td ><label class="dcah-label" style="font-size:1.0em">5. Is there a budget for replacement of the missing or Broken ORT Corner equipment?</label></td>
		<td ><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
	</tr>

</table>
<!--end of ort questions-->
<div class="row-title">
	<label class="dcah-label">EQUIPMENT</label>
</div>
<h3 align="center"> State the availability &amp; Quantities of the following Equipment at the ORT Corner-(Assessor should ensure the interviewee responds to each of the questions). </h3>

<table id="tableEquipmentList">
	<tr class="row2">
		<input type="button" id="editEquipmentListTopButton" name="editEquipmentListTopButton" class="awesome myblue medium" value="Edit List"/>
	</tr>
	<tr>

		<td><label class="dcah-label" style="font-size:1.0em"><b>Equipment Name</b></label></td>
		<td><label class="dcah-label" style="font-size:1.0em"><b>Yes/No</b></label></td>
		<td><label class="dcah-label" style="font-size:1.0em"><b>Total Equipment Quantities</b></label></td>

	</tr>

	<tr class="row2" id="tr_1">
		<td><label>Tea spoons </label>
		<input type="hidden"  name="equipCode_1" id="equipCode_1" value="EQP01" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_1" id="equipQuantity_1" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_2">
		<td><label>Table spoons </label>
		<input type="hidden"  name="equipCode_2" id="equipCode_2" value="EQP02" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_2" id="equipQuantity_2" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_3">
		<td><label>Stirring spoon </label>
		<input type="hidden"  name="equipCode_3" id="equipCode_3" value="EQP03" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_3" id="equipQuantity_3" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_4">
		<td><label>Plastic buckets (with lids for infection prevention) </label>
		<input type="hidden"  name="equipCode_4" id="equipCode_4" value="EQP04" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_4" id="equipQuantity_4" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_5">
		<td><label> Buckets – for storing cups, spoons </label>
		<input type="hidden"  name="equipCode_5" id="equipCode_5" value="EQP05" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_5" id="equipQuantity_5" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_6">
		<td><label> Plastic cups (50-100mls) </label>
		<input type="hidden"  name="equipCode_6" id="equipCode_6" value="EQP06" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_6" id="equipQuantity_6" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_7">
		<td><label> Plastic cups (101-200mls) </label>
		<input type="hidden"  name="equipCode_7" id="equipCode_7" value="EQP07" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_7" id="equipQuantity_7" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_8">
		<td><label> Plastic cups (201mls-499mls) </label>
		<input type="hidden"  name="equipCode_8" id="equipCode_8" value="EQP08" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_8" id="equipQuantity_8" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_9">
		<td><label> Plastic cups (500mls) </label>
		<input type="hidden"  name="equipCode_9" id="equipCode_9" value="EQP09" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_9" id="equipQuantity_9" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_10">
		<td><label> 1 litre Calibrated measuring jars </label>
		<input type="hidden"  name="equipCode_10" id="equipCode_10" value="EQP10" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_10" id="equipQuantity_10" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_11">
		<td><label> Table Trays </label>
		<input type="hidden"  name="equipCode_11" id="equipCode_11" value="EQP11" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_11" id="equipQuantity_11" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_12">
		<td><label> Wash Basins </label>
		<input type="hidden"  name="equipCode_12" id="equipCode_12" value="EQP12" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_12" id="equipQuantity_12" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_13">
		<td><label> Water heating equipment,(e.g..hot plate/Meko ) </label>
		<input type="hidden"  name="equipCode_13" id="equipCode_13" value="EQP13" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_13" id="equipQuantity_13" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_14">
		<td><label> Hot plate-Electric/Solar powered </label>
		<input type="hidden"  name="equipCode_14" id="equipCode_14" value="EQP14" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_14" id="equipQuantity_14" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_15">
		<td><label> Heater- Gas powered </label>
		<input type="hidden"  name="equipCode_15" id="equipCode_15" value="EQP15" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_15" id="equipQuantity_15" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_16">
		<td><label> Charcoal or Firewood  stove/Heater </label>
		<input type="hidden"  name="equipCode_16" id="equipCode_16" value="EQP16" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_16" id="equipQuantity_16" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_17">
		<td><label> Paraffin Stove/Heater </label>
		<input type="hidden"  name="equipCode_17" id="equipCode_17" value="EQP17" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_17" id="equipQuantity_17" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_18">
		<td><label> Sufurias  with a Lid (14 inch) </label>
		<input type="hidden"  name="equipCode_18" id="equipCode_18" value="EQP18" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_18" id="equipQuantity_18" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_19">
		<td><label> Waste Container </label>
		<input type="hidden"  name="equipCode_19" id="equipCode_19" value="EQP19" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_19" id="equipQuantity_19" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_20">
		<td><label> Wall Clock /Timing device </label>
		<input type="hidden"  name="equipCode_20" id="equipCode_20" value="EQP20" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_20" id="equipQuantity_20" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_21">
		<td><label> Table- for mixing ORS </label>
		<input type="hidden"  name="equipCode_21" id="equipCode_21" value="EQP21" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_21" id="equipQuantity_21" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_22">
		<td><label> Benches/chair(s) </label>
		<input type="hidden"  name="equipCode_22" id="equipCode_22" value="EQP22" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_22" id="equipQuantity_22" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_23">
		<td><label> Water Storage Container ( at least 40lts)- With Tap </label>
		<input type="hidden"  name="equipCode_23" id="equipCode_23" value="EQP23" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_23" id="equipQuantity_23" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_24">
		<td><label> Water Storage Container ( at least 40lts)- Without Tap </label>
		<input type="hidden"  name="equipCode_24" id="equipCode_24" value="EQP24" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_24" id="equipQuantity_24" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_25">
		<td><label> Locally available measuring containers e.g. cooking fat Tins. </label>
		<input type="hidden"  name="equipCode_25" id="equipCode_25" value="EQP25" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_25" id="equipQuantity_25" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_26">
		<td><label> Weighing scale </label>
		<input type="hidden"  name="equipCode_26" id="equipCode_26" value="EQP26" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_26" id="equipQuantity_26" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_27">
		<td><label> Hand Washing Facility/Point e.g. tippy taps. </label>
		<input type="hidden"  name="equipCode_27" id="equipCode_27" value="EQP27" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_27" id="equipQuantity_27" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_28">
		<td><label> Safe water source </label>
		<input type="hidden"  name="equipCode_28" id="equipCode_28" value="EQP28" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_28" id="equipQuantity_28" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_29">
		<td><label> Thermometer </label>
		<input type="hidden"  name="equipCode_29" id="equipCode_29" value="EQP29" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_29" id="equipQuantity_29" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_30">
		<td><label> MUAC Tape </label>
		<input type="hidden"  name="equipCode_30" id="equipCode_30" value="EQP30" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_30" id="equipQuantity_30" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<!--tr class="row2">
	<input type="button" id="editEquipmentListBottomButton" name="editEquipmentList" class="awesome myblue medium" value="Edit List"/-->
	</tr>
</table>

<!--end of child health commodity form-->

<!--begin of mnh_form-->
<!-- form for collecting mnh information -->
<h3 align="center" style="font-size:2em;color:#AA1317">Maternal Health Assessment</h3>
<table id="beginMNH" class="step">
	<input type="hidden" name="step_name" value="mnh_sec_ass"/>

	<tr class="row">
		<td><label>Does the facility provide for delivery services?</label></td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>

		<td id="q4comm"  style="display: none">
		<input type="text" name="lndq4Comment" id="lndq4Comment" class="cloned"/>
		</td>

	</tr>

</table><!--end of beginMNH div -->
<!--begin delivery cases div-->
<div id="delivery_cases" class="step">
	<input type="hidden" name="step_name" value="delivery_cases"/>
	<h3 align="center">Information on Delivery Cases </h3>

	<div class="row2">
		<div >
			<label>Indicate number of deliveries cases (includes deliveries by caesarian section) recorded in the <b>last 2  months</b></label>
		</div>
		<div >

			<input type="text" id="deliveryCases" name="deliveryCases" class="cloned numbers fromZero"/>
		</div>
	</div>
</div>

<!--end delivery cases div-->

<!-- form for collecting mnh inventory status information -->

<h3 align="center"> ASSESSMENT OF EQUIPMENT AND SUPPLIES FOR EmONC</h3>
<!--begin emonc td-->
<table id="emonc" class="step">

	<tr class="row-title">
		<td><label ><b>Inventory Type: Labor and Delivery</b></label></td>
		<td><label><b>ANSWER</b></label></td>
	</tr>

	<tr>
		<td><label>5. Does the facility provide 24 hour coverage for delivery services?</label></td>
		<td class="center cloned" ><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		Comment
		<input type="text" name="lndq5Comment" id="lndq5Comment" class="cloned"/>
		</td>

	</tr>
	<tr>
		<td><label>6a. Is a person skilled in conducting deliveries present  at the facility or on call 24 hours a day,
			including weekends, to provide delivery care?</label></td>
		<td class="center cloned"><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
	</tr>
	<tr>
		<td><label>6b. Who conducts deliveries in this facility?</label></td>
		<td class="center cloned" ><label>Mid-wife</label>
		<input type="radio" />
		<label>Trained Medical Officer</label>
		<input type="radio" />
		<label>Clinicial Officer</label>
		<input type="radio" />
		<label>Nursing Officer</label>
		<input type="radio" />
		<label>Doctor</label>
		<input type="radio" />
		<label>Community Health Worker</label>
		<input type="radio" />
		<p></p><label for="lndq6otherProvider">Others(Specify)</label>
		<input type="text" id="lndq6otherProvider" name="lndq6otherProvider" maxlength="55" placeholder="provider1,provider2,...,"/>
		</td>
	</tr>
	<tr>
		<td><label>7. Indicate the total number of beds in the maternity ward / unit in this facility*</label></td>
		<td>
		<input type="number" name="lndq7TotalBeds" id="lndq7TotalBeds" class="cloned numbers  fromZero" min="0" style="float:left"/>
		</td>

	</tr>
</table>

<!--begin delivery place description div-->
<table id="delivery_td" class="step">
	<input type="hidden" name="step_name" value="delivery_td"/>

	<tr >
		<label >*Ask to see the room where Normal Deliveries are conducted</label>
	</tr>

	<tr>
		<td><label><b>8. What is the setting of the Delivery Room?</b></label></td>
		<td><label>Private Room (accomodates one client)</label>
		<input type="radio" />
		<label>Partitioned Shared Room</label>
		<input type="radio" />
		<label>Non-Partitioned Shared Room</label>
		<input type="radio" />
		</td>

	</tr>

	<!--end delivery place description td-->
</table>

<h3>NOTE THE AVAILABILITY AND FUNCTIONALITY OF SUPPLIES AND EQUIPMENT REQUIRED FOR DELIVERY SERVICES. EQUIPMENT MAY BE IN DELIVERY ROOM OR AN ADJACENT ROOM.</h3>

<table id="tableEquipmentList_1">

	<tr class="row-title">
		<td><label class="dcah-label">9. EQUIPMENT REQUIRED FOR DELIVERY SERVICES</label></td>
		<td><label class="dcah-label" style="width:45%"><b>Availability (A)</b></label><label class="dcah-label" style="float:right;width:45%"><b>Quantity</b></label></td>
		<td><label class="dcah-label" style="width:45%"><b>Functioning (b)</b></label><label class="dcah-label" style="float:right;width:45%"><b>Quantity</b></label></td>
	</tr>

	<tr class="row" id="mtr_1">
		<td><label>9a. Examination light</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_1" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_1" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_1" id="q9equipCode_1" value="EQP31" />
	</tr>
	<tr class="row" id="mtr_2">
		<td><label>9b. Delivery bed/ couch</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_2" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_2" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_2" id="q9equipCode_2" value="EQP32" />
	</tr>
	<tr class="row" id="mtr_3">
		<td><label>9c. Drip stand</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_3" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_3" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_3" id="q9equipCode_3" value="EQP33" />
	</tr>
	<tr class="row" id="mtr_4">
		<td><label>9d.Mackintosh (On the Delivery Couch)</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_4" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_4" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_4" id="q9equipCode_4" value="EQP34" />
	</tr>
	<tr class="row" id="mtr_5">
		<td><label>9e. Linen(Draping)</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_5" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_5" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_5" id="q9equipCode_5" value="EQP35" />
	</tr>
	<tr class="row" id="mtr_6">
		<td><label>9f.i. Linen(Delivery Couch)</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_6" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_6" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_6" id="q9equipCode_6" value="EQP36" />
	</tr>
	<tr class="row" id="mtr_7">
		<td><label>9f.ii. Linen(Green Towels)</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_7" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_7" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_7" id="q9equipCode_7" value="EQP37" />
	</tr>
	<tr class="row" id="mtr_8">
		<td><label>9g. Sharps container</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_8" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_8" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_8" id="q9equipCode_8" value="EQP38" />
	</tr>
	<tr class="row" id="mtr_9">
		<td><label>9h. At least five or more 2-ml or 5-ml disposable syringes</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q9equipCode_9" id="q9equipCode_9" value="EQP39" />
	</tr>
	<tr class="row" id="mtr_10">
		<td><label>9i. Three properly labeled or colour coded IP buckets</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q9equipCode_10" id="q9equipCode_10" value="EQP40" />
	</tr>
	<tr class="row" id="mtr_11">
		<td><label>9j. High Level Chemical Disinfectant (Jik, Cidex)</label></td>

		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q9equipCode_11" id="q9equipCode_11" value="EQP41" />
	</tr>
	<tr class="row" id="mtr_12">
		<td><label>9k. Soap for washing instruments (constantly available)</label></td>

		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

		<input type="hidden"  name="q9equipCode_12" id="q9equipCode_12" value="EQP42" />
	</tr>
	<tr class="row" id="mtr_13">
		<td><label>9l.Soap for handwashing (constantly available)</label></td>
		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

		<input type="hidden"  name="q9equipCode_13" id="q9equipCode_13" value="EQP43" />
	</tr>
	<tr class="row" id="mtr_14">
		<td><label>9m.Properly Labelled or colour coded waste segragation bins</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_14" type="number" class="cloned numbers  fromZero" min="0"/>
		<input type="hidden"  name="q9equipCode_14" id="q9equipCode_14" value="EQP44" />
		</td>
	</tr>
	<tr class="row" id="mtr_15">
		<td><label>9o. Single-use hand-drying towels (constantly available)</label></td>

		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

		<input type="hidden"  name="q9equipCode_15" id="q9equipCode_15" value="EQP45" />
	</tr>
	<tr class="row" id="mtr_16">
		<td><label>9p. Running  Water for handwashing (constantly available)</label></td>

		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

		<input type="hidden"  name="q9equipCode_16" id="q9equipCode_16" value="EQP46" />
	</tr>
</table>
<!--close editTable-->
<h3>Delivery Instruments</h3>
<table>

	<tr class="row-title">
		<td ><label><b>10. Indicate the quantities available of the following delivery instruments</b></label></td>
		<td ><label>Quantity</label></td>

	</tr>

	<tr class="row">
		<td ><label>10a. Cord scissors</label></td>
		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_1" id="q10equipAQty_1" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_1" id="q10equipCode_1" value="EQP47"/>
	</tr>

	<tr class="row">
		<td ><label>10b. Long artery Forceps (straight, lockable)</label></td>
		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_2" id="q10equipAQty_2" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_2" id="q10equipCode_2" value="EQP48" />
	</tr>

	<tr class="row">
		<td ><label>10c. Episiotomy scissors</label></td>

		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_3" id="q10equipAQty_3" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_3" id="q10equipCode_3" value="EQP49" />

	</tr>

	<tr class="row">
		<td ><label>10d. Kidney dishes</label></td>

		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_4" id="q10equipAQty_4" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_4" id="q10equipCode_4" value="EQP50" />
	</tr>

	<tr class="row">
		<td ><label>10e. Gallipots</label></td>
		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_5" id="q10equipAQty_5" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_5" id="q10equipCode_5" value="EQP51" />
	</tr>

	<tr class="row">
		<td ><label>10f. Sponge-holding forceps</label></td>

		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_6" id="q10equipAQty_6" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_6" id="q10equipCode_6" value="EQP52" />
	</tr>

	<tr class="row">
		<td ><label>10g. Needle holder</label></td>

		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_7" id="q10equipAQty_7" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_7" id="q10equipCode_7" value="EQP53" />
	</tr>

	<tr class="row">
		<td ><label> 10h. Dissecting forceps -toothed </label></td>

		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_8" id="q10equipAQty_8" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_8" id="q10equipCode_8" value="EQP54" />
	</tr>

	<tr class="row">
		<td ><label>10i. Instrument tray</label></td>

		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_9" id="q10equipAQty_9" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_9" id="q10equipCode_9" value="EQP55" />

	</tr>
</table>
<!--/div-->
<!--end delivery kit contents div-->
<h3>Other Equipment and supplies</h3>
<!--begin other equipments td-->
<table id="tableEquipmentList_2">
	<tr class="row-title">
		<td ><label class="dcah-label"><b>Equipment </b></label></td>
		<td ><label class="dcah-label" style="width:45%"><b>Availability (A)</b></label><label class="dcah-label" style="float:right;width:45%"><b>Quantity</b></label></td>

		<td ><label class="dcah-label" style="width:45%"><b>Functioning (b)</b></label><label class="dcah-label" style="float:right;width:45%"><b>Quantity</b></label></td>

	</tr>

	<tr class="row" id="mtr_17">
		<td ><label>11a. Stethoscopes (Adult)</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_17" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_17" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_17" id="q11equipCode_17" value="EQP56" />
	</tr>

	<tr class="row" id="mmtr_18">
		<td ><label>11b. Stethoscopes (Paediatric)</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_18" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_18" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_18" id="q11equipCode_18" value="EQP57" />
	</tr>

	<tr class="row" id="mmtr_19">
		<td ><label>11c. BP machine</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q11equipCode_19" id="q11equipCode_19" value="EQP58" />
	</tr>

	<tr class="row" id="mtr_20">
		<td ><label>11d.i. Clinical Thermometer</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_20" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_20" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_20" id="q11equipCode_20" value="EQP59" />
	</tr>

	<tr class="row" id="mtr_21">
		<td ><label>11d.ii. Room Thermometer</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_21" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_21" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_21" id="q11equipCode_21" value="EQP60" />
	</tr>

	<tr class="row" id="mtr_22">
		<td ><label>11e. Fetoscope</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_22" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_22" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_22" id="q11equipCode_22" value="EQP61" />
	</tr>

	<tr class="row" id="mtr_23">
		<td ><label>11f. Sonicaid</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_23" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_23" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_23" id="q11equipCode_23" value="EQP62" />
	</tr>

	<tr class="row" id="mtr_24">
		<td ><label>11g. Suction Machine</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_24" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_24" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_24" id="q11equipCode_24" value="EQP63" />
	</tr>

	<tr class="row" id="mtr_25">
		<td ><label>11h. Weighing Scale for babies</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Digital</label>
		<input type="radio"/>
		<label>Graduated</label>
		<input type="radio"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_25" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_25" id="q11equipCode_25" value="EQP64" />
	</tr>

	<tr class="row" id="mtr_26">
		<td ><label>11i. Adult resuscitation tray</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_26" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_26" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_26" id="q11equipCode_26" value="EQP65" />
	</tr>

	<tr class="row" id="mtr_27a">
		<td ><label>11j. Indicate the Sterilization Method(s) used or avaialable in this facility</label></td>

		<td ><label>Autoclave</label>
		<input type="radio" />
		<label>HLD</label>
		<input type="radio" />
		<input type="text" style="display:none" name="sterilizationMethodOther" id="sterilizationMethodOther"/>
		</td>
	</tr>

	<tr class="row" id="mtr_27">
		<td ><label>11k. Indicate if a Manual Vacuum Aspiration kit is available in this unit or else where in the facility</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_27" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_27" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_27" id="q11equipCode_27" value="EQP66" />
	</tr>

	<tr class="row" id="mtr_29a">
		<td ><label>11l. Indicate the Vacuum Extractors available in this unit/facility</label></td>
		<td ><label>Ventouse</label>
		<input type="radio" />
		<label>Kiwi Vacuum Extractor</label>
		<input type="radio" />
		<input name="q11equipAQty_28" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_28" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_28" id="q11equipCode_28" />
	</tr>

	<tr class="row" id="mtr_29">
		<td ><label>11n. Dilatation and curretage kit</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_29" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_29" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_29" id="q11equipCode_29" value="EQP69" />
	</tr>

	<tr class="row" id="mtr_30">
		<td ><label>11o. Sterile gauze</label></td>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q11equipCode_30" id="q11equipCode_30" value="EQP70" />
	</tr>

	<tr class="row" id="mtr_31">
		<td ><label>11p. Sanitary pads</label></td>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q11equipCode_31" id="q11equipCode_31" value="EQP71" />
	</tr>

	<tr class="row" id="mtr_32">
		<td ><label>11q. Elbow length gloves</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_32" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_32" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_32" id="q11equipCode_32" value="EQP72" />
	</tr>

	<tr class="row" id="mtr_33">
		<td ><label>11r. Patellar Hammer</label></td>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q11equipCode_33" id="q11equipCode_33" value="EQP73" />
	</tr>

	<tr class="row" id="mtr_34">
		<td ><label>11s. Sutures</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_34" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_34" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_34" id="q11equipCode_34" value="EQP74" />
	</tr>

	<tr class="row" id="mtr_35">
		<td ><label>11s.i. Oxygen-Cylinder</label></td>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q11equipCode_35" id="q11equipCode_35" value="EQP75" />
	</tr>

	<tr class="row" id="mtr_36">
		<td ><label>11s.ii. Oxygen-Concentrator</label></td>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q11equipCode_36" id="q11equipCode_36" value="EQP76" />
	</tr>

</table>

<h3>Medications in the Maternity/Labour ward</h3>
<table>

	<tr>
		<td ><label><b>Medications</b></label></td>
		<td ><label><b>Availability</b></label></td>

	</tr>

	<tr>
		<td ><label>12a.i. Injectable-Oxytocin(or Injectable-Syntocin)</label></td>
		<input type="hidden"  name="q12mnhCommodityName_1" id="q12mnhCommodityName_1" value="Injectable-Oxytocin" />

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_40">
		<td ><label>12b.i. Indicate the available Intravenous fluids</label></td>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		<input name="q12equipAQty_3" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>

	</tr>

	<tr class="row" id="mtr_41">
		<td ><label>12b.ii. Intravenous Metronidazole</label></td>
		<input type="hidden"  name="q12mnhCommodityName_4" id="q12mnhCommodityName_4" value="Intravenous Metronidazole"/>
		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

		</td>

		<!--td class="row" id="mtr_42">
		<td >
		12c. Injectable methergine
		</td>
		<input type="hidden"  name="q12mnhCommodityName_5" id="q12mnhCommodityName_5" value="Injectable methergine"/>

		<td >
		<select class="cloned left-combo" name="q12equipAvailability_5" id="q12equipAvailability_5">
		<option value="" selected="selected">Select One</option>
		<option>Always Available</option>
		<option>Sometimes Available</option>
		<option>Never Available</option>
		</select>
		</td>

		</td-->

	<tr class="row" id="mtr_43i">
		<td ><label>12di. Injectable Hydralazine/Apresoline</label></td>
		<input type="hidden"  name="q12mnhCommodityName_6" id="q12mnhCommodityName_6" value="Injectable Hydralazine"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>
	<!--td class="row" id="mtr_43ii">
	<td >
	12dii. Injectable Apresoline
	</td>
	<input type="hidden"  name="q12mnhCommodityName_7" id="q12mnhCommodityName_7" value="Injectable Apresoline"/>

	<td >
	<select class="cloned left-combo" name="q12equipAvailability_7" id="q12equipAvailability_7">
	<option value="" selected="selected">Select One</option>
	<option>Always Available</option>
	<option>Sometimes Available</option>
	<option>Never Available</option>
	</select>

	</td>

	</td-->

	<tr class="row" id="mtr_44">
		<td ><label>12e. Injectable diazepam</label></td>
		<input type="hidden"  name="q12mnhCommodityName_8" id="q12mnhCommodityName_8" value="Injectable diazepam"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_45">
		<td ><label>12f. Injectable magnesium sulfate</label></td>
		<input type="hidden"  name="q12mnhCommodityName_9" id="q12mnhCommodityName_9" value="Injectable magnesium sulfate"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_46">
		<td ><label>12g. Injectable penicillin</label></td>
		<input type="hidden"  name="q12mnhCommodityName_10" id="q12mnhCommodityName_10" value="Injectable amoxicillin/ampicillin"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_47">
		<td ><label>12h. Injectable gentamicin</label></td>
		<input type="hidden"  name="q12mnhCommodityName_11" id="q12mnhCommodityName_11" value="Injectable gentamicin"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_48">
		<td ><label>12i. Calcium gluconate</label></td>
		<input type="hidden"  name="q12mnhCommodityName_12" id="q12mnhCommodityName_12" value="Calcium gluconate"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_49">
		<td ><label>12j. Methyldopa/Aldomet</label></td>
		<input type="hidden"  name="q12mnhCommodityName_13" id="q12mnhCommodityName_13" value="Methyldopa/Aldomet"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_50">
		<td ><label>12k. Lidocaine (lignocaine) or other local anesthetic</label></td>
		<input type="hidden"  name="q12mnhCommodityName_14" id="q12mnhCommodityName_14" value="Lidocaine(lignocaine)/other local anesthetic"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_51">
		<td ><label>12l. Nifedipine Tablets</label></td>
		<input type="hidden"  name="q12mnhCommodityName_15" id="q12mnhCommodityName_15" value="Nifedipine Tablets"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_52">
		<td ><label>12m. Vitamin A</label></td>
		<input type="hidden"  name="q12mnhCommodityName_16" id="q12mnhCommodityName_16" value="Vitamin A"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_53">
		<td ><label>12n. Vitamin K</label></td>
		<input type="hidden"  name="q12mnhCommodityName_17" id="q12mnhCommodityName_17" value="Vitamin K"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>
</table>

<h3>New-Born Care</h3>
<!--begin newborn care div-->
<table id="nbc_td_1" class="step">

	<tr>
		<td class="row-title"><td><label class="dcah-label">QUESTION</label></td>
		<td ><label class="dcah-label">ANSWER</label></td>
		</td>
	</tr>
	<tr>
		<td><label>13. Does this facility perform newborn resuscitation?</label></td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
	</tr>
</table>
<!--end of new born care div 1-->

<h3> Neonatal Unit</h3>
<!--begin neonatal unit div-->
<table id="neonatal_unit" class="step">
	<input type="hidden" name="step_name" value="neonatal_unit"/>

	<tr>

	</tr>

	<tr>
		<td><label class="dcah-label">14. EQUIPMENT AND SUPPLIES FOR NEWBORN CARE</label></td><td><label class="dcah-label" style="width:45%">Availability (A)</label><label class="dcah-label" style="float:right;width:45%">Quantity</label></td><td><label class="dcah-label" style="width:45%">Functioning (b)</label><label class="dcah-label" style="float:right;width:45%">Quantity</label></td><td></td>
	</tr>
	<tr class="row2">
		<input type="button" id="editEquipmentListTopButton_3b" class="awesome myblue medium" value="Edit List"/>
	</tr>
	<tr class="row" id="mtr_58">
		<td><label>14c. Clock  with seconds arm</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q14equipCode_58" id="q14equipCode_58" value="EQP82" />
	</tr>
	<tr class="row" id="mtr_59">
		<td><label>14d. Neonatal Incubator</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<input name="q14equipAQty_59" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Dont Know</label>
		<input type="radio" />
		<input name="q14equipFQty_59" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q14equipCode_59" id="q14equipCode_59" value="EQP83" />
	</tr>
	<tr class="row" id="mtr_60">
		<td><label>14e. A Radiant Heater</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<input name="q14equipAQty_60" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Dont Know</label>
		<input type="radio" />
		<input name="q14equipFQty_60" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q14equipCode_60" id="q14equipCode_60" value="EQP84" />
	</tr>
	<tr class="row" id="mtr_61">
		<td><label>14f. Infant Scale</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<input name="q14equipAQty_61" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Dont Know</label>
		<input type="radio" />
		<input name="q14equipFQty_61" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q14equipCode_61" id="q14equipCode_61" value="EQP85" />
	</tr>
	<tr class="row" id="mtr_62">
		<td><label>14g. Suction bulb for mucus extraction</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<input name="q14equipAQty_62" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Dont Know</label>
		<input type="radio" />
		<input name="q14equipFQty_62" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q14equipCode_62" id="q14equipCode_62" value="EQP86" />
	</tr>
	<tr class="row" id="mtr_63">
		<td><label>14h. Suction apparatus for use with catheter</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<input name="q14equipAQty_63" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Dont Know</label>
		<input type="radio" />
		<input name="q14equipFQty_63" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q14equipCode_63" id="q14equipCode_63" value="EQP87" />
	</tr>
	<tr class="row" id="mtr_64">
		<td><label>14i. A flat, clean, dry and warm newborn resuscitation surface</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q14equipCode_64" id="q14equipCode_64" value="EQP88" />
	</tr>
	<tr class="row" id="mtr_65">
		<td><label>14j. Disposable cord ties or clamps</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q14equipCode_65" id="q14equipCode_65" value="EQP89" />
	</tr>
	<tr class="row" id="mtr_66">
		<td><label>14k. Clean and warm towels/cloths for drying / warming / wrapping baby</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q14equipCode_66" id="q14equipCode_66" value="EQP90" />
	</tr>
</table>
<!--end neonatal unit div-->

<h3>Blood Transfusion Services Assessment</h3>
<!--begin blood transfusion div-->
<table id="blood_transfusion" class="step">
	<input type="hidden" name="step_name" value="blood_transfusion"/>

	<tr class="row">
		<td ><label>15. Does this facility perform blood transfusions?</label></td>
		<td ><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label for="q15BloodTransfusions_2">
	</tr>
	<tr>
		<td>Specify:</label></td><td><label>Blood Bank available</label></td>
		<td>
		<input type="radio" />
		<label>Transfusions done but no blood bank</label>
		<input type="radio" />
		</td>
	</tr>

</table>
<!--end blood transfusion div-->
<!--begin level-4-and-above-->

<div id="level_4_above" class="step">
	<div class="column-wide">
		<div class="hide-level">
			<tr class="row">
				<h3>Complete this section for Level 4, 5 and 6 Facilities</h3>
		</div>

		<table id="tableEquipmentList_4">
			<tr class="row-title">

				<td><label class="dcah-label">Supply/Equipment</label></td>
				<td><label class="dcah-label" style="width:45%">Availability (A)</label><label class="dcah-label" style="float:right;width:45%">Quantity</label></td>
				<td><label class="dcah-label" style="width:45%">Functioning(b)</label><label class="dcah-label" style="float:right;width:45%">Quantity</label></td>
			</tr>
			<tr class="row" id="mtr_67">
				<td><label>16a. Operating Table</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_67" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_67" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_67" id="q16equipCode_67" value="EQP91" />
			</tr>

			<tr class="row" id="mtr_68">
				<td><label>16b. Operating Light</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_68" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input type="number" class="cloned numbers  fromZero" />
				</td>
				<input type="hidden"  name="q16equipCode_68" id="q16equipCode_68" value="EQP92" />
			</tr>

			<tr class="row" id="mtr_69">
				<td><label>16c. Anaesthetic machine</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_69" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_69" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_69" id="q16equipCode_69" value="EQP93" />
			</tr>

			<tr class="row" id="mtr_70">
				<td><label>16d. Laryngoscopes</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_70" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_70" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_70" id="q16equipCode_70" value="EQP94" />
			</tr>

			<tr class="row" id="mtr_71">
				<td><label>16e. Endotracheal tubes</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_71" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_71" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_71" id="q16equipCode_71" value="EQP95" />
			</tr>

			<tr class="row" id="mtr_72">
				<td><label>16f. Anaesthetic drugs e.g ketamine</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_72" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				</td>
				<input type="hidden"  name="q16equipCode_72" id="q16equipCode_72" value="EQP96" />
			</tr>

			<tr class="row" id="mtr_73">
				<td><label>16g. Anaesthetic gases (halothane, NO2, Oxygen, etc)</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_73" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				</td>
				<input type="hidden"  name="q16equipCode_73" id="q16equipCode_73" value="EQP97" />
			</tr>

			<tr class="row" id="mtr_74">
				<td><label>16h. Drugs and supplies for spinal anesthesia (e.g. Spinal needle)</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_74" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				</td>
				<input type="hidden"  name="q16equipCode_74" id="q16equipCode_74" value="EQP98" />
			</tr>

			<tr class="row" id="mtr_75">
				<td><label>16i. Scrub area adjacent to or in the operating room</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_75" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_75" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_75" id="q16equipCode_75" value="EQP99" />
			</tr>

			<tr class="row" id="mtr_76">
				<td><label>16j. Running Water</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				</td>
				<input type="hidden"  name="q16equipCode_76" id="q16equipCode_76" value="EQP100" />
			</tr>

			<tr class="row" id="mtr_77">
				<td><label>16k. Suction Machine</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_77" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_77" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_77" id="q16equipCode_77" value="EQP101" />
			</tr>

			<tr class="row" id="mtr_78">
				<td><label>16l. Standard Cesaerian Section kit</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_78" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_78" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_78" id="q16equipCode_78" value="EQP102" />
			</tr>

			<tr class="row" id="mtr_79">
				<td><label>16m. Sterile operation gowns</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_79" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_79" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_79" id="q16equipCode_79" value="EQP103" />
			</tr>

			<tr class="row" id="mtr_80">
				<td><label>16n. Sterile Drapes</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_80" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_80" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_80" id="q16equipCode_80" value="EQP104" />
			</tr>

			<tr class="row" id="mtr_81">
				<td><label>16o. Sterile gloves in various sizes</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_81" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_81" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_81" id="q16equipCode_81" value="EQP105" />
			</tr>
			<tr>
				<td><label>Sizes</label></td>
				<td><label>Size 1</label>
				<input type="radio" />
				<label>Size 2</label>
				<input type="radio" />
				<label>Size 3</label>
				<input type="radio" />
				<label>Size 4</label>
				<input type="radio" />
				<label>Size 5</label>
				<input type="radio" />
				<label>Size 6</label></td><td>
				<input type="radio" />
				<label>Size 6.5</label>
				<input type="radio" />
				<label>Size 7</label>
				<input type="radio" />
				<label>Size 7.5</label>
				<input type="radio" />
				<label>Size 8</label>
				<input type="radio" />
				<label>Size 8.5</label>
				<input type="radio" />
				<label>Size 9</label>
				<input type="radio" />
				</td>
			</tr>

			<tr class="row" id="mtr_82">
				<td><label>16p. IV canulas</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_82" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_82" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_82" id="q16equipCode_82" value="EQP106" />
			</tr>

			<tr class="row" id="mtr_83">
				<td><label>16q. Drip Stand</label></td>
				<input type="hidden"  name="q16equipCode_105" id="q16equipCode_105" value="EQP107" />
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_83" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_83" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
			</tr>

			<tr class="row" id="mtr_84">
				<td><label>16r. Blood transfusion set</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_84" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_84" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_84" id="q16equipCode_84" value="EQP108" />
			</tr>

			<tr class="row" id="mtr_85">
				<td><label>16s. Recovery room/ recovery area</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_85" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_85" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_85" id="q16equipCode_85" value="EQP109" />
			</tr>
			<!--close div tableEquipmentList_4-->
		</table>
		<label class="dcah-label" style="text-align:center">End of Questionnaire</label>

	</div><!--close div level-hide-->
</div>
