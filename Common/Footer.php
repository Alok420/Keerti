<footer class="ct-footer">
                <div class="container">
                    <form method="post" action="controller/JoinNowController.php">
                        <div class="ct-footer-pre text-center-lg" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                            <div class="inner">
                                <span>Join KeertiJob Portal to receive updates &amp; events!</span>
                            </div>
                            <div class="inner">
                                <div class="form-group">
                                    <input type="hidden" name="joindatae" value="<?php echo $db->getIndianDate();?>">
                                    <input type="hidden" name="url" value="<?php echo $_SERVER["PHP_SELF"];?>">
                                    <input name="email" id="nl_email" class="validate[required]" placeholder="Enter your email address" type="text" value=""> <label for="nl_email" class="sr-only">Email Address</label> <button type="submit" class="btn1 btn-motive">Join</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <ul class="ct-footer-list text-center-sm" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <li>
                            <h2 class="ct-footer-list-header">
                                Information
                            </h2>
                            <ul>
                              
                            </ul>
                        </li>
                        <li>
                            <h2 class="ct-footer-list-header">
                               Job Seekers
                            </h2>
                            <ul>
                             
                            </ul>
                        </li>
                        <li>
                            <h2 class="ct-footer-list-header">
                               Browse Jobs
                            </h2>
                            <ul>
                                
                            </ul>
                        </li>
                        <li>
                            <h2 class="ct-footer-list-header">
                               Employers
                            </h2>
                            <ul>
                             
                            </ul>
                        </li>
                        <li>
                            <h2 class="ct-footer-list-header">
                                About
                            </h2>
                            <ul>
                                <li>
                                    <a href="AboutUs.php">About Us</a>
                                </li>
                                <li>
                                    <a href=""></a>
                                </li>
                                <li>
                                    <a href=""></a>
                                </li>
                                <li>
                                    <a href=""></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="ct-footer-meta text-center-sm" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <div class="row">
                            <div class="col-sm-6 col-md-2">
                                <img alt="logo" src="images/keertiwhite.png">
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <address>
                                    <span>Keerti JobPortal<br></span><br>
                                    <br>
                                    <span>Phone:- 02226550480/2016</span>
                                </address>
                            </div>
                            <div class="col-sm-6 col-md-2 ct-u-paddingTop10">
                            </div>
                            <div class="col-sm-6 col-md-2 ct-u-paddingTop10">
                                <a href="" target="_blank"><img alt="google play store" src="https://www.solodev.com/assets/footer/androidstore.png"></a>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <ul class="ct-socials list-unstyled list-inline">
                                    <li>
                                        <a href="https://www.facebook.com/KeertiComputers/" target="_blank"><img alt="facebook" src="https://www.solodev.com/assets/footer/facebook-white.png"></a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/keertiinstitute/" target="_blank"><img alt="twitter" src="https://www.solodev.com/assets/footer/facebook-white.png"></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/keertinstitute" target="_blank"><img alt="youtube" src="https://www.solodev.com/assets/footer/twitter-white.png"></a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/company/keerti-knowledge-skills/" target="_blank"><img alt="instagram" src="images/Social/white-linkedin-2.png" width="40" height="40"></a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ct-footer-post">
                    <div class="container">
                        <div class="inner-left">
                            <ul>
                                <li>
                                    <a href="faq.php">FAQ</a>
                                </li>
                                <li>
                                    <a href="news.php">News</a>
                                </li>
                                <li>
                                    <a href="contact.php">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="inner-right">
                            <p>
                                Copyright © 2016 Keerti Computers.&nbsp;<a href="privacypolicy">Privacy Policy</a>
                            </p>                          
                        </div>
                    </div>
                </div>
            </footer>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
                                                AOS.init();
        </script>