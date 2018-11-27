<div id="form-schedule">
    <div class="row">
        <div class="col-md-8">
        <table class="table">
            <tr>
                <td>วันที่โปรเจค</td>
                <td>หมู่บ้าน</td>
                <td>วันที่เริ่ม</td>
                <td>วันที่สิ่นสุด</td>
                <td>แก้ไข</td>
                <td>ลบ</td>
                <td>หมดเวลา</td>
            </tr>
            <tbody>
            <tr v-for="item in dataschedule">
                <td>{{item.bp_before}} - {{item.bp_after}}</td>
                <td>{{item.mo_name}}</td>
                <td>{{item.sch_datebefore}}</td>
                <td>{{item.sch_dateafter}}</td>
                <td><a @click="setedit(item.sch_id, item.bp_id, item.bp_before, item.bp_after, item.sch_datebefore, item.sch_dateafter, item.mo_id, item.mo_name);"><i class="fa fa-align-justify" style="font-size: 20px;"></i></a></td>
                <td><a @click="deletedata(item.sch_id)"><i class="fa fa-table" style="font-size: 20px; color: #7a67bb"></i></a></td>
                <td><a @click="closedata(item.sch_id);"><i class="fa fa-pie-chart"></i> </a></td>
            </tr>
            </tbody>
        </table>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>วันที่เริ่ม</label>
                <input type="datetime-local" class="form-control" v-model="datebefore">
            </div>
            <div class="form-group">
                <label>วันที่สิ้นสุด</label>
                <input type="datetime-local" class="form-control" v-model="dateafter">
            </div>
            <div class="form-group">
                <label>หมู่บ้าน</label>
                <select class="form-control" id="moo"></select>
            </div>
            <div class="form-group">
                <label>กลุ่มโปรเจค</label>
                <select class="form-control" id="bpid"></select>
            </div>
            <button id="btninsert" class="btn btn-success" @click="insertdata()">submit</button>
            <button id="btnupdate" class="btn btn-info" @click="updatedata();">submit</button>
        </div>
    </div>
</div>
<script>
    $('#btnupdate').hide();
    new Vue({
        el : "#form-schedule",
        data : {
            datebefore : "",
            dateafter : "",
            dataschedule : [],
            pk : ""
        },
        mounted : function () {
            var self = this ;
            $.getJSON("<?php echo site_url('GetJSON/builtprojectschedule')?>", function (data) {
                $.each(data, function (k, v) {
                    $('#bpid').append('<option value="'+v['bp_id']+'">'+v['bp_before']+" - "+v['bp_after']+'</option>');
                });
            });
            $.getJSON("<?php echo site_url('GetJSON/qschedule')?>", function (data) {
                self.dataschedule = data ;
            });
            $.getJSON("<?php echo site_url('GetJSON/qmoo')?>", function (data) {
                $.each(data , function (k, v) {
                    $('#moo').append('<option value="'+v['mo_id']+'">'+v['mo_name']+'</option>');
                }) ;
            });
        },
        methods : {
            insertdata : function(){
                $.post("<?php echo site_url('InsertData/insertschedule')?>",{datebefore:this.datebefore, dateafter:this.dateafter,
                    bpid:$('bpid').val(),mooid:$("#moo").val()});
                window.location.reload();
            },
            setedit : function (id, bp_id, bp_before, bp_after, sch_datebefore, sch_dateafter, mooid, mooname) {
                $('#btninsert').hide();
                $('#btnupdate').show();
                this.pk = id ;
                $('#bpid').append('<option value="'+bp_id+'" selected>'+bp_before+'-'+bp_after+'</option>');
                $("#moo").append('<option value="'+mooid+'" selected>'+mooname+'</option>');
                this.datebefore = sch_datebefore ;
                this.dateafter = sch_dateafter ;
            },
            updatedata : function () {
                $.post("<?php echo site_url('UpdateData/updateschedule')?>",{pk:this.pk,datebefore:this.datebefore, dateafter:this.dateafter,
                    bpid:$('bpid').val(),mooid:$("#moo").val()});
                window.location.reload();
            },
            deletedata : function (pk) {
                $.post("<?php echo site_url('DeleteData/delschedule')?>",{pk:pk});
                window.location.reload();
            },
            closedata : function (id) {
                $.post("<?php echo site_url('UpdateData/closeschedule')?>",{id:id});
                window.location.reload();
            }
        }
    });
</script>