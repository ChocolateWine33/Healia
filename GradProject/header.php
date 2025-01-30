

<header>
  <a  href="index.php">
    <img src="images/logo1.png" alt="Logo">
    <h1 style='font-size:2.5rem;'>
      Healia
    </h1>
  </a>
  <nav >
      <ul class='dropdown'data-dropdown>

        
        <button class='link' data-dropdown-button >Account</button>
        <div style="z-index:1;" class='dropdown-menu'>
              <ul>
                <li><a href="register.php">Register</a></li>
                <li><a  href="login.php">Log in</a></li>
               
                          <?php
          include('logform.php');

// Check if the user is a patient or therapist
if(isset($_SESSION['role']) && $_SESSION['role'] == 'patient'){
  // Retrieve patient data from the database
  $e = $_SESSION['name'];

  // Display the patient profile link
  echo '<li><a href="profile.php">View Profile</a></li>';
} else if(isset($_SESSION['role']) && $_SESSION['role'] == 'therapist'){
  // Retrieve therapist data from the database
  $em = $_SESSION['name'];

  // Display the therapist profile link
  echo '<li><a href="therapistprofile.php">View Profile</a></li>';
} else {
  // Display a message if the user is not logged in
  echo '<div class="alert alert-light" role="alert"></div>';
}
?>
              </ul>
            </div>
          </ul>

          <ul class='dropdown' data-dropdown>
            <button class='link' data-dropdown-button >Explore</button>
              <div style="z-index:1;" class='dropdown-menu' >
                <ul >
                  <li><a  href="therapists.php">Therapists</a></li>
                  <li><a  href="subplan.php">Subscription Plan</a></li>
                  <li><a  href="video.php">Explore Videos</a></li>
                  </ul>
              </div>
          </ul>
          
    
          <li >
            <a  href="join.php">Join As Therapist</a>
          </li>

          <li >
            <a  href="about.php">About</a>
          </li>
          <li><a href="sendfb.php">Send Feedback</a></li>
          <li >
            <a  href="header.php?logout='1'">Log out</a>
          </li>

        </nav>
      </header>

      <script>
        document.addEventListener('click', e => {
          const isDropdownButton = e.target.matches("[data-dropdown-button]")
          if(!isDropdownButton && e.target.closest('[data-dropdown]') != null) return

          let currentDropdown

          if(isDropdownButton){
            currentDropdown = e.target.closest('[data-dropdown]')
            currentDropdown.classList.toggle('active') 
          }

          document.querySelectorAll('[data-dropdown].active').forEach(dropdown => {
            if(dropdown === currentDropdown) return
            dropdown.classList.remove('active')
          })
        })
      </script>


 <!-- <?php

include('logform.php');

// Retrieve patient data from the database
$e = $_SESSION['name'];

// Retrieve therapsit data from the database
$em = $_SESSION['name'];
    
// Retrieve admin data from the database
$email = $_SESSION['name'];




if(isset($_SESSION['name']) && $_SESSION['name'] == $e){
echo '<li><a  href="profile.php">View Profile</a></li>';
}else if(isset($_SESSION['name']) && $_SESSION['name'] == $em){
echo '<li><a  href="therapistprofile.php">View Profile</a></li>';
}else if (isset($_SESSION['name']) && $_SESSION['name'] == $email){
echo '<li><a  href="admin_panel/manage/admin/index.php">View Profile</a></li>';
}
//   else {
//     echo '<div class="alert alert-light" role="alert">
//  Please Log in First!
// </div>';
//   }

?> -->