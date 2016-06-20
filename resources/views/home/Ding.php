<div class="b_date" id="pnlDisplayDate">
      <span class="b_date_title">入离日期</span>
      <span class="b_date_in" id="J_dateFrom">2016-06-18</span>至 
      <span class="b_date_out" id="J_dateTo">2016-06-19</span> 
      <span class="b_date_num">1晚</span>
      
        <a href="javascript:;" class="b_date_change" id="btnModifyDate">修改日期</a>
      
    </div>
        
    <div class="b_users">
      <table class="book_table_form book_users" border="1">
        <tbody>
          <tr>
            <th class="book_table_label">
              <span>房间数量</span>
            </th>
            <td class="book_table_input">
              <div class="b_nums">
                <select style="display: none">
                  <option value="">1</option>
                </select>
                <a data-pre="1" href="javascript:;" class="b_nums_btn" id="btnSelectRoom">1<i></i></a> 
                <img alt="正在努力加载..." src="http://pic.c-ctrip.com/common/loading.gif" id="J_roomLoading" style="display:none;">
                                <span class="b_nums_price b_line" id="numsPrice">房费<dfn>¥</dfn><span id="roomTotalPriceRMB">946</span></span>
                              
                                                            
                <div style="display: none;" class="b_nums_box popup" id="pnlRoomNum"><ul><li><a href="javascript:;" data-action="selectroom">1</a></li><li><a href="javascript:;" data-action="selectroom">2</a></li><li><a href="javascript:;" data-action="selectroom">3</a></li><li><a href="javascript:;" data-action="selectroom">4</a></li><li><a href="javascript:;" data-action="selectroom">5</a></li><li><a href="javascript:;" data-action="selectroom">6</a></li><li><a href="javascript:;" data-action="selectroom">7</a></li><li><a href="javascript:;" data-action="selectroom">8</a></li><li><a href="javascript:;" data-action="selectroom">9</a></li><li><a href="javascript:;" data-action="selectroom">10</a></li></ul><div class="b_nums_box_note"></div></div>
                
              </div>
            </td>
          </tr>
                    <tr>
                <th class="book_table_label"><span>床型信息</span></th>
                <td class="book_table_input">
              
                <span class="rt_room_info">1张双人床(2m)</span>&nbsp;&nbsp;
              
              <span class="rt_room_info">不可加床</span>
                </td>
              </tr>
         
          <tr>
            <th class="book_table_label">
              <span>住客姓名</span>
            </th>
            <td >
             
                  <input type="text" name="user_name">
              </td>
              </tr>
                  </div>
                  
                </div>
              </div>
              <div data-init="1" class="b_userinput" id="userInput">
                <div class="b_notes" id="notEnoughUser" style="display: none;"><i></i>请填写住客姓名。</div>
                <div class="b_notes" id="wrongName" style="display: none;"><i></i>请填写正确的住客姓名（中文/英文）中文填写如：王小花，英文填写需要在姓与名间加“/”如：wang/xiaohua</div>
                <div class="b_notes" id="blackListUser" style="display: none;"><i></i>请输入正确的入住人姓名。</div>
                <div class="order_notes2">
                  <br>
                  
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="book_table_form book_table_contact">
        <tbody>
          
        </tbody>
      </table>
      <!--简体-->
      <table class="book_table_form book_table_contact">
        <tbody>
          <tr>
            <th class="book_table_label">
              <span>联系手机</span>
            </th>
            <td class="book_table_input">
              
               
              
              <input class="input_txt input_info_num" id="txtContactMobilePhone" name="MobilePhone" value="13051153281" type="text">
            </td>
            <td class="book_table_tips">
              <span class="J_contactTips">
                            <span class="text_notes"></span>
              </span>
              <span class="text_notes" id="J_mobileGuaranteeTip" style="display:none;">我们会将您的手机号码告知酒店或代理商方便联系。</span>
            </td>
          </tr>
          <tr>
            <th class="book_table_label">
              <span>Email</span>
            </th>
            <td class="book_table_input">
              <input class="input_txt" id="txtContactEmail" name="ContactEmail" value="1005485285@qq.com" placeholder="选填" type="text">
            </td>
            <td class="book_table_tips">
            </td>
          </tr>
          <tr>
            <th class="book_table_label">
            </th>
           
          </tr>
          <tr class="moreCon" style="display: none;">
            <th class="book_table_label">
              <span>固定电话</span>
            </th>
            <td class="book_table_input">
              <input class="input_txt input_contact_area" name="ContactTelArea" value="" type="text"><input class="input_txt input_contact_num" name="ContactTelNum" value="" type="text"><input class="input_txt input_contact_ext" name="ContactTelExt" value="" type="text">
            </td>
            <td class="book_table_tips">
              <span class="text_notes">选填</span>
            </td>
          </tr>
          <tr style="display: none;">
            
          </tr>
        </tbody>
      </table>
      <table class="book_table_form book_users">
        <tbody>
          <tr>
  <th class="book_table_label"></th>
  <td class="book_table_input">
    <table class="b_lasttime">
      <tbody><tr>
        <td><span class="text_notes">该酒店14:00办理入住，早到可能需要等待。</span></td>
      </tr>
    </tbody></table>
  </td>
</tr>

          <tr>
            <td>
            </td>
            <td>
              <div id="lastArrivalTimeNote" class="b_lasttime_info b_lasttime_info2" style="display: none;margin:0">
                                <div class="info_tips">
                                    <i></i>房量紧张<span class="lastArrivalTime" style="display:none;"></span>，需提供信用卡担保或积分担保。房间保留至6月19日中午12:00。
                                    <br>
                                    <span class="ensureWord"></span> 
                                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    </table>  
<style type="text/css">

#J_couponTxt { *vertical-align: bottom}
.btn_negligible{ vertical-align: top}
</style>

   
    <div class="order_notes4">
      <div class="order_notes4_title">酒店提示</div>
      <div class="order_notes4_list">
        
        <div id="JHotelPrompt1Line"><div>目前北京全城禁烟，酒店均为无烟房。</div></div>
        <div id="JHotelPrompt" style="display:none;"><div>目前北京全城禁烟，酒店均为无烟房。</div></div>
      </div>   
    </div>
    

<style type="text/css">
.fast_book_box .total_price {height:auto!important; margin:0 -18px; padding: 0 18px 10px 0; background-color:#fff; *zoom:1;}
.fast_book_box .total_price:after{content: " ";display: block;clear: both;height: 0;}

.fast_book_box .total_price .total_price_tips{ clear: both; padding-right: 150px; font-size: 14px; text-align: right; color: #999;}
.fast_book_box .total_price .total_price_tips .price,.fast_book_box .total_price .total_price_tips dfn{ display:inline-block; vertical-align: -2px; font-size: 22px; font-weight: bold; color: #333;}
.fast_book_box .total_price .total_price_tips dfn{margin:0 4px;}
</style>

    <div class="total_price">
      
      <input class="sumbmit" value="下一步 , 支付" id="btnSubmitForm" type="button">
      
      <span class="base_price">
        <dfn>¥</dfn>
        <span data-oldprice="992" id="totalPrice">992</span>
      </span>
      <span class="pay_way">订单总额</span>

      
      <!--js有用到-->
      <input value="946" id="roomPrice" type="hidden">
      <input value="0" id="discount" type="hidden">
            <input id="InvoicePrice" value="10" type="hidden">
            <span id="J_insurePrice" style="display:none">47</span>
    </div>
        <!--现付发票信息-->
        
        <div class="price_invoice">陈月宁将预收全部费用</div>