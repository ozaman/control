<?php
    $_where = array();
    $_where['i_status'] = 1;
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $PLAN_MAIN = $this->Main_model->fetch_data('','',TBL_PLAN_MAIN,$_where,$_select,$_order);
    ?>
<!--  -->
<div class="box box-outlined">
    <div class="col-lg-12">
      <div class="box-head">
         <header><h4 class="text-light">เพิ่มสัญชาติที่ให้บริการ</h4></header>
         <input type="hidden" name="" id="id_shop_product" value="<?=$_POST[id];?>">
     </div>
     <div class="box-body ">
     



         <div class="form-group form-group-md">


            <div class="col-md-12">
               <!-- <form class="form-horizontal form-banded form-bordered" id="form_region" > -->
                  <!-- <div class="col-md-12"> -->
                      <div class="row">
                      <div class="box-head">
                        <header><h4 class="text-light">จัดการค่าตอบแทน</h4></header>
                      </div>
                      <div class="col-md-12">
                         <div class="col-md-11">
                          <div class="form-group">
                                    <div class="input-group" >
                                        <span class="input-group-addon">เลือกประเภทค่าตอบแทน</span>
                                        <select name="select_country" class="form-control" id="select_type_com" onchange="change_type_com(this.value)">
                                          <option value="">- ค่าตอบแทน -</option>

                                          <?php


                                          foreach($PLAN_MAIN as $key=>$val){


                          // if($shop->main == $main->id ){
                          //   $selected_sub = "selected";
                          // }else{
                          //   $selected_sub = "";
                          // }
                                           ?>

                                           <option value="<?=$key;?>" ><?=$val->s_topic;?></option>
                                       <?php } ?>
                                   </select>
                               </div>
                             </div>
<div class="form-group">
                               <div class="input-group" >
                                        <span class="input-group-addon">เลือกสัญชาติ</span>
                                        <select name="select_country" class="form-control" id="select_country" onchange="change_region(this.value)">
                                          <option value="">- เลือกสัญชาติ -</option>

                                          <?php


                                          foreach($country as $key=>$val){


                          // if($shop->main == $main->id ){
                          //   $selected_sub = "selected";
                          // }else{
                          //   $selected_sub = "";
                          // }
                                           ?>

                                           <option value="<?=$key;?>" ><?=$val->name_th;?></option>
                                       <?php } ?>
                                   </select>
                               </div>
                             </div>
                           </div>
                        <!-- <div id="box_com_add"> -->
                          
                        <!-- </div> -->
                      </div>
                    </div>
                   <!--   <div class="row">
                              
                                <div class="col-md-11">
                                    <div class="input-group" >
                                        <span class="input-group-addon">เลือกสัญชาติ</span>
                                        <select name="select_country" class="form-control" id="select_country" onchange="change_region(this.value)">
                                          <option value="">- เลือกสัญชาติ -</option>

                                          <?php


                                          foreach($country as $key=>$val){
                                           ?>

                                           <option value="<?=$key;?>" ><?=$val->name_th;?></option>
                                       <?php } ?>
                                   </select>
                               </div>
                           </div>
                           <div class="col-md-1" align="right">
            						<button type="button" class="btn btn-primary btn-md"   onclick="submit_region('<?=$_POST[id];?>')" style="width: 100%"> <span id="txt_btn_save5"> เพิ่ม </span></button>
            					</div>
            				</div> -->


            				<!-- </div> -->
            				<div class="row">
            					<div class="box-head">
            						<header><h4 class="text-light">จัดการค่าตอบแทน</h4></header>
            					</div>
            					<div class="col-md-12">
            						
            						<div id="box_com_add">
            							
            						</div>
            					</div>
            				</div>
                           <!--  <div class="row">
                                <div class="box-head">
                                    <header><h4 class="text-light">จัดการค่าตอบแทนตามประเภทรถ</h4></header>
                                </div>
                                <div class="col-md-12">

                                    <div id="box_car_add">

                                    </div>
                                </div>
                            </div> -->
                            <!-- </form> -->
                        </div>

                    </div>

                    <!-- </form> -->
                </div><!--end .box-body -->
            </div><!--end .box -->
        </div>
        <script>
        	var param;
        	function change_region(item) {
        		// console.log(item)
        		var data_country = JSON.parse('<?=json_encode($country);?>');
        		// console.log(data_country[item])
        		
        		param = {
        			id: data_country[item].id,
        			name_en: data_country[item].name_en,
        			name_th: data_country[item].name_th,
        			name_cn: data_country[item].name_cn,
        			country_code: data_country[item].country_code,
        			i_shop: '<?=$_POST[id];?>'
        		}
        		console.log(param)
        		
        	}
        	init('<?=$_POST[id];?>','<?=$_GET[option];?>')
        	function init(item,options) {
        		var url2 = base_url+ "shop/get_region?option="+options;
        		var param = {
        			i_shop: item
        		}
                console.log('************************************')
                console.log(url2)
                $.ajax({
                 url: url2,
                 data: param,
                 type: 'post',
                 error: function() {
                    console.log('Error Profile');
                },
                success: function(ele) {
        				// console.log(ele);
        				$('#box_com_add').html(ele);

        			}
        		});
                // var url3 = base_url+ "shop/get_car_price?option="+options;

                // $.ajax({
                //     url: url3,
                //     data: param,
                //     type: 'post',
                //     error: function() {
                //         console.log('Error Profile');
                //     },
                //     success: function(ele) {
                //         // console.log(ele);
                //         $('#box_car_add').html(ele);

                //     }
                // });
            }



</script>