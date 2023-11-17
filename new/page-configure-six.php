<?php 
/**
 *  Template Name: Config (Six)
 *
 *  This page template has a sidebar built into it, 
 *  and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<div class="buy-order-bike-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="caption">
					<h1 class="bike-name">SPITFIRE SIX</h1>
					<a href="#scroll-down" class="scroll-down" address="true">
						<span>CONFIGURE</span>
						<i class="fa fa-chevron-down" aria-hidden="true"></i>
					</a>
				</div>

				<img src="/wp-content/uploads/2020/02/six-stealth-sub-new.jpg" class="first_image">
			</div>
		</div>
	</div>
	<div id="scroll-down"></div>
	<div class="acc-option" >
		<div class="container-fluid px-0">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-group" id="accordion">
						<div class="panel stealth_kit">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#sk">
										<div class="container">
											<span>STEALTH KIT</span>
										</div>
									</a>
								</h4>
							</div>
							<div id="sk" class="panel-collapse collapse in">
								<div class="container">
									<div class="panel-body px-0 py-5 ">
										<div class="boxes">
											<div class="row">
												<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
													<input class="tot_amount" type="checkbox" id="box-1s" value="1200.00">
													<label for="box-1s" class="firstproduct">
														<img src="/wp-content/uploads/2020/02/stealth-kit-six.png">
														<h4>Stealth Kit</h4>

														<ul>
															<li>Bronze Chrome Frame Kit</li> 
															<li>Titanium Anodized Billeted Parts Kit&nbsp;</li>
															<li>Bronze Marzocchi Front Suspension Kit&nbsp;</li>
															<li>Hand Painted Gloss Black Fuel tank with Bronze Detailing</li>
															<li>Hand Painted Gloss Black Carbon Fibre Rear Mudguard with Bronze Centre Stripe&nbsp;</li>
															<li>Hand Painted Gloss Black Carbon Fibre Headlight Cowl with Bronze Centre Stripe&nbsp;</li>
															<li>Hand Painted Gloss Black Front Mudguard With Bronze Centre Stripe</li>
															<li>Quilted Alcantara Gel Seat with Yellow Stitching</li>
															<li>19" Wheels with Black Rims + Stainless Steel Spokes</li>
														</ul>

														<span class="d-block">Part No. 500072</span>
														<span class="price">£1,200.00</span>
													</label>
												</div>  
												<div class="col-md-3 col-sm-6 col-xs-6 mb-30" >
													<input class="tot_amount" type="checkbox" id="box-1s2" value="1500.00">
													<label for="box-1s2" class="secondproduct">
														<img src="/wp-content/uploads/2020/02/stealth-kit-six.png">
														<h4>Stealth Kit (B)</h4>

														<ul>
															<li>Bronze Chrome Frame Kit</li> 
															<li>Titanium Anodized Billeted Parts Kit&nbsp;</li>
															<li>Bronze Marzocchi Front Suspension Kit&nbsp;</li>
															<li>Hand Painted Gloss Black Fuel tank with Bronze Detailing</li>
															<li>Hand Painted Gloss Black Carbon Fibre Rear Mudguard with Bronze Centre Stripe&nbsp;</li>
															<li>Hand Painted Gloss Black Carbon Fibre Headlight Cowl with Bronze Centre Stripe&nbsp;</li>
															<li>Hand Painted Gloss Black Front Mudguard With Bronze Centre Stripe</li>
															<li>Quilted Alcantara Gel Seat with Yellow Stitching</li>
															<li>Black Billeted Alloy 19" 8 Spoked Wheels</li>
														</ul>

														<span class="d-block">Part No. 500088</span>
														<span class="price">£1,500.00</span>
													</label>
												</div>                     
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>



            <!--<div class="panel anodizing_options">
              <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#ano">
                          <div class="container">
                            <span>ANODIZING OPTIONS</span>
                          </div>
                        </a>
                      </h4>
              </div>
              <div id="ano" class="panel-collapse collapse">
                <div class="container">
                    <div class="panel-body px-0 py-5 ">
                      <div class="boxes">
                        <div class="row">
                          <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                             <input class="tot_amount" type="checkbox" id="box-101" value="395.00">
                                <label for="box-101">
                                  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/001-360x360.jpg">
                                  <h4>Black Anodizing (Triple Clamps, Tail Piece, Headlight Cowl Stays and Mudguards)</h4>
                                  <span class="d-block">Part No. 500089</span>
                                  <span class="price">£395.00</span>
                              </label>
                          </div>  
                    
                        </div>

                      </div>
                    </div>
                </div>
              </div>
          </div>-->

          <div class="panel special_equipment">
          	<div class="panel-heading">
          		<h4 class="panel-title">
          			<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#se">
          				<div class="container">
          					<span>SPECIAL EQUIPMENT</span>
          				</div>
          			</a>
          		</h4>
          	</div>
          	<div id="se" class="panel-collapse collapse">
          		<div class="container">
          			<div class="panel-body px-0 py-5 ">
          				<div class="boxes">
          					<div class="row">
          						<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          							<input class="tot_amount" type="checkbox" id="box-1" value="119.00">
          							<label for="box-1">
          								<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/001-360x360.jpg">
          								<h4>Smoked Fly Screen</h4>
          								<span class="d-block">Part No. 500024</span>
          								<span class="price">£119.00</span>
          							</label>
          						</div>  
          						<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          							<input class="tot_amount" type="checkbox" id="box-2" value="80.00">
          							<label for="box-2">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/006-360x360.jpg">
          								<h4>Headlight Guard</h4>
          								<span class="d-block">Part No. 500063</span>
          								<span class="price">£80.00</span></label>
          							</div>  
          							<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          								<input class="tot_amount" type="checkbox" id="box-3" value="88.00">
          								<label for="box-3">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/007-360x360.jpg">
          									<h4>Lithium – Ion Optimate Charger + Fitted Charger Cable</h4>
          									<span class="d-block">Part No. S6F09C01821</span>
          									<span class="price">£88.00</span></label>

          								</div>  
          								<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          									<input class="tot_amount" type="checkbox" id="box-4" value="170.00">
          									<label for="box-4">  <img src="/wp-content/uploads/2020/02/exhaust-heat-wrap-360.jpg">
          										<h4>Exhaust Heat Wrap </h4>
          										<span class="d-block">Part No. 500082</span>
          										<span class="price">£170.00</span></label>
          									</div>                          
          								</div>
          								<div class="row">

          									<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          										<input class="tot_amount" type="checkbox" id="box-222" value="96.00">
          										<label for="box-222">  <img src="/wp-content/uploads/2020/02/bike-cover-360.jpg">
          											<h4>CCM Spitfire Bike Cover</h4>
          											<span class="d-block">Part No. 500026</span>
          											<span class="price">£96.00</span></label>
          										</div>  
          										<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          											<input class="tot_amount" type="checkbox" id="box-333" value="199.00">
          											<label for="box-333">  <img src="/wp-content/uploads/2020/02/spitfire-floor-mat-360.jpg">
          												<h4>CCM Spitfire Floor Mat</h4>
          												<span class="d-block">Part No. 300003</span>
          												<span class="price">£199.00</span></label>
          											</div> 
          											<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          												<input class="tot_amount" type="checkbox" id="box-201" value="30.00">
          												<label for="box-201">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/002.jpg">
          													<h4>Clutch Cover Vinyl Spitfire Badge</h4>
          													<span class="d-block">Part No. 100002</span>
          													<span class="price">£30.00</span></label>
          												</div> 
          												<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          													<input class="tot_amount" type="checkbox" id="box-202" value="30.00">
          													<label for="box-202">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/003.jpg">
          														<h4>LH Engine Case CCM Badge</h4>
          														<span class="d-block">Part No. 200001</span>
          														<span class="price">£30.00</span></label>
          													</div> 
          													<div class="row">
          														<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          															<input class="tot_amount" type="checkbox" id="box-203" value="150.00">
          															<label for="box-203">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/004.jpg">
          																<h4>Circular Bar End Mirror Set</h4>
          																<span class="d-block">Part No. S6F09C01701</span>
          																<span class="price">£150.00</span></label>
          															</div> 
          															<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																<input class="tot_amount" type="checkbox" id="box-204" value="130.00">
          																<label for="box-204">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/005.jpg">
          																	<h4>Brushed Stainless Steel Radiator Guard</h4>
          																	<span class="d-block">Part No. S6F09A25500</span>
          																	<span class="price">£130.00</span></label>
          																</div> 
          																<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																	<input class="tot_amount" type="checkbox" id="box-205" value="99.00">
          																	<label for="box-205">  <img src="/wp-content/uploads/2020/02/number-plate-holder-360.jpg">
          																		<h4>Side Mounted Swingarm Registration Plate Bracket Kit</h4>
          																		<span class="d-block">Part No. 500048</span>
          																		<span class="price">£99.00</span></label>
          																	</div> 
          																	<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																		<input class="tot_amount" type="checkbox" id="box-206" value="195.00">
          																		<label for="box-206">  <img src="/wp-content/uploads/2020/02/monza-cap-360.jpg">
          																			<h4>Monza Fuel Cap + Billeted Tank Insert</h4>
          																			<span class="d-block">Part No. 500066</span>
          																			<span class="price">£195.00</span></label>
          																		</div> 
          																	</div>
          																</div> 
          															</div>
          														</div>
          													</div>
          												</div>
          											</div>



          											<div class="panel fuel_tank ">
          												<div class="panel-heading">

          													<h4 class="panel-title">
          														<a data-toggle="collapse" class="collapsed"  data-parent="#accordion" href="#fuel">
          															<div class="container">
          																<span>FUEL TANK PAINT OPTIONS</span>
          															</div>
          														</a>
          													</h4>

          												</div>
          												<div id="fuel" class="panel-collapse collapse">
          													<div class="container">
          														<div class="panel-body px-0 py-5 ">
          															<div class="boxes">
          																<div class="row">
          																	<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																		<input class="tot_amount" type="checkbox" id="box-9" value="750.00">
          																		<label for="box-9">
          																			<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/010-360x360.jpg">
          																			<h4>British Racing Green</h4>
          																			<span class="d-block">Part No. 170018</span>
          																			<span class="price">£450.00</span>
          																		</label>
          																	</div>  

          																	<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																		<input class="tot_amount" type="checkbox" id="box-10" value="750.00" >
          																		<label for="box-10">
          																			<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/011-360x360.jpg">
          																			<h4>Pearl White</h4>
          																			<span class="d-block">Part No. 170017</span>
          																			<span class="price">£450.00</span>
          																		</label>
          																	</div>  
          																	<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																		<input class="tot_amount" type="checkbox" id="box-11" value="750.00">
          																		<label for="box-11">  
          																			<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/012-360x360.jpg">
          																			<h4>Oxblood Red</h4>
          																			<span class="d-block">Part No. 170019</span>
          																			<span class="price">£450.00</span></label>
          																		</div>  
          																		<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																			<input class="tot_amount" type="checkbox" id="box-12" value="750.00">
          																			<label for="box-12">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/013-360x360.jpg">
          																				<h4>Liquid Mercury</h4>
          																				<span class="d-block">Part No. 170026</span>
          																				<span class="price">£750.00</span></label>
          																			</div>
          																		</div>
          																		<div class="row"> 
          																			<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																				<input class="tot_amount" type="checkbox" id="box-12a" value="0.00">
          																				<label for="box-12a">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/02/no-image-ccm.png">
          																					<h4>Bespoke Paint Option (Ask for details)</h4>
          																					<span class="d-block">Part No. N/A</span>
          																					<span class="price">£POA</span></label>
          																				</div>
          																			</div>
          																		</div>
          																	</div>
          																</div>
          															</div>
          														</div>

          														<div class="panel seat_trim">
          															<div class="panel-heading">

          																<h4 class="panel-title">
          																	<a data-toggle="collapse" class="collapsed"  data-parent="#accordion" href="#seat">
          																		<div class="container">
          																			<span>SEAT TRIM</span>
          																		</div>
          																	</a>
          																</h4>

          															</div>
          															<div id="seat" class="panel-collapse collapse">
          																<div class="container">
          																	<div class="panel-body px-0 py-5 ">
          																		<div class="boxes">
          																			<div class="row">
          																				<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																					<input class="tot_amount" type="checkbox" id="box-9b" value="350.00">
          																					<label for="box-9b">
          																						<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/Tan_3Qtr-360x360.jpg">
          																						<h4>Quilted Tan Gel Seat</h4>
          																						<span class="d-block">Part No. 180006</span>
          																						<span class="price">£350.00</span>
          																					</label>
          																				</div>  

          																				<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																					<input class="tot_amount" type="checkbox" id="box-10b" value="399.00" >
          																					<label for="box-10b">
          																						<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/CField_3Qtr-360x360.jpg">
          																						<h4>Quilted Chesterfield Red/Red Stitching Gel Seat</h4>
          																						<span class="d-block">Part No. 180276</span>
          																						<span class="price">£399.00</span>
          																					</label>
          																				</div>  
          																				<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																					<input class="tot_amount" type="checkbox" id="box-11b" value="350.00">
          																					<label for="box-11b">  
          																						<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/Blk_Yellow_Top-360x360.jpg">
          																						<h4>Quilted Black Alcantra/Yellow Stitching Gel Seat</h4>
          																						<span class="d-block">Part No. 180277</span>
          																						<span class="price">£350.00</span></label>
          																					</div>  
          																					<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																						<input class="tot_amount" type="checkbox" id="box-12b" value="350.00">
          																						<label for="box-12b">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/Blk_Red_Top-360x360.jpg">
          																							<h4>Quilted Black/Red Stitching Gel Seat</h4>
          																							<span class="d-block">Part No. 180275</span>
          																							<span class="price">£350.00</span></label>
          																						</div>
          																					</div>
          																					<div class="row"> 
          																						<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																							<input class="tot_amount" type="checkbox" id="box-122b" value="350.00">
          																							<label for="box-122b">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/Grey-360x360.jpg">
          																								<h4>Grey Alcantara/White Stitching Gel Seat</h4>
          																								<span class="d-block">Part No. 180274</span>
          																								<span class="price">£350.00</span></label>
          																							</div>
          																						</div>
          																					</div>
          																				</div>
          																			</div>
          																		</div>
          																	</div>
          																	<div class="panel wheel_options">
          																		<div class="panel-heading">
          																			<h4 class="panel-title">
          																				<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#wo">
          																					<div class="container">
          																						<span>WHEEL OPTIONS</span>
          																					</div>
          																				</a>
          																			</h4>
          																		</div>
          																		<div id="wo" class="panel-collapse collapse">
          																			<div class="container">
          																				<div class="panel-body px-0 py-5 ">
          																					<div class="boxes">
          																						<div class="row">
          																							<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																								<input class="tot_amount" type="checkbox" id="box-101b" value="799.00">
          																								<label for="box-101b">
          																									<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/043.jpg">
          																									<h4>19” MACHINED WHEELS IN BLACK ANODIZING</h4>
          																									<span class="d-block">Part No. 500061</span>
          																									<span class="price">£799.00</span>
          																								</label>
          																							</div>  

          																						</div>

          																					</div>
          																				</div>
          																			</div>
          																		</div>
          																	</div>

          																	<div class="panel exhaust_options">
          																		<div class="panel-heading">
          																			<h4 class="panel-title">
          																				<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#exh">
          																					<div class="container">
          																						<span>EXHAUST OPTIONS</span>
          																					</div>
          																				</a>
          																			</h4>
          																		</div>
          																		<div id="exh" class="panel-collapse collapse">
          																			<div class="container">
          																				<div class="panel-body px-0 py-5 ">
          																					<div class="boxes">
          																						<div class="row">
          																							<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																								<input class="tot_amount" type="checkbox" id="box-101c" value="2000.00">
          																								<label for="box-101c">
          																									<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/015-360x360.jpg">
          																									<h4>AUSTIN RACING TITANIUM TWIN EXHAUST SYSTEM</h4>
          																									<span class="d-block">Part No. 150058</span>
          																									<span class="price">£2,000.00</span>
          																								</label>
          																							</div>  

          																						</div>

          																					</div>
          																				</div>
          																			</div>
          																		</div>
          																	</div>

          																	<div class="panel handlebar_options">
          																		<div class="panel-heading">
          																			<h4 class="panel-title">
          																				<a data-toggle="collapse" class="collapsed"  data-parent="#accordion" href="#ho">
          																					<div class="container">
          																						<span>HANDLEBAR OPTIONS</span>
          																					</div>
          																				</a>
          																			</h4>
          																		</div>
          																		<div id="ho" class="panel-collapse collapse">
          																			<div class="container">
          																				<div class="panel-body px-0 py-5 ">
          																					<div class="boxes">
          																						<div class="row">
          																							<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
          																								<input class="tot_amount" type="checkbox" id="box-5" value="80.00">
          																								<label for="box-5">
          																									<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/017.jpg">
          																									<h4>Flat Bars (As Seen on Spitfire)</h4>
          																									<span class="d-block">Part No. S6F08C01001</span>
          																									<span class="price">£80.00</span>
          																								</label>
          																							</div>  
                          <!-- <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                               <input class="tot_amount" type="checkbox" id="box-6" value="80.00" >
                                <label for="box-6">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/006-360x360.jpg">
                                  <h4>HEADLIGHT GUARD (ADD-ON)</h4>
                                  <span class="d-block">Part No. S6F09A03201</span>
                                  <span class="price">£80.00</span></label>
                          </div>  
                          <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                            <input class="tot_amount" type="checkbox" id="box-7" value="119.00">
                              <label for="box-7">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/007-360x360.jpg">
                                <h4>Lithium – Ion Optimate Charger + Fitted Charger Cable</h4>
                                <span class="d-block">Part No. S6F09C01816</span>
                                <span class="price">£119.00</span></label>

                          </div>  
                          <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                              <input class="tot_amount" type="checkbox" id="box-8" value="119.00">
                              <label for="box-8">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/015-360x360.jpg">
                                <h4>SMOKED FLY SCREEN (ADD-ON)</h4>
                                <span class="d-block">Part No. S6F09C01816</span>
                                <span class="price">£119.00</span></label>
                            </div>   -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel performance ">
    	<div class="panel-heading">

    		<h4 class="panel-title">
    			<a data-toggle="collapse" class="collapsed"  data-parent="#accordion" href="#per">
    				<div class="container">
    					<span>PERFORMANCE</span>
    				</div>
    			</a>
    		</h4>

    	</div>
    	<div id="per" class="panel-collapse collapse">
    		<div class="container">
    			<div class="panel-body px-0 py-5 ">
    				<div class="boxes">
    					<div class="row">
    						<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    							<input class="tot_amount" type="checkbox" id="box-9ca" value="399.00">
    							<label for="box-9ca">
    								<img src="/wp-content/uploads/2020/02/stage-1-remap-360.jpg">
    								<h4>Stage 1 Remap</h4>
    								<span class="d-block">Part No. S6F09C01836</span>
    								<span class="price">£399.00</span>
    							</label>
    						</div> 



    						<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    							<input class="tot_amount" type="checkbox" id="box-9cb" value="799.00">
    							<label for="box-9cb">
    								<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/046-360x360.jpg">
    								<h4>Twin Disk - Wheel/Brembo Caliper/Disc Rotor</h4>
    								<span class="d-block">Part No. 500077</span>
    								<span class="price">£799.00</span>
    							</label>
    						</div>  




    						<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    							<input class="tot_amount" type="checkbox" id="box-10c" value="3500.00" >
    							<label for="box-10c">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/02/no-image-ccm.png">
    								<h4>Ohlins Fork Kit </h4>
    								<span class="d-block">Part No. 500076</span>
    								<span class="price">£3,500.00</span></label>
    							</div>  
    							<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    								<input class="tot_amount" type="checkbox" id="box-11c" value="899.00">
    								<label for="box-11c">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/019.jpg">
    									<h4>Ohlins Rear Shock</h4>
    									<span class="d-block">Part No. 500075</span>
    									<span class="price">£899.00</span></label>
    								</div>  


    								<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    									<input class="tot_amount" type="checkbox" id="box-9c" value="4950.00">
    									<label for="box-9c">
    										<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/045.jpg">
    										<h4>Ohlins Race Pack (Includes Ohlins Front Forks, Ohlins Rear Shock with Remote Reservoir, Exclusive Gold Anodised Triple Clamps and Twin Disk - Wheel/Brembo Caliper/Disc Rotor)</h4>
    										<span class="d-block">Part No. 500078</span>
    										<span class="price">£4,950.00</span>
    									</label>
    								</div>  

    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>

    		<div class="panel carbon_fibre">
    			<div class="panel-heading">

    				<h4 class="panel-title">
    					<a data-toggle="collapse" class="collapsed"  data-parent="#accordion" href="#carb">
    						<div class="container">
    							<span>CARBON FIBRE</span>
    						</div>
    					</a>
    				</h4>

    			</div>
    			<div id="carb" class="panel-collapse collapse">
    				<div class="container">
    					<div class="panel-body px-0 py-5 ">
    						<div class="boxes">
    							<div class="row">
    								<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    									<input class="tot_amount" type="checkbox" id="box-13f" value="165.00">
    									<label for="box-13f">
    										<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/020.jpg">
    										<h4>Carbon Bash Place</h4>
    										<span class="d-block">Part No. 500074</span>
    										<span class="price">£165.00</span>
    									</label>
    								</div>  
    								<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    									<input class="tot_amount" type="checkbox" id="box-14f" value="99.00" >
    									<label for="box-14f">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/021.jpg">
    										<h4>Carbon Chain Guard</h4>
    										<span class="d-block">Part No. 500047</span>
    										<span class="price">£99.00</span></label>
    									</div>  
    									<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    										<input class="tot_amount" type="checkbox" id="box-15f" value="49.00">
    										<label for="box-15f">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/022.jpg">
    											<h4>Carbon Rear Master Cylinder Cover</h4>
    											<span class="d-block">Part No. S6F09C01103</span>
    											<span class="price">£49.00</span></label>

    										</div>  
    										<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    											<input class="tot_amount" type="checkbox" id="box-16f" value="349.00">
    											<label for="box-16f">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/041.jpg">
    												<h4>Carbon Engine Covers (L+R)</h4>
    												<span class="d-block">Part No. 500028</span>
    												<span class="price">£349.00</span></label>
    											</div>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    					
    					<div class="panel weather ">
    						<div class="panel-heading">

    							<h4 class="panel-title">
    								<a data-toggle="collapse" class="collapsed"  data-parent="#accordion" href="#wea">
    									<div class="container">
    										<span>WEATHER</span>
    									</div>
    								</a>
    							</h4>

    						</div>
    						<div id="wea" class="panel-collapse collapse">
    							<div class="container">
    								<div class="panel-body px-0 py-5 ">
    									<div class="boxes">
    										<div class="row">
    											<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    												<input class="tot_amount" type="checkbox" id="box-13" value="48.00">
    												<label for="box-13">
    													<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/023.jpg">
    													<h4>Air filter cover</h4>
    													<span class="d-block">Part No. S6F02C01004</span>
    													<span class="price">£48.00</span>
    												</label>
    											</div>  
                          <!--<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                               <input class="tot_amount" type="checkbox" id="box-14" value="89.99" >
                                <label for="box-14">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/024.jpg">
                                  <h4>Motorcycle Care pack</h4>
                                  <span class="d-block">Part No. S6F09C01835</span>
                                  <span class="price">£89.99</span></label>
                              </div>-->
                        <!--   <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                            <input class="tot_amount" type="checkbox" id="box-15" value="119.00">
                              <label for="box-15">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/007-360x360.jpg">
                                <h4>Lithium – Ion Optimate Charger + Fitted Charger Cable</h4>
                                <span class="d-block">Part No. S6F09C01816</span>
                                <span class="price">£119.00</span></label>

                          </div>  
                          <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                              <input class="tot_amount" type="checkbox" id="box-16" value="119.00">
                              <label for="box-16">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/015-360x360.jpg">
                                <h4>SMOKED FLY SCREEN (ADD-ON)</h4>
                                <span class="d-block">Part No. S6F09C01816</span>
                                <span class="price">£119.00</span></label>
                            </div>   -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="panel leather">
    	<div class="panel-heading">

    		<h4 class="panel-title">
    			<a data-toggle="collapse" class="collapsed"  data-parent="#accordion" href="#lea">
    				<div class="container">
    					<span>LEATHER</span>
    				</div>
    			</a>
    		</h4>

    	</div>
    	<div id="lea" class="panel-collapse collapse">
    		<div class="container">
    			<div class="panel-body px-0 py-5 ">
    				<div class="boxes">
    					<div class="row">
    						<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    							<input class="tot_amount" type="checkbox" id="box-17" value="55.00">
    							<label for="box-17">
    								<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/025.jpg">
    								<h4>Tan Leather Grip Wrap - Neoprene Grip Protector</h4>
    								<span class="d-block">Part No. S6F08C01014</span>
    								<span class="price">£55.00</span>
    							</label>
    						</div>  
    						<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    							<input class="tot_amount" type="checkbox" id="box-17a" value="159.00">
    							<label for="box-17a">
    								<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/014.jpg">
    								<h4>Tan Leather Tank Strap</h4>
    								<span class="d-block">Part No. 500086</span>
    								<span class="price">£159.00</span>
    							</label>
    						</div>
                          <!-- div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                               <input class="tot_amount" type="checkbox" id="box-18" value="80.00" >
                                <label for="box-18">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/006-360x360.jpg">
                                  <h4>HEADLIGHT GUARD (ADD-ON)</h4>
                                  <span class="d-block">Part No. S6F09A03201</span>
                                  <span class="price">£80.00</span></label>
                          </div>  
                          <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                            <input class="tot_amount" type="checkbox" id="box-19" value="119.00">
                              <label for="box-19">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/007-360x360.jpg">
                                <h4>Lithium – Ion Optimate Charger + Fitted Charger Cable</h4>
                                <span class="d-block">Part No. S6F09C01816</span>
                                <span class="price">£119.00</span></label>

                          </div>  
                          <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                              <input class="tot_amount" type="checkbox" id="box-20" value="119.00">
                              <label for="box-20">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/015-360x360.jpg">
                                <h4>SMOKED FLY SCREEN (ADD-ON)</h4>
                                <span class="d-block">Part No. S6F09C01816</span>
                                <span class="price">£119.00</span></label>
                            </div>   -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel billet_aluminium">
    	<div class="panel-heading">

    		<h4 class="panel-title">
    			<a data-toggle="collapse" class="collapsed"  data-parent="#accordion" href="#ba">
    				<div class="container">
    					<span>BILLET ALLUMINIUM</span>
    				</div>
    			</a>
    		</h4>

    	</div>
    	<div id="ba" class="panel-collapse collapse">
    		<div class="container">
    			<div class="panel-body px-0 py-5 ">
    				<div class="boxes">
    					<div class="row">
    						<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    							<input class="tot_amount" type="checkbox" id="box-21" value="99.00">
    							<label for="box-21">
    								<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/028.jpg">
    								<h4>Billeted Front Brake Master Cylinder Cover</h4>
    								<span class="d-block">Part No. 130037</span>
    								<span class="price">£99.00</span>
    							</label>
    						</div>  
    						<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    							<input class="tot_amount" type="checkbox" id="box-22" value="89.00" >
    							<label for="box-22">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/029.jpg">
    								<h4>Billeted Clutch Master Cylinder Cover</h4>
    								<span class="d-block">Part No. S6F09C01830</span>
    								<span class="price">£89.00</span></label>
    							</div>  
    							<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    								<input class="tot_amount" type="checkbox" id="box-23" value="250.00">
    								<label for="box-23">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/030.jpg">
    									<h4>Billeted Gear Lever + Rear Brake Lever</h4>
    									<span class="d-block">Part No. 500050</span>
    									<span class="price">£250.00</span></label>

    								</div>  
    								<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    									<input class="tot_amount" type="checkbox" id="box-24" value="75.00">
    									<label for="box-24">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/031.jpg">
    										<h4>Billeted Sprocket Cover</h4>
    										<span class="d-block">Part No. 500068</span>
    										<span class="price">£75.00</span></label>
    									</div>
    								</div>
    								<div class="row">
    									<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    										<input class="tot_amount" type="checkbox" id="box-24a" value="150.00">
    										<label for="box-24a">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/032b.jpg">
    											<h4>Billeted Adjustable Front Brake + Clutch Lever</h4>
    											<span class="d-block">Part No. 500051</span>
    											<span class="price">£150.00</span></label>
    										</div>
    										<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    											<input class="tot_amount" type="checkbox" id="box-24b" value="110.00">
    											<label for="box-24b">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/033.jpg">
    												<h4>Billeted Clutch Slave Cylinder</h4>
    												<span class="d-block">Part No. S6F09B02901</span>
    												<span class="price">£110.00</span></label>
    											</div>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>

    					<div class="panel mudguard">
    						<div class="panel-heading">

    							<h4 class="panel-title">
    								<a data-toggle="collapse" class="collapsed"  data-parent="#accordion" href="#mud">
    									<div class="container">
    										<span>MUDGUARD UPGRADES</span>
    									</div>
    								</a>
    							</h4>

    						</div>
    						<div id="mud" class="panel-collapse collapse">
    							<div class="container">
    								<div class="panel-body px-0 py-5 ">
    									<div class="boxes">
    										<div class="row">
    											<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    												<input class="tot_amount" type="checkbox" id="box-17f" value="220.00">
    												<label for="box-17f">
    													<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/02/no-image-ccm.png">
    													<h4>Extended Carbon Front Mudguard Kit</h4>
    													<span class="d-block">Part No. 500080</span>
    													<span class="price">£220.00</span>
    												</label>
    											</div>  
    											<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    												<input class="tot_amount" type="checkbox" id="box-171" value="220.00">
    												<label for="box-171">
    													<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/02/no-image-ccm.png">
    													<h4>Extended Carbon Rear Mudguard Kit</h4>
    													<span class="d-block">Part No. 500081</span>
    													<span class="price">£220.00</span>
    												</label>
    											</div>
    											<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    												<input class="tot_amount" type="checkbox" id="box-18" value="390.00" >
    												<label for="box-18">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/02/no-image-ccm.png">
    													<h4>Extended Carbon Rear Mudguard Kit (Front &amp; Rear)</h4>
    													<span class="d-block">Part No. 500083</span>
    													<span class="price">£390.00</span></label>
    												</div>  

    											</div>
    										</div>
    									</div>
    								</div>
    							</div>
    						</div>

    						<div class="panel security">
    							<div class="panel-heading">

    								<h4 class="panel-title">
    									<a data-toggle="collapse" class="collapsed"  data-parent="#accordion" href="#sec">
    										<div class="container">
    											<span>SECURITY</span>
    										</div>
    									</a>
    								</h4>

    							</div>
    							<div id="sec" class="panel-collapse collapse">
    								<div class="container">
    									<div class="panel-body px-0 py-5 ">
    										<div class="boxes">
    											<div class="row">
    												<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    													<input class="tot_amount" type="checkbox" id="box-25" value="371.00">
    													<label for="box-25">
    														<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/038.jpg">
    														<h4>Security Tracker (+ subscriptions charge = £99 p.a or £9.99 pcm)</h4>
    														<span class="d-block">Part No. 500079</span>
    														<span class="price">£371.00</span>
    													</label>
    												</div>  
                         <!--  <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                               <input class="tot_amount" type="checkbox" id="box-26" value="80.00" >
                                <label for="box-26">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/006-360x360.jpg">
                                  <h4>HEADLIGHT GUARD (ADD-ON)</h4>
                                  <span class="d-block">Part No. S6F09A03201</span>
                                  <span class="price">£80.00</span></label>
                          </div>  
                          <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                            <input class="tot_amount" type="checkbox" id="box-27" value="119.00">
                              <label for="box-27">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/007-360x360.jpg">
                                <h4>Lithium – Ion Optimate Charger + Fitted Charger Cable</h4>
                                <span class="d-block">Part No. S6F09C01816</span>
                                <span class="price">£119.00</span></label>

                          </div>  
                          <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                              <input class="tot_amount" type="checkbox" id="box-28" value="119.00">
                              <label for="box-28">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/015-360x360.jpg">
                                <h4>SMOKED FLY SCREEN (ADD-ON)</h4>
                                <span class="d-block">Part No. S6F09C01816</span>
                                <span class="price">£119.00</span></label>
                            </div>   -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel oil_filler_caps">
    	<div class="panel-heading">

    		<h4 class="panel-title">
    			<a data-toggle="collapse" class="collapsed"  data-parent="#accordion" href="#ofc">
    				<div class="container">
    					<span>OIL FILLER CAPS</span>
    				</div>
    			</a>
    		</h4>

    	</div>
    	<div id="ofc" class="panel-collapse collapse">
    		<div class="container">
    			<div class="panel-body px-0 py-5 ">
    				<div class="boxes">
    					<div class="row">
    						<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    							<input class="tot_amount" type="checkbox" id="box-29" value="30.00">
    							<label for="box-29">
    								<img src="/wp-content/uploads/2020/02/oil-caps-360.jpg">
    								<h4>Red Oil Filler Cap (Billeted)</h4>
    								<span class="d-block">Part No. 180218</span>
    								<span class="price">£30.00</span>
    							</label>
    						</div>  
    						<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    							<input class="tot_amount" type="checkbox" id="box-30" value="30.00" >
    							<label for="box-30">  <img src="/wp-content/uploads/2020/02/oil-caps-360.jpg">
    								<h4>Black Oil Filler Cap (Billeted)</h4>
    								<span class="d-block">Part No. 180216</span>
    								<span class="price">£30.00</span></label>
    							</div>  
    							<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    								<input class="tot_amount" type="checkbox" id="box-31" value="30.00">
    								<label for="box-31">  <img src="/wp-content/uploads/2020/02/oil-caps-360.jpg">
    									<h4>Silver Oil Filler Cap (Billeted)</h4>
    									<span class="d-block">Part No. 180219</span>
    									<span class="price">£30.00</span></label>

    								</div>  
    								<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    									<input class="tot_amount" type="checkbox" id="box-32" value="30.00">
    									<label for="box-32">  <img src="/wp-content/uploads/2020/02/oil-caps-360.jpg">
    										<h4>Gold Oil Filler Cap (Billeted)</h4>
    										<span class="d-block">Part No. 180217</span>
    										<span class="price">£30.00</span></label>
    									</div>  
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="panel exclusive">
    				<div class="panel-heading">

    					<h4 class="panel-title">
    						<a data-toggle="collapse" class="collapsed"  data-parent="#accordion" href="#exc">
    							<div class="container">
    								<span>EXCLUSIVE - LIMITED AVAILABILITY</span>
    							</div>
    						</a>
    					</h4>

    				</div>
    				<div id="exc" class="panel-collapse collapse">
    					<div class="container">
    						<div class="panel-body px-0 py-5 ">
    							<div class="boxes">
    								<div class="row">
    									<div class="col-md-3 col-sm-6 col-xs-6 mb-30">
    										<input class="tot_amount" type="checkbox" id="box-255" value="1500.00">
    										<label for="box-255">
    											<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/WW11-Spitfire-Fuselage.jpg">
    											<h4>Genuine Piece of WW2 Spitfire Fuselage Mounted as a Plate on Bar Clamps</h4>
    											<span class="d-block">Part No. 500056</span>
    											<span class="price">£1,500.00</span>
    										</label>
    									</div>  

    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
</div>
<div class="reserve_bike mt-50 cs-section" >
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-7 ">
				<h2>CONFIGURATION SUMMARY</h2>
				<div class="border-line"></div>
			</div>
			<div class="col-md-3"></div>
		</div>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-7">
				<span id="summery-items2"></span>
				<table class="table cs-list">
					<tbody>
						<tr>
							<td colspan="3" class="text-right"><span class="count">TOTAL: </span></span></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-3"></div>
		</div>

	</div>  
</div>
<div class="reserve_bike mt-50" id="reserve_bike">
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-7 ">
				<h2>CONFIGURE THIS BIKE</h2>
				<p>Simply submit this form to save your desired bike configuration. You can configure as many variations as you like to create your dream machine.</p>
				<div class="border-line"></div>
				<div class="form-reserve">
					<?php echo do_shortcode( '[contact-form-7 id="3675" title="Reserve This Bike"]' ); ?>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>

	</div>  
</div>
<div class="footer-order">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-2 hidden-xs">
				<img src="/wp-content/uploads/2020/02/six-sml.jpg">
			</div>
			<div class="col-md-7 col-sm-7 title-pro">
				<h2>SPITFIRE SIX</h2>
				<p class="total">TOTAL: £<input type="text" id="total1" readonly></p>
			</div>  
			<div class="col-md-3 col-sm-3 ">
				<a href="#scroll-down" class="red-btn pull-right scroll-down start-config">START CONFIGURING</a>
			</div>
		</div>  
	</div>
</div>
</div>
<?php get_footer() ?>
<?php //get_footer(); // This fxn gets the footer.php file and renders it ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script> -->
<script type="text/javascript">

	$(document).ready(function(){
  // Add smooth scrolling to all links
  $(".scroll-down").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
      	scrollTop: $(hash).offset().top - 70
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
    });
    } // End if
});

  /*jQuery("#accordion .panel .panel-heading").click(function(e){
       jQuery('html, body').animate({
        scrollTop: jQuery(this).offset().top - jQuery("#ccm-header").height() 
      }, 'slow');
  });*/
  //totalamount


  $("#box-9b").click(function(){
  	$("#box-10b").prop("checked", false);
  	$("#box-11b").prop("checked", false);
  	$("#box-12b").prop("checked", false);
  	$("#box-122b").prop("checked", false);

  });

  $("#box-10b").click(function(){
  	$("#box-9b").prop("checked", false);
  	$("#box-11b").prop("checked", false);
  	$("#box-12b").prop("checked", false);
  	$("#box-122b").prop("checked", false);

  });

  $("#box-11b").click(function(){
  	$("#box-10b").prop("checked", false);
  	$("#box-9b").prop("checked", false);
  	$("#box-12b").prop("checked", false);
  	$("#box-122b").prop("checked", false);

  });

  $("#box-12b").click(function(){
  	$("#box-10b").prop("checked", false);
  	$("#box-11b").prop("checked", false);
  	$("#box-9b").prop("checked", false);
  	$("#box-122b").prop("checked", false);

  });

  $("#box-122b").click(function(){
  	$("#box-10b").prop("checked", false);
  	$("#box-11b").prop("checked", false);
  	$("#box-12b").prop("checked", false);
  	$("#box-9b").prop("checked", false);

  });



  $("#box-29").click(function(){
  	$("#box-30").prop("checked", false);
  	$("#box-31").prop("checked", false);
  	$("#box-32").prop("checked", false);
  	
  });

  $("#box-30").click(function(){
  	$("#box-29").prop("checked", false);
  	$("#box-32").prop("checked", false);
  	$("#box-31").prop("checked", false);
  	
  });

  $("#box-31").click(function(){
  	$("#box-29").prop("checked", false);
  	$("#box-30").prop("checked", false);
  	$("#box-32").prop("checked", false);
  	
  });

  $("#box-32").click(function(){
  	$("#box-29").prop("checked", false);
  	$("#box-30").prop("checked", false);
  	$("#box-31").prop("checked", false);
  	
  });


  $("#box-9").click(function(){
  	$("#box-10").prop("checked", false);
  	$("#box-11").prop("checked", false);
  	$("#box-12").prop("checked", false);
  	$("#box-12a").prop("checked", false);
  });

  $("#box-10").click(function(){
  	$("#box-9").prop("checked", false);
  	$("#box-11").prop("checked", false);
  	$("#box-12").prop("checked", false);
  	$("#box-12a").prop("checked", false);
  });

  $("#box-11").click(function(){
  	$("#box-9").prop("checked", false);
  	$("#box-10").prop("checked", false);
  	$("#box-12").prop("checked", false);
  	$("#box-12a").prop("checked", false);
  });

  $("#box-12").click(function(){
  	$("#box-9").prop("checked", false);
  	$("#box-10").prop("checked", false);
  	$("#box-11").prop("checked", false);
  	$("#box-12a").prop("checked", false);
  });

  $("#box-12a").click(function(){
  	$("#box-9").prop("checked", false);
  	$("#box-10").prop("checked", false);
  	$("#box-11").prop("checked", false);
  	$("#box-12").prop("checked", false);
  });


  $("#box-1s2").click(function(){
  	$("#box-1s").prop("checked", false);
  })

  $("#box-1s").click(function(){
  	$("#box-1s2").prop("checked", false);
  })

  $("#box-9c").click(function(){

  	$('#box-9cb').prop("checked", false);
  	$('#box-10c').prop("checked", false);
  	$('#box-11c').prop("checked", false);
  });

  $("#box-9cb").click(function(){

  	$('#box-9c').prop("checked", false);


  	if($('#box-9c').is(':checked')){
  		$('#box-9cb').prop("checked", false);
  		$('#box-10c').prop("checked", false);
  		$('#box-11c').prop("checked", false);

  	}


  	if($('#box-9cb').is(':checked') && $('#box-10c').is(':checked') && $('#box-11c').is(':checked')){

  		$('#box-9c').prop("checked", true);
  		$('#box-9cb').prop("checked", false);
  		$('#box-10c').prop("checked", false);
  		$('#box-11c').prop("checked", false);
  	}
  })


  $("#box-10c").click(function(){

  	$('#box-9c').prop("checked", false);

  	if($('#box-9c').is(':checked')){
  		$('#box-9cb').prop("checked", false);
  		$('#box-10c').prop("checked", false);
  		$('#box-11c').prop("checked", false);

  	}



  	if($('#box-9cb').is(':checked') && $('#box-10c').is(':checked') && $('#box-11c').is(':checked')){

  		$('#box-9c').prop("checked", true);
  		$('#box-9cb').prop("checked", false);
  		$('#box-10c').prop("checked", false);
  		$('#box-11c').prop("checked", false);
  	}
  })

  $("#box-11c").click(function(){

  	$('#box-9c').prop("checked", false);

  	if($('#box-9c').is(':checked')){
  		$('#box-9cb').prop("checked", false);
  		$('#box-10c').prop("checked", false);
  		$('#box-11c').prop("checked", false);

  	}


  	if($('#box-9cb').is(':checked') && $('#box-10c').is(':checked') && $('#box-11c').is(':checked')){

  		$('#box-9c').prop("checked", true);
  		$('#box-9cb').prop("checked", false);
  		$('#box-10c').prop("checked", false);
  		$('#box-11c').prop("checked", false);
  	}
  })

