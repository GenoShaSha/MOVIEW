<?php 
class Admin extends dbconnect
{
    public function ShowUsers()
    {
       try
       {
           $query = "SELECT * FROM `userinfo`";
           $stmt = $this -> connect() -> query($query);
           echo "<table border = '1'>
                <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Password</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Role</th>
                </tr>";
           while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
           {
               echo "<tr>";
               echo "<td>" . $row['id'] . "</td>";
               echo "<td>".$row['username']."</td>";
               echo "<td>".$row['userpassword']."</td>";
               echo "<td>".$row['fullname']."</td>";
               echo "<td>".$row['email']."</td>";
               echo "<td>".$row['dateofbirth']."</td>";
               echo "<td>".$row['role']."</td>";
               echo "</tr>";
           }
           echo "</table>";

       }
       catch (PDOException $e) 
       {
        echo "Error : ".$e->getMessage();
       }
    }
}


?>