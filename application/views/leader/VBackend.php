<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Production System 
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900" />
  <!-- Nucleo Icons -->
  <link href="<?= site_url('asset/backend/assets/css/nucleo-icons.css'); ?>" rel="stylesheet" />
  <link href="<?= site_url('asset/backend/assets/css/nucleo-svg.css'); ?>" rel="stylesheet" />
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= site_url('asset/backend/assets/css/material-dashboard.css?v=3.0.0'); ?>" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-200">

  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times  cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand ml-3" href="index">
        <span class="font-weight-bold text-white">PRODUCTION SYSTEM</span>
      </a>
    </div>

        <hr class="horizontal light mt-0 mb-2">
            <div class="col-14">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white<?= ($navlink === 'beranda') ? 'active bg-gradient-info' : ''; ?>" href="<?= site_url('leader/index'); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="navbar-vertical">
                    <div class="text-white text-xs d-flex align-items-center justify-content-left pl-4 pt-2">
                    <span class="nav-link-text ms-1 p-2">SCHEDULE</span>
                    </div>
                    </li>
                    <hr class="horizontal light mt-0 mb-2">
                    <li class="nav-item navbar-expand-xs">
                        <a class="nav-link text-white<?= ($navlink === 'planning') ? 'active bg-gradient-info' : ''; ?>" href="<?= site_url('leader/planning'); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">schedule</i>
                            </div>
                            <span class="nav-link-text ms-1">Planning</span>
                        </a>
                    </li>

                    <li class="navbar-vertical">
                    <div class="text-white text-xs d-flex align-items-center justify-content-left pl-4 pt-2">
                    <span class="nav-link-text ms-1 p-2">PROCESSING</span>
                    </div>
                    </li>
                    <hr class="horizontal light mt-0 mb-2">
                    <li class="nav-item navbar-expand-xs">
                        <a class="nav-link text-white<?= ($navlink === 'production') ? 'active bg-gradient-info' : ''; ?>" href="<?= site_url('leader/production'); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">settings_input_component</i>
                            </div>
                            <span class="nav-link-text ms-1">Production</span>
                        </a>
                    </li>
                    <li class="nav-item navbar-expand-xs">
                        <a class="nav-link text-white<?= ($navlink === 'machine') ? 'active bg-gradient-info' : ''; ?>" href="<?= site_url('leader/machine'); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">build</i>
                            </div>
                            <span class="nav-link-text ms-1">Machine</span>
                        </a>
                    </li>
                    <li class="nav-item navbar-expand-xs">
                        <a class="nav-link text-white<?= ($navlink === 'material') ? 'active bg-gradient-info' : ''; ?>" href="<?= site_url('leader/material'); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_in_ar</i>
                            </div>
                            <span class="nav-link-text ms-1">Raw Materials</span>
                        </a>
                    </li>

                    <li class="navbar-vertical">
                    <div class="text-white text-xs d-flex align-items-center justify-content-left pl-4 pt-2">
                    <span class="nav-link-text ms-1 p-2">REPORTS</span>
                    </div>
                    </li>
                    <hr class="horizontal light mt-0 mb-2">
                    <li class="nav-item navbar-expand-xs">
                        <a class="nav-link text-white<?= ($navlink === 'sorting') ? 'active bg-gradient-info' : ''; ?>" href="<?= site_url('leader/sorting'); ?>">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt</i>
                            </div>
                            <span class="nav-link-text ms-1">Report</span>
                        </a>
                    </li>
                </ul>
            </div>
    </aside>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Main Data -->
        <?php $this->load->view($content); ?>
        <!-- End of Main Data -->
    </main>

    <footer class="footer">
        <div class="container-fluid">
            <div class="copyright float-right pt-5 text-sm">
                Made with <i class="material-icons">local_cafe</i>
                | Production Management System by <a href="https://github.com/mrezadit"><b>mrezadit </b></a>
            </div>
        </div>
    </footer>
  <!--   Core JS Files   -->
      

    <script src="<?= site_url('asset/backend/assets/js/core/popper.min.js'); ?>"></script>
    <script src="<?= site_url('asset/backend/assets/js/core/bootstrap.min.js'); ?>"></script>
    <script src="<?= site_url('asset/backend/assets/js/plugins/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?= site_url('asset/backend/assets/js/plugins/smooth-scrollbar.min.js'); ?>"></script>
    <script src="<?= site_url('asset/backend/assets/js/plugins/chartjs.min.js'); ?>"></script>
    <!-- Forms Validations Plugin -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/jquery.validate.min.js'); ?>"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/jquery.bootstrap-wizard.js'); ?>"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/bootstrap-selectpicker.js'); ?>"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  --><script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/bootstrap-tagsinput.js'); ?>"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/jasny-bootstrap.min.js'); ?>"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/nouislider.min.js'); ?>"></script>
    <!-- Library for adding dinamically elements -->
    <script src="<?= site_url('asset/backend/assets/js/plugins/arrive.min.js'); ?>"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= site_url('asset/backend/assets/js/material-dashboard.js?v=2.1.2'); ?>" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?= site_url('asset/backend/assets/demo/demo.js'); ?>"></script>
    <script src="<?= site_url('asset/backend/assets/js/script.js'); ?>"></script>

  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>