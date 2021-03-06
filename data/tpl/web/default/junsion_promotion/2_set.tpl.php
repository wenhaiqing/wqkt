<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <form action="" method="post" class="form-horizontal form">
    	<div class='panel panel-default'>
            <div class='panel-heading'>其他设置</div>
            <div class='panel-body'>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">新会员分组</label>
           			<div class="col-sm-9">
                    	<select style="display: inline-block;width: auto;" name='mgid' class="form-control">
                           	<?php  if(is_array($mgroups)) { foreach($mgroups as $g) { ?>
                           	<option value="<?php  echo $g['groupid'];?>" <?php  if($settings['mgid']==$g['groupid']) { ?>selected<?php  } ?>><?php  echo $g['title'];?></option>
                           	<?php  } } ?>
                        </select>
                        <span class="help-block">新关注粉丝自动分组</span>
 					</div>
 				</div>
 				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">新粉丝分组</label>
                    <div class="col-sm-9 col-xs-12">
                            <select style="display: inline-block;width: auto;" name='fgid' class="form-control">
                            	<?php  if(is_array($fgroups)) { foreach($fgroups as $g) { ?>
                            	<option value="<?php  echo $g['id'];?>" <?php  if($settings['fgid']==$g['id']) { ?>selected<?php  } ?>><?php  echo $g['name'];?></option>
                            	<?php  } } ?>
                            </select>
                            <span class="help-block">新关注粉丝自动分组</span>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">推广时限</label>
           			<div class="col-sm-9">
                    	<?php  echo tpl_form_field_daterange("date",$settings['date'],true)?>
 					</div>
 				</div>
 				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动未开始提示语</label>
           			<div class="col-sm-9">
                    	<input type="text" name="no_start_tips" value="<?php  echo $settings['no_start_tips'];?>" class='form-control'>
 					</div>
 				</div>
 				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动已结束提示语</label>
           			<div class="col-sm-9">
                    	<input type="text" name="end_tips" value="<?php  echo $settings['end_tips'];?>" class='form-control'>
 					</div>
 				</div>
 			</div>
 		</div>
 		<div class='panel panel-default'>
            <div class='panel-heading'>首页扩展按钮</div>
            <div class='panel-body'>
            <div id="model" style="display: none;">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">扩展按钮</label>
           			<div class="col-sm-9">
                    	<div class="input-group" style="margin-bottom: 5px;">
                    		<div class="input-group-addon">按钮文字</div>
                    		<input class="form-control" type="text" name="btitle[]">
                    		<div class="input-group-addon">按钮链接</div>
                    		<?php  echo tpl_form_field_link("blink[]")?>
                    		
                    	</div>
                    	<div class="input-group">
                    		<div class="input-group-addon">按钮图标</div>
                    		<?php  echo tpl_form_field_icon("bicon[]")?>
                    		<div class="input-group-addon">背景颜色</div>
                    		<?php  echo tpl_form_field_color("bcolor[]")?>
                    	</div>
 					</div>
 				</div>
 			</div>
 			<?php  if(is_array($settings['btns'])) { foreach($settings['btns'] as $b) { ?>
 			<div class="form-group">
                  <label class="col-xs-12 col-sm-3 col-md-2 control-label">扩展按钮</label>
         			<div class="col-sm-9">
                  	<div class="input-group" style="margin-bottom: 5px;">
                  		<div class="input-group-addon">按钮文字</div>
                  		<input class="form-control" type="text" name="btitle[]" value="<?php  echo $b['title'];?>">
                  		<div class="input-group-addon">按钮链接</div>
                  		<?php  echo tpl_form_field_link("blink[]",$b['link'])?>
                  		
                  	</div>
                  	<div class="input-group">
                  		<div class="input-group-addon">按钮图标</div>
                  		<?php  echo tpl_form_field_icon("bicon[]",$b['icon'])?>
                  		<div class="input-group-addon">背景颜色</div>
                  		<?php  echo tpl_form_field_color("bcolor[]",$b['color'])?>
                  	</div>
				</div>
			</div>
 			<?php  } } ?>
 			<div class="form-group">
 				 <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
           			<div class="col-sm-9">
           				<a class="btn btn-warning" onclick="onAdd(this)">添加扩展按钮</a>
           				<div class="help-block">按钮文字为空即可删除</div>
           			</div>
 			</div>
 			</div>
 		</div>
 		<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('news', TEMPLATE_INCLUDEPATH)) : (include template('news', TEMPLATE_INCLUDEPATH));?>     
 		<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('place', TEMPLATE_INCLUDEPATH)) : (include template('place', TEMPLATE_INCLUDEPATH));?>    
 		<div class='panel panel-default'>
            <div class='panel-heading'>粉丝完善资料(设置后，粉丝推送文字内可设置完善信息链接，让粉丝完善信息)</div>
            <div class='panel-body'>
                <div id="model_col" style="display: none;">
                	<div class="form-group">
                		<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
	           			<div class="col-sm-9">
	                    	<div class="input-group" style="margin-bottom: 5px;">
	                    		<div class="input-group-addon">字段名</div>
	                    		<input class="form-control" type="text" name="col_name[]">
	                    		<div class="input-group-addon">字段类型</div>
	                    		<select class="form-control" name="col_type[]">
	                    			<option value="1">文本</option>
	                    			<option value="2">数字</option>
	                    			<option value="3">手机</option>
	                    			<option value="4">文本框</option>
	                    			<option value="5">日期</option>
	                    		</select>
	                    		<div class="input-group-addon"> <input type="checkbox" class="col_must" value="1">必填</div>
	                    	</div>
	 					</div>
	 				</div>
                </div>
                <?php  if(is_array($settings['cols'])) { foreach($settings['cols'] as $k => $b) { ?>
                	<div class="form-group">
                		<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
	           			<div class="col-sm-9">
	                    	<div class="input-group" style="margin-bottom: 5px;">
	                    		<div class="input-group-addon">字段名</div>
	                    		<input class="form-control" type="text" name="col_name[]" value="<?php  echo $b['col_name'];?>">
	                    		<div class="input-group-addon">字段类型</div>
	                    		<select class="form-control" name="col_type[]">
	                    			<option <?php  if($b['col_type']==1) { ?>selected<?php  } ?> value="1">文本</option>
	                    			<option <?php  if($b['col_type']==2) { ?>selected<?php  } ?> value="2">数字</option>
	                    			<option <?php  if($b['col_type']==3) { ?>selected<?php  } ?> value="3">手机</option>
	                    			<option <?php  if($b['col_type']==4) { ?>selected<?php  } ?> value="4">文本框</option>
	                    			<option <?php  if($b['col_type']==5) { ?>selected<?php  } ?> value="5">日期</option>
	                    		</select>
	                    		<div class="input-group-addon"> <input type="checkbox" class="col_must" name="col_must[<?php  echo $k+1?>]" <?php  if($b['col_must']==1) { ?>checked<?php  } ?> value="1">必填</div>
	                    	</div>
	 					</div>
	 				</div>
                <?php  } } ?>
                <div class="form-group">
	 				<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
           			<div class="col-sm-9">
           				<a class="btn btn-warning" onclick="onAdd_Col(this)">添加字段</a>
           				<div class="help-block">字段文字为空即可删除</div>
           			</div>
	 			</div>
 			</div>
 		</div> 
<button type="submit" name="submit" class="btn btn-primary" value="提交">提交</button>
<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
</form>
</div>
<script>
function onAdd(obj){
	$(obj).parent().parent().before($('#model').html());
}
function onAdd_Col(obj){
	$('#model_col').find('input[type=checkbox]').attr('name','col_must['+($(".col_must").length)+']');
	$(obj).parent().parent().before($('#model_col').html());
}
</script>
