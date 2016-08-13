<?php 
$edit_data		=	$this->db->get_where('bank_transfert' , array('bank_transfert_id' => $param2) )->result_array();
?>

<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url() . 'index.php?admin/bank_transfert/edit/'.$row['bank_transfert_id'], array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="panel-body">

                               
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $row['description']?>" name="description"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="datepicker form-control" name="date" value="<?php echo $row['date']?>" data-start-view="2"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dépot</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="in" value="<?php echo $row['in']?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Retrait</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="out"
                                            value="<?php echo $row['out']?>" />
                                    </div>
                                </div>
                                
                  <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" class="btn btn-success"><?php echo get_phrase('save');?></button>
                  </div>
                </div>
        </form>
        <?php endforeach;?>
    </div>
</div>