
<?php
use yii\widgets\LinkPager;
use yii\base\Object;
use yii\bootstrap\ActiveForm;
use common\utils\CommonFun;
use yii\helpers\Url;

use backend\models\WechatUser;

$modelLabel = new \backend\models\WechatUser();
?>

<?php $this->beginBlock('header');  ?>
<!-- <head></head>中代码块 -->
<?php $this->endBlock(); ?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
      
        <div class="box-header">
          <h3 class="box-title">数据列表</h3>
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <button id="create_btn" type="button" class="btn btn-xs btn-primary">添&nbsp;&emsp;加</button>
        			|
        		<button id="delete_btn" type="button" class="btn btn-xs btn-danger">批量删除</button>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        
        <div class="box-body">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
            <!-- row start search-->
          	<div class="row">
          	<div class="col-sm-12">
                <?php ActiveForm::begin(['id' => 'wechat-user-search-form', 'method'=>'get', 'options' => ['class' => 'form-inline'], 'action'=>Url::toRoute('wechat-user/index')]); ?>     
                
                  <div class="form-group" style="margin: 5px;">
                      <label><?=$modelLabel->getAttributeLabel('id')?>:</label>
                      <input type="text" class="form-control" id="query[id]" name="query[id]"  value="<?=isset($query["id"]) ? $query["id"] : "" ?>">
                  </div>
              <div class="form-group">
              	<a onclick="searchAction()" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>搜索</a>
           	  </div>
               <?php ActiveForm::end(); ?> 
            </div>
          	</div>
          	<!-- row end search -->
          	
          	<!-- row start -->
          	<div class="row">
          	<div class="col-sm-12">
          	<table id="data_table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="data_table_info">
            <thead class="text-nowrap">
            <tr role="row">
            
            <?php 
              $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : '';
		      echo '<th><input id="data_table_check" type="checkbox"></th>';
              echo '<th onclick="orderby(\'id\', \'desc\')" '.CommonFun::sortClass($orderby, 'id').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('id').'</th>';
//              echo '<th onclick="orderby(\'union_id\', \'desc\')" '.CommonFun::sortClass($orderby, 'union_id').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('union_id').'</th>';
//              echo '<th onclick="orderby(\'open_id\', \'desc\')" '.CommonFun::sortClass($orderby, 'open_id').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('open_id').'</th>';
              echo '<th onclick="orderby(\'nick_name\', \'desc\')" '.CommonFun::sortClass($orderby, 'nick_name').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('nick_name').'</th>';
              echo '<th onclick="orderby(\'avatar_url\', \'desc\')" '.CommonFun::sortClass($orderby, 'avatar_url').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('avatar_url').'</th>';
              echo '<th onclick="orderby(\'gender\', \'desc\')" '.CommonFun::sortClass($orderby, 'gender').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('gender').'</th>';
              echo '<th onclick="orderby(\'province\', \'desc\')" '.CommonFun::sortClass($orderby, 'province').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('province').'</th>';
              echo '<th onclick="orderby(\'city\', \'desc\')" '.CommonFun::sortClass($orderby, 'city').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('city').'</th>';
              echo '<th onclick="orderby(\'country\', \'desc\')" '.CommonFun::sortClass($orderby, 'country').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('country').'</th>';
              echo '<th onclick="orderby(\'language\', \'desc\')" '.CommonFun::sortClass($orderby, 'language').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('language').'</th>';
