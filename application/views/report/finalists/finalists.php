<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<h3 align="center">ตารางผลการเข้าร่วม</h3>
<div class="container">
    <div class="row">
        <div class="col-md-6" align="center">
            <?php echo "ระหว่างวันที่ : ".$this->session->userdata('before');?>
        </div>
        <div class="col-md-6" align="center">
            <?php echo "ถึงวันที่ : ".$this->session->userdata('after');?>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>ลำดับ</td>
                    <td>ชื่อ สกุล</td>
                    <td>อายุ</td>
                    <td>ที่อยู่</td>
                    <td>เพิ่มเติม</td>
                </tr>
                <tbody>
                <?php
                $num = 1 ;
                foreach($result as $item){
                    $this->session->set_userdata(array("before"=>$item->bp_before,"after"=>$item->bp_after));
                ?>
                <tr>
                    <td><?php echo $num ;?></td>
                    <td><?php echo $item->rc_name." ".$item->rc_lastname?></td>
                    <td><?php echo $item->rc_age ?></td>
                    <td><?php echo $item->rc_no." หมู่ ".$item->mo_name. " ตำบล ".$item->tu_name." " .$item->rc_detailaddress?></td>
                    <td><?php echo $item->rc_detail?></td>
                </tr>
                <?php $num++ ; }?>
                </tbody>
            </table>
        </div>

        <h3>สรุปยอด : <?php echo $num -1 ." /คน" ;?></h3>
    </div>
</div>
</body>
</html>