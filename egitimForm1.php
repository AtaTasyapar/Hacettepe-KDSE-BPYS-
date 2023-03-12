<?php
session_start();
if (!isset($_SESSION['userlogin'])) {
    header("Location: login-student.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
    header("Location: main.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>e-BYRYS-KKDS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="style.css" rel="stylesheet">

</head>

<body style="background-color:white">
    <div class="container-fluid pt-4 px-4">
        <?php
        require_once('config-students.php');
        $userid = $_SESSION['userlogin']['id'];
        //echo $userid;
        $sql = "SELECT * FROM  patients  WHERE id =" . $userid;
        $smtmselect = $db->prepare($sql);
        $result = $smtmselect->execute();
        if ($result) {
            $values = $smtmselect->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'error';
        }

        ?>
        <div class="send-patient ta-center">
            <span class='close closeBtn' id='closeBtn'>&times;</span>
            <h1 class="form-header">EĞİTİM GEREKSİNİMİ</h1>

        <div class="input-section d-flex justify-content-between" >
            <div>
                <input type="radio" name="radio1">
                <label for="radio1">Daha önce sağlık eğitimi</label>
            </div>
                <p class="usernamelabel">Konusu</p>
                <p class="usernamelabel">Kimden/Nereden aldı</p>
                <p class="usernamelabel">Ne zaman aldı</p>
        </div>
        <div class="input-section d-flex justify-content-between">
                <div class="w-25"></div>
                <input type="text" class="form-control">
                <input type="text" class="form-control">
                <input type="text" class="form-control">
        </div>
        <div class="input-section d-flex justify-content-between">
                <div class="w-25"></div>
                <input type="text" class="form-control">
                <input type="text" class="form-control">
                <input type="text" class="form-control">
        </div>

        <div class="input-section d-flex">
                <p class="usernamelabel">Sağlığınız ile ilgili hangi konularda eğitim almak istersiniz:</p>
                <input type="text" class="form-control">
        </div>

        <div>
                <div class="d-flex align-items-center justify-content-start">
                    <input type="checkbox" name="checkbox1" class="p-2">
                    <label class="p-2" for="checkbox1">Sağlık sorununuz olduğunda tıbbi tedavi ve bakım dışında başvurduğunuz herhangi bir kurum ya da yöntem var mı?</label>
                </div>
                <div class="input-section d-flex">
                    <p class="usernamelabel">Açıklayınız:</p>
                    <input type="text" class="form-control">
                </div>
        </div>


</div>
</div>






















            <script>
                $(function () {
                    $('#closeBtn').click(function (e) {
                        $("#content").load("formlar-student.php");

                    })
                });
            </script>

            <script>
                $(function () {
                    $('#submit').click(function (e) {


                        var valid = this.form.checkValidity();

                        if (valid) {
                            var id = <? php

                                $userid = $_SESSION['userlogin']['id'];
                                echo $userid
                                ?>;
                            var name = $('#name').val();
                            var surname = $('#surname').val();
                            var age = $('#age').val();
                            var not = $('#not').val();


                            e.preventDefault()

                            $.ajax({
                                type: 'POST',
                                url: 'student-patient.php',
                                data: {
                                    id: id,
                                    name: name,
                                    surname: surname,
                                    age: age,
                                    not: not

                                },
                                success: function (data) {
                                    alert("Success");
                                    location.reload(true)
                                },
                                error: function (data) {
                                    Swal.fire({
                                        'title': 'Errors',
                                        'text': 'There were errors',
                                        'type': 'error'
                                    })
                                }
                            })



                        }
                    })

                }); <
                    /> < !--JavaScript Libraries-- > <
    script src="https://code.jquery.com/jquery-3.4.1.min.js" >
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/chart/chart.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="lib/tempusdominus/js/moment.min.js"></script>
            <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

            <!-- Template Javascript -->
            <script src="main.js"></script>
</body>

</html>