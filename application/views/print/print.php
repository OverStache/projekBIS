<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome to CodeIgniter</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css"> -->
  <!-- Latest compiled and minified CSS -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
</head>

<body>

  <!-- Main content -->
  <!-- <div id="container">
    <h1>Slip Setoran</h1>
    <div id="body"> -->
  <table class="table">
    <thead>
      <tr>
        <td colspan="2" class="text-center bg-success">Slip Setoran</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Tanggal</td>
        <td><?php $time = new DateTime($angsuran['tanggal']);
            echo $time->format('F j, Y') ?>
        </td>
      </tr>
      <tr>
        <td>No. Rekening</td>
        <td><?= $angsuran['id_rekening']; ?></td>
      </tr>
      <tr>
        <td>Nama Penyetor</td>
        <td><?= $angsuran['penyetor']; ?></td>
      </tr>
      <tr>
        <td>Terbilang</td>
        <td><?= 'Rp. ' . number_format($angsuran['jumlah']); ?></td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td>
          Penyetor
        </td>
        <td>
          _________
        </td>
      </tr>
    </tfoot>
  </table>
  <!-- </div>
  </div> -->
  <!-- /.invoice -->
</body>

</html>