//              echo '<th onclick="orderby(\'country_code\', \'desc\')" '.CommonFun::sortClass($orderby, 'country_code').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('country_code').'</th>';
              echo '<th onclick="orderby(\'phone_number\', \'desc\')" '.CommonFun::sortClass($orderby, 'phone_number').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('phone_number').'</th>';
              echo '<th onclick="orderby(\'capacity\', \'desc\')" '.CommonFun::sortClass($orderby, 'capacity').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('capacity').'</th>';
              echo '<th onclick="orderby(\'pure_phone_number\', \'desc\')" '.CommonFun::sortClass($orderby, 'pure_phone_number').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('pure_phone_number').'</th>';
              echo '<th onclick="orderby(\'create_time\', \'desc\')" '.CommonFun::sortClass($orderby, 'create_time').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('create_time').'</th>';
              echo '<th onclick="orderby(\'update_time\', \'desc\')" '.CommonFun::sortClass($orderby, 'update_time').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('update_time').'</th>';
         
			?>
	
            <th tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >操作</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
            foreach ($models as $model) {
                echo '<tr id="rowid_' . $model->id . '">';
                echo '  <td><label><input type="checkbox" value="' . $model->id . '"></label></td>';
                echo '  <td>' . $model->id . '</td>';
//                echo '  <td>' . $model->union_id . '</td>';
//                echo '  <td>' . $model->open_id . '</td>';
                echo '  <td>' . $model->nick_name . '</td>';
                echo '  <td><img style="width:60px;height:60px;" src="' . $model->avatar_url . '"/></td>';
                echo '  <td>';
                if ($model->gender==1) {echo '男';}else{echo '女';};
                echo '</td>';
                echo '  <td>' . $model->province . '</td>';
                echo '  <td>' . $model->city . '</td>';
                echo '  <td>' . $model->country . '</td>';
                echo '  <td>' . $model->language . '</td>';
//                echo '  <td>' . $model->country_code . '</td>';
                echo '  <td>' . $model->phone_number . '</td>';
                echo '  <td>';
                if ($model->capacity==1) {echo 'Hub';}else{echo 'KOL';};
                echo '</td>';
//                echo '  <td>' . $model->capacity . '</td>';

                echo '  <td>' . $model->pure_phone_number . '</td>';
                echo '  <td>' . $model->create_time . '</td>';
                echo '  <td>' . $model->update_time . '</td>';
                echo '  <td class="center">';
                echo '      <a id="view_btn" onclick="viewAction(' . $model->id . ')" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-zoom-in icon-white"></i>查看</a>';
                echo '      <a id="edit_btn" onclick="editAction(' . $model->id . ')" class="btn btn-primary btn-sm" href="#"> <i class="glyphicon glyphicon-edit icon-white"></i>修改</a>';
                echo '      <a id="delete_btn" onclick="deleteAction(' . $model->id . ')" class="btn btn-danger btn-sm" href="#"> <i class="glyphicon glyphicon-trash icon-white"></i>删除</a>';
                echo '  </td>';
                echo '</tr>';
            }
            
            ?>
            
           
           
            </tbody>
            <!-- <tfoot></tfoot> -->
          </table>
          </div>
          </div>
          <!-- row end -->
          
          <!-- row start -->
          <div class="row">
          	<div class="col-sm-5">
            	<div class="dataTables_info" id="data_table_info" role="status" aria-live="polite">
            		<div class="infos">
            		从<?= $pages->getPage() * $pages->getPageSize() + 1 ?>            		到 <?= ($pageCount = ($pages->getPage() + 1) * $pages->getPageSize()) < $pages->totalCount ?  $pageCount : $pages->totalCount?>            		 共 <?= $pages->totalCount?> 条记录</div>
            	</div>
            </div>
          	<div class="col-sm-7">
              	<div class="dataTables_paginate paging_simple_numbers" id="data_table_paginate">
              	<?= LinkPager::widget([
              	    'pagination' => $pages,
              	    'nextPageLabel' => '»',
              	    'prevPageLabel' => '«',
              	    'firstPageLabel' => '首页',
              	    'lastPageLabel' => '尾页',
              	]); ?>	
              	
              	</div>
          	</div>
		  </div>
		  <!-- row end -->
        </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<div class="modal fade" id="edit_dialog" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
                <?php $form = ActiveForm::begin(["id" => "wechat-user-form", "class"=>"form-horizontal", "action"=>Url::toRoute("wechat-user/save")]); ?>                      
                 
          <input type="hidden" class="form-control" id="id" name="id" />

          <div id="union_id_div" class="form-group">
              <label for="union_id" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("union_id")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="union_id" name="WechatUser[union_id]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="open_id_div" class="form-group">
              <label for="open_id" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("open_id")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="open_id" name="WechatUser[open_id]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="nick_name_div" class="form-group">
              <label for="nick_name" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("nick_name")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="nick_name" name="WechatUser[nick_name]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="avatar_url_div" class="form-group">
              <label for="avatar_url" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("avatar_url")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="avatar_url" name="WechatUser[avatar_url]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="gender_div" class="form-group">
              <label for="gender" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("gender")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="gender" name="WechatUser[gender]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="province_div" class="form-group">
              <label for="province" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("province")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="province" name="WechatUser[province]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="city_div" class="form-group">
              <label for="city" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("city")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="city" name="WechatUser[city]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="country_div" class="form-group">
              <label for="country" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("country")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="country" name="WechatUser[country]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="language_div" class="form-group">
              <label for="language" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("language")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="language" name="WechatUser[language]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="country_code_div" class="form-group">
              <label for="country_code" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("country_code")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="country_code" name="WechatUser[country_code]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="phone_number_div" class="form-group">
              <label for="phone_number" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("phone_number")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="phone_number" name="WechatUser[phone_number]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="capacity_div" class="form-group">
              <label for="capacity" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("capacity")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="capacity" name="WechatUser[capacity]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="pure_phone_number_div" class="form-group">
              <label for="pure_phone_number" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("pure_phone_number")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="pure_phone_number" name="WechatUser[pure_phone_number]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="create_time_div" class="form-group">
              <label for="create_time" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_time")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="create_time" name="WechatUser[create_time]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="update_time_div" class="form-group">
              <label for="update_time" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_time")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="update_time" name="WechatUser[update_time]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>
                    

			<?php ActiveForm::end(); ?>          
                </div>
			<div class="modal-footer">
				<a href="#" class="btn btn-default" data-dismiss="modal">关闭</a> <a
					id="edit_dialog_ok" href="#" class="btn btn-primary">确定</a>
			</div>
		</div>
	</div>
