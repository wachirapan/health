<div id="form-join">
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>ลำดับ</td>
                <td>วันที่เริ่ม</td>
                <td>วันที่สิ้นสุด</td>
                <td>ผู้เข้าร่วม</td>
                <td>เพิ่มเติม</td>
                <td>ผ่านเข้าโครงการ</td>
            </tr>
            <tbody>
            <?php
            $num = 1 ;
            foreach($results as $item){?>
                <tr>
                    <td><?php echo $num?></td>
                    <td><?php echo $item->bp_before?></td>
                    <td><?php echo $item->bp_after?></td>
                    <td><?php echo $item->count?></td>
                    <td><a @click="detaildata(<?php echo $item->bp_id ?>)"><i class="fa fa-align-justify" style="font-size: 20px;"></i></a></td>
                    <td><a @click="detailcheck(<?php echo $item->bp_id?>);" ><i class="fa fa-table" style="font-size: 20px; color: #7a67bb"></i></a></td>
                </tr>
            <?php $num++; }?>
            </tbody>
        </table>
    </div>

    <!-- modal -->
    <div class="modal" id="mydetail">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">รายละเอียดเพิ่มเติม</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p>เลขที่บ้าน : {{detailnumber}} <br>
                        หมู่ที่ : {{detailmoo}} <br>
                        ตำบล : {{detailtumbol}} <br>
                        เพิ่มเติมที่อยู่ : {{additionaladdress}}<br>
                        ข้อมูลเพิ่มเติม ผู้ป่วย : {{additiondetail}}
                    </p>
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
        el : "#form-join",
        data : {
            detailnumber : "",
            detailmoo : "",
            detailtumbol : "",
            additionaladdress : "",
            additiondetail : "",
        },
        mounted : function () {

        },
        methods : {
            lookdetail: function (pk) {
                var self = this ;
                $.getJSON("<?php echo site_url('GetJSON/qgetrecruit?pk=')?>"+pk, function (data) {
                    $.each(data, function (k, v) {
                        self.detailnumber = v['rc_no'];
                        self.detailmoo = v['mo_name'];
                        self.detailtumbol = v['tu_name'];
                        self.additionaladdress = v['rc_detailaddress'];
                        self.additiondetail = v['rc_detail'];
                    });
                });
            },
            detaildata : function (pk) {
                window.open("<?php echo site_url('ReportData/getpersonalproject?pk=')?>"+pk, "_blank");
            },
            detailcheck : function (pk) {
                window.open("<?php echo site_url('ReportData/getchecktrue?pk=')?>"+pk,"_blank");
            }
        }
    });
</script>