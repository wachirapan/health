<div id="form-position">
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>ตำแหน่ง</td>
                    <td>แก้ไข</td>
                    <td>ลบ</td>
                </tr>
                <tbody>
                <tr v-for="item in dataposition">
                    <td>{{item.po_name}}</td>
                    <td><a @click="setedit(item.po_id, item.po_name)"><i class="fa fa-undo" style="font-size: 20px; color: #00acc1"></a></td>
                    <td><a @click="deletedata(item.po_id)"><i class="fa fa-scissors" style="font-size: 20px; color: red"></i> </a></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>ตำแหน่ง</label>
                <input type="text" class="form-control" v-model="name">
            </div>
            <button id="btninsert" class="btn btn-success" @click="insertdata();">submit</button>
            <button id="btnupdate" class="btn btn-info" @click="updatedata();">submit</button>
        </div>
    </div>
</div>
<script>
    $('#btnupdate').hide();
    new Vue({
        el : "#form-position",
        data : {
            dataposition : "",
            name : "",
            pk : ""
        },
        mounted : function () {
            var self = this ;
            $.getJSON("<?php echo site_url('GetJSON/qposition')?>", function (data) {
                self.dataposition = data ;
            });
        },
        methods : {
            insertdata : function () {
                $.post("<?php echo site_url('InsertData/insertposition')?>",{name:this.name});
                window.location.reload();
            },
            setedit : function(pk, name){
                $('#btninsert').hide();
                $('#btnupdate').show();
                this.pk = pk ;
                this.name = name ;
            },
            updatedata : function () {
                $.post("<?php echo site_url('UpdateData/updateposition')?>",{pk:this.pk, name:this.name});
                window.location.reload();
            },
            deletedata : function (pk) {
                $.post("<?php echo site_url('DeleteData/delposition')?>",{pk:pk});
                window.location.reload();
            }
        }
    });
</script>