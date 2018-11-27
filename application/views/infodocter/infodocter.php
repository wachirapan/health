<div id="form-infodocter">
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>วันที่</td>
                <td>ถึงวันที่</td>
                <td>คนไข้</td>
                <td>ข้อมูลการตรวจ</td>
                <td>เสร็จสิ้น</td>
            </tr>
            <tbody>
            <tr v-for="item in datainfo">
                <td>{{item.sch_datebefore}}</td>
                <td>{{item.sch_dateafter}}</td>
                <td>{{item.rc_name}} {{item.rc_lastname}}</td>
                <td><a @click="informationdoc(item.le_id, item.rc_name, item.rc_lastname);"><i class="fa fa-clipboard" style="font-size: 20px; color: grey"></i> </a></td>
                <td><a @click="finishcheckdoc(item.le_id);"><i class="fa fa-link" style="font-size: 20px; color: darkmagenta;"></i> </a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    new Vue({
        el : "#form-infodocter",
        data : {
            datainfo : []
        },
        mounted : function () {
            var self = this ;
            $.getJSON("<?php echo site_url('GetJSON/qinfodocter')?>", function (data) {
                self.datainfo = data ;
            });
        },
        methods : {
            informationdoc : function (id, name, lastname) {
                window.location.href = "<?php echo site_url('welcome/informationdoc?id=')?>"+id+"&name="+name+"&lastname="+lastname;
            },
            finishcheckdoc : function (id) {
                $.post("<?php echo site_url('UpdateData/finishcheckdoc')?>",{id:id});
                window.location.reload();
            }
        }
    });
</script>