// $("#box-10c").click(function(){

//     $("#box-9cb").prop("checked", false);
//     $("#box-11c").prop("checked", false);
//     $("#box-9c").prop("checked", false);
//  })

// $("#box-11c").click(function(){

//     $("#box-9cb").prop("checked", false);
//     $("#box-10c").prop("checked", false);
//     $("#box-9c").prop("checked", false);
//  })

// $("#box-9c").click(function(){

//     $("#box-9cb").prop("checked", false);
//     $("#box-10c").prop("checked", false);
//     $("#box-11c").prop("checked", false);
//  })



$("#box-17f").click(function(){
	$("#box-171").prop("checked", false);
	$("#box-18").prop("checked", false);
})

$("#box-171").click(function(){
	$("#box-17f").prop("checked", false);
	$("#box-18").prop("checked", false);
})

$("#box-18").click(function(){
	$("#box-17f").prop("checked", false);
	$("#box-171").prop("checked", false);
})




function getTotal(isInit) {

	var total = 9995;
	var selector = isInit ? ".tot_amount" : ".tot_amount:checked";
    // console.log(isInit);
    // console.log(selector);
    $(selector).each(function() {
    	tempname = '';
    	total += parseFloat($(this).val()); 
    });
    total =total.toFixed(2);    
    if (total == 0) {
    	$('#total1').val('');
    	$('.count').html('');
    	
    } else {      
    	$('#total1').val(ReplaceNumberWithCommas(total));
    	$('.count').html('TOTAL: £'+ReplaceNumberWithCommas(total));
    	$("input[name='total_price']").val(total);
    }
    updatesummary();
}

