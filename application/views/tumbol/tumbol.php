<div id="form-tumbol">
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>ตำบล</td>
                    <td>แก้ไข</td>
                    <td>ลบ</td>
                </tr>
                <tbody>
                <tr v-for="item in datatumbol">
                    <td>{{item.tu_name}}</td>
                    <td><a @click="seteditdata(item.tu_id, item.tu_name);"><i class="fa fa-undo" style="font-size: 20px; color: #00acc1"></a></td>
                    <td><a @click="deletedata(item.tu_id)"><i class="fa fa-scissors" style="font-size: 20px; color: red"></i> </a></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>ตำบล</label>
                <input type="text" class="form-control" v-model="name">
            </div>
            <button id="btninsert" class="btn btn-success" @click="insertdata();">submit</button>
            <button id="btnupdate" class="btn btn-info" @click="updatedata();">submit</button>
        </div>
    </div>
</div>
<script>
    $('#btnupdate').hide();
    var tumbol = new Vue({
        el : "#form-tumbol",
        data : {
            datatumbol : [],
            name : "",
            pk : ""
        },
        mounted : function()
        {
            var self = this ;
            $.getJSON("<?php echo site_url('GetJSON/qtumbol')?>", function (data) {
                self.datatumbol = data ;
            });
        },
        methods : {
            insertdata : function () {
                alert(this.name);
                $.post("<?php echo site_url('InsertData/inserttumbol')?>",{name : this.name});
                window.location.reload();
            },
            seteditdata :function(pk, name){
                this.pk = pk ;
                this.name = name ;
                $('#btninsert').hide();
                $('#btnupdate').show();
            },
            updatedata : function () {
                $.post("<?php echo site_url('UpdateData/updatetumbol')?>",{pk : this.pk, name :this.name});
                window.location.reload();
            },
            deletedata : function (pk) {
                $.post("<?php echo site_url('DeleteData/deletetumbol')?>",{pk:pk});
                window.location.reload();
            }
        }
    });
</script>