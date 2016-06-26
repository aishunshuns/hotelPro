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
           <form action="{{URL('admin/user_search')}}" method="get">
           <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
           <?php foreach($val as $k=>$v){
           
           ?>
             <input type='text' placeholder='Search ...' value='<?php print_r($v); ?>' name='search'/>
            <?php 
                }
            ?>
             <input type="submit" class="btn btn-success" style="width:60px; height:30px; line-height:10px; margin-left:10px;" value="搜索">
           </form>
          
          
            <thead> 
             <tr>
              <th class="center"> <label> <input type="checkbox" class="ace" /> <span class="lbl"></span> </label> </th> 
              <th>UserName</th> 
              <th>Email</th> 
              <th class="hidden-480">idcard</th> 
              <th> <i class="icon-time bigger-110 hidden-480"></i> photo </th> 
              <th class="hidden-480">user</th> 
              <th></th> 
             </tr> 
            </thead> 
            <tbody> 
            <div id='sea'>
             <?php foreach($users as $key=>$v)
                  {
              ?>
            </div>
             <tr> 
              <td class="center"> <label> <input type="checkbox" class="ace" /> <span class="lbl"></span> </label> </td> 
              <td> <a href="#"><?php echo $v['user_name'] ?></a> </td> 
              <td><?php echo $v['user_phone'] ?></td> 
              <td class="hidden-480"><?php echo $v['user_idcard'] ?></td> 
              <td><img src="{{URL('file')}}/<?php echo $v['user_file']?>" width='100' height='50' alt=""></td> 
              <td class="hidden-480"> <span class="label label-sm label-success"></span>
                    <?php if($v['user_act']=='home'){
                      echo "前台用户";
                    }else{
                      echo "后台用户";
                    }
                    ?>
              </td> 
              <td> 
               <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                
                <button class="btn btn-xs btn-info" onclick="showBg(<?php echo $v['user_id'] ?>)" title="修改"> <i class="icon-edit bigger-120"></i> </button> 
                <button class="btn btn-xs btn-danger" onclick="del(<?php echo $v['user_id'] ?>)" title="删除"> <i class="icon-trash bigger-120"></i> </button> 
                <button class="btn btn-xs btn-warning"> <i class="icon-flag bigger-120"></i> </button> 

               </div> 
               </div> 
               <div id="fullbg"></div> 
                <div id="dialog">
                <p class="close"><a href="#" onclick="closeBg();">关闭</a></p>


                <!-- 遮罩层表单 -->
                <div id="upd_data">
                  
                 
                </div>
                </div>
               <div class="visible-xs visible-sm hidden-md hidden-lg"> 
                <div class="inline position-relative"> 
                 <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown"> <i class="icon-cog icon-only bigger-110"></i> </button> 
                 <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close"> 
                  <li> <a href="#" class="tooltip-info" data-rel="tooltip" title="View"> <span class="blue"> <i class="icon-zoom-in bigger-120"></i> </span> </a> </li> 
                  <li> <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit"> <span class="green"> <i class="icon-edit bigger-120"></i> </span> </a> </li> 
                  <li> <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete"> <span class="red"> <i class="icon-trash bigger-120"></i> </span> </a> </li> 
                 </ul> 
                </div> 
               </div> </td> 
             </tr> 
             <?php
                  }
              ?>
            </tbody> 
           </table>
           {!! $ye !!}
          </div>
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
               <th>UserName</th> 
               <th>Phone</th> 
               <th>IdCard</th> 
               <th> <i class="icon-time bigger-110"></i> Update </th> 
              </tr> 
             </thead> 
             <tbody> 
             <?php foreach($users as $k=>$s){
              ?>
             
              <tr> 
               <td> <a href="#"><?php echo $v['user_name'] ?></a> </td> 
               <td><?php echo $v['user_phone'] ?></td> 
               <td><?php echo $v['user_idcard'] ?></td> 
               <td>Jan 21</td> 
              </tr> 
              <?php } ?>
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
 <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> --> 
  <!-- <![endif]--> 
  <!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]--> 
  <!--[if !IE]> --> 
  <script type="text/javascript">
      window.jQuery || document.write("<script src='{{url('assets/js/jquery-2.0.3.min.js')}}'>"+"<"+"/script>");
    </script> 
  <!-- <![endif]--> 
  <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='{{url('')}}assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]--> 
  <script type="text/javascript">
      if("ontouchend" in document) document.write("<script src='{{url('assets/js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
    </script> 
  <script src="{{url('assets/js/bootstrap.min.js')}}"></script> 
  <script src="{{url('assets/js/typeahead-bs2.min.js')}}"></script> 
  <!-- page specific plugin scripts --> 
  <script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script> 
  <script src="{{url('assets/js/jquery.dataTables.bootstrap.js')}}"></script> 
  <!-- ace scripts --> 
  <script src="{{url('assets/js/ace-elements.min.js')}}"></script> 
  <script src="{{url('assets/js/ace.min.js')}}"></script> 
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
    <script>
        function  del(id){
          $.get("{{url('admin/user_del')}}",{'id':id},function(e){
              $('#div1').html(e);

          })
        }
    </script>
    <script type="text/javascript">
      //显示灰色 jQuery 遮罩层
      function showBg(id) {
      $.get("{{url('admin/upd')}}",{'id':id},function(e){
          $('#upd_data').html(e);
      })
      var bh = $("body").height();
      var bw = $("body").width();
      $("#fullbg").css({
      height:bh,
      width:bw,
      display:"block"
      });
      $("#dialog").show();
      }
      //关闭灰色 jQuery 遮罩
      function closeBg() {
      $("#fullbg,#dialog").hide();
      }
      function fun_upd(){
        var id = $('input:hidden').val();
        var uname = $('#username').val();
        var email = $('#email').val();
        var idcard = $('#idcard').val();
        $.get("{{url('admin/user_update')}}",{'id':id,'uname':uname,'email':email,'idcard':idcard},function(e){
          $('#div1').html(e);
        })
        
      }
</script>
<script>
    function fun(page){
      $.get("{{url('admin/user_list')}}",{'page':page},function(e){
          $('#div1').html(e);
      })
    }
</script>

  <div style="display:none">
  <!-- <script src="http://v7.cnzz.com/stat.php?id=155540&amp;web_id=155540" language="JavaScript" charset="gb2312"></script>--> 
  </div>   
 </body>
</html>