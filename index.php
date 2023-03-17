<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>

    <link href="style.css" rel="stylesheet">
    <title>uplodafile</title>
</head>

<body>

    <br>
    <div class="container ">
        <br>
        <div class="shadow p-2 rounded">
            <br>
            <h3 class="text-center header">อัพโหลดไฟล์</h3>
            <form>
                <div class="input-group mb-3">
                    <input enctype="multipart/form-data" id="upload" type=file name="files[]" class="form-control" placeholder="ชื่อไฟล์" aria-label="Recipient's file">
                    <button class="btn btn-outline-secondary" type="button" onclick="uploadfile()">อัพโหลด</button>
                </div>
            </form>
            <!-- <button class="btn" onclick="test()">test</button> -->
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-sm ">
                    <thead>
                        <tr>
                            <!-- <th class="text-center">std_id</th> -->
                            <th class="text-center">std_code</th>
                            <th class="text-center">std_tname</th>
                            <th class="text-center">std_fname</th>
                            <th class="text-center">std_lname</th>
                            <th class="text-center">std_phone</th>
                            <th class="text-center">std_email</th>
                            <th class="text-center">std_race</th>
                            <th class="text-center">std_nationnality</th>
                            <th class="text-center">branch_id</th>
                            <th class="text-center">department_id</th>
                            <th class="text-center">admin_id</th>
                        </tr>
                    </thead>
                    <tbody id="records_table">

                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <br>
    </div>

</body>
<script>
    document.getElementById('upload').addEventListener('change', handleFileSelect, false);
    var json_object;
    var status_branch_error = 1;

    function handleFileSelect(evt) {

        var files = evt.target.files; // FileList object
        var xl2json = new ExcelToJSON();
        xl2json.parseExcel(files[0]);
    }
    var ExcelToJSON = function() {
        this.parseExcel = function(file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var data = e.target.result;
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    json_object = XL_row_object;

                    request = $.ajax({
                        url: "check-data.php",
                        type: "post",
                        data: {
                            data: json_object
                        }
                    });
                    request.done(function(response, textStatus, jqXHR) {
                        let res = JSON.parse(response);
                        // console.log(res);
                        if (res.status == 1) {
                            $('#records_table').append(res.table);
                            status_branch_error = res.status_branch_error
                        }
                    });
                    request.fail(function(jqXHR, textStatus, errorThrown) {
                        console.error(
                            "The following error occurred: " +
                            textStatus, errorThrown
                        );
                    });
                })
            };
            reader.onerror = function(ex) {
                console.log(ex);
            };
            reader.readAsBinaryString(file);
        };
    };


    function uploadfile() {
        if (!json_object) {
            alert("ไม่มีข้อมูล");
            return
        }else if(status_branch_error == 1){
            alert("โปรดตรวจสอบข้อมูลสาขาวิชาให้ถูกต้อง!!");
            return;
        }
        request = $.ajax({
            url: "upload-data.php",
            type: "post",
            data: {
                data: json_object
            }
        });
        request.done(function(response, textStatus, jqXHR) {
            console.log(response);
            if (response == "success") {
                alert("สำเร็จ!!");
            }
        });
        request.fail(function(jqXHR, textStatus, errorThrown) {
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });
    }
</script>





</html>