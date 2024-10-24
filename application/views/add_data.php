<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $this->load->view('bt') ?>
</head>

<body>
    <?php $this->load->view('navbar') ?>
    <?php $this->load->view('modal_validate') ?>


    <div class="container">
        <div class="container-header mb-3">
            <h1>Add vendor name</h1>
            <hr>
            <button type='button' class='btn btn-outline-success' data-toggle='modal' data-target='#add_data'>New</button>
        </div>
        <div class="table-scroll p-3 border border-secondary mb-3 rounded ">
            <div class="table-scrollable table-responsive">
                <table class="table table-bordered table-striped table-fixed" id="example">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Vendor Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($add_data_list as $row) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["vendor_name"] . "</td>";
                            echo "<td><button class='btn btn-secondary mb-3' onclick=\"openEdit('"  . $row['id'] . "')\" >Edit</button></td>";
                            echo '<td><a href="' . site_url('main/vendor_delete/' . $row['id']) . '" class="btn btn-danger mb-3" >Delete</a></td>';
                            echo "</tr>";
                        }

                        ?>
                </table>
                <script>
                    function openEdit(id) {

                        document.getElementById("vendor_id").value = id;
                        $.ajax({
                            url: "<?php echo site_url('main/edit_vendor_name'); ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            dataType: "json",
                            success: function(response) { // เปลี่ยนชื่อเป็น response
                                document.getElementById("vendor_name").value = response.vendor_name;
                                $('#add_data_edit').modal('show');
                            },
                            error: function() {
                                alert("Error in fetching data");
                            }
                        });

                        console.log(vendor_name);

                        // alert(id);

                        // alert(vendor_name);
                        // $('#add_data_edit').modal('show');
                    }
                </script>

                
            </div>

        </div>

        <div class="container-header mb-3">
            <h1>Add Software</h1>
            <hr>
            <button type='button' class='btn btn-outline-success' data-toggle='modal' data-target='#add_data'>New</button>
        </div>
        <div class="table-scroll p-3 border border-secondary mb-3 rounded ">
            <div class="table-scrollable table-responsive">
                <table class="table table-bordered table-striped table-fixed" id="example">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Vendor Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($add_software_list as $row) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["software"] . "</td>";
                            echo "<td><button class='btn btn-secondary mb-3' onclick=\"openEdit('"  . $row['id'] . "')\" >Edit</button></td>";
                            echo '<td><a href="' . site_url('main/vendor_delete/' . $row['id']) . '" class="btn btn-danger mb-3" >Delete</a></td>';
                            echo "</tr>";
                        }

                        ?>
                </table>
                <script>
                    function openEdit(id) {

                        document.getElementById("vendor_id").value = id;
                        $.ajax({
                            url: "<?php echo site_url('main/edit_vendor_name'); ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            dataType: "json",
                            success: function(response) { // เปลี่ยนชื่อเป็น response
                                document.getElementById("vendor_name").value = response.vendor_name;
                                $('#add_data_edit').modal('show');
                            },
                            error: function() {
                                alert("Error in fetching data");
                            }
                        });

                        console.log(vendor_name);

                        // alert(id);

                        // alert(vendor_name);
                        // $('#add_data_edit').modal('show');
                    }
                </script>

                
            </div>

        </div>
    </div>

        

    <?php $this->load->view('footer'); ?>
</body>

</html>