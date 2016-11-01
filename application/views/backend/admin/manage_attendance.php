Cette page vous permet de gérer les absences journalières. Veuillez sélectionner la date et une classe puis valider pour gérer les absences à cette date.</br>
Par défaut la date d'ajourd'hui est sélectionnée.
</hr>
<hr />
    <div class="col-md-12">
        <div class="tile-stats tile-blue">
                <div class="icon"><i class="entypo-chart-bar"></i></div>
                <?php 
                        $check  =   array(  'date' => date('Y-m-d') , 'status' => '2' );
                        $query = $this->db->get_where('attendance' , $check);
                        $present_today      =   $query->num_rows();
                    ?>
                <div class="num" data-start="0" data-end="<?php echo $present_today;?>" 
                        data-postfix="" data-duration="500" data-delay="0">0</div>
                
            <h3>Absents</h3>
        <p>Total des absents aujourd'hui</p></a>
    </div>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
        <thead>
            <tr>
                <th><?php echo get_phrase('select_date');?></th>
                <th><?php echo get_phrase('select_month');?></th>
                <th><?php echo get_phrase('select_year');?></th>
                <th><?php echo get_phrase('select_class');?></th>
                <th>Options</th>
           </tr>
       </thead>
        <tbody>
            <form method="post" action="<?php echo base_url();?>index.php?admin/attendance_selector" class="form">
                <tr class="gradeA">
                    <td>
                        <select name="date" class="form-control">
                            <?php for($i=1;$i<=31;$i++):?>
                                <option value="<?php echo $i;?>" 
                                    <?php if(isset($date) && $date==$i)echo 'selected="selected"';?>>
                                        <?php echo $i;?>
                                            </option>
                            <?php endfor;?>
                        </select>
                    </td>
                    <td>
                        <select name="month" class="form-control">
                            <?php 
                            for($i=1;$i<=12;$i++):
                                if($i==1)$m='janvier';
                                else if($i==2)$m='fevrier';
                                else if($i==3)$m='mars';
                                else if($i==4)$m='avril';
                                else if($i==5)$m='mai';
                                else if($i==6)$m='juin';
                                else if($i==7)$m='juillet';
                                else if($i==8)$m='aout';
                                else if($i==9)$m='septembre';
                                else if($i==10)$m='octobre';
                                else if($i==11)$m='novembre';
                                else if($i==12)$m='decembre';
                            ?>
                                <option value="<?php echo $i;?>"
                                    <?php if($month==$i)echo 'selected="selected"';?>>
                                        <?php echo $m;?>
                                            </option>
                            <?php 
                            endfor;
                            ?>
                        </select>
                    </td>
                    <td>
                        <select name="year" class="form-control">
                            <?php for($i=2020;$i>=2010;$i--):?>
                                <option value="<?php echo $i;?>"
                                    <?php if(isset($year) && $year==$i)echo 'selected="selected"';?>>
                                        <?php echo $i;?>
                                            </option>
                            <?php endfor;?>
                        </select>
                    </td>
                    <td>
                        <select name="class_id" class="form-control">
                            <option value=""><?php echo get_phrase('select_class');?></option>
                            <?php 
                            $classes    =   $this->db->get('class')->result_array();
                            foreach($classes as $row):?>
                            <option value="<?php echo $row['class_id'];?>"
                                <?php if(isset($class_id) && $class_id==$row['class_id'])echo 'selected="selected"';?>>
                                    <?php echo $row['name'];?>
                                        </option>
                            <?php endforeach;?>
                        </select>

                    </td>
                    <td align="center"><input type="submit" value="<?php echo get_phrase('validate');?>" class="btn btn-success"/></td>
                </tr>
            </form>
        </tbody>
    </table>
<hr />



<?php if($date!='' && $month!='' && $year!='' && $class_id!=''):?>

<center>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
        
            <div class="tile-stats tile-white-gray">
                <div class="icon"><i class="entypo-suitcase"></i></div>
                <?php
                    $full_date  =   $year.'-'.$month.'-'.$date;
                    $timestamp  = strtotime($full_date);
                    $day        = strtolower(date('l', $timestamp));
                    $mois=array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
                    $jour=array('dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi');
                    $dates=$jour[date('w')].' '.date('j').' '.$mois[date('n')-1];
                ?>

                <h2><?php echo ucwords($dates);?></h2>
                
                <h3>Gestion des absences de la classe <?php echo $row['name'];?></h3>
                <p><?php echo $date.'-'.$month.'-'.$year;?></p>
            </div>
        </div>

    </div>
