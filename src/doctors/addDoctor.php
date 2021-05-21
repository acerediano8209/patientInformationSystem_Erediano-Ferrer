<?php session_start(); ?>
<?php include "../../includes/dao.php" ?>
<?php include "../../includes/doctors/DoctorsController.php";
?>

<div class="container">
    <?= $jumbo->getJumbo("Add doctor", "Add doctors Details") ?>
    <form method='POST' class='addD' action='#' onsubmit="addDoctor()">
        <input type="hidden" name="type" value="addDoctor" id="">
        <div class='form-group'>
            <label for='in_D_Firstname'>Firstname</label>
            <input name='in_D_Firstname' id='in_D_Firstname' class='form-control' type='text' placeholder='Firstname' required>
        </div>
        <div class='form-group'>
            <label for='in_D_Lastname'>Lastname</label>
            <input name='in_D_Lastname' id='in_D_Lastname' class='form-control' type='text' placeholder='Lastname' required>
        </div>
        <div class='form-group'>
            <label for='in_Address'>Address</label>
            <textarea name='in_D_Address' id='in_D_Address' class=' form-control' rows='5' placeholder='Address' required></textarea>
        </div>
        <div class='form-group'>
            <label for='in_D_Contact'>Contact</label>
            <input name='in_D_Contact' id='in_D_Contact' class='form-control' type='text' placeholder='Contact' required>
        </div>
        <div class='form-group'>
            <input type="submit" value="Add Doctor" class="btn btn-success">
        </div>
    </form>

    <?php include "../../includes/footer.php"; ?>

    <script>
        function addDoctor(e) {
            event.preventDefault();
            var form = $('.addD').serialize();
            $.ajax({
                type: 'POST',
                url: '../../includes/doctors/DoctorsController.php',
                data: form,
                beforeSend: function() {
                    Swal.fire({
                        title: "Adding Doctor",
                        type: "info",
                        timer: 10000,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {}, 100)
                        }
                    });
                },
                success: function(resp) {
                    if (resp == "success") {
                        Swal.fire({
                            title: "Doctor added succesfully",
                            type: "success",
                        }).then(result => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: "Error" + resp,
                            type: "error",
                        }).then(result => {
                            window.location.reload();
                        });
                    }
                },

            })
        }
    </script>