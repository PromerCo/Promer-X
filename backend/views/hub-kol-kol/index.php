
<?php
use yii\widgets\LinkPager;
use yii\base\Object;
use yii\bootstrap\ActiveForm;
use common\utils\CommonFun;
use yii\helpers\Url;

use backend\models\HubKolKol;

$modelLabel = new \backend\models\HubKolKol();
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
                <?php ActiveForm::begin(['id' => 'hub-kol-kol-search-form', 'method'=>'get', 'options' => ['class' => 'form-inline'], 'action'=>Url::toRoute('hub-kol-kol/index')]); ?>     
                
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
              echo '<th onclick="orderby(\'mcn_organization\', \'desc\')" '.CommonFun::sortClass($orderby, 'mcn_organization').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('mcn_organization').'</th>';
              echo '<th onclick="orderby(\'mcn_company\', \'desc\')" '.CommonFun::sortClass($orderby, 'mcn_company').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('mcn_company').'</th>';
              echo '<th onclick="orderby(\'city\', \'desc\')" '.CommonFun::sortClass($orderby, 'city').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('city').'</th>';
//              echo '<th onclick="orderby(\'city_code\', \'desc\')" '.CommonFun::sortClass($orderby, 'city_code').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('city_code').'</th>';
//              echo '<th onclick="orderby(\'province_code\', \'desc\')" '.CommonFun::sortClass($orderby, 'province_code').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('province_code').'</th>';
              echo '<th onclick="orderby(\'province\', \'desc\')" '.CommonFun::sortClass($orderby, 'province').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('province').'</th>';
              echo '<th onclick="orderby(\'platform\', \'desc\')" '.CommonFun::sortClass($orderby, 'platform').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('platform').'</th>';
              echo '<th onclick="orderby(\'tags\', \'desc\')" '.CommonFun::sortClass($orderby, 'tags').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('tags').'</th>';
              echo '<th onclick="orderby(\'account\', \'desc\')" '.CommonFun::sortClass($orderby, 'account').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('account').'</th>';
              echo '<th onclick="orderby(\'follow_level\', \'desc\')" '.CommonFun::sortClass($orderby, 'follow_level').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('follow_level').'</th>';
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
                echo '  <td>' . $model->mcn_organization . '</td>';
                echo '  <td>' . $model->mcn_company . '</td>';
                echo '  <td>' . $model->city . '</td>';
