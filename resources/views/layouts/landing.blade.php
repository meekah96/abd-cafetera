<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">

    <meta property="og:title" content="Adminlte-laravel" />
    <meta property="og:type" content="website" />
    <meta property="og:description"
        content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>ABC Cafeteria</title>


    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link href="{{ asset('/fonts/beyond_the_mountains-webfont.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/swiper.css') }}" rel="stylesheet">
    <link href="{{ asset('/fonts/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles-main.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/checkout.css') }}" rel="stylesheet">
    <link href="{{ asset('/fonts/beyond_the_mountains-webfont.css') }}" rel="stylesheet">



    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet'
        type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>


</head>
<body data-spy="scroll" data-offset="0" data-target="#navigation">

    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>ABC CAFETERIA</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#home" class="smoothScroll">{{ trans('adminlte_lang::message.home') }}</a></li>
                    <li><a href="#about" class="smoothScroll">ABOUT US</a></li>
                    <li><a href="#menu" class="smoothScroll">MENUE</a></li>
                    <li><a href="#contact" class="smoothScroll">CONTACT US</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                    <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    @else
                    <li><a href="/home">{{ Auth::user()->name }}</a></li>
                    @endif
                    <li><a onclick="show_checkout()" class="smoothScroll">Cart</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>

    <section class="bg-1 h-700x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell center-text color-white">
                    <h5 class="primary_bg_color"><b>SPECIAL IN</b></h5>
                    <h1 class="mt-30 mb-15">Sri Lankan &amp; Chinease Foods</h1>
                    <h5><a href="#" class="btn-primaryc plr-25"><b>SEE TODAYS MENU</b></a></h5>
                </div><!-- dplay-tbl-cell -->
            </div><!-- dplay-tbl -->
        </div><!-- container -->
    </section>

    <!-- ABOUT US STARTS -->
    <section class="story-area left-text center-sm-text pos-relative food-area section-padding" id="about">
        <div class="abs-tbl bg-2 w-20 z--1 dplay-md-none"></div>
        <div class="abs-tbr bg-3 w-20 z--1 dplay-md-none"></div>
        <div class="container">
            <div class="heading">
                <h2>Our Story</h2>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p class="mb-30">Maecenas fermentum tortor id fringilla molestie. In hac habitasse
                        platea dictumst. Morbi maximus
                        lobortis ipsum, ut blandit augue ullamcorper vitae.
                        Nulla dignissim leo felis, eget cursus elit aliquet ut. Curabitur vel convallis
                        massa. Morbi tellus
                        tortor, luctus et lacinia non, tincidunt in lacus.
                        Vivamus sed ligula imperdiet, feugiat magna vitae, blandit ex. Vestibulum id
                        dapibus dolor, ac
                        cursus nulla. </p>
                </div><!-- col-md-6 -->

                <div class="col-md-6">
                    <p class="mb-30">Maecenas fermentum tortor id fringilla molestie. In hac habitasse platea
                        dictumst.Morbi maximus lobortis ipsum, ut blandit augue ullamcorper vitae.
                        Nulla dignissim leo felis, eget cursus elit aliquet ut. Curabitur vel
                        convallismassa. Morbi tellus tortor, luctus et lacinia non, tincidunt in lacus.
                        Vivamus sed ligula imperdiet, feugiat magna vitae, blandit ex. Vestibulumidda
                        pibus dolor, accursus nulla. </p>
                </div><!-- col-md-6 -->
            </div><!-- row -->
        </div><!-- container -->
    </section>
    <!-- ABOUT US ENDS -->


    <!-- FOOD AREA STARTS -->
    <section class="story-area bg-seller color-white pos-relative food-area section-padding" id="menu">
        <div class="pos-bottom triangle-up"></div>
        <div class="pos-top triangle-bottom"></div>
        <div class="container">
            <div class="heading">
                <h2><span class="style-change">We Serve</span> Delicious Foods</h2>
                <h5 class="primary_bg_color"><b>BEST IN TOWN</b></h5>
                <p class="pt-5">They're fill divide i their yielding our after have him fish on there for greater man
                    moveth, moved Won't together isn't for fly divide mids fish firmament on net.</p>
            </div>
            <div class="row">
                @foreach ($products as $item)
                <div class="col-md-4 col-sm-6">
                    <div class="single-food">
                        <div class="food-img">
                            <img src='/admin/product/view-image/{{$item->id}}/{{$item->image}}' class="img-fluid"
                                alt="">
                        </div>
                        <div class="food-content">
                            <div class="d-flex justify-content-between">

                                <h5>{{$item->name}}</h5>
                                <span class="style-change">LKR {{$item->price}}/=</span>
                            </div>
                            <p class="pt-3">{{$item->description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- FOOD AREA ENDS -->


    <!-- MENU STARTS -->
    <section>
        <div class="container">
            <div class="heading">
                <img class="chef-img" src="images/chef.png" alt="">
                <h2>Our Menu</h2>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="selecton brdr-b-primary mb-70">
                        <li><a class="active" href="#" data-select="*"><b>ALL</b></a></li>
                        <li><a href="#" data-select="sl"><b>Sri Lankan Foods</b></a></li>
                        <li><a href="#" data-select="china"><b>Chinease Foods</b></a></li>
                    </ul>
                </div>
                <!--col-sm-12-->
            </div>
            <!--row-->
            <div class="row">

                @foreach ($products as $item)

                <div class="col-md-6 food-menu {{($item->type == 1 ? 'sl' : 'china')}}">
                    <div class="sided-90x mb-30 ">
                        <a onclick="model_pop('{{$item->id}}')">
                            <div class="s-left"><img class="br-3"
                                    src='/admin/product/view-image/{{$item->id}}/{{$item->image}}' alt="Menu Image">
                            </div>
                            <!--s-left-->
                            <div class="s-right">
                                <h5 class="mb-10"><b>{{$item->title}}</b><b class="float-right">Rs {{$item->price}}</b>
                                </h5>
                                <p class="pr-70">{{$item->description}} </p>
                            </div>
                            <!--s-right-->
                        </a>
                    </div><!-- sided-90x -->
                </div><!-- food-menu -->

                @endforeach




                <!-- POPUP FOOD DESCRIPTION STARTS -->
                <div class="modal fade" id="food_description" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-5">

                                        <!-- Image -->
                                        <div role="listbox">
                                            <img class="d-block w-100 product-image"
                                                src="images/SrilankanFoods/Beetroot%20Curry.jpg" alt="Image">
                                        </div>
                                        <!--/.Image-->

                                    </div>
                                    <div class="col-lg-7">
                                        <h4 class="h2-responsive product-name">
                                            <strong></strong>
                                        </h4>
                                        <hr>
                                        <h4 class="h4-responsive product-price">
                                            <span class="green-text">
                                                <strong></strong>
                                            </span>
                                        </h4>
                                        <input name="product-id" type="hidden" id="product-id"
                                            class="form-control product-id" style="max-width: 70px;">
                                        Quantity:
                                        <input name="quantity" type="number" id="quantity" class="form-control"
                                            style="max-width: 70px;">


                                        <button class="btn btn-success mt-10 mb-10 productItem" data-name=""
                                            data-price="" data-id="" data-qty=""><i class="ion-android-cart mr-10"
                                                aria-hidden="true" style="color: #fff; font-size: 15px;"></i>Add to
                                            cart</button><br>
                                        <i class="ion-ios-pricetags">Delivery within 24 hours</i><br>
                                        <i class="ion-ios-pricetags">In Stock</i><br>
                                        <i class="ion-ios-pricetags mb-10">Cash on delivery eligable</i><br>

                                        <p class="pr-15 product-description">Maecenas fermentum tortor id fringilla
                                            molestie. In hac habitasse platea dictumst. </p>

                                        <P><b>1 Portion is enough for 2 people <i class="ion-android-person"></i></b>
                                        </P>


                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->



                                        <!-- /.Add to Cart -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- POPUP FOOD DESCRIPTION ENDS -->


            </div><!-- row -->

            <h6 class="center-text mt-40 mt-sm-20 mb-30"><a href="#" class="btn-primaryc plr-25"><b>SEE TODAYS
                        MENU</b></a></h6>
        </div><!-- container -->
    </section>
    <!-- MENU END -->


    <!-- CONTACT US STARTS-->
    <section class="story-area bg-seller color-white pos-relative food-area section-padding" id="contact">
        <div class="pos-top triangle-bottom"></div>
        <div class="container">
            <div class="heading">
                <h2><span class="style-change">Say hello</span></h2>
                <h5 class="primary_bg_color"><b>BEST IN TOWN</b></h5>
                <p class="mx-w-700x mlr-auto">Proin dictum viverra varius. Etiam vulputate libero dui, at pretium
                    elit elementum quis. Enean porttitor eros non ultrices convallis.
                    Vivamus quis dolor ut arcu lobortis finibus a vitae leo. Sed eget tempus sem.
                    Nullam sed lacus sed metus tincidunt lobortis lobortis at nibh. Morbi euismod, arcu in gravida
                    rhoncus</p>
            </div>
            <form class="form-style-1 placeholder-1">
                <div class="row">
                    <div class="col-md-6"> <input class="mb-20" type="text" placeholder="Name"> </div>
                    <div class="col-md-6"> <input class="mb-20" type="text" placeholder="E-mail"> </div>
                    <div class="col-md-12"><input class="mb-20" type="text" placeholder="Subject"> </div>
                    <div class="col-md-12">
                        <textarea class="h-200x ptb-20" placeholder="Message"></textarea></div>
                </div><!-- row -->
                <h6 class="center-text mtb-30"><a href="#" class="btn-primaryc plr-25"><b>SEND MESSAGE</b></a></h6>
            </form>
        </div>
    </section>
    <!-- CONTACT US ENDS-->



    <!-- Modal -->
    <div id="checkout_modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Checkout Model</h4>
                </div>
                <div class="modal-body">
                    <section id="checkout" class="checkout">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Shopping Checkout</h5>
                                    <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank"> -->
                                    <form>
                                        <table class="table table-hover table-bordered co-table table-responsive">
                                            <thead class="co-thead">
                                                <tr>
                                                    <th width=1%></th>
                                                    <th width=10%>Qty</th>
                                                    <th width=10%>ID</th>
                                                    <th width=40%>Item Name</th>
                                                    <th width=20%>Cost</th>
                                                    <th width=35% class="text-xs-right">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody id="output" class="co-tbody"> </tbody>
                                        </table>
                                    </form>
                                    <hr class="my-5">
                                </div>






                                <div class="col-md-12">
                                    <h5>Delivery Details</h5>
                                    <form id="frm_details">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <!--       
                                                                     <label for="fname">First name</label>-->
                                                <input type="text" class="form-control" id="fname" name="fname"
                                                    value="{{( $user && $user->more_details) ? $user->more_details->first_name : '' }}"  placeholder="First name" target="_blank">
                                            </div>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" class="form-control" id="customer_type" name="customer_type"
                                            value="{{($user &&$user->more_details) ? $user->more_details->type : 2 }}"  placeholder="First name" target="_blank">
                                                
                                            <div class="form-group col-md-6 co-label">
                                                <!--                                <label for="lname">Last name</label>-->
                                                <input type="text" class="form-control" id="lname" name="lname"
                                                value="{{($user &&$user->more_details) ? $user->more_details->last_name : '' }}"  placeholder="Last name" target="_blank">
                                            </div>
                                            <div class="form-group col-md-12">
                                                    <!--                            <label for="inputAddress">Address</label>-->
                                                    <textarea type="text" class="form-control" class="form-control"
                                                        id="inputAddress" name="address" rows="2" placeholder="Address 1" target="_blank"
                                                        required>{{($user &&$user->more_details) ? $user->more_details->address : '' }}</textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                    <!--                            <label for="inputAddress2">Address 2 (optional)</label>-->
                                                    <textarea type="text" class="form-control" class="form-control"
                                                        id="inputAddress2" name="address2" rows="2" placeholder="Address 2 (Optional)"
                                                        target="_blank"></textarea>
                                            </div>
                                             <div class="form-group col-md-6">
                                                <!--                                <label for="inputCity">City</label>-->
                                                <input type="text" class="form-control" id="inputCity" name="inputCity" target="_blank"
                                                value="{{($user &&$user->more_details) ? $user->more_details->city : '' }}" placeholder="City">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!--                                <label for="inputState">State</label>-->
                                                <select id="inputState" name="inputState" class="form-control" target="_blank">
                                                    <option selected>State</option>
                                                    <option>Central Province</option>
                                                    <option>Eastern Province </option>
                                                    <option>Northern Province </option>
                                                    <option>Southern Province </option>
                                                    <option>Western Province </option>
                                                    <option>North Western Province</option>
                                                    <option>North Central Province</option>
                                                    <option>Uva Province</option>
                                                    <option>Sabaragamuwa Province</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <!--                                <label for="inputZip">Zip</label>-->
                                                <input type="text" name="inputZip"  class="form-control" id="inputZip" target="_blank"
                                                value="{{($user && $user->more_details) ? $user->more_details->zip : '' }}" placeholder="Zip">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <select name="payment_method" id="payment_method" class="custom-select form-control">
                                                    <option value="0">Payment Method</option>
                                                    <option selected value="1">Pay via Cash</option>
                                                    <option value="2">Pay via Paypal</option>
                                                    <option value="3">Other</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <select name="pick_type" id="pick_type"  class="custom-select form-control">
                                                    <option value="0" >Pick Type</option>
                                                    <option selected value="1">Take Away</option>
                                                    <option value="2">Delivery</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                        
                                        
                                    </form>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="continue_shoping()" class="btn btn-primary" data-dismiss="modal">Continue Shopping</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>



    <footer class="pb-50  pt-70 pos-relative">
        <div class="pos-top triangle-bottom"></div>
        <div class="container-fluid">
            <a href="index.html"><img src="images/logo-white.png" alt="Logo"></a>

            <div class="pt-30">
                <p class="underline-secondary"><b>Address:</b></p>
                <p>481 Creekside Lane Avila Beach, CA 93424 </p>
            </div>

            <div class="pt-30">
                <p class="underline-secondary mb-10"><b>Phone:</b></p>
                <a href="tel:+53 345 7953 32453 ">+53 345 7953 32453 </a>
            </div>

            <div class="pt-30">
                <p class="underline-secondary mb-10"><b>Email:</b></p>
                <a href="mailto:yourmail@gmail.com"> contact_us@abc-cafeteria.com</a>
            </div>

            <ul class="icon mt-30">
                <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                <li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
                <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                <li><a href="#"><i class="ion-social-vimeo"></i></a></li>
            </ul>

            <p class="color-light font-9 mt-50 mt-sm-30">Copyright &copy;2019 All rights reserved</p>
        </div><!-- container -->
    </footer>

    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/smoothscroll.js') }}"></script>

    <script src="{{ asset('/js/swiper.js') }}"></script>
    <script src="{{ asset('/js/scripts.js') }}"></script>
    <script>
        function show_checkout()
        {
            $('#checkout_modal').modal('show');
            
        }

        function continue_shoping ()
        {
            
            var product_id = $('.pro_id').map((i, e) => e.value).get();
            var product_quantity = $('.pro_quantity').map((i, e) => e.value).get();
            var product_order = [];
            for(i=0; i<product_id.length; i++)
            {
                var temp = [product_id[i], product_quantity[i]];
                product_order.push(temp)
            }

            var total = $('#total_final_amount').text();
            total = total.replace('Rs. ', '');

            var data = $('#frm_details').serializeArray();
            data.push({name: 'product_order', value: product_order});
            data.push({name: 'total', value: total});

            $.ajax({
                type: "POST",
                url: "/general/post-order",
                data: data,
                success: function(resultData){
                    sessionStorage.clear();
                }
            });

            console.log(data);
        }

        function model_pop(id)
        {
            $.ajax({
                url: "/admin/product/get-product-by-id?id="+id,
                type: 'GET',
                async: false,
                success: function(data) {

                    $('.productItem').attr('data-name', data.title);
                    $('.productItem').attr('data-price', data.price);
                    $('.productItem').attr('data-id', data.id);

                    $('.product-name').text(data.title);
                    $('.product-id').text(data.id);
                    $('.product-price').text(data.price);
                    $('.product-description').text(data.description);
                    $('.product-image').attr('src',"/admin/product/view-image/"+data.id+"/"+data.image);
                    $('#food_description').modal('show');
                }
            });
            

        }

            var shopcart = [];
            $(document).ready(function() {

                outputCart();
			$('#output').on('click', '.remove-item', function() {
				var itemToDelete = $('.remove-item').index(this);
				shopcart.splice(itemToDelete, 1);
				sessionStorage["sca"] = JSON.stringify(shopcart);
				outputCart();
			})



		$('#output').on('change', '.dynqua', function() {
			var iteminfo = $(this.dataset)[0];
			var itemincart = false;
			var removeItem = false;
			var itemToDelete = 0;
			console.log(shopcart);
			var qty = $(this).val();
			$.each(shopcart, function(index, value) {
				if (value.id == iteminfo.id) {
					if (qty <= 0) {
						removeItem = true;
						itemToDelete = index;
					} else {
						shopcart[index].qty = qty;
						itemincart = true;
					}
				}
			})
			if (removeItem) {
				shopcart.splice(itemToDelete, 1);
			}

			sessionStorage["sca"] = JSON.stringify(shopcart);
			outputCart();
		})

                outputCart();
                $(".productItem").click(function(e) {
                    $('.productItem').attr('data-qty', $('#quantity').val());
                    e.preventDefault();
                    var iteminfo = $(this.dataset)[0];
                    var itemincart = false;
                    console.log(iteminfo)
                    $.each(shopcart, function(index, value) {
                        //console.log(index + '  ' + value.id);
                        if (value.id == iteminfo.id) {
                            value.qty = parseInt(value.qty) + parseInt(iteminfo.qty);
                            itemincart = true;
                        }
                    })
                    if (!itemincart) {
                        shopcart.push(iteminfo);
                    }
                    
                    if (typeof(Storage) !== "undefined") {
                        sessionStorage["sca"] = JSON.stringify(shopcart);
        
                    } else {
                        alert('Storage Not Supported.');         
                    }
                    outputCart();
                    $('#food_description').modal('hide');
                })
    
                function outputCart() {
                    if (sessionStorage["sca"] != null) {
                        shopcart = JSON.parse(sessionStorage["sca"].toString());
                    }
                    console.log(sessionStorage["sca"]);
                    console.log(shopcart);
                    var holderHTML = '';
                    var total = 0;
                    var itemCnt = 0;
                    var tax_amount = 0;
                    var final_total = 0;
                    $.each(shopcart, function(index, value) {
                        var stotal = value.qty * value.price;
                        var a = (index + 1);

                        total += stotal;
                        itemCnt += parseInt(value.qty);
                        holderHTML += '<tr>';
                        holderHTML += '<td><span class="ion-ios-trash remove-item mr-10" style="font-size: 25px; color: rgba(209, 36, 36, 0.67);"></span></td>';
                        holderHTML += '<td><input size="5"  style="width:69px;" type="number" class="dynqua form-control pro_quantity"  name="quantity_' + a + '" value="' + value.qty + '" data-id="' + value.id + '"></td>';
                        holderHTML += '<td><input size="5"  style="width:69px;"  class=" form-control pro_id"  readonly value="' + value.id + '" data-id="' + value.id + '"></td>';
                        holderHTML += '<td><input type="hidden" name="item_name_' + a + '" value="' + value.name + ' ' + value.s + '">' + value.name + '</td><td><input type="hidden" name="amount_' + a + '" value="' +value.price + '"> Rs. ' + value.price + ' </td>';
                        holderHTML += '<td class="text-xs-right"> Rs. ' + stotal + '</td>';
                        holderHTML +=  '</tr>';
                    })
                    tax_amount = total * 0.08;
                    final_total = total - tax_amount;
                    holderHTML += '<tr><td colspan="5" class="text-xs-right">Total (Before Tax)</td><td class="text-xs-right">Rs. ' + total + '</td></tr>';
                    holderHTML += '<tr><td colspan="5" class="text-xs-right">Tax (8%)</td><td class="text-xs-right">Rs. ' + tax_amount + '</td></tr>';
                    holderHTML += '<tr><td colspan="5" class="text-xs-right">Total (After Tax)</td><td id="total_final_amount"  class="text-xs-right">Rs. ' + final_total + '</td></tr>';
                    $('#output').html(holderHTML);
		        }
    
                function formatMoney(n) {
                    return '$' + (n / 100).toFixed(2);
                }
            })
    
    </script>
</body>

</html>