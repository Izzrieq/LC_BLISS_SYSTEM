<!doctype html>
<head>
    <title>PHP Mysql PDO CRUD Server Side Ajax DataTables</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
</head>
<body>
<div class="container">
    <br />
    <h3 align="center">PHP Mysql PDO CRUD Server Side Ajax DataTables</h3>   
    <br />
    <div align="right">
        <button type="button" id="add_button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
          Add Member
        </button>
    </div>
    <br />    
    <table id="member_table" class="table table-striped">  
        <thead bgcolor="#6cd8dc">
            <tr class="table-primary">
                <th width="30%">ID</th>
                <th width="50%">Date</th>  
                <th width="30%">Customer Name</th>
                <th width="30%">Customer No HP</th>
                <th width="30%">Category</th>
                <th width="30%">Type</th>
                <th scope="col" width="5%">Edit</th>
                <th scope="col" width="5%">Delete</th>
            </tr>
        </thead>
    </table>
     
    <div class="modal" id="userModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Member</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" id="member_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>ID</label>
                    <input type="text" name="id" id="id" class="form-control" />
                    <br />
                    <label>date</label>
                    <input type="text" name="date" id="date" class="form-control" />
                    <br /> 
                    <label>Customer Name</label>
                    <input type="text" name="cname" id="cname" class="form-control" />
                    <br /> 
                    <label>Customer No HP</label>
                    <input type="text" name="cnohp" id="cnohp" class="form-control" />
                    <br /> 
                    <label>Category</label>
                    <input type="text" name="category" id="category" class="form-control" />
                    <br /> 
                    <label>Type</label>
                    <input type="text" name="type" id="type" class="form-control" />
                    <br /> 
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="member_id" id="member_id" />
                    <input type="hidden" name="operation" id="operation" />
                    <input type="submit" name="action" id="action" class="btn btn-primary" value="Add" />
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>  
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    $('#add_button').click(function(){
        $('#member_form')[0].reset();
        $('.modal-title').text("Add New Details");
        $('#action').val("Add");
        $('#operation').val("Add");
    });
     
    var dataTable = $('#member_table').DataTable({
        "paging":true,
        "processing":true,
        "serverSide":true,
        "order": [],
        "info":true,
        "ajax":{
            url:"fetch.php",
            type:"POST"
               },
        "columnDefs":[
            {
                "targets":[0,3,4],
                "orderable":false,
            },
        ],    
    });
 
    $(document).on('submit', '#member_form', function(event){
        event.preventDefault();
        var id = $('#id').val();
        var date = $('#date').val();
        var cname = $('#cname').val();
        var cnohp = $('#cnohp').val();
        var category = $('#category').val();
        var type = $('#type').val();
         
        if(cname != '' && cnohp != '')
        {
            $.ajax({
                url:"insertupdated.php",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                success:function(data)
                {
                    $('#member_form')[0].reset();
                    $('#userModal').modal('hide');
                    dataTable.ajax.reload();
                }
            });
        }
        else
        {
            alert("Name, email Fields are Required");
        }
    });
     
    $(document).on('click', '.update', function(){
        var member_id = $(this).attr("id");
        $.ajax({
            url:"fetch_single.php",
            method:"POST",
            data:{member_id:member_id},
            dataType:"json",
            success:function(data)
            {
                $('#userModal').modal('show');
                $('#id').val(data.id);
                $('#date').val(data.date);
                $('#cname').val(data.cname);
                $('#cnohp').val(data.cnohp);
                $('#category').val(data.category);
                $('#type').val(data.type);
                $('.modal-title').text("Edit Member Details");
                $('#member_id').val(member_id);
                $('#action').val("Save");
                $('#operation').val("Edit");
            }
        })
    });
     
    $(document).on('click', '.delete', function(){
        var member_id = $(this).attr("id");
        if(confirm("Are you sure you want to delete this user?"))
        {
            $.ajax({
                url:"delete.php",
                method:"POST",
                data:{member_id:member_id},
                success:function(data)
                {
                    dataTable.ajax.reload();
                }
            });
        }
        else
        {
            return false;   
        }
    });
     
     
});
</script>             
</body>
</html>