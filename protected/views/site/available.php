<style>
    th, td{
        max-width:200px;
    }
    .rt{
        max-width:400px;
    }

    .drop{
        max-width:100px;
    }
</style>
<div class="section padding-40 clearfix">
    <div class="container">
        <div class="inner-content">
            <ul class="booking-type">
                <li class="active"><a <?php if(!empty(Yii::app()->session['check_in']) and !empty(Yii::app()->session['check_out'])){ ?>href="<?php echo Yii::app()->request->baseUrl.'/site/check?arrival='.Yii::app()->session['check_in'].'&departure='.Yii::app()->session['check_out'].'&check=Check+Availability'; ?>"<?php } ?>><span>1</span>Select Available Rooms</a></li>
                <li><a <?php if(!empty(Yii::app()->session['data'])){ ?>href="<?php echo Yii::app()->request->baseUrl.'/site/userinfo'; ?>"<?php } ?>><span>2</span>Register Personal Details</a></li>
                <li><a><span>3</span>Booking Done</a></li>
            </ul>
            <div class="ave">
                <div class="container">

                    <div class="row  clearfix">
                        <div class="col-md-9">
                            <div class="check-wrap pull-right">
                                <div>Check In Date:<?php echo $_GET['arrival']; ?></div>
                                <div>Check Out Date:<?php echo $_GET['departure']; ?></div>
                            </div>
                            <?php if(Yii::app()->user->hasFlash('error')):?>
                                <div class="flash-error">
                                    <p><?php echo Yii::app()->user->getFlash('error'); ?></p>
                                </div>
                            <?php endif; ?>

                            <?php if(!empty($avail)){?>
                                <form action="<?php echo Yii::app()->request->baseUrl; ?>/site/st" method="POST" id="ava">
                                    <input type="hidden" name="check_in" id="check_in" value="<?php echo $_GET['arrival']; ?>">
                                    <input type="hidden" name="check_out" id="check_out" value="<?php echo $_GET['departure']; ?>">
                                    <div class="table">
                                        <table border="1" style="table-layout:fixed">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th class="rt">Room Type</th>
                                                <th>Room</th>
                                                <th>Adults</th>
                                                <th>Child</th>
                                                <th>Price($)</th>
                                                <th>Total($)</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            $sn=1;
                                            $countav = count($avail);
                                            foreach($avail as $av) {
                                                if ($av['room_no'] > 0) {
                                                    $avRoom = Room::model()->findByPk($av['id']);

                                                    $avRoomNos = array();
                                                    for ($i = 1; $i <= $av['room_no']; $i++) {
                                                        $avRoomNos[$i] = $i;
                                                    }
                                                    $countAvRoom = count($avRoomNos);
                                                    $total_person = $countAvRoom*$avRoom->no_of_person;
                                                    $tot_per_arr = array();
                                                    for($a = 0;$a<=$total_person;$a++){
                                                        $tot_per_arr[$a]=$a;
                                                    }
                                                    ?>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" id="check<?php echo $sn; ?>" class="check" value="<?php echo $sn; ?>" name="check">
                                                            <input type="hidden" id="hid<?php echo $sn; ?>" name="hid<?php echo $sn; ?>" value="<?php echo $av['id']; ?>">
                                                            <input type="hidden" id="no_per_hold<?php echo $sn; ?>" name="no_per_hold<?php echo $sn; ?>" value="<?php echo $avRoom->no_of_person; ?>">
                                                        </td>
                                                        <td><span id="room_type<?php echo $sn; ?>"><a href="<?php echo Yii::app()->request->baseUrl.'/site/aboutrm/'.$avRoom->id; ?>"><?php echo strtoupper($avRoom->room_type); ?></a></span></td>
                                                        <!--                                                        <td>--><?php //echo CHtml::dropDownList('category', array(), array('1' => 'Single', '2' => 'Double'), array('class'=>'drop','id'=>'category'.$sn)); ?><!--</td>-->
                                                        <td><?php echo CHtml::dropDownList("room", array(), $avRoomNos, array('id' => 'room' . $sn, 'class'=>'drop')); ?></td>
                                                        <td><?php echo CHtml::dropDownList('adults', array(), $tot_per_arr, array('class'=>"drop person$sn", 'id'=>'adult'.$sn)); ?></td>
                                                        <td><?php echo CHtml::dropDownList('chi', array(), $tot_per_arr, array('class'=>"drop person$sn", 'id'=>'child'.$sn)); ?></td>
                                                        <td>
                                                            <span id="room_price<?php echo $sn; ?>"><?php echo $avRoom->room_price; ?></span>
                                                            <!--                               --><?php /*echo CHtml::textField('room_price', $avRoom->room_price, array('id' => 'room_price' . $sn, 'readonly' => true)); */?>
                                                        </td>
                                                        <td>
                                                            <span id="total<?php echo $sn; ?>" class="total"> </span>
                                                            <!--                                <input type="text" id="total--><?php //echo $sn; ?><!--" class="total">-->
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                    <?php
                                                    $sn++;
                                                }
                                            }
                                            ?>
                                            <tfoot>
                                            <tr>
                                                <th colspan="6">Subtotal * Nights</th>
                                                <th>
                                                    <span id="mul_nights"></span>
                                                    <!--                        <input type="text" id="mul_nights">-->
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="6">Service Charge(10%)</th>
                                                <th>
                                                    <span id="with_service"></span>
                                                    <!--                        <input type="text" id="with_service">-->
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="6">Tax(13%)</th>
                                                <th>
                                                    <span id="with_tax"></span>
                                                    <!--                        <input type="text" id="with_tax">-->
                                                </th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div>
                                        <input type="hidden" name="room_data" id="room_data">
                                        <input type="submit" name="submit" value="SUBMIT" class="btn btn-primary" onclick="getVal();">
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                        <form action="<?php echo Yii::app()->request->baseUrl; ?>/site/check" method="GET">
                            <div class="col-md-3">
                                <div class="right-block clearfix"><div class=" date">
                                        <div class="date-title">
                                            <h3>Check Your Rooms</h3>
                                        </div>
                                        <div class="date-wrapper">
                                            <input type="text" class="datepicker" placeholder="Arrival" id="arrival" name="arrival" required> <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="date-wrapper">
                                            <input type="text" class="datepicker" placeholder="Departure" id="departure" name="departure" required><i class="fa fa-calendar"></i>
                                        </div>
                                        <!--                            <input type="hidden" id="TextBox3" name="no_of_days">-->
                                    </div>
                                    <div class="age-group">
                                        <input type="submit" name="check" value="Check Availability" class="btn btn-danger book-btn pull-right">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/adminfiles/available.js" type="text/javascript"></script>