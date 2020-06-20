<?php
include 'header.php';
$table_name = 'items';
?>
<br><br><?php
if (isset($_FILES["import"])) {
    if (pathinfo($_FILES["import"]["name"],PATHINFO_EXTENSION)==="csv") {
        $targetPath = dirname(__FILE__)."/" .rand(11,99). $_FILES["import"]["name"];
        move_uploaded_file($_FILES["import"]["tmp_name"], $targetPath);
        $handle = fopen($targetPath, "r");
        $imported = 0; $failed = 0;
        while(($filesop = fgetcsv($handle, 1000, ",")) !== false) {
            if (!$col) {
                for ($i=0; $i < count($filesop); $i++) { 
                    $col[$i] = $filesop[$i];
                }
            } else {
                for ($i=0; $i < count($filesop); $i++) { 
                    $data[$col[$i]] = sanitize_text_field($filesop[$i]); 
                }
                insert($table_name,$data);
                if ($conn->insert_id) {
                    $imported++;
                } else {
                    $failed++;
                }
            }
        }
        echo $imported." rows imported. ".$failed." rows failed.";
        fclose($handle);
        unlink($targetPath);
    } else {
        $message = "Invalid File Type. Upload Excel File.";
        echo $message;
    }
}
if($_POST["action"]){
    $data["name"] = $_POST["iname"];
    if ($_FILES["photo"]) {
        $target_dir = "uploads/";
        $target_file = $target_dir .time(). basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if(isset($_POST["action"])) {
            $check = getimagesize($_FILES["photo"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        if ($_FILES["photo"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !=
        "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["photo"]["name"]). " has been
                uploaded.";
                $data["photo"] = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    $data["price"] = $_POST["price"];
    $data["pieces"] = $_POST["pieces"];
    $data["type"] = $_POST["type"];
    print_r($data);
    if($_POST["action"]=='Add'){
        echo "entered add if:";
        insert($table_name,$data);
    } else if($_POST["action"]=='Add New' || $_POST["action"]=='Edit'){
    $columns = rawurlencode('"name","photo","price","pieces","type"');
    ?>
    <h2>Import from CSV (excel)</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="import">
        <input type="submit" name="import_csv" value="Import (csv)" class="ui grey button">
        <a href="data:text/plain;charset=UTF-8,<?php echo $columns; ?>" download="filename.csv">Download Sample CSV</a>
    </form>
    <hr>
    <form method="POST" enctype="multipart/form-data">
        <h2 id="small_frm">Add New Here</h2>
        <input type="hidden" name="id">
        <table class="ui blue striped table collapsing">
        <tr>
            <td>Name</td>
            <td><input type="text" name="iname">
            </td>
        </tr>
        <tr>
        <td>Photo</td>
        <td>
            <img id="img_photo" style="max-width: 250px">
            <a id="link_photo">View</a><br>
            <input type="file" name="photo" id="photo" onchange="readURL(this)">
            <input type="hidden" name="photo_pid" id="photo_pid" value="0" />
        </td>
        <script type="text/javascript">
            function readURL(input) {
              if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $('#img_photo').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
              }
            }
            $("#photo").change(function() {
                readURL(this);
            $("#photo_pid").val("1");});
        </script>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="number" name="price" autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>Pieces</td>
            <td><input type="text" name="pieces" autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>Type</td>
            <td><input type="text" name="type" autocomplete="off">
            </td>
        </tr>
            <tr row-id="">
                <td></td>
                <td><input type="submit" name="action" value="Add" class="ui blue mini button"></td>
            </tr>
        </table>
        </form>
        <style type="text/css">
            .ui.dropdown{
                width: 100% !important;
            }
        </style>
        <?php
    }
    if($_POST["action"]=='Edit'){
        $id = $_POST["id"];
        $row = get_row("SELECT * FROM $table_name WHERE id = $id",ARRAY_A);
        $data = $row;
        ?>
        <script type="text/javascript">
            $('input[name=action]').val('Save');
            $('input[name=id]').val('<?php echo $_POST["id"]; ?>');
            $('#small_frm').html('Edit Here');
        </script>
    <script type="text/javascript">
        $('input[name=iname]').val('<?php echo $data["name"]; ?>');
        <?php
        $file_url = $data["photo"];
        ?>
        $('#img_photo').attr('src','<?php echo $file_url; ?>');
        $("#link_photo").attr("href","<?php echo $file_url; ?>");
        $("#link_photo").attr("target","_blank");
        $('input[name=price]').val('<?php echo $data["price"]; ?>');
        $('input[name=pieces]').val('<?php echo $data["pieces"]; ?>');
        $('input[name=type]').val('<?php echo $data["type"]; ?>');
    </script>
        <?php
    }
    if($_POST["action"]=='Save'){
        $id = $_POST["id"];
        update($table_name,$data,array('id' => $id));
    }
    if($_POST["action"]=='Delete'){
        $id = $_POST["id"];
        delete($table_name,array('id' => $id));
    }
} 
if(($_POST["action"]!='Edit') && $_POST["action"]!='Add New') {
    ?>
    <form method="POST">
        <input id="addnew" type="submit" name="action" value="Add New" class="ui green huge button" style="margin: 20px;">
    </form><br>
    <style type="text/css">
        #addnew{
            border-radius: 20px;
        }
    </style>
    <div style="overflow-x:auto">
    <table id="myTable" class="ui unstackable celled table dataTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Photo</th>
                <th>Price</th>
                <th>Pieces</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rows = get_results("SELECT * FROM $table_name ORDER BY id DESC");
            foreach($rows as $row){
                echo '<tr row-id="'.$row->id.'">';
                echo '<td>'.$row->name.'</td>';
                $file_url = $row->photo;
                echo '<td>';
                if($file_url){
                    echo '<a href="'.$file_url.'" target="_blank"><b>View<b></a>';
                }
                echo '</td>';
                echo '<td>'.$row->price.'</td>';
                echo '<td>'.$row->pieces.'</td>';
                echo '<td>'.$row->type.'</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    </div>
    <form method="post" id="action_form">
        <input type="hidden" name="id">
        <input type="hidden" name="action">
    </form>
    <script type="text/javascript">
        $(document).ready(function(){
            $("td:last-child").append('<i class="trash alternate red icon" onclick="delete_now(this)"></i> <i class="edit blue icon" onclick="edit_now(this)"></i>');
        });
        function edit_now(x){
            var id = $(x).parent().parent().attr("row-id");
            var frm = $("#action_form")
            frm.children("input[name=id]").val(id);
            frm.children("input[name=action]").val("Edit");
            frm.submit();
        }
        function delete_now(x){
            var id = $(x).parent().parent().attr("row-id");
            var frm = $("#action_form")
            frm.children("input[name=id]").val(id);
            frm.children("input[name=action]").val("Delete");
            if (confirm("Do you want to delete?")) {
            frm.submit();
            }
        }
    </script>
    <style type="text/css">
        .edit.icon, .trash.icon{
            float: right !important;
            font-size: 140%;
            cursor: pointer;
        }
    </style>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#myTable").DataTable( {
            dom: "Blfrtip",
            buttons: [
                "csv", "excel", "pdf", "print"
            ]
        } );
    } );
    </script>
    <?php
}