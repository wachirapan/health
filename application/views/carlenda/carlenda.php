<div id="form-carlenda">
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>วันที่</td>
                <td>ถึงวันที่</td>
                <td>คนไข้</td>
                <td>ข้อมูลการตรวจ</td>
                <td>แจ้งเรื่องต่อ</td>
                <td>เสร็จสิ้น</td>
            </tr>
            <tbody>
            <tr v-for="item in datacalenda">
                <td>{{item.sch_datebefore}}</td>
                <td>{{item.sch_dateafter}}</td>
                <td>{{item.rc_name}} {{item.rc_lastname}}</td>
                <td><a @click="information(item.le_id, item.rc_name, item.rc_lastname);"><i class="fa fa-clipboard" style="font-size: 20px; color: grey"></i> </a></td>
                <td><a @click="inform(item.le_id);"><i class="fa fa-files-o" style="font-size: 20px;"></i></a></td>
                <td><a @click="finishcheck(item.le_id);"><i class="fa fa-link" style="font-size: 20px; color: darkmagenta;"></i> </a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    new Vue({
        el : "#form-carlenda",
        data : {
            datacalenda : []
        },
        mounted : function () {
            var self = this ;
            $.getJSON("<?php echo site_url('GetJSON/qcarlenda')?>", function (data) {
                console.log(data);
                self.datacalenda = data ;
            });
        },
        methods : {
            information : function (id, name, lastname) {
                window.location.href = "<?php echo site_url('welcome/information?id=')?>"+id+"&name="+name+"&lastname="+lastname;

            },
            inform : function (id) {
                $.post("<?php echo site_url('UpdateData/updateinform')?>",{id:id});
                window.location.reload();
            },
            finishcheck : function (id) {
                $.post("<?php echo site_url('UpdateData/finishcheck')?>",{id:id});
                window.location.reload();
            }
        }
    });
</script>