function updatesummary() {
	var allitems = '<table class="table cs-list"><thead><tr><th colspan="3"><span>SPECIAL EQUIPMENT</span></th></tr></thead><tbody>';
	var allitems2 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>HANDLEBAR OPTIONS</span></th></tr></thead><tbody>';
	var allitems3 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>PERFORMANCE</span></th></tr></thead><tbody>';
	var allitems4 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>WEATHER</span></th></tr></thead><tbody>';
	var allitems5 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>LEATHER</span></th></tr></thead><tbody>';
	var allitems6 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>BILLET ALLUMINIUM</span></th></tr></thead><tbody>';
	var allitems7 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>SECURITY</span></th></tr></thead><tbody>';
	var allitems8 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>OIL FILLER CAPS</span></th></tr></thead><tbody>';
	var allitems9 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>FUEL TANK PAINT OPTIONS</span></th></tr></thead><tbody>';
	var allitems10 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>SEAT TRIM</span></th></tr></thead><tbody>';
	var allitems11 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>CARBON FIBRE</span></th></tr></thead><tbody>';
	var allitems12 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>EXHAUST</span></th></tr></thead><tbody>';
	var allitems13 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>ANODIZING OPTIONS</span></th></tr></thead><tbody>';
	var allitems14 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>MUDGUARD OPTIONS</span></th></tr></thead><tbody>';
	var allitems15 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>EXCLUSIVE</span></th></tr></thead><tbody>';
	var allitems16 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>WHEEL OPTIONS</span></th></tr></thead><tbody>';
	var allitems17 = '<table class="table cs-list"><thead><tr><th colspan="3"><span>STEALTH KIT</span></th></tr></thead><tbody>';

	var special_equipment = handlebar_options = performance= weather = leather = billet_aluminium = security = oil_filler_caps = fuel_tank = seat_trim = carbon_fibre = exhaust = anodizing_options = mudguard = exclusive = wheel_options = stealth_kit = 0;
	var selector = ".tot_amount:checked";
	$(selector).each(function() {
		catgoryname = productname = productnum = productprice = '';

		catgoryname = $(this).parents( ".panel" ).attr('class');
		productimg = $(this).siblings( "label" ).find( "img" ).attr('src'); 
		productname = $(this).siblings( "label" ).find( "h4" ).text(); 
		productnum = $(this).siblings( "label" ).find( ".d-block" ).text();
		productprice = $(this).siblings( "label" ).find( ".price" ).text(); 
		if(catgoryname.indexOf('special_equipment') != -1){
			allitems += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			special_equipment++;
		} else if(catgoryname.indexOf('stealth_kit') != -1){
			allitems17 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			stealth_kit++;
		} else if(catgoryname.indexOf('anodizing_options') != -1){
			allitems13 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			anodizing_options++;
		} else if(catgoryname.indexOf('fuel_tank') != -1){
			allitems9 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			fuel_tank++;
		} else if(catgoryname.indexOf('seat_trim') != -1){
			allitems10 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			seat_trim++;
		} else if(catgoryname.indexOf('wheel_options') != -1){
			allitems16 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			wheel_options++;
		} else if(catgoryname.indexOf('exhaust') != -1){
			allitems12 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			exhaust++;
		} else if(catgoryname.indexOf('handlebar_options') != -1){
			allitems2 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			handlebar_options++;
		} else if(catgoryname.indexOf('performance') != -1){
			allitems3 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			performance++;
		} else if(catgoryname.indexOf('carbon_fibre') != -1){
			allitems11 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			carbon_fibre++;
		} else if(catgoryname.indexOf('weather') != -1){
			allitems4 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			weather++;
		} else if(catgoryname.indexOf('leather') != -1){
			allitems5 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			leather++;
		} else if(catgoryname.indexOf('billet_aluminium') != -1){
			allitems6 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			billet_aluminium++;

		} else if(catgoryname.indexOf('mudguard') != -1){
			allitems14 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			mudguard++;

		} else if(catgoryname.indexOf('security') != -1){
			allitems7 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			security++;
		} else if(catgoryname.indexOf('oil_filler_caps') != -1){
			allitems8 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			oil_filler_caps++;

		} else if(catgoryname.indexOf('exclusive') != -1){
			allitems15 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
			exclusive++;
		}

	});
allitems += '</tbody></table>';
allitems2 += '</tbody></table>';
allitems3 += '</tbody></table>';
allitems4 += '</tbody></table>';
allitems5 += '</tbody></table>';
allitems6 += '</tbody></table>';
allitems7 += '</tbody></table>';
allitems8 += '</tbody></table>';
allitems9 += '</tbody></table>';
allitems10 += '</tbody></table>';
allitems11 += '</tbody></table>';
allitems12 += '</tbody></table>';
allitems13 += '</tbody></table>';
allitems14 += '</tbody></table>';
allitems15 += '</tbody></table>';
allitems16 += '</tbody></table>';
allitems17 += '</tbody></table>';
$("#summery-items2").html('');
if(stealth_kit > 0) {
	$("#summery-items2").append(allitems17);
}
if(special_equipment > 0) {
	$("#summery-items2").append(allitems);
}
if(anodizing_options > 0) {
	$("#summery-items2").append(allitems13);
}
if(fuel_tank > 0) {
	$("#summery-items2").append(allitems9);
}
if(seat_trim > 0) {
	$("#summery-items2").append(allitems10);
}
if(wheel_options > 0) {
	$("#summery-items2").append(allitems16);
}
if(exhaust > 0) {
	$("#summery-items2").append(allitems12);
}
if(handlebar_options > 0) {
	$("#summery-items2").append(allitems2);
}
if(performance > 0) {
	$("#summery-items2").append(allitems3);
}
if(carbon_fibre > 0) {
	$("#summery-items2").append(allitems11);
}
if(weather > 0) {
	$("#summery-items2").append(allitems4);
}
if(leather > 0) {
	$("#summery-items2").append(allitems5);
}
if(billet_aluminium > 0) {
	$("#summery-items2").append(allitems6);
}
if(mudguard > 0) {
	$("#summery-items2").append(allitems14);
}
if(security > 0) {
	$("#summery-items2").append(allitems7);
}
if(oil_filler_caps > 0) {
	$("#summery-items2").append(allitems8);
}






if(exclusive > 0) {
	$("#summery-items2").append(allitems15);
}
special_equipment = handlebar_options = performance= weather = leather = billet_aluminium = security = oil_filler_caps = fuel_tank = seat_trim = carbon_fibre = exhaust = anodizing_options = mudguard = exclusive = wheel_options = stealth_kit = 0;

}



