<?php session_start(); ?>
<?php include "../../includes/dao.php" ?>
<?php include "../../includes/beds/BedsController.php";
$beds = new BedsController();
?>
<div class="container">
    <?= $jumbo->getJumbo("View  beds", "View beds list") ?>

    <?php $bedsList = $beds->viewAllBeds(); ?>

    <table class="table table-responsive table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Bed/room name</th>
            <th>Rate per Day</th>
            <th>Bed Type</th>
           
           
        </thead>


        <tbody>
            <?php while ($row = $bedsList->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?= $row['bed_id'] ?></td>
                    <td><?= $row['bedname'] ?></td>
                    <td><?= $row['rateperday'] ?></td>
                    <td><?= $row['bedtype'] ?></td>
                   
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
            title: "Are You Sure You want to Delete Bed with ID " + id + " ?",
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
                    url: '../../includes/beds/BedsController.php',
                    data: {
                        type: "deleteBed",
                        id: id
                    },
                    beforeSend: function() {
                        Swal.fire({
                            title: "Deleting Bed",
                            type: "info",
                            text: "Deleting Bed " + id,
                            icon: "info",
                        })
                    },
                    success: function(resp) {
                        if (resp = "success") {
                            Swal.fire({
                                text: "Bed Deleted",
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