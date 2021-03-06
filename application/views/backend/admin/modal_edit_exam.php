<?php 
$edit_data		=	$this->db->get_where('exam' , array('exam_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_student');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/exam/edit/do_update/'.$row['exam_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
            <div class="padded">
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                    </div>
                    <?php 
                            $scholar_year = $this->db->get_where('scholar_year' , array('active' => 1) )->result_array();
                            foreach ($scholar_year as $sy):?>
                            <input type="hidden" class="form-control" name="id_scholar_year" value="<?php echo $sy['id_scholar_year']; ?>">
                        <?php endforeach; ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Date</label>
                    <div class="col-sm-5">
                        <input type="text" class="datepicker form-control" name="date" value="<?php echo $row['date'];?>"/>Format: mois/jour/année
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('comment');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="comment" value="<?php echo $row['comment'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>





