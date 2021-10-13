
<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="<?= Yii::getAlias('@web') . '/cadmin' ?>/img/user/user-13.jpg" alt="" />
                    </div>
                    <div class="info">
                        <?= Yii::$app->user->identity->username ?>
                        <small><?= Yii::$app->user->identity->kode_group_user ?></small>
                    </div>
                </a>
            </li>

        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">

            <?php
            if (Yii::$app->user->isGuest) {
                $group_user = 'G';
            } else {
                $group_user = Yii::$app->user->identity->kode_group_user;
            }
            ?>
            <?php
            $header = \app\models\MenuHeader::find()->where([
                                'group_menu' => "H",
                                'status_menu' => "Y",
                            ])
                            ->andFilterWhere(['LIKE', 'group_user', $group_user])->orderBy('urutan');
            if ($header->exists() > 0) {
                foreach ($header->all() as $valueheader) {
                    if ($valueheader['sub_menu'] == 'N') {
                        ?>
                        <li>
                            <a href="<?= $valueheader['url'] ?>">
                                <i class="<?= $valueheader['icon'] ?>"></i>
                                <span><?= $valueheader['nama_menu'] ?></span>
                            </a>
                        </li>
                        <?php
                        continue;
                    }
                    ?>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="<?= $valueheader['icon'] ?>"></i>
                            <span><?= $valueheader['nama_menu'] ?></span>
                        </a>
                        <ul class="sub-menu">
                            <?php
                            $id_menu_header = $valueheader['id'];
                            $submenu = app\models\SubMenu::find()->where([
                                                'group_menu' => "D",
                                                'status_menu' => "Y", 'id_menu_header' => $id_menu_header,'level_menu'=>1,
                                            ])
                                            ->andFilterWhere(['LIKE', 'group_user', $group_user])->orderBy('nomor_urut');
                            if ($submenu->exists() > 0) {
                                foreach ($submenu->all() as $valuesub) {
                                   $toggle='ajax';
                                      $panah = '';
                                    ?>
                            <li>
                            <?php  
                             $submenu2exists = app\models\SubMenu::find()->where([
                                                            'id_menu_header' => $valuesub['id'],
                                                        'level_menu'=>'2'
                                                        ])->exists();
                            if ($submenu2exists>0) {
                                $toggle='#';
                                $panah = '<b class="caret"></b>';
                                ?>
                            <li class="has-sub">
                                
                            <?php }?>
                                        <a href="<?= $valuesub['url'] ?>" data-toggle="<?=$toggle ?>"> <?= $panah?> <?= $valuesub['nama_menu'] ?></a>
                                        
                                        <ul class="sub-menu">
                                            <?php
                                                $submenu2 = app\models\SubMenu::find()->where([
                                                            'id_menu_header' => $valuesub['id'],
                                                        'level_menu'=>'2'
                                                        ])->all();
                                                foreach ($submenu2 as $valuesub2) {
                                                    ?>
                                                    <li>
                                                        <a href="<?= $valuesub2['url'] ?>" data-toggle="ajax"><?= $valuesub2['nama_menu'] ?></a></li>
                                                    <?php
                                                }
                                            ?>

                                        </ul>
                                        
                                    </li>
                                    <?php
                                }
                            }
                            ?>
<!--                                    	<li class="has-sub">
								<a href="javascript:;">
					        		
						            Menu 1.1
						        </a>
								<ul class="sub-menu">
									
									<li><a href="javascript:;">Menu 2.2</a></li>
									<li><a href="javascript:;">Menu 2.3</a></li>
								</ul>
							</li>-->
                        </ul>
                    </li>

                    <?php
                }
            }
            ?>
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="ion-ios-arrow-left"></i> <span>Collapse</span></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->