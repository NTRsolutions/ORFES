<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">Add Admin</h1>
    </div>
</div>
<?php
if ($this->session->userdata('message')) {
    echo "<div class=\"alert alert-success col-lg-10 col-lg-offset-1 alert-dismissible \" role=\"alert\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
    " . $this->session->userdata('message') . "
</div>";
}
$this->session->unset_userdata(array('message'));
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel"> 
            <div class="panel-body">
                <div class="form">
                    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/registration">
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Full Name</label>
                            <div class="col-lg-10">
                                <input class="form-control" name="name" id="name" minlength="5" type="text"  />
                                <i> <?php echo form_error('name'); ?></i> 
                            </div> 
                        </div>
                        <div class="form-group ">
                            <label for="email" class="control-label col-lg-2">E-Mail </label>
                            <div class="col-lg-10">
                                <input class="form-control " type="email" id="email" name="email"  />
                                <i> <?php echo form_error('email'); ?></i> 
                            </div> 
                        </div>
                        <div class="form-group ">
                            <label for="password" class="control-label col-lg-2">Password</label>
                            <div class="col-lg-10">
                                <input class="form-control " type="password" id="password" name="password"  />
                                <i> <?php echo form_error('password'); ?></i>  
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="conf_password" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" type="password" id="conf_password" name="conf_password"  />
                                <i> <?php echo form_error('conf_password'); ?></i>  
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="address" class="control-label col-lg-2">Address</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" id="address" name="address" ></textarea>                       
                                <i> <?php echo form_error('address'); ?></i>  
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input class="btn  col-md-5 col-lg-4 col-sm-6" value="Save" type="submit"> 
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>