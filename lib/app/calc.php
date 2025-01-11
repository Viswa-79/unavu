<?php include "config.php"; ?>

  <?php include "head.php"; ?>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "menu.php"; ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include "header.php"; ?>

          <!-- / Navbar -->
      
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card app-calendar-wrapper">
                <div class="row g-0">
                  <!-- Calendar Sidebar -->
                  <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
                    <div class="border-bottom p-4 my-sm-0 mb-3">
                      <div class="d-grid">
                        <button
                          class="btn btn-primary btn-toggle-sidebar"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#addEventSidebar"
                          aria-controls="addEventSidebar">
                          <i class="ti ti-plus me-1"></i>
                          <span class="align-middle">Add Event</span>
                        </button>
                      </div>
                    </div>
                    <div class="p-3">
                      <!-- inline calendar (flatpicker) -->
                      <div class="inline-calendar"></div>

                      <hr class="container-m-nx mb-4 mt-3" />

                      <!-- Filter -->
                      <div class="mb-3 ms-3">
                        <small class="text-small text-muted text-uppercase align-middle">Filter</small>
                      </div>

                      <div class="form-check mb-2 ms-3">
                        <input
                          class="form-check-input select-all"
                          type="checkbox"
                          id="selectAll"
                          data-value="all"
                          checked />
                        <label class="form-check-label" for="selectAll">View All</label>
                      </div>

                      <div class="app-calendar-events-filter ms-3">
                        <div class="form-check form-check-danger mb-2">
                          <input
                            class="form-check-input input-filter"
                            type="checkbox"
                            id="select-personal"
                            data-value="personal"
                            checked />
                          <label class="form-check-label" for="select-personal">Personal</label>
                        </div>
                        <div class="form-check mb-2">
                          <input
                            class="form-check-input input-filter"
                            type="checkbox"
                            id="select-business"
                            data-value="business"
                            checked />
                          <label class="form-check-label" for="select-business">Business</label>
                        </div>
                        <div class="form-check form-check-warning mb-2">
                          <input
                            class="form-check-input input-filter"
                            type="checkbox"
                            id="select-family"
                            data-value="family"
                            checked />
                          <label class="form-check-label" for="select-family">Family</label>
                        </div>
                        <div class="form-check form-check-success mb-2">
                          <input
                            class="form-check-input input-filter"
                            type="checkbox"
                            id="select-holiday"
                            data-value="holiday"
                            checked />
                          <label class="form-check-label" for="select-holiday">Holiday</label>
                        </div>
                        <div class="form-check form-check-info">
                          <input
                            class="form-check-input input-filter"
                            type="checkbox"
                            id="select-etc"
                            data-value="etc"
                            checked />
                          <label class="form-check-label" for="select-etc">ETC</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Calendar Sidebar -->

                  <!-- Calendar & Modal -->
                  <div class="col app-calendar-content">
                    <div class="card shadow-none border-0">
                      <div class="card-body pb-0">
                        <!-- FullCalendar -->
                        <div id="calendar"></div>
                      </div>
                    </div>
                    <div class="app-overlay"></div>
                    <!-- FullCalendar Offcanvas -->
                    <div
                      class="offcanvas offcanvas-end event-sidebar"
                      tabindex="-1"
                      id="addEventSidebar"
                      aria-labelledby="addEventSidebarLabel">
                      <div class="offcanvas-header my-1">
                        <h5 class="offcanvas-title" id="addEventSidebarLabel">Raise Ticket</h5>
                        <button
                          type="button"
                          class="btn-close text-reset"
                          data-bs-dismiss="offcanvas"
                          aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body pt-0">
                        <form action="" method="post">
                          <div class="mb-3">
                            <label class="form-label" for="eventTitle">Title</label>
                            <input
                              type="text"
                              class="form-control"
                              id="eventTitle"
                              name="eventTitle"
                              placeholder="Event Title" />
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="eventLabel">Label</label>
                            <select class="select form-select" id="Label" name="Label">
                              <option value="" >--SELECT--</option>
                              <option data-label="primary" value="Business" >Business</option>
                              <option data-label="danger" value="Personal">Personal</option>
                              <option data-label="warning" value="Family">Family</option>
                              <option data-label="success" value="Holiday">Holiday</option>
                              <option data-label="info" value="ETC">ETC</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="eventStartDate">Start Date</label>
                            <input
                              type="date"
                              class="form-control"
                              id="StartDate"
                              name="StartDate"
                              placeholder="Start Date" />
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="eventEndDate">End Date</label>
                            <input
                              type="date"
                              class="form-control"
                              id="EndDate"
                              name="EndDate"
                              placeholder="End Date" />
                          </div>
                          <div class="mb-3">
                            <label class="switch">
                              <input type="checkbox" class="switch-input allDay-switch" />
                              <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                              </span>
                              <span class="switch-label">All Day</span>
                            </label>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="eventURL">Event URL</label>
                            <input
                              type="url"
                              class="form-control"
                              id="eventURL"
                              name="eventURL"
                              placeholder="https://www.google.com" />
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="eventGuests">Add Guests</label>
                            <select class="select select-event-guests form-select" id="Guests" name="Guests">
                              <option value="">--SELECT--</option>
                              <option data-avatar="1.png" value="Jane Foster">Jane Foster</option>
                              <option data-avatar="3.png" value="Donna Frank">Donna Frank</option>
                              <option data-avatar="5.png" value="Gabrielle Robertson">Gabrielle Robertson</option>
                              <option data-avatar="7.png" value="Lori Spears">Lori Spears</option>
                              <option data-avatar="9.png" value="Sandy Vega">Sandy Vega</option>
                              <option data-avatar="11.png" value="Cheryl May">Cheryl May</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="eventLocation">Location</label>
                            <input
                              type="text"
                              class="form-control"
                              id="eventLocation"
                              name="eventLocation"
                              placeholder="Enter Location" />
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="eventDescription">Description</label>
                            <textarea class="form-control" name="eventDescription" id="eventDescription"></textarea>
                          </div>
                          <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                            <div>
                              <button type="submit" class="btn btn-primary btn-add-event me-sm-3 me-1" name="submit" value="submit">Add</button>
                              <button
                                type="reset"
                                class="btn btn-label-secondary btn-cancel me-sm-0 me-1"
                                data-bs-dismiss="offcanvas">
                                Cancel
                              </button>
                            </div>
                            <div><button class="btn btn-label-danger btn-delete-event d-none">Delete</button></div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- /Calendar & Modal -->
                </div>
              </div>
            </div>   
            </div>  
        <!-- / Layout page -->
      </div>
      </div>
    </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
<?php include "footer.php"; ?>
  </body>


<?php
if (isset($_POST['submit'])) {

  $eventTitle = $_POST['eventTitle'];
  $Label = $_POST['Label'];
  $StartDate = $_POST['StartDate'];
  $EndDate = $_POST['EndDate'];
  $Guests = $_POST['Guests'];
  $eventLocation = $_POST['eventLocation'];
  $eventDescription = $_POST['eventDescription'];

  $sql = "INSERT into calc (eventTitle,Label,StartDate,EndDate,Guests,eventLocation,eventDescription) 
 values ('$eventTitle','$Label','$StartDate','$EndDate','$Guests','$eventLocation','$eventDescription')";
    $result = mysqli_query($conn, $sql);
  
  
  if ($result) {

    echo "<script>alert('Data Registered successfully');window.location='calc.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?>