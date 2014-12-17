<!-- left column profile -->
<div class="col-sm-3">
    <div class="prof-pic mrgn-lt-sm">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 pad-min">
                        <img class="img-responsive center-block userLevelImg" src="<?php echo $baseUrl.$userLevelDetails[0]['image_link'] ?>" />
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <h4 class="prof-h"><?php echo $userDetails[0]['f_name'].' '.$userDetails[0]['l_name'] ?></h4>
                        <p class="prof-p">
                            <?php echo $_SESSION['user_id'] ?>
                        </p>
                        <button type="button" class="btn btn-custom-prof hidden-sm hidden-md center-block"><?php echo $userLevelDetails[0]['member_category'] ?></button>
                    </div>
                </div>
                <button type="button" class="btn btn-custom-prof visible-sm visible-md center-block"><?php echo $userLevelDetails[0]['member_category'] ?></button>
            </div>
        </div>
    </div><!-- prof pic ends -->
    
    <div class="btm-prof-2 mrgn-lt-sm">
        <div class="row">
            <div class="col-sm-12">
                <a class="tble-hd">
                    <?php echo profile_info_links;?>
                </a>
                <a href="<?php echo $baseUrl;?>my-wallet/" class="tble-para">
                    <img src="<?php echo $baseUrl;?>images/rings.png" /> <?php echo my_wallet;?>
                </a>
                <a href="<?php echo $baseUrl;?>tree/" class="tble-para">
                    <img src="<?php echo $baseUrl;?>images/rings.png" /> <?php echo tree_details;?>
                </a>
                <a href="<?php echo $baseUrl;?>my-order-history/" class="tble-para">
                    <img src="<?php echo $baseUrl;?>images/hand.png" /> <?php echo my_order_history;?>
                </a>
                <a href="<?php echo $baseUrl;?>my-withdraw-history/" class="tble-para">
                    <img src="<?php echo $baseUrl;?>images/hand.png" /> <?php echo my_withdraw_history;?>
                </a>
                <a href="<?php echo $baseUrl;?>my-pv/" class="tble-para">
                    <img src="<?php echo $baseUrl;?>images/hand.png" /> <?php echo point_value_details;?>
                </a>
                <a href="<?php echo $baseUrl;?>profile-setting/" class="tble-para">
                    <img src="<?php echo $baseUrl;?>images/hand.png" /> <?php echo profile_setting;?>
                </a>
                <a href="<?php echo $baseUrl;?>change-password/" class="tble-para">
                    <img src="<?php echo $baseUrl;?>images/hand.png" /> <?php echo change_password;?>
                </a>
                <a href="<?php echo $baseUrl;?>bank-account/" class="tble-para">
                    <img src="<?php echo $baseUrl;?>images/hand.png" /> <?php echo bank_account_details;?>
                </a>
                <a href="<?php echo $baseUrl;?>withdraw-amount/" class="tble-para brdr-none">
                    <img src="<?php echo $baseUrl;?>images/eye.png" /> <?php echo withdraw_amount;?>
                </a>
            </div>
        </div>
    </div>
    
    <div class="btm-prof-2 mrgn-lt-sm">
        <div class="row">
            <div class="col-sm-12">
                <a href="#" class="tble-hd">
                    lorem Ipsum Lorem
                </a>
                <a href="#" class="tble-para brdr-none">
                    <img src="<?php echo $baseUrl;?>images/facebook.png" /> Lorem ipsum dolor
                </a>
            </div>
        </div>
    </div>
    
    <div class="btm-prof-2 btm-prof-2-dark mrgn-lt-sm pad-lt-col-sm">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="tble-hd-dark">Lorem Ipsum Lorem</h4>
                <p class="tble-para-dark">
                    Lorem ipsum dolor sit amet
                </p>
                <button type="button" class="btn btn-custom-prof btn-custom-prof-dark center-block">Lorem Ipsum</button>
            </div>
        </div>
    </div>
    
</div><!-- col-sm-4 ends -->