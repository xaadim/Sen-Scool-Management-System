<?php 
	$edit_data = $this->db->get_where('scholar_year' , array('id_scholar_year' => $param2))->result_array();
	foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title">
            		<i class="entypo-plus-circled"></i>
					Modification de l'année scolaire
            	</div>
            </div>
			<div class="panel-body">
				
               <?php echo form_open(base_url() . 'index.php?admin/scholar_year/do_update/'.$row['id_scholar_year'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Noms de l'année scolaire</label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"
                            	value="<?php echo $row['name'];?>">
						</div>
					</div>
                    
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Début de l'année</label>
                        <div class="col-sm-5">
                            <select name="start" class="form-control">
                               
                                <?php 
                                $month = $this->db->get('month')->result_array();
                                foreach($month as $row1):
                                ?>
                                    <option value="<?php echo $row1['id_month'];?>"
                                        <?php if($row['start'] == $row1['id_month'])echo 'selected';?>>
                                            <?php echo $row1['name'];?>
                                    </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>	
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Fin de l'année</label>
                        <div class="col-sm-5">
                            <select name="end" class="form-control">
                               
                                <?php 
                                $month = $this->db->get('month')->result_array();
                                foreach($month as $row2):
                                ?>
                                    <option value="<?php echo $row2['id_month'];?>"
                                        <?php if($row['end'] == $row2['id_month'])echo 'selected';?>>
                                            <?php echo $row2['name'];?>
                                    </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>				

					<div class="form-group">
                        <label class="col-sm-3 control-label">Choisir comme année en cours</label>
                        <div class="col-sm-5">
                            <select name="active" class="form-control">
                                <?php 
                                $end = $this->db->get('status')->result_array();
                                foreach($end as $row3):
                                ?>
                                    <option value="<?php echo $row3['id_status'];?>"
                                        <?php if($row['active'] == $row3['id_status'])echo 'selected';?>>
                                            <?php echo $row3['name'];?>
                                                </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
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