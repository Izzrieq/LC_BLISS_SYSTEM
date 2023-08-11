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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    


    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.6/b-2.4.1/sl-1.7.0/datatables.min.css"/>
<!-- <link rel="stylesheet" href="Editor-2.2.2/css/editor.dataTables.css"> -->
 
<script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.6/b-2.4.1/sl-1.7.0/datatables.min.js"></script>
<!-- <script src="Editor-2.2.2/js/dataTables.editor.js"></script> -->
</head>
<body >
<div class="container" >
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
                
                        </tr>
                    </thead>

                </table>
                <form id="edit-form">
                <input type="hidden" id="edit-id" name="edit-id">
                <label for="edit-name">Name:</label>
                <input type="text" id="edit-name" name="edit-name">
                <label for="edit-age">Age:</label>
                <input type="text" id="edit-age" name="edit-age">
                <button type="submit">Save Changes</button>
                </form>
            </div>
        </div>
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
                    { data: 'type' },
                ]
            });
           
            $(document).ready(function () {
        var empTable = $('#empTable').DataTable();

        // Row click event
        $('#empTable tbody').on('click', 'tr', function () {
            const row = empTable.row(this).data();
            console.log('Clicked:', row);

            // Show a confirmation dialog for editing
            if (confirm('Do you want to edit this row?')) {
                // Get the data-id attribute to identify the row
                const dataId = $(this).data('id');

                
                // Redirect to the update.php page with the ID as a query parameter
                window.location.href = 'test_update.php?id=' + dataId;
            }
        });
    });
    });


            // var empTable = $('#empTable').DataTable();
 
            // $('#empTable').on( 'click', 'tbody tr', function () {
            // const row = empTable.row($(this).closest('tr')).data();
            // const row = empTable.row($(this).closest('tr')).remove().draw(true);
            // console.log('Delete:', row);
            // } );


            // var empTable = $('#empTable').DataTable();
 
            // $('#empTable').on( 'click', 'tbody tr', function () {
            // empDataTable.row( this ).edit( {
            // buttons: [
            // { label: 'Cancel', fn: function () { this.close(); } },
            // 'Edit'
            // ]
            // } );

        //     var empTable = $('#empTable').DataTable();
 
        // $('#empTable').on( 'click', function () {
        // empDataTable.row(this).destroy();
        // } );

    </script>
</body>

</html>