<div class="container">
    <h3 align="center">ข้อมูลการออกจากโครงการ</h3>
    <div class="row">
        <div class="col-md-12">
            <p align="center">สถานีอนามัย : xxxxxxxxx </p>
            <p align="center"><?php  echo "วันที่ : " . date("Y/m/d") . "<br>";?></p>
        </div>
        <div class="col-md-12 align-middle">
            <table class="table">
                <tr>
                    <td>ลำดับ</td>
                    <td>ชื่อ สกุล</td>
                    <td>อายุ</td>
                </tr>
                <tbody>
                <?php
                $num = 1 ;
                foreach($data as $item){?>
                    <tr>
                        <td><?php echo $num ;?></td>
                        <td><?php echo $item->rc_name." ".$item->rc_lastname?></td>
                        <td><?php echo $item->rc_age?></td>
                    </tr>
                    <?php $num++ ; }?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" align="center" style="padding-top: 50px;">
            <h3>ชื่อผู้ลงนาม</h3>
            <p style="padding-top: 25px">................................................................</p>
            <p style="padding-top: 25px">(................................................................)</p>
        </div>
        <div class="col-md-6" align="center" style="padding-top: 50px;">
            <h3>ประทับตรา</h3>
            <p style="padding-top: 25px">................................................................</p>
            <p style="padding-top: 25px">(................................................................)</p>
        </div>
    </div>

</div>