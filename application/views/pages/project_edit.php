<!--Start Container-->
<div id="main" class="container-fluid" style="background-color:#FBFBF0">
	<div class="row">
		<!--<div class="col-xs-12 col-sm-12" style="background-color:#ffffff; height:30px;background-color:#FBFBF0;"></div>-->
		<div class="col-xs-12" style="margin-top:30px;padding-left:24px">
			<span style="font-size:16pt;color:#446BAB;/*#4DB849*/" class="glyphicon glyphicon-leaf"></span>&nbsp;
			<span style="font-size:21pt;color:#446BAB/*#*/;font-family:微軟正黑體"><?php echo $project_basic_info['idea_name'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!--<input id="check_box" style="cursor: pointer;color:green;width: 20px;height: 20px;margin-top:2px" type="checkbox" onclick="return check_project_data('<?php echo $project_basic_info['id']?>')" <?php if($project_basic_info['is_checked'] == 1){echo " checked";}?>/>&nbsp;<?php if($project_basic_info['is_checked'] == 1){echo '<label id="check_hint_message" for="check_box" style="color:blue;cursor:default;font-size:16pt;font-family:微軟正黑體">已確認(由 '.$checked_user['surname'].$checked_user['given_names'].' 於 '.$project_basic_info['checked_time'].' 確認)</label>';} else if($project_basic_info['is_checked'] == 2){ echo '<label id="check_hint_message" for="check_box" style="color:red;cursor: pointer;font-size:16pt;font-family:微軟正黑體">尚未確認</label>';}?><input id="is_checked" type="hidden" value="<?php echo $project_basic_info['is_checked'];?>"></input>-->
		</div>	
	</div>
	<?php
	/*當專案被鎖住，顯示提示訊息*/
	if($project_basic_info['is_blocked'] == 1 && $project_basic_info['current_user'] != $username)
	{
		echo "<div class='row'><div class='col-xs-12' style='text-align:center;font-size:12pt;color:blue;font-weight:normal;font-family: 新細明體'>使用者 ".$project_basic_info['current_user']." 正在編輯此專案</div></div>";
	}		
	//echo validation_errors();
	$attributes = array('class' => 'form-horizontal', 'role'=>'form', 'id' => 'project_create_form', 'name'=>'project_create_form');
	echo form_open('project_edit/'. $project_basic_info['id'], $attributes);
	?>		
	<div class="form-group">	
		<div class="col-xs-12">
			<div class="fotorama" align="center" data-nav="thumbs" data-width="40%" data-height="30%" data-allowfullscreen="true">
			<?php
			for ($i=0;$i<count($project_img);$i++)
			{
			?>
				<img class="thumbnail" src="<?php echo site_url()."application/assets/data_img/".$project_img[$i]['name'];?>" alt="示意圖<?php echo $i;?>">
			<?php
			}			
			?>
			</div>
		</div>
	</div>
	<!--<div class="form-group">
		<input readonly type="hidden" value="<?php echo $project_basic_info['idea_id']?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" id="idea_id" name="idea_id" class="form-control" placeholder="創意提案編號" data-toggle="tooltip" data-placement="bottom" title="創意提案編號" style="font-size:17px; font-family:微軟正黑體;">  
	</div>-->
	<div class="form-group">
		<label class="col-sm-1 col-sm-offset-1 control-label form_label">情境說明</label>
		<div class="col-sm-9">
			<p class="form-control-static form_content"><?php echo $project_basic_info['scenario_d'];?></p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-1 col-sm-offset-1 control-label form_label">功能構想</label>
		<div class="col-sm-9">
			<p class="form-control-static form_content"><?php if($project_basic_info['function_d']!=null){echo $project_basic_info['function_d'];}else{echo "無";}?></p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-1 col-sm-offset-1 control-label form_label">差異化</label>
		<div class="col-sm-9">
			<p class="form-control-static form_content"><?php if($project_basic_info['distinction_d']!=null){echo $project_basic_info['distinction_d'];}else{echo "無";}?></p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-1 col-sm-offset-1 control-label form_label">價值性</label>
		<div class="col-sm-10">
			<p class="form-control-static form_content"><?php if($project_basic_info['value_d']!=null){echo $project_basic_info['value_d'];}else{echo "無";}?></p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-1 col-sm-offset-1 control-label form_label">可行性</label>
		<div class="col-sm-10">
			<p class="form-control-static form_content"><?php if($project_basic_info['feasibility_d']!=null){echo $project_basic_info['feasibility_d'];}else{echo "無";}?></p>
		</div>
	</div>
	<div class="form-group">
		<div style="margin-left:15px;width:98%;height:1px;background-color:#cccccc;text-align:center;">
			<span style="font-family: 微軟正黑體;font-weight: bold;;font-size:17px;background-color: #FBFBF0; position: relative; top: -0.5em;cursor:pointer" onclick="show_project_detail()">
				&nbsp;<img id="project_detail_icon" src="<?php echo $img_location;?>/sort-asc.png"></img>詳細資料&nbsp;
			</span>
		</div>
	</div>
	<div id="project_detail" style="display:none">
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label form_label">年度</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['year']!=null){echo $project_basic_info['year'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label form_label">提案編號</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['idea_id']!=null){echo $project_basic_info['idea_id'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label form_label">提案來源</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['idea_source']!=null){echo $project_basic_info['idea_source'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label form_label">階段狀態</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['stage']!=null){echo $project_basic_info['stage'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label form_label">進度說明</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['stage']!=null){echo $project_basic_info['progress_description'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label form_label">I階段文件檢核</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['Idea'] != null){echo "審核通過";} else {echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label form_label">R階段文件檢核</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['Requirement'] != null){echo "審核通過";} else {echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label form_label">F階段文件檢核</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['Feasibility'] != null){echo "審核通過";} else {echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label form_label">P階段文件檢核</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['Prototype'] != null){echo "審核通過";} else {echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label form_label">提案單位</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['proposed_unit']!=null){echo $project_basic_info['proposed_unit'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label form_label">提案人</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['proposer']!=null){echo $project_basic_info['proposer'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label form_label">創意中心窗口</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['PM_in_charge']!=null){echo $project_basic_info['PM_in_charge'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label form_label">提案審核履歷</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['idea_examination']!=null){echo $project_basic_info['idea_examination'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label form_label">敗部復活申請</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['resurrection_application_qualified']!=null){echo $project_basic_info['resurrection_application_qualified'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label form_label">具備敗部復活申請資格</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['resurrection_applied']!=null){echo $project_basic_info['resurrection_applied'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label form_label">立案日期</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['established_date']!=null){echo $project_basic_info['established_date'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label form_label">導入車型/先期式樣</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['adoption']!=null){echo $project_basic_info['adoption'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label form_label">專利申請/取得</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['applied_patent']!=null){echo $project_basic_info['applied_patent'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label form_label">結案</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['closed_case']!=null){echo $project_basic_info['closed_case'];}else{echo "無";}?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label form_label">備註</label>
			<div class="col-sm-9">
				<p class="form-control-static form_content"><?php if($project_basic_info['note']!=null){echo $project_basic_info['note'];}else{echo "無";}?></p>
			</div>
		</div>
	</div>	
	<!--Start:附加檔案區塊-->
	<div class="form-group">
		<div class="col-sm-12">
			<span width="30px" height="30px" style="color:green;font-size:12pt;margin-left:10px" class="glyphicon glyphicon-paperclip"></span>
			<!--<img style="font-family:微軟正黑體;margin-left:15px;padding-bottom:3px" width="30px" height="30px" src="<?php echo $img_location;?>/attach_file2.png"></img>--><span style="font-family:微軟正黑體;font-weight:bold;font-size:20px;">&nbsp;附加檔案&nbsp;</span>
		</div>
	</div>			
		<?php			
		if($project_file_category)
		{
		?>
			<div style="font-family: 微軟正黑體;font-size:17px;background-color: #FBFBF0; position: relative; top: -0.5em;cursor:pointer;padding-left:15px" onclick="show_file_detail('file_detail0','file_detail_icon0', '', 'filelist0')">
				&nbsp;<img id="file_detail_icon0" src="<?php echo $img_location;?>/sort-asc.png"></img>檔案總覽&nbsp;
				<!--&nbsp;<img id="file_detail_icon0" width="35px" height="35px" src="<?php echo $img_location;?>/folder5.png"></img>&nbsp;檔案總覽&nbsp;-->
			</div>
			<div id="file_detail0" style="display:none;margin-left:15px;width:98%">
				<div id="file_list" class="statusbar" style="width:98%;margin-left:15px;padding-bottom:10px">
					<span class="filename" style="text-align:center;width:68%">檔案名稱</span>
					<span align="center" style="padding-left:200px;text-align:center;width:10%">上傳時間</span>
				</div>
				<div id="filelist0"></div>
				<br/>
			</div>
		<?php
			$i=1;			
			foreach($project_file_category as $category)
			{
				if ($category['dir'] == '/') 
				{
					continue;
				}
				?>
				<div style="font-family: 微軟正黑體;font-size:17px;background-color: #FBFBF0; position: relative; top: -0.5em;cursor:pointer;padding-left:15px" onclick="show_file_detail('<?php echo "file_detail" . $i;?>','<?php echo "file_detail_icon" . $i;?>', '<?php echo $category['dir'];?>', '<?php echo "filelist" . $i;?>')">
					&nbsp;<img id="file_detail_icon<?php echo $i;?>" src="<?php echo $img_location;?>/sort-asc.png"></img><?php echo rtrim($category['dir'], "/");?>&nbsp;
					<!--&nbsp;<img id="file_detail_icon<?php echo $i;?>" width="35px" height="35px" src="<?php echo $img_location;?>/folder5.png"></img>&nbsp;<?php echo rtrim($category['dir'], "/");?>&nbsp;-->
				</div>
				<div id="file_detail<?php echo $i;?>" style="display:none;margin-left:15px;width:98%">
					<div id="file_list" class="statusbar" style="width:98%;margin-left:15px;padding-bottom:10px">
						<span class="filename" style="text-align:center;width:68%">檔案名稱</span>
						<span align="center" style="padding-left:200px;text-align:center;width:10%">上傳時間</span>
					</div>
					<div id="filelist<?php echo $i;?>"></div>
					<br>
				</div>
				<?php
				$i++;
			}			
		}
		if($project_basic_info['is_checked'] == 2)
		{
		?>
		<input id="file_input" style="display:none" onchange="browse_upload()" type="file" name="my_file[]" multiple>
		<div  id="dragandrophandler" style="margin-left:15px;font-family:微軟正黑體;<?php if($project_basic_info['is_blocked'] == 1 && $project_basic_info['is_blocked'] != $username){echo "display:none";}?>">請拖曳檔案到此(<a href="#" id="browse_file" onclick="browse_file()">瀏覽</a>檔案)</div>
		<?php
		}
		?>
		<!--End:附加檔案區塊-->
		<div id="status1"></div>
		<input type="hidden" id="file_count" name="file_count" value="0"></input> <!--計算上傳的檔案數量-->
		<input type="hidden" id="file_number" name="file_number" value="0"></input> <!--計算上傳的檔案編號-->
		<input type="hidden" id="file_success_upload_count" name="file_success_upload_count" value="0"></input> <!--計算上傳成功的檔案數量-->
		<input type="hidden" id="delete_file_count" name="delete_file_count" value="0"></input> <!--原本上傳之檔案被刪除的數量-->
		<input type="hidden" id="upload_file_dir" name="upload_file_dir"></input> <!--伺服器暫存使用者上傳檔案的資料夾-->
		<input type="hidden" id="current_user" name="current_user" value="<?php echo $project_basic_info['current_user'];?>"></input> <!--目前正在編輯的使用者-->
		<input type="hidden" id="login_user" name="login_user" value="<?php echo $username;?>"></input> <!--使用者(自己)-->
		<input type="hidden" id="idea_id" name="idea_id" value="<?php echo $project_basic_info['idea_id']?>">
		<?php
		if($project_basic_info['is_checked'] == 2)
		{
		?>
		<div id="submit_btn_block" class="btn btn-primary qq-upload-button" style="width: auto;align:center;<?php if($project_basic_info['is_blocked'] == 1 && $project_basic_info['current_user'] != $username) { echo "display:none";}?>">
			<div type="submit" id="submit_btn" style="font-family: 微軟正黑體; font-size:17px;"><i class="fa fa-check-circle-o"></i>確認送出</div>
		</div>
		<?php
		}
		?>
		</form>		
		<!--End Content-->
	<!--</ddiv>End Row-->
	<br/>	
	<!--檔案預覽-->
	<div id="preview_pdf" class="preview_pdf">
	<object id="pdf_obj" data="" type="application/pdf" width="95%" height="95%">
		<p>Alternative text - include a link <a href="#">to the PDF!</a></p>
	</object>
	</div>
	<div id="background_mask" class="background_mask" onclick="close_file_preview(this.id)"></div>
</div>
<script>
var user_id = '<?php echo $user_id;?>';
/**
開啟pdf檔案預覽功能
*/
function preview_file(file_path, trigger_element_id)
{	
	document.getElementById("pdf_obj").data = file_path;	
	document.getElementById("background_mask").style.display = "block";
	document.getElementById("preview_pdf").style.display = "block";
	user_behavior_log(trigger_element_id, file_path);
}
/**
關閉pdf檔案預覽功能
*/
function close_file_preview(clicked_element_id)
{
	document.getElementById("preview_pdf").style.display="none";
	document.getElementById("background_mask").style.display="none";
	user_behavior_log(clicked_element_id, null);
}
/**
瀏覽附加檔案
*/
function show_file_detail(file_detail_id, file_detail_icon_id, dir, list_id)
{
	user_behavior_log(file_detail_icon_id);
	var file_detail = document.getElementById(file_detail_id);
	if(file_detail.style.display == "block")
	{
		$("#" + file_detail_id).slideUp(400);	
		document.getElementById(file_detail_icon_id).src="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/application/assets/img/sort-asc.png";  //folder5.png
	}
	else if(file_detail.style.display == "none")
	{		
		$("#" + file_detail_id).slideDown(400);
		file_detail.style.display = "block";
		document.getElementById(file_detail_icon_id).src="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/application/assets/img/sort-desc.png";  // folder2.png
	}
	var request_url = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/project/file_category_detail";
	$.ajax({
		url:request_url,
		data:{
			dir_name:dir,
			id:<?php echo $project_basic_info['id'];?>
		},
		type:"POST",
		dataType:"json",
		async:false,
		success:function(str)
		{
			var n;
			var files_string = '';
			for(n = 0;n < str.number;n++)
			{
				var preview_file_path='http://' + '<?php echo $_SERVER['SERVER_ADDR'];?>' +'/project_management/application/assets/project_attachment/' + '<?php echo $project_basic_info['id'];?>' + '_convert/' + str.list[n].convert_to_pdf;
				var download_file_path='http://' + '<?php echo $_SERVER['SERVER_ADDR'];?>' + '/project_management/application/assets/project_attachment/'+ '<?php echo $project_basic_info['id'];?>' + '/' + str.list[n].instance_file_name;
				if(str.list[n].instance_file_name.split(".")[1]=='pdf')
				{
					var preview_file_path='http://' + '<?php echo $_SERVER['SERVER_ADDR'];?>' +'/project_management/application/assets/project_attachment/' + '<?php echo $project_basic_info['id'];?>' + '/' + str.list[n].convert_to_pdf;;
				}
				files_string = files_string + 
					'<div id="origin_file_' + n + '" class="statusbar" style="width:98%;margin-left:15px;">'+
					'<div class="file_preview"><img id="preview_file_icon_' + str.list[n].id + '" style="width:26px;height:24px;cursor:pointer" src="<?php echo $img_location;?>/preview.png" alt="preview" onclick="preview_file(' + "'" + preview_file_path + "'" +', this.id)"></img></div>' +
					'<div class="file_download"><a href="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/application/assets/project_attachment/<?php echo $project_basic_info['id']?>/' + str.list[n].instance_file_name + '" download="' + str.list[n].file_name + '"><img id="download_file_icon_'+ str.list[n].id +'" style="width:26px;height:24px;cursor:pointer" src="<?php echo $img_location;?>/download.png" alt="download" onclick="user_behavior_log(this.id, ' + "'" + download_file_path + "'" + ')"></img></a></div>' +
					'<div class="filename" style="width:70%">' + str.list[n].file_name + '</div>'+
					'<span style="margin-left:75px;width:20%">' + str.list[n].create_time + '</span>'+
					'</div>';
					//'<div class="filesize" style="padding-left:30px;width:150px"></div>' +
					//'<div class="progressBar" style="margin-left:10px;width:200px;background-color:#0BA1B5"><div style="padding-left:160px;text-align:right">100%</div></div>'+
			}
			document.getElementById(list_id).innerHTML = files_string;
		}
	});
}
function show_project_detail()
{
	user_behavior_log('project_detail_icon');
	var project_detail = document.getElementById("project_detail");
	if(project_detail.style.display == "block")
	{
		$("#project_detail").slideUp(500);	
		document.getElementById("project_detail_icon").src="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/application/assets/img/sort-asc.png";
	}
	else if(project_detail.style.display == "none")
	{		
		$("#project_detail").slideDown(500);
		project_detail.style.display = "block";
		document.getElementById("project_detail_icon").src="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/application/assets/img/sort-desc.png";
	}
	
}

//If the files are dropped outside the div, file is opened in the browser window. To avoid that we can prevent ‘drop’ event on document.
$(document).ready(function()
{		
	function project_set_unblocked()
	{	
		var request_url = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/project_set_unblocked";
		$.ajax({
			url:request_url,  
			data:{			 
				id:<?php echo $project_basic_info['id'];?>
			},
			type:"POST",		
			dataType:"text", //回傳的資料型態
			success:function(str){
			},
			async:false,
			error:function(xhr, status, errorThrown){
				//alert("Sorry, there was a problem!");
				console.log("Error: " + errorThrown);
				console.log("Status: " + status);
				console.dir( xhr );
			},
			complete:function( xhr, status ){
				//alert("確定要跳出編輯頁面嗎?");
			}
		});					
	}	
	
	$(window).on('beforeunload', function(){		
		var current_user = document.getElementById("current_user").value;
		var login_user = document.getElementById("login_user").value;
		if(current_user == login_user || current_user == "")  /*唯有當自己跳出編輯頁面，才解鎖*/
		{
			project_set_unblocked();		  
		}			
	});
	
	var upload_file_dir = Date.now().toString()+user_id;
	document.getElementById("upload_file_dir").value = upload_file_dir;
	var obj = $("#dragandrophandler");
	$("#submit_btn").click(function () {  //按下資料送出的處理函數sub_button
		user_behavior_log(this.id, null);	
		document.getElementById("project_create_form").submit();
    });
	/**
	使用者點選瀏覽檔案「Browse」按鈕上傳檔案
	*/	
	var browse_file = $("#browse_file");
	var file_input = $("#file_input");	
	browse_file.on('click', function (e)  //設定當拖曳檔案進來時,對應的處理函數
	{
		e.stopPropagation();
		e.preventDefault();		
		user_behavior_log(this.id, null);
		$("#file_input").trigger('click');
	}); 
	
	file_input.on('change', function (e)  //設定當瀏覽並選擇檔案時,對應的處理函數
	{
		// fileInput is an HTML input element: <input type="file" id="myfileinput" multiple>
		var fileInput = document.getElementById("file_input");
		// files is a FileList object (similar to NodeList)
		var files = fileInput.files;
		//handle_file_upload_from_browse(files, file_list, upload_file_dir);
		handle_file_upload_from_browse(files, obj, upload_file_dir);
	});
	
	obj.on('dragenter', function (e)  //設定當拖曳檔案進來時,對應的處理函數
	{
		e.stopPropagation();
		e.preventDefault();
		$(this).css('border', '2px solid #0B85A1');
	});  
	obj.on('dragover', function (e) 
	{
		e.stopPropagation();
		e.preventDefault();
	});
	
	obj.on('drop', function (e) 
	{
 
		$(this).css('border', '2px dotted #0B85A1');
		e.preventDefault();
		//var files = e.originalEvent.dataTransfer.files;  //取得drop的檔案
		var items = e.originalEvent.dataTransfer.items;  //取得drop的檔案
		user_behavior_log(this.id, null);	  //temp_comment
		//handleFileUpload(files, file_list, upload_file_dir);
		
		for (var i = 0; i < items.length; i++)  //處理使用者一次拖曳的一個或多個檔案
		{			
			var entry = items[i].webkitGetAsEntry();
			if (entry) {
				handleFileUpload(entry, null, obj, upload_file_dir);
			}		
		}
		//handleFileUpload2(items, file_list, upload_file_dir);
	});
	$(document).on('dragenter', function (e) 
	{
		e.stopPropagation();
		e.preventDefault();
	});
	$(document).on('dragover', function (e) 
	{
		e.stopPropagation();
		e.preventDefault();
		obj.css('border', '2px dotted #0B85A1');
	});
	$(document).on('drop', function (e) 
	{
		e.stopPropagation();
		e.preventDefault();
	});		
});

var delete_file_id = 0;  //記錄刪除的檔案數量
function delete_file(id)
{
	//在表單中記錄要刪除的檔案編號
	var input_file = document.createElement("input");
	input_file.setAttribute("type", "hidden");
	input_file.setAttribute("id", "delete_file_"+delete_file_id);
	input_file.setAttribute("name", "delete_file_"+delete_file_id);
	input_file.setAttribute("value", document.getElementById("file_id_"+id).value);
	document.getElementById("project_create_form").appendChild(input_file);	
	delete_file_id++;
	document.getElementById("origin_file_"+id).style.display = "none";	
	document.getElementById("delete_file_count").value = parseInt(document.getElementById("delete_file_count").value) + 1;	
}

//1.Read the file contents using HTML5 FormData() when the files are dropped.
var fd = new FormData('project_create_form');

function handle_file_upload_from_browse(files, obj, upload_file_dir)  //第一個參數為拖曳的檔案; 第二個參數為拖曳檔案放置的方框區塊物件
{
	for (var i = 0; i < files.length; i++)  //處理使用者一次拖曳的一個或多個檔案
	{	
		fd.append('file', files[i]);
		fd.append('upload_file_dir', upload_file_dir);
		//在表單中記錄上傳的檔案名稱
		var input_file = document.createElement("input");		
		var file_ext_name = files[i].name.split('.').pop();		
		var temp_file_name = Date.now().toString()+rowCount.toString()+user_id.toString()+'.'+file_ext_name;
		input_file.setAttribute("type", "hidden");
		input_file.setAttribute("id", "upload_file_"+rowCount);
		input_file.setAttribute("name", "upload_file_"+rowCount);
		input_file.setAttribute("value", files[i].name);//files[i].name		
		document.getElementById("project_create_form").appendChild(input_file);			
		var input_file3 = document.createElement("input");  //儲存暫存檔名
		input_file3.setAttribute("type", "hidden");
		input_file3.setAttribute("id", "instance_file_name_"+rowCount);
		input_file3.setAttribute("name", "instance_file_name_"+rowCount);			
		input_file3.setAttribute("value", temp_file_name);		//file.name	
		document.getElementById("project_create_form").appendChild(input_file3);		
		fd.append('temp_file_name', temp_file_name);
		//在表單中記錄上傳的檔案所在的資料夾
		var input_file2 = document.createElement("input");
		input_file2.setAttribute("type", "hidden");
		input_file2.setAttribute("id", "folder_"+rowCount);
		input_file2.setAttribute("name", "folder_"+rowCount);
		input_file2.setAttribute("value", '/');
		document.getElementById("project_create_form").appendChild(input_file2);
		var status = new createStatusbar(obj);  //Using this we can set progress.
        status.setFileInfo(files[i].name, '', files[i].size, files[i].type);
        sendFileToServer(fd, status);
	}
}

function handleFileUpload(item, path, obj, upload_file_dir)  //第一個參數為拖曳的檔案; 第二個參數為拖曳檔案放置的方框區塊物件
{		
	path = path || "";
	if (item.isFile) 
	{
		//Get file
		item.file(function(file) {			
			fd.append('file', file);
			fd.append('upload_file_dir', upload_file_dir);
			//在表單中記錄上傳的檔案名稱			
			var input_file1 = document.createElement("input");
			var file_ext_name = file.name.split('.').pop();
			var temp_file_name = Date.now().toString()+rowCount.toString()+user_id.toString()+'.'+file_ext_name;
			input_file1.setAttribute("type", "hidden");
			input_file1.setAttribute("id", "upload_file_"+rowCount);
			input_file1.setAttribute("name", "upload_file_"+rowCount);
			input_file1.setAttribute("value", file.name);		//file.name	
			document.getElementById("project_create_form").appendChild(input_file1);
			var input_file3 = document.createElement("input");  //儲存暫存檔名
			input_file3.setAttribute("type", "hidden");
			input_file3.setAttribute("id", "instance_file_name_"+rowCount);
			input_file3.setAttribute("name", "instance_file_name_"+rowCount);			
			input_file3.setAttribute("value", temp_file_name);		//file.name	
			document.getElementById("project_create_form").appendChild(input_file3);
			fd.append('temp_file_name', temp_file_name);
			//在表單中記錄上傳的檔案所在的資料夾
			var input_file2 = document.createElement("input");
			input_file2.setAttribute("type", "hidden");
			input_file2.setAttribute("id", "folder_"+rowCount);
			input_file2.setAttribute("name", "folder_"+rowCount);
			if(path == "")
			{
				input_file2.setAttribute("value", '/');
			}
			else
			{
				input_file2.setAttribute("value", path); //path.substring('/', path.length - 1)
			}
			document.getElementById("project_create_form").appendChild(input_file2);			
			var status = new createStatusbar(obj);  //set progress bar.
			status.setFileInfo(file.name, path, file.size, file.type);
			sendFileToServer(fd, status);
		});		
	}
	else if (item.isDirectory) 
	{
		// Get folder contents
		var dirReader = item.createReader();						
		var entries = [];		
		var readEntries = function() {
			dirReader.readEntries(function(results) {
				if (!results.length) 
				{					
					for (var i=0; i<entries.length; i++) 
					{						
						handleFileUpload(entries[i], path + item.name + "/", obj, upload_file_dir);
					}
				} 
				else 
				{					
					entries = entries.concat(results);
					readEntries();
				}			
			});	
		};
		readEntries();		
	}
}

//2.Using this we can set progress.
var rowCount=0;
function createStatusbar(obj)
{	
	if(rowCount == 0)
	{
		this.statusbar = $("<div id='upload_list_title' style='width:98%;margin-left:15px;font-size:15px;font-family:微軟正黑體;max-height:70px;min-height:40px;padding-top:10px'></div>");  //產生附加檔案欄位標題
		//將檔案資訊呈現所需的空間依依加進狀態列中(由左至右依序為：檔案名稱、檔案大小、檔案進度條、「abort」按鈕)
		this.filename = $("<div class='filename' style='text-align:center;float:left;width:30%'>檔案名稱</div>").appendTo(this.statusbar);
		this.folder = $("<div style='text-align:center;float:left;width:22%'>資料夾</div>").appendTo(this.statusbar);
		this.size = $("<div style='float:left;text-align:center;width:9%'>檔案大小</div>").appendTo(this.statusbar);
		this.progressBar = $("<div style='text-align:center;float:left;width:18%'><div>上傳進度</div></div>").appendTo(this.statusbar);
		this.create_time = $("<div style='text-align:center;float:left;width:10%'>上傳時間</div>").appendTo(this.statusbar);
		this.delete = $("<div style='width:10%;float:left'></div>").appendTo(this.statusbar);
		obj.after(this.statusbar);
	}
	var file_count = document.getElementById("file_count").value;
	document.getElementById("file_count").value = parseInt(file_count)+1;
	var file_number = document.getElementById("file_number").value;
	document.getElementById("file_number").value = parseInt(file_number)+1;
    rowCount++;
	//判斷為偶數列或奇數列, 並給予對應的呈現樣式
    var row = "odd";
    if(rowCount % 2 == 0) row = "even";
	this.statusbar = $("<div class='statusbar "+row+"' style='width:98%;margin-left:15px;padding-left:0px'></div>");  //先產生一個狀態列(row)
	/*將檔案資訊呈現所需的空間依依加進狀態列中(由左至右依序為：檔案名稱、檔案大小、檔案進度條、「abort」按鈕)*/
	this.filename = $("<div class='filename' style=';float:left;width:30%;margin-left:2%'></div>").appendTo(this.statusbar);
	this.folder = $("<div style='float:left;min-width:20%;width:20%;margin-left:1%'></div>").appendTo(this.statusbar);
    this.size = $("<div class='filesize' style='float:left;text-align:center;width:10%;margin-left:1%'></div>").appendTo(this.statusbar);
    this.progressBar = $("<div class='progressBar' style='float:left;width:15%;margin-left:1%'><div></div></div>").appendTo(this.statusbar);
    this.create_time = $("<div style='float:left;min-width:11%;width:11%;margin-left:1%'></div>").appendTo(this.statusbar);
	/*this.abort = $("<div id='"+(rowCount-1)+"' class='abort' style='margin-left:102px'>Delete</div>").appendTo(this.statusbar);*/
	this.abort = $("<div id='"+(rowCount-1)+"' class='abort' style='margin-left:1%'>Delete</div>").appendTo(this.statusbar);
	this.is_send = $("<div id='is_send_"+(rowCount-1)+"' style='display:none'>false</div>").appendTo(this.statusbar);
	this.file_number = $("<div style='display:none'>"+(rowCount-1)+"</div>").appendTo(this.statusbar);
	$("#upload_list_title").after(this.statusbar);
	//在status區塊中顯示上傳檔案的檔名和大小	
    this.setFileInfo = function(name, folder, size, type)
    {
        var sizeStr = "";
        var sizeKB = size/1024;
        if(parseInt(sizeKB) > 1024)
        {
            var sizeMB = sizeKB/1024;
            sizeStr = sizeMB.toFixed(2)+" MB";
        }
        else
        {
            sizeStr = sizeKB.toFixed(2)+" KB";
        }
		this.create_time.html('--');  //指定filename區塊的呈現內容
        this.filename.html(name);  //指定filename區塊的呈現內容
		if(folder == "")  //指定folder區塊的呈現內容
		{			
			this.folder.html('--');  
        }
		else
		{
			this.folder.html(folder.substring('/', folder.length - 1));
		}
		this.size.html(sizeStr);  //指定size區塊的呈現內容
    }
    this.setProgress = function(progress)
    {       		
        var progressBarWidth = progress * this.progressBar.width() / 100;  
        this.progressBar.find('div').animate({ width: progressBarWidth }, 10).html(progress + "% ");
        /*if(parseInt(progress) >= 100)  //After the file uploaded successfully, the abort button would be disappeared 
        {
            this.abort.hide();
        }*/		
		if(parseInt(progress) == 100)
		{				
			this.is_send.html("true");  //標示此檔案已上傳完成
			var a = (new Date(new Date())).toUTCString();
			var date = new Date(Date.parse(a));
			var formatted = formatDate(date);
			this.create_time.html(formatted);
		}	
    }
    this.setAbort = function(jqxhr)
    {
        var sb = this.statusbar;
        this.abort.click(function()
        {		
			var is_send = document.getElementById("is_send_"+this.id).innerHTML;			
			jqxhr.abort();			
			sb.hide();	
			var element = document.getElementById("is_send_"+this.id);
			element.parentNode.removeChild(element);
			var delete_file = document.getElementById( "upload_file_"+this.id );  //要被刪除的檔案
			delete_file.parentNode.removeChild( delete_file );	
			document.getElementById("file_count").value = parseInt(document.getElementById("file_count").value)-1;  //檔案數減一
			if(has_sent == true && document.getElementById("file_count").value == 0)
			{
				document.getElementById("dragandrophandler").style.borderColor = "red";
			}
		});
    }
}
//3.Send FormData() to Server using jQuery AJAX API
function sendFileToServer(formData, status)
{		
	var uploadURL = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/project_file_upload";
    var extraData ={};
    var jqXHR=$.ajax({
        xhr: function() {
			var xhrobj = $.ajaxSettings.xhr();
			if (xhrobj.upload) 
			{
				xhrobj.upload.addEventListener('progress', function(event) {
					var percent = 0;
					var position = event.loaded || event.position;
					var total = event.total;
					if (event.lengthComputable) {
						percent = Math.ceil(position / total * 100);
					}					
					//Set progress					
					status.setProgress(percent);	
					
				}, false);
			}
			return xhrobj;
		},
		url: uploadURL, 
		type: "POST",
		async:true,
		contentType:false,
		processData: false,
        cache: false,
        data: formData,
        success: function(data){
			//status.setProgress(100);
            //$("#status1").append("File upload Done<br>"); 						
        }
    });
    status.setAbort(jqXHR);
}

function list_project()
{	
	location.href = 'project_list';	
}

//Formats d to MM/dd/yyyy HH:mm:ss format
function formatDate(d){
  function addZero(n){
     return n < 10 ? '0' + n : '' + n;
  }

    return d.getFullYear()+"-"+ addZero(d.getMonth()+1) + "-" + addZero(d.getDate()) + " " + 
           addZero(d.getHours()) + ":" + addZero(d.getMinutes()) + ":" + addZero(d.getMinutes());
}
</script>
