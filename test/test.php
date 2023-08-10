<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <div class="row" style="padding:50px;">
            <h1>Data table</h1>
            <div class="table">
                <table width="100%" id="empTable" class="display dataTable">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                DATE/TIME
                            </th>
                            <th>
                                CUSTOMER NAME
                            </th>
                            <th>
                                CUSTOMER NO.HP
                            </th>
                            <th>
                                CATEGORY
                            </th>
                            <th>
                                TYPE
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script>
        .$(document).ready(function () {
            var empDatatable = $('#empTable').DataTable({
                'processing' : true,
                'serverside' : true,
                'servermethod' : 'post',
                'ajax' : {
                    'url' : 'test_ajax.php'
                },
                pageLength: 10,
                'columns' : [
                    { data: 'id'},
                    { data: 'date'},
                    { data: 'cname'},
                    { data: 'cnohp'},
                    { data: 'category'},
                    { data: 'type'},
                ]
            });
        });
    </script>
</body>

</html>