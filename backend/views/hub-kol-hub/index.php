
<?php
use yii\widgets\LinkPager;
use yii\base\Object;
use yii\bootstrap\ActiveForm;
use common\utils\CommonFun;
use yii\helpers\Url;

use backend\models\HubKolHub;

$modelLabel = new \backend\models\HubKolHub();
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
                <?php ActiveForm::begin(['id' => 'hub-kol-hub-search-form', 'method'=>'get', 'options' => ['class' => 'form-inline'], 'action'=>Url::toRoute('hub-kol-hub/index')]); ?>     
                
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
              echo '<th onclick="orderby(\'uid\', \'desc\')" '.CommonFun::sortClass($orderby, 'uid').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('uid').'</th>';
              echo '<th onclick="orderby(\'wechat\', \'desc\')" '.CommonFun::sortClass($orderby, 'wechat').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('wechat').'</th>';
              echo '<th onclick="orderby(\'phone\', \'desc\')" '.CommonFun::sortClass($orderby, 'phone').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('phone').'</th>';
              echo '<th onclick="orderby(\'email\', \'desc\')" '.CommonFun::sortClass($orderby, 'email').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('email').'</th>';
              echo '<th onclick="orderby(\'industry\', \'desc\')" '.CommonFun::sortClass($orderby, 'industry').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('industry').'</th>';
              echo '<th onclick="orderby(\'company\', \'desc\')" '.CommonFun::sortClass($orderby, 'company').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('company').'</th>';
//              echo '<th onclick="orderby(\'city_code\', \'desc\')" '.CommonFun::sortClass($orderby, 'city_code').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('city_code').'</th>';
//              echo '<th onclick="orderby(\'province_code\', \'desc\')" '.CommonFun::sortClass($orderby, 'province_code').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('province_code').'</th>';
              echo '<th onclick="orderby(\'brand\', \'desc\')" '.CommonFun::sortClass($orderby, 'brand').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('brand').'</th>';
              echo '<th onclick="orderby(\'province\', \'desc\')" '.CommonFun::sortClass($orderby, 'province').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('province').'</th>';
              echo '<th onclick="orderby(\'position_code\', \'desc\')" '.CommonFun::sortClass($orderby, 'position_code').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('position_code').'</th>';
              echo '<th onclick="orderby(\'city\', \'desc\')" '.CommonFun::sortClass($orderby, 'city').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('city').'</th>';
              echo '<th onclick="orderby(\'profile\', \'desc\')" '.CommonFun::sortClass($orderby, 'profile').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('profile').'</th>';
              echo '<th onclick="orderby(\'create_date\', \'desc\')" '.CommonFun::sortClass($orderby, 'create_date').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('create_date').'</th>';
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
                echo '  <td>' . $model->uid . '</td>';
                echo '  <td>' . $model->wechat . '</td>';
                echo '  <td>' . $model->phone . '</td>';
                echo '  <td>' . $model->email . '</td>';
                echo '  <td>' . $model->industry . '</td>';
                echo '  <td>' . $model->company . '</td>';
