<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3 align="center">ค้นหาส่งต่อโรงพยาบาล</h3>
        <form action="<?php echo site_url('ReportData/reportdetailhospital')?>" method="post" style="padding-top: 15px">

            <div class="form-group">
                <label>วันที่เริ่ม</label>
                <input type="date" class="form-control" name="datebefore">
            </div>
            <div class="form-group">
                <label>วันที่สิ้นสุด</label>
                <input type="date" class="form-control" name="dateafter">
            </div>
            <button class="btn btn-success" type="submit">ค้นหา</button>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>