<?php
    include "config.php";
    if(isset($_POST['update'])){
        $user_id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        $sql = "UPDATE 'users' SET 'firstname'='$firstname', 'lastname' = '$lastname', 'email' = '$email', 'password'='$password', 'gender'='$gender' WHERE 'id' = '$user_id'";

        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo "record Updated succesfully";
        }
        else{
            echo "Error:" . $sql ."<br>". $conn->error;
        }
    }

    if(isset($GET['id'])){
        $user_id = $GET['id'];

        $sql = "SELECT *FROM 'users' WHERE 'id' = '$user_id'";
        $result = $conn->query($sql);

        if($result->num_rows>0){
            while($row = $result->fetch_assoc()) {
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $password = $row['password'];
                $gender = $row['gender'];
            }
    ?>
    <!DOCTYPE html>
        <html>
            <head>
                <title>Form</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            </head>
            <body>
                <form action="" method = "POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">First name</label>
                        <input type="hidden" class="form-control" name="user_id" vlaue="<?php echo $id;?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">First name</label>
                        <input type="email" class="form-control" name="firstname" vlaue="<?php echo $firstname;?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Last name</label>
                        <input type="password" class="form-control" name="lastname" vlaue="<?php echo $lastname;?>" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" vlaue="<?php echo $email;?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" vlaue="<?php echo $password;?>" id="exampleInputPassword1">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" vlaue="<?php if($gender == 'Male' ){echo "checked";}?> " id="flexRadioDefault1">
                        Male
                        <input class="form-check-input" type="radio" name="flexRadioDefault" vlaue="<?php if($gender == 'Female' ){echo "checked";}?> " id="flexRadioDefault1">
                        Female
                    </div>
                    <input type="submit" name="update" value = "Update" class="btn btn-primary">Submit />
                </form>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            </body>
        </html>
        <?php 
    } else {
        header('Location: view.php');
    }
}

