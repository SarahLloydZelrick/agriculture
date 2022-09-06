<script src="https://kit.fontawesome.com/49db76c055.js" crossorigin="anonymous"></script>
<span
      class="absolute text-white text-4xl top-5 left-4 cursor-pointer"
      onclick="Open()"
      
    >
      <i class="fa fa-bars px-2  rounded-md text-gray-900"></i>
    </span>
    <div
      class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] p-2 w-[300px] overflow-y-auto text-center bg-gray-900 w-60"
      style="z-index:5"
    >
        <i
            class="fa fa-times cursor-pointer ml-28 lg:hidden text-white px-5"
            onclick="Close()"
            style="float: right;"

        ></i>
    <div class="pt-4 pb-2 px-6">
           
    <a href="#!">
    <div class="flex flex-col items-center">
        <div class="grow ml-3">
        <img src="images/Icons/logo_doa.png" class="w-24 h-24" alt="Agriculture">
        </div>
      </div>
      <div class="flex flex-col items-center">
        <div class="grow ml-3">
          <p class="text-sm font-semibold text-white pt-5">
            <?php 
            echo strtoupper($_SESSION['userlevel']); 
            ?>
          </p>
        </div>
      </div>
    </a>
  </div>
  <ul class="relative px-1">
    <li class="relative admin staff">
      <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-white text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" href="home.php" data-mdb-ripple="true" data-mdb-ripple-color="primary">
        <span>DASHBOARD</span>
      </a>
    </li>
    <!--li class="relative admin staff">
      <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-white text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" href="profile.php" data-mdb-ripple="true" data-mdb-ripple-color="primary">
        <span>MY PROFILE</span>
      </a>
    </li-->
    <li class="relative admin" id="sidenavSecEx2">
      <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-white text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out cursor-pointer" data-mdb-ripple="true" data-mdb-ripple-color="primary" data-bs-toggle="collapse" data-bs-target="#collapseSidenavSecEx2" aria-expanded="false" aria-controls="collapseSidenavSecEx2">
        <span>ACCOUNT</span>
        <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
        </svg>
      </a>
      <ul class="relative accordion-collapse collapse" id="collapseSidenavSecEx2" aria-labelledby="sidenavSecEx2" data-bs-parent="#sidenavSecExample">
        <li class="relative">
          <a href="manage.php" class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-white text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="primary">Manage Accounts</a>
        </li>
        <li class="relative">
          <a href="addaccount.php" class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-white text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="primary">Add Accounts</a>
        </li>
        <li class="relative admin-hide">
          <a href="addbarangay.php" class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-white text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="primary">Add Barangay</a>
        </li>
      </ul>
    </li>
    <li class="relative admin staff" id="sidenavSecEx3">
      <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-white text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out cursor-pointer" data-mdb-ripple="true" data-mdb-ripple-color="primary" data-bs-toggle="collapse" data-bs-target="#collapseSidenavSecEx3" aria-expanded="false" aria-controls="collapseSidenavSecEx3">
        <span>RSBSA</span>
        <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
        </svg>
      </a>
      <ul class="relative accordion-collapse collapse" id="collapseSidenavSecEx3" aria-labelledby="sidenavSecEx3" data-bs-parent="#sidenavSecExample">
        <li class="relative admin-hide">
          <a href="rsbsa.php" class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-white text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="primary">Add RSBSA</a>
        </li>
        <li class="relative">
          <a href="viewrsbsa.php" class="flex items-center text-xs py-4 pl-12 pr-6 h-6 overflow-hidden text-white text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="primary">View RSBSA</a>
        </li>
      </ul>
    </li>
    <!--li class="relative admin staff" id="sidenavSecEx3">
      <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-white text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out cursor-pointer" href="rsbsa.php" data-mdb-ripple="true" data-mdb-ripple-color="primary">
        <span>RSBSA</span>
      </a>
    </li-->
  </ul>
  <hr class="my-2">
  <ul class="relative px-1">
    <li class="relative  admin staff">
      <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-white text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" href="intervention.php" data-mdb-ripple="true" data-mdb-ripple-color="primary">
        <span>INTERVENTIONS</span>
      </a>
    </li>
    <li class="relative admin staff">
      <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-white text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" href="commodity.php" data-mdb-ripple="true" data-mdb-ripple-color="primary">
        <span>COMMODITY</span>
      </a>
    </li>
    <li class="relative admin staff farmer">
      <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-white text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" href="cropanalysis.php" data-mdb-ripple="true" data-mdb-ripple-color="primary">
        <span>CROP ANALYSIS</span>
      </a>
    </li>
  </ul>
    </div>

    <script type="text/javascript">
      function dropdown() {
        document.querySelector("#submenu").classList.toggle("hidden");
        document.querySelector("#arrow").classList.toggle("rotate-0");
      }
      dropdown();

      function Open() {
        document.querySelector(".sidebar").classList.toggle("left-[-300px]");
      }
      function Close() {
        document.querySelector(".sidebar").classList.toggle("left-[-300px]");
      }
    </script>

    
<?php
if($_SESSION['userlevel'] === "admin"){
    ?>
    <script type="text/javascript">
    var elems = document.getElementsByClassName('admin');
    var elemshide = document.getElementsByClassName('admin-hide');
    for (var i=0;i<elems.length;i+=1){
         elems[i].style.display = 'block';
        }
    for (var i=0;i<elemshide.length;i+=1){
     elemshide[i].style.display = 'none';
    }
    </script>
    <?php
}
?>
<?php
if($_SESSION['userlevel'] === "staff"){
    ?>
    <script type="text/javascript">
    var elems = document.getElementsByClassName('staff');
    for (var i=0;i<elems.length;i+=1){
         elems[i].style.display = 'block';
        }
    </script>
    <?php
}
?>
<?php
if($_SESSION['userlevel'] === "farmer"){
    ?>
    <script type="text/javascript">
    var elems = document.getElementsByClassName('farmer');
    for (var i=0;i<elems.length;i+=1){
         elems[i].style.display = 'block';
        }
    </script>
    <?php
}

?>