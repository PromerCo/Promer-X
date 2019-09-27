
<?php
use yii\widgets\LinkPager;
use yii\base\Object;
use yii\bootstrap\ActiveForm;
use common\utils\CommonFun;
use yii\helpers\Url;

use backend\models\HubKolPush;

$modelLabel = new \backend\models\HubKolPush();
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
                <?php ActiveForm::begin(['id' => 'hub-kol-push-search-form', 'method'=>'get', 'options' => ['class' => 'form-inline'], 'action'=>Url::toRoute('hub-kol-push/index')]); ?>     
                
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
              echo '<th onclick="orderby(\'hub_id\', \'desc\')" '.CommonFun::sortClass($orderby, 'hub_id').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('hub_id').'</th>';
              echo '<th onclick="orderby(\'uid\', \'desc\')" '.CommonFun::sortClass($orderby, 'uid').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('uid').'</th>';
              echo '<th onclick="orderby(\'title\', \'desc\')" '.CommonFun::sortClass($orderby, 'title').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('title').'</th>';
              echo '<th onclick="orderby(\'budget\', \'desc\')" '.CommonFun::sortClass($orderby, 'budget').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('budget').'</th>';
              echo '<th onclick="orderby(\'platform\', \'desc\')" '.CommonFun::sortClass($orderby, 'platform').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('platform').'</th>';
              echo '<th onclick="orderby(\'tags\', \'desc\')" '.CommonFun::sortClass($orderby, 'tags').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('tags').'</th>';
              echo '<th onclick="orderby(\'follow_level\', \'desc\')" '.CommonFun::sortClass($orderby, 'follow_level').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('follow_level').'</th>';
              echo '<th onclick="orderby(\'describe\', \'desc\')" '.CommonFun::sortClass($orderby, 'describe').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('describe').'</th>';
              echo '<th onclick="orderby(\'type\', \'desc\')" '.CommonFun::sortClass($orderby, 'type').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('type').'</th>';
              echo '<th onclick="orderby(\'convene\', \'desc\')" '.CommonFun::sortClass($orderby, 'convene').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('convene').'</th>';
//              echo '<th onclick="orderby(\'bystander\', \'desc\')" '.CommonFun::sortClass($orderby, 'bystander').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('bystander').'</th>';
              echo '<th onclick="orderby(\'bystander_number\', \'desc\')" '.CommonFun::sortClass($orderby, 'bystander_number').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('bystander_number').'</th>';
//              echo '<th onclick="orderby(\'enroll\', \'desc\')" '.CommonFun::sortClass($orderby, 'enroll').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('enroll').'</th>';
              echo '<th onclick="orderby(\'enroll_number\', \'desc\')" '.CommonFun::sortClass($orderby, 'enroll_number').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('enroll_number').'</th>';
              echo '<th onclick="orderby(\'expire_time\', \'desc\')" '.CommonFun::sortClass($orderby, 'expire_time').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('expire_time').'</th>';
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
                echo '  <td>' . $model->hub_id . '</td>';
                echo '  <td>' . $model->uid . '</td>';
                echo '  <td>' . $model->title . '</td>';
                echo '  <td>' . $model->budget . '</td>';
                echo '  <td>' . $model->platform . '</td>';
                echo '  <td>' . $model->tags . '</td>';
                echo '  <td>' . $model->follow_level . '</td>';
                echo '  <td>' . $model->describe . '</td>';
                echo '  <td>' . $model->type . '</td>';
                echo '  <td>' . $model->convene . '</td>';
//                echo '  <td>' . $model->bystander . '</td>';
                echo '  <td>' . $model->bystander_number . '</td>';
