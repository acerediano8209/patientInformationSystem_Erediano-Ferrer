<?php session_start(); ?>
<?php include "../../includes/dao.php" ?>
<?php include "../../includes/doctors/DoctorsController.php";
$doctors = new DoctorsController();
?>
<div class="container">
    <?= $jumbo->getJumbo("View  doctors", "View doctors List") ?>

    <?php $doctorsList = $doctors->viewAllDoctors(); ?>

    <table class="table table-responsive table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Contact Number</th>
        
            
           
        </thead>


        <tbody>
            <?php while ($row = $doctorsList->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?= $row['doctor_id'] ?></td>
                    <td><?= $row['d_firstname'] ?></td>
                    <td><?= $row['d_lastname'] ?></td>
                    <td><?= $row['d_address'] ?></td>
                    <td><?= $row['d_contact'] ?></td>
            
                   
                </tr>
            <?php } ?>
        </tbody>

    </table>

</div>



<?php include "../../includes/footer.php"; ?>


<script>
    function Delete(id) {
        event.preventDefault();
        Swal.fire({
            title: "Are You Sure You want to Delete Doctor with ID " + id + " ?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            animation: true,
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: '../../includes/doctors/DoctorsController.php',
                    data: {
                        type: "deleteDoctor",
                        id: id
                    },
                    beforeSend: function() {
                        Swal.fire({
                            title: "Deleting Doctor",
                            type: "info",
                            text: "Deleting Doctor " + id,
                            icon: "info",
                        })
                    },
                    success: function(resp) {
                        if (resp = "success") {
                            Swal.fire({
                                text: "Doctor Deleted",
                                type: "success",
                                showConfirmButton: true,
                                timer: 10000,
                                animation: true,
                            }).then(result => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                type: "error",
                                text: "Something Went Wrong " + resp,
                                icon: "error",
                                button: "Try Again",
                                showConfirmButton: true,
                            }).then(result => {
                                window.location.reload();
                            });
                        }
                    }
                });
            }
        });

    }

   
</script>

<script>
    function modal(id) {
        event.preventDefault();
        $('.modal').modal('show');
        $('.id').attr("value", id);
    }
</script>