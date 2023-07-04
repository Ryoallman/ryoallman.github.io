<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo base_url(); ?>"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.receipt-content .logo a:hover {
		  text-decoration: none;
		  color: #7793C4; 
		}

		.receipt-content .invoice-wrapper {
		  background: #FFF;
		  border: 1px solid #CDD3E2;
		  box-shadow: 0px 0px 1px #CCC;
		  padding: 40px 40px 60px;
		  margin-top: 40px;
		  border-radius: 4px; 
		}

		.receipt-content .invoice-wrapper .payment-details span {
		  color: #A9B0BB;
		  display: block; 
		}
		.receipt-content .invoice-wrapper .payment-details a {
		  display: inline-block;
		  margin-top: 5px; 
		}

		.print a {
		  display: inline-block;
		  border: 1px solid #9CB5D6;
		  padding: 13px 13px;
		  border-radius: 5px;
		  color: #708DC0;
		  font-size: 13px;
		  -webkit-transition: all 0.2s linear;
		  -moz-transition: all 0.2s linear;
		  -ms-transition: all 0.2s linear;
		  -o-transition: all 0.2s linear;
		  transition: all 0.2s linear; 
		}

		.print a:hover {
		  text-decoration: none;
		  border-color: #333;
		  color: #333; 
		}

		.receipt-content {
		  background: #ECEEF4; 
		}
		@media (min-width: 1200px) {
		  .receipt-content .container {width: 650px; } 
		}

		.receipt-content .logo {
		  text-align: center;
		  margin-top: 50px; 
		}

		.receipt-content .logo a {
		  font-family: Myriad Pro, Lato, Helvetica Neue, Arial;
		  font-size: 36px;
		  letter-spacing: .1px;
		  color: #555;
		  font-weight: 300;
		  -webkit-transition: all 0.2s linear;
		  -moz-transition: all 0.2s linear;
		  -ms-transition: all 0.2s linear;
		  -o-transition: all 0.2s linear;
		  transition: all 0.2s linear; 
		}

		.receipt-content .invoice-wrapper .intro {
		  line-height: 25px;
		  color: #444; 
		}

		.receipt-content .invoice-wrapper .payment-info {
		  margin-top: 25px;
		  padding-top: 15px; 
		}

		.receipt-content .invoice-wrapper .payment-info span {
		  color: #A9B0BB; 
		}

		.receipt-content .invoice-wrapper .payment-info strong {
		  display: block;
		  color: #444;
		  margin-top: 3px; 
		}

		@media (max-width: 767px) {
		  .receipt-content .invoice-wrapper .payment-info .text-right {
		  text-align: left;
		  margin-top: 20px; } 
		}
		.receipt-content .invoice-wrapper .payment-details {
		  border-top: 2px solid #EBECEE;
		  margin-top: 30px;
		  padding-top: 20px;
		  line-height: 22px; 
		}


		@media (max-width: 767px) {
		  .receipt-content .invoice-wrapper .payment-details .text-right {
		  text-align: left;
		  margin-top: 20px; } 
		}
		.receipt-content .invoice-wrapper .line-items {
		  margin-top: 40px; 
		}
		.receipt-content .invoice-wrapper .line-items .headers {
		  color: #A9B0BB;
		  font-size: 13px;
		  letter-spacing: .3px;
		  border-bottom: 2px solid #EBECEE;
		  padding-bottom: 4px; 
		}
		.receipt-content .invoice-wrapper .line-items .items {
		  margin-top: 8px;
		  border-bottom: 2px solid #EBECEE;
		  padding-bottom: 8px; 
		}
		.receipt-content .invoice-wrapper .line-items .items .item {
		  padding: 10px 0;
		  color: #696969;
		  font-size: 15px; 
		}
		@media (max-width: 767px) {
		  .receipt-content .invoice-wrapper .line-items .items .item {
		  font-size: 13px; } 
		}
		.receipt-content .invoice-wrapper .line-items .items .item .amount {
		  letter-spacing: 0.1px;
		  color: #84868A;
		  font-size: 16px;
		 }
		@media (max-width: 767px) {
		  .receipt-content .invoice-wrapper .line-items .items .item .amount {
		  font-size: 13px; } 
		}

		.receipt-content .invoice-wrapper .line-items .total {
		  margin-top: 30px; 
		}

		.receipt-content .invoice-wrapper .line-items .total .extra-notes {
		  float: left;
		  width: 40%;
		  text-align: left;
		  font-size: 13px;
		  color: #7A7A7A;
		  line-height: 20px; 
		}

		@media (max-width: 767px) {
		  .receipt-content .invoice-wrapper .line-items .total .extra-notes {
		  width: 100%;
		  margin-bottom: 30px;
		  float: none; } 
		}

		.receipt-content .invoice-wrapper .line-items .total .extra-notes strong {
		  display: block;
		  margin-bottom: 5px;
		  color: #454545; 
		}

		.receipt-content .invoice-wrapper .line-items .total .field {
		  margin-bottom: 7px;
		  font-size: 14px;
		  color: #555; 
		}

		.receipt-content .invoice-wrapper .line-items .total .field.grand-total {
		  margin-top: 10px;
		  font-size: 16px;
		  font-weight: 500; 
		}

		.receipt-content .invoice-wrapper .line-items .total .field.grand-total span {
		  color: #20A720;
		  font-size: 16px; 
		}

		.receipt-content .invoice-wrapper .line-items .total .field span {
		  display: inline-block;
		  margin-left: 20px;
		  min-width: 85px;
		  color: #84868A;
		  font-size: 15px; 
		}

		.receipt-content .invoice-wrapper .line-items .print {
		  margin-top: 50px;
		  text-align: center; 
		}



		.receipt-content .invoice-wrapper .line-items .print a i {
		  margin-right: 3px;
		  font-size: 14px; 
		}

		.receipt-content .footer {
		  margin-top: 40px;
		  margin-bottom: 110px;
		  text-align: center;
		  font-size: 12px;
		  color: #969CAD; 
		}                    
	</style>
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
	                        
