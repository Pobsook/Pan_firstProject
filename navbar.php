    <div id="modal-login">
        <span class="close-modal" id="close-modal-login">X</span>
        <div class="container-form">
            <form action="login_process.php" method="POST">
                <div class="image_login">
                    <img src="PicZedere\user-login-icon.png" width="200px">
                </div>
                <div class="input-btn">
                    <input class="input-button" type="email" placeholder="กรอกอีเมล์" name="email_account">
                </div>
                <div class="input-btn">
                    <input class="input-button" type="password" placeholder="กรอกรหัสผ่าน" name="password_account">
                </div>
                <div class="btn_submit">
                    <button class="submit-btn" type="submit">เข้าสู่ระบบ</button>
                </div>  
            </form>
            <div class="btn_submit">
                <button id="register-modal-button">สมัครสมาชิก</button>
            </div>  
        </div>
    </div>

    <!-- Modal Register -->
    <div id="modal-register">
        <span class="close-modal" id="close-modal-register">X</span>
        <div class="container-form">
            <form action="register_process.php" method="POST">
                <div class="image_login">
                    <img src="PicZedere\user-login-icon.png" width="200px">
                </div>
                <div class="input-register">
                    <input class="input-button" id="username" type="text" placeholder="username" name="username_account">
                    <span></span>
                </div>
                <div class="input-btn">
                    <input class="input-button" id="email" type="email" placeholder="กรอกอีเมล์" name="email_account">
                    <span></span>
                </div>
                <div class="input-btn">
                    <input class="input-button" id="password1" type="password" placeholder="กรอกรหัสผ่านที่1" name="password_account1">
                    <span></span>
                </div>
                <div class="input-btn">
                    <input class="input-button" id="password2" type="password" placeholder="กรอกรหัสผ่านที่2" name="password_account2">
                    <span></span>
                </div>
                <div class="btn_submit">
                    <button class="submit-btn" type="submit">ยืนยันการสมัคร</button>
                </div>
            </form>
            <div class="btn_submit">
                <button id="login-modal-button">กลับหน้าlogin</button>
            </div>
        </div>
    </div>

    <!-- Modal Cellection -->
    <div class="Modal_collection" id="modal_collection">
        <div class="container_collection_sofa">
            <a href="Sofa_collection.php"><img src="PicZedere\Sofa_collection.png" alt="Sofa" >SOFA COLLECTION</a>
        </div>
        <div class="container_collection_chair">
            <a href="Chair_collection.php"><img src="PicZedere\Chair_collection.jpg" alt="Chair" >CHAIR COLECTION</a>
        </div>
        <div class="container_collection_bed">
            <a href="Bed_collection.php"><img src="PicZedere\Bed_collection.jpg" alt="Bed" >BED COLLECTION</a>
        </div>
    </div>

    <nav>
        <div class="logo"><img src="PicZedere\logo-01.png" alt="logo" style="width: 100%;"></div>
        <div class="topbar">
            <ul>
                <li><a href="Home_page.php">Home</a></li>
                <li><a href="#About">About us</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn" id="open_collection">Collection</a>
                </li>
                <li>
                    <a href="<?php echo 'cart.php'?>">Cart <span class="count_cart"></span></a>
                </li>
                <li class="dropdown">
                    <?php if (!isset($_SESSION['username']) || !isset($_SESSION['email_account']) || !isset($_SESSION['id_account'])) { ?>
                        <a href="javascript:void(0)" class="dropbtn-user">
                            <span id="open-modal">Login</span>
                        </a>
                    <?php } else { ?>
                        <button href="javascript:void(0)" class="dropbtn-user2">
                            <img src="PicZedere/usericon.png" width="23px">
                            <p style="font-size: 10px;"><?php echo $_SESSION['username']; ?></p>
                        </button>
                        <div class="dropdown-content2">
                            <a href="#">Sofa</a>
                            <a href="#">Bed</a>
                            <form action="logout_process.php">
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    <?php } ?>
                </li>
            </ul>
        </div>  
    </nav>