//                echo '  <td>' . $model->city_code . '</td>';
//                echo '  <td>' . $model->province_code . '</td>';
                echo '  <td>' . $model->brand . '</td>';
                echo '  <td>' . $model->province . '</td>';
                echo '  <td>' . $model->position_code . '</td>';
                echo '  <td>' . $model->city . '</td>';
                echo '  <td>' . $model->profile . '</td>';
                echo '  <td>' . $model->create_date . '</td>';
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
                <?php $form = ActiveForm::begin(["id" => "hub-kol-hub-form", "class"=>"form-horizontal", "action"=>Url::toRoute("hub-kol-hub/save")]); ?>                      
                 
          <input type="hidden" class="form-control" id="id" name="id" />

          <div id="uid_div" class="form-group">
              <label for="uid" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("uid")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="uid" name="HubKolHub[uid]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="wechat_div" class="form-group">
              <label for="wechat" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("wechat")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="wechat" name="HubKolHub[wechat]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="phone_div" class="form-group">
              <label for="phone" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("phone")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="phone" name="HubKolHub[phone]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="email_div" class="form-group">
              <label for="email" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("email")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="HubKolHub[email]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="industry_div" class="form-group">
              <label for="industry" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("industry")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="industry" name="HubKolHub[industry]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="company_div" class="form-group">
              <label for="company" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("company")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="company" name="HubKolHub[company]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="city_code_div" class="form-group">
              <label for="city_code" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("city_code")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="city_code" name="HubKolHub[city_code]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="province_code_div" class="form-group">
              <label for="province_code" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("province_code")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="province_code" name="HubKolHub[province_code]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="brand_div" class="form-group">
              <label for="brand" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("brand")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="brand" name="HubKolHub[brand]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="province_div" class="form-group">
              <label for="province" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("province")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="province" name="HubKolHub[province]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="position_code_div" class="form-group">
              <label for="position_code" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("position_code")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="position_code" name="HubKolHub[position_code]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="city_div" class="form-group">
              <label for="city" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("city")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="city" name="HubKolHub[city]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="profile_div" class="form-group">
              <label for="profile" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("profile")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="profile" name="HubKolHub[profile]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="create_date_div" class="form-group">
              <label for="create_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_date")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="create_date" name="HubKolHub[create_date]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="update_time_div" class="form-group">
              <label for="update_time" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_time")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="update_time" name="HubKolHub[update_time]" placeholder="" />
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
		$('#hub-kol-hub-search-form').submit();
	}
 function viewAction(id){
		initModel(id, 'view', 'fun');
	}

 function initEditSystemModule(data, type){
	if(type == 'create'){
    	        $("#id").val("");
        $("#uid").val("");
        $("#wechat").val("");
        $("#phone").val("");
        $("#email").val("");
        $("#industry").val("");
        $("#company").val("");
        $("#city_code").val("");
        $("#province_code").val("");
        $("#brand").val("");
        $("#province").val("");
        $("#position_code").val("");
        $("#city").val("");
        $("#profile").val("");
        $("#create_date").val("");
        $("#update_time").val("");
	
	}
	else{
    	        $("#id").val(data.id)
        $("#uid").val(data.uid)
        $("#wechat").val(data.wechat)
        $("#phone").val(data.phone)
        $("#email").val(data.email)
        $("#industry").val(data.industry)
        $("#company").val(data.company)
        $("#city_code").val(data.city_code)
        $("#province_code").val(data.province_code)
        $("#brand").val(data.brand)
        $("#province").val(data.province)
        $("#position_code").val(data.position_code)
        $("#city").val(data.city)
        $("#profile").val(data.profile)
        $("#create_date").val(data.create_date)
        $("#update_time").val(data.update_time)
	}
	if(type == "view"){
      $("#id").attr({readonly:true,disabled:true});
      $("#uid").attr({readonly:true,disabled:true});
      $("#wechat").attr({readonly:true,disabled:true});
      $("#phone").attr({readonly:true,disabled:true});
      $("#email").attr({readonly:true,disabled:true});
      $("#industry").attr({readonly:true,disabled:true});
      $("#company").attr({readonly:true,disabled:true});
      $("#city_code").attr({readonly:true,disabled:true});
      $("#province_code").attr({readonly:true,disabled:true});
      $("#brand").attr({readonly:true,disabled:true});
      $("#province").attr({readonly:true,disabled:true});
      $("#position_code").attr({readonly:true,disabled:true});
      $("#city").attr({readonly:true,disabled:true});
      $("#profile").attr({readonly:true,disabled:true});
      $("#create_date").attr({readonly:true,disabled:true});
      $("#update_time").attr({readonly:true,disabled:true});
	$('#edit_dialog_ok').addClass('hidden');
	}
	else{
      $("#id").attr({readonly:false,disabled:false});
      $("#uid").attr({readonly:false,disabled:false});
      $("#wechat").attr({readonly:false,disabled:false});
      $("#phone").attr({readonly:false,disabled:false});
      $("#email").attr({readonly:false,disabled:false});
      $("#industry").attr({readonly:false,disabled:false});
      $("#company").attr({readonly:false,disabled:false});
      $("#city_code").attr({readonly:false,disabled:false});
      $("#province_code").attr({readonly:false,disabled:false});
      $("#brand").attr({readonly:false,disabled:false});
      $("#province").attr({readonly:false,disabled:false});
      $("#position_code").attr({readonly:false,disabled:false});
      $("#city").attr({readonly:false,disabled:false});
      $("#profile").attr({readonly:false,disabled:false});
      $("#create_date").attr({readonly:false,disabled:false});
      $("#update_time").attr({readonly:false,disabled:false});
		$('#edit_dialog_ok').removeClass('hidden');
		}
		$('#edit_dialog').modal('show');
}

function initModel(id, type, fun){
	
	$.ajax({
		   type: "GET",
		   url: "<?=Url::toRoute('hub-kol-hub/view')?>",
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
				   url: "<?=Url::toRoute('hub-kol-hub/delete')?>",
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
	$('#hub-kol-hub-form').submit();
});

$('#create_btn').click(function (e) {
    e.preventDefault();
    initEditSystemModule({}, 'create');
});

$('#delete_btn').click(function (e) {
    e.preventDefault();
    deleteAction('');
});

$('#hub-kol-hub-form').bind('submit', function(e) {
	e.preventDefault();
	var id = $("#id").val();
	var action = id == "" ? "<?=Url::toRoute('hub-kol-hub/create')?>" : "<?=Url::toRoute('hub-kol-hub/update')?>";
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