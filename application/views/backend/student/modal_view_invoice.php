<?php
$edit_data = $this->db->get_where('invoice', array('invoice_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>
<center>
    <a onClick="PrintElem('#invoice_print')" class="btn btn-info btn-icon icon-left hidden-print pull-right">
        Imprimer la facture
        <i class="entypo-print"></i>
    </a>
</center>

    <br><br>

    <div id="invoice_print">
        <table width="100%" border="0">
            <tr>
            <!-- logo -->
            <td align="left" valign="top">
            <div class="logo" style="">
                <a href="<?php echo base_url(); ?>">
                    <img src="uploads/logo.png"  style="max-height:60px;"/>
                </a>
            </div><br>
                <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br>
                <?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br>
                Téléphones: <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br>            
            </td>
                <td align="right">
                    <h5><?php echo get_phrase('creation_date'); ?> : <?php echo $row['creation_timestamp'];?></h5>
                    <h5><?php echo $row['title'];?></h5>
                    <h5><?php echo get_phrase('description'); ?> : <?php echo $row['description'];?></h5>
                    <h5><?php echo get_phrase('status'); ?> : <?php echo $row['status']; ?></h5>
                </td>
            </tr>
        </table>
        <hr>
        <table width="100%" border="0">    
            <tr>
                <td align="center"><h3><span class="label label-success">REÇU DE PAIEMENT</span></h3>
                    <h4>du <?php echo $row['creation_timestamp'];?></h4>
                </td>
                
            </tr>

            <tr>
                
                <td align="left" valign="top">
                    <b>Nom: <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?></b><br>
                    <?php 
                        $class_id = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->class_id;
                        echo '<b>'.'Classe' . ': ' . $this->db->get_where('class', array('class_id' => $class_id))->row()->name;
                    ?><br>
                </td>
            </tr>

        </table>
        <hr>

        <table width="100%" border="0">    
            <tr>
                <td align="right" width="80%"><h4>Montant total à payer :</h4></td>
                <td align="right"><h4><?php echo number_format($row['amount'], 0, '.', ' ').' FCFA';?></h4></td>
            </tr>
            <tr>
                <td align="right" width="80%"><h4>Montant payé :</h4></td>
                <td align="right"><h4><?php echo number_format($row['amount_paid'], 0, '.', ' ').' FCFA';?></h4></td>
            </tr>
            <?php if ($row['due'] != 0):?>
            <tr>
                <td align="right" width="80%"><h4>Montant restant à payer :</h4></td>
                <td align="right"><h4><?php echo number_format($row['due'], 0, '.', ' ').' FCFA';?></h4></td>
            </tr>
            <?php endif;?>
        </table>

        <hr>

        <!-- payment history -->
        <span align="center"><h4><?php echo get_phrase('payment_history'); ?></h4></span>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><?php echo get_phrase('date'); ?></th>
                    <th><?php echo get_phrase('amount'); ?></th>
                    <th><?php echo get_phrase('method'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $payment_history = $this->db->get_where('payment', array('invoice_id' => $row['invoice_id']))->result_array();
                foreach ($payment_history as $row2):
                    ?>
                    <tr>
                        <td><?php echo date("d M Y", $row2['timestamp']); ?></td>
                        <td>
                        <?php echo number_format($row['amount'], 0, '.', ' ').' FCFA';?>
                        <td>
                            <?php 
                                if ($row2['method'] == 1)
                                    echo get_phrase('cash');
                                if ($row2['method'] == 2)
                                    echo get_phrase('check');
                                if ($row2['method'] == 3)
                                    echo get_phrase('card');
                                if ($row2['method'] == 'paypal')
                                    echo 'paypal';
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tbody>
        </table>
        <div style="clear:both;">
        <p class="alignLeft">Signature</p> 
        <p class="alignRight">Cachet de l'école</p> 
        </div>
    </div>
<?php endforeach; ?>


<script type="text/javascript">

    // print invoice function
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'facture', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Reçu de paiement - Keur Badiane Mai</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        // mywindow.document.write('<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>