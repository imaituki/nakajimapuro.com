<p class="calendar_date_select pos_ac large f-bold">
	<span>
		<a href="./index.php?y={$mst_calendar.back_date|date_format:"%Y"}&m={$mst_calendar.back_date|date_format:"%m"}"><span style="font-size:25px;">&lt;&lt;</span></a> 
		<span>{$mst_calendar.display_date|date_format:"%Y年%m月"}</span> 
		<a href="./index.php?y={$mst_calendar.next_date|date_format:"%Y"}&m={$mst_calendar.next_date|date_format:"%m"}"><span style="font-size:25px;">&gt;&gt;</span></a>
	</span>
</p>
<form action="" method="post" id="formList">
	<div align="center">
		<table class="tbl_2 mb10 tbl_calendar" width="95%">
			<thead>
				<tr>
					<th>日</th>
					<th>月</th>
					<th>火</th>
					<th>水</th>
					<th>木</th>
					<th>金</th>
					<th>土</th>
				</tr>
			</thead>
			<tbody>
				<tr height="150px">
				{foreach from=$mst_calendar.calendar item="calendar" key="key" name="loopCalendar"}
					{if $smarty.foreach.loopCalendar.first}
						{section start=0 loop=$calendar.week name="loopStart"}
							<td>&nbsp;</td>
						{/section}
					{/if}
					{if !$smarty.foreach.loopCalendar.first && $calendar.week == 0}
						<tr height="150px">
					{/if}

					{if !empty( $calendar.calendar )}
						<td class="pos_vt pointer holiday" >
							{$key}
							{foreach from=$calendar.calendar item="detail" key="key2" name="loopDetail"}
								{*{if $detail.sanyou_rentalflg != NULL}
									<div class="use-car">
									<br><a href="../../schedule{if $detail.class == 2}2{/if}/php/edit.php?id={$detail.id_schedule}"><span class="day{if $detail.cancel_flg == 1} cancel-day{/if}">{$detail.number}&nbsp;{if $detail.cancel_flg == 1}（中止）{/if}{$detail.name}{if $detail.loan_hope_time != NULL || $detail.return_hope_time != NULL}<br>{/if}{if $detail.loan_hope_time != NULL}貸出時間：{$detail.loan_hope_time}{/if}<br>{if $detail.return_hope_time != NULL}返却時間：{$detail.return_hope_time}{/if}</span>
									</div>
								{else}
									<div class="{if $detail.cancel_flg == 1}cancel{elseif $detail.set_flg == 1 && ($detail.loan_hope_time != NULL && return_hope_time != NULL)}use-car{elseif $detail.set_flg == 2}water-school{/if}">
									<br><a href="../../schedule{if $detail.class == 2}2{/if}/php/edit.php?id={$detail.id_schedule}"><span class="dayday{if $detail.equipment_flg == 3 && $detail.cancel_flg != 1} cancel-day{/if}">{$detail.number}&nbsp;{if $detail.cancel_flg == 1}（中止）{/if}{$detail.name}<br>{$detail.action_time}{if $detail.id_lecturer.0 != NULL}<br>{$OptionLecturer[$detail.id_lecturer.0]}{/if}</span></a>
									</div>
								{/if}*}
								<div class="{if $detail.cancel_flg == 1}cancel{elseif $detail.set_flg == 1 && $detail.class == 1}use-car{elseif $detail.set_flg == 1 && $detail.class == 2 && ( $detail.hope_start_date != NULL && return_hope_date != NULL)}use-car{elseif $detail.set_flg == 2}water-school{/if}">
									<a href="../../schedule{if $detail.class == 2}2{/if}/php/edit.php?id={$detail.id_schedule}">
										<span class="dayday{if $detail.equipment_flg == 3 && $detail.cancel_flg != 1} cancel-day{/if}">
											{$detail.number}&nbsp;{if $detail.cancel_flg == 1}（中止）{/if}{$detail.name}<br />
											{if $detail.class == 2}
											{if $detail.hope_time != NULL}貸出時間：{$detail.hope_time}<br />{/if}
											{if $detail.return_hope_time != NULL}返却時間：{$detail.return_hope_time}<br />{/if}
											{/if}
											{if $detail.action_time != NULL}
												{$detail.action_time}
												{if $detail.id_lecturer.0 != NULL}<br />{/if}
												{$OptionLecturer[$detail.id_lecturer.0]}
											{/if}
										</span>
									</a>
								</div>
							{/foreach}
						</td>
					{else}
						<td class="pos_vt pointer">{$key}</td>
					{/if}
					
					{if $smarty.foreach.loopCalendar.last}
						{section start=$calendar.week loop=6 name="loopEnd"}
							<td>&nbsp;</td>
						{/section}
					{/if}
					{if $calendar.week == 6}
						</tr>
					{/if}
				{/foreach}
			</tbody>
		</table>
	</div>
	<input type="hidden" id="y" name="y" value="{$mst_calendar.display_date|date_format:"%Y"}" />
	<input type="hidden" id="m" name="m" value="{$mst_calendar.display_date|date_format:"%m"}" />
</form>