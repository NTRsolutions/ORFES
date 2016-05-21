<?php
/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 02.Apr.16
 * Time: 08:57 AM
 */
?>
<script>

    degreeID = 0;

    $(document).ready(function () {

        $("#degree_edit").hide();

        $("#degree_add").click(function () {

            if ($('#name').val() == '') {
                $("#name").notify("Error! Enter degree Name", "error");
            } else {
                if ($('#information').val() == '') {
                    $("#information").notify("Error! Enter degree Information", "error");
                } else {
                    $.post("<?php echo base_url(); ?>admin/add_degree",
                        {
                            name: $('#name').val(),
                            information: $('#information').val()
                        },
                        function (data, status) {
                            Notify(data, null, null, 'success');

                            $('#degree_list').load(document.URL + ' #degree_list', function () {
                                $('#degree_list').fadeIn('fast');
                            });

                            $("html, body").animate({scrollTop: $(document).height()}, 1000);

                            $("#name").val("");

                            $("#information").val("");
                        });
                }
            }
        });

        $("#degree_edit").click(function () {

            if ($('#name').val() == '') {
                $("#name").notify("Error! Enter degree Name", "error");
            } else {
                if ($('#information').val() == '') {
                    $("#information").notify("Error! Enter degree Information", "error");
                } else {
                    $.post("<?php echo base_url(); ?>admin/update_degree",
                        {
                            id: degreeID,
                            name: $('#name').val(),
                            information: $('#information').val()
                        },
                        function (data, status) {
                            Notify(data, null, null, 'success');

                            $('#degree_list').load(document.URL + ' #degree_list', function () {
                                $('#degree_list').fadeIn('fast');
                            });

                            $("html, body").animate({scrollTop: $(document).height()}, 1000);

                            $("#name").val("");

                            $("#information").val("");

                            $("#degree_edit").hide();

                            $("#degree_add").show();
                        });
                }
            }
        });
    });

    function degreeUpdateGetValue(id) {

        $.post("<?php echo base_url(); ?>admin/get_degree",
            {
                id: id
            },
            function (data, status) {

                jsonData = JSON.parse(data);

                degreeID = jsonData[0].id;

                $("#name").val(jsonData[0].name);

                $("#information").val(jsonData[0].information);

                $("#degree_add").hide();

                $("#degree_edit").show();
            });
    }

    function degreeDelete(id) {
        $.post("<?php echo base_url(); ?>admin/delete_degree",
            {
                id: id
            },
            function (data, status) {
                Notify(data, null, null, 'danger');

                $('#degree_list').load(document.URL + ' #degree_list', function () {
                    $('#degree_list').fadeIn('fast');
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

                    <div class="form-group">
                        <label>Name</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="Enter Degree Name"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Information</label>
                        <input id="information" class="form-control" type="text" name="information"
                               placeholder="Enter Information" required>
                    </div>


                    <button id="degree_add" type="button" class="btn btn-default">Add</button>
                    <button id="degree_edit" type="button" class="btn btn-default">Update</button>

                    <!--<button type="reset" class="btn btn-default" id="cancel">Cancel</button>-->

                </form>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h3 class="has-divider text-highlight">Degree Table</h3>

                <?php
                $degrees = $data["degrees"];
                ?>

                <div class="table-responsive">
                    <table id="degree_list" class="table table-bordered">
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
                        if ($degrees > 0) {
                            foreach ($degrees as $row_degree) {
                                $id = $row_degree->id;
                                $name = $row_degree->name;
                                $info = $row_degree->information;

                                ?>

                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $info; ?></td>
                                    <td>
                                        <button type="button" onclick="degreeUpdateGetValue(<?php echo $id; ?>)"
                                                class="btn btn-warning btn-block">Edit
                                        </button>

                                        <br>

                                        <button type="button" onclick="degreeDelete(<?php echo $id; ?>)"
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
