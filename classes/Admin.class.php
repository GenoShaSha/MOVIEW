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
    public function ShowMovies()
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
    public function UploadMovieImage()
    {
        if(isset($_POST['uploadMovieImgBtn']))
        {
            $filename = $_FILES["uploadfile"]["name"];
            $temp = $_FILES["uploadfile"]["tmp_name"];
            $folder = "images/MoviePics/".$filename;
            if(isset($_SESSION['sess_user_id']))
            {
               echo $filename; 
                    $id = $_SESSION['sess_user_id'];
                try
                {
                    $query = "INSERT INTO `movieinfo`(`movieID`, `moviePic`) VALUES ($id , $filename)  ON DUPLICATE KEY UPDATE 'movieImage' = $filename";             
                    $stmt = $this -> connect() -> prepare($query);
                    $stmt -> execute(); 
                }
                catch (PDOException $e)
                {
                    echo $e ->GetMessage();
                }
            }
        }
            move_uploaded_file($temp, $folder);
            $_SESSION['sess_profile_pic'] = [$folder];         
    }

}
?>