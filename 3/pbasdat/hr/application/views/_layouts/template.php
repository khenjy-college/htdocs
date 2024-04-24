<!-- setting setiap src di assets -->
<base href="<?= base_url('assets/') ?>">

<!-- memastikan user memiliki id  -->
<!-- memastikan user memiliki id  -->
<?php
switch (true) {
  case ($this->session->userdata($base_url . $tabel9_field1)):
    break;
  case ($this->session->userdata($base_url . $tabel4_field1)):
    break;
  default:
    session_destroy();
    // Handle other cases if needed
    break;
}
?>


<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php $this->load->view($head) ?>

<body>

  <!-- menampilkan data pengaturan sebagai p -->
  <?php foreach ($tbl7 as $tl7): ?>

    <!-- toast -->
    <div class="toast fade" id="element" style="position: absolute; top: 80; right: 15; z-index: 1000" data-delay="5000">
      <div class="toast-header">
        <img class="rounded mr-2" src="img/tabel7/<?= $tl7->$tabel7_field3 ?>" width="15px" draggable="false">
        <strong class="mr-auto">
          <?= $tl7->$tabel7_field2 ?>
        </strong>
        <button type="button" class="close" data-dismiss="toast">
          <span>&times;</span>
        </button>
      </div>

      <div class="toast-body">
        <?= $this->session->flashdata($this->flashdatas['v_flashdata1']) ?>
      </div>
    </div>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
      <a class="navbar-brand font-weight-bold" href="<?= site_url('welcome') ?>">
        <img src="img/tabel7/<?= $tl7->$tabel7_field4; ?>" height="50">
      </a>

      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarku">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- menu navbar berdasarkan level user -->
      <div class="collapse navbar-collapse" id="navbarku">
        <?php $this->load->view('_partials/menu'); ?>
      </div>

    </nav>

    <!-- komponen berada tengah halaman -->
    <div class="container" id="konten">

      <!-- modal cari data pesanan -->
      <div id="cari" class="modal fade cari">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cari daftar <?= $tabel8_alias ?> Anda</h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <!-- form mencari data pesanan, method get utk menampilkan apa yg diinput pengguna di halaman tujuan -->
            <form action="<?= site_url('tabel8/cari') ?>" method="get">
              <div class="modal-body">
                <div class="form-group">
                  <label>
                    <?= $tabel8_field1_alias ?>
                  </label>
                  <input class="form-control" type="text" required name="<?= $tabel8_field1_input ?>"
                    placeholder="Masukkan <?= $tabel8_field1_alias ?>">
                </div>

                <div class="form-group">
                  <label>
                    <?= $tabel8_field4_alias ?>
                  </label>
                  <input class="form-control" type="email" required name="<?= $tabel8_field4_input ?>"
                    placeholder="Masukkan <?= $tabel8_field4_alias ?> Anda">
                </div>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p id="p_cari" class="small text-center text-danger">
                <?= $this->session->flashdata('pesan_cari') ?>
              </p>

              <div class="modal-footer">
                <button class="btn btn-success" type="submit">Cari</button>
              </div>
            </form>

          </div>
        </div>
      </div>

      <div class="konten" style="margin-top: 100px;">

        <!-- konten sesuai controller -->
        <?php $this->load->view($konten) ?>
      </div>

    </div>


    <!-- footer -->
    <div class="container-fluid bg-light border" style="bottom: 0; margin-top: 20px">
      <div class="container">

        <!-- menampilkan footer khusus jika level adalah tamu, admin, dan sebagainya  -->
        <?php switch ($this->session->userdata($base_url . $tabel9_field6)) {
          case $tabel9_field6_value3:
          case $tabel9_field6_value4:
          case $tabel9_field6_value2:
            ?>
            <div class="row justify-content-center align-content-center">
              <p class="pt-2">
                <?= $year_code ?> |
                <?= $tl7->$tabel7_field2 ?>
              </p>
            </div>
            <?php break;

          default: ?>

            <!-- menampilkan footer untuk umum  -->
            <div class="row justify-content-center">
              <div class="col-lg-4 pt-3">
                <img src="img/tabel7/<?= $tl7->$tabel7_field4; ?>" height="50">
                <p class="small pt-2">
                  <?= $year_code ?>
                  <?= $tl7->$tabel7_field2 ?>.
                  <?= $copyright_notices ?>
                </p>
              </div>

              <div class="col-lg-3 pt-3">
                <h3>Jelajahi</h3>
                <ul class="list-unstyled">
                  <li>
                    <a type="button" id="nextPage" class="text-decoration-none text-dark" href="<?= site_url('tabel6') ?>">
                      <?= $tabel6_alias ?>
                    </a>
                  </li>
                  <li>
                    <a type="button" id="nextPage" class="text-decoration-none text-dark" href="<?= site_url('tabel3/admin') ?>">
                      <?= $tabel3_alias ?>
                    </a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-3 pt-3">
                <h3>Alamat</h3>
                <ul class="list-unstyled">
                  <li>
                    <?= $tl7->$tabel7_field8 ?>
                  </li>
                  <li>
                    <?= $tl7->$tabel7_field7 ?>
                  </li>
                  <li>
                    <?= $tl7->$tabel7_field6 ?>
                  </li>
                </ul>
              </div>

              <div class="col-lg-2 pt-3">
                <h3>Ikuti</h3>
                <ul class="list-unstyled">
                  <li>
                    <a class="text-decoration-none text-primary" href="<?= $tl7->$tabel7_field10 ?>" target="_blank"><i
                        class="fab fa-facebook"></i> Facebook</a>
                  </li>
                  <li>
                    <a class="text-decoration-none text-danger" href="<?= $tl7->$tabel7_field11 ?>" target="_blank"><i
                        class="fab fa-instagram"></i> Instagram</a>
                  </li>
                </ul>
              </div>
            </div>
        <?php }
        ?>

      </div>
    </div>

    <!-- javascript untuk semua halaman (sesuai kebutuhan) -->
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- javascript untuk datatables bertema bootstrap -->
    <script src="datatables/datatables/js/jquery.dataTables.min.js"></script>
    <script src="datatables/datatables/js/dataTables.bootstrap4.min.js"></script>

    <!-- TableExport.js -->
    <script type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin/tableExport.min.js"></script>

    <!-- Add Intro.js JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/3.4.0/intro.min.js"></script>

    <!-- fungsi datatables (wajib ada) -->
    <script type="text/javascript">
      $(document).ready(function () {
        $('#data').DataTable({
          "order": [
            [0, "desc"],
          ],
          "createdRow": function (row, data, dataIndex) {
            $(row).find('td:first').html(dataIndex + 1);
          },


        });






        // yg ini yang menggunakan toast
        <?= $this->session->flashdata('panggil') ?>
        // ini sebenarnya utk ubah password cman aku malas buat ubah namanya
        <?= $this->session->flashdata('modal') ?>
        // yg di bawah ini adalah semua yg berhubungan dgn modal
        <?= $this->session->flashdata('tambah') ?>
        <?= $this->session->flashdata('ubah') ?>
        <?= $this->session->flashdata('lihat') ?>
        <?= $this->session->flashdata('cari') ?>
        <?= $this->session->flashdata('maintenance') ?>
        <?= $this->session->flashdata('clean') ?>
        <?= $this->session->flashdata('book') ?>
        <?= $this->session->flashdata('cari') ?>
        //  $this->session->flashdata('quickTour') ?>









      });

      var table = $('#daterange_table').DataTable({

      })
    </script>


    <!-- Berikut ini adalah list projek2 mendatang yang ingin kubuat jika sudah mempunyai tim frontend
    Bagiku cukup sulit dalam menentukan pilihan terbaik dalam membuat quick tour
    1. Membuat guided tour yang bisa pergi ke halaman lain -->


    <!-- Fitur di bawah ini adalah fitur oboarding yang berfungsi mengarahkan tamu untuk mengetahui fitur-fitur yang berhubungan dengan pesanan -->

    <!-- Intro user publik -->
    <script>
      // Initialize Intro.js
      // Wait for the DOM to be ready
      $(document).ready(function () {
        // Bind a click event to the button
        $("#startTour").on("click", function () {
          var intro = introJs();
          intro.setOptions({
            steps: [{
              element: document.getElementById('tour1'),
              intro: 'Ini adalah logo aplikasimu!',
              position: 'bottom'
            },
            {
              element: document.getElementById('tour2'),
              intro: 'Ini adalah navigasi.',
              position: 'bottom'
            }
            ]
          });
          intro.start();
        });
      });
    </script>



    <!-- Intro user tamu -->
    <script>
      // Initialize Intro.js
      // Wait for the DOM to be ready

      // Bind a click event to the button
      $("#introTamu").on("click", function () {
        var intro = introJs();
        intro.setOptions({
          steps: [
            // I want to have this one but I think it doesn't really recessary anymore since it doesn't even work yet
            // {
            //   title: 'Quick Tour',
            //   intro: 'Ayo ikuti tour ini'
            // }, 
            {
              element: document.getElementById('tour1'),
              intro: 'Anda sekarang sudah bisa mencari serta mengelola pesanan Anda!',
              position: 'bottom'
            },
            {
              element: document.getElementById('tour2'),
              intro: 'Anda bisa memesan kamar di sini.',
              position: 'top'
            }

          ],
          // dontShowAgain: true,
        })
        intro.start();
      });
    </script>

    <!-- Script below is for radio button -->
    <script>
      // JavaScript to make radio buttons required and stop validation once one option is picked
      document.addEventListener('DOMContentLoaded', function () {
        var radioGroup = document.querySelectorAll('input[type="radio"].custom-radio');

        radioGroup.forEach(function (radio) {
          radio.addEventListener('change', function () {
            // Set "required" attribute to false for all radio buttons
            radioGroup.forEach(function (r) {
              r.required = false;
            });

            // Find the checked radio button and set "required" attribute to true
            var checkedRadio = document.querySelector('input[type="radio"].custom-radio:checked');
            if (checkedRadio) {
              checkedRadio.required = true;
            }
          });
        });
      });
    </script>

    <!-- Script below is for checkboxes -->
    <script>
      // JavaScript to disable all primary buttons once one is chosen
      $(document).ready(function () {
        $('.checkbox-group input[type="checkbox"]').change(function () {
          var checkboxes = $('.checkbox-group input[type="checkbox"]');
          var cards = $('.card-body');
          var checkedCheckbox = $(this);

          if (checkedCheckbox.prop('checked')) {
            checkboxes.parent().removeClass('btn-primary').addClass('btn-secondary');
            cards.parent().removeClass('bg-light').addClass('bg-light');
            checkedCheckbox.parent().addClass('active').addClass('btn-success');
            checkboxes.not(checkedCheckbox).prop('disabled', true).prop('required', false);
          } else {
            checkboxes.parent().removeClass('btn-secondary').addClass('btn-primary');
            cards.parent().removeClass('bg-secondary').addClass('bg-light');
            checkboxes.prop('disabled', false).prop('required', true);
            checkedCheckbox.parent().removeClass('active').removeClass('btn-success');
          }
        });
      });
    </script>

<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.11.0/firebase-analytics.js";
  import { Firestore, collection, getDocs } from 'firebase/firestore';

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyALlbSVTpW2s332vrOR-j7n_Iedm4pr6Ok",
    authDomain: "project-44c5c.firebaseapp.com",
    projectId: "project-44c5c",
    storageBucket: "project-44c5c.appspot.com",
    messagingSenderId: "892255247703",
    appId: "1:892255247703:web:2e99bd457e84b50215b212",
    measurementId: "G-3QM881SVEE"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);

  // Initialize Firestore with the app instance
  const db = Firestore(app);

  // Collection Reference
  const colRef = collection(db, 'tipe_kamar')

  // Get collection data
  getDocs(colRef)
    .then((snapshot) => {
      console.log(snapshot.docs)
    })
</script>





  <?php endforeach; ?>
</body>

</html>