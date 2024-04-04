<!-- modal demo aplikasi
       <div id="quickTour" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Selamat datang di Website < $p->nama ?></h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

             pesan demo aplikasi
            <div class="modal-body">
              <div class="form-group">
                <p>Silahkan ikuti tour berikut ini</p>
              </div>


               memunculkan notifikasi modal 
              <p class="small text-center text-danger">< $this->session->flashdata('pesan_quickTour') ?></p>


              <div class="modal-footer">
                <php if ($this->session->userdata($tabel9_field6) == 'tamu' && $this->session->userdata($tabel9_field6) <> 'tamu' && $this->session->userdata($tabel9_field6) <> 'accounting') { ?>
                  <a id="introTamu" data-dismiss="modal" class="btn btn-success">Mulai Tour</a>
                <php } elseif ($this->session->userdata($tabel9_field6) == 'administrator') { ?>
                  <a id="introAdministrator" data-dismiss="modal" class="btn btn-success">Mulai Tour</a>

                <php } elseif ($this->session->userdata($tabel9_field6) == 'tamu') { ?>
                  <a id="introTamu" data-dismiss="modal" class="btn btn-success">Mulai Tour</a>

                <php } elseif ($this->session->userdata($tabel9_field6) == 'accounting') { ?>
                  <a id="introAccounting" data-dismiss="modal" class="btn btn-success">Mulai Tour</a>

                <php } ?>
              </div>

            </div>
          </div>
        </div>
      </div> -->