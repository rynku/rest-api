<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    <?php echo $this->session->flashdata('hasil'); ?>

    <div class="container">
        <h1>DAFTAR MOBIL</h1>

        <div class="text-right">
            <a href="<?= base_url('clientMbl/add'); ?>"><button class="btn btn-primary">TAMBAH DATA</button></a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Tipe Mobil</th>
                        <th>Tahun</th>
                        <th>Sewa</th>
                        <th>--</th>
                    </tr>
                        <?php 
                        foreach($data as $dt){ ?>
                        <tr>
                            <td><?= $dt->no; ?></td>
                            <td><?= $dt->tipe_mobil; ?></td>
                            <td><?= $dt->tahun; ?></td>
                            <td><?= $dt->sewa; ?></td>
                            <td>
                                <a href="<?= base_url('clientMbl/edit/'.$dt->no); ?>"><button class="btn btn-sm btn-info">edit</button></a>
                                <a href="<?= base_url('clientMbl/delete/'.$dt->no); ?>"><button class="btn btn-sm btn-danger">delete</button></a>
                            </td>
                        </tr>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>