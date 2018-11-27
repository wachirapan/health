<div id="form-group">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>วันที่เริ่มรับ</label>
                <input type="date" class="form-control" v-model="before">
            </div>
            <div class="form-group">
                <label>วันที่เริ่มรับ</label>
                <input type="date" class="form-control" v-model="after">
            </div>
            <button id="btninsert" class="btn btn-success" @click="insertdata();">submit</button>
            <button id="btnupdate" class="btn btn-info" @click="updatedata();">submit</button>
        </div>
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>วันที่เริ่ม</td>
                        <td>ถึงวันที่</td>
                        <td>แก้ไข</td>
                        <td>รับต่อ</td>
                        <td>สิ้นสุด</td>
                    </tr>
                    <tbody>
                    <?php foreach ($results as $result) { ?>
                    <tr>
                        <td><?php echo $result->bp_before?></td>
                        <td><?php echo $result->bp_after?></td>
                        <td><a @click="setedtidata(<?php echo $result->bp_id?>);"><i class="fa fa-undo" style="font-size: 20px; color: #00acc1"></a></td>
                        <td><a @click="progress(<?php echo $result->bp_id?>);"><i class="fa fa-files-o" style="font-size: 20px; color: #7a67bb"></i> </a></td>
                        <td><a @click="finishproject(<?php echo $result->bp_id?>);"><i class="fa fa-paperclip" style="font-size: 20px; color: red;"></i> </a></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <p><?php echo $links ?></p>
        </div>
    </div>
</div>
<script>
    $('#btnupdate').hide();
    new Vue({
        el : "#form-group",
        data : {
            before : "",
            after : "",
            pk : ""
        },
        methods :  {
            insertdata : function () {
                $.post("<?php echo site_url('InsertData/insertproject')?>",{before:this.before, after:this.after});
                window.location.reload();
            },
            setedtidata : function (pk) {
                this.pk = pk ;
                $('#btninsert').hide();
                $('#btnupdate').show();
                var self = this ;
                $.getJSON("<?php echo site_url('GetJSON/qgeteditproject?pk=')?>"+pk, function (data) {
                    $.each(data, function (k, v) {
                        self.before = v['bp_before'];
                        self.after = v['bp_after'];
                    });
                });
            },
            updatedata : function () {
                $.post("<?php echo site_url('UpdateData/updateproject')?>",{pk:this.pk, before:this.before, after:this.after});
                window.location.reload();
            },
            progress : function (pk) {
                window.location.href = "<?php echo site_url('welcome/setsessionindex?pk=')?>"+pk;
            },
            finishproject : function (pk) {
                $.post("<?php echo site_url('UpdateData/finishproject')?>",{pk:pk});
                window.location.reload();
            }
        }
    });
</script>