            <!-- page content -->
            <div class="right_col" role="main">

                <!-- /top tiles -->
				
				<div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Category listing
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
                                                <th>Title </th>
                                                <th>Date </th>
                                                <th class="no-link last">
													<span class="nobr">Action</span>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
											<?php
											$i = 0;
												if($categories)
												{
													foreach($categories as $categories_data)
													{
														$i++;
											?>
														<tr class="even pointer">
															<td class=""><?=$i?></td>
															<td class=" "><?=$categories_data->title?></td>
															<td class=" "><?=date('Y-m-d',strtotime($categories_data->edate))?> <i class="success fa fa-long-arrow-up"></i>
															</td>
															
															<td class="last">
																<a class="btn btn-danger" href="<?=base_url()?>administrator/category_modify/<?=$categories_data->id?>" onclick="javascript:check=confirm('Are you sure to perform this action?');if(check==false) return false;">Edit</button>
																
																<?php
																	if($categories_data->status=='Active')
																	{
																?>
																		<a class="btn btn-danger" href="<?=base_url()?>administrator/category_option/<?=$categories_data->id?>/Inactive" onclick="javascript:check=confirm('Are you sure to perform this action?');if(check==false) return false;">Inactive</button>
																<?php
																	}
																	else
																	{
																?>
																		<a class="btn btn-primary" href="<?=base_url()?>administrator/category_option/<?=$categories_data->id?>/Active" onclick="javascript:check=confirm('Are you sure to perform this action?');if(check==false) return false;">Active</button>
																<?php
																	}
																?>
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