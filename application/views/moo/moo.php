<div id="form-moo">
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>ชื่อหมู่บ้าน</td>
                    <td>แก้ไข</td>
                    <td>ลบ</td>
                </tr>
                <tbody>
                <tr v-for="item in datamoo">
                    <td>{{item.mo_name}}</td>
                    <td><a @click="seteditdata(item.mo_id, item.mo_name);"><i class="fa fa-undo" style="font-size: 20px; color: #00acc1"></a></td>
                    <td><a @click="deletedata(item.mo_id)"><i class="fa fa-scissors" style="font-size: 20px; color: red"></i> </a></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>ชื่อหมู่บ้าน</label>
                <input type="text" class="form-control" v-model="mooname">
            </div>
            <button id="btninsert" class="btn btn-success" @click="insertdata()">submit</button>
            <button id="btnupdate" class="btn btn-info" @click="updatedata();">submit</button>
        </div>
    </div>
</div>
<script>
    $('#btnupdate').hide();
    var moo = new Vue({
        el : "#form-moo",
        data : {
            datamoo : [],
            mooname : "",
            pk : ""
        },
        mounted : function () {
            var self = this ;
            $.getJSON("<?php echo site_url('GetJSON/qmoo')?>", function (data) {
                self.datamoo = data ;
            });
        },
        methods : {
            insertdata : function () {
                $.post("<?php echo site_url('InsertData/insertmoo')?>",{mooname : this.mooname});
                window.location.reload();
            },
            seteditdata : function (id, name) {
                this.pk = id ;
                this.mooname = name ;
                $('#btnupdate').show();
                $('#btninsert').hide();
            },
            updatedata : function () {
                $.post("<?php echo site_url('UpdateData/updatemoo')?>",{pk:this.pk, name : this.mooname});
                window.location.reload();
            },
            deletedata : function (pk) {
                $.post("<?php echo site_url('DeleteData/delmoo')?>",{pk:pk})
            }

        }
    });
</script>