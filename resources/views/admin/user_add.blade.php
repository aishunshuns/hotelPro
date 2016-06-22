@include('admin/header')
     <div class="page-content"> 
      <div class="page-header"> 
       <h1> 用户添加<small> <i class="icon-double-angle-right"></i></small> </h1> 
      </div>

  <script src="../jedate/jedate.js"></script>
  <script src="../jedate/jedate.min.js"></script>
      <!-- /.page-header --> 
      <div class="row"> 
       <div class="col-xs-12"> 
        <!-- PAGE CONTENT BEGINS --> 
        <div class="row"> 
         <div class="col-xs-12"> 
          <div class="table-responsive"> 
          
          <form action="{{url('admin/user_addpro')}}" method="post" enctype="multipart/form-data">
          <center>
           <table id="sample-table-1" class="table table-striped table-bordered table-hover"> 
            <tr>
              <td align="center">用户名</td>
              <td>
                <input type="text" name="username" id='username' onblur="fun()"><span id='list'></span>
              </td>
            </tr>
            <tr>
              <td align="center">密码</td>
              <td>
                <input type="password" name="password" id='password' onblur="fun1()" ><span id='list1'>
              </td>
            </tr>
            <tr>
              <td align="center"><a class="btn" onclick="$('input[id=lefile]').click();">头像上传</a></td>
              <td>
                <input id="lefile" name="myfile" type="file" style="display:none">
                <div class="input-append">
                  <input id="photoCover" name="myfile" class="input-large" type="text" style="height:30px;width:157px;">
                </div>

              </td>
            </tr>
            <tr>
              <td align="center">手机号</td>
              <td>
                <input type="text" name="email" id='mobile_phone' onblur="fun2()"><span id='list2'></span>
              </td>
            </tr>
            <tr>
              <td align="center" id="dateinfo1">身份证号</td>
              <td>
                 <input type="text" name="idcard" id='id_card' onblur="fun3()"><span id='list3'></span>
              </td>
            </tr>
            <tr>
              <td align="right"><input type="reset" class="btn"></td>
              <td align="left">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="submit" class="btn btn-info" value="添加" />
              </td>
            
            </tr>
           </table> 
           </center>
           </form>
           
          </div>
          <!-- /.table-responsive --> 
         </div>
         <!-- /span --> 
        </div>
        <!-- /row --> 
        <div class="hr hr-18 dotted hr-double"></div> 
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

    <script>
    function fun(){
        var username = document.getElementById('username').value;
        $.get("{{url('register_shu')}}",{'username':username},function(e){
            if(e==0){
                var reg =/^[a-zA-z]\w{3,15}$/;
                if (reg.test(username)) {
                    document.getElementById('list').innerHTML='用户名正确';
                    document.getElementById('list').style.color='green';
                    return true;
                }else{
                    document.getElementById('list').innerHTML='字母、数字、下划线组成，字母开头，4-16位';
                    document.getElementById('list').style.color='red';
                    return false;
                }
            }
            else{
                document.getElementById('list').innerHTML='已存在该用户，请重新输入';
                document.getElementById('list').style.color='red';
                return false;
            }
        })
        
    }
    function fun1(){
        var password = document.getElementById('password').value;
        var reg=/^[a-z | A-Z]\w{5,15}$/;
        if(reg.test(password)){
            document.getElementById('list1').innerHTML='密码正确';
            document.getElementById('list1').style.color='green';

            return true;
        }else{
            document.getElementById('list1').innerHTML='6-16位字符，字母开头';
            document.getElementById('list1').style.color='red';
            return false;
        }
    }
    function fun2(){
        var mobile_phone = document.getElementById('mobile_phone').value;
        $.get("{{url('register_shu')}}",{'email':mobile_phone},function(e){
            if(e==0){
                var reg=/^\d{11}$/;
                if(reg.test(mobile_phone)){
                    document.getElementById('list2').innerHTML='手机号正确';
                    document.getElementById('list2').style.color='green';
                    return true;
                }else{
                    document.getElementById('list2').innerHTML='请输入11位数字';
                    document.getElementById('list2').style.color='red';
                    return false;
                }
            }else{
                document.getElementById('list2').innerHTML='该手机已经注册过账号';
                document.getElementById('list2').style.color='red';
                return false;
            }
        })
    }
    function fun3(){
        var id_card = document.getElementById('id_card').value;
        $.get("{{url('register_shu')}}",{'id_card':id_card},function(e){
            if(e==0){
                var reg=/^[1-9]{1}[0-9]{14}$|^[1-9]{1}[0-9]{16}([0-9]|[xX])$/;
                if(reg.test(id_card)){
                    document.getElementById('list3').innerHTML='身份证号正确';
                    document.getElementById('list3').style.color='green';
                    return true;
                }else{
                    document.getElementById('list3').innerHTML='请检查您输入的身份证号';
                    document.getElementById('list3').style.color='red';
                    return false;
                }
            }else{
                document.getElementById('list3').innerHTML='该身份证号已经注册过账号';
                document.getElementById('list3').style.color='reds';
                return false;
            }
        })
        
    }
</script>
<script type="text/javascript">
      $('input[id=lefile]').change(function() {
      $('#photoCover').val($(this).val());
      });
</script>
  <div style="display:none">
   <script src="http://v7.cnzz.com/stat.php?id=155540&amp;web_id=155540" language="JavaScript" charset="gb2312"></script>
  </div>   
 </body>
</html>
