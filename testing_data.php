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

<body>
    <header class="d-flex justify-content-between bg-white shadow bg-white">
        <div class="w-25 p-0 h-75 d-inline-block">
            <img class="w-100 m-0 h-100 d-inline-block" src="assets/images/LC_COMPANY LOGO_MARCH 2023-01.png"
                alt="logo">
        </div>
        <div class="p-0 ">
            <h1 class="mt-3 m-3 h1 text-primary">BLISS CUSTOMER E-LOG</h1>
        </div>
    </header>
    <ul class="nav bg-white px-5">
  <li class="nav-item">
    <a class="nav-link active" href="home.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="home.php">Return</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
</ul>
    <div class="container bg-white mt-5 shadow  mb-5 bg-white rounded">
        <div class="row p-3">
            <p>
                <h1>COMPLAIN DATA LIST</h1>
            </p>
            <div>
                <table id='empTable' class='display dataTable bg-secondary' width='100%'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DATE/TIME</th>
                            <th>CUSTOMER NAME</th>
                            <th>CUSTOMER NO.HP</th>
                            <th>CATEGORY</th>
                            <th>TYPE</th>
                            <th>TEST</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var empDataTable = $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url': 'ajaxfile.php'
                },
                pageLength: 5,
                'columns': [{
                        data: 'id'
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'cname'
                    },
                    {
                        data: 'cnohp'
                    },
                    {
                        data: 'category'
                    },
                    {
                        data: 'type'
                    },
                ]
            });
        });
    </script>
</body>

</html>