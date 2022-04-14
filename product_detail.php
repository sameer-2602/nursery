<?php include './inc/header.php'; ?>
<?php include './inc/menu.php'; ?>
<?php include './admin/inc/Connection.php'; ?>
<?php 
if(isset($_REQUEST['data_product_id'])){

    $id = $_REQUEST['data_product_id'];
    $res = $con->query("select * from product where id=$id");
    $result =  mysqli_fetch_assoc($res);
    $cat_id =  $result['cat_id'];  
    $related_products = $con->query("select * from product where cat_id=$cat_id");
    // $related = mysqli_fetch_assoc($related_products);
}

?>
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="./assets/images/<?=$result['image']?>" class="image-popup"><img src="./assets/images/<?=$result['image']?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?=$result['name']?></h3>
    				<!-- <div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
						</div> -->
    				<p class="price"><span><?=$result['discount_price']?> ₹</span></p>
    				<p><?=$result['small_text']?><</p>
                    <p><?=$result['large_text']?></p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <!-- <div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                  <select name="" id="" class="form-control">
	                  	<option value="">Small</option>
	                    <option value="">Medium</option>
	                    <option value="">Large</option>
	                    <option value="">Extra Large</option>
	                  </select>
	                </div> -->
		            </div>
							</div>
							<!-- <div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div> -->
	          	<div class="w-100"></div>
	          	<!-- <div class="col-md-12">
	          		<p style="color: #000;">600 kg available</p>
	          	</div> -->
          	</div>
          	<p><a href="addcart.php?data_product_id=<?=$id?>" class="btn btn-black py-3 px-5" name="submit" value="Add to Cart">Add to Cart</a></p>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Products</span>
            <h2 class="mb-4">Related Products</h2>
            <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
                <?php foreach($related_products as $key => $val): ?>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="product_detail.php?data_product_id=<?=$val['id'];?>" class="img-prod"><img class="img-fluid" src="./assets/images/<?=$val['image']?>"
                                alt="Colorlib Template">
                            <!-- <span class="status">30%</span> -->
                            <!-- <div class="overlay"></div> -->
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="product_detail.php?data_product_id=<?=$val['id']?>"><?=$val['name']?></a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc"><?=$val['price']?> ₹</span><span
                                            class="price-sale"><?=$val['discount_price']?> ₹</span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="product_detail.php?data_product_id=<?=$val['id']?>"
                                        class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="addcart.php?data_product_id=<?=$val['id']?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <!-- <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php 
                    if($key ==3){break;} 
                    ?>
                <?php endforeach ?>
    		</div>
    	</div>
    </section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
   
    
  <?php include './inc/footer.php'; ?>