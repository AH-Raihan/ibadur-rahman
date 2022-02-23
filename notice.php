<?php
if (!isset($_COOKIE['PHPLGA'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Azizul Hasan Raihan (AHR)">
    <title>নোটিশ বোর্ড</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/datatables-select.min.css">
    <link rel="stylesheet" href="css/custom.css">

</head>

<body>
    <h1 class="title"> <span class="backPage"></span>নোটিশ বোর্ড</h1>
    <div class="TableContainer">
        <button class="AddBtn" onclick="modalOpen('addNewNotice');">Add New</button>
        <table id="datatable" class="table table-striped table-responsive-lg table-bordered dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="noticeData">
                <?php
                require_once('core/config.php');
                $date = date('j');
                $select = "SELECT * FROM notice";
                $runQuery = mysqli_query($conn, $select);
                
                while ($data = mysqli_fetch_array($runQuery)) { ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['title']; ?></td>
                        <td><?php echo $data['date']; ?></td>
                        <td>
                            <button class="btn btn-info noticeEditBtn" onclick="modalOpen('editNotice'); editModal(this);" data-id="<?php echo $data['id']; ?>" data-editTitle="<?php echo $data['title']; ?>">Edit</button>
                            <button class="btn btn-info bg-danger" onclick="deleteModal(this);" data-id="<?php echo $data['id']; ?>">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <div class="modalMy d-none" id="addNewNotice">
        <div class="modalMyContainer">
            <div class="modalMyHeader">
                <h2>Add New Notice</h2>
            </div>
            <div class="modalMyBody">
                <div class="row">
                    <label for="title" class="col-sm-12">
                        Title <input id="title" type="text" class="form-control" placeholder="Notice Title">
                    </label>
                </div>
            </div>
            <div class="modalMyFooter">
                <div class="row">
                    <button class="download" id="addNewNoticeBtn">Add</button>
                    <button class="cencel" onclick="cencel(this);">Cencel</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modalMy d-none" id="editNotice">
        <div class="modalMyContainer">
            <div class="modalMyHeader">
                <h2>Edit Notice</h2>
            </div>
            <div class="modalMyBody">
                <div class="row">
                    <label for="title" class="col-sm-12">
                        Title <input id="titleEdit" type="text" class="form-control" placeholder="Notice Title">
                    </label>
                </div>
            </div>
            <div class="modalMyFooter">
                <div class="row">
                    <button class="download" id="editNoticeBtn">Save</button>
                    <button class="cencel" onclick="cencel(this);">Cencel</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/datatables-select.min.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="js/init.js"></script>
    <script src="js/custom.js"></script>
    <script>
        var editNoticeBtn = document.getElementById('editNoticeBtn');
        $('#addNewNoticeBtn').click(function() {
            var title = $("#title").val();
            if (title.length === 0) {
                toastMy('Title Is Empty!');
            } else {
                $('#addNewNoticeBtn').attr('disabled', 'true');
                NoticeInsertToDatabase(title);
            }
        });

        function NoticeInsertToDatabase(title) {
            axios.post(`core/notice_core.php?title=${title}`)
                .then(function(response) {
                    toastMy(response.data);
                    noticeDataGet();
                    $('#addNewNoticeBtn').attr('disabled', 'false');
                })
                .catch(function(error) {
                    toastMy(error.data);
                })
        }

        function noticeDataGet() {
            axios.post('core/noticeGetData.php')
                .then(function(response) {
                    $('#addNewNotice').addClass('d-none');
                    $('#noticeData').html(response.data);
                })
                .catch(function(error) {
                    toastMy(error.data);
                })
        }

        function editModal(This) {
            let idThis = This.getAttribute('data-id');
            let titleValue = This.getAttribute('data-editTitle');
            editNoticeBtn.setAttribute('data-id', idThis);
            $('#titleEdit').val(titleValue);
        }

        editNoticeBtn.addEventListener('click', function() {
            editNoticeBtn.setAttribute('disabled', 'true');
            let titleEdit = $('#titleEdit').val();
            let id = editNoticeBtn.getAttribute('data-id');

            axios.post(`core/updateNotice_core.php?id=${id}&&title=${titleEdit}`)
                .then(function(response) {
                    $('#editNotice').addClass('d-none');
                    noticeDataGet();
                    toastMy(response.data);
                    editNoticeBtn.setAttribute('disabled', 'false');
                })
                .catch(function(error) {
                    toastMy(error);
                })
        });

        function deleteModal(This) {
            let conf = confirm('Are You Sure');
            let id = This.getAttribute('data-id');
            if (conf == true) {
                axios.post(`core/deleteNotice_core.php?id=${id}`)
                    .then(function(response) {
                        toastMy(response.data);
                        noticeDataGet();
                    })
                    .catch(function(error) {
                        toastMy(error.data);
                    })
            }

        }
    </script>
</body>

</html>