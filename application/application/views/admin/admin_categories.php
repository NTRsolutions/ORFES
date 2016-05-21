<?php
/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 02.Apr.16
 * Time: 08:57 AM
 */
?>
<script>

    categoryID = 0;

    $(document).ready(function () {

        $("#category_edit").hide();

        $("#category_add").click(function () {

            if ($('#name').val() == '') {
                $("#name").notify("Error! Enter category Name", "error");
            } else {
                $.post("<?php echo base_url(); ?>admin/add_category",
                    {
                        name: $('#name').val()
                    },
                    function (data, status) {
                        Notify(data, null, null, 'success');

                        $('#category_list').load(document.URL + ' #category_list', function () {
                            $('#category_list').fadeIn('fast');
                        });

                        $("html, body").animate({scrollTop: $(document).height()}, 1000);

                        $("#name").val("");
                    });
            }
        });


        $("#category_edit").click(function () {

            if ($('#name').val() == '') {
                $("#name").notify("Error! Enter category Name", "error");
            } else {
                $.post("<?php echo base_url(); ?>admin/update_category",
                    {
                        id: categoryID,
                        name: $('#name').val()
                    },
                    function (data, status) {
                        Notify(data, null, null, 'success');

                        $('#category_list').load(document.URL + ' #category_list', function () {
                            $('#category_list').fadeIn('fast');
                        });

                        $("html, body").animate({scrollTop: $(document).height()}, 1000);

                        $("#name").val("");

                        $("#category_edit").hide();

                        $("#category_add").show();
                    });
            }
        });
    });

    function categoryUpdateGetValue(id) {
        $.post("<?php echo base_url(); ?>admin/get_category",
            {
                id: id
            },
            function (data, status) {

                jsonData = JSON.parse(data);

                categoryID = jsonData[0].id;

                $("#name").val(jsonData[0].name);

                $("#category_add").hide();

                $("#category_edit").show();
            }
        );
    }

    function categoryDelete(id) {
        $.post("<?php echo base_url(); ?>admin/delete_category",
            {
                id: id
            },
            function (data, status) {
                Notify(data, null, null, 'danger');

                $('#category_list').load(document.URL + ' #category_list', function () {
                    $('#category_list').fadeIn('fast');
                });

                //$("html, body").animate({scrollTop: $(document).height()}, 1000);
            }
        );
    }
</script>

<div id="page-wrapper">

    <div id="notifications"></div>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?php echo $data["title"]; ?>
                    <small><?php echo $data["message"]; ?></small>
                </h1>
            </div>
            <div class="col-lg-12">

                <form>

                    <div class="form-group">
                        <label>Name</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="Enter category Name"
                               required>
                    </div>

                    <button id="category_add" type="button" class="btn btn-default">Add</button>
                    <button id="category_edit" type="button" class="btn btn-default">Update</button>

                    <!--<button type="reset" class="btn btn-default" id="cancel">Cancel</button>-->

                </form>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h3 class="has-divider text-highlight">category Table</h3>

                <?php
                $categories = $data["categories"];
                ?>

                <div class="table-responsive">
                    <table id="category_list" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($categories > 0) {
                            foreach ($categories as $row_category) {
                                $id = $row_category->id;
                                $name = $row_category->name;
                                ?>

                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td>
                                        <button type="button" onclick="categoryUpdateGetValue(<?php echo $id; ?>)"
                                                class="btn btn-warning btn-block">Edit
                                        </button>

                                        <br>

                                        <button type="button" onclick="categoryDelete(<?php echo $id; ?>)"
                                                class="btn btn-danger btn-block">Delete
                                        </button>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        ?>

                        </tbody>
                    </table><!--//table-->
                </div><!--//table-responsive-->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
