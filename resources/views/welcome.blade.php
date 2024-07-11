<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>薇拉WIRA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="generator" content="Webflow"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/wirawebflow/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="{{ asset('wirawebflow/webfont.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        WebFont.load({
            google: {
                families: ["Roboto:300,regular,500","Roboto Condensed:300,regular,700","Roboto Slab:300,regular,700","Arbutus Slab:regular"]
            }
        });
    </script>
    <script type="text/javascript">
        !function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);
    </script>
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbfc0_New%20icon.ico"/>
    <link rel="apple-touch-icon" href="https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbfd6_metric-webclip.png"/>
</head>

<body>
    <div class="navigation w-nav" role="banner" data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease">
        <div class="w-container">
            <a href="/" class="brand-link w-nav-brand">
                <div class="logo-text">薇拉數位行銷科技 廣告管理後台</div>
            </a>
            <nav role="navigation" class="nav-menu w-nav-menu">
                <a href="/" class="nav-link w-nav-link"></a>
                <a href="/" class="nav-link w-nav-link">權限管理</a>
                <a href="/" class="nav-link w-nav-link">Customers</a>
                <a href="/" class="nav-link w-nav-link">操作紀錄</a>
            </nav>
            
        </div>
    </div>
    <div class="slider w-slider" data-animation="slide" data-delay="4000" data-autoplay="false" data-autoplay-limit="0" data-disable-swipe="false" data-duration="500" data-easing="ease" data-hide-arrows="false" data-infinite="true" data-nav-spacing="3">
        <div class="w-slider-mask">
            <div class="slide _1 w-slide">
                <div class="w-container"></div>
            </div>
            <div class="slide _2 w-slide">
                <div class="w-container"></div>
            </div>
            <div class="slide _3 w-slide">
                <div class="w-container"></div>
            </div>
        </div>
        <div class="w-slider-arrow-left">
            <div class="w-icon-slider-left"></div>
        </div>
        <div class="w-slider-arrow-right">
            <div class="w-icon-slider-right"></div>
        </div>
        <div class="w-slider-nav w-round"></div>
    </div>
    <div id="top" class="section main">
        <div class="w-container">
            <div class="w-row">
                <div class="w-col w-col-6">
                    <h1 class="main-heading">解決行銷大小事</h1>
                    <p class="main-subtitle">本系統將協助您解決串接廣告API上的難題</p>
                    <a href="/" class="button">dash-board</a>
                    <a href="/" class="button hollow">Learn More</a>
                </div>
                <div class="w-col w-col-6">
                    <img src="https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbff9_Metric-screenshot5.png"
                        srcset="https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbff9_Metric-screenshot5-p-500x317.png 500w, https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbff9_Metric-screenshot5.png 814w"
                        sizes="(max-width: 767px) 96vw, (max-width: 991px) 354px, 460px" alt="" class="main-image"/>
                </div>
            </div>
        </div>
    </div>
    <div class="section press">
        <div class="w-container">
            <div class="small-text">WIRA Marketing</div>
            <div class="div-block">
                <img src="https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbfe4_logo_Fastcompany.svg"
                    width="70" alt="" class="logo"/>
                <img src="https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbfce_logo_Forbes.svg"
                    width="70" alt="" class="logo"/>
                <img src="https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbfc8_logo_techcrunch.svg"
                    width="70" alt="" class="logo"/>
                <img src="https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbfec_logo_Wired.svg"
                    width="70" alt="" class="logo"/>
                <img src="https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbfc5_logo_zdnet.svg"
                    width="70" alt="" class="logo"/>
            </div>
        </div>
    </div>
    <strong class="bold-text-2">目前僅實裝新增&管理子BM</strong>
    <section></section>
    <section class="section-5"></section>

    
    <section class="section-4">
        <div class="div-block-6">
            <div class="div-block-3" data-w-id="90af207a-a776-7d65-b9ca-61de9ae824ff">
                <strong class="bold-text-2">新增子BM</strong>
            </div>
            <div class="div-block-3" data-w-id="76806980-cced-8770-63aa-a9a93afcf219">
                <strong class="bold-text-2">管理子BM</strong>
            </div>
            <div class="div-block-3" data-w-id="0f0b23af-65e4-1893-3f11-349e6c572247">
                <strong class="bold-text-2">角色與權限管理</strong>
            </div>
            <div class="div-block-3" data-w-id="bde8cb6d-17ab-c873-68a4-a584b2669cd3">
                <strong class="bold-text-2">報表與分析</strong>
            </div>
            <div class="div-block-3" data-w-id="c97383f5-fc8b-6f89-bb5e-b2d2a8a83206">
                <strong class="bold-text-2">系統設定</strong>
            </div>
        </div>
        <div class="interface" id="interface">
    <div id="1" class="hidden">
        <!-- 子BM管理內容 -->
        <h2>新增子BM</h2>
        <form id="addBmForm" method="POST" action="{{ route('facebook.createChildBM') }}">
            @csrf
            <label for="parentBmId">父BM ID: (請貼上:1091332491850683)</label>
            <input type="text" id="parentBmId" name="parentBmId" required><br><br>
        
            <label for="bmName">子BM名稱:</label>
            <input type="text" id="bmName" name="bmName" required><br><br>
        
            <label for="shared_page_id">Shared Page ID:</label>
            <input type="text" id="shared_page_id" name="shared_page_id" placeholder="Shared Page ID" required><br><br>
        
            <label for="bmVertical">子BM行業別:</label>
            <select id="bmVertical" name="bmVertical" required>
                <option value="ADVERTISING">Advertising</option>
                <option value="AUTOMOTIVE">Automotive</option>
                <option value="CONSUMER_PACKAGED_GOODS">Consumer Packaged Goods</option>
                <option value="ECOMMERCE">Ecommerce</option>
                <option value="EDUCATION">Education</option>
                <option value="ENERGY_AND_UTILITIES">Energy and Utilities</option>
                <option value="ENTERTAINMENT_AND_MEDIA">Entertainment and Media</option>
                <option value="FINANCIAL_SERVICES">Financial Services</option>
                <option value="GAMING">Gaming</option>
                <option value="GOVERNMENT_AND_POLITICS">Government and Politics</option>
                <option value="HEALTHCARE">Healthcare</option>
                <option value="LUXURY">Luxury</option>
                <option value="MARKETING">Marketing</option>
                <option value="NON_PROFIT">Non-profit</option>
                <option value="ORGANIZATIONS_AND_ASSOCIATIONS">Organizations and Associations</option>
                <option value="PROFESSIONAL_SERVICES">Professional Services</option>
                <option value="RETAIL">Retail</option>
                <option value="TECHNOLOGY">Technology</option>
                <option value="TELECOMMUNICATIONS">Telecommunications</option>
                <option value="TRAVEL">Travel</option>
                <option value="OTHER">Other</option>
            </select><br><br>
        
            <label for="access_token">Access Token:</label>
            <input type="text" id="access_token" name="access_token" required><br><br>
        
            <button type="button" onclick="addBm()">提交</button>
        </form>
        <div id="response"></div>
        <script src="{{ asset('wirawebflow/addBm.js') }}"></script>

    </div>

    <div id="2" class="hidden">
        <!-- 用戶管理內容 -->
        <h2>管理子BM</h2>
            <div style="background-color: #f8f9fa; color: #343a40; padding: 10px; border-radius: 5px; border: 1px solid #ced4da; margin-left: 20%;">
                設置好新額度之後請按下"左下方"按鈕確認，請勿按到刪除
            </div>


        <div id="bmList">
            <table id="bmTable">
                <thead>
                    
                    <tr>
                        <th>子BM ID</th>
                        <th>子BM 名稱</th>
                        <th>子BM 額度</th>
                        <th>修改額度</th>
                        <th>動作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($businessManagers as $bm)
                        <tr>
                            @csrf
                            <td>{{ $bm->id }}</td>
                            <td>{{ $bm->name }}</td>
                            <td>{{ $bm->credit_limit }}</td>
                            <td>
                                <input type="number" name="credit_allocation_{{ $bm->id }}" placeholder="分配信用額度">
                            </td>
                            <td>
                                <button type="button" onclick="updateCredit({{ $bm->id }})">確認修改</button>
                                <button type="button" onclick="deleteBm({{ $bm->id }})">刪除子BM</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $businessManagers->links() }}
            </div>
            <button onclick="updateCredits()">確認提交修改</button>
        </div>
        <script src="{{ asset('wirawebflow/manageBm.js') }}"></script>
    </div>

    <div id="3" class="hidden">
        <!-- 角色與權限管理內容 -->
        <h2>角色與權限管理內容</h2>
        <p>這裡是角色與權限管理的具體內容。</p>
    </div>

    <div id="4" class="hidden">
        <!-- 報表與分析內容 -->
        <h2>報表與分析內容</h2>
        <p>這裡是報表與分析的具體內容。</p>
    </div>

    <div id="5" class="hidden">
        <!-- 系統設定內容 -->
        <h2>系統設定內容</h2>
        <p>這裡是系統設定的具體內容。</p>
    </div>
