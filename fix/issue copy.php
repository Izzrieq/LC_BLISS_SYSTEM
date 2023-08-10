<?php
include('../config/db_conn.php');
?>

<!-- First Dropdown: LCID -->
<select name="lcid" id="lcid">
    <option disabled selected value> -- select an option -- </option>  
    <?php
    $sql = "SELECT DISTINCT lcid FROM lcdetails";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        echo "<option value='".$row['lcid']."'>".$row['lcid']."</option>";
    }
    ?>
</select>

<!-- Second Dropdown: Owner Names -->
<select name="ownername" id="ownername">
    <option disabled selected value> -- select an option -- </option>  
</select>

<!-- Third Dropdown: Operator Numbers -->
<select name="operatornohp" id="operatornohp">
    <option disabled selected value> -- select an option -- </option>  
</select>

<script>
// JavaScript to handle cascading dropdowns
document.getElementById("lcid").addEventListener("change", function() {
    var lcid = this.value;
    
    // Clear previous options in ownername dropdown
    document.getElementById("ownername").innerHTML = "<option disabled selected value> -- select an option -- </option>";

    // Clear previous options in operatornohp dropdown
    document.getElementById("operatornohp").innerHTML = "<option disabled selected value> -- select an option -- </option>";

    if (lcid !== "") {
        // Make an AJAX request to fetch owner names based on selected lcid
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_owner_names.php?lcid=" + lcid, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("ownername").innerHTML += xhr.responseText;
            }
        };
        xhr.send();
    }
});

document.getElementById("ownername").addEventListener("change", function() {
    var ownername = this.value;
    
    // Clear previous options in operatornohp dropdown
    document.getElementById("operatornohp").innerHTML = "<option disabled selected value> -- select an option -- </option>";

    if (ownername !== "") {
        // Make an AJAX request to fetch operator numbers based on selected ownername
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_operator_numbers.php?ownername=" + ownername, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("operatornohp").innerHTML += xhr.responseText;
            }
        };
        xhr.send();
    }
});
</script>