</div>
<?php $this->beginBlock('footer');  ?>
<!-- <body></body>后代码块 -->
 <script>
function orderby(field, op){
	 var url = window.location.search;
	 var optemp = field + " desc";
	 if(url.indexOf('orderby') != -1){
		 url = url.replace(/orderby=([^&?]*)/ig,  function($0, $1){ 
			 var optemp = field + " desc";
			 optemp = decodeURI($1) != optemp ? optemp : field + " asc";
			 return "orderby=" + optemp;
		   }); 
	 }
	 else{
		 if(url.indexOf('?') != -1){
			 url = url + "&orderby=" + encodeURI(optemp);
		 }
		 else{
			 url = url + "?orderby=" + encodeURI(optemp);
		 }
	 }
	 window.location.href=url; 
 }
 function searchAction(){
		$('#wechat-user-search-form').submit();
	}
 function viewAction(id){
		initModel(id, 'view', 'fun');
	}

 function initEditSystemModule(data, type){
	if(type == 'create'){
    	        $("#id").val("");
        $("#union_id").val("");
        $("#open_id").val("");
        $("#nick_name").val("");
        $("#avatar_url").val("");
        $("#gender").val("");
        $("#province").val("");
        $("#city").val("");
        $("#country").val("");
        $("#language").val("");
        $("#country_code").val("");
        $("#phone_number").val("");
        $("#capacity").val("");
        $("#pure_phone_number").val("");
        $("#create_time").val("");
        $("#update_time").val("");
	
	}
	else{
    	        $("#id").val(data.id)
        $("#union_id").val(data.union_id)
        $("#open_id").val(data.open_id)
        $("#nick_name").val(data.nick_name)
        $("#avatar_url").val(data.avatar_url)
        $("#gender").val(data.gender)
        $("#province").val(data.province)
        $("#city").val(data.city)
        $("#country").val(data.country)
        $("#language").val(data.language)
        $("#country_code").val(data.country_code)
        $("#phone_number").val(data.phone_number)
        $("#capacity").val(data.capacity)
        $("#pure_phone_number").val(data.pure_phone_number)
        $("#create_time").val(data.create_time)
        $("#update_time").val(data.update_time)
	}
	if(type == "view"){
      $("#id").attr({readonly:true,disabled:true});
      $("#union_id").attr({readonly:true,disabled:true});
      $("#open_id").attr({readonly:true,disabled:true});
      $("#nick_name").attr({readonly:true,disabled:true});
      $("#avatar_url").attr({readonly:true,disabled:true});
      $("#gender").attr({readonly:true,disabled:true});
      $("#province").attr({readonly:true,disabled:true});
      $("#city").attr({readonly:true,disabled:true});
      $("#country").attr({readonly:true,disabled:true});
      $("#language").attr({readonly:true,disabled:true});
      $("#country_code").attr({readonly:true,disabled:true});
      $("#phone_number").attr({readonly:true,disabled:true});
      $("#capacity").attr({readonly:true,disabled:true});
      $("#pure_phone_number").attr({readonly:true,disabled:true});
      $("#create_time").attr({readonly:true,disabled:true});
      $("#update_time").attr({readonly:true,disabled:true});
	$('#edit_dialog_ok').addClass('hidden');
	}
	else{
      $("#id").attr({readonly:false,disabled:false});
      $("#union_id").attr({readonly:false,disabled:false});
      $("#open_id").attr({readonly:false,disabled:false});
      $("#nick_name").attr({readonly:false,disabled:false});
      $("#avatar_url").attr({readonly:false,disabled:false});
      $("#gender").attr({readonly:false,disabled:false});
      $("#province").attr({readonly:false,disabled:false});
      $("#city").attr({readonly:false,disabled:false});
      $("#country").attr({readonly:false,disabled:false});
      $("#language").attr({readonly:false,disabled:false});
      $("#country_code").attr({readonly:false,disabled:false});
      $("#phone_number").attr({readonly:false,disabled:false});
      $("#capacity").attr({readonly:false,disabled:false});
      $("#pure_phone_number").attr({readonly:false,disabled:false});
      $("#create_time").attr({readonly:false,disabled:false});
      $("#update_time").attr({readonly:false,disabled:false});
		$('#edit_dialog_ok').removeClass('hidden');
		}
		$('#edit_dialog').modal('show');
}

