<?php
// Database connection details
$servername = "localhost";
$username = "root";   // Default username for localhost
$password = "";       // Default password for localhost
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data
$sql = "SELECT `Sr No`, `Client Name`, `Contact Info`, `Received Date`, `Inventory Received`, `Reported Issues`, `Client Notes`,
 `Assigned Technician`, `Estimated Amount`, `Deadline`, `Status` FROM `mydt` WHERE 1";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
     <Title>   Hardik Traders </Title>

    <head>

            <style>
                #box {
                    width: auto;
                    height: 560px;
                    padding: 10px;
                    }
                #header{
                    width: auto;
                    height: 50px;
                    background-color: rgba(11, 12, 83, 0.836);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    color: white;
                    border-radius: 5px;
                }
                #searchBar{
                    width: 1250px;
                    padding: 7px;
                    font-size: 12px;
                    border: 1px solid;
                    border-radius: 5px;
                    outline: none;
                    }
                #searchBar:focus{
                    border-color: #0066cc;
                    box-shadow: 0 0 5px rgba;
                    }
                button{
                    width: auto;
                    height: 30px;
                    background-color: rgba(11, 12, 83, 0.836);
                    color: white;
                    border-radius: 5px;
                }
                h2{
                    letter-spacing: 0.2rem;
                    font-family: Verdana, Geneva, Tahoma, sans-serif;
                }
                input[type="button"]{
                    height: 30px;
                    background-color: rgba(11, 12, 83, 0.836);
                    color: white;
                    border-radius: 5px;
                    margin-top: 10px;
                    margin-left: 600px;

                }
                #popup{
                    width: auto;
                    height: 30px;
                    background-color: rgba(11, 12, 83, 0.836);
                    color: white;
                    border-radius: 5px;
                    margin-left: 50%;
                    margin-top: 20px;
                }
                #tb {
                    width: 100%;
                    margin-top: 20px;
                }
                table, th, td{
                    border: none;
                    border-collapse: collapse;
                    padding: 10px;
                    text-align: center;
                    font-family: verdana;
                }
                 th{
                    background-color: rgba(11, 12, 83, 0.836);
                    color: white;
                    font-size: 12px;
                }


           </style>    
        </head>
             <body>
                <div id="box">
                    <div id="header">
                            <h2> HARDIK TRADERS- CLIENT MANAGEMENT DASHBOARD </h2> 
                        </div> </br>
                            <input type="text" id="searchBar" placeholder="Search by Client Name or ID...">
                            <button type="Search"> Search </button> 
                            <button id="popup" onclick="openPopup()">  New Job Sheet </button>

                            <script>
                                function openPopup(){
                                    window.open('index.html','popupWindow','width=600, height=550, scrollbars=yes');
                                }
                            </script>

<table id="tb" border="1">
    <tr>
        <th>Sr No</th>
        <th>Client Id</th>
        <th>Client Name</th>
        <th>Contact Info</th>
        <th>Received Date</th>
        <th>Inventory Received</th>
        <th>Reported Issues</th>
        <th>Client Notes</th>
        <th>Assigned Technician</th>
        <th>Estimated Amount</th>
        <th>Deadline</th>
        <th>Status</th>
    </tr>

    <?php
     
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["Sr No"] . "</td>
                    <td>" . $row["Client Id"] . "</td>
                    <td>" . $row["Client Name"] . "</td>
                    <td>" . $row["Contact Info"] . "</td>
                    <td>" . $row["Received Date"] . "</td>
                    <td>" . $row["Inventory Received"] . "</td>
                    <td>" . $row["Reported Issues"] . "</td>
                    <td>" . $row["Client Notes"] . "</td>
                    <td>" . $row["Assigned Technician"] . "</td>
                    <td>" . $row["Estimated Amount"] . "</td>
                    <td>" . $row["Deadline"] . "</td>
                    <td>" . $row["Status"] . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='12'>No data found</td></tr>";
    }
    ?>

</table>

<?php
// Close the database connection
$conn->close();
?>
                            


                </div>






             </body>
    
</html>