            <!-- page content -->
			<div class="notification-bar error" style="display:none;"></div>
			<style>
					.notification-bar.error {
-webkit-animation-duration: 1s;
-moz-animation-duration: 1s;
-o-animation-duration: 1s;
animation-duration: 1s;
-webkit-animation-fill-mode: both;
-moz-animation-fill-mode: both;
-o-animation-fill-mode: both;
animation-fill-mode: both;
-webkit-animation-name: slideInDown;
animation-name: slideInDown;
z-index: 100000;
background: rgba(255,87,107,.95);
}

.notification-bar {
-webkit-animation-duration: 1s;
-moz-animation-duration: 1s;
-o-animation-duration: 1s;
animation-duration: 1s;
-webkit-animation-fill-mode: both;
-moz-animation-fill-mode: both;
-o-animation-fill-mode: both;
animation-fill-mode: both;
-webkit-animation-name: slideOutUp;
animation-name: slideOutUp;
position: fixed;
z-index: 10000;
padding: 0.5em .5em .5em 3em;
color:white;
width: 100%;
color: #fff;
    top: 0;
}
.error {
border: 2px solid #ff576b;

} 

.s_order
{
	
}
.s_order input
{
	width:50px;
	text-align:center;
}
.s_order button
{
	background-color: #73879C;
    color: white;
    border: 0px;
    margin-top: 5px;
    width: 50px;
    font-size: 12px;
    text-align: center;
    padding: 2px 5px;
	margin-right: 0;
}

.s_order button:hover
{
	background-color: #43596F;
}


			</style>
            <div class="right_col" role="main">

                <!-- /top tiles -->
				
				<div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Users Causes listing
                </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <?php
									if($msg_sucess)
									{
								?>
										<span class="help-block" id="username-error">
											<?=($msg_sucess)?$msg_sucess:''?>
										</span>
								<?php
									}
								
								?>
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th class="t1">
                                                    No.
                                                </th>
												<th class="t2">Preview</th>
												<th class="t3">User</th>
                                                <th class="t4">Title </th>
                                                <th class="t5">Details </th>
                                                <th class="t6">City </th>
												<th class="t7">Area </th>
												<th class="t7">Featured</th>
												<!--<th>Cause Image</th>-->
												<th class="t8">Published</th>
												<th class="t9">Status</th>
                                                <th class="no-link last" class="t10">
													<span class="nobr">Action</span>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
											<?php
											$i = 0;
												if($causes)
												{
													foreach($causes as $causes_data)
													{
														$i++;
											?>
														<tr class="even pointer">
															<td class=""><?=$i?></td>
															<td>
																<?php
																	if($causes_data->image!='')
																	{
																		$filepath = '';
																		$filepath = 'causes_images/'.trim($causes_data->image);
																	
																		if(file_exists($filepath))
																		{
																?>
																		<img src="<?=base_url()?>causes_images/<?=$causes_data->image?>" style="width:50px;height:50px;">
																<?php
																		}
																	}
																?>
															</td>
															<td class=" ">
																
																<?php
																	foreach($users as $users_data)
																	{
																		if($users_data->id==$causes_data->userid)
																		{
																?>
																			<?=$users_data->fname?> <?=$users_data->lname?>
																<?php
																		}
																	}
																
																?>
															</td>
															<td class=" "><?=$causes_data->title?></td>
															<td class=" " style="text-align:left!important;"><?=$causes_data->details?></td>
															<td class=" "><?=$causes_data->city?></td>
															<td class=" "><?=$causes_data->area?></td>
															
															<td class="s_order">
																<input type="text" name="sort_order" id="sort_order<?=$causes_data->id?>" value="<?=$causes_data->sort_order?>"/>
																<button onclick="submit_order('<?=$causes_data->id?>')">Update</button>
																
																<!--<input type="checkbox" name="featured" id="featured<?=$causes_data->id?>" onclick="featured('<?=$causes_data->id?>')" value="<?=$causes_data->featured?>"/>-->
															</td>
															
															
															<td class=" ">
																<?=date('Y-m-d',strtotime($causes_data->edate))?> <i class="success fa fa-long-arrow-up"></i>
															</td>
															<td class=" "><?=$causes_data->status?></td>
															<td class="last">	
																<?php
																	if($causes_data->status=='Active')
																	{
																?>
																		<a class="btn btn-danger" href="<?=base_url()?>administrator/cause_option/<?=$causes_data->id?>/Inactive" onclick="javascript:check=confirm('Are you sure to perform this action?');if(check==false) return false;">Inactive</button>
																<?php
																	}
																	else
																	{
																?>
																		<a class="btn btn-primary" href="<?=base_url()?>administrator/cause_option/<?=$causes_data->id?>/Active" onclick="javascript:check=confirm('Are you sure to perform this action?');if(check==false) return false;">Active</button>
																<?php
																	}
																?>
																
																<a class="btn btn-primary" href="<?=base_url()?>administrator/cause_delete/<?=$causes_data->id?>" onclick="javascript:check=confirm('Are you sure to perform this action?');if(check==false) return false;">Delete</button>
																
																<a class="btn btn-primary" href="<?=base_url()?>administrator/view_cause/<?=$causes_data->id?>">Modify</button>
															</td>
														</tr>
											<?php
													}
												}
											
											?>
                                            
                                            
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

                    </div>
                </div>
				
				
	        <!-- Datatables -->
        <script src="<?=base_url()?>js/administrator/datatables/js/jquery.dataTables.js"></script>
        <script src="<?=base_url()?>js/administrator/datatables/tools/js/dataTables.tableTools.js"></script>
        <script>
		/*
			function featured(cause_id)
			{
				var val = '';
	            if($('#featured'+cause_id).prop("checked") == true)
				{
					alert("checked");
					val = 1;
				}
				else
				{
					alert("un-checked");
					val = 0;
				}
				return false;
			}
		*/
			function submit_order(cause_id)
			{
				var numbers = /^[0-9]+$/;  
				var sort_order = $('#sort_order'+cause_id).val();
				if(!sort_order.match(numbers))
				 {  
					$(".notification-bar").html('Please Provide valid Sort Order No.'); 
					$(".notification-bar").css('display','block'); 
					setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
					return false;
				 }
					
				if(sort_order=="")
				 {  
					$(".notification-bar").html('Please Provide Sort Order No.'); 
					$(".notification-bar").css('display','block'); 
					setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
					return false;
				 }
				
				var dataString = '&sort_order='+ sort_order + '&cause_id='+ cause_id;
				
				$.ajax({
						type: "POST",
						url: '<?=base_url()?>administrator/submit_order',
						data: dataString,
						cache: false,
						success: function(result){
								if(result)
								{
									$(".notification-bar").html('Sort Order updated!!'); 
									$(".notification-bar").css('display','block'); 
									setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
									return false;
								}
						}
					});
					return false;
			}
		
		
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0]
                        } //disables sorting for column one
            ],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    "dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": "<?php echo base_url('assets2/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
                    }
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
        </script>
		
		
		<style>
			.t1
			{
				width:20px!important;
			}
			.t2
			{
				width:50px!important;
			}
			.t3
			{
				width:100px!important;
			}
			.t4
			{
				width:200px!important;
			}
			.t5
			{
				width:500px!important;
			}
			.t6
			{
				width:60px!important;
			}
			.t7
			{
				width:60px!important;
			}
			
			.t8
			{
				width:60px!important;
			}
			.t9
			{
				width:20px!important;
			}
			.t10
			{
				width:20px!important;
			}
		</style>