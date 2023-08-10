<!doctype html>
<html>

<head>
    <title>DataTable AJAX pagination using PHP and Mysqli</title>
    <link href='https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<body >
<div class="container" >
    <div class="row" style="padding:50px;">
        <p><h1>DataTable AJAX pagination using PHP and Mysqli</h1></p>
        <div >
            <table id='empTable' class='display dataTable' width='100%'>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>DATE/TIME</th>
                    <th>CUSTOMER NAME</th>
                    <th>CUSTOMER NO.HP</th>
                    <th>CATEGORY</th>
                    <th>TYPE</th>
                </tr>
                </thead>
                 
            </table>
        </div>
   </div>
</div>
<script>
        $(document).ready(function(){
            var empDataTable = $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url': 'ajaxfile.php'
                },
                pageLength: 5,
                'columns': [
                    { data: 'id' },
                    { data: 'date' },
                    { data: 'cname' },
                    { data: 'cnohp' },
                    { data: 'category' },
                    { data: 'type' }
                ]
            });
        });
    </script>
</body>

</html>