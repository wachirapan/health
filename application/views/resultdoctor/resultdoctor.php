<div id="form-resulrdoctor">
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>วันที่</td>
                <td>ถึงวันที่</td>
                <td>คนไข้</td>
                <td>สถานะ</td>
            </tr>
            <tbody>
            <tr v-for="item in dataresult">
                <td>{{item.sch_datebefore}}</td>
                <td>{{item.sch_dateafter}}</td>
                <td>{{item.rc_name}} {{item.rc_lastname}}</td>
                <td><h4 style="color: red;">สำเร็จ</h4></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    new Vue({
        el: "#form-resulrdoctor",
        data: {
            dataresult: []
        },
        mounted : function () {
            var self = this;
            $.getJSON("<?php echo site_url('GetJSON/qresultdoctor')?>", function (data) {
                self.dataresult = data
            });
        }
    });
</script>