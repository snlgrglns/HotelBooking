<div class="secondary-banner">
    <div class="container">
        <div class="secondary-title text-center">
            <h1>Tariff</h1>
            <div class="seperate text-center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/frontendfiles/images/top-icon.png" alt=""></div>
            <!-- page-intro start-->
            <!-- ================ -->
            <div class="page-intro">
                <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>">Home</a></li>
                    <li class="active">Traiff</li>
                </ol>
            </div>
            <!-- page-intro end -->
        </div>
    </div>
</div>
<!-- section start -->
<!-- ================ -->
<div class="section gray-bg padding-40 clearfix">
    <div class="container">
        <div class="row inner-content">
            <div class="col-md-9">
                <?php if(!empty($rooms)){ ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ROOM</th>
                            <th>COST</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rooms as $rm){?>
                            <tr>
                                <td>
                                    <a target="_blank" href="<?php echo Yii::app()->request->baseUrl.'/site/aboutrm/'.$rm->id; ?>">
                                        <?php echo strtoupper($rm->room_type); ?>
                                    </a>
                                </td>
                                <td>$<?php echo $rm->room_price; ?> /night</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php }if(!empty($tariff)){ ?>
                    <div class="traiff-box">
                        <div class="traiff-content">
                            <?php echo $tariff->content; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
                    <div class="col-md-3">
                        <form action="<?php echo Yii::app()->request->baseUrl; ?>/site/check" method="GET">
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
                        </form>
                    </div>
        </div>
    </div>
</div>
<!-- section end -->