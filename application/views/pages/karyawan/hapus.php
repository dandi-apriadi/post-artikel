ss<body class="hold-transition sidebar-mini layout-fixed">

<?php 

$message = $this->session->flashdata('msg_sweetalert');

if (isset($message)) {
  echo $message;
  $this->session->unset_userdata('msg_sweetalert');
}

?>


<div class="wrapper">
  <!-- Sidebar -->
  <?= $sidebar ?>
  <div class="container mt-4 card my-5 py-2">
    <form method="post">

        <div class="row"> 
            <div class="col-lg-4">
                <div class="card">
                <input type="text" value="<?=$karyawan->photo_karyawan?>" name="profilePictureInput_lama" class="d-none">
                        <img src="<?= base_url('assets/images/profile/'.$karyawan->photo_karyawan)?>" alt="Profil Karyawan" class="card-img-top img-thumbnail cursor-pointer">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $user->firstname ?> <?= $user->lastname ?></h5> <br><hr>
                        <input type="text" value="<?=$karyawan->status_karyawan?>" class="d-none" name="jabatan">
                        <p class="card-text"><?=$karyawan->status_karyawan?></p>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Status Pegawai</h5> <br>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status_aktif" class="form-control" id="status">
                                <?php
                                if($user->verified_email == 'yes'){
                                echo "
                                <option value='yes'>Aktif</option>
                                ";
                                }elseif($user->verified_email == 'no'){ 
                                echo "
                                <option value='no'>Nonaktif</option>
                                ";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-bold">Informasi Pribadi</h5> <br>
                        <div class="form-group">
                            <label for="firstName">Nama Depan:</label>
                            <input type="text" readonly class="form-control" id="firstName" name="firstName" value="<?=$user->firstname?>">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Nama Belakang:</label>
                            <input type="text" readonly class="form-control" id="lastName" name="lastName" value="<?=$user->lastname?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" readonly class="form-control" id="email" name="email" value="<?=$user->email?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Nomor HP:</label>
                            <input type="tel" readonly class="form-control" id="phone" name="phone" value="<?=$karyawan->no_hp?>">
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="#modalDelete" data-toggle="modal" class="btn btn-danger">Hapus Karyawan</a>
                        <!-- <input type="submit" class="btn btn-danger" name="Hapus" id="submitButton" value="Hapus Karyawan"> -->
                </div>
            </div>
        </div>
    </div>
    </form>

</div>

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Yakin ingin hapus data?
      </div>
      <div class="modal-footer">
        <a href="<?= base_url('karyawan/deletedata/'.$id) ?>" class="btn btn-primary">Ya</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>