</center>
<hr />
<div align="center">Cliquer sur Modifier les absences en dessous de la liste des élèves pour enregistrer les absences.</br>
                    Une fois cliqué, tous les élèves seront présents à l'enregistrement. S'il y a un absent, merci de le définir avant d'enregistrer.</div>
</hr>
<div class="row" id="attendance_list">
    <div class="col-sm-offset-3 col-md-6">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Idenfiant</td>
                    <td><?php echo get_phrase('name');?></td>
                    <td><?php echo get_phrase('status');?></td>
                </tr>
            </thead>
            <tbody>

                <?php 
                    $students   =   $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
                        foreach($students as $row):?>
                        <tr class="gradeA">
                            <td><?php echo $row['student_id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <?php 
                                //inserting blank data for students attendance if unavailable
                                $verify_data    =   array(  'student_id' => $row['student_id'],
                                                            'date' => $full_date);
                                $query = $this->db->get_where('attendance' , $verify_data);
                                if($query->num_rows() < 1)
                                $this->db->insert('attendance' , $verify_data);
                                
                                //showing the attendance status editing option
                                $attendance = $this->db->get_where('attendance' , $verify_data)->row();
                                $status     = $attendance->status;
                            ?>
                        <?php if ($status == 1):?>
                            <td align="center">
                              <span class="badge badge-success"><?php echo get_phrase('present');?></span>  
                            </td>
                        <?php endif;?>
                        <?php if ($status == 2):?>
                            <td align="center">
                              <span class="badge badge-danger"><?php echo get_phrase('absent');?></span>  
                            </td>
                        <?php endif;?>
                        <?php if ($status == 0):?>
                            <td></td>
                        <?php endif;?>
                        </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<div align="center"><a id="update_attendance_button" onclick="return update_attendance()" 
    class="btn btn-info">
    Modifier les absences
</a>
</div>




<div class="row" id="update_attendance">


<!-- STUDENT's attendance submission form here -->
<form method="post" 
    action="<?php echo base_url();?>index.php?admin/manage_attendance/<?php echo $date.'/'.$month.'/'.$year.'/'.$class_id;?>">
        <div class="col-sm-offset-3 col-md-6">
            <table  class="table table-bordered">
                <thead>
                    <tr class="gradeA">
                        <th>Identifiant</th>
                        <th><?php echo get_phrase('name');?></th>
                        <th><?php echo get_phrase('status');?></th>
                    </tr>
                </thead>
                <tbody>
                        
                    <?php 
                    //STUDENTS ATTENDANCE
                    $students   =   $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
                        
                    foreach($students as $row)
                    {
                        ?>
                        <tr class="gradeA">
                            <td><?php echo $row['student_id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td align="center">
                                <?php 
                                //inserting blank data for students attendance if unavailable
                                $verify_data    =   array(  'student_id' => $row['student_id'],
                                                            'date' => $full_date);
                                $query = $this->db->get_where('attendance' , $verify_data);
                                if($query->num_rows() < 1)
                                $this->db->insert('attendance' , $verify_data);
                                
                                //showing the attendance status editing option
                                $attendance = $this->db->get_where('attendance' , $verify_data)->row();
                                $status     = $attendance->status;
                                ?>
                                
                                
                                    <select name="status_<?php echo $row['student_id'];?>" class="form-control" style="width:100px; float:left;">
                                        <option value="1" <?php if($status == 1)echo 'selected="selected"';?>>Present</option>
                                        <option value="2" <?php if($status == 2)echo 'selected="selected"';?>>Absent</option>
                                    </select>
                                    <?php 
                                        $scholar_year = $this->db->get_where('scholar_year' , array('active' => 1) )->result_array();
                                        foreach ($scholar_year as $sy):?>
                                        <input type="hidden" class="form-control" name="id_scholar_year" value="<?php echo $sy['id_scholar_year']; ?>">
                                    <?php endforeach; ?>
                                
                            </td>
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>
            </table>
            <input type="hidden" name="date" value="<?php echo $full_date;?>" />
            <center>
                <input type="submit" class="btn btn-success" value="Enregistrer">
            </center>
        </div>


    
    
</form>
</div>
<?php endif;?>

<script type="text/javascript">

    $("#update_attendance").hide();

    function update_attendance() {

        $("#attendance_list").hide();
        $("#update_attendance_button").hide();
        $("#update_attendance").show();

    }
</script>