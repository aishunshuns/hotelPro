@include('admin/header')
     <div class="page-content"> 
      <div class="page-header"> 
       <h1> 订单列表<small> <i class="icon-double-angle-right"></i></small> </h1> 
      </div>
      <!-- /.page-header --> 
      <div class="row"> 
       <div class="col-xs-12"> 
        <!-- PAGE CONTENT BEGINS --> 
        <div class="row"> 
         <div class="col-xs-12"> 
          <div class="table-responsive"> 
          搜索：<input type="text" id="user_name">
          <select id="hotel_id">
              <option value="">请选择酒店</option>
              <?php foreach ($hotel as $k => $b) {
              echo "<option value='".$b['hotel_id']."'>".$b['hotel_name']."</option>";

              }?>
          </select>
          <select id="house_id">
              <option value="">请选择房型</option>
               <?php foreach ($house as $ke => $a) {
              echo "<option value='".$a['house_id']."'>".$a['house_name']."</option>";

              }?>
          </select>
          <select id="card_status">
              <option value="">选择状态</option>
              <option value="0">未付款</option>
              <option value="1">已付款</option>
          </select>
          <input type="button" onclick="sou()" value="搜索">
          <br/>&nbsp;
          <div id="list">
           <table id="sample-table-1" class="table table-striped table-bordered table-hover"> 
            <thead> 
             <tr> 
              <th class="center"> <label> <input type="checkbox" class="ace" /> <span class="lbl"></span> </label> </th> 
              <th>用户名</th> 
              <th>酒店名称</th> 
              <th>房间类型</th> 
              <th>酒店介绍</th> 
              <th>入住时间</th> 
              <th>离开时间</th> 
              <th>数量</th> 
              <th>总价</th> 
              <th>订单号</th> 
              <th>联系电话</th> 
              <th>订单状态</th> 
              <th>操作</th> 
             </tr> 
            </thead> 
            <tbody> 
            <?php foreach ($users as $key => $v) {
    echo "  <tr> 
              <td class='center'> <label> <input type='checkbox' class='ace' /> <span class='lbl'></span> </label> </td> 
              <td>".$v['user_name']."</td> 
              <td>".$v['hotel_name']."</td> 
              <td>".$v['house_name']."</td> 
              <td>".$v['card_desc']."</td> 
              <td>".$v['start_time']."</td> 
              <td>".$v['end_time']."</td> 
              <td>".$v['card_num']."</td> 
              <td>".$v['card_price']."</td> 
              <td>".$v['card_number']."</td> 
              <td>".$v['card_phone']."</td> 
              <td>";
               if ($v['card_status']==0) {
                  echo "未付款";
                } else if ($v['card_status']==1){
                  echo "已付款但未消费";
                } else{
                  echo  "已消费<a href='cart_xiu?id'></a>";
                }
                
              echo "</td> 
              <td> 
               <div class='visible-md visible-lg hidden-sm hidden-xs btn-group'> 
               
                ";
                  if ($v['card_status']==1) {
                   echo "<a href='cart_xiu?id=".$v['card_id']."'><button class='btn btn-xs btn-info'> <i class='icon-edit bigger-120'></i> </button> </a>";
                  } else {
                   echo "<a href='javascript:void(0)'><button class='btn btn-xs btn-info'> <i class='icon-edit bigger-120'></i> </button> </a>";
                  }
                  
                echo "
                <a href='cart_del?id=".$v['card_id']."'><button class='btn btn-xs btn-danger'> <i class='icon-trash bigger-120'></i> </button> </a>
                 
               </div> 
               <div class='visible-xs visible-sm hidden-md hidden-lg'> 
                <div class='inline position-relative'> 
                 <button class='btn btn-minier btn-primary dropdown-toggle' data-toggle='dropdown'> <i class='icon-cog icon-only bigger-110'></i> </button> 
                 <ul class='dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close'> 
                  //<li> <a href='#' class='tooltip-info' data-rel='tooltip' title='View'> <span class='blue'> <i class='icon-zoom-in bigger-120'></i> </span> </a> </li> 
                  <li> <a href='#' class='tooltip-success' data-rel='tooltip' title='Edit'> <span class='green'> <i class='icon-edit bigger-120'></i> </span> </a> </li> 
                  <li> <a href='#' class='tooltip-error' data-rel='tooltip' title='Delete'> <span class='red'> <i class='icon-trash bigger-120'></i> </span> </a> </li> 
                 </ul> 
                </div> 
               </div> </td> 
             </tr> ";
              } ?>
            </tbody> 
           </table> 
           <?php echo $users->render(); ?>
           </div>
          </div>
          <!-- /.table-responsive --> 
         </div>
         <!-- /span --> 
        </div>
        <script>
        function sou () {
            var arry= new Array(); 
            var user_name=document.getElementById('user_name').value
            var hotel_id=document.getElementById('hotel_id').value
            var house_id=document.getElementById('house_id').value
            var card_status=document.getElementById('card_status').value
            var where="1";
            if (user_name!="") {
                  where= where+" and c.user_name like '%"+user_name+"%'";
            };
            if (hotel_id!="") {
                  where= where+" and d.hotel_id="+hotel_id;
            };
            if (house_id!="") {
                  where= where+" and d.house_id="+house_id;
            };
            if (card_status!="") {
                  where= where+" and d.card_status="+card_status;
            };
            //alert(where)
            var ajax=new XMLHttpRequest()
            ajax.open('get',"cart_sou?where="+where,true)
            ajax.send()
            ajax.onreadystatechange=function () {
                if (ajax.readyState==4&&ajax.status==200) {
                  //alert(ajax.responseText)
                    document.getElementById('list').innerHTML=ajax.responseText;
                };
            }
        }
        </script>
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
   <script src="http://v7.cnzz.com/stat.php?id=155540&amp;web_id=155540" language="JavaScript" charset="gb2312"></script>
  </div>   
 </body>
</html>