$(".tot_amount").click(function(event) {
	getTotal();        
});
getTotal(false);

function ReplaceNumberWithCommas(total) {
//Seperates the components of the number
var n= total.toString().split(".");
//Comma-fies the first part
n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
//Combines the two sections
return n.join(".");
}    

$('.panel.special_equipment .tot_amount').on('change',function(){
	var equipmet = []; 
	$(".panel.special_equipment .tot_amount:checked").each(function() {
		equipmet.push($(this).parent().find('h4').text());          
	})
	var selected;
	selected = equipmet.join(',') ;
	$('.product_list').val(selected);  
});

$('.panel.handlebar_options .tot_amount').on('change',function(){
	var handle = [];   
	$(".panel.handlebar_options .tot_amount:checked").each(function() {
		handle.push($(this).parent().find('h4').text());          
	})
	var handle_selected;
	handle_selected = handle.join(',') ;
	$('.handlebar_product_list').val(handle_selected); 
});

$('.panel.performance .tot_amount').on('change',function(){     
	var performance = [];   
	$(".panel.performance .tot_amount:checked").each(function() {
		performance.push($(this).parent().find('h4').text());          
	})
	var performance_selected;
	performance_selected = performance;
	$('.performance_product_list').val(performance_selected); 
});

$('.panel.weather .tot_amount').on('change',function(){
	var weather = [];   
	$(".panel.weather .tot_amount:checked").each(function() {
		weather.push($(this).parent().find('h4').text());          
	})
	var weather_selected;
	weather_selected = weather.join(',') ;
	$('.weather_product_list').val(weather_selected); 
});

