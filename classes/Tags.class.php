<?php
public function InsertTags()
{
    if(isset($_POST['submitTagsBtn']))
    {
        try
        {
            $tagName = trim($_POST['tag_name']);
            $sql = "INSERT INTO `taginfo`(`tagID`, `tagName`) VALUES (NULL,?)";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt -> execute([$tagName]);
            header('location:tagsAddPage.php');
        }
        catch (PDOException $e)
        {
            echo $e ->GetMessage();
        }
    }
}
public function Remove($id)
    {
        if(isset($_POST['submitRmvTagsBtn']))
        {
            try
            {
                $tagID = $id;
                $sql = "DELETE FROM `taginfo`WHERE `tagID` = $tagID";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt -> execute();
            }
            catch (PDOException $e)
            {
                echo $e ->GetMessage();
            }
        }
    }
    public function Show()
    {
        try
        {$query = "SELECT * FROM `taginfo`";
            $stmt = $this -> connect() -> query($query);
            echo "<table border = '1'>
                 <tr>
                 <th>Id</th>
                 <th>Tag</th>
                 </tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo "<tr>";
                echo "<td>" . $row['tagID'] . "</td>";
                echo "<td>".$row['tagName']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        catch (PDOException $e)
        {
            echo "Error : ".$e->getMessage();
        }
    }
?>