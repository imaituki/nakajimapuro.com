			<form class="form-horizontal" action="./{if $mode == 'edit'}update{else}insert{/if}.php" method="post" enctype="multipart/form-data">
				<div class="ibox-content">
					<div class="form-group required">
						<label class="col-sm-2 control-label">日付 </label>
						<div class="col-sm-6">
							{if $message.ng.date|default:"" != NULL}<p class="error">{$message.ng.date}</p>{/if}
							<div class="input-daterange input-group" id="datepicker">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								<input type="text" class="input-sm form-control datepicker" name="date" id="date" value="{$arr_post.date|default:""}" readonly>
							</div>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group required">
						<label class="col-sm-2 control-label">タイトル</label>
						<div class="col-sm-6">
							{if $message.ng.title|default:"" != NULL}<p class="error">{$message.ng.title}</p>{/if}
							<input type="text" class="form-control" name="title" id="title" value="{$arr_post.title|default:""}" />
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					{if $_ARR_IMAGE != NULL}
						{include file=$template_image path=$_IMAGEFULLPATH dir=$_CONTENTS_DIR prefix="s_"}
					{/if}
					<div class="form-group">
						<label class="col-sm-2 control-label">本文 </label>
						<div class="col-sm-9">
							{if $message.ng.comment|default:"" != NULL}<p class="error">{$message.ng.comment}</p>{/if}
							<textarea name="comment" id="comment" rows="7" class="form-control ckeditor">{$arr_post.comment|default:""}</textarea>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">掲載期間 </label>
						<div class="col-sm-4">
							<div class="radio m-r-xs inline mb15">
								{html_radios name="display_indefinite" values=1 selected=$arr_post.display_indefinite|default:"1" output="設定しない"}&nbsp;&nbsp;
								{html_radios name="display_indefinite" values=0 selected=$arr_post.display_indefinite|default:"1" output="設定する"}
							</div>
							{if $message.ng.display_start|default:"" != NULL}<p class="error">{$message.ng.display_start}</p>{/if}
							{if $message.ng.display_end|default:"" != NULL}<p class="error">{$message.ng.display_end}</p>{/if}
							<div class="input-daterange input-group" id="datepicker">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								<input type="text" class="input-sm form-control datepicker" name="display_start" id="display_start" value="{$arr_post.display_start|default:""}" readonly>
								<span class="input-group-addon">～</span>
								<input type="text" class="input-sm form-control datepicker" name="display_end" id="display_end"  value="{$arr_post.display_end|default:""}" readonly>
							</div>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">表示／非表示</label>
						<div class="col-sm-6">
							{if $message.ng.display_flg|default:"" != NULL}<p class="error">{$message.ng.display_flg}</p>{/if}
							<div class="radio m-r-xs inline">
								{html_radios name="display_flg" values=1 selected=$arr_post.display_flg|default:"1" output="する"}&nbsp;&nbsp;
								{html_radios name="display_flg" values=0 selected=$arr_post.display_flg|default:"1" output="しない"}
							</div>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					{if $mode == 'edit'}<input type="hidden" name="id_schedule" value="{$arr_post.id_schedule}" />{/if}
					<input type="hidden" name="_contents_dir" id="_contents_dir" value="{$_CONTENTS_DIR}" />
					<input type="hidden" name="_contents_conf_path" id="_contents_conf_path" value="{$_CONTENTS_CONF_PATH}" />
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2 pos_ar">
							<button class="btn btn-primary"  type="submit">この内容で登録</button>
						</div>
					</div>
				</div>
			</form>