$('.panel.leather .tot_amount').on('change',function(){
	var leather = [];   
	$(".panel.leather .tot_amount:checked").each(function() {
		leather.push($(this).parent().find('h4').text());          
	})
	var leather_selected;
	leather_selected = leather.join(',') ;
	$('.leather_product_list').val(leather_selected); 
});

$('.panel.billet_aluminium .tot_amount').on('change',function(){
	var billet_aluminium = [];   
	$(".panel.billet_aluminium .tot_amount:checked").each(function() {
		billet_aluminium.push($(this).parent().find('h4').text());          
	})
	var billet_aluminium_selected;
	billet_aluminium_selected = billet_aluminium.join(',') ;
	$('.billet_aluminium_product_list').val(billet_aluminium_selected); 
});

$('.panel.security .tot_amount').on('change',function(){
	var security = [];   
	$(".panel.security .tot_amount:checked").each(function() {
		security.push($(this).parent().find('h4').text());          
	})
	var security_selected;
	security_selected = security.join(',') ;
	$('.security_product_list').val(security_selected); 
});

$('.panel.oil_filler_caps .tot_amount').on('change',function(){
	$('.panel.oil_filler_caps .tot_amount').not(this).prop('checked', false);     
	var oil_filler_caps = [];     
	$(".panel.oil_filler_caps .tot_amount:checked").each(function() {
		oil_filler_caps.push($(this).parent().find('h4').text());          
	})  
	var oil_filler_caps_selected;    
	oil_filler_caps_selected = oil_filler_caps;    
	$('.oil_filler_caps_product_list').val(oil_filler_caps_selected);    
});

