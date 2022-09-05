<?php
include("config.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Multiple Array Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
      <div class="container">
        <h3>Insert Multiple data into database</h3>
        <form action="" method="POST">
            <?php
               if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
               } 
            ?>
            <div id="multiple_data">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email[]" id="email">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="phone_no">Phone No.</label>
                            <input type="text" class="form-control" name="phone_no[]" id="phone_no">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-danger form-control" id="add_more">Add</button>
                    </div>
                </div>
            </div>
            <input type="submit" class="form-control bg-dark text-light" name="insert" value="Insert Into Database">
        </form>
        <table class="table table-striped table-dark">
            <thead>
                <th>#id</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `users`";
                $sel= mysqli_query($conn,$sql);
                if(mysqli_num_rows($sel) > 0){
                    while($rows = mysqli_fetch_array($sel)){
                        ?>
                        <tr>
                            <td><?php echo $rows['id']; ?></td>
                            <td>
                                <span><a href="edit.php?id=<?php echo $rows['id'] ?>&action=views"><i class="fas fa-edit"></i></a></span>&nbsp|
                                <span><a href=""><i class="fas fa-eye text-info"></i></a></span>&nbsp|
                                &nbsp<span><a href=""><i class="fas fa-trash-alt text-danger"></i></a></span>
                            </td>
                        </tr>
                        <?php
                    }
                }else{
                    echo "No record found";
                }
                ?>
            </tbody>
        </table>
      </div>      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#add_more").on("click",function(e){
                e.preventDefault();
                $("#multiple_data").append('<div class="row">\
                <div class="col-sm-5">\
                    <div class="form-group">\
                        <label for="email">Email</label>\
                        <input type="email" class="form-control" name="email[]" id="email">\
                    </div>\
                </div>\
                <div class="col-sm-5">\
                    <div class="form-group">\
                        <label for="phone_no">Phone No.</label>\
                        <input type="text" class="form-control" name="phone_no[]" id="phone_no">\
                    </div>\
                </div>\
                <div class="col-sm-2">\
                    <button class="btn btn-success form-control" id="remove">Remove</button>\
                </div>\
            </div>');
            });

            $(document).on("click","#remove",function(e){
                e.preventDefault();
                $(this).closest(".row").remove();
                // console.log("Hello");
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>