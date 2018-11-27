<div id="form-reportoutproject">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3 align="center">ค้นหาส่งต่อโรงพยาบาล</h3>
            <form action="<?php echo site_url('ReportData/reportoutofproject')?>" method="post" style="padding-top: 15px">

                <div class="form-group">
                    <label>โปรเจค</label>
                    <select class="form-control" id="btid"></select>
                </div>

                <button class="btn btn-success" type="submit">ค้นหา</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<script>
    new Vue({
        el : "#form-reportoutproject",
        data : {

        },
        mounted : function () {
            $.getJSON("<?php  echo site_url('GetJSON/qoutofproject')?>", function (data) {
                $.each(data , function (k,v) {
                    $('#btid').append('<option value="'+v['bp_id']+'">'+v['bp_before']+'-'+v['bp_after']+'</option>');
                });
            });
        }


    });
</script>