$('.panel.fuel_tank .tot_amount').on('change',function(){
	$('.panel.fuel_tank .tot_amount').not(this).prop('checked', false);     
	var fuel_tank = [];     
	$(".panel.fuel_tank .tot_amount:checked").each(function() {
		fuel_tank.push($(this).parent().find('h4').text());          
	})  
	var fuel_tank_selected;    
	fuel_tank_selected = fuel_tank;    
	$('.fuel_tank_product_list').val(fuel_tank_selected);    
});


$('.seat_trim .tot_amount').on('change',function(){
	$('.panel.seat_trim .tot_amount').not(this).prop('checked', false);     
	var seat_trim = [];     
	$(".panel.seat_trim .tot_amount:checked").each(function() {
		seat_trim.push($(this).parent().find('h4').text());          
	})  
	var seat_trim_selected;    
	seat_trim_selected = seat_trim;    
	$('.seat_trim_product_list').val(seat_trim_selected);    
});

$('.carbon_fibre .tot_amount').on('change',function(){

	var carbon_fibre = [];     
	$(".panel.carbon_fibre .tot_amount:checked").each(function() {
		carbon_fibre.push($(this).parent().find('h4').text());          
	})  
	var carbon_fibre_selected;    
	carbon_fibre_selected = carbon_fibre;    
	$('.carbon_fibre_product_list').val(carbon_fibre_selected);    
});

