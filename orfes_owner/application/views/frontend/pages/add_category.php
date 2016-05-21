<section class="signup">
    <div class="row">
        <?php
        if ($this->session->userdata('exception')) {
            echo "<div class=\"alert alert-danger alert-dismissible col-md-8 col-md-offset-2\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                            " . $this->session->userdata('exception') . "
                        </div>";
        }
        if ($this->session->userdata('message')) {
            echo "<div class=\"alert alert-success alert-dismissible col-md-8 col-md-offset-2\" role=\"alert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                            " . $this->session->userdata('message') . "
                        </div>";
        }
        $this->session->unset_userdata(array('message', 'exception'));
        ?>
        <div class="col-md-6 col-md-offset-3">
            <h3 class="sh_title text-center">Add Category</h3>

            <form class="form-inline" action="<?php echo base_url(); ?>index.php/category/add_category" method="post">
                <div class="form-group">
                    <label for="category">Category Name</label>
                    <input type="text" class="form-control" name="category_name" id="category"
                           placeholder="Category Name">
                    <i> <?php echo form_error('category_name'); ?></i>
                </div>
                <button type="submit" class="btn btn-default">Add</button>
            </form>
        </div>
    </div>
</section>


<section class="col-md-12 category">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Serial No.</th>
            <th>Category Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sl = 1;
        foreach ($category as $value) {
            $status = "";
            if ($value->status == 0) {
                $status = "(Blocked)";
            } elseif ($value->status == 1) {
                $status = "";
            }

            $delete_url = sha1($value->category_id) . '-' . sha1(date('Y-m-d h:m:s'));

            ?>

            <script>
                function delete_confirmation<?php echo $value->category_id; ?>() {
                    if (confirm("Are You Sure! Delete Category: " + "<?php echo $value->category_name ?>") == true) {
                        window.location = "<?php echo base_url() . 'index.php/category/delete/' .$delete_url?>";
                    } else {

                    }
                }
            </script>

            <?php

            echo "<tr>";
            echo "<th  style=\"width:100px\" scope=\"row\">" . $sl++ . "</th>";
            echo "<td>$value->category_name $status" . "</td>";
            if ($value->status == 0) {
                echo "<td style=\"width:100px\"><a href=" . base_url() . 'index.php/category/unblock/' . $value->category_id . " class=\"btn btn-danger btn-sm\">Unblock</a></td>";
            } elseif ($value->status == 1) {
                echo "<td style=\"width:100px\"><a href=" . base_url() . 'index.php/category/block/' . $value->category_id . " class=\"btn btn-success btn-sm\">Block</a></td>";
            }
            echo "<td style=\"width:100px\"><a class=\"btn btn-default btn-sm\" id=\"delete_button\" onclick=\"delete_confirmation" . $value->category_id . "()\")\">Delete</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</section>