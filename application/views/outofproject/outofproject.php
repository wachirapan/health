
<div id="form-outofproject">
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>ลำดับ</td>
                    <td>ชื่อ สกุล</td>
                    <td>โปรเจค</td>
                    <td>ออกจากโครงการ</td>
                </tr>
                <tbody>
                <?php $num = 1 ;
                foreach($results as $item){?>
                    <tr>
                        <td><?php echo $num ;?></td>
                        <td><?php echo $item->rc_name." ".$item->rc_lastname?></td>
                        <td><?php echo $item->bp_before. " ".$item->bp_after?></td>
                        <td><a @click="outofproject(<?php echo $item->rc_id?>);"><i class="fa fa-external-link" style="font-size: 20px"></i> </a></td>
                    </tr>
                    <?php $num++; }?>
                </tbody>
            </table>
        </div>
        <p><?php echo $links ?></p>
    </div>
</div>

<script>
    new Vue({
        el : "#form-outofproject",
        data : {

        },
        methods : {
            outofproject : function (id) {
                window.location.href = "<?php echo site_url('UpdateData/outofproject?id=')?>"+id;
            }
        }
    });
</script>