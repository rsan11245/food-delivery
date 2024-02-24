<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/admin-panel.css">
</head>
<body>


<div class="container">
    <div class="sidebar">
        <ul>
            <li>
                <a href="#">
                    <span class="title">PizzaRia</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-sharp fa-solid fa-users"></i>
                    <span class="title">Users</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-pizza-slice"></i>
                    <span class="title">Products</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main">
        <div class="top-bar">
            <div class="search">
                <input type="text" name="search">
                <label for="search"><i class="fas fa-search"></i></label>
            </div>
            <i class="fas fa-bell"></i>
            <div class="user">
                <img src="../../images/1077114.png" alt="">
            </div>
        </div>
        <div class="cards">
            <div class="card">
                <div class="card-content">
                    <div class="number">12</div>
                    <div class="card-name">Users</div>
                </div>
                <div class="icon-box">
                    <i class="fa-sharp fa-solid fa-users"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="number">20</div>
                    <div class="card-name">Products</div>
                </div>
                <div class="icon-box">
                    <i class="fa-solid fa-pizza-slice"></i>
                </div>
            </div>
        </div>

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
    </div>
</div>

<script src="https://kit.fontawesome.com/c3beaedb94.js" crossorigin="anonymous"></script>
</body>
</html>