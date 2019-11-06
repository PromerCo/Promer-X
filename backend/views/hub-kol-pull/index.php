
<?php
use yii\widgets\LinkPager;
// use yii\base\Object;
use yii\bootstrap\ActiveForm;
use common\utils\CommonFun;
use yii\helpers\Url;

use backend\models\HubKolPull;

$modelLabel = new \backend\models\HubKolPull();
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
                <?php ActiveForm::begin(['id' => 'hub-kol-pull-search-form', 'method'=>'get', 'options' => ['class' => 'form-inline'], 'action'=>Url::toRoute('hub-kol-pull/index')]); ?>

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
              echo '<th onclick="orderby(\'kol_id\', \'desc\')" '.CommonFun::sortClass($orderby, 'kol_id').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('kol_id').'</th>';
              echo '<th onclick="orderby(\'push_id\', \'desc\')" '.CommonFun::sortClass($orderby, 'push_id').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('push_id').'</th>';
              echo '<th onclick="orderby(\'bystander_frequency\', \'desc\')" '.CommonFun::sortClass($orderby, 'bystander_frequency').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('bystander_frequency').'</th>';
              echo '<th onclick="orderby(\'ideas\', \'desc\')" '.CommonFun::sortClass($orderby, 'ideas').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('ideas').'</th>';
              echo '<th onclick="orderby(\'is_enroll\', \'desc\')" '.CommonFun::sortClass($orderby, 'is_enroll').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('is_enroll').'</th>';
              echo '<th onclick="orderby(\'is_collect\', \'desc\')" '.CommonFun::sortClass($orderby, 'is_collect').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('is_collect').'</th>';
              echo '<th onclick="orderby(\'enroll_time\', \'desc\')" '.CommonFun::sortClass($orderby, 'enroll_time').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('enroll_time').'</th>';
              echo '<th onclick="orderby(\'is_success\', \'desc\')" '.CommonFun::sortClass($orderby, 'is_success').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('is_success').'</th>';
              echo '<th onclick="orderby(\'success_time\', \'desc\')" '.CommonFun::sortClass($orderby, 'success_time').' tabindex="0" aria-controls="data_table" rowspan="1" colspan="1" aria-sort="ascending" >'.$modelLabel->getAttributeLabel('success_time').'</th>';
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
                echo '  <td>' . $model->kol_id . '</td>';
                echo '  <td>' . $model->push_id . '</td>';
                echo '  <td>' . $model->bystander_frequency . '</td>';
                echo '  <td>' . $model->ideas . '</td>';
                echo '  <td>' . $model->is_enroll . '</td>';
                echo '  <td>' . $model->is_collect . '</td>';
                echo '  <td>' . $model->enroll_time . '</td>';
                echo '  <td>' . $model->is_success . '</td>';
                echo '  <td>' . $model->success_time . '</td>';
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
                <?php $form = ActiveForm::begin(["id" => "hub-kol-pull-form", "class"=>"form-horizontal", "action"=>Url::toRoute("hub-kol-pull/save")]); ?>

          <input type="hidden" class="form-control" id="id" name="id" />

          <div id="kol_id_div" class="form-group">
              <label for="kol_id" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("kol_id")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="kol_id" name="HubKolPull[kol_id]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="push_id_div" class="form-group">
              <label for="push_id" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("push_id")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="push_id" name="HubKolPull[push_id]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="bystander_frequency_div" class="form-group">
              <label for="bystander_frequency" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("bystander_frequency")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="bystander_frequency" name="HubKolPull[bystander_frequency]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="ideas_div" class="form-group">
              <label for="ideas" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("ideas")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="ideas" name="HubKolPull[ideas]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="is_enroll_div" class="form-group">
              <label for="is_enroll" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("is_enroll")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="is_enroll" name="HubKolPull[is_enroll]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="is_collect_div" class="form-group">
              <label for="is_collect" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("is_collect")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="is_collect" name="HubKolPull[is_collect]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="enroll_time_div" class="form-group">
              <label for="enroll_time" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("enroll_time")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="enroll_time" name="HubKolPull[enroll_time]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="is_success_div" class="form-group">
              <label for="is_success" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("is_success")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="is_success" name="HubKolPull[is_success]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="success_time_div" class="form-group">
              <label for="success_time" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("success_time")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="success_time" name="HubKolPull[success_time]" placeholder="" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="create_date_div" class="form-group">
              <label for="create_date" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("create_date")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="create_date" name="HubKolPull[create_date]" placeholder="必填" />
              </div>
              <div class="clearfix"></div>
          </div>

          <div id="update_time_div" class="form-group">
              <label for="update_time" class="col-sm-2 control-label"><?php echo $modelLabel->getAttributeLabel("update_time")?></label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="update_time" name="HubKolPull[update_time]" placeholder="" />
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
		$('#hub-kol-pull-search-form').submit();
	}
 function viewAction(id){
		initModel(id, 'view', 'fun');
	}

 function initEditSystemModule(data, type){
	if(type == 'create'){
    	        $("#id").val("");
        $("#kol_id").val("");
        $("#push_id").val("");
        $("#bystander_frequency").val("");
        $("#ideas").val("");
        $("#is_enroll").val("");
        $("#is_collect").val("");
        $("#enroll_time").val("");
        $("#is_success").val("");
        $("#success_time").val("");
        $("#create_date").val("");
        $("#update_time").val("");

	}
	else{
    	        $("#id").val(data.id)
        $("#kol_id").val(data.kol_id)
        $("#push_id").val(data.push_id)
        $("#bystander_frequency").val(data.bystander_frequency)
        $("#ideas").val(data.ideas)
        $("#is_enroll").val(data.is_enroll)
        $("#is_collect").val(data.is_collect)
        $("#enroll_time").val(data.enroll_time)
        $("#is_success").val(data.is_success)
        $("#success_time").val(data.success_time)
        $("#create_date").val(data.create_date)
        $("#update_time").val(data.update_time)
	}
	if(type == "view"){
      $("#id").attr({readonly:true,disabled:true});
      $("#kol_id").attr({readonly:true,disabled:true});
      $("#push_id").attr({readonly:true,disabled:true});
      $("#bystander_frequency").attr({readonly:true,disabled:true});
      $("#ideas").attr({readonly:true,disabled:true});
      $("#is_enroll").attr({readonly:true,disabled:true});
      $("#is_collect").attr({readonly:true,disabled:true});
      $("#enroll_time").attr({readonly:true,disabled:true});
      $("#is_success").attr({readonly:true,disabled:true});
      $("#success_time").attr({readonly:true,disabled:true});
      $("#create_date").attr({readonly:true,disabled:true});
      $("#update_time").attr({readonly:true,disabled:true});
	$('#edit_dialog_ok').addClass('hidden');
	}
	else{
      $("#id").attr({readonly:false,disabled:false});
      $("#kol_id").attr({readonly:false,disabled:false});
      $("#push_id").attr({readonly:false,disabled:false});
      $("#bystander_frequency").attr({readonly:false,disabled:false});
      $("#ideas").attr({readonly:false,disabled:false});
      $("#is_enroll").attr({readonly:false,disabled:false});
      $("#is_collect").attr({readonly:false,disabled:false});
      $("#enroll_time").attr({readonly:false,disabled:false});
      $("#is_success").attr({readonly:false,disabled:false});
      $("#success_time").attr({readonly:false,disabled:false});
      $("#create_date").attr({readonly:false,disabled:false});
      $("#update_time").attr({readonly:false,disabled:false});
		$('#edit_dialog_ok').removeClass('hidden');
		}
		$('#edit_dialog').modal('show');
}

function initModel(id, type, fun){

	$.ajax({
		   type: "GET",
		   url: "<?=Url::toRoute('hub-kol-pull/view')?>",
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
				   url: "<?=Url::toRoute('hub-kol-pull/delete')?>",
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
	$('#hub-kol-pull-form').submit();
});

$('#create_btn').click(function (e) {
    e.preventDefault();
    initEditSystemModule({}, 'create');
});

$('#delete_btn').click(function (e) {
    e.preventDefault();
    deleteAction('');
});

$('#hub-kol-pull-form').bind('submit', function(e) {
	e.preventDefault();
	var id = $("#id").val();
	var action = id == "" ? "<?=Url::toRoute('hub-kol-pull/create')?>" : "<?=Url::toRoute('hub-kol-pull/update')?>";
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
