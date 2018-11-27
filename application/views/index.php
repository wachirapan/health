<div id="form-recruit">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>คำนำหน้า : </label>
                <select class="form-control" id="title">

                </select>
            </div>
            <div class="form-group">
                <label>อายุ : </label>
                <input type="text" class="form-control" v-model="age">
            </div>
            <div class="form-group">
                <label>บ้านเลขที่ : </label>
                <input type="text" class="form-control" v-model="number">
            </div>
            <div class="form-group">
                <label>ตำบล : </label>
                <select class="form-control" id="tumbol">
                    <option value="1">กรุณาเลือกตำบล</option>
                </select>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>ชื่อ : </label>
                <input type="text" class="form-control" v-model="name">
            </div>
            <div class="form-group">

                    <label>นามสกุล : </label>
                    <input type="text"class="form-control" v-model="lastname">

            </div>
            <div class="form-group">
                <label>หมู่ที่ : </label>
                <select class="form-control" id="moo">
                    <option value="1">กรุณาเลือกหมู่บ้าน</option>
                </select>
            </div>
            <div class="form-group">
                <label>เพิ่มเติมที่อยู่ : </label>
                <input type="text" class="form-control" v-model="detailaddress">
            </div>
        </div>
        <div class="col-md-12" style="padding-top: 10px">
            <div class="form-group">
                <label>ข้อมูลเพิ่มเติมอาการป่วย : </label>
                <textarea rows="5" class="form-control" v-model="detail"></textarea>
            </div>
        </div>
        <div class="col-md-6" style="padding-top: 15px">
            <button class="btn btn-success" @click="insertdata()">submit</button>
            <button id="btnupdate" class="btn btn-info" @click="updatedata()">submit</button>
        </div>

        <div class="col-md-12" style="padding-top: 15px"  >
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>ชื่อสกุล</td>
                        <td>อายุ</td>
                        <td>เพิ่มเติม</td>
                        <td>แก้ไข</td>
                        <td>ลบ</td>
                    </tr>
                    <tbody>
                    <?php foreach($results as $item){?>
                    <tr>
                        <td><?php echo $item->rc_name. " " .$item->rc_lastname ;?></td>
                        <td><?php echo $item->rc_age; ?></td>
                        <td><a @click="lookdetail(<?php echo $item->rc_id?>)" data-toggle="modal" data-target="#mydetail"><i class="fa fa-align-justify" style="font-size: 20px"></i></a> </td>
                        <td><a @click="setedit(<?php echo $item->rc_id?>)"><i class="fa fa-undo" style="font-size: 20px; color: #00acc1"></a></td>
                        <td><a @click="deletedata(<?php echo $item->rc_id?>)"><i class="fa fa-scissors" style="font-size: 20px; color: red"></i> </a></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <p><?php echo $links; ?></p>
        </div>
    </div>

    <!-- modal -->
    <div class="modal" id="mydetail">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">รายละเอียดเพิ่มเติม</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p>เลขที่บ้าน : {{detailnumber}} <br>
                        หมู่ที่ : {{detailmoo}} <br>
                        ตำบล : {{detailtumbol}} <br>
                        เพิ่มเติมที่อยู่ : {{additionaladdress}}<br>
                        ข้อมูลเพิ่มเติม ผู้ป่วย : {{additiondetail}}
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
    var recruit = new Vue({
        el : "#form-recruit",
        data : {
            datarecruit : [],
            name : "",
            lastname : "",
            age : "",
            number : "",
            detailaddress : "",
            detail : "",
            pk : "",

            detailnumber : "",
            detailmoo : "",
            detailtumbol : "",
            additionaladdress : "",
            additiondetail : "",

        },
        mounted : function () {
            $.getJSON("<?php echo site_url('GetJSON/qmoo')?>", function (data) {
                $.each(data, function(k, v){
                    $('#moo').append('<option value="'+v['mo_id']+'">'+v["mo_name"]+'</option>');
                });
            });
            $.getJSON("<?php echo site_url('GetJSON/qtumbol')?>", function (data) {
                $.each(data, function (k, v) {
                    $('#tumbol').append('<option value="'+v['tu_id']+'">'+v["tu_name"]+'</option>');
                }) ;
            });
            $.getJSON("<?php echo site_url('GetJSON/qtitle')?>", function (data) {
                $.each(data, function (k, v) {
                    $('#title').append('<option value="'+v['ti_id']+'">'+v["ti_name"]+'</option>');
                }) ;
            });
        },
        methods : {
            insertdata: function () {
                $.post("<?php echo site_url('InsertData/insertrecruit')?>", {
                    title: $('#title').val(),
                    name: this.name,
                    lastname: this.lastname,
                    age: this.age,
                    number: this.number,
                    moo: $('#moo').val(),
                    tumbol: $('#tumbol').val(),
                    detailaddress: this.detailaddress,
                    detail: this.detail
                });
                window.location.reload();
            },
            lookdetail: function (pk) {
                var self = this ;
                $.getJSON("<?php echo site_url('GetJSON/qgetrecruit?pk=')?>"+pk, function (data) {
                    $.each(data, function (k, v) {
                        self.detailnumber = v['rc_no'];
                        self.detailmoo = v['mo_name'];
                        self.detailtumbol = v['tu_name'];
                        self.additionaladdress = v['rc_detailaddress'];
                        self.additiondetail = v['rc_detail'];
                    });
                });
            },
            setedit : function (pk) {
                $('#btnupdate').show();
                $('#btninsert').hide();
                this.pk = pk ;
                var self = this ;
                $.getJSON("<?php echo site_url('GetJSON/qgetrecruit?pk=')?>"+pk, function (data) {
                    $.each(data, function(k, v){
                        $('#title').append('<option value="'+v['tc_title']+'" selected>'+v["ti_name"]+'</option>');
                        self.name = v['rc_name'];
                        self.lastname = v['rc_lastname'];
                        self.age = v['rc_age'];
                        self.number = v['rc_no'];
                        self.detailaddress = v['rc_detailaddress'];
                        self.detail = v['rc_detail'];
                        $('#moo').append('<option value="'+v['rc_moo']+'" selected>'+v["mo_name"]+'</option>');
                        $('#tumbol').append('<option value="'+v['rc_tumbol']+'" selected>'+v["tu_name"]+'</option>');
                    }) ;
                });
            },
            updatedata : function () {
                $.post("<?php echo site_url('UpdateData/updaterecruit')?>",{
                    pk:this.pk,
                    title: $('#title').val(),
                    name: this.name,
                    lastname: this.lastname,
                    age: this.age,
                    number: this.number,
                    moo: $('#moo').val(),
                    tumbol: $('#tumbol').val(),
                    detailaddress: this.detailaddress,
                    detail: this.detail
                });
                window.location.reload();
            },
            deletedata : function (pk) {
                $.post("<?php echo site_url('DeleteData/deleterecruit')?>",{pk:pk});
                window.location.reload();
            }

        }

    });
</script>