//                echo '  <td>' . $model->enroll . '</td>';
                echo '  <td>' . $model->enroll_number . '</td>';
                echo '  <td>' . $model->expire_time . '</td>';
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
                <?php $form = ActiveForm::begin(["id" => "hub-kol-push-form", "class"=>"form-horizontal", "action"=>Url::toRoute("hub-kol-push/save")]); ?>                      
                 
          <input type="hidden" class="form-control" id="id" name="id" />

          <div id="hub_id_div" class="form-group">
              <label for="hub_id" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("hub_id")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="hub_id" name="HubKolPush[hub_id]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="uid_div" class="form-group">
              <label for="uid" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("uid")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="uid" name="HubKolPush[uid]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="title_div" class="form-group">
              <label for="title" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("title")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="HubKolPush[title]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="budget_div" class="form-group">
              <label for="budget" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("budget")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="budget" name="HubKolPush[budget]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="platform_div" class="form-group">
              <label for="platform" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("platform")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="platform" name="HubKolPush[platform]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="tags_div" class="form-group">
              <label for="tags" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("tags")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="tags" name="HubKolPush[tags]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="follow_level_div" class="form-group">
              <label for="follow_level" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("follow_level")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="follow_level" name="HubKolPush[follow_level]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="describe_div" class="form-group">
              <label for="describe" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("describe")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="describe" name="HubKolPush[describe]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="type_div" class="form-group">
              <label for="type" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("type")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="type" name="HubKolPush[type]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="convene_div" class="form-group">
              <label for="convene" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("convene")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="convene" name="HubKolPush[convene]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="bystander_div" class="form-group">
              <label for="bystander" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("bystander")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="bystander" name="HubKolPush[bystander]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="bystander_number_div" class="form-group">
              <label for="bystander_number" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("bystander_number")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="bystander_number" name="HubKolPush[bystander_number]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="enroll_div" class="form-group">
              <label for="enroll" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("enroll")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="enroll" name="HubKolPush[enroll]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="enroll_number_div" class="form-group">
              <label for="enroll_number" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("enroll_number")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="enroll_number" name="HubKolPush[enroll_number]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="expire_time_div" class="form-group">
              <label for="expire_time" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("expire_time")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="expire_time" name="HubKolPush[expire_time]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="create_date_div" class="form-group">
              <label for="create_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_date")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="create_date" name="HubKolPush[create_date]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="update_time_div" class="form-group">
              <label for="update_time" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_time")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="update_time" name="HubKolPush[update_time]" placeholder="" />
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
		$('#hub-kol-push-search-form').submit();
	}
 function viewAction(id){
		initModel(id, 'view', 'fun');
	}

 function initEditSystemModule(data, type){
	if(type == 'create'){
    	        $("#id").val("");
        $("#hub_id").val("");
        $("#uid").val("");
        $("#title").val("");
        $("#budget").val("");
        $("#platform").val("");
        $("#tags").val("");
        $("#follow_level").val("");
        $("#describe").val("");
        $("#type").val("");
        $("#convene").val("");
        $("#bystander").val("");
        $("#bystander_number").val("");
        $("#enroll").val("");
        $("#enroll_number").val("");
        $("#expire_time").val("");
        $("#create_date").val("");
        $("#update_time").val("");
	
	}
	else{
    	        $("#id").val(data.id)
        $("#hub_id").val(data.hub_id)
        $("#uid").val(data.uid)
        $("#title").val(data.title)
        $("#budget").val(data.budget)
        $("#platform").val(data.platform)
        $("#tags").val(data.tags)
        $("#follow_level").val(data.follow_level)
        $("#describe").val(data.describe)
        $("#type").val(data.type)
        $("#convene").val(data.convene)
        $("#bystander").val(data.bystander)
        $("#bystander_number").val(data.bystander_number)
        $("#enroll").val(data.enroll)
        $("#enroll_number").val(data.enroll_number)
        $("#expire_time").val(data.expire_time)
        $("#create_date").val(data.create_date)
        $("#update_time").val(data.update_time)
	}
	if(type == "view"){
      $("#id").attr({readonly:true,disabled:true});
      $("#hub_id").attr({readonly:true,disabled:true});
      $("#uid").attr({readonly:true,disabled:true});
      $("#title").attr({readonly:true,disabled:true});
      $("#budget").attr({readonly:true,disabled:true});
      $("#platform").attr({readonly:true,disabled:true});
      $("#tags").attr({readonly:true,disabled:true});
      $("#follow_level").attr({readonly:true,disabled:true});
      $("#describe").attr({readonly:true,disabled:true});
      $("#type").attr({readonly:true,disabled:true});
      $("#convene").attr({readonly:true,disabled:true});
      $("#bystander").attr({readonly:true,disabled:true});
      $("#bystander_number").attr({readonly:true,disabled:true});
      $("#enroll").attr({readonly:true,disabled:true});
      $("#enroll_number").attr({readonly:true,disabled:true});
      $("#expire_time").attr({readonly:true,disabled:true});
      $("#create_date").attr({readonly:true,disabled:true});
      $("#update_time").attr({readonly:true,disabled:true});
	$('#edit_dialog_ok').addClass('hidden');
	}
	else{
      $("#id").attr({readonly:false,disabled:false});
      $("#hub_id").attr({readonly:false,disabled:false});
      $("#uid").attr({readonly:false,disabled:false});
      $("#title").attr({readonly:false,disabled:false});
      $("#budget").attr({readonly:false,disabled:false});
      $("#platform").attr({readonly:false,disabled:false});
      $("#tags").attr({readonly:false,disabled:false});
      $("#follow_level").attr({readonly:false,disabled:false});
      $("#describe").attr({readonly:false,disabled:false});
      $("#type").attr({readonly:false,disabled:false});
      $("#convene").attr({readonly:false,disabled:false});
      $("#bystander").attr({readonly:false,disabled:false});
      $("#bystander_number").attr({readonly:false,disabled:false});
      $("#enroll").attr({readonly:false,disabled:false});
      $("#enroll_number").attr({readonly:false,disabled:false});
      $("#expire_time").attr({readonly:false,disabled:false});
      $("#create_date").attr({readonly:false,disabled:false});
      $("#update_time").attr({readonly:false,disabled:false});
		$('#edit_dialog_ok').removeClass('hidden');
		}
		$('#edit_dialog').modal('show');
}

function initModel(id, type, fun){
	
	$.ajax({
		   type: "GET",
		   url: "<?=Url::toRoute('hub-kol-push/view')?>",
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
				   url: "<?=Url::toRoute('hub-kol-push/delete')?>",
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
	$('#hub-kol-push-form').submit();
});

$('#create_btn').click(function (e) {
    e.preventDefault();
    initEditSystemModule({}, 'create');
});

$('#delete_btn').click(function (e) {
    e.preventDefault();
    deleteAction('');
});

$('#hub-kol-push-form').bind('submit', function(e) {
	e.preventDefault();
	var id = $("#id").val();
	var action = id == "" ? "<?=Url::toRoute('hub-kol-push/create')?>" : "<?=Url::toRoute('hub-kol-push/update')?>";
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