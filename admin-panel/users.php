<?php include 'layouts/top.php' ?>
        <div class="tables">
            <div class="last-users">
                <div class="table-heading">
                    <h2>Last Users</h2>
                    <a href="#" class="btn">View All</a>
                </div>
                <table class="table-users table">
                    <thead class="table-users-head">
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                    <td>Actions</td>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Roman</td>
                        <td>Semenov</td>
                        <td>rsem@gmail.com</td>
                        <td>
                            <i class="far fa-eye show"></i>
                            <i class="far fa-edit edit"></i>
                            <i class="far fa-trash-alt delete"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
<?php include 'layouts/bottom.php' ?>