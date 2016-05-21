<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $this->session->userdata('name'); ?></h3>
        </div>
        <div class="panel-body">
            <div class="row"> 

                <div class=" col-md-12 col-lg-12 "> 
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Full Name :</td>
                                <td><?php echo $profile->name; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $profile->email; ?></td>
                            </tr>
                            <tr>
                                <td>Address :</td>
                                <td><?php echo $profile->address; ?></td> 
                            </tr>
                            <tr>
                                <td>Ip Address :</td>
                                <td><?php echo $profile->ip_address; ?></td>
                            </tr>
                            <tr>
                                <td>Status :</td>
                                <td>
                                    <?php
                                    if ($profile->status == 9)
                                        echo "Super Admin";
                                    if ($profile->status == 1)
                                        echo "Admin";
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Date :</td>
                                <td>
                                    Last Login - <?php echo $profile->last_login; ?>
                                    <br/>
                                    Join Date - <?php echo $profile->join_date; ?>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <a href="<?php echo base_url(); ?>index.php/admin/edit_profile" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i> Edit Profile</a>
        </div>
    </div>
</div>
