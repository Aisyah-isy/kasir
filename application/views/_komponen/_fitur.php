<div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
        <div class="row align-items-center">
          <div class="col-6 text-center">
            <a href="<?= site_url('auth/logout') ?>" class="btn">
              <div class="squircle bg-danger justify-content-center">
                <i class="fe fe-log-out fe-32 align-self-center text-white"></i>
              </div>
            </a>
            <p>Logout</p>
          </div>
          <div class="col-6 text-center">
            <a href="<?= site_url('user') ?>">
              <div class="squircle bg-primary justify-content-center">
                <i class="fe fe-user fe-32 align-self-center text-white"></i>
              </div>
            </a>
            <p>User</p>
          </div>
        </div>
        <div class="row align-items-center">

          <div class="col-6 text-center">
            <a href="<?= site_url('pelanggan') ?>">
              <div class="squircle bg-primary justify-content-center">
                <i class="fe fe-users fe-32 align-self-center text-white"></i>
              </div>
            </a>
            <p>Customers</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>