@extends('layouts.frontend')
@section('gallery')
current current-menu-ancestor current-menu-parent
@endsection
@section('body')
<section class="page-title" style="background-image: url({{asset('frontend/uploads/2021/10/pattern-16.png')}})">
   <div class="pattern-layer-one" style="background-image: url({{asset('frontend//themes/moko/assets/images/main-slider/pattern-1.png')}})"></div>
   <div class="pattern-layer-two" style="background-image: url({{asset('frontend//themes/moko/assets/images/background/pattern-17.png')}})"></div>
   <div class="pattern-layer-three" style="background-image: url({{asset('frontend//themes/moko/assets/images/background/pattern-18.png')}})"></div>
   <div class="pattern-layer-four" style="background-image: url({{asset('frontend//themes/moko/assets/images/icons/cross-icon.png')}})"></div>
   <div class="auto-container">
      <h2>  Our Projects</h2>
      <ul class="page-breadcrumb">
         <li><a href="../index.html">Home</a></li>
         <li>Our Projects</li>
      </ul>
   </div>
</section>
<!-- End Page Title Section -->
<div data-elementor-type="wp-page" data-elementor-id="594" class="elementor elementor-594">
   <section class="elementor-section elementor-top-section elementor-element elementor-element-939b65e elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="939b65e" data-element_type="section">
      <div class="elementor-container elementor-column-gap-default">
         <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a6fc571" data-id="a6fc571" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
               <div class="elementor-element elementor-element-e4a52c5 elementor-widget elementor-widget-moko_recent_projects" data-id="e4a52c5" data-element_type="widget" data-widget_type="moko_recent_projects.default">
                  <div class="elementor-widget-container">
                     <!-- Gallery Section -->
                     <section class="gallery-section">
                        {{-- <div class="pattern-layer" style="background-image: url({{asset('frontend//uploads/2021/11/cta-bg.png')}})"></div> --}}
                        <div class="auto-container">
                           <!-- MixitUp Galery -->
                           <div class="mixitup-gallery">
                              {{-- <div class="sec-title">
                                 <div class="clearfix">
                                    <div class="pull-left">
                                       <div class="title">ACHIVEMENTS</div>
                                       <h2>Our Key Achievements</h2>
                                    </div>
                                    <div class="pull-right">
                                       <!--Filter-->
                                       <div class="filters clearfix">
                                          <ul class="filter-tabs filter-btns clearfix">
                                             <li class="filter active" data-role="button" data-filter="all">All</li>
                                             <li class="filter" data-role="button" data-filter=".gov">Government Agencies</li>
                                             <li class="filter" data-role="button" data-filter=".education">Educational Institutions</li>
                                             <li class="filter" data-role="button" data-filter=".businesses">Businesses</li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div> --}}
                              <div class="filter-list row clearfix">
                                <!--Gallery Block -->

                                @foreach ($gallery as $image)
                                <div class="gallery-block all mix col-lg-4 col-md-6 col-sm-12 development media optimization ">
                                    <div class="inner-box">
                                        <!--Image Box-->
									    <figure class="image-box">
											<a href="{{$image->image}}"
												data-fancybox="footer-gallery" title="Movie Recommendation">
												<img width="80" height="80"
												src="{{$image->image}}"
                                                style="height: 280px;"
												class="attachment-moko_80x80 size-moko_80x80 wp-post-image"
												alt="" decoding="async" loading="lazy"
												srcset="{{$image->image}}"
												sizes="(max-width: 80px) 100vw, 80px">
                                    <h5 class="text-center"><b>DESCRIPTION</b></h5>
                                    <p class="text-center">Description about the images...</p>
											</a>
										</figure>
                                    </div>
                                </div>
                                @endforeach

                              </div>
                              <div class="styled-pagination text-center"><br />
                              </div>
                           </div>
                        </div>
                     </section>
                     <!-- End Gallery Section -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

</div>
<div class="clearfix"></div>
@endsection