<div class="receipt-content">
    <div class="container bootstrap snippets bootdey">
		<div class="row">
			<div class="col-md-12">
<?php $cekgd = $this->db->get_where('tb_galang_dana',['gd_id' => $donasi['donasi_gdid']])->row_array() ?>
				<div class="invoice-wrapper">
					<div class="intro">
						Hi <strong><?php echo $meu['user_nama']; ?></strong>, 
						<br>
						Berikut tagihan donasi Anda untuk <?php echo $cekgd['gd_judul']; ?>
					</div>
<?php $cek = $this->db->get_where('tb_bank',['bank_nama' => $donasi['donasi_bank']])->row_array() ?>
					<div class="payment-info">
						<div class="row">
							<div class="col-sm-6">
								<span>Total</span>
								<strong><?php echo number_format($donasi['donasi_jml'],0,',','.'); ?></strong>
							</div>
							<div class="col-sm-6 text-right">
								<span>Transfer ke</span>
								<strong>Bank <?php echo $donasi['donasi_bank']; ?> <br> Nomor rekening <?php echo $cek['bank_no']; ?>  <br>Atas Nama <?php echo $cek['bank_an']; ?><br> Kode Bank <?php echo $cek['bank_kode']; ?></strong>
							</div>
						</div>
					</div>
					<p style="margin-top: 40px;"><i>Terima kasih sudah membuat segalanya menjadi lebih baik. Semoga kebaikan Anda berbuah pahala.</i></p>
					<div style="margin-top: 40px;" class="print text-center"> <a href="user/donasi"> Dashboard </a></div>
				</div>

				<div class="footer">
					Copyright © <script>document.write(new Date().getFullYear());</script>. Yayasan Ar-ruhama
				</div>
			</div>
		</div>
	</div>
</div>                    
</body>
</html>