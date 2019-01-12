<div id="form-register">
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-6" style="padding-left: 0">
                <div class="form-group">
                    <label>คำนำหน้า</label>
                    <select class="form-control" id="title"></select>
                </div>
            </div>
            <div class="col-md-6" style="padding-right: 0">
                <div class="form-group">
                    <label>ตำแหน่ง</label>
                    <select class="form-control" id="position">

                    </select>
                </div>
            </div>
            <div class="col-md-12" style="padding-left: 0; padding-right: 0; padding-top: 15px">
                <div class="form-group">
                    <label>บ้านเลขที่</label>
                    <input type="text" class="form-control" v-model="noaddress">
                </div>
                <div class="form-group">
                    <label>ตำบล</label>
                    <select class="form-control" id="tumbol"></select>
                </div>
                <div class="form-group">
                    <label>ชื่อเข้าสู่ระบบ</label>
                    <input type="text" class="form-control" v-model="userlogin">
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>ชื่อ สกุล</label>
                <input type="text" class="form-control" v-model="name">
            </div>
            <div class="form-group">
                <label>เบอร์ติดต่อ</label>
                <input type="text" class="form-control" v-model="tel">
            </div>
            <div class="form-group">
                <label>หมู่บ้าน</label>
                <select class="form-control" id="moo"></select>
            </div>
            <div class="form-group">
                <label>รหัสผ่าน</label>
                <input type="text" class="form-control" v-model="pwd">
            </div>
        </div>
        <div class="col-md-12" style="padding-top: 15px">
            <div class="form-group">
                <label>รายละเอียดอื่นๆ</label>
                <textarea type="text" rows="5" class="form-control" v-model="detail"></textarea>
            </div>
            <button id="btninsert" class="btn btn-success" @click="insertdata();">submit</button>
            <button id="btnupdate" class="btn btn-info" @click="updatedata()">submit</button>
        </div>
        <div class="col-md-12" style="padding-top: 15px">
            <table class="table">
                <tr>
                    <td>ชื่อ สกุล</td>
                    <td>เบอร์โทร</td>
                    <td>เพิ่มเติม</td>
                    <td>แก้ไข</td>
                    <td>ลบ</td>
                </tr>
                <tbody>
                <?php foreach ($results as $result) { ?>
                    <tr>
                        <td><?php echo $result->ps_name ?></td>
                        <td><?php echo $result->ps_tel ?></td>
                        <td><a @click="setlookdetail(<?php echo $result->ps_id; ?>);" data-toggle="modal" data-target="#mydetail"><i class="fa fa-align-justify" style="font-size: 20px"></i></a></td>
                        <td><a @click="seteditdata(<?php echo $result->ps_id; ?>)"><i class="fa fa-undo" style="font-size: 20px; color: #00acc1"></a></td>
                        <td><a @click="deletedata(<?php echo $result->ps_id?>)"><i class="fa fa-scissors" style="font-size: 20px; color: red"></i> </a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <p><?php echo $links; ?></p>
        </div>
    </div>
    <!-- modal -->
    <div class="modal" id="mydetail">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p>ตำแหน่ง : {{detailposition}}<br>
                        เลขที่บ้าน : {{detailnoaddress}}<br>
                        หมู่ที่ : {{detailmoo}}<br>
                        ตำบล : {{detailtumbol}}<br>
                        รายละเอียดเพิ่มเติม : {{detailetc}}
                    </p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- modal -->
</div>

<script>
    $('#btnupdate').hide();
    new Vue({
        el: "#form-register",
        data: {
            dataposition: "",
            noaddress: "",
            name: "",
            tel: "",
            detail: "",
            pk : "",
            userlogin : "",
            pwd : "",

            detailposition: "",
            detailnoaddress: "",
            detailmoo: "",
            detailtumbol: "",
            detailetc: ""
        },
        mounted: function () {
            $.getJSON("<?php echo site_url('GetJSON/qmoo')?>", function (data) {
                $.each(data, function (k, v) {
                    $('#moo').append('<option value="' + v['mo_id'] + '">' + v["mo_name"] + '</option>');
                });
            });
            $.getJSON("<?php echo site_url('GetJSON/qtumbol')?>", function (data) {
                $.each(data, function (k, v) {
                    $('#tumbol').append('<option value="' + v['tu_id'] + '">' + v["tu_name"] + '</option>');
                });
            });
            $.getJSON("<?php echo site_url('GetJSON/qtitle')?>", function (data) {
                $.each(data, function (k, v) {
                    $('#title').append('<option value="' + v['ti_id'] + '">' + v["ti_name"] + '</option>');
                });
            });
            $.getJSON("<?php echo site_url('GetJSON/qposition')?>", function (data) {
                $.each(data, function (k, v) {
                    $('#position').append('<option value="' + v['po_id'] + '">' + v["po_name"] + '</option>');

                });
            });
        },
        methods: {
            insertdata: function () {
                $.post("<?php echo site_url('InsertData/insertpersonal')?>", {
                    title: $('#title').val(),
                    position: $('#position').val(),
                    name: this.name,
                    noaddress: this.noaddress,
                    tel: this.tel,
                    moo: $('#moo').val(),
                    tumbol: $('#tumbol').val(),
                    detail: this.detail,
                    username : this.userlogin,
                    pwd : this.pwd
                });
                reload();
            },
            setlookdetail: function (pk) {
                var self = this;
                $.getJSON("<?php echo site_url('GetJSON/qdetailpersonal?pk=')?>" + pk, function (data) {
                    $.each(data, function (k, v) {
                        self.detailposition = v['po_name'];
                        self.detailnoaddress = v['ps_no'];
                        self.detailmoo = v['mo_name'];
                        self.detailtumbol = v['tu_name'];
                        self.detailetc = v['ps_detail'];
                    });
                });
            },
            seteditdata: function (pk) {
                var self = this;
                $('#btninsert').hide();
                $('#btnupdate').show();
                this.pk = pk ;
                $.getJSON("<?php echo site_url('GetJSON/qdetailpersonal?pk=')?>" + pk, function (data) {
                    $.each(data, function (k, v) {
                        $('#moo').append('<option value="' + v['mo_id'] + '" selected>' + v["mo_name"] + '</option>');
                        $('#tumbol').append('<option value="' + v['tu_id'] + '" selected>' + v["tu_name"] + '</option>');
                        $('#title').append('<option value="' + v['ti_id'] + '" selected>' + v["ti_name"] + '</option>');
                        $('#position').append('<option value="' + v['po_id'] + '" selected>' + v["po_name"] + '</option>');
                        self.name = v['ps_name'];
                        self.noaddress = v['ps_no'];
                        self.tel = v['ps_tel'];
                        self.detail = v['ps_detail'];
                        self.userlogin = v['ps_userlogin'];
                        self.pwd = v['ps_pwd'];
                    });
                });
            },
            updatedata : function () {
                    $.post("<?php echo site_url('UpdateData/updatepersonal')?>", {
                        pk:this.pk,
                        title: $('#title').val(),
                        position: $('#position').val(),
                        name: this.name,
                        noaddress: this.noaddress,
                        tel: this.tel,
                        moo: $('#moo').val(),
                        tumbol: $('#tumbol').val(),
                        detail: this.detail,
                        userlogin : this.userlogin,
                        pwd : this.pwd
                    });
                reload();
            },
            deletedata : function (pk) {
                $.post("<?php echo site_url('DeleteData/delpersonal')?>",{pk:pk});
                reload();
            }

        }

    });
    function reload()
    {
        location.reload();
    }
</script>