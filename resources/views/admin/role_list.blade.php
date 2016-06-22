@include('admin/header')
    


     <div class="page-content"> 
      <div class="page-header"> 
       <h1> 用户列表<small> <i class="icon-double-angle-right"></i></small> </h1> 
      </div>
      <!-- /.page-header --> 
      <div class="row"> 
       <div class="col-xs-12"> 
        <!-- PAGE CONTENT BEGINS --> 
        <div class="row"> 
         <div class="col-xs-12"> 
          <div class="table-responsive"> 
           <table id="sample-table-1" class="table table-striped table-bordered table-hover"> 
            <thead> 
             <tr> 
              <th class="center"> <label> <input type="checkbox" class="ace" /> <span class="lbl"></span> </label> </th> 
              <th>角色名称</th> 
              <th></th> 
             </tr> 
            </thead> 
            <tbody> 
            @foreach($arr as $key => $v)
             <tr id="tr_{{$v['role_id']}}"> 
              <td class="center"> <label> <input type="checkbox" class="ace" /> <span class="lbl"></span> </label> </td> 
              <td> <input type="text" id="input_{{$v['role_id']}}" style="display:none"><span onclick="save({{$v['role_id']}})" id="span_{{$v['role_id']}}">{{$v['role_name']}}</span> </td> 
              <td> 
               <div class="visible-md visible-lg hidden-sm hidden-xs btn-group"> 
                <button class="btn btn-xs btn-info" onclick="showBg({{$v['role_id']}})"> <i class="icon-edit bigger-120"></i> </button> 
                <button class="btn btn-xs btn-danger" onclick="role_del({{$v['role_id']}})"> <i class="icon-trash bigger-120"></i> </button> 
                <button class="btn btn-xs btn-warning"> <i class="icon-flag bigger-120"></i> </button> 
               </div> 
               <div class="visible-xs visible-sm hidden-md hidden-lg"> 
                <div class="inline position-relative"> 
                 <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown"> <i class="icon-cog icon-only bigger-110"></i> </button> 
                
                </div> 
               </div> 
              </td> 
             </tr> 
             @endforeach
            </tbody> 
           </table> 
          </div>
          <!-- /.table-responsive --> 
         </div>

            <!--start 遮罩层 -->
        <!-- <div id="main"><a href="javascript:showBg();">点击这里查看效果</a> -->
        <div id="fullbg"></div>
        <div id="dialog">
        <p class="close"><a href="#" onclick="closeBg();">关闭</a></p>
        <div>
          
          <div class="control-group">
            <label class="control-label bolder blue">Checkbox</label>

            <div class="checkbox">            
            </div>

          <div class="col-md-offset-3">
              <button class="btn btn-info" type="button" onclick = "submit()">
                <i class="icon-ok bigger-110"></i>
                提交
              </button>
          </div>
        </div>
        </div>
        </div>
          <script type="text/javascript">

          function save(id){
            var name = $('#span_'+id).text();
            var input = $('#input_'+id);
            input.show();
            input.focus().val(name);
            $('#span_'+id).hide();
            $('#span_'+id).click(function(){
              return false;
            })
            input.blur(function(){
              var new_name = input.val();
              if ( (new_name != name) && (new_name != '') ) {
                var url = "{{url('admin/role_list')}}";
                var data = {act:'checkSave', name:new_name, id:id}
                $.get(url, data, function(e){
                  if (e == 'false') {
                    alert('改名称已存在');
                    input.hide();
                    $('#span_'+id).show().text(name);
                    input.unbind();
                  } else if (e == 'true') {
                     input.hide();
                     $('#span_'+id).show().text(new_name);
                     input.unbind();
                  }
                })
              } else {
                input.hide();
                $('#span_'+id).show();
              }
            })
          }

          //显示灰色 jQuery 遮罩层
          function showBg(id) {
          var bh = $("body").height();
          var bw = $("body").width();
          $("#fullbg").css({
          height:bh,
          width:bw,
          display:"block"
          });
          $("#dialog").show();
          // var str = '';
          $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "{{url('admin/role_list')}}",
            data: { act : 'role_user_select',id : id},
            
            success: function(data){
              var str = '';
              for(var i in data) {
                if ( data[i]['checked'] == 'true') {
                  var checked = "checked";
                } else {
                  var checked = "";
                }
                str += "<label>";
                str += "<input value='"+data[i]['user_id']+"' type='checkbox' class='ace'  "+checked+"/>";
                str += "<span class='lbl'>"+data[i]['user_name']+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
                str += "</label>";
                if ((i+1)%4 == '0') {
                  str += "<br/>";
                }
              }
              str += "<input type='hidden' name='role_id' value="+data['id']+">";
              $('.checkbox').html(str);
            },
            error: function(xhr, type){
            alert('Ajax error!')
            }
            });
          }

          //获取被选中的复选框的值
          function submit()
          {
            var val = [];
            var id = $('input[name=role_id]').val();
            // alert(id)
            // val = $('.checkbox input[type=checkbox]:checked').val();
            $('.checkbox input[type=checkbox]:checked').each(function()
            {
             val.push($(this).val()); 
            });
            // alert(val)
            var url = "{{url('admin/role_list')}}";
            var data =  {act:'role_user_add',user_id:val,id:id};
            $.get(url,data,function(e){
              if (e == 'true') {
                alert('操作成功')
              }
            });
          }

          //删除角色
          function role_del(id){
            var data = {act:'role_del',id:id};
            var url = "{{url('admin/role_list')}}";
            $.get(url,data,function(e){
              if (e == 'true') {
                $('#tr_'+id).remove();
                alert('删除成功');
              } else {
                if(confirm('改角色不为空，是否删除')){
                  role_del_ok(id)
                }
              }
            });
          }

          //删除角色及角色与用户关联表
          function role_del_ok(id){
            var data = {act:'role_del_ok',id:id};
            var url = "{{url('admin/role_list')}}";
            $.get(url,data,function(e){
              $('#tr_'+id).remove();
              alert('删除成功');
            })
          }

          //关闭灰色 jQuery 遮罩
          function closeBg() {
          $("#fullbg,#dialog").hide();
          }
          </script>
    <!--end 遮罩层 -->

         <!-- /span --> 
        </div>
        <!-- /row --> 
        <div class="hr hr-18 dotted hr-double"></div> 
        <h4 class="pink"> <i class="icon-hand-right icon-animated-hand-pointer blue"></i> <a href="#modal-table" role="button" class="green" data-toggle="modal"> Table Inside a Modal Box </a> </h4> 
        <div class="hr hr-18 dotted hr-double"></div> 
        </td> 
             </tr> 
            </tbody> 
           </table> 
          </div> 
         </div> 
        </div> 
        <div id="modal-table" class="modal fade" tabindex="-1"> 
         <div class="modal-dialog"> 
          <div class="modal-content"> 
           <div class="modal-header no-padding"> 
            <div class="table-header"> 
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <span class="white">&times;</span> </button> Results for &quot;Latest Registered Domains 
            </div> 
           </div> 
           <div class="modal-body no-padding"> 
            <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top"> 
            </table> 
           </div> 
           <div class="modal-footer no-margin-top"> 
            <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal"> <i class="icon-remove"></i> Close </button> 
            <ul class="pagination pull-right no-margin"> 
             <li class="prev disabled"> <a href="#"> <i class="icon-double-angle-left"></i> </a> </li> 
             <li class="active"> <a href="#">1</a> </li> 
             <li> <a href="#">2</a> </li> 
             <li> <a href="#">3</a> </li> 
             <li class="next"> <a href="#"> <i class="icon-double-angle-right"></i> </a> </li> 
            </ul> 
           </div> 
          </div>
          <!-- /.modal-content --> 
         </div>
         <!-- /.modal-dialog --> 
        </div>
        <!-- PAGE CONTENT ENDS --> 
       </div>
       <!-- /.col --> 
      </div>
      <!-- /.row --> 
     </div>
     <!-- /.page-content --> 
    </div>
    <!-- /.main-content --> 
    <div class="ace-settings-container" id="ace-settings-container"> 
     <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn"> 
      <i class="icon-cog bigger-150"></i> 
     </div> 
     <div class="ace-settings-box" id="ace-settings-box"> 
      <div> 
       <div class="pull-left"> 
        <select id="skin-colorpicker" class="hide"> <option data-skin="default" value="#438EB9">#438EB9</option> <option data-skin="skin-1" value="#222A2D">#222A2D</option> <option data-skin="skin-2" value="#C6487E">#C6487E</option> <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option> </select> 
       </div> 
       <span>&nbsp; Choose Skin</span> 
      </div> 
      <div> 
       <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" /> 
       <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label> 
      </div> 
      <div> 
       <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" /> 
       <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label> 
      </div> 
      <div> 
       <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" /> 
       <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label> 
      </div> 
      <div> 
       <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" /> 
       <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label> 
      </div> 
      <div> 
       <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" /> 
       <label class="lbl" for="ace-settings-add-container"> Inside <b>.container</b> </label> 
      </div> 
     </div> 
    </div>
    <!-- /#ace-settings-container --> 
   </div>
   <!-- /.main-container-inner --> 
   <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i class="icon-double-angle-up icon-only bigger-110"></i> </a> 
  </div>
  <!-- /.main-container --> 
  <!-- basic scripts --> 
  <!--[if !IE]> --> 
  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
  <!-- <![endif]--> 
  <!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]--> 
  <!--[if !IE]> --> 
  <script type="text/javascript">
			window.jQuery || document.write("<script src='../assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script> 
  <!-- <![endif]--> 
  <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]--> 
  <script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script> 
  <script src="../assets/js/bootstrap.min.js"></script> 
  <script src="../assets/js/typeahead-bs2.min.js"></script> 
  <!-- page specific plugin scripts --> 
  <script src="../assets/js/jquery.dataTables.min.js"></script> 
  <script src="../assets/js/jquery.dataTables.bootstrap.js"></script> 
  <!-- ace scripts --> 
  <script src="../assets/js/ace-elements.min.js"></script> 
  <script src="../assets/js/ace.min.js"></script> 
  <!-- inline scripts related to this page --> 
  <script type="text/javascript">
			jQuery(function($) {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null, null,
				  { "bSortable": false }
				] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
		</script> 
  <div style="display:none">
  <!-- <script src="http://v7.cnzz.com/stat.php?id=155540&amp;web_id=155540" language="JavaScript" charset="gb2312"></script> -->
  </div>   
 </body>
</html>