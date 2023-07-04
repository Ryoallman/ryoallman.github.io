<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3><?php echo $title; ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="contact-section">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
            <div class="mapouter"><div class="gmap_canvas"><iframe style="width: 100%;height: 480px;" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.2113405109455!2d106.91937034442748!3d-6.207846599999989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b50ddb95e21%3A0xe712f0b70164e60c!2sAr-Ruhama!5e0!3m2!1sen!2sus!4v1681675188179!5m2!1sen!2sus" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.whatismyip-address.com"></a><br><style>.mapouter{position:relative;text-align:right;height:480px;width:100%;}</style><a href="https://www.embedgooglemap.net">iframe google map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:480px;width:100%;}</style></div></div>
                <!-- <div id="map" style="height: 480px; position: relative; overflow: hidden;"></div> -->
            <!-- <script>
                        function initMap() {
                            var uluru = {
                                lat: -25.363,
                                lng: 131.044
                            };
                            var grayStyles = [{
                                    featureType: "all",
                                    stylers: [{
                                            saturation: -90
                                        },
                                        {
                                            lightness: 50
                                        }
                                    ]
                                },
                                {
                                    elementType: 'labels.text.fill',
                                    stylers: [{
                                        color: '#ccdee9'
                                    }]
                                }
                            ];
                            var map = new google.maps.Map(document.getElementById('map'), {
                                center: {
                                    lat: -31.197,
                                    lng: 150.744
                                },
                                zoom: 9,
                                styles: grayStyles,
                                scrollwheel: false
                            });
                        }
                    </script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&amp;callback=initMap"></script>
</div>
<div class="row">
    <div class="col-12">
    <?php if($this->session->flashdata('flash')): ?>
    <div style="background-color: #3CC78F;color: white;" class="alert alert-success">
        <?php echo $this->session->flashdata('flash'); ?>
    </div>
    <?php endif; ?>
        <h2 class="contact-title">Kirim pesan</h2>
    </div>
    <div class="col-lg-8">
        <form class="form-contact contact_form" action="" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control w-100" name="pesan" cols="30" rows="9" placeholder=" Pesan Anda"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control valid" name="nama" type="text" placeholder="Nama Anda">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control valid" name="email" type="email" placeholder="Email">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input class="form-control" name="subjek" type="text" placeholder="Subjek">
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
            </div>
        </form>
    </div>
    <div class="col-lg-3 offset-lg-1">
        <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
                <h3><?php echo $profil['alamat']; ?></h3>
            </div>
        </div>
        <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
                <h3><?php echo $profil['telp']; ?></h3>
            </div>
        </div>
        <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
                <h3><a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ee9d9b9e9e819c9aae8d8182819c82878cc08d8183"><?php echo $profil['email']; ?></a></h3>
            </div>
        </div>
    </div>
</div>
</div>
</section>