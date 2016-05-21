<?php
/**
 * Created by PhpStorm.
 * User: Maruf
 * Date: 24.Mar.16
 * Time: 08:33 AM
 */
?>

<script>
    function _(el) {
        return document.getElementById(el);
    }
    function uploadSlide() {
        $("#loaded_n_total").show();

        var file1 = _("slide").files[0];

        //alert(file1.name + " | " + file1.size + " | " + file1.type);

        var fileFlag = 1;

        /*if (file.type != "application/pdf") {
         fileFlag = 0;
         }*/

        if (fileFlag == 0) {
            alert("Invalid File Format");
            window.location = "<?php echo base_url(); ?>admin/slides";
        } else {
            var formdata = new FormData();

            formdata.append("slide", file1);

            formdata.append("name", document.getElementById('name').value);

            var e = document.getElementById("department_id");
            var department_id = e.options[e.selectedIndex].value;
            formdata.append("department_id", department_id);

            var e = document.getElementById("category_id");
            var category_id = e.options[e.selectedIndex].value;
            formdata.append("category_id", category_id);

            formdata.append("topic", document.getElementById('topic').value);

            var e = document.getElementById("stage");
            var stage = e.options[e.selectedIndex].value;
            formdata.append("stage", stage);

            //alert(document.getElementById('name').value + department_id + category_id + document.getElementById('topic').value + stage);

            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "<?php echo base_url(); ?>admin/add_slide");
            ajax.send(formdata);
        }
    }

    function progressHandler(event) {
        _("loaded_n_total").innerHTML = "Uploaded " + Math.round(event.loaded / 1024) + " MB of " + Math.round(event.total / 1024);

        var percent = (event.loaded / event.total) * 100;

        //_("progressBar").value = Math.round(percent);
        //_("status").innerHTML = Math.round(percent) + "% uploaded... please wait";

        $("#progressBar").css("width", Math.round(percent) + "%");
        $("#progressBar").html(Math.round(percent) + "%");
    }

    function completeHandler(event) {
        _("status").innerHTML = event.target.responseText;
        //_("progressBar").value = 0;
        //window.location = "<?php echo base_url(); ?>admin/slides";

        Notify("Successful", null, null, 'Success');

        $('#slide_list').load(document.URL + ' #slide_list', function () {
            $('#slide_list').fadeIn('fast');
        });

        $("html, body").animate({scrollTop: $(document).height()}, 1000);

        $("#loaded_n_total").hide();

        $("#progressBar").css("width", 0);
        $("#progressBar").html("0" + "%");
    }

    function errorHandler(event) {
        _("status").innerHTML = "Upload Failed" + event.target.responseText;
        //Notify("Upload Failed", null, null, 'danger');
    }

    function abortHandler(event) {
        _("status").innerHTML = "Upload Aborted";
    }

    function slideDelete(id) {
        $.post("<?php echo base_url(); ?>admin/delete_slide",
            {
                id: id
            },
            function (data, status) {
                Notify(data, null, null, 'danger');

                $('#slide_list').load(document.URL + ' #slide_list', function () {
                    $('#slide_list').fadeIn('fast');
                });

                $("html, body").animate({scrollTop: $(document).height()}, 1000);
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
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> <?php echo $data["title"]; ?>
                    </li>
                </ol>
            </div>
            <div class="col-lg-12">

                <form id="upload_form" role="form" enctype="multipart/form-data" method="post">

                    <div class="form-group">
                        <label>Name</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="Enter Slide Name"
                               required>
                    </div>


                    <?php
                    $categories = $select["categories"];
                    $departments = $select["departments"];
                    ?>


                    <div class="form-group">
                        <label>Select Department</label>
                        <select id="department_id" class="form-control" required>
                            <option value="">None</option>
                            <?php
                            if ($departments > 0) {
                                foreach ($departments as $row_department) {
                                    $department_id = $row_department->id;
                                    $department_name = $row_department->name;
                                    ?>
                                    <option
                                        value="<?php echo $department_id; ?>"><?php echo $department_name; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Select Category</label>
                        <select id="category_id" class="form-control" required>
                            <option value="">None</option>
                            <?php
                            if ($categories > 0) {
                                foreach ($categories as $row_category) {
                                    $category_id = $row_category->id;
                                    $category_name = $row_category->name;
                                    ?>
                                    <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Topics</label>
                        <input id="topic" class="form-control" type="text" name="topic" placeholder="Enter Slide Topics"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Serial (Stage)</label>
                        <select id="stage" class="form-control" required>
                            <option value="">None</option>
                            <option value="1">1.1</option>
                            <option value="2">1.2</option>
                            <option value="3">2.1</option>
                            <option value="4">2.2</option>
                            <option value="5">3.1</option>
                            <option value="6">3.2</option>
                            <option value="7">4.1</option>
                            <option value="8">4.2</option>
                            <option value="9">5.1</option>
                            <option value="10">5.2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Slide Upload</label>
                        <input type="file" name="slide" id="slide">
                    </div>

                    <button type="button" class="btn btn-default" onclick="uploadSlide()">Submit</button>

                    <button type="reset" class="btn btn-default" id="cancel">Cancel</button>

                    <div class="form-group">
                        <h3 id="status"></h3>

                        <p id="loaded_n_total"></p>

                        <div class="progress">
                            <div id="progressBar" class="progress-bar" role="progressbar"
                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:00%">
                                <span class="sr-only">00% Complete</span>
                            </div>
                        </div>
                    </div>


                </form>

            </div>

        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <h3 class="has-divider text-highlight">Slide Table</h3>

                <?php
                $slides = $data["slides"];
                ?>

                <div class="table-responsive">
                    <table id="slide_list" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($slides > 0) {
                            foreach ($slides as $row_slide) {
                                $id = $row_slide->id;
                                $name = $row_slide->name;
                                ?>

                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td>
                                        <button type="button" onclick="slideDelete(<?php echo $id; ?>)"
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