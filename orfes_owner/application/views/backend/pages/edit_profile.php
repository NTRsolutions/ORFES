<?php 
if ($this->session->userdata('message')) {
    echo "<div class=\"alert alert-success col-lg-10 col-lg-offset-1 alert-dismissible \" role=\"alert\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
    ".$this->session->userdata('message')."
</div>";
} 
$this->session->unset_userdata(array('message'));
?>
<div class="col-lg-12">
    <section class="panel"> 
        <div class="panel-body">
            <div class="form">
                <form class="form-horizontal" method="post" action="<?php echo base_url()?>admin/edit_profile">
                    <div class="form-group ">
                        <label for="name" class="control-label col-lg-2">Full Name</label>
                        <div class="col-lg-10">
                            <input class="form-control" name="name" id="name" minlength="5" type="text"  value="<?php echo $profile->name; ?>" />
                        <i> <?php echo form_error('name'); ?></i> 
                        </div> 
                    </div>
                    <div class="form-group ">
                        <label for="email" class="control-label col-lg-2">E-Mail (Not Changeable)</label>
                        <div class="col-lg-10">
                            <input class="form-control " type="email" id="email" name="email" readonly value="<?php echo $profile->email; ?>"/>
                        <i> <?php echo form_error('email'); ?></i> 
                        </div> 
                    </div>
                    <div class="form-group ">
                        <label for="password" class="control-label col-lg-2">Password</label>
                        <div class="col-lg-10">
                            <input class="form-control " type="password" id="password" name="password"  placeholder=" * * * * * * * * *"/>
                        <i> <?php echo form_error('password'); ?></i>  
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="conf_password" class="control-label col-lg-2">Confirm Password </label>
                        <div class="col-lg-10">
                            <input class="form-control" type="password" id="conf_password" name="conf_password" placeholder=" * * * * * * * * *" />
                        <i> <?php echo form_error('conf_password'); ?></i>  
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="address" class="control-label col-lg-2">Address</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" id="address" name="address" ><?php echo $profile->address; ?></textarea>                       
                            <i> <?php echo form_error('address'); ?></i>  
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input class="btn btn-theme  col-md-5 col-lg-4 col-sm-6" style="padding:10px 0" value="Save" type="submit">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>