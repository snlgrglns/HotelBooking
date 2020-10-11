<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <p><?php echo Yii::app()->user->getFlash('success'); ?></p>
    </div>
<?php endif; ?>
<div class="printable">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-11">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> Customer Information
                <small class="pull-right">Ordered Date: <?php echo $model->created_on; ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <?php $bookedRoom = BookedRoom::model()->findAllByAttributes(array('customer_id'=>$model->id)); ?>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <address>
                Name : <strong><?php echo strtoupper($model->first_name.' '.$model->last_name); ?></strong><br>
                Phone: <strong><?php echo $model->phone; ?></strong><br>
                Email1: <strong><?php echo $model->email1; ?></strong><br>
                Email2: <strong><?php echo strtolower($model->email2); ?></strong><br>
            </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <address>
                Country : <strong><?php echo strtoupper($model->country); ?></strong><br>
                State / Province: <strong><?php echo strtoupper($model->state_province); ?></strong><br>
                City: <strong><?php echo strtoupper($model->city); ?></strong><br>
                Zip Code: <strong><?php echo strtolower($model->zip_code); ?></strong><br>
            </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            Pick Up At Airport : <strong><?php echo strtoupper($model->pick_up_at_airport); ?></strong><br>
            Payment Card No: <strong><?php echo strtoupper($model->payment_card_no); ?></strong><br>
            Flight Details: <strong><?php echo strtoupper($model->flight_details); ?></strong><br>
            Personal Message: <strong><?php echo ucwords(strtolower($model->personal_message)); ?></strong><br>
        </div><!-- /.col -->
    </div><!-- /.row -->

    Book Status: <?php if($model->status == 0){?><span class="btn-warning">PENDING</span><?php }elseif($model->status == 1){ ?><span class="btn-success">VERIFIED</span><?php }elseif($model->status == 2){ ?><span class="btn-warning">CANCELLED</span><?php } ?>
    <?php
    if(!empty($bookedRoom)) { ?>
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-11 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Room Type</th>
                        <th>No. of Room</th>
                        <th>No. of Adult</th>
                        <th>No. of Child</th>
                        <th>Cost Per Night($)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cost_with_room_amt = 0;
                    foreach ($bookedRoom as $bR) {
                        $room = Room::model()->findByPk($bR->room_type);
                        ?>
                        <tr>
                            <td><?php echo strtoupper($room->room_type); ?></td>
                            <td><?php echo $bR->no_of_room; ?></td>
                            <td><?php echo $bR->no_of_adults; ?></td>
                            <td><?php echo $bR->no_of_childs; ?></td>
                            <td><?php echo $room->room_price; ?></td>
                        </tr>
                        <?php
                        $cost_with_room_amt = $cost_with_room_amt + ($room->room_price * $bR->no_of_room);
                    }
                    ?>
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-4">
                <p class="lead">Other Details:</p>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Check In Date:</th>
                            <td style="text-align: right;"><?php echo $bR->check_in; ?></td>
                        </tr>
                        <tr>
                            <th>Check Out Date:</th>
                            <td style="text-align: right;"><?php echo $bR->check_out; ?></td>
                        </tr>
                        <tr>
                            <th>No. of Nights:</th>
                            <td style="text-align: right;"><?php
                                $interval = date_diff(date_create($bR->check_in), date_create($bR->check_out));
                                $no_of_nights =  $interval->format('%d');
                                echo $no_of_nights;
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-7">
                <p class="lead">Amount in Dollar</p>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Cost With Total No. Of Room:</th>
                            <td style="text-align: right;"><?php echo number_format($cost_with_room_amt, 2, '.','');?></td>
                        </tr>
                        <tr>
                            <th>Cost With Total No. Of Nights:</th>
                            <td style="text-align: right;"><?php
                                $cost_with_night = $cost_with_room_amt*$no_of_nights;
                                echo number_format($cost_with_night, 2, '.','');?>
                            </td>
                        </tr>
                        <tr>
                            <th>Cost With Service Charge(10%):</th>
                            <td style="text-align: right;"><?php
                                $cost_with_serv = $cost_with_night+($cost_with_night*10/100);
                                echo number_format($cost_with_serv, 2, '.','');?>
                            </td>
                        </tr>
                        <tr>
                            <th>Cost With TAX(13%):</th>
                            <td style="text-align: right;"><?php
                                $cost_with_tax = $cost_with_serv+($cost_with_serv*13/100);
                                echo number_format($cost_with_tax, 2, '.','');?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    <?php } ?>
</div>
<!-- this row will not appear when printing -->

<div class="row no-print">
    <div class="col-xs-12">
        <a class="btn btn-default" id="print"><i class="fa fa-print"></i> Print</a>
        <?php if($model->status == 1 or $model->status == 0){?>
            <a href="<?php echo Yii::app()->request->baseUrl.'/customerInfo/cancel/'.$model->id; ?>" class="btn btn-primary pull-right"  id="cancel"  style="margin-right: 5px;"><i class="fa fa-archive"></i> Cancel</a>
        <?php } if($model->status == 0 or $model->status == 2){?>
            <a href="<?php echo Yii::app()->request->baseUrl.'/customerInfo/verify/'.$model->id; ?>" class="btn btn-success pull-right"  id="verify" ><i class="fa fa-book"></i> Confirm</a>
        <?php } ?>
    </div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/print.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#print").click(function(){
            $(".main-footer").hide();
            $(".checkAvail").hide();
            $('.sidebar-toggle').click();
            window.print();
            $(".main-footer").show();
            $(".checkAvail").show();
            $('.sidebar-toggle').click();
        });
        $("#cancel").click(function(){
            if (confirm('You are going to cancel order. Are you sure?')) {
                return true;
            } else {
                return false;
            }
        });
        $("#verify").click(function(){
            if (confirm('You are going to confirm order. Are you sure?')) {
                return true;
            } else {
                return false;
            }
        });
    });
</script>