$('.exhaust .tot_amount').on('change',function(){
	$('.panel.exhaust .tot_amount').not(this).prop('checked', false);     
	var exhaust = [];     
	$(".panel.exhaust .tot_amount:checked").each(function() {
		exhaust.push($(this).parent().find('h4').text());          
	})  
	var exhaust_selected;    
	exhaust_selected = exhaust;    
	$('.exhaust_product_list').val(exhaust_selected);    
});

$('.anodizing_options .tot_amount').on('change',function(){
	$('.panel.anodizing_options .tot_amount').not(this).prop('checked', false);     
	var anodizing_options = [];     
	$(".panel.anodizing_options .tot_amount:checked").each(function() {
		anodizing_options.push($(this).parent().find('h4').text());          
	})  
	var anodizing_options_selected;    
	anodizing_options_selected = anodizing_options;    
	$('.anodizing_options_product_list').val(anodizing_options_selected);    
});


$('.mudguard .tot_amount').on('change',function(){
	$('.panel.mudguard .tot_amount').not(this).prop('checked', false);     
	var mudguard = [];     
	$(".panel.mudguard .tot_amount:checked").each(function() {
		mudguard.push($(this).parent().find('h4').text());          
	})  
	var mudguard_selected;    
	mudguard_selected = mudguard;    
	$('.mudguard_product_list').val(mudguard_selected);    
});



