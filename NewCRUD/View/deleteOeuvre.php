<td>
    <form action="code.php" method="POST">
        <button type="submit" name="delete_student" value="<?=$row->id;?>" class="btn btn-danger">Delete</button>
    </form>
</td>
<?php
session_start();
include('dbcon.php');

if(isset($_POST['delete_student']))
{
    $student_id = $_POST['delete_student'];

    try {

        $query = "DELETE FROM students WHERE id=:stud_id";
        $statement = $conn->prepare($query);
        $data = [
            ':stud_id' => $student_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Deleted";
            header('Location: index.php');
            exit(0);
        }

    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>
<?php 
   session_start();
?>


<?php if(isset($_SESSION['message'])) : ?>
    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
<?php 
    unset($_SESSION['message']);
    endif; 
?>