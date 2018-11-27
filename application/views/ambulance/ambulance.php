<div id="form-ambulance">
    <div class="row">
        <div class="col-md-8">
        <table class="table">
            <tr>
                <td>ชื่อ สกุล</td>
                <td>สาเหตุ</td>
                <td>ออกรายงาน</td>
                <td>เสร็จสิ้น</td>
            </tr>
            <tbody>
            <tr v-for="item in dataambulance">
                <td>{{item.rc_name}} {{item.rc_lastname}}</td>
                <td>{{item.amb_detail}}</td>
                <td><a @click="reportambulance(item.rc_name, item.rc_lastname, item.amb_detail);"><i class="fa fa-file-pdf-o" style="font-size: 20px;"></i></a></td>
                <td><a @click="finishambulance(item.amb_id);"><i class="fa fa-check" style="font-size: 20px; color: #00CC00"></i></a></td>
            </tr>
            </tbody>
        </table>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>ชื่อผู้ใช้</label>
                <select class="form-control" id="psid"></select>
            </div>
            <div class="form-group">
                <label>สาเหตุ</label>
                <textarea rows="5" class="form-control" v-model="detail"></textarea>
            </div>
            <button class="btn btn-success" @click="insertdata();">จัดเก็บเอกสาร</button>
        </div>
    </div>
</div>
<script>
    new Vue({
        el : "#form-ambulance",
        data : {
            detail : "",
            dataambulance : []
        },
        mounted : function () {
            var self = this ;
            $.getJSON("<?php echo site_url('GetJSON/qrecruitamb')?>", function (data) {
                $.each(data, function (k,v) {

                    $('#psid').append('<option value="'+v['rc_id']+'">'+v['rc_name']+' '+v['rc_lastname']+'</option>')
                });
            });
            $.getJSON("<?php echo site_url('GetJSON/qambulance')?>", function (data) {
                self.dataambulance = data ;
            });
        },
        methods : {
            insertdata : function () {
                $.post("<?php echo site_url('InsertData/insertambulance')?>",{psid:$('#psid').val(),detail:this.detail});
                window.location.reload();
            },
            reportambulance : function(name, lastname, detail){
               window.open("<?php echo site_url('ReportData/reportambulance?name=')?>"+name+"&lastname="+lastname+"&detail="+detail);
            },
            finishambulance : function (id) {
                $.post("<?php echo site_url('UpdateData/finishambulance')?>",{id:id});
                window.location.reload();
            }
        }
    });
</script>