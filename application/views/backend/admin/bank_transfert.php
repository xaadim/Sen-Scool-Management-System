Cette page vous permet de gérer les versements bancaires à savoir les entrée et sorties.
</br>
<b>Conseil: Ne pas mettre d'espaces, ni de virgules ou de points pour séparer les milles.</b></br>
<b>Exemple: </b>Ecrivez <b>10000</b> au lieu de <b>10 000 ou 10.000 ou 10,000</b>. </br>
<b>NB:</b> Le FCFA est automatiquement ajouté à la facture, inutile de le mettre.

</hr>
<div class="row">
	<div class="col-md-12">
    <a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_origin_money/');" 
            	class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
            	Votre fond de caisse
                </a> 
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					Liste des versements bancaires
                    	</a></li>
			<li >
            	<a class="btn btn-success" href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					Ajouter un versement bancaire
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table  class="table table-bordered datatable" id="table_export">
                <?php 
					$edit_data	=	$this->db->get_where('origin_money' , array(
						'origin_money_id' => 1
					))->result_array();
					foreach ($edit_data as $origin):
				?>

                	<thead>
                		<tr>
                    		<th>#</th>
                            <th><div>Date</div></th>
                    		<th><div><?php echo get_phrase('description');?></div></th>
                            <th><div>Fond actuel</div></th>
                            <th><div>Somme déposée</div></th>
                            <th><div>Somme retirée</div></th>
                            <th><div>Nouveau solde</div></th>
                    		<th><div>Options</div></th>
						</tr>
					</thead>
                    <tbody>
                        <?php $bank_transfert = $this->db->get('bank_transfert')->result_array();
                        	                       	
                            foreach($bank_transfert as $row):
                            	$solde_depart = $origin['origin_money'];

                        	if ($row['current_money'] == 0) {
							    $solde_depart = $origin['origin_money'];
							}
							else {
								$solde_depart = $row['current_money'];
							}
							$new_solde = $solde_depart + $row['in'] - $row['out'];

                        ?>
                        <tr>
                        	
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['date'];?></td>
							<td><?php echo $row['description'];?></td>
							<td style="color:black"><?php echo number_format ($solde_depart , 0, '.', ' ').' FCFA';?></td>
                            <td style="color:green"><?php if ($row['in'] == null ) {
                            		echo number_format(0).' FCFA';
                            	}
                            	else echo number_format($row['in'], 0, '.', ' ').' FCFA';
								?>
                            </td>
                            <td style="color:red"><?php if ($row['out'] == null ) {
                            		echo number_format(0).' FCFA';
                            	}
                            	else echo number_format($row['out'], 0, '.', ' ').' FCFA';
								?>
                            </td>
							<td style="color:green"><b><?php echo number_format($new_solde, 0, '.', ' ').' FCFA';?></b></td>
							
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                  
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_bank_transfert/<?php echo $row['bank_transfert_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>

                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/bank_transfert/delete/<?php echo $row['bank_transfert_id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                                    </li>
                                </ul>
                            </div>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <?php endforeach;?>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
            <?php echo form_open(base_url() . 'index.php?admin/bank_transfert/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default panel-shadow" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title">Gestion des versements</div>
                            </div>
                            <div class="panel-body">

                            	<div class="form-group">
					                <label class="col-sm-3 control-label">Votre fond actuel</label>
					                <div class="col-sm-6">
					                    <input type="text" class="form-control" value="<?php 
					                    if ($new_solde == 0) {
							    			echo number_format($origin['origin_money'], 0, '.', ' ').' FCFA';
										}
										else echo number_format($new_solde, 0, '.', ' ').' FCFA';?>" readonly/>
					                </div>
					            </div>
					            <input type="hidden" class="form-control" name="current_money" value="<?php echo $new_solde?>"/>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="description"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="datepicker form-control" name="date" value="" data-start-view="2"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dépot</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="in"
                                            placeholder="Entrer la somme déposée" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Retrait</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="out"
                                            placeholder="Entrer la somme rétirée" />
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                   
                        <div class="form-group">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-success"><?php echo get_phrase('add_invoice');?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo form_close();?>
			</div>
			<!----CREATION FORM ENDS-->
            
		</div>
	</div>
</div>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable({
			"sPaginationType": "bootstrap",
			"sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
			"oTableTools": {
				"aButtons": [
					
					{
						"sExtends": "xls",
						"mColumns": [1,2,3,4,5,6]
					},
					{
						"sExtends": "pdf",
						"mColumns": [1,2,3,4,5,6]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(0, false);
							datatable.fnSetColumnVis(7, false);
							
							this.fnPrint( true, oConfig );
							
							window.print();
							
							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(0, true);
									  datatable.fnSetColumnVis(7, true);
								  }
							});
						},
						
					},
				]
			},
			
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script>