function initModel(id, type, fun){
	
	$.ajax({
		   type: "GET",
		   url: "<?=Url::toRoute('wechat-user/view')?>",
		   data: {"id":id},
		   cache: false,
		   dataType:"json",
		   error: function (xmlHttpRequest, textStatus, errorThrown) {
			    alert("出错了，" + textStatus);
			},
		   success: function(data){
			   initEditSystemModule(data, type);

			   ////////////////////////////////////////
   		   }
		});
}
	
function editAction(id){
	initModel(id, 'edit');
}

function deleteAction(id){
	var ids = [];
	if(!!id == true){
		ids[0] = id;
	}
	else{
		var checkboxs = $('#data_table :checked');
	    if(checkboxs.size() > 0){
	        var c = 0;
	        for(i = 0; i < checkboxs.size(); i++){
	            var id = checkboxs.eq(i).val();
	            if(id != ""){
	            	ids[c++] = id;
	            }
	        }
	    }
	}
	if(ids.length > 0){
		admin_tool.confirm('请确认是否删除', function(){
		    $.ajax({
				   type: "GET",
				   url: "<?=Url::toRoute('wechat-user/delete')?>",
				   data: {"ids":ids},
				   cache: false,
				   dataType:"json",
				   error: function (xmlHttpRequest, textStatus, errorThrown) {
					    admin_tool.alert('msg_info', '出错了，' + textStatus, 'warning');
					},
				   success: function(data){
					   for(i = 0; i < ids.length; i++){
						   $('#rowid_' + ids[i]).remove();
					   }
					   admin_tool.alert('msg_info', '删除成功', 'success');
					   window.location.reload();
				   }
				});
		});
	}
	else{
		admin_tool.alert('msg_info', '请先选择要删除的数据', 'warning');
	}
    
}

function getSelectedIdValues(formId)
{
	var value="";
	$( formId + " :checked").each(function(i)
	{
		if(!this.checked)
		{
			return true;
		}
		value += this.value;
		if(i != $("input[name='id']").size()-1)
		{
			value += ",";
		}
	 });
	return value;
}

$('#edit_dialog_ok').click(function (e) {
    e.preventDefault();
	$('#wechat-user-form').submit();
});

$('#create_btn').click(function (e) {
    e.preventDefault();
    initEditSystemModule({}, 'create');
});

$('#delete_btn').click(function (e) {
    e.preventDefault();
    deleteAction('');
});

$('#wechat-user-form').bind('submit', function(e) {
	e.preventDefault();
	var id = $("#id").val();
	var action = id == "" ? "<?=Url::toRoute('wechat-user/create')?>" : "<?=Url::toRoute('wechat-user/update')?>";
    $(this).ajaxSubmit({
    	type: "post",
    	dataType:"json",
    	url: action,
    	success: function(value) 
    	{
        	if(value.errno == 0){
        		$('#edit_dialog').modal('hide');
        		admin_tool.alert('msg_info', '添加成功', 'success');
        		window.location.reload();
        	}
        	else{
            	var json = value.data;
        		for(var key in json){
        			$('#' + key).attr({'data-placement':'bottom', 'data-content':json[key], 'data-toggle':'popover'}).addClass('popover-show').popover('show');
        			
        		}
        	}

    	}
    });
});

</script>
<?php $this->endBlock(); ?>