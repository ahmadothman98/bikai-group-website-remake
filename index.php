<?php
 ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script  src="./script.js" defer></script>

    <title>Sainik-Traiding-Compay|Bekai-Group|شركة-سينيق-التجارية|مجموعة البقاعي</title>

</head>
<body>

    <div class="header-banner">
        <header>
            <div id="burger">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="res-menus" id="res_menu" >
                <div>
                    <form class="search" method="GET" action="http://www.bekai-group.com/ar/our-products"  role="form" >
                        <input type="text" name="pname" value="" placeholder="" class="search-input" >
                        <input type="hidden" value="ar" name="lang"/>

                        <div class="search-icon"></div>
                    </form>
                </div>

                <div class="res-langs">

                    <div class="english" href="#">English</div>
                    <span class="vbar">|</span>
                    <div class="arabic active-language" href="#">عربي</div>
                </div>
                
                
            
                <nav class="res-nav">
                    <a href="http://www.bekai-group.com/ar/services">خدماتنا</a>
                    <a href="http://www.bekai-group.com/ar/locate-our-branches">فروعنا</a>
                    <a href="http://www.bekai-group.com/ar/our-products">منتجاتنا</a>
                    <a href="http://www.bekai-group.com/#cntct">اتصل بنا</a>
                    <a href="http://www.bekai-group.com/ar/careers">وظائف</a>
                    <a href="http://www.bekai-group.com/ar/about-us">عن الشركة</a>
                    <a href="http://www.bekai-group.com/ar/sainik-traiding-company">الرئيسية</a>


                </nav>
                </div>
                <div class="menus" >
                    <div class="topbar">
                            <form class="search" method="GET" action="http://www.bekai-group.com/ar/our-products"  role="form" >
                                <input type="text" name="pname" value="" placeholder="" class="search-input" >
                                <input type="hidden" value="ar" name="lang"/>

                                <div class="search-icon"></div>
                            </form>
                        
                        <div class="english" href="#">English</div>
                        <span class="vbar">|</span>
                        <div class="arabic" href="#">عربي</div>
                        
                    </div>
                    
                    <nav class="top-nav">
                        <a href="http://www.bekai-group.com/#cntct">اتصل بنا</a>
                        <a href="http://www.bekai-group.com/ar/careers">وظائف</a>
                        <a href="http://www.bekai-group.com/ar/about-us">عن الشركة</a>
                        <a href="http://www.bekai-group.com/ar/sainik-traiding-company">الرئيسية</a>
                    </nav>
                    <nav class="buttom-nav">
                        <a href="http://www.bekai-group.com/ar/services">خدماتنا</a>
                        <a href="http://www.bekai-group.com/ar/locate-our-branches">فروعنا</a>
                        <a href="http://www.bekai-group.com/ar/our-products">منتجاتنا</a>

                    </nav>
            </div>
            <div style="position:absolute; top:50px; right:calc(50% - 60px);">
                <?php 
                
                session_start();
                session_reset();
                    if(!empty($_SESSION['user'])){

                        print_r("welcome " . $_SESSION['user']['name']);
                        session_unset();
                        echo(
                            "<a href=\"./index.php?logout=\"1\" style=\"position:absolute; top:30px; right:20px; background-color:#EA4645; color:white; font-wheight:bold; border:none; border-radius:5px; padding:5px; cursor:pointer;\" type=\"submit\" name=\"logout\" >LOGOUT</a>"
                        );

                        if(isset($_GET['logout'])){
                            session_destroy();
                            header('location: http://localhost/test/pages/login.php');
                        }
                    }
                    else{
                        echo "";
                    }
                ?>
            </div>
            <a class="logo" href="http://www.bekai-group.com/ar/sainik-traiding-company">
            </a>
        </header>
        
        <div class="slide-banner">
            <div class="slide-banner-contents" id="content1">
                
            </div>
            <div class="slide-banner-contents " id="content2">
            
            </div>
            <div class="slide-banner-contents" id="content3">
           
            </div>
            <div class="slide-banner-nav">
                <div class="left-arrow" id="left_arrow"></div>
                <div class="dots">
                    <div id="first-dot" class = "active-dot"></div>
                    <div id="second-dot"></div>
                    <div id="third-dot"></div>
                </div>
                <div class="right-arrow" id="right_arrow"></div>
            </div>
        </div>
    </div>
    <div class="categories">
        <div class="categ1">
            <img src="http://localhost/test/uploads/categ_img_1.png" name="categ_img" alt="">
            <a class="nav-div" href="http://www.bekai-group.com/ar/our-products/category/1/">
                <div id="name1">                
                 
                </div>
                <span class="nav-next"></span>
            </a>
        </div>
        <div class="categ2">
            <img src="http://localhost/test/uploads/categ_img_2.png" name="categ_img" alt="">
            <a class="nav-div" href="http://www.bekai-group.com/ar/our-products/category/2/">
                <div id="name2">
            
                </div>
                <span class="nav-next"></span>
            </a>
        </div>
        <div class="categ3">
            <img src="http://localhost/test/uploads/categ_img_3.png" name="categ_img" alt="">
            <a class="nav-div" href="http://www.bekai-group.com/ar/our-products/category/3/">
                <div id="name3">
              
                </div>
                <span class="nav-next"></span>

            </a>
        </div>
    </div>
    <div class="details-section">
        <div class="details">
            <div class="history">
                <div class="history-logo"></div>
                <div class="details-title" >تاريخ الشركة</div>
                <div class="details-text">انبثقت شركة سينيق التجارية وكشركة رائدة متخصصة في الإنتاج والتصدير وتجارة التجزئة والجملة عن مجموعة بقاعي التجارية الشهيرة وذلك في العام 2003...</div>
                <div class="read-more">
                    <a href="http://www.bekai-group.com/ar/about-us">اقرأ المزيد >></a>
                </div>
            </div>
            <div class="mission">
                <div class="mission-logo"></div>
                <div class="details-title" >مهمة الشركة</div>
                <div class="details-text">نهدف إلى توفير جميع السلع الإستهلاكية والتموينية ذات الجودة والقيمة الفعلية التي ينبغي أن تؤمن، بل وتتجاوز ما نوليه من مكانة لعملاءنا من خلال تقديم سلع وخدمات ذات جودة عالية وبأفضل الأسعار محلياً وعالمياً...</div>
                <div class="read-more">
                    <a href="http://www.bekai-group.com/ar/about-us">اقرأ المزيد >></a>
                </div>
            </div>

            <div class="about">
                <div class="about-logo"></div>
                <div class="details-title" >نبذة عن الشركة</div>
                <div class="details-text">استطاعت شركة سينيق التجارية منذ تأسيسها منذ عقود في العام 1973 أن تصبح إحدى أهم شركات تجارة وتوزيع المواد الإستهلاكية والتموينية بالجملة والمفرق بالإضافة إلى الإنتاج والتصدير لتتصدر بالتالي...</div>
                <div class="read-more">
                    <a href="http://www.bekai-group.com/ar/about-us">اقرأ المزيد >></a>
                </div>
            </div>

        </div>
    </div>
    <div class="products-section">
        <div class="products">
            <div class="green-title">منتجات مميزة</div>
            <hr>
            <div class="left-arrow-green"></div>
            <div class="right-arrow-green"></div>
            <div class="products-list-container">
                <ul class="products-list" id="products">
                <?php
                include './php/get_products.php';
                for($i = 0 ;$i<sizeof($products);$i++){
                    echo "<li class = \"product\">
                    <a href=\" {$products[$i]->link} \">
                        <div class=\"product-img\">
                            <img src=\"{$products[$i]->image} \">
                        </div>
                        <div class=\"product-title\"> {$products[$i]->title} </div>
                        <div class=\"product-quantity\"> {$products[$i]->quantity} </div>
                        <div class=\"product-details\">"; 
                        if(strlen($products[$i]->details)>60){
                            echo substr($products[$i]->details,0,strpos($products[$i]->details,' ',50)) . "...";
                        }
                        else{
                            echo $products[$i]->details;
                        }
                        echo " </div>
                    </a>
                </li>";

                }
                ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="brands-news-section">
        <div class="brands-news">
            <div class="brands-section">
                <a class="green-title" href="http://www.bekai-group.com/ar/our-brands">علاماتنا التجارية</a>
                <hr>
                <div class="brands">
                    <div class="manara">
                        <div>
                            <img src="./assets/img/manara.bmp"  alt="manara logo">
                        </div>
                        <div class="manara-text">
                            منارة شتورة هي العلامة التجارية الجديدة للسلع الجاهزة للتوزيع محلياً وخارجياً، التابعة لشركة سينيق التجارية. وتضم هذه العلامة التجارية منتجات طعام شاملة مصنعة محلياً من...
                        </div>
                    </div>
                    <div class="albekai">
                        <div>
                            <img src="./assets/img/bekai.png" alt="bekai logo">
                        </div>
                        <div class="bekai-text">
                            لبقاعي هو خط إنتاج السلع التجارية المتداولة بالجملة أو بالتجزئة، و المنبثقة عن شركة سينيق التجارية. جاهزة للتوزيع في الداخل والخارج. يشمل هذا الخط مجموعة شاملة من الأغذية... 
                        </div>
                    </div>
                </div>
            </div>
            <div class="news-section">
                <div>
                    <a href="http://www.bekai-group.com/ar/list-news" class="green-title">اخبارنا</a>
                </div>
                <hr>
                <div class="news">
                    <div class="news1">
                        <img src="./assets/img/news-logo.png" alt="logo">
                        <div class="news-details">
                            <div class="news-title">
                                كل عام وانتم بخير، رمضان كريم
                            </div>
                            <div class="news-text">
                                اجمل التهاني بحلول شهر رمضان المبارك، كل عام وانتم...
                            </div>
                            <div class="read-more">
                                <a href="http://www.bekai-group.com/ar/news/9/%D9%83%D9%84-%D8%B9%D8%A7%D9%85-%D9%88%D8%A7%D9%86%D8%AA%D9%85-%D8%A8%D8%AE%D9%8A%D8%B1%D8%8C-%D8%B1%D9%85%D8%B6%D8%A7%D9%86-%D9%83%D8%B1%D9%8A%D9%85">اقرأ المزيد >></a>
                            </div>
                        </div>
                    </div>
                    <div class="news2">
                        <img src="./assets/img/news-logo.png" alt="logo">
                        <div class="news-details">
                            <div class="news-title">
                                عرض رمضان كريم
                            </div>
                            <div class="news-text">
                                بمناسبة الشهر الفضيل اشتري بقيمة 50،000 ليرة لبنانية من سوبر ماركت...
                            </div>
                            <div class="read-more">
                                <a href="http://www.bekai-group.com/ar/news/10/%D8%B9%D8%B1%D8%B6-%D8%B1%D9%85%D8%B6%D8%A7%D9%86-%D9%83%D8%B1%D9%8A%D9%85">اقرأ المزيد >></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="contact-us-section">
        <div class="contact-title">
            اتصل بنا
        </div>
        <hr>
        <div class="contact-text">
            ارسل لنا تحياتك، ونحن في انتظار كل سؤال لديك، فلا تتردد في أن تطلب منا. نحن لا نتردد في الإجابة على كل ما تحتاج إليه.
        </div>
        <div class="contact-details-form">
            <div class="contact-details">
                <div class="contact-icons">

                </div>
                <div class="contact-location-time">
                    <div class="contact-location">
                        <div class="location-title">
                            زوروا فرعنا الرئيسي
                        </div>
                        <div class="location-details">
                            العنوان جسر سينيق، صيدا 
                            <br>
                            هاتف : 9617221306+
                            <br>
                            ايميل: info@bekai-group.com
                        </div>
                    </div>
                    <div class="contact-time">
                        <div class="time-title">
                            دوام العمل
                        </div>
                        <div class="time-details">
                            الاثنين الى السبت
                            <br>
                            من 8 ص حتى 5 م
                            <br>
                            العطلة الاسبوعية يوم الأحد
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <form action="">
                    <div class="name-phone">
                        <input type="text" placeholder="الاسم الكامل">
                        <input type="text" name="" id="" placeholder="الجوال او الهاتف">
                    </div>
                    <div class="email-subject">
                        <input type="text" name="" id="" placeholder="الايميل">
                        <input type="text" name="" id="" placeholder="الموضوع">
                    </div>
                    <div class="message">
                        <textarea name="" id="" placeholder="الرسالة"></textarea>
                    </div>
                    <button>ارسل >></button>
                </form>
            </div>
        </div>
    </div>
    <div id="map">
    </div>
    <footer>
        <div class="rights">
            جميع الحقوق محفوظة © البقاعي 2016
        </div>
        <ul class="social">
            <li class="twitter">
                <a href="https://twitter.com/Bekai_Group"></a>
            </li>
            <li class="facebook">
                <a href="https://www.facebook.com/Bekai-Group-547570085403263/"></a>
            </li>
            <li class="youtube">
                <a href="https://www.youtube.com/channel/UCwxSKqBFKv97MFX_FydzLOA"></a>
            </li>
            <li class="instagram">
                <a href="https://www.instagram.com/bekaigroup/"></a>
            </li>
        </ul>
    </footer>
</body>
</html>
<?php ob_end_flush(); ?>
