<?php 
/**
 * 	Template Name: Config (RAF)
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<div class="buy-order-bike-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="caption">
          <h1 class="bike-name">RAF BENEVOLENT FUND SPITFIRE</h1>
          <a href="#scroll-down" class="scroll-down" address="true">
            <span>CONFIGURE</span>
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
          </a>
        </div>

        <img src="/wp-content/uploads/2020/02/raf-sub-new-1.jpg">
      </div>
    </div>
  </div>
  <div id="scroll-down"></div>
  <div class="acc-option" >
    <div class="container-fluid px-0">
      <div class="row">
        <div class="col-md-12">
          <div class="panel-group" id="accordion">
            <div class="panel special_equipment">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#se">
                    <div class="container">
                      <span>SPECIAL EQUIPMENT</span>
                    </div>
                  </a>
                </h4>
              </div>
              <div id="se" class="panel-collapse collapse in">
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
                           <input class="tot_amount" type="checkbox" id="box-9" value="3995.00">
                           <label for="box-9">
                            <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/045.jpg">
                            <h4>Ohlins Race Pack                                                                       (Includes Ohlins Front Forks, Ohlins Rear Shock with Remote Reservoir, Exclusive Gold Anodised Triple Clamps)</h4>
                            <span class="d-block">Part No. 500078</span>
                            <span class="price">£3995.00</span>
                          </label>
                        </div>  
                        
                        <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                         <input class="tot_amount" type="checkbox" id="box-10" value="3500.00" >
                         <label for="box-10">  <img src="/wp-content/uploads/2020/02/no-image-ccm.png">
                          <h4>Ohlins Fork Kit </h4>
                          <span class="d-block">Part No. 500076</span>
                          <span class="price">£3500.00</span></label>
                        </div>  
                        <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                          <input class="tot_amount" type="checkbox" id="box-11" value="899.00">
                          <label for="box-11">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/019.jpg">
                            <h4>Ohlins Rear Shock</h4>
                            <span class="d-block">Part No. 500075</span>
                            <span class="price">£899.00</span></label>
                          </div>  
                          <!-- <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                              <input class="tot_amount" type="checkbox" id="box-12" value="119.00">
                              <label for="box-12">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/015-360x360.jpg">
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
                           <input class="tot_amount" type="checkbox" id="box-17" value="29.00">
                           <label for="box-17">
                            <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/026.jpg">
                            <h4>Tan Leather Credit Card Wallet - Brown</h4>
                            <span class="d-block">Part No. S6F09C01815</span>
                            <span class="price">£29.00</span>
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
                           <input class="tot_amount" type="checkbox" id="box-21" value="110.00">
                           <label for="box-21">
                            <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/033.jpg">
                            <h4>Billet Clutch Slave Cylinder </h4>
                            <span class="d-block">Part No. S6F09B02901</span>
                            <span class="price">£110.00</span>
                          </label>
                        </div>  
                         <!--  <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                               <input class="tot_amount" type="checkbox" id="box-22" value="80.00" >
                                <label for="box-22">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/006-360x360.jpg">
                                  <h4>HEADLIGHT GUARD (ADD-ON)</h4>
                                  <span class="d-block">Part No. S6F09A03201</span>
                                  <span class="price">£80.00</span></label>
                          </div>  
                          <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                            <input class="tot_amount" type="checkbox" id="box-23" value="119.00">
                              <label for="box-23">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/007-360x360.jpg">
                                <h4>Lithium – Ion Optimate Charger + Fitted Charger Cable</h4>
                                <span class="d-block">Part No. S6F09C01816</span>
                                <span class="price">£119.00</span></label>

                          </div>  
                          <div class="col-md-3 col-sm-6 col-xs-6 mb-30">
                              <input class="tot_amount" type="checkbox" id="box-24" value="119.00">
                              <label for="box-24">  <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/015-360x360.jpg">
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
      <img src="/wp-content/uploads/2020/02/raf-sml-new.jpg">
    </div>
    <div class="col-md-7 col-sm-7 title-pro">
      <h2>RAF BENEVOLENT FUND SPITFIRE</h2>
      <p class="total">TOTAL: £<input type="text" id="total1" readonly></p>
    </div>	
    <div class="col-md-3 col-sm-3 ">
      <a href="#scroll-down" class="red-btn pull-right scroll-down start-config">START CONFIGURING</a>
    </div>
  </div>	
</div>
</div>
</div>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>


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

  //totalamount
  

  $("#box-9").click(function(){
    $("#box-10").prop("checked", false);
    $("#box-11").prop("checked", false);
    
  });

  $("#box-10").click(function(){
    $("#box-9").prop("checked", false);
    $("#box-11").prop("checked", false);
    
  });

  $("#box-11").click(function(){
    $("#box-9").prop("checked", false);
    $("#box-10").prop("checked", false);
    
  });

  $("#box-29").click(function(){
    $("#box-30").prop("checked", false);
    $("#box-31").prop("checked", false);
    $("#box-32").prop("checked", false);
  });

  $("#box-30").click(function(){
    $("#box-29").prop("checked", false);
    $("#box-31").prop("checked", false);
    $("#box-32").prop("checked", false);
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
  })

  

  function getTotal(isInit) {
    
    var total = 18000;
    var selector = isInit ? ".tot_amount" : ".tot_amount:checked";

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

  special_equipment = handlebar_options = performance= weather = leather = billet_aluminium = security = oil_filler_caps = 0;
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
    } else if(catgoryname.indexOf('handlebar_options') != -1){
      allitems2 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
      handlebar_options++;
    } else if(catgoryname.indexOf('performance') != -1){
      allitems3 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
      performance++;
    } else if(catgoryname.indexOf('weather') != -1){
      allitems4 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
      weather++;
    } else if(catgoryname.indexOf('leather') != -1){
      allitems5 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
      leather++;
    } else if(catgoryname.indexOf('billet_aluminium') != -1){
      allitems6 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
      billet_aluminium++;
    } else if(catgoryname.indexOf('security') != -1){
      allitems7 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
      security++;
    } else if(catgoryname.indexOf('oil_filler_caps') != -1){
      allitems8 += '<tr><td><div class="img-pro"><img src="'+productimg+'" /></div></td><td class="text-left"><h4>'+productname+'</h4><span>'+productnum+'</span></td><td class="text-right"><span class="count">'+productprice+'</span></td></tr><tr><td><div style="height: 23px;"></div></td></tr>';
      oil_filler_caps++;
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

  $("#summery-items2").html('');
  if(special_equipment > 0) {
    $("#summery-items2").append(allitems);
  }
  if(handlebar_options > 0) {
    $("#summery-items2").append(allitems2);
  }
  if(performance > 0) {
    $("#summery-items2").append(allitems3);
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
  if(security > 0) {
    $("#summery-items2").append(allitems7);
  }
  if(oil_filler_caps > 0) {
    $("#summery-items2").append(allitems8);
  }
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
 $('.panel.performance .tot_amount').not(this).prop('checked', false);    
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
var proname = $('.bike-name').text();
$("input[name='product_name']").val(proname);




</script>


<!-- For acrodion scroll  -->
<script type="text/javascript">

  $('[data-toggle="collapse"]').click(function() {  

    if($('.panel-collapse').is(".in,.collapse")){
      
      var $panel = $(this).closest('.panel');
      var $open = $(this).closest('.panel-group').find('.panel-collapse.in');

      var additionalOffset = 0;

      if($panel.prevAll().filter($open.closest('.panel')).length !== 0)
      {
        additionalOffset =  $open.height();
      }
      else
      {
        additionalOffset = 0;
      }
      
      $('html,body').animate({
        scrollTop: $panel.offset().top - (additionalOffset + 70)
      }, 500);
    };
  });
</script>

<!-- End For accordion scroll -->
