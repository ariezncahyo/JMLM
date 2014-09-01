<!-- left column profile -->
<div class="col-sm-3">
    <div class="prof-pic mrgn-lt-sm">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12 pad-min">
                        <img class="img-responsive center-block userLevelImg" src="<?php echo $userLevelDetails[0]['image_link'] ?>" />
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
                    Profile Info Links
                </a>
                <a href="my-wallet.php" class="tble-para">
                    <img src="images/rings.png" /> My Wallet
                </a>
                <a href="my-pv.php" class="tble-para">
                    <img src="images/hand.png" /> Point Value Details
                </a>
                <a href="profile-setting.php" class="tble-para">
                    <img src="images/hand.png" /> Profile Setting
                </a>
                <a href="bank-account.php" class="tble-para">
                    <img src="images/hand.png" /> Bank Account Details
                </a>
                <a href="withdraw-amount.php" class="tble-para brdr-none">
                    <img src="images/eye.png" /> Withdraw Amount
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
                    <img src="images/facebook.png" /> Lorem ipsum dolor
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