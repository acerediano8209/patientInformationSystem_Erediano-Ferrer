<?php session_start(); ?>
<?php include "../../includes/dao.php" ?>
<?php include "../../includes/doctors/DoctorsController.php";
$doctors = new DoctorsController();
$GetDoctor = $doctors->updateDoctors($_GET['doctor_id']);
$doctor = $GetDoctor->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
    <?= $jumbo->getJumbo("Add " . $doctor['d_firstname'] . " " . $doctor['d_lastname'] . "", "<a href='viewDoctors.php'>View Doctors List</a>") ?>

    <form method='POST' class='editD' action='#' onsubmit="editDoctor()">
        <input type="hidden" name="type" value="editDoctor" id="">
        <input type="hidden" name="doctor_id" value="<?= $_GET['doctor_id'] ?>" id="">
        <div class='form-group'>
            <label for='in_D_Firstname'>Firstname</label>
            <input name='in_D_Firstname' value="<?= $doctor['d_firstname'] ?>" id='in_D_Firstname' class='form-control' type='text' placeholder='Firstname' required>
        </div>
        <div class='form-group'>
            <label for='in_D_Lastname' value="<?= $doctor['d_lastname'] ?>" id='in_D_Lastname' class='form-control' type='text' placeholder='Lastname' required>
        </div>
        <div class='form-group'>
            <label for='in_D_Address'>Address</label>
            <input value='<?= $doctor['d_address'] ?>' name='in_D_Address' id='in_D_Address' class=' form-control' rows='5' placeholder='Address'>
        </div>

        <div class='form-group'>
            <label for='in_D_Contact'>Contact number</label>
            <input name='in_D_Contact' id='in_D_Contact' value="<?= $doctor['d_contact'] ?>" class='form-control' type='text' placeholder='Contact' required>
        </div>

        <div class='form-group'>
            <input type="submit" value="Edit Doctor" class="btn btn-success">
        </div>
</div>

<?php include "../../includes/footer.php"; ?>


<script>
    function editDoctor(e) {
        event.preventDefault();
        var form = $('.editD').serialize();
        $.ajax({
            type: 'POST',
            url: '../../includes/doctors/DoctorsController.php',
            data: form,
            beforeSend: function() {
                Swal.fire({
                    title: "Processing request",
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
                        title: "Doctor Updated succesfully",
                        type: "success",
                    }).then(result => {
                        window.history.back();
                    });
                } else {
                    Swal.fire({
                        title: "Error" + resp,
                        type: "error",
                    }).then(result => {
                        window.history.back();
                    });
                }
            },

        })
    }
</script>