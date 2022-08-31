<div class="topbar flex flex-col w-screen p-5">
    <!--div class="topbar_top text-white text-xl flex justify-center">
        <p>Office of the Municipal Agriculturist in Candelaria Quezon</p>
    </div-->
    <div class="topbar_bottom flex justify-end">
    <div class="flex justify-center">
  <div>
    <div class="dropdown relative">
      <button
        class="
          dropdown-toggle
          px-6
          py-2.5
          gap-2
          text-gray-600
          flex
          items-center
        "
        type="button"
        id="dropdownMenuButton1"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
      <img src="<?php echo $_SESSION['photo']; ?>" class="w-7 h-7 rounded-full" alt="">
      <?php echo $_SESSION['name']; ?>
        <svg
          aria-hidden="true"
          focusable="false"
          data-prefix="fas"
          data-icon="caret-down"
          class="w-2 ml-2"
          role="img"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 320 512"
        >
          <path
            fill="currentColor"
            d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"
          ></path>
        </svg>
      </button>
      <ul
        class="
          dropdown-menu
          min-w-max
          absolute
          hidden
          bg-white
          text-base
          z-50
          float-left
          py-2
          list-none
          text-left
          rounded-lg
          shadow-lg
          mt-1
          hidden
          m-0
          bg-clip-padding
          border-none
        "
        aria-labelledby="dropdownMenuButton1"
      >
        <li>
          <a
            class="
              dropdown-item
              text-md
              py-2
              px-10
              font-normal
              block
              w-full
              whitespace-nowrap
              bg-transparent
              text-gray-700
              hover:bg-gray-100
            "
            href="profile.php"
            >My Profile</a
          >
        </li>
        <li>
          <a
            class="
              dropdown-item
              text-md
              py-2
              px-10
              font-normal
              block
              w-full
              whitespace-nowrap
              bg-transparent
              text-gray-700
              hover:bg-gray-100
            "
            href="changepass.php"
            >Change Password</a
          >
        </li>
        <li>
          <a
            class="
              dropdown-item
              text-md
              py-2
              px-10
              font-normal
              block
              w-full
              whitespace-nowrap
              bg-transparent
              text-gray-700
              hover:bg-gray-100
            "
            href="changepin.php"
            >Change Pin</a
          >
        </li>
        <li>
          <a
            class="
              dropdown-item
              text-md
              py-2
              px-10
              font-normal
              block
              w-full
              whitespace-nowrap
              bg-transparent
              text-gray-700
              hover:bg-gray-100
            "
            href="logout.php"
            >Logout</a
          >
        </li>
      </ul>
    </div>
  </div>
</div>
    </div>
</div>