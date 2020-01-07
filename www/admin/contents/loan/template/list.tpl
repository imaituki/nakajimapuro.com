<p class="calendar_date_select pos_ac large f-bold"><span><a href="./index.php?y={$mst_calendar.back_date|date_format:"%Y"}&m={$mst_calendar.back_date|date_format:"%m"}">&lt;&lt;</a> <span>{$mst_calendar.display_date|date_format:"%Y年%m月"}</span> <a href="./index.php?y={$mst_calendar.next_date|date_format:"%Y"}&m={$mst_calendar.next_date|date_format:"%m"}">&gt;&gt;</a></span></p>
				<form action="" method="post" id="formList">
					<div class="table-overflow-wrap" align="center">
					<table class="tbl_2 mb10 tbl_calendar loan_tbl_calendar">
						<thead>
							<tr>
								<th class="fix_cell v1">&nbsp;</th>
								<th class="fix_cell v2">&nbsp;</th>
{foreach from=$mst_calendar.days item="week" key="key"}
								<th>{$OptionWeek[$week]}</th>
{/foreach}
							</tr>
							<tr>
								<th class="fix_cell v1">&nbsp;</th>
								<th class="fix_cell v2">&nbsp;</th>
{foreach from=$mst_calendar.days item="calendar" key="key"}
								<th>{$key}</th>
{/foreach}
							</tr>
						</thead>
						<tbody>
{foreach from=$mst_calendar.calendar item="calendar" key="key"}
							<tr>
								<th class="fix_cell v1">{$OptionEquipment[$calendar._equipment_arr]}</th>
								<th class="fix_cell v2">
	{foreach from=$OptionStoreEquipment[$calendar._equipment_arr].id_storage item="ListEquipment" key="key3" name="LoopStorage"}
									{$OptionStorage[$ListEquipment]}&nbsp;→&nbsp;{$OptionStoreEquipment[$calendar._equipment_arr].storage_number[$key3]|number_format}&nbsp;&nbsp;
	{/foreach}
								</th>
	{foreach from=$mst_calendar.days item="week" key="key2"}
		{if $calendar.date_start|date_format:"%-d" <= $key2 && $calendar.date_end|date_format:"%-d" >= $key2}
			{if $count == 0}
								<td colspan="{$calendar.date_diff}">
									<div class="list-color color-bar{$calendar.colorbar}">
										<a href="../../request{if $calendar.class == 2}2{/if}/php/edit.php?id={$calendar.id_request}">{$calendar.name}&nbsp;&nbsp;&nbsp;{if $calendar._equipment_shop != NULL}{$OptionStorage[$calendar._equipment_shop]}{/if}{$calendar._equipment_num|number_format}個</a>
									</div>
								</td>
			{assign var="count" value=1}
		{/if}
		{else}
								<td></td>
		{/if}
		{if $calendar.date_end|date_format:"%-d" == $key2}{assign var="count" value=0}{/if}
	{/foreach}
							</tr>
{/foreach}
						</tbody>
					</table>
				</div>
				<input type="hidden" id="y" name="y" value="{$mst_calendar.display_date|date_format:"%Y"}" />
				<input type="hidden" id="m" name="m" value="{$mst_calendar.display_date|date_format:"%m"}" />
				</form>
