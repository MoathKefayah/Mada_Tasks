<!DOCTYPE html>
<html lang="ar">
<head>  
    


        <!-- TITLE -->

        <title>مدى  - كل الناس</title>

        <!-- META DATA -->

        <meta charset="utf-8">
        <meta http-equiv="Content-type" value="text/html" charset="UTF-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta http-equiv="Content-type" content="text/html; charset=utf-8">



        <meta name="keywords" content="" />

        <meta name="description" content="" />  

        <meta name="author" content="" />
    

        <!-- STYLE -->
        <link href="css/uikit-rtl.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <style type="text/css" media="screen">
          .sparator {
            margin-right: 0px;
          }
          @media  screen and (max-width: 768px) {
            .main-body-content .uk-width-1-3-,.main-body-content .uk-width-1-4-,.main-body-content .uk-width-1-5-{
              width: 50%;
            }
          }
        </style>
            
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 
        <style type="text/css">

          :root {
            --input-padding-x: 1.5rem;
            --input-padding-y: .75rem;
          }



          .form-label-group {
            position: relative;
            margin-bottom: 1rem;
          }

          .form-label-group input {
            height: auto;
          }

          .form-label-group>input,
          .form-label-group>label {
            padding: var(--input-padding-y) var(--input-padding-x);
          }

          .form-label-group>label {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            margin-bottom: 0;
            line-height: 1.5;
            color: #495057;
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: all .1s ease-in-out;
          }

          .form-label-group input::placeholder {
            color: transparent;
          }

          .form-label-group input:not(:placeholder-shown) {
            padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
            padding-bottom: calc(var(--input-padding-y) / 3);
          }

          .form-label-group input:not(:placeholder-shown)~label {
            padding-top: calc(var(--input-padding-y) / 3);
            padding-bottom: calc(var(--input-padding-y) / 3);
            font-size: 12px;
            color: #777;
          }

          .mada-color {
            color: #d61a69;
            margin-bottom: 0px;
          }
          .mada-bg {
            background-color: #d61a69;
            color: #ffcc00;
            padding: 10px;
          }
          .mada-bg2 {
            background-color: #00a1e1;
            color: #FFFFFF;
            padding: 10px;
          }
          .mada-bg-no-padding {
            background-color: #d61a69;
            color: #ffcc00;
          }
          .mada-padding-5 {
            padding: 5px
          }
          .h2 {
            font-size: 15px;

          }
          .uk-grid + .uk-grid, .uk-grid-margin, .uk-grid > * > .uk-panel + .uk-panel {
            margin-top: 5px !important;
          }

          .mada-input {
            border: 1px dashed #d61a69;
            outline: none;
            border-radius: 0px !important;
            padding-right: 10px;
            -margin-left: 5px;

          }


          .icons{
              
              margin-right: 15px;
              width: 7%;

          }

        
        

        </style>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https:\\stackpath.bootstrapcdn.com\bootstrap\4.2.1\css\bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <script src="https://www.google.com/recaptcha/api.js?hl=ar" async defer></script>


</head>



<body dir="rtl">

  <!-- Being BODY Content -->

  <div class="uk-margin-large-bottom main-body-content">

      <div class="uk-margin-top uk-text-left " id="form">

      <div class="uk-form-horizontal uk-margin-large ajax-form" role="form">
          
          <div  class="uk-grid uk-text-center" style="margin-right: 8%">
              <div class=" uk-width-1-1 uk-width-large-1-1 uk-width-small-1-1 uk-width-medium-1-1" >
                 <img src="images/everybody.logo.png">
              </div>

              <div  class="uk-width-1-1  uk-text-left">
                  <h2>مدى راح تعطي لكل الناس جوائز نعف!</h2>
                  <p>
                      <span class=" mada-color">كل يوم سحب غلى أشهر انترنت مجانية</span>
                      <span style="color: #00a1e1">وكل أسبوع سحب على جهاز مدى تي في!</span>
                      <span style="color: #f7ce0f">وكل شهر سحب على لابتوب Lenovo!</span>
                  </p>
                  <p>
                      لتدخل السحب، ما عليك إلا تعبي البيانات واتّابعنا على صفحات مواقع التواصل الاجتماعي لتشوف إذا كنت من الرابحين معنا
                  </p>  
              </div>
          </div>

          <br>
          <br>
        
      <div style="margin-right: 10%">
          
        <form action="add_user.php" method="POST">
            <div class=" uk-width-1-2 uk-width-large-1-2 uk-width-small-1-2 uk-width-medium-1-2" >
                    <p>
                       
                        
                        <div class="form-label-group">
                                <input type="text" id="customername" name="full_name" style="width:50%;" class="form-control" placeholder="الاسم كاملا" required>
                                <label for="customername">الاسم كاملا</label>
                         </div>
  

                    </p>

                    

                    <p>
                        

                        <div class="form-label-group">
                                <input type="text" pattern="\d*" maxlength="10" id="mobile" name="mobile"  style="width:50%;" class="form-control" placeholder="رقم الهاتف المحمول" required>
                                <label for="mobile"> رقم الهاتف المحمول</label>
                         </div>

                    </p>
                    <p>
                       <div class="row" style="margin-right: 0px;">
                        
                            <div class="form-group col-2-lg">
                                <select id="intialcode" name="intialcode" class="form-control uk-button uk-form-select mada-input" style=" margin-left:3px; border: 1px solid #ced4da ;width: 55px; height: calc(2.25rem + 14px);" >
                                  <option selected id="02">02</option>
                                  <option id="04">04</option>
                                  <option id="08">08</option>
                                  <option id="09">09</option>
                                </select>
                            </div>
                             
                           <div class="form-label-group col-10-lg" >
                                <input type="text" pattern="\d*"  maxlength="7" id="phone" name="phone"  style="width:125%;" class="form-control" placeholder="الهاتف الأرضي" required>
                                <label for="phone"> الهاتف الأرضي </label>
                           </div>
                         
                       </div>
                             
                     </p>

                     <div class="row" style="margin-right: 0px;">
                       
                       <div class="col-10-lg">
                         <p>         
                          <div class="g-recaptcha" data-sitekey="6LcB850UAAAAAPMVKJ0FaFq2Ruk8Ypj1Gj401ZJ4"></div>  
                        </p>
                       </div>

                       <div class="col-2-lg">
                         <p>                
                            <div class=" uk-text-left" style="margin-right: 50%; margin-top: 35%;" >
                             <input type="submit" id="send" class="uk-button mada-bg -uk-text-left" style="width: 80px" value="إرسال">
                            </div>
                          </p>
                       </div>
                     </div>
                    
                </div>

                <div class=" uk-width-1-2 uk-width-large-1-2 uk-width-small-1-2 uk-width-medium-1-2 uk-text-center"  style="margin-top: 5% ; margin-right: 20%">
                    <a href="https://www.facebook.com/Mada.palestine/?ref=br_rs" target="_blank" >
                        <img src="images/everybody.facebook.png" class="icons">
                    </a>
                    <a href="https://twitter.com/madaisp" target="_blank" >
                        <img src="images/everybody.twitter.png" class="icons">
                    </a>
                    <a href="https://www.instagram.com/mada.isp/?hl=en" target="_blank" >
                        <img src="images/everybody.instagram.png" class="icons">
                    </a>

                </div>


          </form>  
          
         
      </div>
   
        </div>
      </div>


  </div>

      <!-- END BODY -->


</body>
</html>

