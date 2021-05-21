<?php session_start(); ?>
<?php include "../../includes/dao.php" ?>
<?php include "../../includes/beds/BedsController.php";
?>

<div class="container">
    <?= $jumbo->getJumbo("Add Bed", "Add Bed Details") ?>
    <form method='POST' class='addB' action='#' onsubmit="addBed()">
        <input type="hidden" name="type" value="addBed" id="">
        <div class='form-group'>
            <label for='in_bedname'>Bed Name</label>
            <input name='in_bedname' id='in_bedname' class='form-control' type='text' placeholder='bedname' required>
        </div>
        <div class='form-group'>
            <label for='in_rateperday'>Rate per Day</label>
            <input name='in_rateperday' id='in_rateperday' class='form-control' type='text' placeholder='rateperday' required>
        </div>
        <div class='form-group'>
            <label for='in_bedtype'>Bed Type</label>
            <textarea name='in_bedtype' id='in_bedtype' class=' form-control' rows='5' placeholder='bedtype' required></textarea>
        </div>
        <div class='form-group'>
            <input type="submit" value="Add Bed" class="btn btn-success">
        </div>
    </form>

    <?php include "../../includes/footer.php"; ?>

    <script>
        function addBed(e) {
            event.preventDefault();
            var form = $('.addB').serialize();
            $.ajax({
                type: 'POST',
                url: '../../includes/beds/BedsController.php',
                data: form,
                beforeSend: function() {
                    Swal.fire({
                        title: "Adding Bed",
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
                            title: "Bed details added succesfully",
                            type: "success",
                        }).then(result => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: "Error adding Bed details" + resp,
                            type: "error",
                        }).then(result => {
                            window.location.reload();
                        });
                    }
                },

            })
        }
    </script>