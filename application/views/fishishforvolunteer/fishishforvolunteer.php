<div id="form-volunteer">
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>วันที่</td>
                <td>ถึงวันที่</td>
                <td>คนไข้</td>
                <td>สถานะ</td>
            </tr>
            <tbody>
            <tr v-for="item in datavolun">
                <td>{{item.sch_datebefore}}</td>
                <td>{{item.sch_dateafter}}</td>
                <td>{{item.rc_name}} {{item.rc_lastname}}</td>
                <td><h4 v-if="item.le_status === 2" style="color: red;">รอหมอจรวจ</h4>
                    <h4 v-else style="color: blue;">สำเร็จ</h4></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    new Vue({
        el : "#form-volunteer",
        data : {
            datavolun : []
        },
        mounted : function () {
            var self = this;
            $.getJSON("<?php echo site_url('GetJSON/qvolunteer')?>", function (data) {
                self.datavolun = data ;
            });
        }
    });
</script>