</div>

    </section>
    <div class="section footer">
        <div class="w-container">
            <div class="w-row">
                <div class="w-col w-col-6">
                    <div class="logo-text footer">WIRA Marketing</div>
                    <div class="footer-slogan">註冊電子報</div>
                    <div class="newsletter-form w-form">
                        <form id="wf-form-newsletter" name="wf-form-newsletter" data-name="Newsletter" method="get" class="w-clearfix"
                            data-wf-page-id="666defcb174b035140fcbfb8" data-wf-element-id="6d9e4fef-4597-289d-f0e1-52e00c18a857">
                            <input type="email" class="newsletter-field w-input" maxlength="256" name="email" data-name="Email"
                                placeholder="Email Address" id="email" required=""/>
                            <input type="submit" class="newsletter-button w-button" value="Subscribe" data-wait="Wait..."
                                wait="Wait..."/>
                        </form>
                        <div class="success-message w-form-done">
                            <p>Thank you! You’ll receive an email shortly.</p>
                        </div>
                        <div class="w-form-fail">
                            <p>Oops! Something went wrong while submitting the form :(</p>
                        </div>
                    </div>
                    <div class="social-icon-group">
                        <a href="/" class="social-icon w-inline-block"><img src="https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbfd2_facebook-icon.svg"
                                alt=""/></a>
                        <a href="/" class="social-icon w-inline-block"><img src="https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbfe0_twitter-icon.svg"
                                alt=""/></a>
                        <a href="/" class="social-icon w-inline-block"><img src="https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbfcf_linkdin-icon-white.svg"
                                alt=""/></a>
                        <a href="/" class="social-icon w-inline-block"><img src="https://cdn.prod.website-files.com/666defca174b035140fcbf7b/666defcb174b035140fcbfd1_email-icon-white.svg"
                                alt=""/></a>
                    </div>
                </div>
                <div class="w-col w-col-2">
                    <h4 class="footer-title">Company</h4>
                    <!--//<a href="/" class="page-link in-footer">Home</a>
                    <a //href="/" class="page-link in-footer">Features</a>
                    <a //href="/" class="page-link in-footer">Clients</a>
                    <a //href="/" class="page-link in-footer">Pricing</a>
                    <a //href="/" class="page-link in-footer">Sign Up</a>-->
                </div>
                <div class="w-col w-col-2">
                    <h4 class="footer-title">Product</h4>
                    <!--//<a href="/" class="page-link in-footer">Analytics</a>
                    <a //href="/" class="page-link in-footer">Businesses</a>
                    <a //href="/" class="page-link in-footer">Testimonials</a>
                    <a //href="/" class="page-link in-footer">Integrations</a>-->
                </div>
                <div class="w-col w-col-2">
                    <h4 class="footer-title">Legal</h4>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="section footer copyright">
        <div class="w-container">
            <div>Copyright 2024 . All Rights Reserved.</div>
        </div>
    </div>
    <script src="{{ asset('wirawebflow/script.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        // Existing JavaScript code here
    </script>
</body>
</html>
