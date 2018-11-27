<div id="form-information">
    <input type="text" class="form-control" v-model="pk" >
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>ชื่อ ผู้ป่วย</label>
                <input type="text" class="form-control" value="<?php echo $name."  ". $lastname?>">
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>ตรวจความดัน</label>
                <input type="text" class="form-control" v-model="pressure">
            </div>
        </div>
        <div class="col-md-12" style="padding-top: 10px">
            <div class="form-group">
                <label>สอบถามเพิ่มเติม</label>
                <textarea rows="5" class="form-control" v-model="detail"></textarea>
            </div>
            <button class="btn btn-success" @click="inserdata();">จัดเก็บ</button>
        </div>
    </div>
</div>
<script>
    new Vue({
        el : "#form-information",
        data : {
            pk : "<?php echo $id?>",
            pressure : "",
            detail : ""

        },
        methods : {
            inserdata : function () {
                $.post("<?php echo site_url('InsertData/insertinfomation')?>",{pk:this.pk,pressure:this.pressure,detial:this.detail});
                window.location.href = "<?php echo site_url('welcome/carlenda')?>" ;
            }
        }
    });
</script>