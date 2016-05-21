<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">All Admin</h1>
    </div>
</div>

<div class="row">
    <section class="panel"> 
        <?php
        if ($this->session->userdata('message')) {
            echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
               " . $this->session->userdata('message') . "
            </div>";
        }
        if ($this->session->userdata('exception')) {
            echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
               " . $this->session->userdata('exception') . "
            </div>";
        }
        $this->session->unset_userdata(array('message', 'exception'));
        ?>
        <table class="table table-striped table-advance table-hover">
            <tbody>
                <tr>
                    <th><i class="fa fa-user"></i> Full Name</th>                   
                    <th><i class="fa fa-envelope-o"></i> Email</th>
                    <th><i class="fa fa-bullhorn"></i> Address</th> 
                    <th><i class="fa fa-map-marker"></i> Ip Address</th>
                    <th><i class="fa fa-clock-o"></i> Date</th>
                    <th><i class="fa fa-cogs"></i> Action</th> 
                </tr> 
                <?php foreach ($admin as $value) { ?>
                    <tr>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><div style="max-width:150px;"><?php echo $value->address; ?></div></td>
                        <td><?php echo $value->ip_address; ?></td> 
                        <td>
                            <strong>Last Login</strong> - <?php echo $value->last_login; ?>
                            <br/>
                            <strong>Join Date &nbsp;</strong> - <?php echo $value->join_date; ?>
                        </td> 
                        <td>
                            <div class="btn-group">
                                <?php if ($value->status == 1) { ?>
                                    <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>index.php/admin/block/<?php echo $this->hash_model->encode($value->user_id); ?>" onclick="return confirm('Block this user?')"><i class="fa fa-check"></i> Block Now</a>
                                <?php } ?>
                                <?php if ($value->status == 0) { ?> 
                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>index.php/admin/unblock/<?php echo $this->hash_model->encode($value->user_id); ?>" onclick="return confirm('Un-block this user?')"><i class="fa fa-close"></i> Un-block Now</a>
                                <?php } ?>
                                <?php if ($value->status != 9) { //session_userdata ----  ?> 
                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>index.php/admin/delete/<?php echo $this->hash_model->encode($value->user_id); ?>" onclick="return confirm('Delete this user?')" ><i class="fa fa-trash-o "></i></a> 
                                <?php } ?>
                                <?php if ($value->status == 9) { //session_userdata ----  ?> 
                                    <strong class="btn btn-danger btn-sm" >Super Admin</strong>                        
                                <?php } ?>
                            </div>
                        </td>
                    </tr>     
                <?php } ?>
            </tbody>
        </table>
    </section>
</div>