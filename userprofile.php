<?php
session_start();

require 'C:\xampp\htdocs\FOUNOON\Controller\UserC.php';
$userC = new UserC();
$userEmail = '';
$username = '';
$userId = '';

// Check if the user is logged in
if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {
    $userId = $_SESSION['idUser'];
    $userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styleprofile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Profile settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="card-body media align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="media-body">
                                    <form method="POST" action="processupdate.php" id="updateForm" enctype="multipart/form-data">
                                        <hr class="border-light m-0">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control mb-1" name="username" value="<?php echo htmlspecialchars($username); ?>">
                                                <input type="hidden" name="currentUsername" value="<?php echo htmlspecialchars($username); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control mb-1" name="email" value="<?php echo htmlspecialchars($userEmail); ?>">
                                            </div>
                                            <div class="text-right mt-3">
                                                <button type="submit" name="update" id="updateP">Update Profile</button>&nbsp;
                                            </div>
                                        </div>
                                    </form>
                                    <form method="POST" action="validate.php" id="cancelForm">
                                        <div class="text-right mt-3">
                                            <button type="submit" class="btn btn-default">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