//                echo '  <td>' . $model->city_code . '</td>';
//                echo '  <td>' . $model->province_code . '</td>';
                echo '  <td>' . $model->province . '</td>';
                echo '  <td>' . $model->platform . '</td>';
                echo '  <td>' . $model->tags . '</td>';
                echo '  <td>' . $model->account . '</td>';
                echo '  <td>' . $model->follow_level . '</td>';
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
                <?php $form = ActiveForm::begin(["id" => "hub-kol-kol-form", "class"=>"form-horizontal", "action"=>Url::toRoute("hub-kol-kol/save")]); ?>                      
                 
          <input type="hidden" class="form-control" id="id" name="id" />

          <div id="uid_div" class="form-group">
              <label for="uid" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("uid")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="uid" name="HubKolKol[uid]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="wechat_div" class="form-group">
              <label for="wechat" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("wechat")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="wechat" name="HubKolKol[wechat]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="phone_div" class="form-group">
              <label for="phone" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("phone")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="phone" name="HubKolKol[phone]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="email_div" class="form-group">
              <label for="email" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("email")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="HubKolKol[email]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="mcn_organization_div" class="form-group">
              <label for="mcn_organization" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("mcn_organization")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="mcn_organization" name="HubKolKol[mcn_organization]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="mcn_company_div" class="form-group">
              <label for="mcn_company" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("mcn_company")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="mcn_company" name="HubKolKol[mcn_company]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="city_div" class="form-group">
              <label for="city" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("city")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="city" name="HubKolKol[city]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="city_code_div" class="form-group">
              <label for="city_code" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("city_code")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="city_code" name="HubKolKol[city_code]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="province_code_div" class="form-group">
              <label for="province_code" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("province_code")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="province_code" name="HubKolKol[province_code]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="province_div" class="form-group">
              <label for="province" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("province")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="province" name="HubKolKol[province]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="platform_div" class="form-group">
              <label for="platform" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("platform")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="platform" name="HubKolKol[platform]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="tags_div" class="form-group">
              <label for="tags" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("tags")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="tags" name="HubKolKol[tags]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="account_div" class="form-group">
              <label for="account" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("account")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="account" name="HubKolKol[account]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="follow_level_div" class="form-group">
              <label for="follow_level" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("follow_level")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="follow_level" name="HubKolKol[follow_level]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="profile_div" class="form-group">
              <label for="profile" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("profile")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="profile" name="HubKolKol[profile]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="create_date_div" class="form-group">
              <label for="create_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_date")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="create_date" name="HubKolKol[create_date]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="update_time_div" class="form-group">
              <label for="update_time" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_time")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="update_time" name="HubKolKol[update_time]" placeholder="" />
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
		$('#hub-kol-kol-search-form').submit();
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
        $("#mcn_organization").val("");
        $("#mcn_company").val("");
        $("#city").val("");
        $("#city_code").val("");
        $("#province_code").val("");
        $("#province").val("");
        $("#platform").val("");
        $("#tags").val("");
        $("#account").val("");
        $("#follow_level").val("");
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
        $("#mcn_organization").val(data.mcn_organization)
        $("#mcn_company").val(data.mcn_company)
        $("#city").val(data.city)
        $("#city_code").val(data.city_code)
        $("#province_code").val(data.province_code)
        $("#province").val(data.province)
        $("#platform").val(data.platform)
        $("#tags").val(data.tags)
        $("#account").val(data.account)
        $("#follow_level").val(data.follow_level)
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
      $("#mcn_organization").attr({readonly:true,disabled:true});
      $("#mcn_company").attr({readonly:true,disabled:true});
      $("#city").attr({readonly:true,disabled:true});
      $("#city_code").attr({readonly:true,disabled:true});
      $("#province_code").attr({readonly:true,disabled:true});
      $("#province").attr({readonly:true,disabled:true});
      $("#platform").attr({readonly:true,disabled:true});
      $("#tags").attr({readonly:true,disabled:true});
      $("#account").attr({readonly:true,disabled:true});
      $("#follow_level").attr({readonly:true,disabled:true});
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
      $("#mcn_organization").attr({readonly:false,disabled:false});
      $("#mcn_company").attr({readonly:false,disabled:false});
      $("#city").attr({readonly:false,disabled:false});
      $("#city_code").attr({readonly:false,disabled:false});
      $("#province_code").attr({readonly:false,disabled:false});
      $("#province").attr({readonly:false,disabled:false});
      $("#platform").attr({readonly:false,disabled:false});
      $("#tags").attr({readonly:false,disabled:false});
      $("#account").attr({readonly:false,disabled:false});
      $("#follow_level").attr({readonly:false,disabled:false});
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
		   url: "<?=Url::toRoute('hub-kol-kol/view')?>",
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
				   url: "<?=Url::toRoute('hub-kol-kol/delete')?>",
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
	$('#hub-kol-kol-form').submit();
});

$('#create_btn').click(function (e) {
    e.preventDefault();
    initEditSystemModule({}, 'create');
});

$('#delete_btn').click(function (e) {
    e.preventDefault();
    deleteAction('');
});

$('#hub-kol-kol-form').bind('submit', function(e) {
	e.preventDefault();
	var id = $("#id").val();
	var action = id == "" ? "<?=Url::toRoute('hub-kol-kol/create')?>" : "<?=Url::toRoute('hub-kol-kol/update')?>";
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