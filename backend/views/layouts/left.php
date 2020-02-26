<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../web/image/logo/avatar.png" class="img-circle" alt="User Image"/>
                <!-- <img src="<?php //$directoryAsset ?>/image/avatar.png" class="img-circle" alt="User Image"/> -->
            </div>
            <div class="pull-left info">
                <p>Vandaru</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <?php if (Yii::$app->user->identity->role == 1){ ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [                    
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Home', 'icon' => 'home', 'url' => ['/']], 
                    ['label' => 'Content', 'icon' => 'file', 'url' => ['/content']],
                    ['label' => 'Gallery', 'icon' => 'photo', 'url' => ['/galeri']],
                    // ['label' => 'Booking', 'icon' => 'pencil', 'url' => ['/booking']],
                    ['label' => 'Data Master', 'options' => ['class' => 'header']],
                    // ['label' => 'Data Kamar', 'icon' => 'bed', 'url' => ['/kamar']],
                    [
                        'label' => 'Data Kamar',
                        'icon' => 'bed',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Kamar', 'icon' => 'circle-o', 'url' => ['/kamar'],],
                            ['label' => 'Tipe', 'icon' => 'circle-o', 'url' => ['/tipe'],],
                            ['label' => 'Fasilitas', 'icon' => 'circle-o', 'url' => ['/fasilitas'],],
                       ],
                    ],
                    ['label' => 'Configuration', 'options' => ['class' => 'header']],
                    ['label' => 'Users', 'icon' => 'users', 'url' => ['/user']],
                    ['label' => 'Settings', 'icon' => 'gear', 'url' => ['/setting']],
                    // ['label' => 'Tools', 'options' => ['class' => 'header']],
                    // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // [
                    //     'label' => 'Some tools',
                    //     'icon' => 'share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //        ],
                    //    ],
                    // ],
                ],
            ]
        ) ?>
        <?php 
        }else
        {
        ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [                    
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Home', 'icon' => 'home', 'url' => ['/']], 
                    ['label' => 'Content', 'icon' => 'file', 'url' => ['/content']],
                    ['label' => 'Gallery', 'icon' => 'photo', 'url' => ['/galeri']],
                    // ['label' => 'Booking', 'icon' => 'pencil', 'url' => ['/booking']],
                    ['label' => 'Data Master', 'options' => ['class' => 'header']],
                    // ['label' => 'Data Kamar', 'icon' => 'bed', 'url' => ['/kamar']],
                    [
                        'label' => 'Data Kamar',
                        'icon' => 'bed',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Kamar', 'icon' => 'file-code-o', 'url' => ['/kamar'],],
                            ['label' => 'Tipe', 'icon' => 'file-code-o', 'url' => ['/tipe'],],
                            ['label' => 'Fasilitas', 'icon' => 'file-code-o', 'url' => ['/fasilitas'],],
                       ],
                    ],
                ],
            ]
        ) ?>
        <?php } ?>

    </section>

</aside>
