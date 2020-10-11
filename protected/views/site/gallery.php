<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php">Home</a></li>
                    <li class="active">Gallery</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- page-intro end -->
<section class="main-container">
    <div class="container">
        <div class="row">
            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">
                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title">Gallery</h1>
                <div class="separator-2"></div>
                <?php if(!empty($note)){?>
                    <p class="lead"><?php echo $note->content; ?></p>
                <?php } ?>
                <!-- page-title end -->
                <!-- masonry grid start -->
                <?php if(!empty($images)){?>
                    <div class="masonry-grid row">
                        <!-- masonry grid item start -->
                        <?php foreach($images as $i){
                            $det = Room::model()->findByPk($i->room_id); ?>
                            <div class="masonry-grid-item col-sm-6 col-md-4">
                                <!-- blogpost start -->
                                <article class="clearfix blogpost">
                                    <div class="overlay-container"> <img src="<?php echo Yii::app()->request->baseUrl.'/images/roomImages/medium/'.$i->image; ?>" alt="" style="width: 500px;height: 270px;">
                                        <div class="overlay">
                                            <div class="overlay-links">  <a href="<?php echo Yii::app()->request->baseUrl.'/images/roomImages/fullsized/'.$i->image; ?>" class="popup-img" title="<?php echo ucwords(strtolower($det->room_type)); ?>"><i class="fa fa-search-plus"></i></a> </div>
                                        </div>
                                    </div>
                                </article>
                                <!-- blogpost end -->
                            </div>
                        <?php } ?>
                        <!-- masonry grid item end -->
                    </div>
                    <nav>
                        <ul class="pagination pagination-sm">
                            <?php
                            $this->widget('CLinkPager', array(
                                'currentPage'=>$pages->getCurrentPage(),
                                'itemCount'=>$item_count,
                                'pageSize'=>$page_size,
                                'maxButtonCount'=>5,
                                //'nextPageLabel'=>'My text >',
                                'header'=>'',
//                            'htmlOptions'=>array('class'=>'pages'),
                            ));
                            ?>
                        </ul>
                    </nav>
                <?php } ?>
                <!-- masonry grid end -->
            </div>
            <!-- main end -->
        </div>
    </div>
</section>