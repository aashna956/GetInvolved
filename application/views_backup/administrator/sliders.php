            <!-- page content -->
            <div class="right_col" role="main">

                <!-- /top tiles -->
				
				<div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Slide listing
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
												<th class="t2">Preview</th>
                                                <th>Title </th>
                                                <th>Slide </th>
                                                <th>Date </th>
                                                <th class="no-link last">
													<span class="nobr">Action</span>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
											<?php
											$i = 0;
												if($sliders)
												{
													foreach($sliders as $sliders_data)
													{
														
														$i++;
											?>
														<tr class="even pointer">
															<td class="" style="width:25px!important;"><?=$i?></td>
															<td style="width:250px!important;">
																<?php
																	if($sliders_data->slide!='')
																	{
																?>
																		<img src="<?=base_url()?>slider/<?=$sliders_data->slide?>" style="width:180px;height:150px;">
																<?php
																	}
																?>
															</td>
															<td class=" " style="width:100px!important;"><?=$sliders_data->title?></td>
															<td class=" " style="width:125px!important;"><?=$sliders_data->slide?></td>
															<td class=" " style="width:80px!important;"><?=date('Y-m-d',strtotime($sliders_data->edate))?> <i class="success fa fa-long-arrow-up"></i>
															</td>
															
															<td class="last" style="width:80px!important;">
																<a class="btn btn-danger" href="<?=base_url()?>administrator/slider_remove/<?=$sliders_data->id?>" onclick="javascript:check=confirm('Are you sure to perform this action?');if(check==false) return false;">Delete</button>
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