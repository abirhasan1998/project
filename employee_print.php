<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_blood";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
 
      <div id="printableArea">
        <h2 align="center"> Employee Information</h2>
        <table border="1" align="center">
    	
          <?php
          $id = $_GET["Employee_Id"];
          $sql = "SELECT * FROM tb_employee WHERE `Employee_Id` = '$id'";
          $result = mysqli_query($conn, $sql);

          if ($result->num_rows > 0) {
              echo "<table align=center border='1' cellpadding='10'><tr><th>Employee_Name</th><th>Employee_Id</th><th>Employee_Designation</th><th>Address</th><th>Contact_No</th></tr>";
              // output data of each row
              while($row = $result->fetch_assoc()) {
                 echo "<tr><td>".$row['Employee_Name']."</td><td>".$row['Employee_Id']."</td><td>".$row['Employee_Designation']."</td><td>".$row['Address']."</td><td>".$row['Contact_No']."</td></tr>";

              }
              echo "</table>";
          }
          else {
              echo "0 results";
          }

		  
          mysqli_close($conn);
          ?>
        </table>
      </div>

      <br><br>
      <center><input type="button" onclick="printDiv('printableArea')" value="Print" /></center>

      <script>
      function printDiv(divName) {
          var printContents = document.getElementById(divName).innerHTML;
          var originalContents = document.body.innerHTML;
          document.body.innerHTML = printContents;
          window.print();
          document.body.innerHTML = originalContents;
      }
    </script>