$('.exclusive .tot_amount').on('change',function(){
	$('.panel.exclusive .tot_amount').not(this).prop('checked', false);     
	var exclusive = [];     
	$(".panel.exclusive .tot_amount:checked").each(function() {
		exclusive.push($(this).parent().find('h4').text());          
	})  
	var exclusive_selected;    
	exclusive_selected = exclusive;    
	$('.exclusive_product_list').val(exclusive_selected);    
});


$('.wheel_options .tot_amount').on('change',function(){
	$('.panel.wheel_options .tot_amount').not(this).prop('checked', false);     
	var wheel_options = [];     
	$(".panel.wheel_options .tot_amount:checked").each(function() {
		wheel_options.push($(this).parent().find('h4').text());          
	})  
	var wheel_options_selected;    
	wheel_options_selected = wheel_options;    
	$('.wheel_options_product_list').val(wheel_options_selected);    
});

$('.stealth_kit .tot_amount').on('change',function(){
	$('.panel.stealth_kit .tot_amount').not(this).prop('checked', false);     
	var stealth_kit = [];     
	$(".panel.stealth_kit .tot_amount:checked").each(function() {
		stealth_kit.push($(this).parent().find('h4').text());          
	})  
	var stealth_kit_selected;    
	stealth_kit_selected = stealth_kit;    
	$('.stealth_kit_product_list').val(stealth_kit_selected);    
});

$("form").submit(function(e){
      //e.preventDefault(e);
      var firstname = $("input[name='first-name']").val();
      var lastname = $("input[name='last-name']").val();
      var emailadd = $("input[name='email-address']").val();
      var telephoneno = $("input[name='telephone']").val();
      if((firstname == '') || (lastname =='') || (emailadd =='') || (telephoneno == '')) {
      	$("#contact-form-error").html('Please filll all required field.').show();
      	return false;
      } else {
        // $(this).submit();
        // return false;
    }
});
});


// product pass in mail
var proname = $('.bike-name').text();
$("input[name='product_name']").val(proname);

  // end 

// For changes main image and footer image 
$('.stealth_kit input').change(function(){
	if($('#box-1s,#box-1s2').is(":checked")) {
		$('.first_image').attr('src','/wp-content/uploads/2020/02/six-stealth-sub.jpg');
		$('.footer-order img').attr('src','/wp-content/uploads/2020/02/six-stealth-sml.jpg');
	} else {

		$('.first_image').attr('src','/wp-content/uploads/2020/02/six-stealth-sub-new.jpg');
		$('.footer-order img').attr('src','/wp-content/uploads/2020/02/six-sml-new.jpg');


	}
});


// scroll issue 
$('.panel-collapse').on('show.bs.collapse', function(e){

	var $panel = $(this).closest('.panel');
	var $open = $(this).closest('.panel-group').find('.panel-collapse.in');
	
	var additionalOffset = 0;
	if($panel.prevAll().filter($open.closest('.panel')).length !== 0)
	{
		additionalOffset =  $open.height();
	}
	
	$('html,body').animate({
		scrollTop: $panel.offset().top - (additionalOffset + 70)
	}, 500);
});


// end scroll issue 
</script>