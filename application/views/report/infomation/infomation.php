<div class="row">
   <div class="col-md-6">
       <h3>ค้นหาการตรวจ อสม.</h3>
       <form action="<?php echo site_url('ReportData/reportcheckinfo')?>" method="post" style="padding-top: 15px">
           <input type="hidden" name="id" value="1">
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
    <div class="col-md-6">
        <h3>ค้นหาการตรวจ หมอ.</h3>
        <form action="<?php echo site_url('ReportData/reportcheckinfo')?>" method="post" style="padding-top: 15px">
            <input type="hidden" name="id" value="2">
            <div class="form-group">
                <label>วันที่เริ่ม</label>
                <input type="date" class="form-control" name="datebefore">
            </div>
            <div class="form-group">
                <label>วันที่สิ้นสุด</label>
                <input type="date" class="form-control" name="dateafter">
            </div>
            <button class="btn btn-info" type="submit">ค้นหา</button>
        </form>
    </div>
</div>