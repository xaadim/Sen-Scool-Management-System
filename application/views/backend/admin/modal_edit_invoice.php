<?php 
$edit_data		=	$this->db->get_where('invoice' , array('invoice_id' => $param2) )->result_array();
?>

<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url() . 'index.php?admin/invoice/do_update/'.$row['invoice_id'], array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('student');?></label>
                    <div class="col-sm-5">
                        <select name="student_id" class="form-control" style="width:400px;" >
                            <?php 
                            $this->db->order_by('name','asc');
                            $students = $this->db->get('student')->result_array();
                            foreach($students as $row2):
                            ?>
                                <option value="<?php echo $row2['student_id'];?>"
                                    <?php if($row['student_id']==$row2['student_id'])echo 'selected';?>>
                                    <?php echo $row2['name'];?>
                                </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('title');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('month');?></label>
                    <div class="col-sm-5">
                        <select name="month" class="form-control">
                                            <?php 
                                            for($i=1;$i<=12;$i++):
                                                if($i==1)$m='Janvier';
                                                else if($i==2)$m='Février';
                                                else if($i==3)$m='Mars';
                                                else if($i==4)$m='Avril';
                                                else if($i==5)$m='Mai';
                                                else if($i==6)$m='Juin';
                                                else if($i==7)$m='Juillet';
                                                else if($i==8)$m='Août';
                                                else if($i==9)$m='Septembre';
                                                else if($i==10)$m='Octobre';
                                                else if($i==11)$m='Novembre';
                                                else if($i==12)$m='Decembre';
                                            ?>
                                                <option value="<?php echo $m?>"
                                                    <?php if($row['month']==$m)echo 'selected="selected"';?>>
                                                    <?php echo $m;?>
                                                </option>
                                            <?php 
                                            endfor;
                                            ?>
                                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('total_amount');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="amount" value="<?php echo $row['amount'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('payment_now');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="amount_paid" value="<?php echo $row['amount_paid'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
                    <div class="col-sm-5">
                        <select name="status" class="form-control">
                            <option value="payé" <?php if($row['status']=='payé')echo 'selected';?>><?php echo get_phrase('paid');?></option>
                            <option value="non payé" <?php if($row['status']=='non payé')echo 'selected';?>><?php echo get_phrase('unpaid');?></option>
                            <option value="avance" <?php if($row['status']=='avance')echo 'selected';?>><?php echo get_phrase('un_paid');?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="datepicker form-control" name="date" 
                            value="<?php echo $row['creation_timestamp'];?>"/>
                    </div>

                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" class="btn btn-success"><?php echo get_phrase('edit_invoice');?></button>
                  </div>
                </div>
        </form>
        <?php endforeach;?>
    </div>
</div>