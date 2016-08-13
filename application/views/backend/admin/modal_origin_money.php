<?php 
	$edit_data	=	$this->db->get_where('origin_money' , array(
		'origin_money_id' => 1
	))->result_array();
	foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					Gestion du fond de caisse
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/origin_money/edit/' . $row['origin_money_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Entrer votre fond</label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="origin_money" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="<?php echo $row['origin_money'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Date de dépot</label>
                        
						<div class="col-sm-6">
							<input type="text" class="datepicker form-control" name="date" value="<?php echo $row['date'];?>" data-start-view="2"/>
						</div>
					</div>

						                    
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-success"><?php echo get_phrase('save');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>