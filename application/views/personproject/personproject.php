<div id="personproject">
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>ลำดับ</td>
                    <td>ชื่อ สกุล</td>
                    <td>อายุ</td>
                    <td>เพิ่มเติม</td>
                    <td>เข้าร่วมโครงการ</td>

                </tr>
                <tbody>
                <?php $num = 1 ;
                foreach($result as $item){
                ?>
                <tr>
                    <td><?php echo $num ;?></td>
                    <td><?php echo $item->rc_name." ".$item->rc_lastname?></td>
                    <td><?php echo $item->rc_age?></td>
                    <td><a @click="detaildata(<?php echo $item->rc_id?>);" data-toggle="modal" data-target="#mydetial"><i class="fa fa-align-justify" style="font-size: 20px; color: #1e252f"></i></a></td>
                    <td><a @click="confirmdata(<?php echo $item->rc_id?>);"><i class="fa fa-refresh" style="font-size: 20px; color: #00CC00"></i></a> </td>

                </tr>
                <?php $num++ ; }?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- modal -->
    <div class="modal" id="mydetial">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p>ที่อยู่ : {{detailaddress}}<br>
                    เพิ่มเติม : {{detailetc}}</p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- modal -->
</div>
<script>
    new Vue({
        el : "#personproject",
        data : {
            detailaddress : "",
            detailetc : ""
        },
        methods : {
            detaildata : function (pk) {
                var self = this ;
                $.getJSON("<?php echo site_url('QueryJSONReport/getdetailperson?pk=')?>"+pk, function (data) {
                    $.each(data, function (k, v) {
                        self.detailaddress = v['rc_no']+" หมู่ : "+v['mo_name']+" ตำบล : "+v['tu_name'] + " " + v['rc_detailaddress'];
                        self.detailetc = v['rc_detail'];
                    });
                });
            },
            confirmdata : function (pk) {
                $.post("<?php echo site_url('UpdateData/confirmperson?pk=')?>"+pk,{pk:pk});
                window.location.reload();
            }
        }
    });
</script>