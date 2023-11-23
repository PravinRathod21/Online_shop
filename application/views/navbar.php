<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>


  <link rel="stylesheet" href="http://localhost:8080/coreigniter_4/css/style.css">
  <!-- 
  Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <!-- Navbar start -->
  <div class="sidebar">
    <div class="logo_details">
      <span class="logo_name"></span>
      <button style="width: 16%;height: 50%; margin-left: 63%; background: #001c4f;     border: 0px solid #ced4da;"
        class="hide ">
        <svg xmlns="http://www.w3.org/2000/svg" style="    margin-left: -34%; " width="32" height="32" fill="white"
          class="bi bi-x-square" viewBox="0 0 16 16">
          <path
            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
          <path
            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
        </svg>
      </button>
    </div>
    <ul class="nav-links">
      <li style="text-align:center;">
        
          <img src="http://localhost:8080/coreigniter_4/image/16.png" alt="" width="50" height="50"
            style="    border-radius: 20%;">
        
      </li>
      <li>
          <span class="link-name" style="   margin-left: 30%; color: white;"><b>Online_shop</b></span>
        
      </li>
      <li id="electronic_item" style="    margin-top: 10%;">
        <span class="link-name" style="color: white;    margin-left: 10%; "> Electronic </span>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-caret-down-fill"
          id="elec_down" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-chevron-up"
          id="elec_up" style="display:none;" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
        </svg>
      </li>
      <ul id="elec_item" style="color: white;    display:none ; ">
        <li>Smart Phone</li>
        <li>TV</li>
        <li>Laptop</li>
        <li>Watch</li>
      </ul>
      <li id="Sports_item">
        <span class="link-name" style="color: white;    margin-left: 10%; "> Sports</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-caret-down-fill"
          id="sport_down" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-chevron-up"
          id="sport_up" style="display:none;" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
        </svg>
      </li>
      <ul id="spor_item" style="color: white;    display:none ; ">
        <li>Smart Phone</li>
        <li>TV</li>
        <li>Laptop</li>
        <li>Watch</li>
      </ul>
      <li id="clothe_item">
        <span class="link-name" style="color: white;    margin-left: 10%; "> Clothes</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-caret-down-fill"
          id="clo_down" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-chevron-up"
          id="clo_up" style="display:none;" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
        </svg>
      </li>
      <ul id="cloth_item" style="color: white;    display:none ; ">
        <li>Male</li>
        <li>Female</li>
      </ul>
    </ul>
  </div>


  <!-- home-content -->
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <button class="show form-control" style="      border: 0px solid #ced4da;">
          <svg xmlns="http://www.w3.org/2000/svg" class="sidebarBtn" width="25" height="25" fill="currentColor"
            class="bi bi-menu-button-wide" viewBox="0 0 16 16">
            <path
              d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v2A1.5 1.5 0 0 1 14.5 5h-13A1.5 1.5 0 0 1 0 3.5v-2zM1.5 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-13z" />
            <path
              d="M2 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm10.823.323-.396-.396A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
          </svg>
        </button>
        <span class="dashboard">Online_Shop</span>
      </div>
      <div class="user-details" style="    display: none;">
        <input type="text" class="form-control" placeholder="  Search .....">
        <button type="button" class="btn btn-light">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
            viewBox="0 0 16 16">
            <path
              d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
          </svg>
        </button>
      </div>
      <div class="profile-details">
        <a href="http://localhost:8080/coreigniter_4/Crud/login" style="    text-decoration: none; "><img
            src="http://localhost:8080/coreigniter_4/image/logo.jpg" alt="">
          <span class="admin_name"><b>Login </b></span>

        </a>
      </div>
    </nav>
  </section><br>
  <!-- Navbar end -->
  <script>
    $(document).ready(function () {
      $(".show").click(function () {
        $(".sidebar").show("display: none");
      });
    });
    $(document).ready(function () {
      $(".hide").click(function () {
        $(".sidebar").hide("display: none");
      });
    });
    $(document).ready(function () {
      $("#electronic_item").click(function () {
        $("#elec_item").toggle("display: none");
        $("#elec_down").toggle("display: none");
        $("#elec_up").toggle("display: none");
      });
    });
    $(document).ready(function () {
      $("#Sports_item").click(function () {
        $("#spor_item").toggle("display: none");
        $("#sport_down").toggle("display: none");
        $("#sport_up").toggle("display: none");
      });
    });
    $(document).ready(function () {
      $("#clothe_item").click(function () {
        $("#cloth_item").toggle("display: none");
        $("#clo_down").toggle("display: none");
        $("#clo_up").toggle("display: none");
      });
    });
  </script>
  <!-- Product Nav-bar -->

  <!-- Product Nav-bar end -->

</body>

</html>