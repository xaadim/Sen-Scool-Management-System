Liste de tous les enseignants de l'école. Pour contacter un enseignant depuis l'application, merci de vous rendre dans la page Message <br>
puis sélectionner l'enseigner que vous voulez écrire dans la liste. 
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th>#</div></th>
                            <th width="80"><div><?php echo get_phrase('photo');?></div></th>
                            <th><div><?php echo get_phrase('name');?></div></th>
                            <th><div><?php echo get_phrase('email');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $teachers   =   $this->db->get('teacher' )->result_array();
                                foreach($teachers as $row):?>
                        <tr>
                           <td><?php echo $count++;?></td>
                            <td><img src="<?php echo $this->crud_model->get_image_url('teacher',$row['teacher_id']);?>" class="img-circle" width="30" /></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ----->                      
<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        

        var datatable = $("#table_export").dataTable();
        
        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
        
</script>

