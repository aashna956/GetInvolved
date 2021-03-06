            <!-- page content -->
            <div class="right_col" role="main">

                <!-- /top tiles -->
				
				<div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Report Abusive
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
                                                <th>
                                                    No.
                                                </th>
												<th>Comment</th>
                                                <th>Image</th>
												<th>Abused By(No. of Members)</th>
                                                <th>Published</th>
												<th class="no-link last">
													<span class="nobr">Action</span>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
											<?php
											$i = 0;
												if($abusive)
												{
													foreach($abusive as $abusive_data)
													{
														$i++;
											?>
														<tr class="even pointer">
															<td class=""><?=$i?></td>
															<td class=" "><?=$abusive_data->comment?></td>
															<td class=" ">
																<?php
																	if($abusive_data->image && $abusive_data->image!='')
																	{
																?>
																<img src="<?=base_url()?>causes_images/<?=$abusive_data->image?>" style="width:80px;height:80px;"/>
																	<?php } ?>
															</td>
															
															<td class=" "><?=$abusive_data->total?></td>
															
															<td class=" ">
																<?=date('Y-m-d',strtotime($abusive_data->edate))?> <i class="success fa fa-long-arrow-up"></i>
															</td>
															
															<td class="last">	
																<a class="btn btn-danger" href="<?=base_url()?>administrator/abusive_option/<?=$abusive_data->id?>" onclick="javascript:check=confirm('Are you sure to perform this action?');if(check==false) return false;">Delete</button>
																
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