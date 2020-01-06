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
								<div class="water-school">
									<a href="###">
										<span class="dayday">
											aaaaaa様
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
