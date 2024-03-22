<?php
session_start();
require_once 'auth_validate.php';
// Include the header
require_once 'header.php';
?>

<!-- Modal for confirmation -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a id="deleteLink" href="#" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6 ps-0">
                    <h3>Bridals</h3>
                </div>
                <div class="col-sm-6 pe-0 text-end">
                    <a href="add_bridals.php" class="btn btn-primary"><i class="bi bi-plus"></i> Add Bridal</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <!-- <div class="card-header pb-0 card-no-border">
                        <h3>Admin User Data</h3>
                    </div> -->
                    <div class="card-body">
                        <div class="table-responsive custom-scrollbar">
                            <table class="display" id="basic-2">
                                <thead>
                                    <tr>
                                        <th>Created For</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Country</th>
                                        <th>Location</th>
                                        <th>Verification status</th>
                                        <th>Form Filled date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Database connection
                                    require_once 'config.php';

                                    // Fetch data from database
                                    $sql = "SELECT id, created_for, first_name, middle_name, last_name, email, phone_number, gender, country, statee FROM leads";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["created_for"] . "</td>";
                                            echo "<td>" . $row["first_name"] . $row["middle_name"]  . $row["last_name"] ."</td>";
                                            echo "<td>" . $row["email"] . "</td>";
                                            echo "<td>" . $row["phone_number"] . "</td>";
                                            echo "<td>" . $row["gender"] . "</td>";
                                            echo "<td>" . $row["country"] . "</td>";
                                            echo "<td>" . $row["statee"] . "</td>";
                                            echo "<td>" . $row["country"] . "</td>";
                                            echo "<td>" . $row["country"] . "</td>";
                                            // Action buttons
                                            echo "<td>";
                                            echo "<ul class='action'> ";
                                            echo "<li class='edit'><a href='edit_bridals.php?id=" . $row["id"] . "'<i class='bi bi-pencil-fill'></i></a></li>";                         
                                            echo "<li class='delete'><a href='#' onclick='confirmDelete(" . $row["id"] . ")'><i class='bi bi-trash-fill'></i></a></li>";
                                            echo "</ul>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No data found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Include the footer
require_once 'footer.php';
?>

<script>
    function confirmDelete(id) {
        var deleteLink = document.getElementById('deleteLink');
        deleteLink.href = 'delete_bridals.php?id=' + id;
        $('#confirmDeleteModal').modal('show');
    }
</script>
