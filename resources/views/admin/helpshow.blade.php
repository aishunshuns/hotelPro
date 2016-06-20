@include('admin/header')
<div class="page-content"> 
      <div class="page-header"> 
       <h1 style="float:left;padding:10px"> 帮助列表<small> <i class="icon-double-angle-right"></i></small> </h1> 
       <h1 style="float:right;padding:10px"> <a href="{{URL('admin/help')}}">帮助添加<small> <i class="icon-double-angle-right"></i></small></a></h1> 
 </div>
 <script type="text/javascript" src="../jedate/jedate.js"></script> 
 <script type="text/javascript" src="../jquery.js"></script> 
      <!-- /.page-header --> 
      <div class="row"> 
       <div class="col-xs-12"> 
        <!-- PAGE CONTENT BEGINS --> 
        <div class="row"> 
         <div class="col-xs-12"> 
         <div style="padding:10px;"><input type="text" id="search" placeholder="操作描述" >&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" id="hotel_name" placeholder="酒店名称" >
        <button  id="button" class="btn btn-primary btn-sm">搜索</button>

        <script>
          $('#button').click(function(){
            var search = $('#search').val();
            var hotel_name = $('#hotel_name').val();
            /*$.get("{{URL('admin/helpSearch')}}",{search:search,hotel_name:hotel_name},function(obj){
              $('#div1').html(obj)*/
              location.href="{{URL('admin/helpSearch')}}?search="+search+"&hotel_name"+hotel_name;
              //alert(obj)
            //})
          })
        </script>
         </div>
          <div class="table-responsive" > 
           <table id="sample-table-1" class="table table-striped table-bordered table-hover" > 
               <thead> 
                <tr> 
                    <th class="center"> <label> <input type="checkbox" class="ace" /> <span class="lbl"></span> </label> </th> 
                     <th class="center">酒店名称</th> 
                    <th class="center">操作描述</th> 
                    <th class="center"> 操作图片 </th>                    
                    <th class="center">操作</th> 
                </tr> 
            </thead> 
            <?php foreach ($arr['arr']  as $v) {  ?>         
                  <tr> 
                    <td class="center"> <label> <input type="checkbox" class="ace" /> <span class="lbl"></span> </label> </td> 
                    <td class="hidden-480"> {{$v['hotel_name']}} </td> 
                    <td class="center"><span onclick="butt(this)" >{{$v['help_desc']}}</span>
                          <input type="text" id="{{$v['help_id']}}" style="display:none" onblur="but(this)" value="{{$v['help_desc']}}">
                    </td> 
                    <td class="center"><img src="../{{$v['help_img']}}" width="80"></td> 
                    <td class="center"> 
                     <div class="visible-md visible-lg hidden-sm hidden-xs btn-group"> 
                      <button class="btn btn-xs btn-success" > <i class="icon-ok bigger-120"></i> </button> 
                      <a class="btn btn-xs btn-info" href="helpUpdate?id={{$v['help_id']}}"> <i class="icon-edit bigger-120"></i> </a> 
                      <a class="btn btn-xs btn-danger" href="helpDel?id={{$v['help_id']}}"> <i class="icon-trash bigger-120"></i> </a> 
                      <a class="btn btn-xs btn-warning" href=""> <i class="icon-flag bigger-120"></i> </a> 
                     </div> 
                   </td> 
                  </tr> 
             <?php  }?>
           </table>
           <?php echo $arr['arr']->appends(['search'=>$arr['search'],'hotel_name'=>$hotel_name])->render()?> 
          </div>
          <script>

             //即点即改
             function butt(obj){
                $(obj).css('display','none');
                $(obj).next().css('display','block');
             }

             function but(obj){
              var help_desc=$(obj).val();
              var help_id=$(obj).attr('id');
              //alert(act_id)
              $(obj).prev().html(help_desc);
              $(obj).css('display','none');
              $(obj).prev().css('display','block');
             
             $.get("{{URL('admin/helpJson')}}",{help_desc:help_desc,help_id:help_id},function(obj){
              
             })
            }
          </script>
          <!-- /.table-responsive --> 
         </div>
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
             <thead> 
              <tr> 
               <th>Domain</th> 
               <th>Price</th> 
               <th>Clicks</th> 
               <th> <i class="icon-time bigger-110"></i> Update </th> 
              </tr> 
             </thead> 
             <tbody> 
              <tr> 
               <td> <a href="#">ace.com</a> </td > 
               <td>$45</td> 
               <td>3,330</td> 
               <td>Feb 12</td> 
              </tr> 
              <tr> 
               <td> <a href="#">base.com</a> </td> 
               <td>$35</td> 
               <td>2,595</td> 
               <td>Feb 18</td> 
              </tr> 
              <tr> 
               <td> <a href="#">max.com</a> </td> 
               <td>$60</td> 
               <td>4,400</td> 
               <td>Mar 11</td> 
              </tr> 
              <tr> 
               <td> <a href="#">best.com</a> </td> 
               <td>$75</td> 
               <td>6,500</td> 
               <td>Apr 03</td> 
              </tr> 
              <tr> 
               <td> <a href="#">pro.com</a> </td> 
               <td>$55</td> 
               <td>4,250</td> 
               <td>Jan 21</td> 
              </tr> 
             </tbody> 
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
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
