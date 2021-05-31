<?php
public function InsertMovieInformation()
    {
        if(isset($_POST['submitBtn']))
        {
            try
            {
                $movietitle = $_POST['title'];
                $director = $_POST['director_name'];
                $genre = $_POST['genre'];
                $releasedate = $_POST['releaseDate'];
                $actors = $_POST['actors'];
                $sql = "INSERT INTO `movieinfo`(`movieID`, `title`, `director`, `genre`, `releaseDate`, `actors`) VALUES (NULL,?,?,?,?,?)";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt -> execute([$movietitle,$director, $genre, $releasedate, $actors]);
                header('location:adminpage.php');
            }
            catch (PDOException $e)
            {
                echo $e ->GetMessage();
            }
        }
    }
    public function ShowAll()
    {
        try
        {$query = "SELECT * FROM `movieinfo`";
            $stmt = $this -> connect() -> query($query);
            echo "<table border = '1'>
                 <tr>
                 <th>Id</th>
                 <th>Title</th>
                 <th>Director</th>
                 <th>Genre</th>
                 <th>Release Date</th>
                 <th>Actors</th>
                 </tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo "<tr>";
                echo "<td>" . $row['movieID'] . "</td>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['director']."</td>";
                echo "<td>".$row['genre']."</td>";
                echo "<td>".$row['releaseDate']."</td>";
                echo "<td>".$row['actors']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        catch (PDOException $e)
        {
            echo "Error : ".$e->getMessage();
        }
    }
    public function RemoveMovies($id)
    {
        if(isset($_POST['submitMovTagsBtn']))
        {
            try
            {
                $movID = $id;
                $sql = "DELETE FROM `movieinfo`WHERE `movieID` = $movID";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt -> execute();
                header('location:movieAddPage.php');
            }
            catch (PDOException $e)
            {
                echo $e ->GetMessage();
            }
        }
    }
?>