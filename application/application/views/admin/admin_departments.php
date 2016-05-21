<?php
/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 02.Apr.16
 * Time: 08:57 AM
 */
?>
<script>

    departmentID = 0;

    $(document).ready(function () {

        $("#department_edit").hide();

        $("#department_add").click(function () {
            if ($('#degree_id').val() == 0) {
                $("#degree_id").notify("Error! Select Degree", "error");
            } else {
                if ($('#name').val() == '') {
                    $("#name").notify("Error! Enter department Name", "error");
                } else {
                    if ($('#information').val() == '') {
                        $("#information").notify("Error! Enter department Information", "error");
                    } else {
                        $.post("<?php echo base_url(); ?>admin/add_department",
                            {
                                degree_id: $('#degree_id').val(),
                                name: $('#name').val(),
                                information: $('#information').val()
                            },
                            function (data, status) {
                                Notify(data, null, null, 'success');

                                $('#department_list').load(document.URL + ' #department_list', function () {
                                    $('#department_list').fadeIn('fast');
                                });

                                $("html, body").animate({scrollTop: $(document).height()}, 1000);

                                $("#name").val("");

                                $("#information").val("");
                            });
                    }
                }
            }
        });

        $("#department_edit").click(function () {

            if (document.getElementById('name').value == '') {
                $("#name").notify("Error! Enter department Name", "error");
            } else {
                if (document.getElementById('information').value == '') {
                    $("#information").notify("Error! Enter department Information", "error");
                } else {
                    $.post("<?php echo base_url(); ?>admin/update_department",
                        {
                            id: departmentID,
                            degree_id: $('#degree_id').val(),
                            name: $('#name').val(),
                            information: $('#information').val()
                        },
                        function (data, status) {
                            Notify(data, null, null, 'success');

                            $('#department_list').load(document.URL + ' #department_list', function () {
                                $('#department_list').fadeIn('fast');
                            });

                            $("html, body").animate({scrollTop: $(document).height()}, 1000);

                            $("#degree_id").val(0);

                            $("#name").val("");

                            $("#information").val("");

                            $("#department_edit").hide();

                            $("#department_add").show();
                        });
                }
            }
        });
    });

    function departmentUpdateGetValue(id) {

        $.post("<?php echo base_url(); ?>admin/get_department",
            {
                id: id
            },
            function (data, status) {

                jsonData = JSON.parse(data);

                departmentID = jsonData[0].id;

                $("#degree_id").val(jsonData[0].degree_id);

                $("#name").val(jsonData[0].name);

                $("#information").val(jsonData[0].information);

                $("#department_add").hide();

                $("#department_edit").show();
            });
    }

    function departmentDelete(id) {
        $.post("<?php echo base_url(); ?>admin/delete_department",
            {
                id: id
            },
            function (data, status) {
                Notify(data, null, null, 'danger');

                $('#department_list').load(document.URL + ' #department_list', function () {
                    $('#department_list').fadeIn('fast');
                });

                $("html, body").animate({scrollTop: $(document).height()}, 1000);
            });
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

                    <?php
                    $degrees = $data["degrees"];
                    ?>

                    <div class="form-group">
                        <label>Select degree</label>
                        <select class="form-control" id="degree_id" required>
                            <option value="0">None</option>
                            <?php
                            if ($degrees > 0) {
                                foreach ($degrees as $row_degree) {
                                    $degree_id = $row_degree->id;
                                    $degree_name = $row_degree->name;
                                    ?>
                                    <option
                                        value="<?php echo $degree_id; ?>"><?php echo $degree_name; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input id="name" class="form-control" type="text" name="name"
                               placeholder="Enter department Name"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Information</label>
                        <input id="information" class="form-control" type="text" name="information"
                               placeholder="Enter Department Information" required>
                    </div>


                    <button id="department_add" type="button" class="btn btn-default">Add</button>
                    <button id="department_edit" type="button" class="btn btn-default">Update</button>

                    <!--<button type="reset" class="btn btn-default" id="cancel">Cancel</button>-->

                </form>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h3 class="has-divider text-highlight">department Table</h3>

                <?php
                $departments = $data["departments"];
                ?>

                <div class="table-responsive">
                    <table id="department_list" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Information</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($departments > 0) {
                            foreach ($departments as $row_department) {
                                $id = $row_department->id;
                                $name = $row_department->name;
                                $info = $row_department->information;

                                ?>

                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $info; ?></td>
                                    <td>
                                        <button type="button" onclick="departmentUpdateGetValue(<?php echo $id; ?>)"
                                                class="btn btn-warning btn-block">Edit
                                        </button>

                                        <br>

                                        <button type="button" onclick="departmentDelete(<?php echo $id; ?>)"
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
