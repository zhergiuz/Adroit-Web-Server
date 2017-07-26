<div class="col-lg-5">
    <?php
    if (!empty($notif)) {
        echo '<div class="alert alert-danger alert-dismissable">';
        echo '<button class="close" data-dismiss="alert">&times;</button>';
        echo $notif;
        echo '</div>';
    } else if (!empty($notifs)) {
        echo '<div class="alert alert-success alert-dismissable">';
        echo '<button class="close" data-dismiss="alert">&times;</button>';
        echo $notifs;
        echo '</div>';
    }
    ?>
    <form style="padding-bottom: 10%" method="post" action="<?php echo base_url() ?>dashboard/add_pengguna"
          enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama</label>
            <input class="form-control" id="nama" name="nama" placeholder="Contoh: Christian Doxa Hamasiah" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" id="email" name="email" placeholder="Contoh: blabla@blabla.com" type="email"
                   required>
        </div>
        <div class="form-group">
            <label>Kata Sandi</label>
            <input class="form-control" id="katasandi" name="katasandi" type="password" required>
        </div>
        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input class="form-control" id="konfirkatasandi" name="konfirkatasandi" type="password" required>
        </div>
        <br>
        <input type="submit" name="submit" value="Tambah" class="btn btn-success">
        <input type="reset" name="reset" value="Reset" class="btn btn-danger">
    </form>
</div>
<div class="col-lg-7">
    <div class="panel panel-default">
        <div class="panel-heading">
            Daftar Pengguna Adroit Web Server
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-2">
                <thead>
                <tr>
                    <th class="text-center" style="vertical-align: middle">Nama</th>
                    <th class="text-center" style="vertical-align: middle">Email</th>
                    <th class="text-center" style="vertical-align: middle">Edit atau Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($pengguna as $data) {
                    echo '
                    <tr>
                    <td class="text-center" style="vertical-align: middle">' . $data->nama . '</td>
                    <td class="text-center" style="vertical-align: middle">' . $data->email . '</td>
                    <td class="text-center" style="vertical-align: middle">
                        <a href="' . base_url('dashboard/detail_pengguna?email=' . $data->email) . '" class="btn btn-info btn-sm">
                            <i class="glyphicon glyphicon-search"></i> Lihat
                        </a>
                        <a href="' . base_url('dashboard/hapus_pengguna?email=' . $data->email) . '" class="btn btn-danger btn-sm">
                            <i class="glyphicon glyphicon-trash"></i> Hapus
                        </a>
                    </td>
                    </tr>
                    ';
                }
                ?>
                </tbody>
            </table>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>