<html>
<head>
  <title>Cetak PDF</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    table td {
      word-wrap:break-word;
      width: 20%;
    }
  </style>
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
  <table border="1" cellpadding="8">
  <tr>
    <th>Tanggal</th>
    <th>No Transaksi</th>
    <th>Total</th>
  </tr>
    <?php
    if( ! empty($transaksi)){
      $no = 1;
      foreach($transaksi as $data){
            $tanggal_transaksi = date('d-m-Y', strtotime($data->tanggal_transaksi));
        echo "<tr>";
        echo "<td>".$tanggal_transaksi."</td>";
        echo "<td>".$data->no_transaksi."</td>";
        echo "<td>".$data->total_bayar."</td>";
        echo "</tr>";
        $no++;
      }
    }
    ?>
  </table>
</body>
</html>
