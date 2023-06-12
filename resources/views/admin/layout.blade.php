<!-- resources/views/layouts/app.blade.php -->

<html>
    <head>
        <meta charset="utf-8">
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <script src="{{ asset('assets/js/app.js') }}"></script>
    <style>
        #status{
            border: none;
        }
    </style>
        <title>Task Management</title>

        <!--<link  href="/resources/css/task.css" rel="stylesheet">
        <link  href="/resources/css/style.css" rel="stylesheet">-->
        <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/task.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    </head>
    <body>


        <div class="wrapper">
            <nav id="sidebar" class="sidebar js-sidebar">
                <div class="sidebar-content js-simplebar">
                    <a class="sidebar-brand"  href="{{ route('admin.dashboard') }}">
                        <img src= "{{ asset('assets/img/ask__3_-removebg-preview.png') }}" class="logo">
            </a>

                    <ul class="sidebar-nav">
                        <li class="sidebar-header">
                            <hr/>
                        </li>

                        <li class="sidebar-item active">
        <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                  <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('profile.index') }}">
                  <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('users.index') }}">
                  <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
                </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('users.create')}}"  > <!--route('admin.addUser')-->
                  <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Add User</span>
                </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('projects.index') }}">
                  <i class="align-middle" data-feather="folder"></i> <span class="align-middle"> Projects</span>
                </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('projects.create')}}">
                  <i class="align-middle" data-feather="folder-plus"></i> <span class="align-middle">Add Project</span>
                </a>
                        </li>


                    </ul>


                </div>
            </nav>

            <div class="main">
                <nav class="navbar navbar-expand navbar-light navbar-bg">
                    <a class="sidebar-toggle js-sidebar-toggle">
              <i class="hamburger align-self-center"></i>
            </a>

                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav navbar-align">

                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                  </a>

                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">

                    <img src= "{{ asset('assets/img/avatars/avatar-4.jpg') }}" alt="Wissal charraki" class="avatar img-fluid rounded me-1" width="128" height="128" /> <span class="text-dark"> {{ session('user.FullName') }}</span>
                  </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="Profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

    <main class="content">
        @yield('content')
    </main>
	<footer class="footer">
        <div class="container-fluid">
            <div class="row text-muted">

                Task Management

            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
          var currentInfoElement = document.getElementById("currentInfo");

          function updateCurrentInfo() {
            var currentDate = new Date();
            var currentDateString = currentDate.toLocaleDateString();
            var currentTimeString = currentDate.toLocaleTimeString();

            var currentInfoText = "Current Date: " + currentDateString + "<br>Current Time: " + currentTimeString;
            currentInfoElement.innerHTML = currentInfoText;
          }

          updateCurrentInfo(); // Initial call

          // Update current info every second
          setInterval(updateCurrentInfo, 1000);
        });
      </script>
      <script>
          document.addEventListener("DOMContentLoaded", function() {
              var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
              var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();

              var calendar = document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: defaultDate,
                onMonthChange: function(selectedDates, dateStr, instance) {
                  highlightCurrentDay(instance.currentYear, instance.currentMonth, instance.currentYearElement);
                },
                onYearChange: function(selectedDates, dateStr, instance) {
                  highlightCurrentDay(instance.currentYear, instance.currentMonth, instance.currentYearElement);
                },
                onReady: function(selectedDates, dateStr, instance) {
                  highlightCurrentDay(instance.currentYear, instance.currentMonth, instance.currentYearElement);
                }
              });

              function highlightCurrentDay(year, month, calendarElement) {
                var currentDate = new Date();
                if (year === currentDate.getFullYear() && month === currentDate.getMonth()) {
                  var currentDay = currentDate.getDate();
                  var currentMonthElement = calendarElement.querySelector(".flatpickr-month");
                  var currentDayElement = currentMonthElement.querySelector('[aria-label="' + currentDay + '"]');
                  if (currentDayElement) {
                    currentDayElement.classList.add("current-day");
                  }
                }
              }
            });

      </script>
 <script>



    function toggleButtonPriority(button) {

      if (button.textContent === "Actived") {
        button.textContent = "Desactived";
        button.classList.remove("btn-success");
          button.classList.add("btn-danger");
      } else {
        button.textContent = "Actived";
        button.classList.remove("btn-danger");
          button.classList.add("btn-success");
      }
    }

</script>


    </body>
</html>
