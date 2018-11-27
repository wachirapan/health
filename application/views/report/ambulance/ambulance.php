<div class="container">
    <h3 align="center">ข้อมูลการส่งตัว</h3>
    <div class="row">
        <div class="col-md-12">
            <p align="center">สถานีอนามัย : xxxxxxxxx </p>
            <p align="center"><?php  echo "วันที่ : " . date("Y/m/d") . "<br>";?></p>
        </div>
        <div class="col-md-12 align-middle">
            <table class="table">
                <tr>
                    <td>ชื่อ : </td>
                    <td><?php echo $name ." ". $lastname?></td>
                </tr>
                <tr>
                    <td>สาเหตุ : </td>
                    <td><?php echo $detail ?></td>
                </tr>
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