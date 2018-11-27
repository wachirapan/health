<div id="form-leave">
    <div class="row">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>ตารางรอบ</td>
                        <td>ผู้ตรวจ</td>
                        <td>คนไข้</td>
                        <td>ลบ</td>
                    </tr>
                    <tbody>
                    <tr v-for="item in dataleave">
                        <td>{{item.sch_datebefore}} {{item.sch_dateafter}}</td>
                        <td>{{item.ps_name}}</td>
                        <td>{{item.rc_name}} {{item.rc_lastname}}</td>
                        <td><a @click="deletedata(item.le_id);"><i class="fa fa-table" style="font-size: 20px; color: #7a67bb"></i></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>ตารางเวลา</label>
                <select class="form-control" id="schedule"></select>
            </div>
            <div class="form-group">
                <label>ผู้ออกตรวจ</label>
                <select class="form-control" id="person"></select>
            </div>
            <div class="form-group">
                <label>คนไข้</label>
                <select class="form-control" id="recruit"></select>
            </div>
            <div class="form-group">
                <label>เพิ่มเติม</label>
                <textarea rows="5" class="form-control" v-model="detail"></textarea>
            </div>
            <button id="btninsert" class="btn btn-success" @click="insertdata();">submit</button>
            <button id="btnupdate" class="btn btn-info">submit</button>
        </div>
    </div>
</div>
<script>
    $('#btnupdate').hide();
    new Vue({
        el : "#form-leave",
        data : {
            detail : "",
            dataleave : []
        },
        mounted : function () {
            var self = this ;
            $.getJSON("<?php echo site_url('GetJSON/qpersonleave')?>",function(data){
                $.each(data, function (k, v) {
                    $('#person').append('<option value="'+v['ps_id']+'">'+v['ps_name']+'</option>');
                });
            });
            $.getJSON("<?php echo site_url('GetJSON/qschedule')?>", function (data) {
                $.each(data, function () {
                   $('#schedule').append('<option value="'+v['sch_id']+'">'+v['sch_datebefore']+'-'+v['sch_dateafter']+'</option>');
                });
            });
            $.getJSON("<?php echo site_url('GetJSON/qrecruitleave')?>", function (data) {
                $.each(data , function (k,v) {
                    $('#recruit').append('<option value="'+v['rc_id']+'">'+v['rc_name']+' '+ v['rc_lastname']+'</option>');
                });
            });
            $.getJSON("<?php echo site_url('GetJSON/qdataleave')?>", function (data) {
                self.dataleave = data ;
            });
        },
        methods : {
            insertdata : function () {
                $.post("<?php echo site_url('InsertData/insertleave')?>",{schedule:$('#schedule').val(),person:$('#person').val(),
                    recruit:$('#recruit').val(),detail:this.detail});
                window.location.reload();
            },
            deletedata : function (id) {
                $.post("<?php echo site_url('DeleteData/delleave')?>",{id:id});
                window.location.reload();
            }
        }
    });
</script>
