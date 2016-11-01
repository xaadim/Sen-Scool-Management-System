<?php 
$edit_data		=	$this->db->get_where('class_routine' , array('class_routine_id' => $param2) )->result_array();
?>
<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url() . 'index.php?admin/class_routine/do_update/'.$row['class_routine_id'] , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                    <div class="col-sm-5">
                        <select name="class_id" class="form-control">
                            <?php 
                            $classes = $this->db->get('class')->result_array();
                            foreach($classes as $row2):
                            ?>
                                <option value="<?php echo $row2['class_id'];?>" <?php if($row['class_id']==$row2['class_id'])echo 'selected';?>>
                                    <?php echo $row2['name'];?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <?php 
                            $scholar_year = $this->db->get_where('scholar_year' , array('active' => 1) )->result_array();
                            foreach ($scholar_year as $sy):?>
                            <input type="hidden" class="form-control" name="id_scholar_year" value="<?php echo $sy['id_scholar_year']; ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('subject');?></label>
                    <div class="col-sm-5">
                        <select name="subject_id" class="form-control">
                            <?php 
                            $subjects = $this->db->get('subject')->result_array();
                            foreach($subjects as $row2):
                            ?>
                                <option value="<?php echo $row2['subject_id'];?>" <?php if($row['subject_id']==$row2['subject_id'])echo 'selected';?>>
                                    <?php echo $row2['name'];?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('day');?></label>
                    <div class="col-sm-5">
                       <select name="day" class="form-control" style="width:100%;">
                            <option value="dimanche">dimanche</option>
                            <option value="lundi">lundi</option>
                            <option value="mardi">mardi</option>
                            <option value="mercredi">mercredi</option>
                            <option value="jeudi">jeudi</option>
                            <option value="vendredi">vendredi</option>
                            <option value="samedi">samedi</option>
                        </select>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('starting_time');?></label>
                    <div class="col-sm-5">
                        <input type="time" name="time_start" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('ending_time');?></label>
                    <div class="col-sm-5">
                        <input type="time" name="time_end" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_class_routine');?></button>
                  </div>
                </div>
        </form>
        <?php endforeach;?>
    </div>
</div>