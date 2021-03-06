<?php defined('IN_IA') or exit('Access Denied');?><?php  $citys = ($settings['city'])?>
<style>
#areas{
    border: 1px solid green;
    border-radius: 5px;
    padding: 5px;
    margin-top: 5px;
}
.label-city{
	margin-right: 5px;
}
</style>
<div class='panel panel-default'>
            <div class='panel-heading'>区域限制设置</div>
            <div class='panel-body'>
                <div class="form-group">
			        <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 活动地区</label>
			        <div class="col-sm-9 col-xs-12">
			           	<?php  echo tpl_form_field_district('place','')?>
						<div class="help-block">限制区域，只能限制到市级，请谨慎设置 </div>
						<a onclick="addArea()" class="btn btn-primary btn-sm">添加地区</a>
						<div id="areas"><?php  if(is_array($citys)) { foreach($citys as $c) { ?><label class="label label-info label-city"><?php  echo $c;?></label><?php  } } ?></div>
						<div class="help-block">设置地区限制的，请在上面选择好区域后，点击添加地区，市级将会在下列显示，点击即可删除 </div>
						<?php  if(is_array($citys)) { foreach($citys as $c) { ?>
						<input type="hidden" name="citys[]" id="<?php  echo $c;?>" value="<?php  echo $c;?>">
						<?php  } } ?>
				    </div>
				</div> 
                
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 定位方式</label>
                    <div class="col-sm-9 col-xs-12">
                         <label style="margin-left: 20px;"><input type="radio" name="limittype" value="1" checked> IP</label>
                         <label style="margin-left: 20px;"><input type="radio" name="limittype" value="2" <?php  if($settings['limittype'] == 2) { ?>checked<?php  } ?>> GPS</label>
                    </div>
                </div>
                 <div class="form-group">
		            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> IP或GPS定位说明</label>
		
		            <div class="col-sm-9 col-xs-12">
		               	<textarea class="form-control" name="checktips"><?php  echo $settings['checktips'];?></textarea>
						<div class="help-block">为更好地自定义，定位链接请自行填写a标签，其中#链接#为定位链接 ；开启定位后 必填</div>
						<div class="help-block">内容例如： 本活动限XXX地区粉丝参加，<img src="../addons/junsion_promotion/template/images/a.jpg"></div>
		            </div>
		        </div> 
             
		         <div class="form-group">
		            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 不在活动地区提示语</label>
		            <div class="col-sm-9 col-xs-12">
		               	<input name="outtips" class="form-control" value="<?php  if($settings) { ?><?php  echo $settings['outtips'];?><?php  } else { ?>很抱歉，你不能参与活动<?php  } ?>">
						<div class="help-block">注意：#地址#为粉丝定位到的地址</div>
		            </div>
		        </div> 
	</div>
</div>
<script>
function addArea(){
	var city = $('select[name="place[city]"]').val();
	if($('#'+city).length > 0) return;
	$('#areas').append("<label class='label label-info label-city'>"+city+"</label>");
	$('#areas').after('<input type="hidden" name="citys[]" id="'+city+'" value="'+city+'">');
	$('select[name="place[city]"]').val('');
	$('.label-city').click(function(){
		$(this).remove();
		$('#'+$(this).text()).remove();
	});
}

$('.label-city').click(function(){
	$(this).remove();
	$('#'+$(this).text()).remove();
});
</script>