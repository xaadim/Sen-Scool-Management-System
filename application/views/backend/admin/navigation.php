<div class="sidebar-menu">
    <header class="logo-env" >

        <!-- logo -->
        <div class="logo" style="">
            <a href="<?php echo base_url(); ?>">
                <img src="uploads/logo.png"  style="max-height:100px;"/>
            </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation">

                <i class="entypo-menu"></i>
            </a>
        </div>

         <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>

    <div style=""></div>  
    <ul id="main-menu" class="">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->


        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/dashboard">
                <i class="glyphicon glyphicon-dashboard"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>
        
        <!-- Gestion de l'ann�e scolaire -->
        <li class="<?php if ($page_name == 'scholar_year') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/scholar_year">
                <i class="glyphicon glyphicon-th-list"></i>
                <span><?php echo get_phrase('manage_scholar_year'); ?></span>
            </a>
        </li>

        <!-- INSCRIPTION -->
        <li class="<?php
        if ($page_name == 'student_add' ||
            $page_name == 'student_bulk_add' ||
            $page_name == 'inscription' ||
                $page_name == 'reinscription')
            echo 'opened active has-sub';
        ?> ">
            <a href="#">
                <i class="glyphicon glyphicon-edit"></i>
                <span><?php echo get_phrase('inscription_reinscription'); ?></span>
            </a>
            <ul>
                 <li>
                    
                    <!-- inscription -->
                    <li class="<?php if ($page_name == 'student_add') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>index.php?admin/student_add">
                            <span><i class="entypo-dot"></i> Inscription </span>
                        </a>
                    </li>

                     <!-- STUDENT BULK ADMISSION -->
                    <li class="<?php if ($page_name == 'student_bulk_add') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>index.php?admin/student_bulk_add">
                            <span><i class="entypo-dot"></i> <?php echo get_phrase('admit_bulk_student'); ?></span>
                        </a>
                    </li>
                   
                </li>
               
                <!-- inscription -->
                <li class="<?php if ($page_name == 'student_add') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/reinscription">
                        <span><i class="entypo-dot"></i> Réinscription </span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- STUDENT -->
        <li class="<?php
        if (    $page_name == 'student_information' ||
                $page_name == 'student_information_all' ||
                $page_name == 'student_marksheet')
            echo 'opened active has-sub';
        ?> ">
            <a href="#">
                <i class="fa fa-group"></i>
                <span><?php echo get_phrase('student'); ?></span>
            </a>
            <ul>                
                <!-- STUDENT INFORMATION -->
                <li class="<?php if ($page_name == 'student_information ') echo 'opened active'; ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> Fiches des élèves</span>
                    </a>
                    <ul>
                   
                        <!-- Students by class_id-->
                        <?php
                        $classes = $this->db->get('class')->result_array();
                        foreach ($classes as $row):
                            ?>
                            <li class="<?php if ($page_name == 'student_information' && $class_id == $row['class_id']) echo 'active'; ?>">
                                <a href="<?php echo base_url(); ?>index.php?admin/student_information/<?php echo $row['class_id']; ?>">
                                    <span><?php echo $row['name']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                         <!-- All students-->
                        <li class="<?php if ($page_name == 'student_information_all') echo ' active'; ?> ">
                            <a href="<?php echo base_url(); ?>index.php?admin/student_information_all">
                                <span>Tous les élèves</span>
                            </a>
                        </li>
                    </ul>
                </li>
              

                <!-- STUDENT MARKSHEET -->
                <li class="<?php if ($page_name == 'student_marksheet') echo 'opened active'; ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('student_marksheet'); ?></span>
                    </a>
                    <ul>
                        <?php
                        $classes = $this->db->get('class')->result_array();
                        foreach ($classes as $row):
                            ?>
                            <li class="<?php if ($page_name == 'student_marksheet' && $class_id == $row['class_id']) echo 'active'; ?>">
                                <a href="<?php echo base_url(); ?>index.php?admin/student_marksheet/<?php echo $row['class_id']; ?>">
                                    <span><?php echo $row['name']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </li>

        <!-- TEACHER -->
        <li class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/teacher">
                <i class="entypo-users"></i>
                <span><?php echo get_phrase('teacher'); ?></span>
            </a>
        </li>

        <!-- PARENTS -->
        <!-- <li class="<?php if ($page_name == 'parent') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/parent">
                <i class="entypo-user"></i>
                <span><?php echo get_phrase('parents'); ?></span>
            </a>
        </li> -->

        <!-- CLASS -->
        <li class="<?php
        if ($page_name == 'class' ||
                $page_name == 'section')
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-flow-tree"></i>
                <span><?php echo get_phrase('class'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'class') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/classes">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('manage_classes'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'section') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/section">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('manage_sections'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- SUBJECT -->
        <li class="<?php if ($page_name == 'subject') echo 'opened active'; ?> ">
            <a href="#">
                <i class="entypo-docs"></i>
                <span><?php echo get_phrase('subject'); ?></span>
            </a>
            <ul>
                <?php
                $classes = $this->db->get('class')->result_array();
                foreach ($classes as $row):
                    ?>
                    <li class="<?php if ($page_name == 'subject' && $class_id == $row['class_id']) echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>index.php?admin/subject/<?php echo $row['class_id']; ?>">
                            <?php echo $row['name']; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>

        <!-- CLASS ROUTINE -->
        <li class="<?php if ($page_name == 'class_routine') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/class_routine">
                <i class="entypo-target"></i>
                <span><?php echo get_phrase('class_routine'); ?></span>
            </a>
        </li>

        <!-- DAILY ATTENDANCE -->
        <li class="<?php if ($page_name == 'manage_attendance') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/manage_attendance/<?php echo date("d/m/Y"); ?>">
                <i class="entypo-chart-area"></i>
                <span><?php echo get_phrase('daily_attendance'); ?></span>
            </a>

        </li>

         <!-- DAILY POINTAGE IN OUT -->
        <li class="<?php if ($page_name == 'manage_inout') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/manage_inout/">
                <i class="entypo-clock"></i>
                <span>Gestion des pointages</span>
            </a>

        </li>

        <!-- EXAMS -->
        <li class="<?php
        if ($page_name == 'exam' ||
                $page_name == 'grade' ||
                $page_name == 'marks' ||
                    $page_name == 'exam_marks_sms')
                        echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-graduation-cap"></i>
                <span><?php echo get_phrase('exam'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'exam') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/exam">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('exam_list'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'marks') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/marks">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('manage_marks'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'grade') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/grade">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('exam_grades'); ?></span>
                    </a>
                </li>               
                <li class="<?php if ($page_name == 'exam_marks_sms') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/exam_marks_sms">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('send_marks_by_sms'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- PAYMENT -->
        <li class="<?php if ($page_name == 'invoice') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/invoice">
                <i class="entypo-credit-card"></i>
                <span><?php echo get_phrase('payment'); ?></span>
            </a>
        </li>

        <!-- ACCOUNTING -->
        <li class="<?php
        if ($page_name == 'income' ||
                $page_name == 'expense' ||
                $page_name == 'bank_transfert' ||
                $page_name == 'discharge' ||
                    $page_name == 'expense_category')
                        echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('accounting'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'expense') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/expense">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('expense'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'expense_category') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/expense_category">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('expense_category'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'income') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/income">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('income'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'bank_transfert') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/bank_transfert">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('bank_transfert'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'discharge') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/discharge">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('discharge_model'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- LIBRARY -->
        <li class="<?php if ($page_name == 'book') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/book">
                <i class="entypo-book"></i>
                <span><?php echo get_phrase('library'); ?></span>
            </a>
        </li>

        <!-- TRANSPORT -->
        <li class="<?php if ($page_name == 'transport'||
                                $page_name == 'transport_information') echo 'opened active'; ?> ">
            <a href="#">
                <i class="entypo-location"></i>
                <span>Gestion des transports</span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'transport') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/transport">
                        <span><i class="entypo-dot"></i>Gérer les transports</span>
                    </a>
                </li>

                <!-- STUDENT INFORMATION -->
                <li class="<?php if ($page_name == 'student_information ') echo 'opened active'; ?> ">
                    <a href="#">
                        <span><i class="entypo-dot"></i> Elèves par transport</span>
                    </a>
                    <ul>
                   
                        <!-- eleves par transport_id-->
                       <?php
                        $transports = $this->db->get('transport')->result_array();
                        foreach ($transports as $tr):
                            ?>
                           <li class="<?php if ($page_name == 'transport_information' && $transport_id == $tr['transport_id']) echo 'active'; ?>">
                                <a href="<?php echo base_url(); ?>index.php?admin/transport_information/<?php echo $tr['transport_id']; ?>">
                                    <span><i class="entypo-dot"></i><?php echo $tr['route_name']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        
                    </ul>
                </li>
            </ul>
        </li>

         <!-- UNIFORMES -->
        <li class="<?php
        if ($page_name == 'uniformes' ||
            $page_name == 'uniformes_category')
            echo 'opened active';
        ?> ">
        <a href="#">
                <i class="entypo-clipboard"></i>
                <span>Gestion des uniformes</span>
        </a>
        <ul>
            <li class="<?php if ($page_name == 'uniformes'||
                                    $page_name == 'uniformes_information') echo 'opened active'; ?> ">
                <a href="<?php echo base_url(); ?>index.php?admin/uniformes">
                    <i class="entypo-dot"></i>
                    <span><?php echo get_phrase('manage_uniformes'); ?></span>
                </a>
            </li>
            <li class="<?php if ($page_name == 'uniformes_category'||
                                    $page_name == 'uniformes_category') echo 'opened active'; ?> ">
                <a href="<?php echo base_url(); ?>index.php?admin/uniformes_category">
                    <i class="entypo-dot"></i>
                    <span><?php echo get_phrase('uniformes_category'); ?></span>
                </a>
            </li>
        </ul>

        <!-- DORMITORY -->
        <li class="<?php if ($page_name == 'dormitory') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/dormitory">
                <i class="entypo-home"></i>
                <span><?php echo get_phrase('dormitory'); ?></span>
            </a>
        </li>

        <!-- NOTICEBOARD -->
        <li class="<?php if ($page_name == 'noticeboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/noticeboard">
                <i class="entypo-doc-text-inv"></i>
                <span><?php echo get_phrase('noticeboard'); ?></span>
            </a>
        </li>

        <!-- MESSAGE -->
        <!-- MESSAGE -->
        <li class="<?php if ($page_name == 'message') echo 'active'; ?> ">
        <?php
            $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
            $this->db->where('sender', $current_user);
            $this->db->or_where('reciever', $current_user);
            $message_threads = $this->db->get('message_thread')->result_array();
            foreach ($message_threads as $row):

                // defining the user to show
                if ($row['sender'] == $current_user)
                    $user_to_show = explode('-', $row['reciever']);
                if ($row['reciever'] == $current_user)
                    $user_to_show = explode('-', $row['sender']);

                $user_to_show_type = $user_to_show[0];
                $user_to_show_id = $user_to_show[1];
                $unread_message_number = $this->crud_model->count_unread_message_of_thread($row['message_thread_code']);
                ?>
            <?php endforeach; ?>
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/message">
                <i class="entypo-mail"></i>
                <?php echo get_phrase('message'); ?>
                <?php if ($unread_message_number > 0): ?>
                    <span class="badge badge-danger pull-right">
                        <?php echo $unread_message_number; ?>
                    </span>
                <?php endif; ?>
            </a>
        </li>

        <!-- SETTINGS -->
        <li class="<?php
        if ($page_name == 'system_settings' ||
                $page_name == 'manage_language' ||
                    $page_name == 'sms_settings')
                        echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-lifebuoy"></i>
                <span><?php echo get_phrase('settings'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/system_settings">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('general_settings'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'sms_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/sms_settings">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('sms_settings'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/manage_language">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('language_settings'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- ACCOUNT -->
        <li class="<?php if ($page_name == 'manage_profile'||
                                $page_name == 'manage_admin') echo 'opened active'; ?> ">
            <a href="#">
                <i class="entypo-lock"></i>
                Gestion des comptes
            </a>
            <ul>
                <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/manage_profile">
                        <span><i class="entypo-dot"></i><?php echo get_phrase('account'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'manage_admin') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/manage_admin">
                        <span><i class="entypo-dot"></i>Gérer les administrateurs</span>
                    </a>
                </li>
                
            </ul>
        </li>


    </ul>

</div>